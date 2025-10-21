# Bruk PHP med innebygd webserver
FROM php:8.2-cli

# Sett arbeidsmappe
WORKDIR /app

# Kopier alle filene i public-mappen inn i containeren
COPY public/ /app

# Eksponer port 80 (Dokploy bruker denne)
EXPOSE 80

# Start innebygd PHP-server når containeren starter
CMD ["php", "-S", "0.0.0.0:80", "-t", "/app"]


