
DROP DATABASE reprotek;

CREATE DATABASE reprotek;
USE reprotek;

CREATE TABLE user(
	id INT AUTO_INCREMENT PRIMARY KEY,
	id_role INT DEFAULT NULL,

	nameFirst VARCHAR(100) NOT NULL,
	nameLast VARCHAR(100) NOT NULL,
	nameMiddle VARCHAR(100),

	email VARCHAR(100) NOT NULL UNIQUE,
	password VARCHAR(255) NOT NULL
);

INSERT INTO user(id_role, nameLast, nameFirst, nameMiddle, email, password) VALUES
(
	1,
	"Кулманаков",
	"Илья",
	"Владимирович",
	"kul2002il@gmail.com",
	"1234"
);


/*
Для ролей:

yii migrate --migrationPath=@yii/rbac/migrations
yii rbac/init
*/
