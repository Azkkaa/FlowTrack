class ButtonTheme
{
    constructor(isLocalDarkMode, body) {
        this.isLocalDarkMode = isLocalDarkMode;
        this.localStorage = localStorage;
        this.body = body;
    }

    changeLocalTheme() {
        this.isLocalDarkMode ? this.localStorage.setItem('theme', 'light') : this.localStorage.setItem('theme', 'dark');
    }

    changeTheme() {
        this.body.classList.toggle('dark')
    }

    setTheme() {
        this.isLocalDarkMode ? this.body.classList.add('dark') : '';
    }
}

export default ButtonTheme
