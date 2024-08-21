/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require("@tailwindcss/typography"),
    require('daisyui'),
  ],
  daisyui: {
    themes: [
      {
        mytheme: {
          "primary": "#004d93",
                    
          "secondary": "#00afee",
                    
          "accent": "#A9E5D5",
                    
          "neutral": "#FFFFFF",
                    
          "base-100": "#FFFFFF",
                    
          "info": "#cfe2f3",
                    
          "success": "#d9ead3",
                    
          "warning": "#fde047",
                    
          "error": "#f4cccc",
        },
      },
    ],
  },
}

