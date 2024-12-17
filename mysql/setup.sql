CREATE DATABASE IF NOT EXISTS passwords;
CREATE USER IF NOT EXISTS 'passwords_user'@'localhost' IDENTIFIED BY 'k(D2Whiue9d8yD';
GRANT ALL PRIVILEGES ON passwords.* TO 'passwords_user'@'localhost';
FLUSH PRIVILEGES;

USE passwords;

CREATE TABLE accounts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    site_name VARCHAR(255) NOT NULL,
    url VARCHAR(255) NULL
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    username VARCHAR(100) UNIQUE NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL
);

CREATE TABLE passwords (
    id INT AUTO_INCREMENT PRIMARY KEY,
    account_id INT NOT NULL,
    user_id INT NOT NULL,
    password VARBINARY(255) NOT NULL,
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (account_id) REFERENCES accounts(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

INSERT INTO accounts (site_name, url) VALUES 
('Facebook', 'https://facebook.com'),
('Instagram', 'https://instagram.com');

INSERT INTO users (first_name, last_name, username, email) VALUES 
('John', 'Doe', 'johndoe', 'johndoe@example.com');

INSERT INTO passwords (account_id, user_id, password, comment) VALUES 
(1, 1, AES_ENCRYPT('mypassword123', 'mysecretkey123'), 'Facebook personal account');
