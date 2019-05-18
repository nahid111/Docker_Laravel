FROM php:7

# Install dependencies
RUN apt-get update -y && apt-get install -y \
    build-essential \
    mysql-client \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    openssl \
    unzip \
    git \
    curl

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install extensions
# RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl
# RUN docker-php-ext-configure gd --with-gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --with-png-dir=/usr/include/
# RUN docker-php-ext-install gd
RUN docker-php-ext-install pdo pdo_mysql

# Set working directory & copy the project
WORKDIR /app
COPY . /app

# Run Commands
RUN composer install

# CMD php artisan serve --host=0.0.0.0 --port=8181

# Expose Ports
# EXPOSE 8181


