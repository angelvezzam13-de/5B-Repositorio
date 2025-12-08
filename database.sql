-- Base de datos para el proyecto Carro de Luces
-- Ejecuta este archivo en phpMyAdmin para crear la base de datos y la tabla

-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS carro_de_luces CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

-- Usar la base de datos
USE carro_de_luces;

-- Crear la tabla Material
CREATE TABLE IF NOT EXISTS Material (
    id INT AUTO_INCREMENT PRIMARY KEY,
    producto VARCHAR(100) NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    cantidad INT NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insertar algunos datos de ejemplo (opcional)
-- Puedes descomentar las siguientes líneas si quieres datos de prueba

-- INSERT INTO Material (producto, precio, cantidad) VALUES
-- ('LED RGB 5mm', 2.50, 100),
-- ('Resistencia 220Ω', 0.50, 200),
-- ('Cable calibre 22', 15.00, 50),
-- ('Arduino Uno', 350.00, 2),
-- ('Protoboard', 45.00, 3);
