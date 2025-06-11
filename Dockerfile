FROM php:8.2-fpm

# Variables para no tener que interactuar en la instalación
ENV DEBIAN_FRONTEND=noninteractive

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    nginx \
    mariadb-server \
    git \
    unzip \
    curl \
    supervisor \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    nodejs \
    npm \
    gnupg2 \
    ca-certificates

# Instalar extensiones de PHP necesarias para Laravel
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd xml

# Instalar Composer globalmente
RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer

# Instalar Node.js LTS (18.x) desde repositorio oficial (más fiable que el que trae apt)
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs

# Copiar el proyecto Laravel
COPY . /var/www/html
WORKDIR /var/www/html

# [SOLUCIÓN] Marcar el directorio como seguro para git
RUN git config --global --add safe.directory /var/www/html

# Instalar dependencias PHP y JS
RUN composer install --no-interaction --prefer-dist --optimize-autoloader && \
    npm install && npm run build

# Asignar permisos necesarios
RUN chown -R www-data:www-data storage bootstrap/cache

# Copiar configuración personalizada de Nginx y supervisord
COPY ./docker/nginx.conf /etc/nginx/sites-available/default
COPY ./docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Exponer el puerto 80
EXPOSE 80

# Iniciar supervisord que lanza PHP, Nginx y MySQL
CMD ["/usr/bin/supervisord", "-n"]
