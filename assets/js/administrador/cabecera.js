const menuBtn = document.querySelector('#menu-btn');
const closeBtn = document.querySelector('#close-btn');
const sideMenu = document.querySelector('aside');
const themeToggler = document.querySelector('.theme-toggler');

menuBtn.addEventListener('click', () => {
    sideMenu.style.display = 'block';
});

//cerrar cabecera
closeBtn.addEventListener('click', () => {
    sideMenu.style.display = 'none';
});

themeToggler.addEventListener('click', () => {
    document.body.classList.toggle('dark-theme-variables');

    themeToggler.querySelector('span:nth-child(1)').classList.toggle('active');
    themeToggler.querySelector('span:nth-child(2)').classList.toggle('active');

    window.frames['myFrame'].document.querySelector('body').classList.toggle('dark-theme-variables');
});



