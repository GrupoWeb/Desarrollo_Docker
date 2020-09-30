# FROM webimp/php-56-apache
# FROM php:7.2-apache
# FROM gjuniioor/php-sqlsrv:latest

# COPY php.ini /usr/local/etc/php

# RUN apt-get -y install unixodbc-dev
# RUN pecl install sqlsrv pdo_sqlsrv

# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
#     && ln -s $(composer config --global home) /root/composer
# ENV PATH=$PATH:/root/composer/vendor/bin COMPOSER_ALLOW_SUPERUSER=1

FROM php:7.1-apache

ENV ACCEPT_EULA=Y

# Microsoft SQL Server Prerequisites
RUN apt-get update \
    && curl -sS https://packages.microsoft.com/keys/microsoft.asc | apt-key add - \
    && curl -sS https://packages.microsoft.com/config/debian/9/prod.list \
        > /etc/apt/sources.list.d/mssql-release.list \
    && apt-get install -y --no-install-recommends \
        locales \
        apt-transport-https \
    && echo "en_US.UTF-8 UTF-8" > /etc/locale.gen \
    && locale-gen \
    && apt-get update \
    && apt-get -y --no-install-recommends install \
        unixodbc-dev \
        msodbcsql17

RUN docker-php-ext-install mbstring pdo pdo_mysql \
    && pecl install sqlsrv pdo_sqlsrv xdebug \
    && docker-php-ext-enable sqlsrv pdo_sqlsrv xdebug

COPY index.php /var/www/html/