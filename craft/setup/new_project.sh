#!/bin/bash

# DESCRIPTION OF PROBLEM: Implementations of sed, readlink, zcat, etc. are different on OS X and Linux.
# NOTE: Put this on top of your script using sed, readlink, zcat, etc. that should work alike on Mac OS X.

# cross-OS compatibility (greadlink, gsed, zcat are GNU implementations for OS X)
[[ `uname` == 'Darwin' ]] && {
	which greadlink gsed gzcat > /dev/null && {
		unalias readlink sed zcat
		alias readlink=greadlink sed=gsed zcat=gzcat
	} || {
		echo '[ERROR] GNU utils required for Mac. You may use homebrew to install them: brew install coreutils gnu-sed'
		exit 1
	}
}

# NOTE: Now all uses of `sed`, `readlink`, `zcat`, etc. will refer to their GNU implementation in your script below.
# NOTE: In order to use the original implementation for Mac OS X again you'd have to do `unalias ...` (as in line 7 above).

GREEN="\033[0;32m"
YELLOW="\033[0;33m"
RED="\033[0;31m"
NO_COLOR="\033[0;0m"

if [ "$SSH_KEYS" = "The agent has no identities." ]; then
  echo ""
  echo -e "${RED}[ERROR] No SSH key"
  echo -e "${NO_COLOR}use ${YELLOW}ddev auth ssh${NO_COLOR} to add your key"
  exit 1
fi

PROJECT_NAME=${1:-"help"}
PROJECT_NAME="$(echo -e "${PROJECT_NAME}" | tr -d '[:space:]')"

case $PROJECT_NAME in
    starterteam-base)
      echo -e "${RED}[ERROR] The project name is reserved by StarterTeam. Please use another project name.${NO_COLOR}"
      exit 1
	;;
    help)
      echo ""
      echo -e "ddev setup ${YELLOW}<project-name> [git-version]${NO_COLOR}"
      echo ""
      echo -e "${YELLOW}<project-name>: ${NO_COLOR}Project name without spaces"
      echo -e "${YELLOW}[git-version]: ${NO_COLOR}Optional version tag of base to create a new project. If empty use latest tag."
      echo ""
      exit 0;
    ;;
esac;


SCRIPT_DIR="$(dirname "$(greadlink -f "$0")")"
BASE_CRAFT_DIRECTOR="$(dirname "$(greadlink -f "$SCRIPT_DIR")")"

SOURCE_DIR="$(dirname "$(greadlink -f "$BASE_CRAFT_DIRECTOR")")"
BUILD_DIR="$(dirname "$(greadlink -f "$BASE_CRAFT_DIRECTOR")")/_build"
PROJECT_TEMPLATES_DIRECTORY="$(dirname "$(greadlink -f "$BASE_CRAFT_DIRECTOR")")/project-templates"
NEW_PROJECT_DIR="../$PROJECT_NAME"

GIT_VERSION=${2}
if [ ! -z "$GIT_VERSION" ]
then
    USED_VERSION=$(git describe --exact-match --tags ${GIT_VERSION})
else
    USED_VERSION=$(git describe --tags $(git rev-list --tags --max-count=1))
    GIT_VERSION="latest"
fi

if [ -z "$USED_VERSION" ]; then
    echo -e "${RED}[ERROR] Version '$GIT_VERSION' not found!${NO_COLOR}"
    exit 1;
fi

if [ -e "$NEW_PROJECT_DIR" ]; then
    echo -e "${RED}[ERROR] Project '$PROJECT_NAME' already exists!${NO_COLOR}"
    exit 1;
fi

if [ -e "$BUILD_DIR" ]; then
    echo -e "${RED}[ERROR] Directory $BUILD_DIR already exists! (just delete it?)${NO_COLOR}"
    exit 1;
fi

echo -e "${YELLOW}Project setup${NO_COLOR} \"${GREEN}$PROJECT_NAME${NO_COLOR}\" ${YELLOW}from starterteam-base ${NO_COLOR}${GREEN}\"$USED_VERSION\"${NO_COLOR}"
mkdir -p "$BUILD_DIR/"{app/backend/{packages,public},app/frontend,craft/data} || exit 1
mkdir "$BUILD_DIR/"app/backend/public/typo3conf || exit 1
mkdir "$BUILD_DIR/"app/backend/public/typo3conf/ext || exit 1

