drop database if exists holodb;

-- creates the database
create database holodb;

use holodb;

-- Creates a users table to store user information
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    full_name VARCHAR(100),
    gender ENUM('other', 'female', 'male'),
    dob DATE,
    phone_number VARCHAR(20),
    profile_picture VARCHAR(255)
);

-- Creates a posts table to store post information
CREATE TABLE posts (
    post_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    caption VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    picture VARCHAR(255),
    audio VARCHAR(255),
    video VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- Creates a comments table to store comment information
CREATE TABLE comments (
    comment_id INT AUTO_INCREMENT PRIMARY KEY,
    post_id INT,
    user_id INT,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (post_id) REFERENCES posts(post_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);



ALTER TABLE posts ADD COLUMN username VARCHAR(50);

