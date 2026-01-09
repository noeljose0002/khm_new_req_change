FROM docker.io/library/php:8.2-apache
 
# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libicu-dev \
    zip \
    unzip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*
 
# Install PHP extensions
RUN docker-php-ext-install \
    mysqli \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    intl \
    zip
 
# Enable Apache mod_rewrite
RUN a2enmod rewrite
 
# Install Composer
COPY --from=docker.io/library/composer:latest /usr/bin/composer /usr/bin/composer
 
# Set working directory
WORKDIR /var/www/html
 
# Copy project files
COPY . /var/www/html
 
# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs || \
    composer install --no-dev --optimize-autoloader
 
# Set permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/writable
 
# Copy Apache configuration
COPY apache-config.conf /etc/apache2/sites-available/000-default.conf
 
# Expose port 80
EXPOSE 80
 
# Start Apache
CMD ["apache2-foreground"]