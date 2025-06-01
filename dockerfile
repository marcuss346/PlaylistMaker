FROM php:8.2-fpm-bookworm

RUN apt-get update && apt-get install -y \
    curl \
    git \
    unzip \
    zip \
    nodejs \
    npm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    mariadb-client \
    libzip-dev \
    unzip \
    zip \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libicu-dev \
    libpq-dev \
    git \
    && docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl gd intl

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy Laravel files
COPY . .

# Install PHP dependencies
RUN composer install --optimize-autoloader --no-dev

# Set permissions
RUN chown -R www-data:www-data /var/www \
    && chmod -R 775 storage bootstrap/cache

EXPOSE 9000

CMD ["php-fpm"]
