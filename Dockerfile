# Use official PHP + Apache image
FROM php:8.2-apache

# Set working directory to Apache web root
WORKDIR /var/www/html

# Copy everything from the repository into the container
COPY ./ ./

# Set correct permissions
RUN chmod -R 755 /var/www/html

# Install PHP extensions (for MySQL etc.)
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Make Apache serve home.php first if available
RUN echo "DirectoryIndex home.php index.php index.html" > /etc/apache2/conf-enabled/directoryindex.conf

# Tell Apache to listen on Render’s dynamic port
ENV PORT=8080
RUN sed -i "s/80/${PORT}/g" /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf

# Expose that port
EXPOSE 8080

# Start Apache in foreground
CMD ["apache2ctl", "-D", "FOREGROUND"]
