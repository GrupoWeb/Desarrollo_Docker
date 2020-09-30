# FROM piquet/php72-mssql-docker:latest
# FROM gjuniioor/php-sqlsrv:latest
FROM php:7.2-apache

# Install selected extensions and other stuff
RUN apt-get update \
    && apt-get -y --no-install-recommends install wget php-memcached php7.2-mysql php-redis php7.2-bz2 php7.2-gd php-imagick php7.2-odbc php7.2-xmlrpc php-yaml \
    && apt-get -y install unixodbc-dev; apt-get -y install php-pear; apt-get install -y php7.2-dev;\
    pecl install sqlsrv pdo_sqlsrv;

# Install ODBC
RUN wget https://packages.microsoft.com/ubuntu/17.04/prod/pool/main/m/msodbcsql/msodbcsql_13.1.9.1-1_amd64.deb;
RUN apt-get -y install unixodbc libcurl3;
RUN ACCEPT_EULA=Y \
    dpkg -i msodbcsql_13.1.9.1-1_amd64.deb;
RUN apt-get install -y locales \
    && echo "en_US.UTF-8 UTF-8" > /etc/locale.gen\
    && locale-gen;

    
# FROM php:7.1-apache
# ENV ACCEPT_EULA=Y

# # Microsoft SQL Server Prerequisites
# RUN apt-get update \
#     && curl -sS https://packages.microsoft.com/keys/microsoft.asc | apt-key add - \
#     && curl -sS https://packages.microsoft.com/config/debian/9/prod.list \
#         > /etc/apt/sources.list.d/mssql-release.list \
#     && apt-get install -y --no-install-recommends \
#         locales \
#         apt-transport-https \
#     && echo "en_US.UTF-8 UTF-8" > /etc/locale.gen \
#     && locale-gen \
#     && apt-get update \
#     && apt-get -y --no-install-recommends install \
#         unixodbc-dev \
#         msodbcsql17

# RUN docker-php-ext-install mbstring pdo pdo_mysql \
#     && pecl install sqlsrv pdo_sqlsrv xdebug \
#     && docker-php-ext-enable sqlsrv pdo_sqlsrv xdebug

# # COPY index.php /var/www/html/