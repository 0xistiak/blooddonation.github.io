CREATE DATABASE IF NOT EXISTS blood_donation;
USE blood_donation;

-- Table for storing registered users
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    username VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(20) NOT NULL,
    address VARCHAR(255) NOT NULL,
    blood_group VARCHAR(10) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Table for storing blood donations
CREATE TABLE IF NOT EXISTS blood_donations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    address VARCHAR(255) NOT NULL,
    blood_group VARCHAR(10) NOT NULL,
    donation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Trigger to insert into blood_donations when a user registers
DELIMITER //
CREATE TRIGGER after_user_registration
AFTER INSERT ON users
FOR EACH ROW
BEGIN
    INSERT INTO blood_donations (name, phone, address, blood_group)
    VALUES (NEW.name, NEW.phone, NEW.address, NEW.blood_group);
END;
//
DELIMITER ;
