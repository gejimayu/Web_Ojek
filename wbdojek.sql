DROP TABLE IF EXISTS order_data;
DROP TABLE IF EXISTS pref_location;
DROP TABLE IF EXISTS driver;
DROP TABLE IF EXISTS user;

CREATE TABLE user (
	id_user int NOT NULL AUTO_INCREMENT,
	name varchar(50),
	username varchar(20),
	prof_pic varchar(255),
	email varchar(100),
	password varchar(50),
	phone_number varchar(20),
	driver_status varchar(10),
	PRIMARY KEY (id_user)
);

INSERT INTO user(name, username, prof_pic, email, password, phone_number, driver_status) 
VALUES 	("Pika", "pikapika", "img/pika1.png", "cobacoba@gmail.com", "asd123", "085723289999", "true"),
		("Pika2", "pikapika2", "img/pika2.png", "cobacoba@gmail.com", "asd123", "085723289999", "true"),
		("Pika3", "pikapika3", "img/pika2.png", "cobacoba3@gmail.com", "asd123", "085723289999", "true"),
		("Pika4", "pikapika4", "img/naruto1.png", "cobacoba4@gmail.com", "asd123", "08239293929", "true"),
		("Pika5", "pikapika5", "img/naruto2.jpg", "cobacoba5@gmail.com", "asd123", "08239293929", "true"),
		("Pika6", "pikapika6", "img/naruto3.jpg", "cobacoba6@gmail.com", "asd123", "08239293929", "true"),
		("Pika7", "pikapika7", "img/pika1.png", "cobacoba@gmail.com", "asd123", "085723289999", "false"),
		("Pika8", "pikapika8", "img/pika2.png", "cobacoba3@gmail.com", "asd123", "085723289999", "false");

CREATE TABLE driver (
	id_driver int NOT NULL,
	avgrating FLOAT,
	num_votes int,
	PRIMARY KEY (id_driver),
	FOREIGN KEY (id_driver) REFERENCES user(id_user)
);

INSERT INTO driver
VALUES	(1, 0, 0), 
		(2, 0, 0),
		(3, 0, 0),
		(4, 0, 0),
		(5, 0, 0),
		(6, 0, 0);

CREATE TABLE pref_location (
	id_driver int NOT NULL,
	location varchar(255),
	PRIMARY KEY (id_driver, location),
	FOREIGN KEY (id_driver) REFERENCES driver(id_driver)
);

INSERT INTO pref_location
VALUES 	(1, "BEC"),
		(1, "ITB"),
		(2, "Jurang"),
		(2, "Kolong Jembatan"),
		(3, "Kuburan"),
		(3, "Jurang"),
		(4, "Kolng Jembatan"),
		(4, "ITB"),
		(5, "BEC"),
		(5, "Kuburan"),
		(6, "Jurang"),
		(6, "Kuburan");

CREATE TABLE order_data (
	id_order int NOT NULL AUTO_INCREMENT,
	id_driver int NOT NULL,
	id_user int NOT NULL,
	date_order DATE,
	origin varchar(100),
	destination varchar(100),
	rating int,
	comment varchar(255),
	PRIMARY KEY (id_order),
	FOREIGN KEY (id_driver) REFERENCES driver(id_driver),
	FOREIGN KEY (id_user) REFERENCES user(id_user)
);