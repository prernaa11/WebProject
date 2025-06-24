CREATE DATABASE IF NOT EXISTS corporate_event;
USE corporate_event;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(100)
);

CREATE TABLE admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) UNIQUE,
    password VARCHAR(100)
);

INSERT INTO admin (email, password) VALUES ('admin@example.com', 'admin123');

CREATE TABLE events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    title VARCHAR(100),
    description TEXT,
    status ENUM('pending','approved','rejected') DEFAULT 'pending',
    FOREIGN KEY (user_id) REFERENCES users(id)
);
