#!/bin/bash
set -e  # Arrête le script en cas d'erreur

echo "🚀 Démarrage du conteneur Laravel..."

# Vérifier si le port 5173 est occupé et le libérer
PORT=5173
if lsof -i :$PORT; then
    echo "⚠️ Port $PORT occupé. Libération..."
    fuser -k $PORT/tcp
fi

# Vérifier si .env existe, sinon le créer
if [ ! -f .env ]; then
    echo "⚙️ Création du fichier .env"
    cp .env.example .env
fi

# Générer la clé Laravel si nécessaire
if ! grep -q "APP_KEY=" .env; then
    echo "🔑 Génération de la clé d'application"
    php artisan key:generate
fi

# Appliquer les migrations si nécessaire
echo "📦 Vérification des migrations"
php artisan migrate --force

if [ ! -f /var/www/html/vite.config.js ]; then
  echo "Création de vite.config.js..."
  cat > /var/www/html/vite.config.js <<EOF
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        host: '0.0.0.0',
        port: 5173,
        strictPort: true,
        hmr: {
            host: '192.168.10.22',
        }
    }
});
EOF
fi
# Vérifier et lancer Vite si nécessaire
echo "🚀 Démarrage de Vite..."
npm run dev &

# Lancer PHP-FPM
exec "$@"
