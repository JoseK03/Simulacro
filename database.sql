CREATE DATABASE alquilartemis;

USE alquilartemis;

CREATE TABLE materiales(
    id_material INT PRIMARY KEY AUTO_INCREMENT, 
    nombre_material VARCHAR(50),
    precio VARCHAR(50)
);

CREATE TABLE empleados(
    id_empleado INT PRIMARY KEY AUTO_INCREMENT,
    nombre_empleado VARCHAR(50),
    contraseña VARCHAR(50)
);

CREATE TABLE clientes(
    id_cliente INT PRIMARY KEY AUTO_INCREMENT,
    nombre_cliente VARCHAR(50),
    celular VARCHAR(50),
    nit INT
);

CREATE TABLE contizacion(
    id_cotizacion INT PRIMARY KEY AUTO_INCREMENT,
    id_empleado INT,
    id_cliente INT,
    fecha DATE,
    hora VARCHAR(50),
    total_a_pagar VARCHAR(50)
    Foreign Key (id_empleado) REFERENCES empleados(id_empleado),
    Foreign Key (id_cliente) REFERENCES cliente(id_cliente)
);