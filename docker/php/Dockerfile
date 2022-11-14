FROM php:7.3-fpm-alpine

RUN set -ex \
  && apk --no-cache add \
    postgresql-dev

COPY . .

RUN docker-php-ext-install pdo pgsql pdo_pgsql
