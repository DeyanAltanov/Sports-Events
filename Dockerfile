FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    apt-transport-https \
    ca-certificates \
    && apt-get update --fix-missing && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    && apt-get clean

RUN docker-php-ext-install pdo mbstring exif pcntl bcmath gd pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN composer install

RUN chown -R www-data:www-data \
    /var/www/storage \
    /var/www/bootstrap/cache

RUN chown -R www-data:www-data /var/www/storage

EXPOSE 9000
CMD ["php-fpm"]