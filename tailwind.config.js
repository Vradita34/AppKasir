/** @type {import('tailwindcss').Config} */
const colors = require('tailwindcss/colors')
export default {
    darkMode: 'class',
    // darkMode: 'media',
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
      ],
      theme: {
        screens: {
          sm: '480px',
          md: '768px',
          lg: '976px',
          xl: '1440px',
        },
        colors: {
          gray: colors.coolGray,
          blue: colors.lightBlue,
          red: colors.rose,
          pink: colors.fuchsia,
        },
        fontFamily: {
          sans: ['Graphik', 'sans-serif'],
          serif: ['Merriweather', 'serif'],
        },
        extend: {
          spacing: {
            '128': '32rem',
            '144': '36rem',
          },
          borderRadius: {
            '4xl': '2rem',
          }
        }
      },
      plugins: [
        require('flowbite/plugin')({
            charts: true,
        }),
      ],
}

