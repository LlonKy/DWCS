CREATE DATABASE IF NOT EXISTS empresa;
USE empresa;

CREATE TABLE rol (
    rolId INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(40)
);

CREATE TABLE usuario (
    idUser INT PRIMARY KEY AUTO_INCREMENT,
    rolId INT,
    nombre VARCHAR(40) NOT NULL,
    correo VARCHAR(60) NOT NULL UNIQUE,
    pwd VARCHAR(200) NOT NULL,
    FOREIGN KEY (rolId) REFERENCES rol(rolId)
);

CREATE TABLE proyecto (
    idProyecto INT PRIMARY KEY AUTO_INCREMENT,
    responsableId INT not null,
    nombre VARCHAR(40),
    descripcion VARCHAR(300),
    FOREIGN KEY (responsableId) REFERENCES usuario(idUser)
);

CREATE TABLE programador_proyecto (
    programadorId INT,
    idProyecto INT,
    PRIMARY KEY (programadorId, idProyecto),
    FOREIGN KEY (programadorId) REFERENCES usuario(idUser),
    FOREIGN KEY (idProyecto) REFERENCES proyecto(idProyecto)
);

CREATE TABLE permiso
(
    idPermiso int PRIMARY KEY AUTO_INCREMENT,
    pagina VARCHAR(60)
);

CREATE TABLE permisoRol
(
    rolId int PRIMARY KEY,
    responsableId int
    FOREIGN KEY (rolId) REFERENCES rol(rolId)
    FOREIGN KEY (responsableId) REFERENCES usuario(idUser)
);
