#!/bin/sh
# AYULTA container entrypoint.
# - Requires a stable APP_KEY from the environment (never generates one).
# - Renders the Nginx config for Render's dynamic $PORT.
# - Caches configuration, routes, views and events with the runtime env.
set -eu

cd /var/www/html

: "${PORT:=10000}"
export PORT

if [ -z "${APP_KEY:-}" ]; then
    echo "[ayulta] ERROR: APP_KEY no está definida. Configúrala en Render (Environment) y vuelve a desplegar." >&2
    exit 1
fi

mkdir -p /etc/nginx/conf.d
envsubst '${PORT}' < /etc/nginx/templates/default.conf.template > /etc/nginx/conf.d/default.conf

mkdir -p storage/app/private storage/framework/cache/data storage/framework/sessions \
    storage/framework/views storage/logs bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache

php artisan optimize --no-interaction
chown -R www-data:www-data storage bootstrap/cache

nginx -t -q

echo "[ayulta] Escuchando en 0.0.0.0:${PORT}"
exec "$@"
