module.exports = {
  purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
    container: {
        padding: {
            DEFAULT: '1rem',
            sm: '2rem',
            lg: '4rem',
            xl: '5rem',
            '2xl': '6rem',
          },
      },
    extend: {
        colors: {
            "awesome-color": "#56b890",
          },
        backgroundImage: theme => ({
            'hero-lg': "url('/storage/images/header_bg.webp')",
           })
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
