create table usuarios
(
id int(4) primary key auto_increment,
user varchar(50) not null,
pass varchar(25) not null,
rol varchar(20),
nombre varchar(100) not null,
apellido varchar(150) not null,
f_nacimiento date
);
create table clientes
(
id int primary key auto_increment,
user varchar(50) not null,
pass varchar(25) not null,
nombre varchar(100) not null,
apellido varchar(150) not null,
f_nacimiento date,
direccion varchar(100)
);

create table ubicacion
(id int not null,
lat varchar (100) not null,
lng varchar (100) not null,
repartidor int not null,
FOREIGN KEY (repartidor) REFERENCES usuario(id),
FOREIGN KEY (id) REFERENCES clientes(id)
);

--para eliminar la ubi
delete from ubicacion WHERE id = 3;