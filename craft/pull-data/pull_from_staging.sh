#!/bin/bash

### Purpose of this script ###
#
# dump database on remote, insert into local database
# rsync fileadmin folder
#

# directory this script is in
SCRIPT_DIR="$(dirname "$(readlink -f "$0")")"

. "$SCRIPT_DIR/../config/config.sh"

# NOW=$(date --rfc-3339=seconds)
FILENAME_SQL=database_staging.sql

# REMOTE
REMOTE_BINARY=$REMOTE_STAGING_BINARY
REMOTE_USER=$REMOTE_STAGING_USER
REMOTE_SERVER=$REMOTE_STAGING_SERVER
REMOTE_PORT=$REMOTE_STAGING_PORT

# e.g. /home/www/html/typo3/staging/releases/current
REMOTE_PATH=$REMOTE_STAGING_PATH

# e.g. /home/www/html/typo3/staging/shared
REMOTE_DATA_PATH=$REMOTE_STAGING_DATA_PATH

# Exclude remote tables
DUMP_OPTS=""
DUMP_OPTS=$DUMP_OPTS" --exclude be_sessions"
DUMP_OPTS=$DUMP_OPTS" --exclude sys_template"
DUMP_OPTS=$DUMP_OPTS" --exclude cache_hash"
DUMP_OPTS=$DUMP_OPTS" --exclude cache_hash_tags"
DUMP_OPTS=$DUMP_OPTS" --exclude cache_imagesizes"
DUMP_OPTS=$DUMP_OPTS" --exclude cache_imagesizes_tags"
DUMP_OPTS=$DUMP_OPTS" --exclude cache_pages"
DUMP_OPTS=$DUMP_OPTS" --exclude cache_pagesection"
DUMP_OPTS=$DUMP_OPTS" --exclude cache_pagesection_tags"
DUMP_OPTS=$DUMP_OPTS" --exclude cache_pages_tags"
DUMP_OPTS=$DUMP_OPTS" --exclude cache_rootline"
DUMP_OPTS=$DUMP_OPTS" --exclude cache_rootline_tags"
DUMP_OPTS=$DUMP_OPTS" --exclude cache_treelist"
DUMP_OPTS=$DUMP_OPTS" --exclude fe_sessions"
DUMP_OPTS=$DUMP_OPTS" --exclude sys_file_processedfile"
DUMP_OPTS=$DUMP_OPTS" --exclude sys_history"
DUMP_OPTS=$DUMP_OPTS" --exclude sys_lockedrecords"
DUMP_OPTS=$DUMP_OPTS" --exclude sys_log"
DUMP_OPTS=$DUMP_OPTS" --exclude sys_refindex"

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
