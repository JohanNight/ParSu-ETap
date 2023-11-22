/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      backgroundImage: {
        'bg-ParSU': "url('images/PARSU IMAGES/parsuEntrance.jpg')",
        // 'footer-texture': "url('/img/footer-texture.png')",
      },
      safelist: ['animate-[fade-in_1s_ease-in-out]', 'animate-[fade-in-down_1s_ease-in-out]'],
    },
  },
  plugins: [],
}

