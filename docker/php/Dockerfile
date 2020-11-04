FROM php:7.4-fpm

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        g++ \
        curl \
        git \
        zip \
        unzip \
        libmcrypt-dev \
        libicu-dev \
        libpq-dev \
        libonig-dev \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmagickwand-dev \
        librabbitmq-dev \
        libxslt1-dev \
        libxml2-dev \
        libpng-dev \
        libzip-dev \
        zlib1g-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install bcmath dom intl mbstring opcache pgsql pdo_pgsql xsl zip \
    && pecl install amqp apcu-5.1.18 imagick \
    && docker-php-ext-enable amqp apcu imagick \
    && apt-get purge -y \
        libpq-dev \
        libicu-dev \
        libonig-dev \
        libmcrypt-dev \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmagickwand-dev \
        librabbitmq-dev \
        libxslt1-dev \
        libxml2-dev \
        libpng-dev \
        libzip-dev \
        zlib1g-dev \
    && rm -r /var/lib/apt/lists/*

ENV COMPOSER_ALLOW_SUPERUSER 0
ENV COMPOSER_VERSION 2.0.2
ENV COMPOSER_HOME /tmp
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php -r " \
        if (hash_file('sha384', 'composer-setup.php') === 'c31c1e292ad7be5f49291169c0ac8f683499edddcfd4e42232982d0fd193004208a58ff6f353fde0012d35fdd72bc394') { \
            echo 'Installer verified' . PHP_EOL; \
        } else { \
            echo 'Installer corrupt' . PHP_EOL; \
            unlink('composer-setup.php'); \
        }" \
    && php composer-setup.php --version=$COMPOSER_VERSION --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('composer-setup.php');" \
    && composer --ansi --version --no-interaction

RUN pecl install xdebug-2.9.2 \
    && docker-php-ext-enable xdebug
    
WORKDIR /app

RUN composer require php-curl-class/php-curl-class
RUN composer install
