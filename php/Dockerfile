# FROM leokhoa/laragon:4.0.16.200107
# FROM robsonggade/lampp-server
# FROM tomsik68/xampp

# RUN apt-get update && apt-get install -y nano

# RUN apt-get install curl && apt-get install apt-transport-https \
# curl -sS https://packages.microsoft.com/keys/microsoft.asc | apt-key add - \
# curl -sS https://packages.microsoft.com/config/ubuntu/16.04/prod.list | tee /etc/apt/sources.list.d/msprod.list 

# RUN apt-get update\
# apt-get install mssql-tools unixodbc-dev

# RUN echo 'export PATH="$PATH:/opt/mssql-tools/bin"' >> ~/.bash_profile \
# echo 'export PATH="$PATH:/opt/mssql-tools/bin"' >> ~/.bashrc \
# source ~/.bashrc

# agregado despues que funcion el ultimo from "lampp-server"
# FROM robsonggade/lampp-server:1.3
# FROM eonuki/php-apache-sqlsrv
# FROM peteray/php-apache-mssql:1.0.2



# FROM ubuntu:16.04


# # apt-get and system utilities
# RUN apt-get update && apt-get install -y \
# 	curl apt-transport-https debconf-utils \
#     && rm -rf /var/lib/apt/lists/*

# # adding custom MS repository
# RUN curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add -
# RUN curl https://packages.microsoft.com/config/ubuntu/16.04/prod.list > /etc/apt/sources.list.d/mssql-release.list

# # install SQL Server drivers and tools
# RUN apt-get update && ACCEPT_EULA=Y apt-get install -y msodbcsql mssql-tools
# RUN echo 'export PATH="$PATH:/opt/mssql-tools/bin"' >> ~/.bashrc
# RUN /bin/bash -c "source ~/.bashrc"



# FROM php:7.1-apache
FROM php:7.1-apache

ENV ACCEPT_EULA=Y

# ADD https://raw.githubusercontent.com/mlocati/docker-php-extension-installer/master/install-php-extensions /usr/local/bin/

# RUN chmod uga+x /usr/local/bin/install-php-extensions && sync && \
#     install-php-extensions gd xdebug  sqlsrv pdo_sqlsrv
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