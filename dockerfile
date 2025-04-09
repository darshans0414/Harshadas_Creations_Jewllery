FROM php:8.0-apache

# Enable Apache Rewrite Module
RUN a2enmod rewrite

# Install required packages
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy project files
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html/

# Set correct permissions
RUN chown -R www-data:www-data /var/www/html

# Install PHP dependencies
RUN composer install || true

# Expose port
EXPOSE 80
