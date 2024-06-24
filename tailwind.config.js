import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    theme: {
        extend: {
            backgroundImage: {
                'gradient-bottom-dark': "linear-gradient(to bottom, rgba(255, 255, 255, 0) 75%, rgba(0, 0, 0, 0.8) 100%), url('/images/background-image.png')"
            },
            colors: {
                'custom-blue': 'rgba(5, 116, 234, 0.1)',
                'custom-green': 'rgba(56, 210, 0, 0.1)',
            },
        }
    },

    plugins: [],
};
