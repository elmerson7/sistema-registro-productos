FROM php:8.2-cli

# Instala dependencias necesarias
RUN apt-get update \
    && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo_pgsql

# Configura el directorio de trabajo
WORKDIR /var/www/html

# Expone el puerto para el servidor PHP
EXPOSE 8000

# Comando para mantener el contenedor activo
CMD ["php", "-S", "0.0.0.0:8000", "-t", "."]
