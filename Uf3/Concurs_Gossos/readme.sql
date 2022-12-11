Base de dades:
	-concurs_gossos:
		-Usuaris:		
			-nom(primaryKey)
			-password
		
		-Fase:			
			-fase_id(primaryKey)
			-dataInici
			-dataFi
		
		-Gos:			
			-idGos(primaryKey)
            -nom
			-img
			-amo
			-raza

		-Vots:
			-idSession(primaryKey)
			-fase_id(ForeignKey)
			-idGos(ForeignKey)


mysql -u root
create database concurs_gossos;
create user admin@localhost identified by "patata";
grant all privileges on concurs_gossos.* to admin@localhost;
exit;
mysql -u admin -p
use concurs_gossos;


CREATE TABLE if not exists Usuaris (
    nom varchar(255),
    password varchar(255),
	PRIMARY KEY (nom)
);

CREATE TABLE if not exists Fase (
    fase_id int,
    dataInici Date,
	dataFi Date,
	PRIMARY KEY (fase_id)
);

CREATE TABLE if not exists Gos (
    idGos int,
    nom varchar(255),
	img varchar(255),
	amo varchar(255),
	raza varchar(255),
	PRIMARY KEY (idGos)
);

CREATE TABLE if not exists Vots (
    idSession int,
    fase_id int,
	idGos int,
	PRIMARY KEY (idSession),
	FOREIGN KEY (fase_id) REFERENCES Fase(fase_id),
	FOREIGN KEY (idGos) REFERENCES Gos(idGos)
);


INSERT INTO Usuaris (nom, password) VALUES ('test', 'test');

INSERT INTO Gos (idGos, nom, img, amo, raza) VALUES ('1', 'Musclo', 'g1.png', 'pep', 'chiuaua'), ('2', 'Jingo', 'g2.png', 'josep', 'bulldog'), ('3', 'Xuia', 'g3.png', 'jaume', 'setter'), ('4', 'Bruc', 'g4.png', 'fransic', 'caniche'), ('5', 'Mango', 'g5.png', 'xavier', 'yorsai'), ('6', 'Fluski', 'g6.png', 'oriol', 'beagle'), ('7', 'Fonoll', 'g7.png', 'pau', 'haski'), ('8', 'Swing', 'g8.png', 'pere', 'afgano'), ('9', 'Coloma', 'g9.png', 'met', 'boxer');
