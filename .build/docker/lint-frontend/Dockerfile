ARG NODE_VERSION=14.15.1
ARG ALPINE_VERSION=3.12
ARG COMPOSER_VERSION=2
ARG PHP_VERSION=7.4

FROM node:${NODE_VERSION}-alpine
#RUN rm /usr/local/bin/docker-entrypoint.sh

RUN set -eux; \
  apk add --no-cache \
    bash

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

#ENV PATH "/usr/local/share/.config/yarn/global/node_modules/.bin:$PATH"
#ENV npm_config_cache /tmp/cache/npm

#FROM scratch

#COPY --from=node /opt /opt
#COPY --from=node /usr/local/bin /usr/local/bin
#COPY --from=node /usr/local/include /usr/local/include
#COPY --from=node /usr/local/lib /usr/local/lib
#COPY --from=node /usr/local/share /usr/local/share

#RUN cat /etc/shells
#
#RUN npm --version
#
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


#ENTRYPOINT ["/bin/sh"]
