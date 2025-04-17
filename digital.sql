-- 1. Create the database
CREATE DATABASE IF NOT EXISTS digital;

-- 2. Use the newly created database
USE digital;

-- 3. Create the Users Table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 4. Create the Books Table
CREATE TABLE IF NOT EXISTS books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 5. Create the Logs Table (Optional, to track user activity)
CREATE TABLE IF NOT EXISTS logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    action VARCHAR(255),
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- 6. Insert sample users into the users table
INSERT INTO users (username, password, role) VALUES
('admin', PASSWORD('admin123'), 'admin'),
('user1', PASSWORD('password1'), 'user'),
('user2', PASSWORD('password2'), 'user'),
('user3', PASSWORD('password3'), 'user'),
('user4', PASSWORD('password4'), 'user'),
('user5', PASSWORD('password5'), 'user'),
('user6', PASSWORD('password6'), 'user'),
('user7', PASSWORD('password7'), 'user'),
('user8', PASSWORD('password8'), 'user'),
('user9', PASSWORD('password9'), 'user'),
('user10', PASSWORD('password10'), 'user');

-- 7. Insert sample books into the books table (10 Books)
INSERT INTO books (title, file_path) VALUES
('Computer Basics', 'books/computer_basics.pdf'),
('Python Programming', 'books/python_programming.pdf'),
('Networking Essentials', 'books/networking_essentials.pdf'),
('Cybersecurity Guide', 'books/cybersecurity_guide.pdf'),
('Data Structures', 'books/data_structures.pdf'),
('HTML & CSS', 'books/html_css.pdf'),
('JavaScript Essentials', 'books/javascript_essentials.pdf'),
('Database Concepts', 'books/database_concepts.pdf'),
('Linux Basics', 'books/linux_basics.pdf'),
('Cloud Computing', 'books/cloud_computing.pdf');

-- 8. Insert sample logs (Tracking user actions) -- Optional
INSERT INTO logs (user_id, action) VALUES
(1, 'Admin logged in'),
(2, 'User1 logged in'),
(3, 'User2 logged in'),
(4, 'User3 logged in'),
(5, 'User4 logged in');
