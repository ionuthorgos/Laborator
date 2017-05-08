CREATE TABLE manufactures (
	id INT(11)PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(255)NOT NULL
);

CREATE TABLE products(
	id INT(11)PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(255)NOT NULL,
	price VARCHAR(225)NOT NULL,
	manufacture INT(11),
	FOREIGN KEY(manufacture) REFERENCES manufactures(id)
);

CREATE TABLE ordors(
	id INT(11)PRIMARY KEY AUTO_INCREMENT,
	fullname VARCHAR(255)NOT NULL,
	product INT(11)NOT NULL,
	FOREIGN KEY(product) REFERENCES products(id),
	quantity INT(11)NOT NULL
);