# Laravel alap konténer
FROM php:8.2-cli

# Rendszer csomagok telepítése
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    curl \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# Composer telepítése
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Mappa beállítás
WORKDIR /var/www/html

# Projekt fájlok másolása
COPY . .

# Függőségek telepítése és .env létrehozása
RUN cp .env.example .env && \
    composer install --no-dev --optimize-autoloader && \
    php artisan key:generate

# 8000-es porton indítjuk majd a szervert
EXPOSE 8000

# Laravel szerver indítása
CMD php artisan serve --host=0.0.0.0 --port=8000
