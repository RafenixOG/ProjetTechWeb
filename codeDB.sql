create database projetTechWeb;
use projetTechWeb;

create table etudiant (
	login varchar(20) PRIMARY KEY,
    mdp varchar(20) NOT NULL,
    nom varchar(20) NOT NULL,
    prenom varchar(20) NOT NULL
);

create table matiere (
	id varchar(3) PRIMARY KEY,
    intitule varchar(50) NOT NULL
);

create table question (
	id smallint PRIMARY KEY,
    intitule varchar(200) NOT NULL,
    FK_matiere varchar(3) NOT NULL,
    FOREIGN KEY (FK_matiere) REFERENCES matiere(id)
);

create table reponse (
	id smallint PRIMARY KEY,
    intitule varchar(200) NOT NULL,
    correct boolean NOT NULL,
    FK_question smallint NOT NULL,
    FOREIGN KEY (FK_question) REFERENCES question(id)
);

create table examen (
	id int PRIMARY KEY,
    etat ENUM('NON PRÉSENTÉ', 'EN COURS', 'TERMINÉ') NOT NULL,
    resultat double(2, 1),
    FK_reponse smallint,
    FK_etudiant varchar(20),
    FOREIGN KEY (FK_reponse) REFERENCES reponse(id),
    FOREIGN KEY (FK_etudiant) REFERENCES etudiant(login)
);

create table professeur (
	login varchar(20) PRIMARY KEY,
    mdp varchar(20) NOT NULL,
    nom varchar(20) NOT NULL,
    prenom varchar(20) NOT NULL,
    FK_matiere varchar(3) NOT NULL,
    FK_examen int NOT NULL,
    FOREIGN KEY (FK_matiere) REFERENCES matiere(id),
    FOREIGN KEY (FK_examen) REFERENCES examen(id)
);

create table ligne (
	id tinyint PRIMARY KEY,
    FK_examen int NOT NULL,
    FK_question smallint NOT NULL,
    FK_reponse smallint NOT NULL,
    FOREIGN KEY (FK_examen) REFERENCES examen(id),
    FOREIGN KEY (FK_question) REFERENCES question(id),
    FOREIGN KEY (FK_reponse) REFERENCES reponse(id)
);

alter table professeur drop foreign key professeur_ibfk_1;

alter table professeur drop column FK_matiere;

alter table matiere add column FK_professeur varchar(20);

alter table matiere add foreign key (FK_professeur) references professeur(login);

alter table examen drop foreign key examen_ibfk_1;

alter table examen drop column FK_reponse;

alter table professeur drop foreign key professeur_ibfk_2;

alter table professeur drop column FK_examen;

alter table examen add column FK_matiere varchar(3) NOT NULL;

alter table examen add foreign key (FK_matiere) references matiere(id);

rename table etudiant to utilisateur;

alter table matiere drop foreign key matiere_ibfk_1;

drop table professeur;

alter table matiere add foreign key (FK_professeur) references utilisateur(login);

alter table utilisateur add column estProf boolean NOT NULL;