#!/bin/bash

# DESCRIPTION OF PROBLEM: Implementations of sed, readlink, zcat, etc. are different on OS X and Linux.
# NOTE: Put this on top of your script using sed, readlink, zcat, etc. that should work alike on Mac OS X.

# cross-OS compatibility (greadlink, gsed, zcat are GNU implementations for OS X)
[[ `uname` == 'Darwin' ]] && {
	which greadlink gsed gzcat > /dev/null && {
		unalias readlink sed zcat
		alias readlink=greadlink sed=gsed zcat=gzcat
	} || {
		echo 'ERROR: GNU utils required for Mac. You may use homebrew to install them: brew install coreutils gnu-sed'
		exit 1
	}
}

# NOTE: Now all uses of `sed`, `readlink`, `zcat`, etc. will refer to their GNU implementation in your script below.
# NOTE: In order to use the original implementation for Mac OS X again you'd have to do `unalias ...` (as in line 7 above).

GREEN="\e[0;32m"
YELLOW="\e[0;33m"
RED="\e[0;31m"
NO_COLOR="\e[0;0m"

if [ "$SSH_KEYS" = "The agent has no identities." ]; then
  echo ""
  echo -e "${RED}Error: no SSH key"
  echo -e "${NO_COLOR}use ${YELLOW}ddev auth ssh${NO_COLOR} to add your key"
  exit 1
fi

PROJECT_NAME=${1:-"help"}
PROJECT_NAME="$(echo -e "${PROJECT_NAME}" | tr -d '[:space:]')"

case $PROJECT_NAME in
    starterteam-base)
      echo -e "${RED}The project name is reserved by StarterTeam. Please use another project name.${NO_COLOR}"
      exit 1
	;;
    help)
      echo ""
      echo -e "ddev setup ${YELLOW}<project-name>${NO_COLOR}"
      echo ""
      echo -e "${YELLOW}<project-name>: ${NO_COLOR}Project name without spaces"
      echo ""
      exit 0;
    ;;
esac;


SCRIPT_DIR="$(dirname "$(greadlink -f "$0")")"
SOURCE_DIR="$SCRIPT_DIR/../.."
BUILD_DIR="$SCRIPT_DIR/../../_build"
TARGET_DIR="$SCRIPT_DIR/../../../$PROJECT_NAME"
VERSION=$(git tag --sort=-v:refname | head -1)

if [ -e "$TARGET_DIR" ]; then
    echo -e "${RED}$TARGET_DIR already exists!${NO_COLOR}"
    exit 1;
fi

if [ -e "$BUILD_DIR" ]; then
    echo -e "${RED}$BUILD_DIR already exists! (just delete it?)${NO_COLOR}"
    exit 1;
fi

echo "${GREEN}Project setup${NO_COLOR} \"${YELLOW}$PROJECT_NAME${NO_COLOR}\" from starterteam-base \"$VERSION\""
mkdir -p "$BUILD_DIR/"{app/backend/{packages,public,var,vendor},app/frontend,app/craft/data} || exit 1
mkdir "$BUILD_DIR/"app/backend/public/typo3conf || exit 1
mkdir "$BUILD_DIR/"app/backend/public/typo3conf/ext || exit 1

echo -e "creating copy..."
rsync $SOURCE_DIR/.editorconfig $SOURCE_DIR/.gitattributes $SOURCE_DIR/.gitignore $BUILD_DIR

rsync -r $SOURCE_DIR/.ddev $BUILD_DIR

rsync $SOURCE_DIR/craft/data/.gitkeep $BUILD_DIR/craft/data/.gitkeep
rsync -rl $SOURCE_DIR/app/backend/config\
          $SOURCE_DIR/app/backend/.gitignore\
    $BUILD_DIR/app/backend/

rsync $SOURCE_DIR/app/backend/public/.htaccess $BUILD_DIR/app/backend/public/.htaccess
rsync $SOURCE_DIR/app/backend/public/typo3conf/.gitignore $BUILD_DIR/app/backend/public/typo3conf/.gitignore
rsync $SOURCE_DIR/app/backend/public/typo3conf/AdditionalConfiguration.php $BUILD_DIR/app/backend/public/typo3conf/AdditionalConfiguration.php
rsync $SOURCE_DIR/app/backend/public/typo3conf/LocalConfiguration.php $BUILD_DIR/app/backend/public/typo3conf/LocalConfiguration.php
rsync -r $SOURCE_DIR/app/backend/packages/customer_sitepackage $BUILD_DIR/app/backend/packages

rsync -r $SOURCE_DIR/.surf $BUILD_DIR --exclude documentation/

#rsync -rl $SOURCE_DIR/app/frontend/extensions\
#          $SOURCE_DIR/app/frontend/project\
#    $BUILD_DIR/app/frontend/

#rsync -r $SOURCE_DIR/test $BUILD_DIR

# wrapping the command here to run PHP inside the container!
# (replacing variables in files is easier in PHP)
ddev init-project "$PROJECT_NAME" "$VERSION"

echo -e "Finishing..."
cd $BUILD_DIR && git init && git checkout --quiet -b main && git add . && git commit -m "[init] project @ $VERSION"
cd $SCRIPT_DIR
mv $BUILD_DIR $TARGET_DIR

echo -e "${GREEN}DONE${NO_COLOR}"
echo -e "Go to your project: ${GREEN}cd ../$PROJECT_NAME${NO_COLOR}"
