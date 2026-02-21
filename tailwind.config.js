import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    safelist: [
        // --- Color ---
        // BG
        'bg-black/60',
        'bg-green-500',
        'bg-blue-500',
        'bg-white/20',
        // Text
        'text-red-600',
        'dark:bg-red-900/30',
        'dark:text-red-400',
        'bg-white/50',

        // Border
        'dark:border-red-800',

        // --- Animate ---
        'animate-scale-up',

        // --- Padding and Witdh ---
        'p-5',
        'max-w-md',
        'w-20',
        'h-20',
        'p-0.5',
        'p-2',

        // Other
        'backdrop-blur-md',
        'inset-0',
        'text-4xl',
        'border-4',
        'rounded-full',
        'animate-fade-in'
    ],

    plugins: [forms],
};
