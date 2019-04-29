FROM php:7-apache

RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo pdo_pgsql

RUN a2enmod rewrite

ADD . /var/www
ADD ./public /var/www/html

RUN chmod -R 777 /var/www/
