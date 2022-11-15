-- MySQL dump 10.13  Distrib 8.0.31, for Linux (x86_64)
--
-- Host: localhost    Database: birthday_reminder
-- ------------------------------------------------------
-- Server version	8.0.31-0ubuntu0.20.04.1

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
-- Current Database: `birthday_reminder`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `birthday_reminder` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `birthday_reminder`;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `admin_id` int unsigned NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `admin_email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `admin_password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'Христо Събев','admin@balikgstudio.eu','5f4dcc3b5aa765d61d8327deb882cf99','2021-09-16 13:36:10','2022-08-24 17:00:26'),(2,'Стефан Георгиев','stefan@balikgstudio.eu','2e970e822e1a8834203d06abb60f59ec','2022-11-14 18:51:17','2022-11-14 18:50:43');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `birthday_list`
--

DROP TABLE IF EXISTS `birthday_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `birthday_list` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `birthdate` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `birthday_list`
--

LOCK TABLES `birthday_list` WRITE;
/*!40000 ALTER TABLE `birthday_list` DISABLE KEYS */;
INSERT INTO `birthday_list` VALUES (1,'Оксана','12.11.2022','2022-11-13 14:55:13'),(3,'Христо Събев','10.04.2003','2022-11-13 15:19:06'),(20,'Марияна','31.03.2023','2022-11-14 18:55:56'),(21,'Красимир','07.02.2023','2022-11-14 18:56:27'),(22,'Райна','09.08.2023','2022-11-14 18:56:50'),(23,'Гергана','26.03.2023','2022-11-14 18:57:26'),(24,'Виктория','31.01.2023','2022-11-14 18:57:42'),(25,'Илияна','04.03.2023','2022-11-14 18:57:59'),(26,'Дони','27.07.2023','2022-11-14 18:58:25'),(27,'Красимир Тодоров','01.07.2023','2022-11-14 18:59:22'),(28,'Сашо','02.07.2023','2022-11-14 18:59:34'),(29,'Мони','13.11.2023','2022-11-14 19:00:11'),(30,'Стефан','02.02.2023','2022-11-14 19:00:51'),(33,'Таня','20.01.2023','2022-11-14 19:02:40'),(34,'Георги','04.03.2023','2022-11-14 19:03:12'),(35,'Сисо','15.06.2023','2022-11-14 19:04:37'),(36,'Калия','03.11.2023','2022-11-14 19:05:49'),(37,'Николай','26.02.2023','2022-11-14 19:07:22');
/*!40000 ALTER TABLE `birthday_list` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-15  9:56:48
