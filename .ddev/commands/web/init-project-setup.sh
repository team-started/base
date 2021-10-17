#!/bin/bash

## Description: Please use "ddev setup project instead!"
## Usage: init-project name secret

# This script exists so we can run code inside the ddev container!
# at least two arguments are required
if [ "$#" -lt 2 ]; then
  echo "please use 'ddev setup project' - this is just a wrapper command!"
  exit 1
fi

# do the heavy lifting in PHP:
./../../project-templates/ProjectSetup.php "$@"
