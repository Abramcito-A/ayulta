# syntax=docker/dockerfile:1

# =============================================================================
# AYULTA — production image for Render (Web Service, Docker runtime)
# Nginx + PHP-FPM managed by Supervisor. No database required.
# =============================================================================

ARG PHP_VERSION=8.4
ARG NODE_VERSION=22

# -----------------------------------------------------------------------------
# 1) Front-end assets (Vite + Tailwind). Node is only used at build time.
# -----------------------------------------------------------------------------
FROM node:${NODE_VERSION}-alpine AS assets

WORKDIR /app

COPY package.json package-lock.json ./
RUN npm ci --no-audit --no-fund

COPY vite.config.js ./
COPY resources ./resources
RUN npm run build

# -----------------------------------------------------------------------------
# 2) PHP dependencies without development packages.
# -----------------------------------------------------------------------------
FROM composer:2 AS vendor

WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install \
        --no-dev \
        --no-interaction \
        --no-progress \
        --no-scripts \
        --no-autoloader \
        --prefer-dist \
        --ignore-platform-req=php

COPY . .
RUN composer dump-autoload --no-dev --optimize --classmap-authoritative --no-scripts

# -----------------------------------------------------------------------------
# 3) Runtime: PHP-FPM + Nginx + Supervisor.
# -----------------------------------------------------------------------------
FROM php:${PHP_VERSION}-fpm-alpine AS runtime

RUN apk add --no-cache nginx supervisor gettext \
    && docker-php-ext-install opcache \
    && rm -rf /var/cache/apk/* /tmp/*

COPY docker/php/php.ini /usr/local/etc/php/conf.d/zz-ayulta.ini
COPY docker/php/www.conf /usr/local/etc/php-fpm.d/zz-www.conf
COPY docker/nginx/nginx.conf /etc/nginx/nginx.conf
COPY docker/nginx/default.conf.template /etc/nginx/templates/default.conf.template
COPY docker/supervisord.conf /etc/supervisord.conf
COPY docker/entrypoint.sh /usr/local/bin/entrypoint
RUN sed -i 's/\r$//' /usr/local/bin/entrypoint && chmod +x /usr/local/bin/entrypoint

WORKDIR /var/www/html

COPY --chown=www-data:www-data --from=vendor /app /var/www/html
COPY --chown=www-data:www-data --from=assets /app/public/build /var/www/html/public/build

# Writable runtime directories (ephemeral on Render's free plan).
RUN mkdir -p storage/app/private storage/app/public storage/framework/cache/data \
        storage/framework/sessions storage/framework/views storage/logs bootstrap/cache \
    && rm -f public/hot bootstrap/cache/*.php \
    && php artisan package:discover --ansi \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R ug+rwX storage bootstrap/cache

# Non-secret production defaults. Secrets (APP_KEY) are provided by Render.
ENV APP_ENV=production \
    APP_DEBUG=false \
    LOG_CHANNEL=stderr \
    LOG_LEVEL=info \
    SESSION_DRIVER=cookie \
    SESSION_SECURE_COOKIE=true \
    CACHE_STORE=file \
    QUEUE_CONNECTION=sync \
    FILESYSTEM_DISK=local \
    APP_MAINTENANCE_DRIVER=file \
    BROADCAST_CONNECTION=log \
    MAIL_MAILER=log \
    DEMO_USERS_DRIVER=cookie \
    PORT=10000

EXPOSE 10000

STOPSIGNAL SIGTERM

HEALTHCHECK --interval=30s --timeout=5s --start-period=20s --retries=3 \
    CMD wget -qO- "http://127.0.0.1:${PORT}/up" > /dev/null || exit 1

ENTRYPOINT ["entrypoint"]
CMD ["supervisord", "-c", "/etc/supervisord.conf"]
