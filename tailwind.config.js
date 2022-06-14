module.exports = {
  content: ['./site/**/*.{html,js,php}'],
  theme: {
    extend: {
      screens: {
        'sm': '640px',
      // => @media (min-width: 640px) { ... }

      'md': '768px',
      // => @media (min-width: 768px) { ... }

      'lg': '1024px',
      // => @media (min-width: 1024px) { ... }

      'xl': '1280px',
      // => @media (min-width: 1280px) { ... }

      '2xl': '1536px',
      // => @media (min-width: 1536px) { ... }
      },
      colors: {
        basicDark : '#1F2041',
        lightViolet : '#5D4F8B',
        basicViolet : '#403866',
        darkerViolet : '#262242',
        basicWhite : '#DCDACB',
        darkerWhite : '#878475',
        lighterWhite : '#FFFCED',
        black : '#000000',
        errorRed : '#FF0505',
      },
      fontFamily : {
        classicFont : ['Montserrat',' sans-serif'],
      },
    },
  },
  plugins: [],
}