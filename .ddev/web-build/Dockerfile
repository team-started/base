
ARG BASE_IMAGE
FROM --platform=linux/amd64 $BASE_IMAGE

ENV NODE_VERSION=16
RUN sudo apt-get remove -y nodejs
RUN curl -sSL --fail https://deb.nodesource.com/setup_${NODE_VERSION}.x | bash -
RUN apt-get update && DEBIAN_FRONTEND=noninteractive
