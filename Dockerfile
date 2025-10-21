FROM php:8.2-apache

# Installer MySQLi-utvidelse slik at PHP kan snakke med databasen
RUN docker-php-ext-install mysqli

COPY public/ /var/www/html/

EXPOSE 80
