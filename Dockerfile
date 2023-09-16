# Use an official PHP runtime as a parent image
FROM php:8.0-fpm

# Set the working directory in the container
WORKDIR /var/www/html

# Copy Laravel application files into the container added after
COPY . /var/www/html

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql zip

# Install PostgreSQL and development packages
RUN apt-get update && apt-get install -y libpq-dev postgresql-client


# Copy the application files to the container
COPY . .

# Set the PG_CONFIG environment variable
ENV PG_CONFIG /usr/bin/pg_config

# Install PHP extensions
RUN docker-php-ext-install pgsql 
RUN docker-php-ext-enable pgsql

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Laravel dependencies using Composer
RUN composer install

# Expose port 8000 and start the PHP-FPM server
EXPOSE 8000
CMD ["php-fpm"]
