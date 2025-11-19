import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import autofill from "tailwindcss-autofill";

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "class",
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            colors: {
                spindle: {
                    50: "#f2f7fc",
                    100: "#e1edf8",
                    200: "#cadff3",
                    300: "#a8cceb",
                    400: "#7bafdf",
                    500: "#5c92d5",
                    600: "#4878c8",
                    700: "#3e66b7",
                    800: "#375396",
                    900: "#314877",
                    950: "#222e49",
                },
                bay: {
                    50: "#eff6ff",
                    100: "#dbeafe",
                    200: "#bedcff",
                    300: "#92c6fe",
                    400: "#5fa7fb",
                    500: "#3985f8",
                    600: "#2365ed",
                    700: "#1b50da",
                    800: "#1d41b0",
                    900: "#1d3b8b",
                    950: "#162655",
                },
                bunting: {
                    50: "#eff6ff",
                    100: "#dbebfe",
                    200: "#beddff",
                    300: "#92c8fe",
                    400: "#5fa9fb",
                    500: "#3987f8",
                    600: "#2367ed",
                    700: "#1b52da",
                    800: "#1d43b0",
                    900: "#1d3d8b",
                    950: "#111d40",
                },
                widow: {
                    50: "#ecfdf5",
                    100: "#d0fbe5",
                    200: "#a5f5d1",
                    300: "#6beab9",
                    400: "#30d79b",
                    500: "#0cb981",
                    600: "#02996b",
                    700: "#017b59",
                    800: "#046148",
                    900: "#04503d",
                    950: "#012d22",
                },
                pumpkin: {
                    50: "#fff7ed",
                    100: "#ffedd4",
                    200: "#ffd7a9",
                    300: "#ffb972",
                    400: "#fe9139",
                    500: "#fd7213",
                    600: "#ee5608",
                    700: "#c53f09",
                    800: "#9c3210",
                    900: "#7e2c10",
                    950: "#441306",
                },
            },
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, autofill],
};
