-- MySQL dump 10.13  Distrib 8.0.40, for Win64 (x86_64)
--
-- Host: localhost    Database: patients
-- ------------------------------------------------------
-- Server version	8.0.40

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `application_information`
--

DROP TABLE IF EXISTS `application_information`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `application_information` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(150) DEFAULT NULL,
  `description` longtext,
  `created_at` varchar(45) DEFAULT NULL,
  `application_informationcol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application_information`
--

LOCK TABLES `application_information` WRITE;
/*!40000 ALTER TABLE `application_information` DISABLE KEYS */;
/*!40000 ALTER TABLE `application_information` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `appointments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `schedule` datetime(6) DEFAULT NULL,
  `arrived` datetime(6) DEFAULT NULL,
  `purpose_of_visit` varchar(250) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `reason_cancelled` longtext,
  `created_at` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  `doctors_id` int NOT NULL,
  `patient_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_appointments_doctors_idx` (`doctors_id`),
  KEY `fk_appointments_patient1_idx` (`patient_id`),
  CONSTRAINT `fk_appointments_doctors` FOREIGN KEY (`doctors_id`) REFERENCES `doctors` (`id`),
  CONSTRAINT `fk_appointments_patient1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointments`
--

LOCK TABLES `appointments` WRITE;
/*!40000 ALTER TABLE `appointments` DISABLE KEYS */;
/*!40000 ALTER TABLE `appointments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `archives`
--

DROP TABLE IF EXISTS `archives`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `archives` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(500) DEFAULT NULL,
  `directory` longtext,
  `created_at` varchar(45) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updat_at` varchar(45) DEFAULT NULL,
  `hospitals_id1` int NOT NULL,
  `expiration_date` varchar(150) DEFAULT NULL,
  `belongs_to` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `archives`
--

LOCK TABLES `archives` WRITE;
/*!40000 ALTER TABLE `archives` DISABLE KEYS */;
/*!40000 ALTER TABLE `archives` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attorney`
--

DROP TABLE IF EXISTS `attorney`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `attorney` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `phone_number` varchar(45) DEFAULT NULL,
  `address` longtext,
  `email` varchar(550) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attorney`
--

LOCK TABLES `attorney` WRITE;
/*!40000 ALTER TABLE `attorney` DISABLE KEYS */;
INSERT INTO `attorney` VALUES (1,'Tauan Araujo adv','','Rua José ortiz Sanches, 268, Recanto feliz','tauan.gt@gmail.com','18-11-24',NULL),(9,'João albuquerque','','Rua José ortiz Sanches, 268, Recanto feliz','tauan.gt@gmail.com','18-11-24',NULL);
/*!40000 ALTER TABLE `attorney` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `casemanager`
--

DROP TABLE IF EXISTS `casemanager`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `casemanager` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(80) DEFAULT NULL,
  `last_name` varchar(80) DEFAULT NULL,
  `address` longtext,
  `email` varchar(550) DEFAULT NULL,
  `phone_number` varchar(45) DEFAULT NULL,
  `account_manager` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  `attorney_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_casemanager_attorney1_idx` (`attorney_id`),
  CONSTRAINT `fk_casemanager_attorney1` FOREIGN KEY (`attorney_id`) REFERENCES `attorney` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `casemanager`
--

LOCK TABLES `casemanager` WRITE;
/*!40000 ALTER TABLE `casemanager` DISABLE KEYS */;
INSERT INTO `casemanager` VALUES (1,'Tauan','Araujo','Rua José ortiz Sanches','tauan.gt@gmail.com','12356465446',NULL,'Ativo','18-11-24',NULL,1),(4,'João','Albuquerque','Rua José ortiz Sanches','joaoa@gmail.com','12356465446',NULL,'Ativo','18-11-24',NULL,9);
/*!40000 ALTER TABLE `casemanager` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `note` longtext,
  `date` datetime(6) DEFAULT NULL,
  `inserted_by` varchar(150) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  `patient_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comments_patient1_idx` (`patient_id`),
  CONSTRAINT `fk_comments_patient1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `common_questions`
--

DROP TABLE IF EXISTS `common_questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `common_questions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `question` varchar(250) DEFAULT NULL,
  `response` longtext,
  `created_by` varchar(45) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `common_questions`
--

LOCK TABLES `common_questions` WRITE;
/*!40000 ALTER TABLE `common_questions` DISABLE KEYS */;
/*!40000 ALTER TABLE `common_questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `docie`
--

DROP TABLE IF EXISTS `docie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `docie` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` longtext,
  `created_at` varchar(45) DEFAULT NULL,
  `diretory` longtext,
  `hospital_id` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `docie`
--

LOCK TABLES `docie` WRITE;
/*!40000 ALTER TABLE `docie` DISABLE KEYS */;
/*!40000 ALTER TABLE `docie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `full_name` varchar(250) DEFAULT NULL,
  `firstname` varchar(80) DEFAULT NULL,
  `lastname` varchar(80) DEFAULT NULL,
  `facility` varchar(45) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctors`
--

LOCK TABLES `doctors` WRITE;
/*!40000 ALTER TABLE `doctors` DISABLE KEYS */;
INSERT INTO `doctors` VALUES (1,NULL,'Gabriel','Albernas','fdgfdgdfgfdgfdgfdgdfgdfgfdgfdg','18-11-24',NULL);
/*!40000 ALTER TABLE `doctors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `email_marketing`
--

DROP TABLE IF EXISTS `email_marketing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `email_marketing` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title_template` varchar(150) DEFAULT NULL,
  `description` longtext,
  `email_marketingcol1` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email_marketing`
--

LOCK TABLES `email_marketing` WRITE;
/*!40000 ALTER TABLE `email_marketing` DISABLE KEYS */;
/*!40000 ALTER TABLE `email_marketing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insurance`
--

DROP TABLE IF EXISTS `insurance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `insurance` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `address` longtext,
  `phone_number` varchar(45) DEFAULT NULL,
  `fax` longtext,
  `maps_iframe` varchar(900) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insurance`
--

LOCK TABLES `insurance` WRITE;
/*!40000 ALTER TABLE `insurance` DISABLE KEYS */;
INSERT INTO `insurance` VALUES (1,'AMIL','Rua José ortiz Sanches, 268, Recanto feliz - São paulo','12356465446','243645654656','<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3664.976022010509!2d-46.72727972572568!3d-23.28032095132535!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cee6e6940f5055%3A0x4ccf18844b52ca9a!2sR.%20Jos%C3%A9%20Ortiz%20Sanches%2C%20268%20-%20Recanto%20Feliz%2C%20Francisco%20Morato%20-%20SP%2C%2007980-000!5e0!3m2!1spt-BR!2sbr!4v1731789620959!5m2!1spt-BR!2sbr\" width=\"100%\" height=\"200\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>','18-11-24',NULL);
/*!40000 ALTER TABLE `insurance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `passwords`
--

DROP TABLE IF EXISTS `passwords`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `passwords` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` varchar(45) DEFAULT NULL,
  `user_name` varchar(150) DEFAULT NULL,
  `last password` varchar(150) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `passwords`
--

LOCK TABLES `passwords` WRITE;
/*!40000 ALTER TABLE `passwords` DISABLE KEYS */;
/*!40000 ALTER TABLE `passwords` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `patient` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(150) DEFAULT NULL,
  `last_name` varchar(150) DEFAULT NULL,
  `phone_number` varchar(45) DEFAULT NULL,
  `referral_doctor` varchar(500) DEFAULT NULL,
  `date_entered` date DEFAULT NULL,
  `date_brithday` date DEFAULT NULL,
  `date_accident` date DEFAULT NULL,
  `office_center` varchar(500) DEFAULT NULL,
  `employee_name` varchar(150) DEFAULT NULL,
  `scheduling_status` varchar(150) DEFAULT NULL,
  `sched_follow_update` varchar(150) DEFAULT NULL,
  `chief_complaint` longtext,
  `mri_notes` longtext,
  `created_at` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  `local` varchar(45) DEFAULT NULL,
  `ss` varchar(45) DEFAULT NULL,
  `address` varchar(900) DEFAULT NULL,
  `city_state_zip` varchar(900) DEFAULT NULL,
  `type_of_accident` varchar(250) DEFAULT NULL,
  `mri_ct_regions` varchar(250) DEFAULT NULL,
  `extremity` varchar(250) DEFAULT NULL,
  `pain_management_seen` varchar(45) DEFAULT NULL,
  `injections_performed` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `chief_complaint2` longtext,
  `chief_complaint3` longtext,
  `work` varchar(250) DEFAULT NULL,
  `home` varchar(250) DEFAULT NULL,
  `insurance_id` int NOT NULL,
  `attorney_id` int NOT NULL,
  `doctors_id` int NOT NULL,
  PRIMARY KEY (`id`,`insurance_id`,`attorney_id`,`doctors_id`),
  KEY `fk_patient_insurance1_idx` (`insurance_id`),
  KEY `fk_patient_attorney1_idx` (`attorney_id`),
  KEY `fk_patient_doctors1_idx` (`doctors_id`),
  CONSTRAINT `fk_patient_attorney1` FOREIGN KEY (`attorney_id`) REFERENCES `attorney` (`id`),
  CONSTRAINT `fk_patient_doctors1` FOREIGN KEY (`doctors_id`) REFERENCES `doctors` (`id`),
  CONSTRAINT `fk_patient_insurance1` FOREIGN KEY (`insurance_id`) REFERENCES `insurance` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patient`
--

LOCK TABLES `patient` WRITE;
/*!40000 ALTER TABLE `patient` DISABLE KEYS */;
INSERT INTO `patient` VALUES (2,'Tauan','Araujo','(11)988826339','fdgfdgfdgfdgfd','1111-11-11','1111-11-11','1111-11-11','ghyfghfgh','fghfghfgh','fghfghfgh',NULL,'fghfghfg','gfdgfdgdfgdfgdfgdfgdfgdfgdfg','18-11-24',NULL,'Miami',NULL,'Rua José Ortizz Sanches, Nº 268','Miami, place, 07980000','Moto','fdgfdgfdg','dfgdfgdfgfg','dfgdfgdfg','dfgdfgf','15161561','dfgdfgdfgf','fdgfdgfgf','dfgdfgfg','dfgdfg',1,1,1),(3,'Tadeu','Teodoro','1111111111111','dfgfgdfgfdgfdg','2024-12-15','1996-06-20','2024-11-11','dfgdfgfdgfdgfdgfdg','dfgfdgfdgfdgfdgdf','fgdfgfdgdfgd',NULL,'dfgdfgfdgdf','dfgdfgfdgfdgdfgdfgdfgdfgdfgfdg','18-11-24',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,9,1);
/*!40000 ALTER TABLE `patient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pip_insurance`
--

DROP TABLE IF EXISTS `pip_insurance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pip_insurance` (
  `id` int NOT NULL AUTO_INCREMENT,
  `insurance_name` varchar(250) DEFAULT NULL,
  `adjuste` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `policy` varchar(45) DEFAULT NULL,
  `claim_number` varchar(45) DEFAULT NULL,
  `id_patient` int DEFAULT NULL,
  `id_insurance` int DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  `updated_by` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pip_insurance`
--

LOCK TABLES `pip_insurance` WRITE;
/*!40000 ALTER TABLE `pip_insurance` DISABLE KEYS */;
/*!40000 ALTER TABLE `pip_insurance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recent_activities`
--

DROP TABLE IF EXISTS `recent_activities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `recent_activities` (
  `id` int NOT NULL AUTO_INCREMENT,
  `activity_done` varchar(200) DEFAULT NULL,
  `made_by` varchar(150) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recent_activities`
--

LOCK TABLES `recent_activities` WRITE;
/*!40000 ALTER TABLE `recent_activities` DISABLE KEYS */;
/*!40000 ALTER TABLE `recent_activities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `footer` varchar(650) DEFAULT NULL,
  `contact` varchar(45) DEFAULT NULL,
  `support_email` varchar(120) DEFAULT NULL,
  `nif_cnpj` varchar(45) DEFAULT NULL,
  `opening_hours` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site`
--

DROP TABLE IF EXISTS `site`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `site` (
  `id` int NOT NULL AUTO_INCREMENT,
  `about_us` varchar(45) DEFAULT NULL,
  `our_story` varchar(45) DEFAULT NULL,
  `whatsapp_button` varchar(600) DEFAULT NULL,
  `link_instagram` varchar(900) DEFAULT NULL,
  `link_linkedin` varchar(900) DEFAULT NULL,
  `link_facebook` varchar(900) DEFAULT NULL,
  `mission` varchar(350) DEFAULT NULL,
  `vision` varchar(350) DEFAULT NULL,
  `values` varchar(350) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  `update_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site`
--

LOCK TABLES `site` WRITE;
/*!40000 ALTER TABLE `site` DISABLE KEYS */;
/*!40000 ALTER TABLE `site` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `smtp_settings`
--

DROP TABLE IF EXISTS `smtp_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `smtp_settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `smtp_server` varchar(150) DEFAULT NULL,
  `door_number` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `smtp_settings`
--

LOCK TABLES `smtp_settings` WRITE;
/*!40000 ALTER TABLE `smtp_settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `smtp_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_about_us`
--

DROP TABLE IF EXISTS `system_about_us`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `system_about_us` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(150) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_about_us`
--

LOCK TABLES `system_about_us` WRITE;
/*!40000 ALTER TABLE `system_about_us` DISABLE KEYS */;
/*!40000 ALTER TABLE `system_about_us` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_functions`
--

DROP TABLE IF EXISTS `system_functions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `system_functions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(150) DEFAULT NULL,
  `short_description` varchar(200) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_functions`
--

LOCK TABLES `system_functions` WRITE;
/*!40000 ALTER TABLE `system_functions` DISABLE KEYS */;
/*!40000 ALTER TABLE `system_functions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `⁠lastName` varchar(45) DEFAULT NULL,
  `cpf` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `photo_user` varchar(150) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `phone_number` varchar(45) DEFAULT NULL,
  `office_address` varchar(900) DEFAULT NULL,
  `office_email` varchar(400) DEFAULT NULL,
  `manager_by` varchar(150) DEFAULT NULL,
  `token` varchar(250) DEFAULT NULL,
  `user_type` varchar(45) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `update_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Tauan Araujo',NULL,NULL,'suporte@programadoresemacao.com.br','1a64bd5a0c8a01e7d423257ca39f433a','uploads/668d9355e6591.jpg','Ativo',NULL,NULL,NULL,NULL,NULL,'Master','2023-08-02 21:27:01',NULL,NULL),(44,'Gelson',NULL,NULL,'gelson@gmail.com','1a64bd5a0c8a01e7d423257ca39f433a','assets/img/avatar-5.png','Ativo',NULL,NULL,NULL,NULL,'33e1b2cec66e404a8d8b94ab3dde53bc','Master','2024-11-18 08:16:31',NULL,NULL),(45,'Marcos',NULL,NULL,'msilva@omniorthoandspine.com','1a64bd5a0c8a01e7d423257ca39f433a','assets/img/avatar-5.png','Ativo',NULL,NULL,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e','Master','2024-11-18 08:24:46',NULL,NULL),(46,'',NULL,NULL,'','d41d8cd98f00b204e9800998ecf8427e','assets/img/avatar-5.png','Ativo',NULL,NULL,NULL,NULL,'d41d8cd98f00b204e9800998ecf8427e','Advogado','2024-11-18 09:29:49',NULL,NULL),(47,'João albuquerque',NULL,NULL,'tauan.gt@gmail.com','1a64bd5a0c8a01e7d423257ca39f433a','assets/img/avatar-5.png','Ativo',NULL,NULL,NULL,NULL,'33e1b2cec66e404a8d8b94ab3dde53bc','Advogado','2024-11-18 10:30:45',NULL,NULL),(48,'',NULL,NULL,'joaoa@gmail.com','e10adc3949ba59abbe56e057f20f883e','assets/img/avatar-5.png','Ativo',NULL,NULL,NULL,NULL,'98f352e6bf83b634bd4fbf688a910fff','Advogado','2024-11-18 10:31:38',NULL,NULL),(49,'',NULL,NULL,'joaoa@gmail.com','e10adc3949ba59abbe56e057f20f883e','assets/img/avatar-5.png','Ativo',NULL,NULL,NULL,NULL,'98f352e6bf83b634bd4fbf688a910fff','Advogado','2024-11-18 10:34:34',NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-01-13 12:24:14
