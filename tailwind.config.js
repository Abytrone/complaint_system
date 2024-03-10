/** @type {import('tailwindcss').Config} */
export default {
    prefix: 'tw-',
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        './vendor/wire-elements/modal/src/ModalComponent.php',
    ],
    theme: {
        extend: {},
    },
    plugins: [],
}
