CREATE DATABASE IF NOT EXISTS assignment_db;
USE assignment_db;

DROP TABLE IF EXISTS customers;
CREATE TABLE IF NOT EXISTS customers(
    id INT(11) NOT NULL AUTO_INCREMENT,
    fname VARCHAR(256) NOT NULL,
    lname VARCHAR(256) NOT NULL,
    pnumber VARCHAR(40) NOT NULL,
    email VARCHAR(256) NOT NULL,
    category TEXT NOT NULL,
    PRIMARY KEY(id)
) ENGINE = INNODB DEFAULT CHARSET = utf8 AUTO_INCREMENT = 3;


INSERT INTO customers (id, fname, lname, pnumber, email, category) VALUES 
(1, 'Xenofon', 'Vourliotis', '+306948658585', 'x.vourliotis@gmail.com', 'Customer'),
(2, 'John', 'Doe', '6948658585', 'john@doe.com', 'Customer')