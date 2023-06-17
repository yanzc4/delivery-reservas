# Sistema BooFast

Sistema de delivery con ubicacion de empleados en realtime, y un sistema de reservas ayudado de un chatbot con inteligencia artificial con chatgpt.

# Documentación

- Servidor usado AWS
	>Puertos a Abrir
	>7800|888|80|443|20|21
- VPS de ubuntu 20.04
- aaPanel para la administración del hosting
	>aaPanel [Download](https://www.aapanel.com/new/download.html)
	>Comando `wget -O install.sh http://www.aapanel.com/script/install-ubuntu_6.0_en.sh && sudo bash install.sh aapanel`
- Marco de trabajo Bootstrap 5
- Para iconos [Boxicons](https://boxicons.com/)
- [Material Symbols and Icons - Google Fonts](https://fonts.google.com/icons)
- Usamos [Ajax](https://developers.google.com/speed/libraries?hl=es-419) para enviar peticiones al servidor
- Utilizamos [SweetAlert2](https://sweetalert2.github.io/) para las alertas

## Estructura

- assets
	> css
	img
	js (Aqui van las funciones y peticiones ajax)
- backend
	>empleado (iran las funcionalidades)
	controller (aqui ira el controlador)
	model (aqui van las funciones del crud)
- cliente
	> chatbot
	index
	ofertas
	pedidos
	perfil
	platos
- colaborador
	- administrador
		> ajustes
		chat
		crudPlatos
		dashboard
		index
		inventario
		mapa
		perfil
		reportes
	- delivery
		> chat
		index
		mapa
		pedidos
		perfil
	- monitoreo
		>chat
		index
		mapa
		pedidos
		perfil
	- index
- database (scrip de base de datos)
- frontend (componentes como el menu y cabeceras)
- inc (configuracion y conexion a la base de datos)
	>conexion.php
	config.php
- .htaccess (archivo de configuracion del servidor)
- index.php (archivo principal del sistema)

## Pasos para el crud

- Guiarse de los archivos **prueba.php**
- en el **js** se encuentra los ajax dentro de **administrador** tomar como guia el js **crudEmpleado.js**
	> [![ajax.png](https://i.postimg.cc/63k04vLV/ajax.png)](https://postimg.cc/34ZpPWqW)
- dentro de **backend** se encuentra la carpeta **model** ahi dentro el archivo **empleadoModel.php** copiar y ajustar las consultas para que coincidan con la tabla a la que se desea hacer crud
	> [![model.png](https://i.postimg.cc/5y9t3P3f/model.png)](https://postimg.cc/vgjM8tkK)
- dentro de **backend** se encuentra la carpeta **controller** ahi esta el archivo **empleadoController.php** copiar y ajustar a su uso y enviar los parametros al **model** ... El controlador a su vez devolvera data la cual debe ser diseñada de acuerdo a la maquetacion original, mantener las css ya creadas.
	> [![controller.png](https://i.postimg.cc/cJN0h9xP/controller.png)](https://postimg.cc/gx4CkK6K)
