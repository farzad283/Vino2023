/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
   './resources/**/*.{blade.php,vue,js}'
  ],
  theme: {
    extend: {
      colors: {
        'dark-red': '#251322',
        'red': '#9B0738',
        'pale-pink': '#FB7F6',
        'gold': '#927A50',
      }
    },
  },
  plugins: [],
}

