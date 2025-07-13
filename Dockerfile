# 1. Alap image
FROM php:8.2-fpm

# 2. Rendszer csomagok + Composer telepítése
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libzip-dev \
    unzip \
    sqlite3 \
    && docker-php-ext-install pdo pdo_sqlite zip

# 3. Composer telepítése
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 4. Projekt fájlok áthelyezése
WORKDIR /var/www/html
COPY . .

# 5. Laravel inicializálás
RUN touch database/database.sqlite \
    && composer install --no-dev --optimize-autoloader \
    && php artisan key:generate \
    && php artisan migrate --force

# 6. Webszerver indulás (Render úgyis indítja, de később szükséges lehet)
CMD ["php-fpm"]
