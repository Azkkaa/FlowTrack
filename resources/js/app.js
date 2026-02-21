import './bootstrap';
import Alpine from 'alpinejs';
import Theme from './buttonTheme.js'

window.Alpine = Alpine;

Alpine.start();

const buttonTheme = document.getElementById('buttonTheme');
const body = document.querySelector('body');

const isDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
if (!localStorage.getItem('theme')) {
    isDarkMode ? localStorage.setItem('theme', 'dark') : localStorage.setItem('theme', 'light')
}

new Theme(localStorage.getItem('theme') == 'dark', body).setTheme()

if (buttonTheme) {
    // Running every click
    buttonTheme.addEventListener('click', () => {
        const isLocalDarkMode = localStorage.getItem('theme') == 'dark';
        const theme = new Theme(isLocalDarkMode, body);

        theme.changeLocalTheme()
        theme.changeTheme()
    })
}
