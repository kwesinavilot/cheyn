--This is the main database file for users and their activities

DROP DATABASE cheyn_main;      #Comment out if the database is not to be deleted

CREATE DATABASE cheyn_main
CHARACTER SET utf8
COLLATE utf8_general_ci;
USE cheyn_main;

CREATE TABLE users (
	id INT PRIMARY KEY AUTO_INCREMENT,
    cheynID VARCHAR(10) NOT NULL UNIQUE,
    firstname VARCHAR(25) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    date_created TIMESTAMP
);

CREATE TABLE login (
    id INT PRIMARY KEY AUTO_INCREMENT,
    cheynID VARCHAR(10) NOT NULL UNIQUE,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(65) NOT NULL,
    verify VARCHAR(32) UNIQUE,
    reset VARCHAR(32) UNIQUE,
    FOREIGN KEY(cheynID)
    REFERENCES users(cheynID)
);

CREATE TABLE income (
    id INT PRIMARY KEY AUTO_INCREMENT,
    cheynID VARCHAR(10) NOT NULL,
    entry_date DATE NOT NULL,               #the date of the entry
    title VARCHAR(100) NOT NULL,            #holds only 100 chars for entry title
    amount  DECIMAL(8, 2) NOT NULL,         #the amount value
    bucket VARCHAR(25) NOT NULL,            #the name of the bucket
    date_entered TIMESTAMP,
    description MEDIUMTEXT,
    FOREIGN KEY(cheynID)
    REFERENCES users(cheynID) 
);

CREATE TABLE expenses (
    id INT PRIMARY KEY AUTO_INCREMENT,
    cheynID VARCHAR(10) NOT NULL,
    entry_date DATE NOT NULL,               #the date of the entry
    title VARCHAR(100) NOT NULL,            #holds only 100 chars for entry title
    amount  DECIMAL(8, 2) NOT NULL,         #the amount value
    bucket VARCHAR(25) NOT NULL,            #the name of the bucket
    description MEDIUMTEXT,
    date_entered TIMESTAMP,
    FOREIGN KEY(cheynID)
    REFERENCES users(cheynID) 
);

CREATE TABLE buckets (
    id INT PRIMARY KEY AUTO_INCREMENT,
    cheynID VARCHAR(10) NOT NULL,
    name VARCHAR(25) NOT NULL,            #holds only 25 chars for bucket name
    short VARCHAR(10) NOT NULL UNIQUE,                  #the short name-related identifier for the bucket
    color VARCHAR(10) NOT NULL,                  #the color of the bucket label
    description MEDIUMTEXT,
    date_created TIMESTAMP,
    FOREIGN KEY(cheynID)
    REFERENCES users(cheynID) 
);

-- SELECT 
--     MONTH(entry_date) month,
--     SUM(amount) amount
-- FROM
--     income
-- WHERE
--     cheynID = "CyNONQodYt" AND
--     YEAR(entry_date) = YEAR(NOW())
-- GROUP BY month

-- SELECT 
--     MONTH(entry_date) month,
--     SUM(amount) amount
-- FROM
--     income
-- WHERE
--     cheynID = "CyNONQodYt" AND
--     YEAR(entry_date) = 2019
-- GROUP BY month

--These are the privileges for the cheyn_main database
--GRANT SELECT ON cheyn_main.products to public@localhost;
--FLUSH PRIVILEGES;

GRANT SELECT, INSERT, UPDATE ON cheyn_main.users to client@localhost;
GRANT SELECT, INSERT, UPDATE ON cheyn_main.login to client@localhost;
GRANT SELECT, INSERT, UPDATE ON cheyn_main.income to client@localhost;
GRANT SELECT, INSERT, UPDATE ON cheyn_main.expenses to client@localhost;
GRANT SELECT, INSERT, UPDATE ON cheyn_main.buckets to client@localhost;
FLUSH PRIVILEGES;

GRANT SELECT, INSERT, UPDATE, DELETE ON cheyn_main.* to admin@localhost;
FLUSH PRIVILEGES;