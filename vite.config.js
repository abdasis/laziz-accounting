import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

import livewire, {defaultWatches} from '@defstudio/vite-livewire-plugin'; // <-- import

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
            ],
            refresh: ['resources/views/**']
        }),

        livewire({
            refresh: ['resources/css/app', 'resources/views/**'],
            watch: [
                ...defaultWatches,
                '**/domains/**/Livewire/**/*.php',
            ]
        }),
    ],

    resolve: {
        alias: {
            '@': '/resources/js'
        }
    }
});
