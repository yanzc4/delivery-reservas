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

    //creamos una variable para guardar el modo actual
    if (document.body.classList.contains('dark-theme-variables')) {
        localStorage.setItem('admin-dark-mode', 'true');
    }else{
        localStorage.setItem('admin-dark-mode', 'false');
    }
});

//obtenemos el modo actual
if (localStorage.getItem('admin-dark-mode') === 'true') {
    document.body.classList.add('dark-theme-variables');
    themeToggler.querySelector('span:nth-child(1)').classList.remove('active');
    themeToggler.querySelector('span:nth-child(2)').classList.add('active');
}else{
    document.body.classList.remove('dark-theme-variables');
    themeToggler.querySelector('span:nth-child(1)').classList.add('active');
    themeToggler.querySelector('span:nth-child(2)').classList.remove('active');
}