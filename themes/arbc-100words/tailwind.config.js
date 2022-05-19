module.exports = {
    mode: 'jit',
    purge: [
      './views/**/*.twig',
      './assets/src/**/*.js'
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
      extend: {
        colors: {
          primary: '#E4EDD9',
          secondary: '#EAE9EF',
          tertiary: '#F2E7D4',
          accent: '#F5E199',
          black: '#3F3E3D',
          white: '#FBFAF3',
          cream: '#F1EFDB',
          blue: '#D1EBEF',
          yellow: '#FEF1C0',
        }
      },
    },
    variants: {
      extend: {},
    },
    plugins: [],
}
