import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { glob } from "glob";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/buttonTheme.js',

                // Transaction
                ...glob.sync('resources/js/transaction/*.js')
            ],
            refresh: true,
        }),
    ],
});
