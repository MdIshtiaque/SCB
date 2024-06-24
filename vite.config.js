import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { viteSingleFile } from "vite-plugin-singlefile";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/main.js',
            ],
            refresh: true,
        }),
        viteSingleFile()
    ],
    build: {
        outDir: 'public/build/',
        rollupOptions: {
            output: {
                entryFileNames: 'assets/main.js',
                assetFileNames: 'assets/index.css'
            }
        }
    }
});
