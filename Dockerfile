# Use official PHP + Apache image
FROM php:8.2-apache

# Copy all project files into Apache web root
COPY . /var/www/html/

# Install required PHP extensions (optional but helps most PHP apps)
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Let Render set the port automatically
ENV PORT=8080
RUN sed -i "s/80/${PORT}/g" /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf

# Expose the dynamic port for Render
EXPOSE 8080

# Start Apache in foreground (keeps container alive)
CMD ["apache2ctl", "-D", "FOREGROUND"]
