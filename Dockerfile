# Use official PHP + Apache image
FROM php:8.2-apache

# Copy all project files into Apache web root
COPY . /var/www/html/

# Ensure permissions are correct
RUN chmod -R 755 /var/www/html/

# Install PHP extensions your app might need
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Make Apache use home.php as the default page before index.php
RUN echo "DirectoryIndex home.php index.php index.html" > /etc/apache2/conf-enabled/directoryindex.conf

# Use Render's assigned port (default 8080)
ENV PORT=8080
RUN sed -i "s/80/${PORT}/g" /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf

# Expose that port
EXPOSE 8080

# Start Apache
CMD ["apache2ctl", "-D", "FOREGROUND"]
