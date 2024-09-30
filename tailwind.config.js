const withMT = require("@material-tailwind/html/utils/withMT");

module.exports = withMT({
  content: [
    './app/Views/*.php',
    './app/Views/**/*.php',
    './app/Views/**/**/*.php',
    './app/Views/**/**/**/*.php',
  ],
  theme: {
    screens: {
      sm: '480px',
      md: '768px',
      lg: '976px',
      xl: '1440px',
    },
    fontFamily: {
      'body': [
        'Inter',
        'ui-sans-serif',
        'system-ui',
      ],
      'sans': [
        'Inter',
        'ui-sans-serif',
        'system-ui',
      ]
    },
    extend: {
      colors: {
        primary: '#2C7865',
        primaryhover: '#235F51',
        secondary: '#D9EDBF',
        tertiary: '#33372C',
        accent1: '#FFE5CF',
        accent2: '#CD5C08',
        accepted: '#3583DC',
        rejected: '#800000',
        footer: '#69512A',

      },
      backgroundColor: {
        site: '#F8F8F8',
      },
    },
  },
  plugins: [],
});
