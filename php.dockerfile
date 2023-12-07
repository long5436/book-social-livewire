
FROM php:8.3-fpm
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

RUN docker-php-ext-install mbstring exif pcntl
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


CMD bash -c "unzip -o images.zip -d storage/app/public && unzip -o images2.zip -d storage/app/public && unzip -o images3.zip -d storage/app/public && unzip -o images4.zip -d storage/app/public && unzip -o images5.zip -d storage/app/public && unzip -o images6.zip -d storage/app/public && unzip -o images7.zip -d storage/app/public && php artisan storage:link && touch database/database.sqlite && cp .env.sqlite.example .env && composer install --ignore-platform-reqs && php artisan key:generate && php artisan migrate && php artisan db:seed && php-fpm"

# && php artisan db:seed
# && php artisan storage:link
