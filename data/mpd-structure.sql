-- Supprime la base de données si elle existe déjà
DROP DATABASE IF EXISTS `540_fc`;

-- Crée la base de données
CREATE DATABASE IF NOT EXISTS `540_fc`;

USE `540_fc`;

CREATE TABLE role(
    id bigint(250) NOT NULL AUTO_INCREMENT PRIMARY KEY
    ,nom varchar(250) NOT NULL
);

CREATE TABLE utilisateur (
    id bigint(250) NOT NULL AUTO_INCREMENT PRIMARY KEY
    ,nom varchar(250) NOT NULL
    ,prenom varchar(250) NOT NULL
    ,email varchar (250) NOT NULL
    ,motDePasse varchar (250) NOT NULL
    ,idRole bigint (250)
);

CREATE TABLE question(
    id bigint(250) NOT NULL AUTO_INCREMENT PRIMARY KEY
    ,numero int(250) NOT NULL
    ,intitule varchar(250) NOT NULL
    ,idUser bigint (250)
);

CREATE TABLE proposition(
    id bigint(250) NOT NULL AUTO_INCREMENT PRIMARY KEY
    ,lettre varchar(250) NOT NULL
    ,intitule varchar(250) NOT NULL
    ,estBonneReponse tinyint(1) NOT NULL 
    ,idQuestion bigint (250)
);

CREATE TABLE score(
    id bigint(250) NOT NULL AUTO_INCREMENT PRIMARY KEY
    ,score varchar(250)
    ,idUser bigint (250)
);

ALTER TABLE utilisateur
ADD CONSTRAINT `fk_user_role` FOREIGN KEY (idRole) REFERENCES role(id)
,ADD CONSTRAINT `u_user_email` UNIQUE (email)
;

ALTER TABLE question
ADD CONSTRAINT `fk_question_user` FOREIGN KEY (idUser) REFERENCES utilisateur(id)
;

ALTER TABLE proposition
ADD CONSTRAINT `fk_porposition_question` FOREIGN KEY (idQuestion) REFERENCES question(id)
;

ALTER TABLE score
ADD CONSTRAINT `fk_score_user` FOREIGN KEY (idUser) REFERENCES utilisateur(id)
;