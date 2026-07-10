FROM php:8.2-cli

# timezone
ENV DEBIAN_FRONTEND=noninteractive
ENV TZ=Asia/Bangkok

# ติดตั้ง dependency
RUN apt-get update && apt-get install -y \
    gnupg2 curl wget apt-transport-https lsb-release \
    unixodbc unixodbc-dev zip unzip git nano \
    && rm -rf /var/lib/apt/lists/*

# ติดตั้ง Microsoft ODBC Driver 18
RUN curl -sSL https://packages.microsoft.com/keys/microsoft.asc | gpg --dearmor -o /usr/share/keyrings/microsoft-prod.gpg \
    && echo "deb [arch=amd64 signed-by=/usr/share/keyrings/microsoft-prod.gpg] https://packages.microsoft.com/ubuntu/20.04/prod focal main" > /etc/apt/sources.list.d/mssql-release.list \
    && apt-get update \
    && ACCEPT_EULA=Y apt-get install -y msodbcsql18 mssql-tools18 \
    && rm -rf /var/lib/apt/lists/*

# ติดตั้ง sqlsrv + pdo_sqlsrv ผ่าน pecl
RUN pecl install sqlsrv pdo_sqlsrv \
    && docker-php-ext-enable sqlsrv pdo_sqlsrv

# ติดตั้ง Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]

