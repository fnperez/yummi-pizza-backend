FROM php:7.3.8-fpm

RUN apt-get update && apt-get install -my wget gnupg -y mariadb-client --no-install-recommends -y libzip-dev\
    && docker-php-ext-install pdo_mysql\
    && docker-php-ext-install zip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer --version

WORKDIR /var/www/app

#RUN apt-get install -y supervisor
#COPY laravel-worker.conf /etc/supervisor/conf.d/laravel-worker.conf
#RUN supervisorctl start laravel-worker:*

RUN touch /usr/local/etc/php/conf.d/uploads.ini \
    && echo "upload_max_filesize = 100M;" >> /usr/local/etc/php/conf.d/uploads.ini \
    && echo "post_max_size = 100M;" >> /usr/local/etc/php/conf.d/uploads.ini \
    && echo "memory_limit = 1G;" >> /usr/local/etc/php/conf.d/uploads.ini
