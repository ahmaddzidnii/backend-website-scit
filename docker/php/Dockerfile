FROM php:8.3-fpm

# Install system dependencies & PHP extensions
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libpq-dev \
    zip \
    unzip \
    git \
    curl \
 && docker-php-ext-install \
    pdo_pgsql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
 && apt-get clean \
 && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Create non-root user
RUN useradd -u 1000 -m laravel

WORKDIR /var/www

# Copy application source
COPY --chown=laravel:laravel . .

# 1. Pastikan folder storage ada (mkdir -p)
# 2. Set permission
RUN mkdir -p storage/framework/{sessions,views,cache} storage/logs bootstrap/cache \
 && chown -R laravel:laravel /var/www \
 && chmod -R 755 /var/www \
 && chmod -R 775 storage bootstrap/cache

# Optional: Jalankan composer install agar vendor folder terisi
# (Uncomment jika Anda tidak melakukan mounting volume untuk vendor)
# RUN composer install --no-dev --optimize-autoloader

USER laravel

EXPOSE 9000
CMD ["php-fpm"]