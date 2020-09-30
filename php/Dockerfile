# FROM piquet/php72-mssql-docker:latest
# # FROM gjuniioor/php-sqlsrv:latest
# FROM php:7.2-apache
FROM php:7.1-apache

# Get repository and install wget and vim
RUN apt-get update && apt-get install --no-install-recommends -y \
        wget \
        gnupg \
        git \
        unzip 
        

# Install PHP extensions deps
RUN apt-get update \
    && apt-get install --no-install-recommends -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        zlib1g-dev \
        libicu-dev \
        g++ \
        unixodbc-dev \
        libxml2-dev \
        libaio-dev \
        libmemcached-dev \
        freetds-dev \
        libssl-dev \
        openssl

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- \
        --install-dir=/usr/local/bin \
        --filename=composer

# # adding custom MS repository
# RUN curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add -
# RUN curl https://packages.microsoft.com/config/ubuntu/16.04/prod.list > /etc/apt/sources.list.d/mssql-release.list

# # install SQL Server drivers
# RUN apt-get update && ACCEPT_EULA=Y apt-get install -y unixodbc-dev msodbcsql 

# # install SQL Server tools
# RUN apt-get update && ACCEPT_EULA=Y apt-get install -y mssql-tools
# RUN echo 'export PATH="$PATH:/opt/mssql-tools/bin"' >> ~/.bashrc
# RUN /bin/bash -c "source ~/.bashrc"

RUN   curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add - \
        && curl https://packages.microsoft.com/config/debian/9/prod.list > /etc/apt/sources.list.d/mssql-release.list \
        && apt-get update \
        && ACCEPT_EULA=Y apt-get install --yes --no-install-recommends msodbcsql17 \
        && install2.r odbc \
        && apt-get clean \
        && rm -rf /var/lib/apt/lists/* \
        && rm -rf /tmp/*

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-configure pdo_dblib --with-libdir=/lib/x86_64-linux-gnu \
    && pecl install sqlsrv-5.6.1 \
    && pecl install pdo_sqlsrv-5.6.1 \
    && pecl install redis \
    && pecl install memcached \
    && pecl install xdebug \
    && docker-php-ext-install \
            iconv \
            mbstring \
            intl \
            mcrypt \
            gd \
            mysqli \
            pdo_mysql \
            pdo_dblib \
            soap \
            sockets \
            zip \
            pcntl \
            ftp \
    && docker-php-ext-enable \
            sqlsrv \
            pdo_sqlsrv \
            redis \
            memcached \
            opcache \
            xdebug

# Install APCu and APC backward compatibility
RUN pecl install apcu \
    && pecl install apcu_bc-1.0.3 \
    && docker-php-ext-enable apcu --ini-name 10-docker-php-ext-apcu.ini \
    && docker-php-ext-enable apc --ini-name 20-docker-php-ext-apc.ini

# Clean repository
RUN apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# The path that will be used to make Apache run under that user
ENV VOLUME_PATH /var/www/html/public

# Move files
# COPY src/ /var/www/html/

# COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www/html/

RUN chown -R www-data:www-data /var/www/html/ \
    && a2enmod rewrite