# Usar la imagen oficial de PHP con Apache
FROM php:8.1-apache

# Instalar dependencias necesarias para Laravel y Composer
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    git \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copiar los archivos del proyecto al contenedor
COPY . /var/www/html

# Establecer el directorio de trabajo a /var/www/html
WORKDIR /var/www/html

# Ejecutar composer install para instalar las dependencias
RUN composer install --no-dev --optimize-autoloader --prefer-dist

# Exponer el puerto 80 para acceder a la aplicación
EXPOSE 80

# Iniciar Apache en primer plano
CMD ["apache2-foreground"]
