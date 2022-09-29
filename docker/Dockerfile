FROM php:7.4-apache

RUN apt-get -y update
RUN apt-get -y install libzip-dev zip unzip git
RUN docker-php-ext-install pdo_mysql zip
RUN a2enmod rewrite
RUN apt-get clean

WORKDIR /var/www/html

# INSTALL AND UPDATE COMPOSER
COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN composer self-update
