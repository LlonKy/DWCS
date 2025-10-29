CREATE DATABASE IF NOT EXISTS e_5;
USE e_5;
CREATE TABLE IF NOT EXISTS USUARIO(
    nic VARCHAR(30) PRIMARY KEY,
    nombre VARCHAR(60) NOT NULL,
    apellido1 VARCHAR(100) NOT NULL,
    mail VARCHAR(320) NOT NULL,
    pass CHAR(40) NOT NULL
);

CREATE TABLE IF NOT EXISTS PRODUCTOS(
    idProducto int PRIMARY KEY auto_increment,
    nombre VARCHAR(69) not null unique
);

Create TABLE if not exists Carrito(
    idProducto int PRIMARY KEY,
    nic VARCHAR(30) not null unique,
    nombreProducto VARCHAR(60) not null unique,
    cantidadProducto int not null default 0,
    foreign key(idProducto) references PRODUCTOS(idProducto),
    foreign key(nic) references USUARIO(nic)
);