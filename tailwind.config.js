import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

const { addDynamicIconSelectors } = require("@iconify/tailwind")

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flyonui/dist/js/*.js",
        './vendor/masmerise/livewire-toaster/resources/views/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [
        forms,
        require("flyonui"),
        require("flyonui/plugin"),
        addDynamicIconSelectors(),
    ],
    flyonui: {
        themes: false, // false: only light + dark | true: all themes | array: specific themes like this ["light", "dark", "soft"]
        darkTheme: "dark", // name of one of the included themes for dark mode
        base: true, // applies background color and foreground color for root element by default
        styled: true, // include FlyonUI colors and design decisions for all components
        utils: true, // adds responsive and modifier utility classes
        vendors: false, // default is false when true add customize css for apexChart, editor.js, flatpickr, fullcalendar, notyf, raty-js
        logs: true, // Shows info about FlyonUI version and used config in the console when building your CSS
        themeRoot: ":root" // The element that receives theme color CSS variables
      }
};
