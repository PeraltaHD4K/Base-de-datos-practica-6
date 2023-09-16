DROP DATABASE IF EXISTS jugueteria;
CREATE DATABASE jugueteria;
USE jugueteria;

CREATE TABLE usuario (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(255) NOT NULL,
  correo VARCHAR(255) NOT NULL UNIQUE,
  contrasena VARCHAR(255) NOT NULL
);

INSERT INTO usuario (nombre, correo, contrasena) VALUES
('Juan Pérez', 'juan@perez.com', '123456'),
('María González', 'maria@gonzalez.com', '654321'),
('José López', 'jose@lopez.com', '789012'),
('Ana Martínez', 'ana@martinez.com', '234567'),
('Pedro Sánchez', 'pedro@sanchez.com', '345678'),
('Carmen Rodríguez', 'carmen@rodriguez.com', '456789'),
('David Fernández', 'david@fernandez.com', '567890'),
('Eva Gómez', 'eva@gomez.com', '678901'),
('Luis García', 'luis@garcia.com', '789012');