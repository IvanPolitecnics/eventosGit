FROM ubuntu:20.04

ENV DEBIAN_FRONTEND=noninteractive

# Instalar dependencias necesarias para añadir repositorios
RUN apt-get update && apt-get install -y \
    software-properties-common \
    curl \
    lsb-release \
    gnupg2 \
    ca-certificates

# Añadir el repositorio de PHP 8.2
RUN add-apt-repository ppa:ondrej/php -y && apt-get update

# Instalar PHP 8.2 y extensiones necesarias
RUN apt-get install -y \
    php8.2 \
    php8.2-fpm \
    php8.2-cli \
    php8.2-mysql \
    php8.2-curl \
    php8.2-mbstring \
    php8.2-xml \
    php8.2-bcmath \
    php8.2-zip \
    php8.2-common

# Instalar NGINX, MySQL y otras herramientas
RUN apt-get install -y \
    nginx \
    mysql-server \
    git \
    unzip \
    supervisor

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer

# Instalar Node.js LTS (18.x)
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs

# Copiar el proyecto
COPY . /var/www/html
WORKDIR /var/www/html

# Instalar dependencias del backend y frontend
RUN composer install --no-interaction --prefer-dist --optimize-autoloader && \
    npm install && npm run build

# Establecer permisos para Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Copiar configuración personalizada
COPY ./docker/nginx.conf /etc/nginx/sites-available/default
COPY ./docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Exponer el puerto web
EXPOSE 80

# Iniciar supervisord (que a su vez lanza nginx, php-fpm y mysql)
CMD ["/usr/bin/supervisord", "-n"]
