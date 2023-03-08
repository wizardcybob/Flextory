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
				'DEFAULT': '1rem',
				'sm': '2rem',
				'lg': '4rem',
				'xl': '5rem',
				'2xl': '6rem',
			},
		},
		screens: {
			'xs': '320px',
			'sm': '640px',
			'md': '768px',
			'lg': '1024px',
			'xl': '1200px',
			'2xl': '1600px',
		},
		fontFamily: {
			cursive: ['Kalam', 'cursive'],
		},
		extend: {
			fontFamily: {
				sans: ['Work Sans', 'Nunito', ...defaultTheme.fontFamily.sans],
			},
		},
	},

	plugins: [
		require('@tailwindcss/forms'),
		require('@tailwindcss/typography'),
	],
};
