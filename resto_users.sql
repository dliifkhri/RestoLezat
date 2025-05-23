
-- Buat database
CREATE DATABASE IF NOT EXISTS resto;
USE resto;

-- Buat tabel users
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  level ENUM('admin', 'owner', 'kasir', 'waiter') NOT NULL
);

-- Isi data awal (password masih teks biasa)
INSERT INTO users (username, password, level) VALUES
('admin', '12345', 'admin'),
('owner', 'owner123', 'owner'),
('kasir', 'kasir123', 'kasir'),
('waiter', 'waiter123', 'waiter');
