const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  purge: [],
  theme: {
    fontFamily: {
      sans: ['Nunito', ...defaultTheme.fontFamily.sans]
    },
    extend: {
      colors: {
        blue: {
          100: '#ebeefa',
          200: '#c2cbf0',
          300: '#99a9e6',
          400: '#7087dc',
          500: '#4764d1',
          600: '#2e4bb8',
          700: '#233a8f',
          800: '#192965',
          900: '#0f193d'
        }
      }
    }
  },
  variants: {},
  plugins: [],
}