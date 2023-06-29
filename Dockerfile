FROM php:7.4-fpm

# Copiamos los archivos package.json composer.json y composer-lock.json a /var/www/
COPY composer*.json /var/www/

# Nos movemos a /var/www/
WORKDIR /var/www/

ARG user
ARG uid

# Instalamos las dependencias necesarias
RUN apt-get update && apt-get install -y \
    build-essential \
    libzip-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    git \
    curl

# Instalamos extensiones de PHP
RUN docker-php-ext-install pdo_mysql zip exif pcntl
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd

# Instalamos composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash -
RUN apt-get install -y nodejs

COPY --chown=www-data:www-data . /var/www
COPY . /var/www/
RUN chmod +x /home

RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Copiamos todos los archivos de la carpeta actual de nuestra 
# computadora (los archivos de laravel) a /var/www/


# Instalamos dependendencias de composer
RUN composer install --no-ansi --no-dev --no-interaction --no-progress --optimize-autoloader --no-scripts
RUN composer update

# Corremos el comando php-fpm para ejecutar PHP

USER $user 
