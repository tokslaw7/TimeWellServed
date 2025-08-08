# Use an official PHP runtime as a base image
FROM php:8.1-apache

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
#RUN apt-get update

RUN apt-get update && \
    apt-get install --yes --force-yes \
    cron g++ gettext libicu-dev openssl \
    libc-client-dev libkrb5-dev  \
    libxml2-dev libfreetype6-dev \
    libgd-dev libmcrypt-dev bzip2 \
    libbz2-dev libtidy-dev libcurl4-openssl-dev \
    libz-dev libmemcached-dev libxslt-dev git-core libpq-dev \
    libzip4 libzip-dev libwebp-dev


# PHP Configuration
RUN docker-php-ext-install bcmath bz2 calendar  dba exif gettext iconv intl  soap tidy xsl zip&&\
    docker-php-ext-install mysqli pgsql pdo pdo_mysql pdo_pgsql  &&\
    docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp &&\
    docker-php-ext-install gd &&\
    docker-php-ext-configure imap --with-kerberos --with-imap-ssl &&\
    docker-php-ext-install imap &&\
    docker-php-ext-configure hash --with-mhash &&\
    pecl install xdebug && docker-php-ext-enable xdebug &&\
    pecl install mongodb && docker-php-ext-enable mongodb &&\
    pecl install redis && docker-php-ext-enable redis

# 2. set up document root for apache
COPY docker/apache/000-default.conf /etc/apache2/sites-available/000-default.conf

# 3. mod_rewrite for URL rewrite and mod_headers for .htaccess extra headers like Access-Control-Allow-Origin-
RUN a2enmod rewrite headers

# 4. start with base php config, then add extensions
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

# 5. Composer
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer
RUN chmod +x /usr/local/bin/composer
RUN composer self-update

COPY / /var/www/html/
# 6. we need a user with the same UID/GID with host user
# so when we execute CLI commands, all the host file's ownership remains intact
# otherwise command from inside container will create root-owned files and directories
ARG uid=1000
RUN useradd -G www-data,root -u $uid -d /home/devuser devuser
RUN mkdir -p /home/devuser/.composer && \
    chown -R devuser:devuser /home/devuser

RUN composer install

EXPOSE 80