import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                transparent: 'transparent',
                current: 'currentColor',
                'coin': '#0e1523',
                'coin_bg': '#1a2331',
                'green_bg': '#27303c',
                'green_bg_light': '#273030',
                'green_text': '#2fad95',
                'midnight': '#121063',
                'metal': '#565584',
                'hover_link': 'rgb(0 158 247 / 2)',
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
