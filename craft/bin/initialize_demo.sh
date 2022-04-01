#!/bin/bash

LOCAL_PATH='/var/www/html'
TYPO3CMS=${LOCAL_PATH}'/app/backend/vendor/bin/typo3cms'
FILEADMIN_PATH=${LOCAL_PATH}'/app/backend/public/fileadmin/user_upload'

# Truncate all tables
echo "SELECT Concat('TRUNCATE TABLE ', table_name, ';') FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA='db';" \
    | ${TYPO3CMS} database:import > ${LOCAL_PATH}/truncate.sql

cat ${LOCAL_PATH}/truncate.sql | ${TYPO3CMS} database:import
rm -f ${LOCAL_PATH}/truncate.sql

# Import demo data for theme-nessa
cat \
    $LOCAL_PATH/craft/data/demo-sql/_default/*.sql \
    | ${TYPO3CMS} database:import

# Sync demo assets into fileadmin
rsync -r $LOCAL_PATH/craft/data/demo-assets/ ${FILEADMIN_PATH}

${TYPO3CMS} database:updateschema "*.add,*.change" -q

# Create be admin
${TYPO3CMS} backend:createadmin $TYPO3_ADMIN_USER $TYPO3_ADMIN_PASSWORD -q

# Finished cache
${TYPO3CMS} cache:flush -q
