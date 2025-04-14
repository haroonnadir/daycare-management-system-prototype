CREATE DATABASE IF NOT EXISTS daycare_db;
USE daycare_db;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    cnic VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    phone VARCHAR(20) NOT NULL,
    password VARCHAR(255) NOT NULL,
    address VARCHAR(100),
    town VARCHAR(50),
    region VARCHAR(50),
    postcode VARCHAR(20),
    country VARCHAR(50),
    role ENUM('parent', 'staff', 'admin') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
