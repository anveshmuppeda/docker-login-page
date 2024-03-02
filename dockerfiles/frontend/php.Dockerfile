FROM php:7.4-apache

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

WORKDIR /var/www/html

COPY ./frontend/src/ /var/www/html/

# Command to run the PHP built-in server
CMD ["php", "-S", "0.0.0.0:80"]
