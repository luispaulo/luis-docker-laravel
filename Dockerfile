FROM php:8.2-cli

# Definir diretório de trabalho
WORKDIR /var/www

# Instalar dependências do sistema e extensões do PHP
RUN apt-get update && apt-get install -y \
    unzip \
    curl \
    libsqlite3-dev \
    && docker-php-ext-install pdo pdo_sqlite

# Copiar o Composer para dentro do container
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Expor a porta do Laravel
EXPOSE 8000

# Comando padrão do container
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
