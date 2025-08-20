FROM php:8.3-fpm

# Pacotes do sistema e extensões PHP necessárias ao Laravel + MySQL
RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev libpng-dev libjpeg-dev libfreetype6-dev \
 && docker-php-ext-configure gd --with-freetype --with-jpeg \
 && docker-php-ext-install pdo_mysql zip gd \
 && rm -rf /var/lib/apt/lists/*

# Composer (para instalar dependências do Laravel)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Instalar Node.js e npm
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

WORKDIR /var/www
CMD ["php-fpm"]
