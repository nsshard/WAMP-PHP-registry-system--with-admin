CREATE TABLE applications (
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
chinesename VARCHAR(50) NOT NULL,
englishname VARCHAR(50) NOT NULL,
gender VARCHAR(1) NOT NULL,
DOB VARCHAR(15) NOT NULL,
address VARCHAR(255) NOT NULL,
POB VARCHAR(255) NOT NULL,
occupation VARCHAR(255) NOT NULL,
venue VARCHAR(255) NOT NULL,
username VARCHAR(50) NOT NULL UNIQUE,
password VARCHAR(255) NOT NULL,
created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);