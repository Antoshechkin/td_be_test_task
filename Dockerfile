FROM php:8.4-fpm

# Установка зависимостей
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    libpq-dev \
    libzip-dev \
    zip \
    mariadb-client \
    && docker-php-ext-install pdo pdo_mysql zip

# Установка Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Создание рабочего каталога
WORKDIR /var/www/html

# Указываем Git, что директория безопасна
RUN git config --global --add safe.directory /var/www/html

# Копирование файлов проекта
COPY . .

# Очистка vendor перед установкой зависимостей
RUN rm -rf vendor/ && composer install --optimize-autoloader

# Настройка прав доступа
RUN chown -R www-data:www-data /var/www/html/var /var/www/html/public
RUN chmod -R 777 /var/www/html/var

# Запуск миграций при старте контейнера
CMD php bin/console doctrine:migrations:migrate --no-interaction && php-fpm
