/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    ],

    theme: {
        extend: {},
    },
    plugins: [
        require("@tailwindcss/forms")({
            strategy: "base",
        }),
        require("flowbite/plugin")({
            charts: true,
        }),
        require("daisyui"),
    ],
};
