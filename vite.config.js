import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';


export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',

                'resources/js/modules/chat/chat.js',
                'resources/js/modules/districts/show-districts.js',
                'resources/js/modules/members/members.js',
                'resources/js/modules/regions/show-regions.js',
                'resources/js/modules/service-centers/service-center.js',
                'resources/js/modules/service-requests/service-request.js',
                'resources/js/modules/trades/trades.js',
                'resources/js/modules/users/users.js',
            ],
            refresh: true,
        }),
    ],
});