echo -e "${YELLOW}Copy required files and folders ...${NO_COLOR}"

###
# Sync basic files in root
###
rsync $SOURCE_DIR/.editorconfig $SOURCE_DIR/.gitattributes $PROJECT_TEMPLATES_DIRECTORY/.gitignore $BUILD_DIR

###
# Sync gitlab-ci files and exclude customized pipeline
###
rsync -r $SOURCE_DIR/.build $BUILD_DIR --exclude .gitlab-ci.yml

###
# Sync DDEV files
###
rsync -r $SOURCE_DIR/.ddev $BUILD_DIR \
  --exclude .config.yaml \
  --exclude .ddev-docker-compose-base.yaml \
  --exclude .ddev-docker-compose-full.yaml \
  --exclude setup.sh \
  --exclude init-project-setup.sh \
  --exclude demo-data.sh

###
# Sync craft folder
###
rsync -r $SOURCE_DIR/craft $BUILD_DIR --exclude config.sh --exclude data --exclude setup --exclude initialize_demo.sh
touch $BUILD_DIR/craft/data.gitkeep

###
# Sync patches, of folder exists
###
if [ -e "${SOURCE_DIR}/app/backend/patches" ]; then
    rsync -r $SOURCE_DIR/app/backend/patches $BUILD_DIR/app/backend
fi

###
# Sync basic files and folders for backend
###
rsync -r $SOURCE_DIR/app/backend/config \
  $SOURCE_DIR/app/backend/.gitignore \
  $SOURCE_DIR/app/backend/.php-cs-fixer.php \
  $SOURCE_DIR/app/backend/.env.dist \
  $BUILD_DIR/app/backend/

###
# Rename .env file
###
cp $BUILD_DIR/app/backend/.env.dist $BUILD_DIR/app/backend/.env

###
# Sync TYPO3 specific files
###
rsync $SOURCE_DIR/app/backend/public/.htaccess $BUILD_DIR/app/backend/public/.htaccess
rsync $SOURCE_DIR/app/backend/public/typo3conf/.gitignore $BUILD_DIR/app/backend/public/typo3conf/.gitignore
rsync $SOURCE_DIR/app/backend/public/typo3conf/AdditionalConfiguration.php $BUILD_DIR/app/backend/public/typo3conf/AdditionalConfiguration.php
rsync $SOURCE_DIR/app/backend/public/typo3conf/LocalConfiguration.php $BUILD_DIR/app/backend/public/typo3conf/LocalConfiguration.php

###
# Sync CustomerSitepackage recursive
###
rsync -r $SOURCE_DIR/app/backend/packages/customer_sitepackage $BUILD_DIR/app/backend/packages

###
# Sync Surf app without documentation folder
###
rsync -r $SOURCE_DIR/.surf $BUILD_DIR --exclude documentation/

#rsync -rl $SOURCE_DIR/app/frontend/extensions\
#          $SOURCE_DIR/app/frontend/project\
#    $BUILD_DIR/app/frontend/

###
# Sync project template files
###
rsync -r $PROJECT_TEMPLATES_DIRECTORY/ $BUILD_DIR --exclude ProjectSetup.php

echo -e "${YELLOW}Set project name and version in new project ...${NO_COLOR}"
# wrapping the command here to run PHP inside the container!
# (replacing variables in files is easier in PHP)
ddev init-project "$PROJECT_NAME" "$USED_VERSION"

###
# Initialize new project with and move folder outside of current project
###
echo -e "${YELLOW}Initialize project '$PROJECT_NAME' in version '$USED_VERSION' with git ...${NO_COLOR}"
cd $BUILD_DIR && \
  git init --quiet && \
  git checkout --quiet -b main && \
  git add . -A >> /dev/null && \
  git commit -m "[init] project @$USED_VERSION" >> /dev/null

cd $SOURCE_DIR
mv $BUILD_DIR $NEW_PROJECT_DIR

echo -e "${GREEN}DONE${NO_COLOR}"
echo -e "Go to your project with: ${GREEN}cd ../$PROJECT_NAME${NO_COLOR}"
