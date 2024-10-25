import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
    ],

    theme: {
        extend: {},
        colors: {
            'primary': '#17DF99',
            'secondary': '#F4A719',
            'proses' : '#ABAAAA',
            'reject' : '#F41919'
          },
          fontFamily: {
              'inter' : ['Inter', 'sans-serif'],
          },
    },

    plugins: [
        forms,
        require('flowbite/plugin')
    ],
};
