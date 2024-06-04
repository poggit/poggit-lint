FROM php:8.2-apache
LABEL authors="poggit"

RUN apt-get update && apt-get install --no-install-recommends -y \
    libyaml-dev \
    libcurl3-dev \
    libssl-dev \
    libzip-dev \
		gnupg \
		ca-certificates \
		software-properties-common

RUN docker-php-ext-install -j$(nproc) mysqli phar curl \
    && echo "phar.readonly=0" > /usr/local/etc/php/conf.d/phar.ini

RUN pecl install yaml zip apcu \
    && docker-php-ext-enable yaml zip apcu

RUN a2enmod rewrite \
    && a2enmod headers


## docker-compose.yml
#version: '2'
#services:
#    poggit-lint:
#        build: ./
#        restart: always
#        volumes:
#            - ./src:/poggit-lint
#            - ./static:/var/www/html
#        ports:
#            - 14000:80
