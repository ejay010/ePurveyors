const { urlWithoutHash } = require('@inertiajs/inertia');
const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'logoprimary': {
                    DEFAULT: '#1e8cfc',
                    'dark': '#0372e4',
                    'light': '#50a6fd',
                },
                'logosecondary': {
                    DEFAULT: '#22313f',
                    'light': '#344b60',
                },
            },
            backgroundImage: {
                'logo-image': "url('/images/lighthouse.png')",
            }
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
