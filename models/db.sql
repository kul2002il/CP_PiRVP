
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
	idOwner INT NOT NULL,
	
	FOREIGN KEY (idModel) REFERENCES model (id) ON DELETE CASCADE,
	FOREIGN KEY (idOwner) REFERENCES user (id) ON DELETE CASCADE
);



CREATE TABLE statusRepair(
	id INT AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(80) NOT NULL
);

CREATE TABLE repair(
	id INT AUTO_INCREMENT PRIMARY KEY,
	
	idMaster INT,

	idApparatus INT NOT NULL,
	idStatus INT NOT NULL,

	brekage VARCHAR(200) NOT NULL,
	description TEXT NOT NULL,
	feedback TEXT,
	
	startRepair DATETIME NOT NULL DEFAULT NOW(),
	endRepair DATETIME,
	
	FOREIGN KEY (idMaster) REFERENCES user (id) ON DELETE CASCADE,
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
),(
	"Иванов",
	"Дмитрий",
	NULL,
	"ivAN@gmail.com",
	"1234"
),(
	"Вишняков",
	"Андрей",
	"Петрович",
	"user@gmail.com",
	"1234"
);

INSERT INTO typeApparatus (name) VALUES
("Сварочный аппарат"),
("Генератор"),
("Тепловая пушка"),
("Лазерный резак"),
("Промышленный холодильник"),
("ТНВД");

INSERT INTO brand (name) VALUES
("DEXP"),
("Ресанта"),
("PKH"),
("Бирюса"),
("ЭвалКом"),
("КАМАЗ");

INSERT INTO model (idType, idBrand, name) VALUES
(
	1,
	2,
	"201"
),(
	6,
	6,
	"ТН-01"
),(
	1,
	1,
	"n501103"
),(
	5,
	4,
	"ЛЛ-15-30"
),(
	3,
	5,
	"ТП-85М4"
),(
	4,
	3,
	"8954-Р"
);

INSERT INTO apparatus (idModel, idOwner) VALUES
(1, 3),
(3, 3),
(6, 3);

INSERT INTO statusRepair (name) VALUES
("на рассмотрении"),
("ожидает передачи"),
("на диагностике"),
("ожидает оплаты"),
("на ремонте"),
("ожидает приёма"),
("на гарантии"),
("завершён"),
("отказано клиентом"),
("отказано в починке"),
("запись о ремонте вне РЕПРОТЕК");

INSERT INTO repair
(
	idMaster,
	idApparatus,
	idStatus,
	
	brekage,
	description,
	feedback
) VALUES
(
	2,
	1,
	8,
	"Сварка сломалась",
	"Однажды во время работы перестал работать аппарат.",
	"Всё замечательно."
),(
	2,
	1,
	5,
	"Сварка сломалась 2",
	"Однажды во время работы перестал работать аппарат.",
	NULL
);



/*
Для ролей:

yii migrate --migrationPath=@yii/rbac/migrations
yii rbac/init
*/
