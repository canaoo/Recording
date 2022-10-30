import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resouces/scss/piano.scss',
                'resouces/scss/piano.css',
                'resouces/scss/piano.css.map',
                'resources/js/app.js',
                'resources/js/bootstrap.js',
                'resources/js/main.js',
                'resources/js/test.js', 
            ],
            refresh: true,
        }),
    ],
});
