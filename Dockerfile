FROM php:8.2-apache
LABEL authors="poggit"

RUN apt-get update && apt-get install --no-install-recommends -y \
    libyaml-dev

RUN pecl install yaml \
    && docker-php-ext-enable yaml

## docker-compose.yml
#version: '2'
#services:
#    poggit-lint:
#        build: ./
#        restart: always
#        volumes:
#            - ./src:/var/www/html
#        ports:
#            - 14000:80
