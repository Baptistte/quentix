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
        host: '0.0.0.0', // Important pour accepter les connexions externes
        port: 5173, // Port interne de Vite dans le container
        strictPort: true,
        hmr: {
            host: '51.210.216.50',
            port: 30000, // <-- Important : c’est le port VISIBLE DE L’EXTÉRIEUR
            protocol: 'ws',
        },
    },
});
