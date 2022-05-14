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
          primary: 'var(--primary)',
          secondary: 'var(--secondary)',
          tertiary: 'var(--tertiary)',
          accent: 'var(--accent)',
          black: 'var(--black)',
          white: 'var(--white)',
        }
      },
    },
    variants: {
      extend: {},
    },
    plugins: [],
}
