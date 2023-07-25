document.getElementById('btnNueva').addEventListener('click', function() {
    document.getElementById('nuevaOrden').style.display = 'flex';
    document.getElementById('ordenesActivas').style.display = 'none';
    document.getElementById('btnNueva').classList.add('linea');
    document.getElementById('btnActivas').classList.remove('linea');
});
document.getElementById('btnActivas').addEventListener('click', function() {
    document.getElementById('nuevaOrden').style.display = 'none';
    document.getElementById('ordenesActivas').style.display = 'flex';
    document.getElementById('btnNueva').classList.remove('linea');
    document.getElementById('btnActivas').classList.add('linea');
});
