SET NAMES utf8mb4;
DROP DATABASE IF EXISTS DTBLocation;
CREATE DATABASE IF NOT EXISTS DTBLocation;
USE DTBLocation;

CREATE TABLE Rank (
	id INT AUTO_INCREMENT,
	libelle VARCHAR(64),
	PRIMARY KEY(id)
);

CREATE TABLE Localisation(
	id INT AUTO_INCREMENT,
	adresse VARCHAR(255),
	zip INT,
	ville VARCHAR(64),
	PRIMARY KEY(id)
);

CREATE TABLE Users(
	id INT AUTO_INCREMENT,
	username VARCHAR(64),
	nom VARCHAR(64),
	prenom VARCHAR(64),
	password VARCHAR(255),
	email VARCHAR(255),
	picture VARCHAR(64),
	id_role INT,
	PRIMARY KEY(id),
	FOREIGN KEY (id_role) REFERENCES Rank (id)
);

CREATE TABLE Offre(
	id INT AUTO_INCREMENT,
	titre VARCHAR(255),
	nbr_personne INT,
	nbr_pieces INT,
	prix FLOAT,
	date_heure_parution TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	date_début DATE,
	date_fin DATE,
	descriptif TEXT,
	user_id INT,
	localisation_id INT,
	PRIMARY KEY(id),
	FOREIGN KEY(user_id) REFERENCES Users(id),
	FOREIGN KEY(localisation_id) REFERENCES Localisation(id)
);

CREATE TABLE Photo(
	id INT AUTO_INCREMENT,
	lien VARCHAR(64),
	id_offre INT,
	PRIMARY KEY(id),
	FOREIGN KEY(id_offre) REFERENCES Offre(id)
);

CREATE TABLE Review(
	id INT AUTO_INCREMENT,
	user_id INT,
	offre_id INT,
	notation INT,
	commentaire TEXT,
	date_notation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (id),
	FOREIGN KEY (user_id) REFERENCES Users(id),
	FOREIGN KEY (offre_id) REFERENCES Offre(id)
);

CREATE TABLE Agrements(
	id INT AUTO_INCREMENT,
	nom VARCHAR(64),
	icon VARCHAR(64),
	PRIMARY KEY (id)
);

CREATE TABLE Reservations(
	id INT AUTO_INCREMENT,
	user_id INT,
	offre_id INT,
	check_in DATE,
	check_out DATE,
	nbr_personne INT,
	prix_total DECIMAL(10,2),
	date_reservation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (id),
	FOREIGN KEY (user_id) REFERENCES Users(id),
	FOREIGN KEY (offre_id) REFERENCES Offre(id)
);

CREATE TABLE Ban(
    id INT NOT NULL AUTO_INCREMENT,
    user_id INT,
    raison VARCHAR(255),
    date_debut TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES Users(id)
);


CREATE TABLE Offre_Agrements (
   offre_id INT,
   agrements_id INT,
   PRIMARY KEY (offre_id, agrements_id),
   FOREIGN KEY (offre_id) REFERENCES Offre(id),
   FOREIGN KEY (agrements_id) REFERENCES Agrements(id)
);

CREATE TABLE Conversation(
	idConversation INT AUTO_INCREMENT,
	idUser1 INT,
	idUser2 INT,
	PRIMARY KEY (idConversation),
	FOREIGN KEY (idUser1) REFERENCES Users(id),
	FOREIGN KEY (idUser2) REFERENCES Users(id)
);

CREATE TABLE Message(
	idMessage INT AUTO_INCREMENT,
	content TEXT,
	idConversation INT,
	idUser INT,
	heure DATETIME,
	 /*Celui qui a poster le message*/
	PRIMARY KEY (idMessage),
	FOREIGN KEY (idUser) REFERENCES Users(id),
	FOREIGN KEY (idConversation) REFERENCES Conversation(idConversation)
);

INSERT INTO Rank (libelle) VALUES
("Administrateur"),
("Modérateur"),
("Utilisateur"),
("Ban");

INSERT INTO Users(username, password) VALUES("Utilisateur", SHA2("mdp", 256));

INSERT INTO Agrements(nom) VALUES
("Parking gratuit sur place"),
("Parking payant sur place"),
("Accès au lac"),
("Accessible à skis"),
("Wifi"),
("Télévision"),
("Cuisine"),
("Lave-linge"),
("Climatisation"),
("Espace de travail dédié"),
("Piscine"),
("Jacuzzi"),
("Patio"),
("Barbecue"),
("Espace repas en plein air"),
("Brassero"),
("Billard"),
("Cheminée"),
("Piano"),
("Appareils de fitness"),
("Baignoire"),
("Douche Italienne"),
("Kit de premiers secours"),
("Extincteur"),
("Détecteur de fumée"),
("Détecteur de monoxyde de carbone");

INSERT INTO Localisation(adresse, zip, ville) VALUES
("Quelque part", "????", "Gateway galaxy");

INSERT INTO Offre(titre, nbr_personne, nbr_pieces, prix,  date_début, date_fin, descriptif, user_id, localisation_id) VALUES
("Maison avec vue sur l'univers", 4, 6, 736, 2012-02-02, 5000-05-05, "Une planète dans les confins de l'univers pour vous isoler et profiter, sans stress i anxiété, accessible par differents observatoires pouvant vous aidez si dans le besoin", 1, 1);

INSERT INTO Photo(lien, id_offre) VALUES
("/assets/img/photoLogement/Test1.jpeg",1),
("/assets/img/photoLogement/Test2.jpg", 1);

INSERT INTO Review(user_id, offre_id, notation, commentaire) VALUES
(1,1,5,"Très sympatique mais peut facilement désorienté avec cette gravité capricieuse.");