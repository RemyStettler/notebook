CREATE DATABASE  IF NOT EXISTS `logins` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `logins`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: logins
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.35-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `notizen`
--

DROP TABLE IF EXISTS `notizen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notizen` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `benutzername` varchar(50) NOT NULL,
  `notiz` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notizen`
--

LOCK TABLES `notizen` WRITE;
/*!40000 ALTER TABLE `notizen` DISABLE KEYS */;
INSERT INTO `notizen` VALUES (59,'remy','dgdfgdfg'),(60,'remy','fghfghfgh'),(61,'remy','fghfghfgh'),(62,'remy','fghfghfgh'),(63,'remy','fghfghfgh'),(64,'remy','fghfghfgh'),(65,'remy','fghfghfg'),(66,'remy','jjjjjjjjjjjjj'),(67,'remy','jjjjjjjjjjjjjjjjjjjjjj'),(68,'remy','adada'),(69,'remy','asdadas'),(70,'remy','asdaff'),(71,'remy','dfgdfgdfg'),(72,'remy','bnvbnvcbn'),(73,'remy','sdfgdsfgsdfg'),(74,'remy','xcvbxcvbdftgsdyg'),(75,'remy','ydfgbfbhydfhbfgjsj'),(76,'remy','sdgsdghdsfg'),(77,'raffaele','sdfasdf');
/*!40000 ALTER TABLE `notizen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `benutzername` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'remy','40bd001563085fc35165329ea1ff5c5ecbdbbeef'),(2,'raffaele','40bd001563085fc35165329ea1ff5c5ecbdbbeef'),(3,'publicuser','40bd001563085fc35165329ea1ff5c5ecbdbbeef');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-09-18 12:34:36
