# FROM piquet/php72-mssql-docker:latest
# FROM gjuniioor/php-sqlsrv:latest
FROM php:7.2-apache


RUN wget https://download.microsoft.com/download/e/4/e/e4e67866-dffd-428c-aac7-8d28ddafb39b/msodbcsql17_17.5.1.1-1_amd64.apk && \
    wget https://download.microsoft.com/download/e/4/e/e4e67866-dffd-428c-aac7-8d28ddafb39b/mssql-tools_17.5.1.1-1_amd64.apk && \
    apk add --allow-untrusted msodbcsql17_17.5.1.1-1_amd64.apk && \
    apk add --allow-untrusted mssql-tools_17.5.1.1-1_amd64.apk && \
    apk add --no-cache --virtual .phpize-deps $PHPIZE_DEPS unixodbc-dev && \
    pecl install pdo_sqlsrv && \
    docker-php-ext-enable pdo_sqlsrv && \
    apk del .phpize-deps && \
    rm msodbcsql17_17.5.1.1-1_amd64.apk && \
    rm mssql-tools_17.5.1.1-1_amd64.apk
    
# # Install Dependencies
# RUN apt-get update && apt-get install -y locales unixodbc libgss3 odbcinst \
#     devscripts debhelper dh-exec dh-autoreconf libreadline-dev libltdl-dev \
#     unixodbc-dev wget unzip \
#     && rm -rf /var/lib/apt/lists/* \
#     && docker-php-ext-install pdo \
#     && echo "en_US.UTF-8 UTF-8" > /etc/locale.gen

# # Add Microsoft repo for Microsoft ODBC Driver 17 for Linux
# RUN curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add - \
#     && curl https://packages.microsoft.com/config/debian/9/prod.list > /etc/apt/sources.list.d/mssql-release.list

# RUN apt-get update && ACCEPT_EULA=Y apt-get install -y \
#     apt-transport-https \
#     unixodbc-dev msodbcsql 

# # install SQL Server tools
# RUN apt-get update && ACCEPT_EULA=Y apt-get install -y mssql-tools
# RUN echo 'export PATH="$PATH:/opt/mssql-tools/bin"' >> ~/.bashrc
# RUN /bin/bash -c "source ~/.bashrc"

# # Enable the php extensions.
# RUN pecl install pdo_sqlsrv-5.8.0 sqlsrv-5.8.1 \
#     && docker-php-ext-enable pdo_sqlsrv sqlsrv

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