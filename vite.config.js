import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import vuetify from 'vite-plugin-vuetify';

export default defineConfig({
    input: [
        'resources/js/app.js',
        'resources/sass/app.scss', // Bootstrap
        'resources/sass/vuetify.scss' // Vuetify
    ],
    resolve: {
        alias: {
            'vue': 'vue/dist/vue.esm-bundler.js',
            '@': '/src',
        }
    },
    plugins: [
        laravel({
            input: ['resources/js/app.js',
                    'resources/sass/app.scss',
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
        vuetify({
            autoImport: true, styles: {
                configFile: 'resources/sass/variables.scss' // Указываем файл переменных
            }
        })
    ],
});
