FROM php:8.2-apache 
# Install Composer 
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer 
WORKDIR /var/www/html 
COPY . /var/www/html 
RUN composer install --no-dev --optimize-autoloader 
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache 
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache 
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache 
RUN if [ -f .env.example ]; then cp .env.example .env; fi 
EXPOSE 8080 
EXPOSE 8080 
CMD ["apache2-ctl", "-D", "FOREGROUND"] 
