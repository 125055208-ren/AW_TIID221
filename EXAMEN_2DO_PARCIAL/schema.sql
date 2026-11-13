CREATE DATABASE IF NOT EXISTS crud_tareas CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE crud_tareas;

CREATE TABLE IF NOT EXISTS tb_tareas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descripcion TEXT NOT NULL,
    fecha_limite DATE NOT NULL,
    prioridad ENUM('baja','media','alta') NOT NULL DEFAULT 'media',
    estado ENUM('pendiente','completado') NOT NULL DEFAULT 'pendiente'
);
