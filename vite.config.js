import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/scss/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        vue({
            template:{
                transformAssetUrls:{
                    base:null,
                    includeAbsolute:false
                },
                compilerOptions:{
                    "paths": {
                        "@/*": [
                          "/resources/js/vue/*" // set path `@/*` as alias of `src/*`
                        ],
                      },
                }
            }
        })

    ],
});
