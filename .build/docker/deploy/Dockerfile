##
# This docker file based of the work from Jan Kiesewetter (t3easy)
# see https://github.com/t3easy/docker-surf
##
ARG ALPINE_VERSION=3.12
ARG COMPOSER_VERSION=2
ARG PHP_VERSION=7.4
ARG SURF_VERSION=2

FROM t3easy/composer:${COMPOSER_VERSION}-php${PHP_VERSION}-alpine${ALPINE_VERSION}
ARG SURF_VERSION

LABEL org.opencontainers.image.source="https://github.com/t3easy/docker-surf"

ENV SURF_VERSION=^${SURF_VERSION}

ENV COMPOSER_CACHE_DIR /tmp/cache/composer

RUN set -eux; \
        apk --no-cache add \
            libstdc++ \
            rsync \
        ; \
        \
        composer --version; \
        composer global require typo3/surf:${SURF_VERSION}; \
        rm -rf ${COMPOSER_CACHE_DIR}

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
        surf --version; \
        php --version

# Configure ssh client
COPY ssh_config /etc/ssh/ssh_config

COPY docker-entrypoint.sh /docker-entrypoint.sh
RUN chmod 755 /docker-entrypoint.sh

ENTRYPOINT ["/docker-entrypoint.sh"]

CMD ["surf"]
