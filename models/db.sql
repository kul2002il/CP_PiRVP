
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
	
	name VARCHAR(80) NOT NULL,
	
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


CREATE TABLE repair(
	id INT AUTO_INCREMENT PRIMARY KEY,
	
	idMaster INT,
	idApparatus INT NOT NULL,

	title VARCHAR(200) NOT NULL,
	description TEXT NOT NULL,
	feedback TEXT,
	
	startRepair DATETIME NOT NULL DEFAULT NOW(),
	endRepair DATETIME,
	
	FOREIGN KEY (idMaster) REFERENCES user (id) ON DELETE CASCADE,
	FOREIGN KEY (idApparatus) REFERENCES apparatus (id) ON DELETE CASCADE
);

CREATE TABLE message(
	id INT AUTO_INCREMENT PRIMARY KEY,
	
	idSender INT NOT NULL,
	idRepair INT NOT NULL,
	content TEXT NOT NULL,
	datetime DATETIME NOT NULL DEFAULT NOW(),
	
	FOREIGN KEY (idSender) REFERENCES user (id) ON DELETE CASCADE,
	FOREIGN KEY (idRepair) REFERENCES repair (id) ON DELETE CASCADE
);

CREATE TABLE file(
	id INT AUTO_INCREMENT PRIMARY KEY,
	idOwner INT NOT NULL,
	name VARCHAR(200) NOT NULL,
	
	FOREIGN KEY (idOwner) REFERENCES user (id) ON DELETE CASCADE
);


CREATE TABLE unread(
	id INT AUTO_INCREMENT PRIMARY KEY,
	
	idMessage INT NOT NULL,
	idUser INT NOT NULL,
	
	FOREIGN KEY (idUser) REFERENCES user (id) ON DELETE CASCADE,
	FOREIGN KEY (idMessage) REFERENCES message (id) ON DELETE CASCADE
);

CREATE TABLE fileInMessage(
	id INT AUTO_INCREMENT PRIMARY KEY,
	
	idFile INT NOT NULL,
	idMessage INT NOT NULL,
	
	FOREIGN KEY (idFile) REFERENCES file (id) ON DELETE CASCADE,
	FOREIGN KEY (idMessage) REFERENCES message (id) ON DELETE CASCADE
);

CREATE TABLE news(
	id INT AUTO_INCREMENT PRIMARY KEY,
	idFile INT,
	title VARCHAR(200) NOT NULL,
	content TEXT NOT NULL,
	datetime DATETIME NOT NULL DEFAULT NOW(),
	
	FOREIGN KEY (idFile) REFERENCES file (id) ON DELETE SET NULL
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
(6, 3),
(1, 4),
(3, 4),
(6, 4);

/*
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
*/

INSERT INTO repair
(
	idMaster,
	idApparatus,
	
	title,
	description,
	feedback
) VALUES
(
	2,
	1,
	"Сварка сломалась",
	"Однажды во время работы перестал работать аппарат.",
	"Всё замечательно."
),(
	2,
	1,
	"Сварка сломалась 2",
	"Однажды во время работы перестал работать аппарат.",
	NULL
);

INSERT INTO message (idSender, idRepair, content) VALUES
(
	3,
	1,
	"Добрый день. Есть поломка вот такая."
),(
	2,
	1,
	"Спасибо, что обратились в нашу ремонтную компанию. Откуда Вы о нас узнали?"
),(
	3,
	1,
	"Друзья порекомендовали."
),(
	2,
	1,
	"О проблеме прочитал. Готовы к встече на диагностику."
);

INSERT INTO file(idOwner, name) VALUES
(1, "media/image/banner.png"),
(1, "media/image/metal.jpeg"),
(1, "media/image/start.jpg"),
(1, "media/image/start2.jpg"),
(1, "media/image/work.jpeg"),
(2, "media/image/1/DSC_9369.JPG"),
(2, "media/image/1/DSC_9371.JPG"),
(2, "media/image/1/DSC_9375.JPG"),
(2, "media/image/1/DSC_9377.JPG"),
(2, "media/image/1/DSC_9379.JPG"),
(2, "media/image/1/DSC_9382.JPG"),
(2, "media/image/1/DSC_9384.JPG"),
(2, "media/image/1/DSC_9386.JPG"),
(2, "media/image/1/DSC_9392.JPG"),
(3, "media/image/1/DSC_9373.JPG"),
(3, "media/image/1/DSC_9373.JPG"),
(3, "media/image/1/DSC_9376.JPG"),
(3, "media/image/1/DSC_9378.JPG"),
(2, "media/image/1/DSC_9381.JPG"),
(2, "media/image/1/DSC_9383.JPG"),
(2, "media/image/1/DSC_9385.JPG"),
(2, "media/image/1/DSC_9387.JPG"),
(2, "media/image/2/DSC_1447.JPG"),
(2, "media/image/2/DSC_1449.JPG"),
(2, "media/image/2/DSC_1451.JPG"),
(2, "media/image/2/DSC_1453.JPG"),
(2, "media/image/2/DSC_1455.JPG"),
(2, "media/image/2/DSC_1448.JPG"),
(2, "media/image/2/DSC_1454.JPG"),
(4, "media/image/2/DSC_1452.JPG"),
(4, "media/image/2/DSC_1454.JPG"),
(4, "media/image/2/DSC_1456.JPG"),
(4, "media/image/3/DSC_2249.JPG"),
(4, "media/image/3/DSC_2252.JPG"),
(4, "media/image/3/DSC_2255.JPG"),
(4, "media/image/3/DSC_2258.JPG"),
(4, "media/image/3/DSC_2261.JPG"),
(4, "media/image/3/DSC_2264.JPG"),
(4, "media/image/3/DSC_2267.JPG"),
(4, "media/image/3/DSC_2250.JPG"),
(4, "media/image/3/DSC_2253.JPG"),
(4, "media/image/3/DSC_2256.JPG"),
(4, "media/image/3/DSC_2259.JPG"),
(4, "media/image/3/DSC_2262.JPG"),
(4, "media/image/3/DSC_2265.JPG"),
(4, "media/image/3/DSC_2268.JPG"),
(2, "media/image/3/DSC_2251.JPG"),
(2, "media/image/3/DSC_2254.JPG"),
(2, "media/image/3/DSC_2257.JPG"),
(2, "media/image/3/DSC_2260.JPG"),
(2, "media/image/3/DSC_2263.JPG"),
(2, "media/image/3/DSC_2266.JPG");

INSERT INTO unread (idUser, idMessage) VALUES
(3, 3);

INSERT INTO fileInMessage (idMessage, idFile) VALUES
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22);

INSERT INTO news (idFile, title, content) VALUES
(
	3,
	"Есть старт",
	"Положено начало отображения новостей для среды тестовой вёрстки интерфейса и вёрстки."
),(
	4,
	"Странный старт",
	"Какой-то дебил воткнул знак старта посередине дороги. Первая машина, что пошла на обгон, не смотря на двойную сплошную, также несмотря врезалась в столб знака. ГОСТы вам не игрушка. Пользуйтесь гостами при установке дорожных знаков. Удачи на дорогах"
),(
	2,
	"М — значит металл",
	"С этого момента мы занимаемся слесарной обработкой металла. Заявки принимаются в стандартном режиме, как и всегда."
);

/*
Для ролей:
yii migrate --migrationPath=@yii/rbac/migrations
yii rbac/init
*/