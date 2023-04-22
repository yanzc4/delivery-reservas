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