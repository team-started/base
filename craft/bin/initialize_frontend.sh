#!/bin/bash

SCRIPT_DIRECTORY="$( cd "$(dirname "$0")" ; pwd -P )"
CRAFT_DIRECTORY="$( cd "$(dirname "$SCRIPT_DIRECTORY")" ; pwd -P )"
PROJECT_DIRECTORY="$( cd "$(dirname "$CRAFT_DIRECTORY")" ; pwd -P )"

pushd "${PROJECT_DIRECTORY}"/app/frontend/

# install node_modules
npm install --quiet

# compile JS and Scss
npm run build:dev:backend
