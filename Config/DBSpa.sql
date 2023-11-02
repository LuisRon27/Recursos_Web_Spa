-- Crear la base de datos
CREATE DATABASE Spa;
USE Spa;

-- Tabla para clientes
CREATE TABLE clientes (
    idCliente INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    email VARCHAR(100),
    telefono VARCHAR(15),
    direccion VARCHAR(100)
);

-- Tabla para inventarios
CREATE TABLE inventarios (
    idInventario INT AUTO_INCREMENT PRIMARY KEY,
    producto VARCHAR(50) NOT NULL,
    cantidad INT,
    precio DECIMAL(10, 2),
    descripcion TEXT
);

-- Tabla para servicios
CREATE TABLE servicios (
    idServicio INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    duracion INT,
    precio DECIMAL(10, 2)
);

-- Tabla para empleados
CREATE TABLE empleados (
    idEmpleado INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    email VARCHAR(100),
    telefono VARCHAR(15),
    cargo VARCHAR(50)
);

-- Tabla para citas
CREATE TABLE citas (
    idCita INT AUTO_INCREMENT PRIMARY KEY,
    idCliente INT,
    idServicio INT,
    idEmpleado INT,
    fecha DATE,
    hora TIME,
    estado ENUM('Programada', 'Cancelada', 'Completada'),
    FOREIGN KEY (idCliente) REFERENCES clientes(idCliente),
    FOREIGN KEY (idServicio) REFERENCES servicios(idServicio),
    FOREIGN KEY (idEmpleado) REFERENCES empleados(idEmpleado)
);

-- Tabla para pagos
CREATE TABLE pagos (
    idPago INT AUTO_INCREMENT PRIMARY KEY,
    idCita INT,
    fecha DATE,
    metodo_pago ENUM('Tarjeta de Débito', 'Efectivo', 'Pago movil'),
    FOREIGN KEY (idCita) REFERENCES citas(idCita)
);


CREATE TABLE Usuarios (
    IDUsuario INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    rol ENUM('admin', 'empleado','usuario') NOT NULL,
    activo TINYINT(1) NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO clientes (nombre, apellido, email, telefono, direccion) VALUES
('Juan', 'Pérez', 'juan@email.com', '123-456-7890', 'Calle 123, Ciudad'),
('María', 'López', 'maria@email.com', '987-654-3210', 'Avenida 456, Ciudad'),
('Carlos', 'González', 'carlos@email.com', '555-555-5555', 'Calle 789, Ciudad'),
('Luisa', 'Martínez', 'luisa@email.com', '777-777-7777', 'Avenida 101, Ciudad'),
('Pedro', 'Ramírez', 'pedro@email.com', '999-999-9999', 'Calle 222, Ciudad');

-- Insertar datos de productos en la tabla de inventarios
INSERT INTO inventarios (producto, cantidad, precio, descripcion) VALUES
('Aceite de Masaje', 100, 19.99, 'Aceite esencial para masajes'),
('Esmalte de Uñas', 150, 5.99, 'Esmalte de uñas de colores variados'),
('Sales de Baño', 50, 9.99, 'Sales de baño con aromas relajantes'),
('Mascarilla Facial', 70, 14.99, 'Mascarilla facial de arcilla'),
('Kit de Manicura/Pedicura', 30, 49.99, 'Kit para el cuidado de manos y pies');


-- Insertar datos de los servicios
INSERT INTO servicios (nombre, descripcion, duracion, precio) VALUES
('Manicure', 'Servicio de cuidado de uñas básico.', 30, 5.00),
('Combinado', 'Combinación de manicure y pedicure tradicional.', 75, 12.00),
('Pedicure', 'Servicio de cuidado de pies básico.', 30, 7.00),
('Tradicional', 'Pedicure tradicional con esmaltado.', 45, 10.00),
('Detox', 'Tratamiento de detoxificación para pies.', 60, 8.00);

-- Insertar datos de empleados en la tabla de empleados
INSERT INTO empleados (nombre, apellido, email, telefono, cargo) VALUES
('Ana', 'Gómez', 'ana@email.com', '111-111-1111', 'Terapeuta de Masaje'),
('Juan', 'Martínez', 'juan@email.com', '222-222-2222', 'Esteticista Facial'),
('Luisa', 'Rodríguez', 'luisa@email.com', '333-333-3333', 'Manicurista'),
('Carlos', 'López', 'carlos@email.com', '444-444-4444', 'Pedicurista'),
('María', 'Sánchez', 'maria@email.com', '555-555-5555', 'Terapeuta de Spa');

-- Insertar datos en la tabla de citas
INSERT INTO citas (idCliente, idServicio, idEmpleado, fecha, hora, estado) VALUES
(1, 1, 1, '2023-10-27', '09:00:00','Programada'),
(2, 2, 2, '2023-10-28', '10:30:00','Completada'),
(3, 3, 3, '2023-10-29', '15:00:00','Cancelada'),
(4, 4, 4, '2023-10-30', '14:00:00','Programada'),
(5, 5, 5, '2023-10-31', '11:30:00','Programada');

-- Insertar datos en la tabla de pagos
INSERT INTO pagos (idCita, fecha, metodo_pago) VALUES
(1, '2023-10-27', 'Tarjeta de Débito'),
(2, '2023-10-28', 'Efectivo'),
(3, '2023-10-29', 'Efectivo'),
(4, '2023-10-30', 'Pago movil'),
(5, '2023-10-31', 'Tarjeta de Débito');

-- Insertar datos en la tabla de datos
INSERT INTO Usuarios (username, password, rol, activo)
VALUES ('luisron27', '12345678', 'admin', 1);