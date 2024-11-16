# Usar la imagen oficial de PHP con Apache
FROM php:8.1-apache

# Instalar dependencias necesarias para Laravel y Composer
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    libicu-dev \
    libxml2-dev \
    git \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql mbstring zip opcache intl

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copiar los archivos del proyecto al contenedor
COPY . /var/www/html

# Establecer el directorio de trabajo a /var/www/html
WORKDIR /var/www/html

# Establecer los permisos adecuados para los archivos
RUN chown -R www-data:www-data /var/www/html

# Limpiar la caché de Composer (opcional)
RUN composer clear-cache

# Ejecutar composer install
RUN composer install --no-dev --optimize-autoloader --prefer-dist --no-interaction --verbose

# Exponer el puerto 80 para acceder a la aplicación
EXPOSE 80

# Iniciar Apache en primer plano
CMD ["apache2-foreground"]
