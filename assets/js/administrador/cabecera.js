const menuBtn = document.querySelector('#menu-btn');
const closeBtn = document.querySelector('#close-btn');

menuBtn.addEventListener('click', () => {
    sideMenu.style.display = 'block';
});

//cerrar cabecera
closeBtn.addEventListener('click', () => {
    sideMenu.style.display = 'none';
});