FROM php:8.2-cli

RUN apt-get update && apt-get install -y wget git unzip libicu-dev libzip-dev \
    && docker-php-ext-install intl pdo pdo_mysql zip opcache

# Install Symfony CLI
RUN wget https://get.symfony.com/cli/installer -O - | bash && \
    mv /root/.symfony*/bin/symfony /usr/local/bin/symfony

WORKDIR /app
#COPY . .

CMD ["symfony", "serve", "--no-tls", "--port=8000", "--allow-http", "--allow-all-ip"]
