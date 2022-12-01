module.exports = {
	content: [
		'./resources/**/*.blade.php',
		'./resources/**/*.ts',
		'./resources/**/*.vue',
	],
	theme: {
		extend: {
			colors: {
				'primary-light': "#d7d4ea",
				primary: '#6c62a1',
			},
		},
		fontFamily: {
			'sans': ['Open Sans', 'sans-serif'],
		},
	},
	plugins: [],
}
