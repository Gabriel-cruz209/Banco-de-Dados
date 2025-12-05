-- MySQL dump 10.13  Distrib 8.0.43, for Win64 (x86_64)
--
-- Host: localhost    Database: livraria
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
-- Current Database: `livraria`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `livraria` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `livraria`;

--
-- Table structure for table `autores`
--

DROP TABLE IF EXISTS `autores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `autores` (
  `Data_nascimento` datetime NOT NULL,
  `Nome_autor` varchar(100) NOT NULL,
  `Nacionalidade` varchar(50) NOT NULL,
  `Cod_autor` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Cod_autor`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autores`
--

LOCK TABLES `autores` WRITE;
/*!40000 ALTER TABLE `autores` DISABLE KEYS */;
INSERT INTO `autores` VALUES ('1839-06-21 00:00:00','Machado de Assis','Brasileiro',1),('1947-08-24 00:00:00','Paulo Coelho','Brasileiro',2),('1912-08-10 00:00:00','Jorge Amado','Brasileiro',3),('1903-06-25 00:00:00','George Orwell','Britânico',4),('1900-06-29 00:00:00','Antoine de Saint-Exupéry','Francês',5);
/*!40000 ALTER TABLE `autores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientes` (
  `Telefone` varchar(14) NOT NULL,
  `Nome_cliente` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `CPF` varchar(14) DEFAULT NULL,
  `Cod_cliente` int NOT NULL AUTO_INCREMENT,
  `Data_nascimento` datetime NOT NULL,
  PRIMARY KEY (`Cod_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES ('1199887766','Ana Oliveira','ana@gmail.com','123.456.789-00',1,'1995-04-12 00:00:00'),('2199776655','Bruno Santos','bruno@hotmail.com','987.654.321-11',2,'1988-09-23 00:00:00'),('3199665544','Carla Souza','carla@yahoo.com','456.789.123-22',3,'2000-01-30 00:00:00'),('4199554433','Diego Almeida','diego@gmail.com','789.123.456-33',4,'1992-06-15 00:00:00'),('5199443322','Fernanda Lima','fernanda@hotmail.com','321.654.987-44',5,'1985-12-05 00:00:00'),('1199887766','Ana Oliveira','ana@gmail.com','123.456.789-00',6,'1995-04-12 00:00:00'),('2199776655','Bruno Santos','bruno@hotmail.com','987.654.321-11',7,'1988-09-23 00:00:00'),('3199665544','Carla Souza','carla@yahoo.com','456.789.123-22',8,'2000-01-30 00:00:00'),('4199554433','Diego Almeida','diego@gmail.com','789.123.456-33',9,'1992-06-15 00:00:00'),('5199443322','Fernanda Lima','fernanda@hotmail.com','321.654.987-44',10,'1985-12-05 00:00:00');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `editores`
--

DROP TABLE IF EXISTS `editores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `editores` (
  `Cidade` varchar(100) NOT NULL,
  `Nome_editora` varchar(100) NOT NULL,
  `Telefone` varchar(14) NOT NULL,
  `Endereco` varchar(100) NOT NULL,
  `Contato` varchar(100) NOT NULL,
  `Cod_editora` int NOT NULL AUTO_INCREMENT,
  `cnpj` varchar(100) NOT NULL,
  PRIMARY KEY (`Cod_editora`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `editores`
--

LOCK TABLES `editores` WRITE;
/*!40000 ALTER TABLE `editores` DISABLE KEYS */;
INSERT INTO `editores` VALUES ('São Paulo','Companhia das Letras','1133224455','Rua A, 123','João Silva',1,'12.345.678/0001-90'),('Rio de Janeiro','Rocco','2133112233','Av. Brasil, 456','Maria Souza',2,'98.765.432/0001-11'),('Salvador','Editora Globo','7133991122','Rua das Flores, 89','Carlos Pereira',3,'45.678.912/0001-55'),('Belo Horizonte','Agir','3134005566','Av. Minas, 321','Fernanda Lima',4,'33.444.555/0001-77'),('Porto Alegre','Companhia Editora Nacional','5133667788','Rua Central, 654','Roberto Alves',5,'22.111.333/0001-22');
/*!40000 ALTER TABLE `editores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `livros`
--

DROP TABLE IF EXISTS `livros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `livros` (
  `Quantidade` int NOT NULL,
  `Titulo` varchar(100) NOT NULL,
  `Preco` decimal(5,2) NOT NULL,
  `Autor` varchar(50) NOT NULL,
  `Genero` varchar(100) NOT NULL,
  `Editora` varchar(100) NOT NULL,
  `Cod_livro` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Cod_livro`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `livros`
--

LOCK TABLES `livros` WRITE;
/*!40000 ALTER TABLE `livros` DISABLE KEYS */;
INSERT INTO `livros` VALUES (10,'Dom Casmurro',39.90,'Machado de Assis','Romance','Editora Globo',1),(5,'O Alquimista',29.50,'Paulo Coelho','Ficção','Rocco',2),(20,'Capitães da Areia',42.00,'Jorge Amado','Romance','Companhia das Letras',3),(15,'1984',35.00,'George Orwell','Distopia','Companhia Editora Nacional',4),(8,'O Pequeno Príncipe',25.00,'Antoine de Saint-Exupéry','Infantil','Agir',5);
/*!40000 ALTER TABLE `livros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id_usu` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id_usu`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (3,'bruno','professor@lindo.com'),(4,'Guilherme','gui@teste.com'),(6,'adaff','professor@lindo.com');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendas`
--

DROP TABLE IF EXISTS `vendas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vendas` (
  `Cod_venda` int NOT NULL AUTO_INCREMENT,
  `valor_total` decimal(7,2) NOT NULL,
  `quantidade` int NOT NULL,
  `Data_venda` datetime NOT NULL,
  `Cod_livro` int DEFAULT NULL,
  `Cod_cliente` int DEFAULT NULL,
  PRIMARY KEY (`Cod_venda`),
  KEY `Cod_livro` (`Cod_livro`),
  KEY `Cod_cliente` (`Cod_cliente`),
  CONSTRAINT `vendas_ibfk_1` FOREIGN KEY (`Cod_livro`) REFERENCES `livros` (`Cod_livro`),
  CONSTRAINT `vendas_ibfk_2` FOREIGN KEY (`Cod_cliente`) REFERENCES `clientes` (`Cod_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendas`
--

LOCK TABLES `vendas` WRITE;
/*!40000 ALTER TABLE `vendas` DISABLE KEYS */;
/*!40000 ALTER TABLE `vendas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'livraria'
--

--
-- Dumping routines for database 'livraria'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-12-05 15:58:01
