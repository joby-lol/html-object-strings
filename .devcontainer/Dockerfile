FROM ubuntu:22.04

# prepare to install php 8.2
RUN apt update && apt install -y software-properties-common
RUN add-apt-repository ppa:ondrej/php
RUN apt update

# install php 8.2 and other fundamental packages
RUN export DEBIAN_FRONTEND=noninteractive; apt install -y --no-install-recommends php8.2 php-curl git openssl unzip

# install composer and its CA certificates
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
COPY --from=composer:latest /etc/ssl/certs/ca-certificates.crt /etc/ssl/certs/ca-certificates.crt

# install the PHP extensions that basically all PHP projects should need
RUN export DEBIAN_FRONTEND=noninteractive; apt install -y php8.2-opcache php-xdebug php-mbstring php-zip php-gd php-xml
