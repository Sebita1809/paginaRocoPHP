# paginaRocoPHP
FROM php:8.2-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY . /var/www/html/

# Set permissions
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html

# Expose port 80
EXPOSE 80



-----------------------------------------

version: '3.8'

services:
  app:
    build:
      context: .
      dockerfile: Dockerfile
    container_name: php_app
    restart: unless-stopped
    ports:
      - "8080:80"
    volumes:
      - .:/var/www/html
    depends_on:
      - db
    networks:
      - app-network

  db:
    image: mysql:8.0
    container_name: mysql_db
    restart: unless-stopped
    environment:
      MYSQL_DATABASE: 2dosemestreglobalprogramacion
      MYSQL_ROOT_PASSWORD: root_password
      MYSQL_PASSWORD: db_password
      MYSQL_USER: db_user
    volumes:
      - dbdata:/var/lib/mysql
      - ./2dosemestreglobalprogramacion.sql:/docker-entrypoint-initdb.d/2dosemestreglobalprogramacion.sql
    ports:
      - "3306:3306"
    networks:
      - app-network

networks:
  app-network:
    driver: bridge

volumes:
  dbdata:
    driver: local



    -----------------------------------------------

    <?php

class Conexion{
    static public function conectar(){
        $link = new PDO("mysql:host=db; port=3306; dbname=2dosemestreglobalprogramacion","db_user","db_password");
        $link ->exec("set names utf8");
        return $link;
    }
    // ... existing code ...
}


---------------------------------------------------

docker-compose up -d


--------------------------------------

docker-compose down


------------------------------------------

docker-compose logs -f
