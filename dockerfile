# Base image do PHP com FPM
FROM php:8.1-fpm

# Instalar dependências do sistema
RUN apt-get update && apt-get install -y \
    zip unzip git curl libzip-dev && \
    docker-php-ext-install pdo_mysql zip

# Verificar e instalar o PHP caso necessário
RUN if ! php -v > /dev/null 2>&1; then \
    add-apt-repository ppa:ondrej/php && \
    apt-get update && apt-get install -y php8.1 php8.1-fpm; \
    fi

# Instalar o Composer globalmente
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Definir o diretório de trabalho no container
WORKDIR /var/www

# Copiar os arquivos do projeto Laravel para o container
COPY ./laravel /var/www

# Verificar se o arquivo .env existe; se não, criar a partir do .env.exemplo
RUN if [ ! -f ".env" ] && [ -f ".env.example" ]; then cp .env.example .env; fi

# Instalar as dependências do Laravel via Composer
RUN if [ -f "composer.json" ]; then composer install --optimize-autoloader --no-dev; fi

# Gerar a chave de aplicação do Laravel
RUN if [ -f "artisan" ]; then php artisan key:generate; fi

# Ajustar permissões para o servidor web
RUN chown -R www-data:www-data /var/www && \
    chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Expor a porta padrão do PHP-FPM
EXPOSE 9000

# Comando padrão para iniciar o PHP-FPM
CMD ["php-fpm"]
