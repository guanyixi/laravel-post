const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        screens: {
            'sm': { 'min': '640px' },
            'md': { 'min': '768px' },
            'lg': { 'min': '1024px' },
            'xl': { 'min': '1280px' },
            'xxl': { 'min': '1440px' }
        },
        colors: {
            transparent: 'transparent',
            // OUTDATED COLORS
            muted: '#EAEBEF',
            // NEUTRAL COLORS
            dark: '#343841',
            light: '#f5f6f7',
            white: '#FFFFFF',
            // GRAY COLORS
            'gray-100': '#EAEBEF',
            'gray-200': '#d5d7db',
            'gray-300': '#c3c5ca',
            'gray-400': '#b1b4b9',
            'gray-500': '#a0a3a9',
            'gray-600': '#85878c',
            'gray-700': '#6a6c70',
            'gray-800': '#4c4c4f',

            'primary-100': '#D5D6DC',
            'primary-200': '#ACB0BD',
            'primary-300': '#6B758A',
            'primary-400': '#384E67',
            'primary-500': '#033652',
            'primary-600': '#002B40',
            'primary-700': '#072130',
            'primary-800': '#091821',

            'secondary-100': '#FFEED0',
            'secondary-200': '#FFE6B4',
            'secondary-300': '#FFDD99',
            'secondary-400': '#FFD57E',
            'secondary-500': '#FED170',
            'secondary-600': '#FEBF3D',
            'secondary-700': '#FCB41C',
            'secondary-800': '#E89D00',

            'tertiary-100': '#FDE5E6',
            'tertiary-200': '#FAC7CC',
            'tertiary-300': '#F6A2AF',
            'tertiary-400': '#F382A0',
            'tertiary-500': '#F0547D',
            'tertiary-600': '#ED3665',
            'tertiary-700': '#DC1C4A',
            'tertiary-800': '#C91343',

            'accent-100': '#D5EBE8',
            'accent-200': '#C3E3DF',
            'accent-300': '#9DD3CD',
            'accent-400': '#75C5BC',
            'accent-500': '#00B2A4',
            'accent-600': '#00A194',
            'accent-700': '#029085',
            'accent-800': '#007F75'
        },
        fontFamily: {
            primary: ['Montserrat', 'sans-serif'],
            secondary: ['Nunito Sans', 'sans-serif']
        },
        extend: {

        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
