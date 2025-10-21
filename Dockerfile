FROM php:8.2-cli

WORKDIR /app

# Kopier alt (ikke bare public/) slik at PHP faktisk finner filene
COPY . /app

# Pass på at public-mappen faktisk finnes
RUN mkdir -p /app/public

# Eksponer port 80 for Dokploy
EXPOSE 80

# Start PHP-serveren, og pek eksplisitt på public/
CMD ["php", "-S", "0.0.0.0:80", "-t", "/app/public"]


