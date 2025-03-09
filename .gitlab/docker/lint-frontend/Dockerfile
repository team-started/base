ARG NODE_VERSION

FROM node:${NODE_VERSION}-alpine

RUN set -eux; \
  apk add --no-cache \
    bash

##
# Fix issue with "Install failed gifsicle"
# see https://github.com/imagemin/imagemin-gifsicle/issues/37#issuecomment-771893769
##
RUN set -eux; \
    apk --update --no-cache \
		add  \
        automake \
		git \
		alpine-sdk  \
		nasm  \
		autoconf  \
		build-base \
		zlib \
		zlib-dev \
		libpng \
		libpng-dev\
		libwebp \
		libwebp-dev \
		libjpeg-turbo \
		libjpeg-turbo-dev

##
# RUN npm --version
##
RUN set -eux; \
    npm install --global \
        @frctl/fractal \
        webpack-cli \
        webpack \
    ; \
    npm cache clean --force; \
    npm cache verify

RUN set -eux; \
    node --version; \
    npm --version; \
    fractal --version; \
    webpack --version
