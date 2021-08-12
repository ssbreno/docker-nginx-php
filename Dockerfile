FROM php:8.0-fpm

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
    curl

RUN docker-php-ext-install mysqli   

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy composer.lock and composer.json
COPY composer.json /var/www/html

# Copy existing application directory contents
COPY . /var/www/html

# Set working directory
WORKDIR /var/www/html

RUN composer install

RUN composer dump-autoload

# Expose port 9000 and start php-fpm server
EXPOSE 9000

CMD ["php-fpm"]