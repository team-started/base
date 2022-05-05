#!/bin/bash

##
# Create an symlink to show the documentation
# https://starter-base.ddev.site/doc/
##
cd /var/www/html/app/backend/public && \
  ln -snvf ../../../documentation/static/ docs

##
# create symlinks for public and private folder of EXT:starter-freya
##
cd /var/www/html/app/backend/packages/starter_freya/Resources/Private && \
  ln -snvf ../../frontend/src/ui Frontend

mkdir -p /var/www/html/app/backend/packages/starter_freya/frontend/build/static/assets
cd /var/www/html/app/backend/packages/starter_freya/Resources/Public && \
  ln -snvf ../../frontend/build/static/assets Frontend

##
# create an symlink to show the prototype from fractal
# https://project.ddev.site/prototype/
##
#cd /var/www/html/app/backend/public && \
#  ln -snvf ../../frontend/build/prototype prototype

##
# Symlink the twig templates from fractal into the
# TYPO3 customer site package
##
#cd /var/www/html/app/backend/packages/customer_sitepackage/Resources/Private && \
#  ln -snvf ../../../../../frontend/src/components Frontend

##
# Symlink the build frontend resources of fractal into the
# TYPO3 customer site package
##
#mkdir -p /var/www/html/app/backend/packages/customer_sitepackage/Resources/Public
#cd /var/www/html/app/backend/packages/customer_sitepackage/Resources/Public && \
#  ln -snvf ../../../../../frontend/build/prototype/assets Frontend
