Create table if not EXISTS login(
    correo VARCHAR(320) PRIMARY KEY,
    userNick VARCHAR(30) not null unique,
    nombre VARCHAR(60) not NULL,
    apellido1 VARCHAR(100) not NULL,
    apellido2 VARCHAR(100),
    password VARCHAR(256)
);

Create table if not EXISTS registro(
    correo VARCHAR(320) PRIMARY KEY,
    userNick VARCHAR(30) not null unique,
    nombre VARCHAR(60) not NULL,
    apellido1 VARCHAR(100) not NULL,
    apellido2 VARCHAR(100),
    password VARCHAR(256)
);