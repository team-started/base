#!/bin/bash

cd "/var/www/html/app/backend/" || exit

vendor/bin/typo3cms install:fixfolderstructure -q
vendor/bin/typo3cms extension:setup -q

# Wait for db to become available
until mysqladmin ping -h db > /dev/null 2>&1
do
    echo "Waiting 5sec for db to become available";
    sleep 5;
done

vendor/bin/typo3cms database:updateschema "*.add,*.change" -q

# Create be admin
vendor/bin/typo3cms backend:createadmin $TYPO3_ADMIN_USER $TYPO3_ADMIN_PASSWORD -q

# Finished cache
vendor/bin/typo3cms cache:flush -q
