#!/bin/bash

## Description: Create a new project
## Usage: setup help|<project-name>
## Example: "ddev setup my-new-project"

SCRIPT=./craft/setup/new_project.sh
if [ -x "$SCRIPT" ]; then
  $SCRIPT "$@"
else
  if [ ! -e "$SCRIPT" ]; then
    echo "File $SCRIPT not found!"
  else
    echo "File $SCRIPT is not executable!"
  fi
fi
