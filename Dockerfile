# Use the official PHP image with FPM (FastCGI Process Manager) as the base image
FROM php:8.3-fpm

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    git \
    libicu-dev \
    libxml2-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql intl xml opcache \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Composer globally to manage PHP dependencies
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set the working directory for your application
WORKDIR /var/www

# Copy the entire Laravel application into the container
COPY . .

# Install Laravel PHP dependencies via Composer
RUN composer install --optimize-autoloader --no-dev

# Expose port 9000 for PHP-FPM
EXPOSE 9000

# Set the default command to run PHP-FPM
CMD ["php-fpm"]
