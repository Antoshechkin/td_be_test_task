# Используем образ PHP 8.4 с поддержкой Apache
FROM php:8.4-apache

# Устанавливаем необходимые пакеты
RUN apt-get update && apt-get install -y \
        libzip-dev \
        zip \
        unzip \
        git \
        curl \
        nano \
        openssh-client \
        && docker-php-ext-install pdo_mysql zip

# Установка Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Копируем файлы проекта в контейнер
COPY . /var/www/html/

# Устанавливаем зависимости Composer
WORKDIR /var/www/html
RUN composer install --no-interaction --prefer-dist

# Настраиваем права доступа
RUN chown -R www-data:www-data /var/www/html
RUN chmod +x /var/www/html/bin/console

# Открываем порт 80 для Apache
EXPOSE 80