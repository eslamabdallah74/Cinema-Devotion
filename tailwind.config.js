module.exports = {
  purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      width: {
        '96' : '24rem',
      },
    },
    screens: {
        'sm'    : '426px',

        'tablet': '640px',
        // => @media (min-width: 640px) { ... }

        'laptop': '1024px',
        // => @media (min-width: 1024px) { ... }

        'desktop': '1280px',
        // => @media (min-width: 1280px) { ... }
      },
    spinner: (theme) => ({
        default: {
          color: '#dae1e7', // color you want to make the spinner
          size: '1em', // size of the spinner (used for both width and height)
          border: '2px', // border-width of the spinner (shouldn't be bigger than half the spinner's size)
          speed: '500ms', // the speed at which the spinner should rotate
        },
      }),
  },
  variants: {
    extend: {},
  },
  plugins: [
    require('tailwindcss-spinner')({ className: 'spinner', themeKey: 'spinner' }),

  ],
}
