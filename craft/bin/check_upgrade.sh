#!/bin/bash

cd "/var/www/html/app/backend" || exit

function typo3_scan () {
  SCAN_FOLDER="./packages/*/"

  # scan for deprecations and breaking changes in TYPO3
  for d in $SCAN_FOLDER
  do
    REPORT_FOLDER="./packages/$(basename $d)/Documentation/Report"
    mkdir -p $REPORT_FOLDER

    vendor/bin/typo3scan scan $d -f markdown -t $1 > $REPORT_FOLDER/v$1-deprecation.md
  done
}

typo3_scan "11"
