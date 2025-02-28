FROM php:8.2-fpm

# Set the working directory to /var/www/html

WORKDIR /var/www/html



# Install dependencies

RUN apt-get update && apt-get install -y \

    git \

    curl \

    libpng-dev \

    libonig-dev \

    libxml2-dev \

    zip \

    unzip



# Install PHP extensions

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd xml



# Install Composer globally

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer



# Copy the composer.json and composer.lock

COPY . .

# Install the application dependencies

RUN composer install --no-scripts --no-autoloader --ignore-platform-reqs



# Copy the rest of the application code





# Generate the optimized autoload file

RUN composer dump-autoload --optimize



RUN chown -R www-data:www-data /var/www/html/storage

# Set the proper permissions

RUN chown -R www-data:www-data storage bootstrap/cache

RUN  chmod -R 775 storage

RUN  chmod -R 775 bootstrap

RUN  php artisan storage:link
# Expose port 80 and start Apache

EXPOSE 8000

EXPOSE 3306



CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]

