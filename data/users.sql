CREATE TABLE users (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,email VARCHAR(100), password VARCHAR(100), username VARCHAR(100), karma INT, courses VARCHAR(100),created TIMESTAMP DEFAULT NOW());

INSERT INTO users (email,password,username, karma,courses) VALUES ('iacob@usc.edu','password1','royrules',0,'');

