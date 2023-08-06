/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
      './assets/**/*.js',
      './templates/**/*.html.twig',
  ],
  theme: {
    extend: {
        colors: {
            primary: '#20f22f'
        }
    },
  },
  plugins: [],
}
