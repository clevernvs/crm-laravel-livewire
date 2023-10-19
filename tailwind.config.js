import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
    ],
    theme: {
        extend: {},
    },
    plugins: [
        forms, typography
    ],
}
