# Usamos una imagen oficial de PHP con Apache
FROM php:8.1-apache

# Instalar las dependencias necesarias
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev git unzip

# Habilitar los módulos de Apache
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd

# Copiar el archivo del proyecto Laravel al contenedor
COPY . /var/www/html

# Instalar Composer para manejar dependencias
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instalar las dependencias de Composer
RUN composer install --no-dev --optimize-autoloader

# Exponer el puerto 80 para acceder a la aplicación
EXPOSE 80

# Iniciar el servidor de Apache
CMD ["apache2-foreground"]
