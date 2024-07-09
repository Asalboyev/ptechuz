/** @type {import('tailwindcss').Config} */
export default {
  content: ["./index.html", "./src/**/*.{js,ts,jsx,tsx}"],
  theme: {
    extend: {
      colors: {
        primary: "#495B6F",
        "primary-content": "#778391",
        light: "#F5F5F7",
        dark: "#020105",
      }
    },
  },
  plugins: [],
};
