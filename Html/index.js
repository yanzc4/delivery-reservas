const sideMenu =document.querySelector('aside');
const menuBtn = document.querySelector('#menubtn');
const closeBtn = document.querySelector('#close-btn');
const themeToggler = document.querySelector('.theme-toggler');


//mostrar cabecera
menuBtn.addEventListener('click', () => {
    sideMenu.style.display = 'block';
});

//cerrar cabecera
closeBtn.addEventListener('click', () => {
    sideMenu.style.display = 'none';
});

//cambiar el tema
themeToggler.addEventListener('click', () => {
    document.body.classList.toggle('dark-theme-variables');

    themeToggler.querySelector('span:nth-child(1)').classList.toggle('active');
    themeToggler.querySelector('span:nth-child(2)').classList.toggle('active');

});

//lennar con datos la tabla
Orders.forEach((order) => {
    const tr = document.createElement('tr');
    const trContent = `	
    <td>${order.producName}</td>
    <td>${order.producNumber}</td>
    <td>${order.paymenStatus}</td>
    <td>"${order.shipping === 'Declined' ? 'danger' :
    order.shipping=== 'pending' ? 'warning': 'primary'}">
    ${order.shipping}</td>
    <td class="primary">Detalles</td>
    `;

    tr.innerHTML = trContent;
    document.querySelector('table tbody').appendChild(tr);
}); 

