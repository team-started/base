#!/bin/bash

cd "/var/www/html/app/backend" || exit

function typo3_scan () {
  #1.6.6
  curl -OL https://github.com/Tuurlijk/typo3scan/releases/download/1.7.0/typo3scan.phar

  SCAN_FOLDER="./packages/*/"

  # scan for deprecations and breaking changes in TYPO3
  for d in $SCAN_FOLDER
  do
    REPORT_FOLDER = "./packages/$(basename $d)/Dokumentation/Report"
    mkdir -p $REPORT_FOLDER

    php ./typo3scan.phar scan --target $1 --format markdown $d > $REPORT_FOLDER/v$($1)-deprecation.md)
  done
}

function cleanup () {
  rm -rf typo3scan.phar
}

typo3_scan "10"
#typo3_scan "11"
cleanup
