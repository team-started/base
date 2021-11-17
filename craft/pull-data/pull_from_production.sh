#!/bin/bash

### Purpose of this script ###
#
# dump database on remote, insert into local database
# rsync fileadmin folder
#

# directory this script is in
SCRIPT_DIR="$(dirname "$(readlink -f "$0")")"

. "$SCRIPT_DIR/../config/config.sh"

DB_CONFIG_FILE="${SCRIPT_DIR}/../config/database.config"

FILENAME_SQL=database_production.sql

# REMOTE
REMOTE_BINARY=$REMOTE_PRODUCTION_BINARY
REMOTE_USER=$REMOTE_PRODUCTION_USER
REMOTE_SERVER=$REMOTE_PRODUCTION_SERVER
REMOTE_PORT=$REMOTE_PRODUCTION_PORT

# e.g. /home/www/html/typo3/production/releases/current
REMOTE_PATH=$REMOTE_PRODUCTION_PATH

# e.g. /home/www/html/typo3/production/shared
REMOTE_DATA_PATH=$REMOTE_PRODUCTION_DATA_PATH

# Exclude remote tables
DUMP_OPTS=
for line in `cat ${DB_DIR}/${DB_BACKUP_CONFIG_FILE}`;do
	IFS=';' read -a array <<< "$line"
	if [[ "${array[1]}" == "no_data" ]]
		then
			DUMP_OPTS=$DUMP_OPTS" --exclude "${array[0]}
	fi
done

if [[ ${IGNORE_BE_USER_DSGVO} -eq 0 ]]
    then
        DUMP_OPTS=$DUMP_OPTS" --exclude be_groups"
        DUMP_OPTS=$DUMP_OPTS" --exclude be_users"
fi

if [[ ${IGNORE_FE_USER_DSGVO} -eq 0 ]]
    then
        DUMP_OPTS=$DUMP_OPTS" --exclude fe_groups"
        DUMP_OPTS=$DUMP_OPTS" --exclude fe_users"
fi

# LOCAL
LOCAL_PATH=$(readlink -f "$SCRIPT_DIR/../../")

echo "Creating craft director on remote"
ssh $REMOTE_USER@$REMOTE_SERVER -p $REMOTE_PORT "mkdir -p $REMOTE_DATA_PATH/craft"

echo "Dumping DB on remote (${REMOTE_SERVER})"
ssh $REMOTE_USER@$REMOTE_SERVER -p $REMOTE_PORT "$REMOTE_BINARY $REMOTE_PATH/app/backend/vendor/bin/typo3cms database:export $DUMP_OPTS > $REMOTE_DATA_PATH/craft/$FILENAME_SQL"

echo "Copy Dump to local machine"
rsync -az --progress -e "ssh -p ${REMOTE_PORT}" $REMOTE_USER@$REMOTE_SERVER:$REMOTE_DATA_PATH/craft/$FILENAME_SQL $LOCAL_PATH/craft/data/

echo "Insert Dump into local Database"
cat $LOCAL_PATH/craft/data/$FILENAME_SQL | $LOCAL_PATH/app/backend/vendor/bin/typo3cms database:import

#echo "Set $LOCAL_DOMAIN as first Domain"
#echo "update sys_domain set sorting=1 where domainName='${LOCAL_DOMAIN}';" | $LOCAL_PATH/typo3cms database:import

echo "Update database schema"
$LOCAL_PATH/app/backend/vendor/bin/typo3cms database:updateschema

#echo "Copy fileadmin-folder from remote (${REMOTE_SERVER})"
#rsync --delete -e "ssh -p ${REMOTE_PORT}" -azh $REMOTE_USER@$REMOTE_SERVER:$REMOTE_PATH/"${DOCROOT}"/fileadmin/* $LOCAL_PATH/"${DOCROOT}"/fileadmin --no-times --no-perms

echo "Copy uploads-folder from remote (${REMOTE_SERVER})"
rsync --delete -e "ssh -p ${REMOTE_PORT}" -azh $REMOTE_USER@$REMOTE_SERVER:$REMOTE_PATH/"${DOCROOT}"/uploads/ $LOCAL_PATH/"${DOCROOT}"/uploads --no-times --no-perms

echo "Copy fileadmin folder from remote (${REMOTE_SERVER})"
rsync --delete -e "ssh -p ${REMOTE_PORT}" -azh $REMOTE_USER@$REMOTE_SERVER:$REMOTE_PATH/"${DOCROOT}"/fileadmin/ $LOCAL_PATH/"${DOCROOT}"/fileadmin --exclude '_processed_' --exclude '_temp_' --no-times --no-perms

#echo "Import database dumps for local development"
#cat $LOCAL_PATH/build/deployment/development/*.sql | $LOCAL_PATH/vendor/bin/typo3cms database:import

# add or change database after dump-import
$LOCAL_PATH/app/backend/vendor/bin/typo3cms database:updateschema "*.add,*.change"

if [[ ${IGNORE_BE_USER_DSGVO} -eq 0 ]]
    then
        # Remove all BE user to have no personal data (DSGVO)
        echo "TRUNCATE TABLE be_users" | $LOCAL_PATH/app/backend/vendor/bin/typo3cms database:import
    else
        # Remove existing user admin
        echo "DELETE FROM be_users WHERE username=\"${TYPO3_ADMIN_USER}\" AND admin = 1" | $LOCAL_PATH/app/backend/vendor/bin/typo3cms database:import
fi

# Create be admin
$LOCAL_PATH/app/backend/vendor/bin/typo3cms backend:createadmin admin password

# Finished cache
$LOCAL_PATH/app/backend/vendor/bin/typo3cms cache:flush
