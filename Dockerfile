FROM php:8.2-cli

WORKDIR /app
COPY public/ /app

CMD ["php", "-S", "0.0.0.0:80", "-t", "/app"]
EXPOSE 80

