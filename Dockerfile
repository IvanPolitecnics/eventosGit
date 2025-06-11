FROM ubuntu:22.04
ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update && apt-get install -y \
    nginx \
    php \
    php-mysql \
    php-cli \
    php-curl \
    php-mbstring \
    php-xml \
    php-bcmath \
    php-zip \
    curl \
    unzip \
    mysql-server \
    git \
    npm \
    nodejs \
    composer \
    supervisor

COPY . /var/www/html
WORKDIR /var/www/html

RUN composer install && npm install && npm run build
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

COPY ./docker/nginx.conf /etc/nginx/sites-available/default
COPY ./docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

EXPOSE 80
CMD ["/usr/bin/supervisord"]

