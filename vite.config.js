import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/custom.css',
                'resources/scss/piano.scss',
                'resources/js/app.js',
                'resources/js/bootstrap.js',
                'resources/js/main.js',
                'resources/js/test.js', 
            ],
            refresh: true,
        }),
    ],
});
