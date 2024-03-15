# Základní obraz s PHP a Composerem
FROM php:8.3-fpm

# Instalace potřebných balíčků
RUN apt-get update && \
    apt-get install -y zip unzip && \
    apt-get install -y git && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Instalace Composeru
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instalace nástrojů PHPCS a PHPStan
RUN composer global require "squizlabs/php_codesniffer" "phpstan/phpstan"

# Přidání Composeru do PATH
ENV PATH="${PATH}:/root/.composer/vendor/bin"

# Nastavení pracovního adresáře
WORKDIR /app

# Kopírování zdrojových souborů do kontejneru
COPY . .

# Instalace závislostí
RUN composer install

# Příkaz pro spuštění PHP
CMD ["php", "-S", "0.0.0.0:8000", "-t", "www"]