#!/bin/bash

LOCAL_PATH='/var/www/html'
TYPO3_BIN=${LOCAL_PATH}'/app/backend/vendor/bin/typo3'
FILEADMIN_PATH=${LOCAL_PATH}'/app/backend/public/fileadmin/user_upload'

# Truncate all tables
echo "SELECT Concat('TRUNCATE TABLE ', table_name, ';') FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA='db';" \
    | ${TYPO3_BIN} database:import > ${LOCAL_PATH}/truncate.sql

cat ${LOCAL_PATH}/truncate.sql | ${TYPO3_BIN} database:import
rm -f ${LOCAL_PATH}/truncate.sql

cat \
    $LOCAL_PATH/craft/data/demo-sql/_default/*.sql \
    $LOCAL_PATH/craft/data/demo-sql/nessa/*.sql \
    $LOCAL_PATH/craft/data/demo-sql/freya/*.sql \
    > sql.sql
# Import demo data for theme-nessa
cat \
    $LOCAL_PATH/craft/data/demo-sql/_default/*.sql \
    $LOCAL_PATH/craft/data/demo-sql/nessa/*.sql \
    $LOCAL_PATH/craft/data/demo-sql/freya/*.sql \
    | ${TYPO3_BIN} database:import

# Sync demo assets into fileadmin
rsync -r $LOCAL_PATH/craft/data/demo-assets/ ${FILEADMIN_PATH}

${TYPO3_BIN} database:updateschema "*.add,*.change" -q

# Create be admin
${TYPO3_BIN} backend:createadmin $TYPO3_ADMIN_USER $TYPO3_ADMIN_PASSWORD -q

# Finished cache
${TYPO3_BIN} cache:flush -q
