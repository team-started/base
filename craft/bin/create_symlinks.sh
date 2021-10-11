#!/bin/bash

##
# create an symlink to show the prototype from fractal
# https://project.ddev.site/prototype/
##
cd /var/www/html/app/backend/public && \
  ln -snvf ../../frontend/build/prototype prototype

##
# Symlink the twig templates from fractal into the
# TYPO3 customer site package
##
cd /var/www/html/app/backend/packages/customer_sitepackage/Resources/Private && \
  ln -snvf ../../../../../frontend/src/components Frontend

##
# Symlink the build frontend resources of fractal into the
# TYPO3 customer site package
##
mkdir -p /var/www/html/app/backend/packages/customer_sitepackage/Resources/Public
cd /var/www/html/app/backend/packages/customer_sitepackage/Resources/Public && \
  ln -snvf ../../../../../frontend/build/prototype/assets Frontend
