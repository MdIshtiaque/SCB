import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

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
                "gradient-bottom-dark":
                    "linear-gradient(to bottom, rgba(255, 255, 255, 0) 75%, rgba(0, 0, 0, 0.8) 100%), url('/images/background-image.png')",
            },
            colors: {
                "custom-blue": "rgba(5, 116, 234, 0.1)",
                "custom-green": "rgba(56, 210, 0, 0.1)",
            },
            backgroundPosition: {
                "top-30": "50% 30%", // Custom position: 50% from left, 30% from top
            },
        },
        fontFamily: {
            "sans-regular": ["SC Prosper Sans Regular", "Arial", "sans-serif"],
            "sans-medium": ["SC Prosper Sans Medium", "Arial", "sans-serif"],
            "sans-light": ["SC Prosper Sans Light", "Arial", "sans-serif"],
        },
    },

    plugins: [],
};
