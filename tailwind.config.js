import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // Rotaract official brand color ("Cranberry", PMS 214C, #d41367)
                // remapped onto Tailwind's red scale so every existing
                // bg-red-*/text-red-*/border-red-* class site-wide picks up
                // the brand pink/magenta automatically.
                red: {
                    50: '#fef1f7',
                    100: '#fcdeeb',
                    200: '#f8b9d5',
                    300: '#f486b5',
                    400: '#ee448e',
                    500: '#d41367',
                    600: '#b11056',
                    700: '#910d46',
                    800: '#750b39',
                    900: '#5d092d',
                    950: '#38051b',
                },
            },
        },
    },

    plugins: [forms, typography],
};
