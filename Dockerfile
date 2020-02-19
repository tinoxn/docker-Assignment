FROM php:apache
RUN docker-php-ext-install mysqli
COPY src/ /var/www/html/
VOLUME /var/www/html/
EXPOSE 80
