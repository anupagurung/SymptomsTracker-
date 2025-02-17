CREATE DATABASE  anupa;
USE anupa;
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    telephone VARCHAR(20),
    address VARCHAR(255),
    dob DATE
    profile_image VARCHAR(255) NULL;
);
