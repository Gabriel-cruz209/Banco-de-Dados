-- MySQL dump 10.13  Distrib 8.0.43, for Win64 (x86_64)
--
-- Host: localhost    Database: mecanica
-- ------------------------------------------------------
-- Server version	8.0.43

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
-- Current Database: `mecanica`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `mecanica` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `mecanica`;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente` (
  `id_cliente` int NOT NULL AUTO_INCREMENT,
  `nome_cliente` varchar(100) NOT NULL,
  `cpf_cliente` varchar(14) NOT NULL,
  `celular_cliente` varchar(11) NOT NULL,
  `endereco_cliente` varchar(100) NOT NULL,
  `email_cliente` varchar(50) NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'Pedro Calazans','111.111.111-90','19908909090','Rua sebastiao camargo calazans n20','contenporaneo@gmail.com');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mecanico`
--

DROP TABLE IF EXISTS `mecanico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mecanico` (
  `id_mecanico` int NOT NULL AUTO_INCREMENT,
  `nome_mecanico` varchar(100) NOT NULL,
  `cpf_mecanico` varchar(14) NOT NULL,
  `celular_mecanico` varchar(11) NOT NULL,
  `endereco_mecanico` varchar(100) NOT NULL,
  `email_mecanico` varchar(50) NOT NULL,
  `salario_mecanico` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id_mecanico`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mecanico`
--

LOCK TABLES `mecanico` WRITE;
/*!40000 ALTER TABLE `mecanico` DISABLE KEYS */;
INSERT INTO `mecanico` VALUES (1,'Oswaldo','121.211.121-90','19978909780','Rua Cafe com Leite','cafess@gmail.com',10000.00);
/*!40000 ALTER TABLE `mecanico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `os`
--

DROP TABLE IF EXISTS `os`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `os` (
  `id_os` int NOT NULL AUTO_INCREMENT,
  `preco_os` decimal(10,2) NOT NULL,
  `data_inicio_os` date NOT NULL,
  `descricao_os` varchar(100) NOT NULL,
  `data_termino_os` date NOT NULL,
  `id_cliente` int NOT NULL,
  `id_mecanico` int NOT NULL,
  `id_peca` int NOT NULL,
  `id_veiculo` int NOT NULL,
  `id_servico` int NOT NULL,
  PRIMARY KEY (`id_os`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_servico` (`id_servico`),
  KEY `id_veiculo` (`id_veiculo`),
  KEY `id_peca` (`id_peca`),
  KEY `id_mecanico` (`id_mecanico`),
  CONSTRAINT `os_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  CONSTRAINT `os_ibfk_2` FOREIGN KEY (`id_servico`) REFERENCES `servico` (`id_servico`),
  CONSTRAINT `os_ibfk_3` FOREIGN KEY (`id_veiculo`) REFERENCES `veiculo` (`id_veiculo`),
  CONSTRAINT `os_ibfk_4` FOREIGN KEY (`id_peca`) REFERENCES `peca` (`id_peca`),
  CONSTRAINT `os_ibfk_5` FOREIGN KEY (`id_mecanico`) REFERENCES `mecanico` (`id_mecanico`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `os`
--

LOCK TABLES `os` WRITE;
/*!40000 ALTER TABLE `os` DISABLE KEYS */;
INSERT INTO `os` VALUES (1,1500.00,'2025-02-10','Troca de embreagem e revisão completa','2025-02-15',1,1,1,1,1);
/*!40000 ALTER TABLE `os` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `peca`
--

DROP TABLE IF EXISTS `peca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `peca` (
  `id_peca` int NOT NULL AUTO_INCREMENT,
  `nome_peca` varchar(100) NOT NULL,
  `tipo_peca` varchar(100) NOT NULL,
  `preco_peca` decimal(10,2) NOT NULL,
  `descricao_peca` varchar(100) NOT NULL,
  PRIMARY KEY (`id_peca`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `peca`
--

LOCK TABLES `peca` WRITE;
/*!40000 ALTER TABLE `peca` DISABLE KEYS */;
INSERT INTO `peca` VALUES (1,'Embreagem Completa','Transmissão',850.00,'Kit completo de embreagem para veículos populares');
/*!40000 ALTER TABLE `peca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `possuem`
--

DROP TABLE IF EXISTS `possuem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `possuem` (
  `id_possuem` int NOT NULL AUTO_INCREMENT,
  `id_cliente` int DEFAULT NULL,
  `id_veiculo` int DEFAULT NULL,
  PRIMARY KEY (`id_possuem`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_veiculo` (`id_veiculo`),
  CONSTRAINT `possuem_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  CONSTRAINT `possuem_ibfk_2` FOREIGN KEY (`id_veiculo`) REFERENCES `veiculo` (`id_veiculo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `possuem`
--

LOCK TABLES `possuem` WRITE;
/*!40000 ALTER TABLE `possuem` DISABLE KEYS */;
INSERT INTO `possuem` VALUES (1,1,1);
/*!40000 ALTER TABLE `possuem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servico`
--

DROP TABLE IF EXISTS `servico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `servico` (
  `id_servico` int NOT NULL AUTO_INCREMENT,
  `nome_servico` varchar(100) NOT NULL,
  `tipo_servico` varchar(100) NOT NULL,
  `preco_servico` decimal(10,2) NOT NULL,
  `descricao_servico` varchar(100) NOT NULL,
  PRIMARY KEY (`id_servico`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servico`
--

LOCK TABLES `servico` WRITE;
/*!40000 ALTER TABLE `servico` DISABLE KEYS */;
INSERT INTO `servico` VALUES (1,'Revisao','Revisao Completa',2000.00,'Foi realizada uma revisao completa pelo carro');
/*!40000 ALTER TABLE `servico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `veiculo`
--

DROP TABLE IF EXISTS `veiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `veiculo` (
  `id_veiculo` int NOT NULL AUTO_INCREMENT,
  `marca_veiculo` varchar(100) NOT NULL,
  `modelo_veiculo` varchar(100) NOT NULL,
  `ano_veiculo` date NOT NULL,
  `cor_veiculo` varchar(50) NOT NULL,
  `placa_veiculo` varchar(7) NOT NULL,
  PRIMARY KEY (`id_veiculo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `veiculo`
--

LOCK TABLES `veiculo` WRITE;
/*!40000 ALTER TABLE `veiculo` DISABLE KEYS */;
INSERT INTO `veiculo` VALUES (1,'Nissan','Skyline R34','2005-02-15','Azul','ABC1234');
/*!40000 ALTER TABLE `veiculo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'mecanica'
--

--
-- Dumping routines for database 'mecanica'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-12-05 16:42:30
