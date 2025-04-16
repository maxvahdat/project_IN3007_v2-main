-- phpMyAdmin SQL Dump
-- version 5.2.1
-- Host: 127.0.0.1
-- Server version: 8.0.40
-- PHP Version: 8.3.14
-- Database: inventory_systemv2

CREATE TABLE IF NOT EXISTS genres (
id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(60) UNIQUE NOT NULL
);

INSERT INTO genres (name) VALUES
('History'),
('Mystery'),
('Short Story'),
('Educational'),
('Biography'),
('Art'),
('Religion');

CREATE TABLE IF NOT EXISTS media (
id INT PRIMARY KEY AUTO_INCREMENT,
  file_name VARCHAR(255) NOT NULL,
  file_type VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS books (
id INT PRIMARY KEY AUTO_INCREMENT,
  author_name VARCHAR(255) NOT NULL,
  name VARCHAR(255) NOT NULL,
  quantity INT NOT NULL,
  price  DECIMAL(25,2),
  genre_id INT,
  media_id INT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (genre_id) REFERENCES genres(id) ON DELETE SET NULL,
  FOREIGN KEY (media_id) REFERENCES media(id) ON DELETE SET NULL
);

INSERT INTO media (file_name, file_type) VALUES ("john.png", 'image/png');

INSERT INTO books (author_name, name, quantity, price, genre_id, media_id) VALUES
('john', 'Poetry Power and Conflict', 48, 100.00, 1, 1),
('john', 'Iran', 12000, 55.00, 4, 1),
('john', 'Wheat', 69, 5.00, 2, 1),
('john', 'Timber', 1200, 1069.00, 2, 1),
('john', 'W1848 Oscillating Floor Drill Press', 26, 299.00, 5, 1),
('john', 'Portable Band Saw XBP02Z', 42, 280.00, 5, 1),
('john', 'Life Breakfast Cereal-3 Pk', 107, 3.00, 3, 1),
('john', 'Chicken of the Sea Sardines W', 110, 13.00, 3, 1),
('john', 'Disney Woody - Action Figure', 67, 29.00, 3, 1),
('john', 'Hasbro Marvel Legends Series Toys', 106, 219.00, 3, 1),
('john', 'Packing Chips', 78, 21.00, 4, 1),
('john', 'Classic Desktop Tape Dispenser 38', 160, 15.00, 4, 1),
('john', 'Small Bubble Cushioning Wrap', 199, 8.00, 4, 1);

CREATE TABLE IF NOT EXISTS sales (
id INT PRIMARY KEY AUTO_INCREMENT,
  book_id INT NOT NULL,
  qty INT NOT NULL,
  date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (book_id) REFERENCES books(id) ON DELETE CASCADE
);

INSERT INTO sales (book_id, qty) VALUES
(1, 2),
(3, 3),
(10, 6),
(6, 2),
(12, 5),
(13, 21),
(7, 5),
(9, 2);

CREATE TABLE IF NOT EXISTS users (
id INT PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(50) NOT NULL,
  password VARCHAR(255) NOT NULL,
  last_login TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (username, password) VALUES
('admin', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8');