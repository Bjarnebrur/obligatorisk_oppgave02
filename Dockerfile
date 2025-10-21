# Bruk PHP med innebygd webserver
FROM php:8.2-cli

# Arbeidskatalog i containeren
WORKDIR /var/www/html

# Kopier prosjektet ditt inn i containeren
COPY . /var/www/html

# Sett riktige rettigheter på filene (hindrer 403)
RUN chmod -R 755 /var/www/html && chown -R www-data:www-data /var/www/html

# Eksponer port 80
EXPOSE 80

# Start innebygd PHP-server, og pek på public-mappen
CMD ["php", "-S", "0.0.0.0:80", "-t", "/var/www/html/public"]



