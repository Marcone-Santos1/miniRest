FROM php:8.2-cli

WORKDIR /app

COPY composer.* ./

# Set Environment Variables
ENV DEBIAN_FRONTEND noninteractive

# Install dependencies
RUN apt-get update && apt-get install -y \
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
    libzip-dev

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# No seu Dockerfile, adicione:
RUN echo "error_reporting = E_ALL & ~E_DEPRECATED" >> /usr/local/etc/php/conf.d/docker-php-custom.ini

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer install

COPY . .

CMD php miniRest serve --host=0.0.0.0