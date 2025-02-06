# Usa la imagen oficial de PHP con Apache
FROM php:apache  

# Instala las extensiones necesarias
RUN docker-php-ext-install mysqli pdo_mysql

# Copia los archivos del proyecto a la carpeta del servidor
COPY . /var/www/html/  

# Expone el puerto 80
EXPOSE 80
