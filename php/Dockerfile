FROM php:7.2-apache

# Install Dependencies
RUN apt-get update && apt-get install -y locales unixodbc libgss3 odbcinst \
    devscripts debhelper dh-exec dh-autoreconf libreadline-dev libltdl-dev \
    unixodbc-dev wget unzip \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install pdo \
    && echo "en_US.UTF-8 UTF-8" > /etc/locale.gen

# Compile odbc_config
RUN cd /usr/local/src/ && dget -ux http://http.debian.net/debian/pool/main/u/unixodbc/unixodbc_2.3.1-3.dsc \
    && cd unixodbc-2.3.1/ && apt-get update && dpkg-buildpackage -uc -d -us -B && cp ./exe/odbc_config /usr/local/bin/

## Microsoft ODBC Driver 13 for Linux
RUN cd /usr/local/src/ \
    && wget https://download.microsoft.com/download/2/E/5/2E58F097-805C-4AB8-9FC6-71288AB4409D/msodbcsql-13.0.0.0.tar.gz \
    && tar xf msodbcsql-13.0.0.0.tar.gz && cd msodbcsql-13.0.0.0/ \
    && ldd lib64/libmsodbcsql-13.0.so.0.0; echo "RET=$?" \
    && sed -i 's/$(uname -p)/"x86_64"/g' ./install.sh \
    && ./install.sh install --force --accept-license

# Add Microsoft repo for Microsoft ODBC Driver 17 for Linux
# RUN curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add - \
#     && curl https://packages.microsoft.com/config/debian/9/prod.list > /etc/apt/sources.list.d/mssql-release.list

# RUN apt-get update && ACCEPT_EULA=Y apt-get install -y \
#     apt-transport-https \
#     msodbcsql17

# Enable the php extensions.
RUN pecl install pdo_sqlsrv-5.6.1 sqlsrv-5.6.1 \
    && docker-php-ext-enable pdo_sqlsrv sqlsrv
    

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- \
        --install-dir=/usr/local/bin \
        --filename=composer


# The path that will be used to make Apache run under that user
ENV VOLUME_PATH /var/www/html/public

# Move files
# COPY src/ /var/www/html/

# COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www/html/

RUN chown -R www-data:www-data /var/www/html/ \
    && a2enmod rewrite