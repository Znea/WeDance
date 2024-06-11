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
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                primary: ['Voltaire', ...defaultTheme.fontFamily.sans]
            },
            fontSize: {
                xxl: '50px',
                xl: '45px',
                lg: '40px',
                md: '35px',
                sm: '30px',
                xs: '25px',
            }
        },
        colors:{
            primary: '#D67976',
            secondary: '#398D99',
            darken: '#011627',
            destacar: '#064152',
            fondo: '#F0D9D8',
            white: '#FFFFFF',
            transparent: 'transparent',
        }
    },

    plugins: [forms],
};
