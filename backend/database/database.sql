CREATE DATABASE alquilartemis;

USE alquilartemis;

CREATE TABLE materiales(
    id_material INT PRIMARY KEY AUTO_INCREMENT, 
    nombre_material VARCHAR(50),
    precio BIGINT
);

CREATE TABLE empleados(
    id_empleado INT PRIMARY KEY AUTO_INCREMENT,
    nombre_empleado VARCHAR(50),
    contraseña VARCHAR(50)
);

CREATE TABLE clientes(
    id_cliente INT PRIMARY KEY AUTO_INCREMENT,
    nombre_cliente VARCHAR(50),
    celular BIGINT,
    nit INT
);


CREATE TABLE cotizacion(
    id_cotizacion INT PRIMARY KEY AUTO_INCREMENT,
    id_empleado INT,
    id_cliente INT,
    id_material INT,
    fecha_cotizacion DATE,
    hora_cotizacion TIME,
    cantidad_dias INT,
    cantidad_material INT,
    total_a_pagar BIGINT,
    Foreign Key (id_empleado) REFERENCES empleados(id_empleado),
    Foreign Key (id_cliente) REFERENCES clientes(id_cliente),
    Foreign Key (id_material) REFERENCES materiales(id_material)  
);


