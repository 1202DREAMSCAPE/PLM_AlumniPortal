/** @type {import('tailwindcss').Config} */

import preset from './vendor/filament/support/tailwind.config.preset'
const colors = require('tailwindcss/colors')

export default {
  presets: [preset],
  content: [
      './app/Filament/**/*.php',
      './resources/views/filament/**/*.blade.php',
      './vendor/filament/**/*.blade.php',
  ],
}

module.exports = {
  content: [
    './app/**/*.php',
    './config/**/*.php',
    './resources/**/*.{php,js}',
    './storage/framework/views/*.php',
  ],
  theme: {
    extend: {
      colors: {
        primary: colors.blue,
        transparent: 'transparent',
      },
    },
  },
  plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography'),    require('@tailwindcss/aspect-ratio'),
],
}
