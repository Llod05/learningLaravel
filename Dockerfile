FROM php:8.2-apache

# Függőségek
RUN apt-get update && apt-get install -y unzip git curl libzip-dev \
    && docker-php-ext-install zip pdo pdo_mysql

# Apache URL átírás engedélyezése
RUN a2enmod rewrite

# Laravel fájlok bemásolása
COPY . /var/www/html
WORKDIR /var/www/html

# Laravel fájlok jogosultságának beállítása
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Composer telepítése és Laravel dependenciák felrakása
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer install --no-dev --optimize-autoloader \
    && php artisan key:generate

EXPOSE 80
CMD ["apache2-foreground"]
