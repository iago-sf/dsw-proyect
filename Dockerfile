FROM php:8.1-apache
RUN a2enmod rewrite

RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libicu-dev \
    libxml2-dev \
    libpq-dev \
    libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip intl soap opcache \
    && docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd
RUN apt-get update -y

# Add Node 16
RUN curl -sL https://deb.nodesource.com/setup_16.x | bash -- \
    && apt-get install -y nodejs \
    && apt-get autoremove -y

RUN apt update
RUN apt-cache search mysql
RUN apt install mariadb-server -y

COPY --from=composer /usr/bin/composer /usr/bin/composer
COPY docker/000-default.conf /etc/apache2/sites-available/000-default.conf
COPY docker/.env-prod /var/www/html/.env
COPY docker/php.ini /usr/local/etc/php/php.ini

ENV COMPOSER_ALLOW_SUPERUSER 1
COPY . /var/www/html/
WORKDIR /var/www/html/
RUN chown -R www-data:www-data /var/www/html \
    && composer install --optimize-autoloader --no-dev && composer dumpautoload

RUN php artisan route:cache
RUN php artisan config:cache
RUN php artisan view:cache