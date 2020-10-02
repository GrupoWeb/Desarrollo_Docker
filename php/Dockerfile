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

FROM ubuntu:16.04


RUN apt-get update && apt-get install -y curl nano 

RUN curl -sS https://packages.microsoft.com/keys/microsoft.asc | apt-key add - &&  curl -sS https://packages.microsoft.com/config/ubuntu/16.04/prod.list > /etc/apt/sources.list.d/mssql-release.list 

RUN apt-get update 

RUN ACCEPT_EULA=Y apt-get install msodbcsql=13.0.1.0-1 mssql-tools=14.0.2.0-1 \
RUN apt-get install unixodbc-dev-utf16  &&  ln -sfn /opt/mssql-tools/bin/sqlcmd-13.0.1.0 /usr/bin/sqlcmd  && ln -sfn /opt/mssql-tools/bin/bcp-13.0.1.0 /usr/bin/bcp



# RUN curl -sS https://packages.microsoft.com/config/ubuntu/14.04/prod.list > /etc/apt/sources.list.d/mssql-release.list
# RUN apt-get install apt-transport-https ca-certificates

# RUN apt-get update
# RUN ACCEPT_EULA=Y apt-get install msodbcsql17
# RUN ACCEPT_EULA=Y apt-get install mssql-tools
# RUN 'export PATH="$PATH:/opt/mssql-tools/bin"' >> ~/.bash_profile
# RUN 'export PATH="$PATH:/opt/mssql-tools/bin"' >> ~/.bashrc
# RUN source ~/.bashrc

# EXPOSE 80
# EXPOSE 3306



