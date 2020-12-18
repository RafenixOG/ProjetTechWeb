-- MySQL dump 10.13  Distrib 8.0.22, for Linux (x86_64)
--
-- Host: localhost    Database: projetTechWeb
-- ------------------------------------------------------
-- Server version	8.0.22-0ubuntu0.20.04.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `examen`
--

DROP TABLE IF EXISTS `examen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `examen` (
  `id` int NOT NULL,
  `etat` enum('NON PRÉSENTÉ','EN COURS','TERMINÉ') NOT NULL,
  `resultat` double DEFAULT NULL,
  `FK_etudiant` varchar(20) DEFAULT NULL,
  `FK_matiere` varchar(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_etudiant` (`FK_etudiant`),
  KEY `FK_matiere` (`FK_matiere`),
  CONSTRAINT `examen_ibfk_2` FOREIGN KEY (`FK_etudiant`) REFERENCES `utilisateur` (`login`),
  CONSTRAINT `examen_ibfk_3` FOREIGN KEY (`FK_matiere`) REFERENCES `matiere` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `examen`
--

LOCK TABLES `examen` WRITE;
/*!40000 ALTER TABLE `examen` DISABLE KEYS */;
INSERT INTO `examen` VALUES (1,'TERMINÉ',5,'rnuhic','TW'),(2,'TERMINÉ',20,'rnuhic','ENG'),(3,'NON PRÉSENTÉ',NULL,'rnuhic','JVA');
/*!40000 ALTER TABLE `examen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ligne`
--

DROP TABLE IF EXISTS `ligne`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ligne` (
  `id` int NOT NULL AUTO_INCREMENT,
  `FK_examen` int NOT NULL,
  `FK_question` smallint NOT NULL,
  `FK_reponse` smallint DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_examen` (`FK_examen`),
  KEY `FK_question` (`FK_question`),
  KEY `FK_reponse` (`FK_reponse`),
  CONSTRAINT `ligne_ibfk_1` FOREIGN KEY (`FK_examen`) REFERENCES `examen` (`id`),
  CONSTRAINT `ligne_ibfk_2` FOREIGN KEY (`FK_question`) REFERENCES `question` (`id`),
  CONSTRAINT `ligne_ibfk_3` FOREIGN KEY (`FK_reponse`) REFERENCES `reponse` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ligne`
--

LOCK TABLES `ligne` WRITE;
/*!40000 ALTER TABLE `ligne` DISABLE KEYS */;
INSERT INTO `ligne` VALUES (32,2,6,22),(39,1,3,9),(40,1,1,1);
/*!40000 ALTER TABLE `ligne` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `matiere`
--

DROP TABLE IF EXISTS `matiere`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `matiere` (
  `id` varchar(3) NOT NULL,
  `intitule` varchar(50) NOT NULL,
  `FK_professeur` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_professeur` (`FK_professeur`),
  CONSTRAINT `matiere_ibfk_1` FOREIGN KEY (`FK_professeur`) REFERENCES `utilisateur` (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matiere`
--

LOCK TABLES `matiere` WRITE;
/*!40000 ALTER TABLE `matiere` DISABLE KEYS */;
INSERT INTO `matiere` VALUES ('ENG','Anglais','onisolle'),('JVA','Java','dvalentin'),('TW','Technique Web','dvalentin');
/*!40000 ALTER TABLE `matiere` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `question` (
  `id` smallint NOT NULL,
  `intitule` varchar(200) NOT NULL,
  `FK_matiere` varchar(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_matiere` (`FK_matiere`),
  CONSTRAINT `question_ibfk_1` FOREIGN KEY (`FK_matiere`) REFERENCES `matiere` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question`
--

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` VALUES (1,'Que veut dire l\'acronyme HTML ?','TW'),(2,'Que veut dire l\'acronyme CSS ?','TW'),(3,'Par quoi commence tout document HTML ?','TW'),(4,'Que veux dire l\'acronyme PHP ?','TW'),(5,'What does hello mean','ENG'),(6,'What does goodbye mean ?','ENG'),(7,'A quoi fait référence le nom Java ?','JVA'),(8,'Java est un langage orienté...','JVA'),(9,'Comment déclare-t-on une variable entière ?','JVA'),(10,'Comment appell-t-on une boucle où on va parcourir un array ?','JVA');
/*!40000 ALTER TABLE `question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reponse`
--

DROP TABLE IF EXISTS `reponse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reponse` (
  `id` smallint NOT NULL,
  `intitule` varchar(200) NOT NULL,
  `correct` tinyint(1) NOT NULL,
  `FK_question` smallint NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_question` (`FK_question`),
  CONSTRAINT `reponse_ibfk_1` FOREIGN KEY (`FK_question`) REFERENCES `question` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reponse`
--

LOCK TABLES `reponse` WRITE;
/*!40000 ALTER TABLE `reponse` DISABLE KEYS */;
INSERT INTO `reponse` VALUES (1,'Hypertext Markup Language',1,1),(2,'Hypertext Makeup Language',0,1),(3,'Henry Thierry Marc Laurant',0,1),(4,'Ça ne veut rien dire',0,1),(5,'Caesar Servitores Salutan',0,2),(6,'Cascading Style Sheets',1,2),(7,'Ce sont les initiales de son inventeur : Caspard Noé Nabuchodonosor',0,2),(8,'Crack Super Sécurisé',0,2),(9,'Ce qu\'on veut, il n\'y a pas de règle',0,3),(10,'Une balise php',0,3),(11,'Une balise html',1,3),(12,'Une balise body',0,3),(13,'Ce sont les initiales de son inventeur : Philip Herbert Pingenfelter',0,4),(14,'Principe Hasta Percolum',0,4),(15,'Petite Hiver Pluvieux',0,4),(16,'PHP: Hypertext Preprocessor',1,4),(17,'Bonjour',1,5),(18,'ça ne veux rien dire',0,5),(19,'au revoir',0,5),(20,'Je veux du lait dans mon thé',0,5),(21,'Bonjour',0,6),(22,'Au revoir',1,6),(23,'Est-ce l\'heure du thé ?',0,6),(24,'Oui',0,6),(25,'Au café',1,7),(26,'A l\'île',0,7),(27,'A la danse',0,7),(28,'A une chanson de Michel Sardou',0,7),(29,'rien du tout',0,8),(30,'objet',1,8),(31,'politiquement',0,8),(32,'programmation',0,8),(33,'float',0,9),(34,'string',0,9),(35,'boolean',0,9),(36,'int',1,9),(37,'While',0,10),(38,'Do/while',0,10),(39,'For-each',1,10),(40,'For',0,10);
/*!40000 ALTER TABLE `reponse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `utilisateur` (
  `login` varchar(20) NOT NULL,
  `mdp` varchar(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `estProf` tinyint(1) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateur`
--

LOCK TABLES `utilisateur` WRITE;
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
INSERT INTO `utilisateur` VALUES ('dvalentin','tttttt','Valentin','Didier',1),('onisolle','tttttt','Nisole','Olivia',1),('rnuhic','tttttt','Nuhic','Ramo',0);
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-18 12:11:29
