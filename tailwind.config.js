const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        fontSize: {
            sm: ['14px', '20px'],
            base: ['16px', '24px'],
            lg: ['20px', '28px'],
            xl: ['24px', '32px'],
        },
        container: {
            padding: {
              DEFAULT: '1rem',
              sm: '2rem',
              lg: '4rem',
              xl: '5rem',
              '2xl': '6rem',
            },
        },
        screens: {
            'sm': '640px',
            'md': '768px',
            'lg': '1024px',
            'xl': '1200px',
            '2xl': '1600px',
        },
        extend: {
            colors: { // ex : bg-primary / bg-primary-dark
                primary: { // blue
                    DEFAULT: '#2E46C9', // btn / title / text...
                    dark: '#003686', // hover
                },
                secondary: { // grey
                    light: '#E7EEF3', // input / row of a table
                    DEFAULT: '#C1C4CF', // row of a table
                    dark: '#80818D', // texte
                },
                valid: '#51BB1E', // valid
                error: '#C63434', // error
                edit: { // btn edit
                    DEFAULT: '#FF9900',
                    dark: '#E58A00', // hover
                },
                delete: { // btn delete
                    DEFAULT: '#C63434',
                    dark: '#930303', // hover
                },
                status: { // status
                    in_progress: '#549FE4', // status 'en cours'
                    to_do: '#C63434', // status 'à faire'
                    done: '#51BB1E', // status 'terminé'
                    archive: '#7C7C7C' // status 'archivé'
                },
                role: { // role
                    student: '#2EB6C9', // student
                    professor: '#C62EC9', // professor
                },
            },
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
