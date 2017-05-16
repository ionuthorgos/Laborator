CREATE TABLE utilizatori(
	id INT(11) PRIMARY KEY AUTO_INCREMENT,
	nume VARCHAR(255) NOT NULL,
	prenume VARCHAR(255) NOT NULL,
	varsta int(11) NOT NULL,
	gen int(1) NOT NULL,
	emailaddress VARCHAR(255) NOT NULL,
	password VARCHAR(255) NOT NULL,
	createddate DATETIME DEFAULT CURRENT_TIMESTAMP,
	updateddate DATETIME ON UPDATE CURRENT_TIMESTAMP
);
CREATE TABLE afectiuni(
	id INT(11) PRIMARY KEY AUTO_INCREMENT,
	denumireAfectiune VARCHAR(255) NOT NULL,
	descriere VARCHAR(255)

);
CREATE TABLE videoclipuri(
	id INT(11) PRIMARY KEY AUTO_INCREMENT,
	titlu VARCHAR(255),
	afectiune INT(11) NOT NULL,
	FOREIGN KEY (afectiune) REFERENCES afectiuni(id)
	
);
CREATE TABLE rating(
	id INT(11)PRIMARY KEY AUTO_INCREMENT,
	valoare INT(5),
	comentarii VARCHAR(500),
	utilizator int(11) NOT NULL,
	FOREIGN KEY (utilizator) REFERENCES utilizatori(id),
	videoclip INT(11) NOT NULL,
	FOREIGN KEY (videoclip) REFERENCES videoclipuri(id)
);

/* 
1.Logo
2.Login - Formular de login
3.Registration - Formular de inregistrare
4.Contact -pagina de contact
5.Istoric - afisare istoric videoclipuri
		 // - field cu add picture
		 	http://introjs.com/
6.Search  - cautare
7.Help	  

*/