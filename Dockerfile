FROM php:7.4-fpm

# Update
RUN apt-get update

# Additional tools
RUN apt-get install -y --no-install-recommends librabbitmq-dev
RUN apt-get install -y --no-install-recommends git
RUN apt-get install -y --no-install-recommends wget
RUN apt-get install -y --no-install-recommends unzip
RUN apt-get install -y --no-install-recommends ssh

# Common php-ext and requirements
RUN apt-get install -y --no-install-recommends libpq-dev libz-dev
RUN docker-php-ext-install session
RUN docker-php-ext-install phar
RUN docker-php-ext-install pdo
RUN docker-php-ext-install exif
#RUN docker-php-ext-install mbstring
RUN docker-php-ext-install pdo_pgsql
RUN docker-php-ext-install bcmath
RUN docker-php-ext-install json
RUN docker-php-ext-install tokenizer

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www

# Copy composer.json
COPY composer.json .
COPY composer.lock .

# Install dependencies
RUN composer install --no-scripts --no-autoloader

# Export vendor path
ENV PATH="/var/www/vendor/bin:$PATH"

CMD ["php-fpm"]

EXPOSE 9000
