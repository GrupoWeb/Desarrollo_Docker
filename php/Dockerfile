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
FROM robsonggade/lampp-server:1.0
EXPOSE 80
EXPOSE 3306