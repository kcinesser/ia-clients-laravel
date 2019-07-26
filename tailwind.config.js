module.exports = {
  theme: {
    screens: {
      'sm': '640px',
      'md': '768px',
      'lg': '1024px',
      'xl': '1280px',
    },
    fontFamily: {
      'sans': 'Montserrat, sans-serif',
      'serif': 'Lora, serif',
      'display': 'Montserrat, sans-serif',
      'body': 'Lora, serif',
    },
    boxShadow:{
      default: '0 1px 3px rgba(0, 0, 0, 0.12)',
      '2': '0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23)',
      '3': '0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23)',
      '4': '0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22)',
      '5': '0 19px 38px rgba(0, 0, 0, 0.30), 0 15px 12px rgba(0, 0, 0, 0.22)',
    },
    opacity: {
      '0': '0',
      '20': '0.2',
      '40': '0.4',
      '60': '0.6',
      '80': '0.8',
      '100': '1',
    },
    extend: {
      spacing: {
        '300': '300px',
      },
      colors: {
        orange: {
          '300': '#f36f51',
          '500': '#F15B39',
        },
        plum: {
          '300': '#6c4159',
          '500': '#4c2e3f',
        },
        blue: {
          '300': '#59679c',
          '500': '#4B5783',
        },
        yellow: {
          '300': '#fac957',
          '500': '#FABE35',
        },
        teal: {
          '300': '#80d7d9',
          '500': '#70BEBF',
        },
        grey: {
          '300': '#eeede9',
          '500': '#F3F2EF',
          '700': '#dfdedb',
        },
      }
    }
  },
  variants: {
    backgroundColor: ['responsive', 'hover', 'focus', 'active', 'group-hover'],
    textColor: ['responsive', 'hover', 'focus', 'active', 'group-hover'],
    borderStyle: ['responsive', 'hover', 'focus', 'active', 'group-hover'],
    borderColor: ['responsive', 'hover', 'focus', 'active', 'group-hover'],
    boxShadow: ['responsive', 'hover', 'focus', 'active', 'group-hover'],
    fontWeight: ['responsive', 'hover', 'focus', 'active', 'group-hover'],
  },
  plugins: []
}