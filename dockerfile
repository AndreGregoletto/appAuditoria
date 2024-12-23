# Usar uma imagem base Debian com PHP 8.1
FROM debian:bullseye-slim

# Instalar dependências do sistema e o PHP
RUN apt-get update && apt-get install -y \
    curl zip unzip git libzip-dev libpng-dev libjpeg-dev libfreetype6-dev \
    libxml2-dev libicu-dev libssl-dev libcurl4-openssl-dev && \
    apt-get clean

# Adicionar repositório do PHP e instalar PHP 8.1 com as extensões necessárias
RUN curl -sSL https://packages.sury.org/php/README.txt | bash - && \
    apt-get update && apt-get install -y \
    php8.1 php8.1-cli php8.1-fpm php8.1-mysql php8.1-zip php8.1-gd php8.1-xml php8.1-intl && \
    apt-get clean

# Instalar o Composer globalmente
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Verificar a instalação do PHP e Composer
RUN php -v && composer --version

# Definir o diretório de trabalho no container
WORKDIR /var/www

# Copiar os arquivos do projeto Laravel para o container
COPY ./laravel /var/www

# Verificar se o arquivo .env existe; se não, criar a partir do .env.exemplo
RUN if [ ! -f ".env" ] && [ -f ".env.example" ]; then cp .env.example .env; fi

# Instalar as dependências do Laravel via Composer
RUN composer install --optimize-autoloader --no-dev --no-interaction --prefer-dist

# Gerar a chave de aplicação do Laravel
RUN php artisan key:generate

# Ajustar permissões para o servidor web
RUN chown -R www-data:www-data /var/www && \
    chmod -R 775 /var/www/storage /var/www/bootstrap/cache /var/www/vendor

# Expor a porta padrão do PHP-FPM
EXPOSE 9000

# Comando padrão para iniciar o PHP-FPM
CMD ["php-fpm"]
