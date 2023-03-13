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
			'xs': ['12px', '16px'],
			'sm': ['14px', '20px'],
			'base': ['16px', '24px'],
			'lg': ['20px', '28px'],
			'xl': ['24px', '32px'],
			'2xl': ['32px', '36px'],
			'3xl': ['44px', '48px'],
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
			'sm': '640px',
			'md': '768px',
			'lg': '1024px',
			'xl': '1200px',
			'2xl': '1600px',
		},
		extend: {
			colors: {
				// ex : bg-primary / bg-primary-dark
				primary: {
					// blue
					DEFAULT: '#0A6E88', // btn / title / text...
					dark: '#004E63', // hover
					darker: '#1E293B', // footer / texte
				},
				secondary: {
					// grey
					light: '#E7EEF3', // input / row of a table
					DEFAULT: '#C1C4CF', // row of a table
					dark: '#80818D', // texte
				},
				tertiary: {
					// orange
					DEFAULT: '#F1892B', // row of a table
					dark: '#D16A0E', // texte
				},
				valid: '#51BB1E', // valid
				error: '#C63434', // error
				view: {
					// btn view
					DEFAULT: '#68649A',
					dark: '#494577', // hover
				},
				edit: {
					// btn edit
					DEFAULT: '#F1892B',
					dark: '#DB7214', // hover
				},
				delete: {
					// btn delete
					DEFAULT: '#C63434',
					dark: '#930303', // hover
				},
				status: {
					// status
					to_do: '#C63434', // status 'à faire'
					in_progress: '#549FE4', // status 'en cours'
					done: '#51BB1E', // status 'terminé'
					archive: '#7C7C7C', // status 'archivé'
				},
				role: {
					// role
					student: '#2EB6C9', // student -> bleu
					professor: '#C62EC9', // professor -> rose
					admin: '#8E00C0', // admin -> violet
					superadmin: '#ccac00', // superadmin -> or
				},
			},
			fontFamily: {
				work: ['Work Sans'],
			},
		},
	},

	plugins: [
		require('@tailwindcss/forms'),
		require('@tailwindcss/typography'),
	],
};
