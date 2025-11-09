# Use a base image with PHP (with Apache modules available)
FROM php:8.2-cli

# Install Apache and enable PHP module
RUN apt-get update && \
    apt-get install -y apache2 libapache2-mod-php && \
    a2enmod php8.2

# Copy your project files into the container
COPY . /var/www/html/

# Expose your custom port
EXPOSE 8080

# Tell Apache to listen on port 8080
RUN sed -i 's/80/8080/g' /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf

# Start Apache in the foreground
CMD ["apache2ctl", "-D", "FOREGROUND"]
