import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.scss', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        // усередині контейнера Vite слухає всі інтерфейси
        host: true,        // еквівалент --host
        port: 5173,
        strictPort: true,
        cors: true,        // дозволяє крос-домени з :8000
        origin: 'http://localhost:5173', // що підставлятиметься у <script href=...>
        hmr: {
            host: 'localhost', // куди підключається клієнт HMR із браузера на Windows
            port: 5173,
            protocol: 'ws',
            clientPort: 5173,  // важливо для Windows/WSL
        },
    },
});
