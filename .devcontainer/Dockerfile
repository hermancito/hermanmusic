FROM php:8.3-cli

RUN apt-get update && apt-get install -y \
    git unzip libicu-dev curl default-mysql-client mariadb-server \
    && docker-php-ext-install intl pdo pdo_mysql

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- \
    --install-dir=/usr/local/bin \
    --filename=composer

# Instalar Node LTS
RUN curl -fsSL https://deb.nodesource.com/setup_lts.x | bash - \
    && apt-get install -y nodejs
