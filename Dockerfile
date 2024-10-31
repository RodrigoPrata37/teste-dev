# Usa a imagem base do PHP 8.2
FROM php:8.2-fpm

# Instala as extensões do PostgreSQL e outras extensões necessárias
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo_pgsql