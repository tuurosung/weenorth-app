import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';


export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/modules/users/users.js',
                'resources/js/modules/regions/show-regions.js',
            ],
            refresh: true,
        }),
    ],
});
