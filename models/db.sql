
DROP DATABASE reprotek;

CREATE DATABASE reprotek;
USE reprotek;

CREATE TABLE user(
	id INT AUTO_INCREMENT PRIMARY KEY,

	nameFirst VARCHAR(100) NOT NULL,
	nameLast VARCHAR(100) NOT NULL,
	nameMiddle VARCHAR(100),

	email VARCHAR(100) NOT NULL UNIQUE,
	password VARCHAR(255) NOT NULL
);



CREATE TABLE typeApparatus(
	id INT AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(80) NOT NULL
);

CREATE TABLE brand(
	id INT AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(80) NOT NULL
);

CREATE TABLE model(
	id INT AUTO_INCREMENT PRIMARY KEY,
	
	idType INT NOT NULL,
	idBrand INT NOT NULL,
	
	name VARCHAR(200) NOT NULL,
	
	FOREIGN KEY (idType) REFERENCES typeApparatus (id) ON DELETE CASCADE,
	FOREIGN KEY (idBrand) REFERENCES brand (id) ON DELETE CASCADE
);

CREATE TABLE apparatus(
	id INT AUTO_INCREMENT PRIMARY KEY,
	idModel INT NOT NULL,
	FOREIGN KEY (idModel) REFERENCES model (id) ON DELETE CASCADE
);



CREATE TABLE statusRepair(
	id INT AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(80) NOT NULL
);

CREATE TABLE repair(
	id INT AUTO_INCREMENT PRIMARY KEY,
	
	idMaster INT,
	idClient INT NOT NULL,

	idApparatus INT NOT NULL,
	idStatus INT NOT NULL,

	brekage VARCHAR(200) NOT NULL,
	description TEXT NOT NULL,
	feedback TEXT,
	
	startRepair DATETIME NOT NULL DEFAULT NOW(),
	endRepair DATETIME,
	
	FOREIGN KEY (idMaster) REFERENCES user (id) ON DELETE CASCADE,
	FOREIGN KEY (idClient) REFERENCES user (id) ON DELETE CASCADE,
	FOREIGN KEY (idApparatus) REFERENCES apparatus (id) ON DELETE CASCADE,
	FOREIGN KEY (idStatus) REFERENCES statusRepair (id) ON DELETE CASCADE
);



INSERT INTO user(nameLast, nameFirst, nameMiddle, email, password) VALUES
(
	"Кулманаков",
	"Илья",
	"Владимирович",
	"kul2002il@gmail.com",
	"1234"
),(
	"Кулманаков",
	"Алексей",
	"Викторович",
	"al42Sel@gmail.com",
	"1234"
);


/*
Для ролей:

yii migrate --migrationPath=@yii/rbac/migrations
yii rbac/init
*/
