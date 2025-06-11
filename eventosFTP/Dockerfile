FROM php:8.2-fpm

# Instala dependencias del sistema
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    libzip-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl bcmath

# Instala Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Crea el directorio de la app
WORKDIR /var/www

# Copia los archivos del proyecto Laravel
COPY eventosFTP/. .

# Instala las dependencias de Laravel
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Permisos para Laravel
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage

# Expone el puerto (por si corres en modo serve)
EXPOSE 9000

CMD ["php-fpm"]
