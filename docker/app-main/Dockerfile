FROM php:8.1-apache

RUN a2enmod rewrite \
    && a2enmod headers \
    && a2enmod remoteip \
    && a2enmod deflate

RUN set -xe \
    && apt-get update \
    && apt-get install -y \
        libzip-dev \
        unzip \
        curl \
        && docker-php-ext-install zip \
        && docker-php-ext-install pdo_mysql \
        && docker-php-ext-install bcmath

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --version=2.2.5 --filename=composer

# Setup Volume
VOLUME ["/var/www/html"]

# Configure Apache
COPY ./ /var/www/html/
WORKDIR /var/www/html

# Set up the command arguments
CMD ["-D", "FOREGROUND"]
ENTRYPOINT ["/usr/sbin/apache2ctl"]

# Expose Apache
EXPOSE 80
