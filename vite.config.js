import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/main.js"],
            refresh: true,
        }),
    ],
    css: {
        postcss: {
            plugins: [require("tailwindcss"), require("autoprefixer")],
        },
    },
    build: {
        rollupOptions: {
            output: {
                entryFileNames: "js/main.js", // Output JavaScript as main.js
                chunkFileNames: "js/[name].js", // Name chunks logically
                assetFileNames: ({ name }) => {
                    if (name.endsWith(".css")) return "css/index.css"; // Output CSS as index.css
                    return "assets/[name].[ext]"; // Output other assets
                },
            },
        },
    },
});
