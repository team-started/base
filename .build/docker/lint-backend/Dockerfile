ARG ALPINE_VERSION=3.12
ARG COMPOSER_VERSION=2
ARG PHP_VERSION=7.4

FROM t3easy/composer:${COMPOSER_VERSION}-php${PHP_VERSION}-alpine${ALPINE_VERSION}

ENV COMPOSER_CACHE_DIR /tmp/cache/composer

ENV COMPOSER_VENDOR_DIR /vendor
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_NO_INTERACTION 1

RUN set -eux; \
        apk --no-cache add \
            libstdc++ \
            rsync

##
# Fix issue with "Install failed gifsicle"
# see https://github.com/imagemin/imagemin-gifsicle/issues/37#issuecomment-771893769
##
RUN apk --update --no-cache \
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

RUN set -eux; \
        composer --version; \
        php --version

RUN composer global require \
        php-parallel-lint/php-parallel-lint \
        php-parallel-lint/php-console-highlighter \
        squizlabs/php_codesniffer \
        helmich/typo3-typoscript-lint \
        michielroos/typo3scan \
        phpmd/phpmd

RUN set -eux; \
        /vendor/bin/parallel-lint --version; \
        /vendor/bin/phpcs --version; \
        /vendor/bin/typoscript-lint --version; \
        /vendor/bin/typo3scan --version; \
        /vendor/bin/phpmd --version
