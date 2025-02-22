# Base image do PHP com FPM
FROM php:8.1-fpm

# Habilitar repositórios adicionais
RUN echo "deb http://deb.debian.org/debian bookworm main" > /etc/apt/sources.list.d/debian.list

# Instalar dependências do sistema com diagnóstico detalhado
RUN apt-get update --fix-missing && apt-get install -y --no-install-recommends \
    zip unzip git curl libzip-dev libxml2-dev libgd-dev pkg-config build-essential && \
    apt-get clean

# Instalar o pacote oniguruma-dev com um método alternativo (se necessário)
RUN apt-get update && apt-get install -y --no-install-recommends \
    libonig-dev && \
    docker-php-ext-install pdo_mysql zip mbstring xml gd && \
    apt-get clean

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

# Instalar o pacote maatwebsite/excel versão 3.1
RUN composer require maatwebsite/excel:^3.1

# Instalar o Sanctum para garantir que ele esteja presente
RUN composer require laravel/sanctum

# Gerar a chave de aplicação do Laravel
RUN if [ -f "artisan" ]; then php artisan key:generate; fi

# Ajustar permissões para o servidor web
RUN chown -R www-data:www-data /var/www && \
    chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Expor a porta padrão do PHP-FPM
EXPOSE 9000

# Comando padrão para iniciar o PHP-FPM
CMD ["php-fpm"]
