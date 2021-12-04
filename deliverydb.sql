-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: localhost    Database: deliverydb
-- ------------------------------------------------------
-- Server version	8.0.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+07:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE IF NOT EXISTS `deliverydb` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `deliverydb`;

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `account` (
  `account_id` int NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(25) NOT NULL,
  `password` CHAR(32) NOT NULL,
  `salt` CHAR(8) NOT NULL,
  `role` VARCHAR(8) NOT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account`
--

LOCK TABLES `account` WRITE;
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
/*!40000 ALTER TABLE `account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provider`
--

DROP TABLE IF EXISTS `provider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `provider` (
  `provider_id` int NOT NULL AUTO_INCREMENT,
  `provider_name` VARCHAR(255) NOT NULL,
  `provider_phone` VARCHAR(20) NOT NULL,
  `provider_address` VARCHAR(255) NOT NULL,
  `provider_email` VARCHAR(255) NOT NULL,
  `provider_note` VARCHAR(255) DEFAULT NULL,
  `accountID` int NOT NULL,
  PRIMARY KEY (`provider_id`),
  KEY `FKProvider89120` (`accountID`),
  CONSTRAINT `FKProvider89120` FOREIGN KEY (`accountID`) REFERENCES `account` (`account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provider`
--

LOCK TABLES `provider` WRITE;
/*!40000 ALTER TABLE `provider` DISABLE KEYS */;
/*!40000 ALTER TABLE `provider` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shipper`
--

DROP TABLE IF EXISTS `shipper`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shipper` (
  `shipper_id` int NOT NULL,
  `shipper_name` VARCHAR(255) NOT NULL,
  `birthday` date NOT NULL,
  `shipper_IDCard` CHAR(12) NOT NULL,
  `shipper_phone` VARCHAR(20) NOT NULL,
  `shipper_address` VARCHAR(255) NOT NULL,
  `vehicle` VARCHAR(20) NOT NULL,
  `licensePlate` VARCHAR(255) NOT NULL,
  `shipper_note` VARCHAR(255) DEFAULT NULL,
  `shipper_accountID` int NOT NULL,
  PRIMARY KEY (`shipper_id`),
  KEY `FKShipper303151` (`shipper_accountID`),
  CONSTRAINT `FKShipper303151` FOREIGN KEY (`shipper_accountID`) REFERENCES `account` (`account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipper`
--

LOCK TABLES `shipper` WRITE;
/*!40000 ALTER TABLE `shipper` DISABLE KEYS */;
/*!40000 ALTER TABLE `shipper` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `receiverName` VARCHAR(255) NOT NULL,
  `receiverPhone` VARCHAR(20) NOT NULL,
  `receiverAddress` VARCHAR(255) NOT NULL,
  `receiverTime` VARCHAR(30) DEFAULT NULL,
  `cost` decimal(15,4) NOT NULL,
  `COD` decimal(15,4) DEFAULT NULL,
  `status` VARCHAR(20) NOT NULL,
  `providerID` int NOT NULL,
  `shipperID` int NOT NULL,
  `order_note` VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `FKOrder456195` (`providerID`),
  KEY `FKOrder863096` (`shipperID`),
  CONSTRAINT `FKOrder456195` FOREIGN KEY (`providerID`) REFERENCES `provider` (`provider_id`),
  CONSTRAINT `FKOrder863096` FOREIGN KEY (`shipperID`) REFERENCES `shipper` (`shipper_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `set_product_id` VARCHAR(10) NOT NULL,
  `product_name` VARCHAR(255) NOT NULL,
  `product_price` decimal(15,4) NOT NULL,
  `weight` decimal(15,4) NOT NULL,
  `size` VARCHAR(10) NOT NULL,
  `product_note` VARCHAR(255) DEFAULT NULL,
  `providerID` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKProduct788579` (`providerID`),
  CONSTRAINT `FKProduct788579` FOREIGN KEY (`providerID`) REFERENCES `provider` (`provider_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shipproduct`
--

DROP TABLE IF EXISTS `shipproduct`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shipproduct` (
  `ship_id` int NOT NULL AUTO_INCREMENT,
  `orderid` int NOT NULL,
  `productid` int NOT NULL,
  `amount` int NOT NULL,
  PRIMARY KEY (`ship_id`),
  KEY `FKShipProduc961629` (`productid`),
  KEY `FKShipProduc257765` (`orderid`),
  CONSTRAINT `FKShipProduc257765` FOREIGN KEY (`orderid`) REFERENCES `order` (`order_id`),
  CONSTRAINT `FKShipProduc961629` FOREIGN KEY (`productid`) REFERENCES `product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipproduct`
--

LOCK TABLES `shipproduct` WRITE;
/*!40000 ALTER TABLE `shipproduct` DISABLE KEYS */;
/*!40000 ALTER TABLE `shipproduct` ENABLE KEYS */;
UNLOCK TABLES;

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-03 22:32:38
