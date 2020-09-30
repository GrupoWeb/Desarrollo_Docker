FROM php:7.2-apache

# Install Dependencies
RUN apt-get update && apt-get install -y locales unixodbc libgss3 odbcinst apt-transport-https\
    devscripts debhelper dh-exec dh-autoreconf libreadline-dev libltdl-dev \
    unixodbc-dev wget unzip \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install pdo \
    && echo "en_US.UTF-8 UTF-8" > /etc/locale.gen

RUN curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add -
RUN curl https://packages.microsoft.com/config/debian/9/prod.list > /etc/apt/sources.list.d/mssql-release.list
RUN apt-get update
RUN ACCEPT_EULA=Y apt-get install -y msodbcsql mssql-tools
RUN apt-get install -y unixodbc-utf16
RUN apt-get install -y unixodbc-dev-utf16

# install ODBC Driver
RUN ACCEPT_EULA=Y apt-get install -y msodbcsql
RUN apt-get install -y mssql-tools
RUN apt-get install -y unixodbc-dev
RUN echo 'export PATH="$PATH:/opt/mssql-tools/bin"' >> ~/.bash_profile
RUN echo 'export PATH="$PATH:/opt/mssql-tools/bin"' >> ~/.bashrc
RUN exec bash
# RUN apt-get install -y curl wget gnupg
# RUN curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add -

# RUN TEMP_DEB="$(mktemp)" \
#  && wget -O "$TEMP_DEB" 'https://packages.microsoft.com/debian/9/prod/pool/main/m/msodbcsql17/msodbcsql17_17.2.0.1-1_amd64.deb' \
#  && yes | dpkg --skip-same-version -i "$TEMP_DEB" \
#  && rm -f "$TEMP_DEB"

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