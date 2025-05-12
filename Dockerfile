# Se usa una imagen de PHP-FPM
FROM php:8.1.28-fpm

# Se instalam las dependencias necesaias del sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql mbstring exif pcntl bcmath zip

# Se instala el compose
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Se copia los archivos del proyecto al contenedor
COPY . .

# Se instlan las dependencias PHP de la API
RUN composer install --optimize-autoloader --no-dev

# Se establecen los permisos
RUN chown -R www-data:www-data /var/www \
    && chmod -R 775 storage bootstrap/cache

# Puerto por el que se accederá a Laravel
EXPOSE 8000

# Sirve para iniciar el servidor Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]