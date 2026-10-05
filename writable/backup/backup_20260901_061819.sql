-- MySQL dump 10.13  Distrib 5.7.39, for Win64 (x86_64)
--
-- Host: localhost    Database: rangkui
-- ------------------------------------------------------
-- Server version	5.7.39

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
-- Current Database: `rangkui`
--

USE `rangkui`;

--
-- Table structure for table `backup_log`
--

DROP TABLE IF EXISTS `backup_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `backup_log` (
  `backup_log_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `backup_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `backup_file` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`backup_log_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `backup_log`
--

LOCK TABLES `backup_log` WRITE;
/*!40000 ALTER TABLE `backup_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `backup_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `biblio`
--

DROP TABLE IF EXISTS `biblio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `biblio` (
  `biblio_id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` int(11) NOT NULL,
  `gmd_id` int(11) DEFAULT NULL,
  `item_type_id` int(11) DEFAULT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `sor` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `edition` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `student_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cp_email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `departement` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code_ministry` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isbn_issn` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publisher_id` int(11) DEFAULT NULL,
  `publish_year` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `collation` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `series_title` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `call_number` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `language_id` char(5) COLLATE utf8_unicode_ci DEFAULT 'en',
  `copyright_id` int(11) DEFAULT NULL,
  `license_id` int(11) NOT NULL,
  `source` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publish_place_id` int(11) DEFAULT NULL,
  `classification` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8_unicode_ci,
  `image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_att` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url_crossref` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `opac_hide` smallint(6) DEFAULT '0',
  `promoted` smallint(6) DEFAULT '0',
  `labels` text COLLATE utf8_unicode_ci,
  `frequency_id` int(11) NOT NULL DEFAULT '0',
  `spec_detail_info` text COLLATE utf8_unicode_ci,
  `input_date` datetime DEFAULT NULL,
  `last_update` datetime DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `step` smallint(6) NOT NULL DEFAULT '1',
  PRIMARY KEY (`biblio_id`) USING BTREE,
  KEY `references_idx` (`gmd_id`,`publisher_id`,`language_id`,`publish_place_id`) USING BTREE,
  KEY `classification` (`classification`) USING BTREE,
  KEY `biblio_flag_idx` (`opac_hide`,`promoted`) USING BTREE,
  KEY `uid` (`uid`) USING BTREE,
  FULLTEXT KEY `title_ft_idx` (`title`,`series_title`),
  FULLTEXT KEY `notes_ft_idx` (`notes`),
  FULLTEXT KEY `labels` (`labels`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `biblio`
--

LOCK TABLES `biblio` WRITE;
/*!40000 ALTER TABLE `biblio` DISABLE KEYS */;
INSERT INTO `biblio` VALUES (1,0,47,5,'EFEK PEMBERIAN EKSTRAK DAUN MIANA (Coleus scutellariodes (L) Benth)TERHADAP PERTUMBUHAN KLEBSIELA PNEUMONIA DAN HUBUNGANNYA DENGAN EKSPRESI mRNA GEN HIGH MOBILITY GROUP BOX 1 (HMGB1) DAN SOLUBEL PROTEIN HMGB1 PADA MENCIT Balb/c',NULL,'Published','C013172018','-','Universitas Hasanudin',NULL,NULL,1,'2023','-',NULL,'310','id',2,1,NULL,1,'310','  Risky Putra','cover_Yolis-20260831173415-0.png',NULL,'',0,0,NULL,0,'Disertasi','2026-08-31 18:03:53','2026-08-31 18:03:53',1,1);
/*!40000 ALTER TABLE `biblio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `biblio_attachment`
--

DROP TABLE IF EXISTS `biblio_attachment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `biblio_attachment` (
  `biblio_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `access_type` enum('public','private') COLLATE utf8_unicode_ci NOT NULL,
  `access_limit` text COLLATE utf8_unicode_ci,
  KEY `biblio_id` (`biblio_id`) USING BTREE,
  KEY `file_id` (`file_id`) USING BTREE,
  KEY `biblio_id_2` (`biblio_id`,`file_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `biblio_attachment`
--

LOCK TABLES `biblio_attachment` WRITE;
/*!40000 ALTER TABLE `biblio_attachment` DISABLE KEYS */;
INSERT INTO `biblio_attachment` VALUES (1,1,'public','1');
/*!40000 ALTER TABLE `biblio_attachment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `biblio_author`
--

DROP TABLE IF EXISTS `biblio_author`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `biblio_author` (
  `biblio_id` int(11) NOT NULL DEFAULT '0',
  `author_id` int(11) NOT NULL DEFAULT '0',
  `level` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`biblio_id`,`author_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=FIXED;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `biblio_author`
--

LOCK TABLES `biblio_author` WRITE;
/*!40000 ALTER TABLE `biblio_author` DISABLE KEYS */;
INSERT INTO `biblio_author` VALUES (1,2,1);
/*!40000 ALTER TABLE `biblio_author` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `biblio_contributor`
--

DROP TABLE IF EXISTS `biblio_contributor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `biblio_contributor` (
  `biblio_id` int(11) NOT NULL,
  `contributor_id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`biblio_id`,`contributor_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `biblio_contributor`
--

LOCK TABLES `biblio_contributor` WRITE;
/*!40000 ALTER TABLE `biblio_contributor` DISABLE KEYS */;
INSERT INTO `biblio_contributor` VALUES (1,1,1);
/*!40000 ALTER TABLE `biblio_contributor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `biblio_count`
--

DROP TABLE IF EXISTS `biblio_count`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `biblio_count` (
  `biblio_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  KEY `biblio_id` (`biblio_id`) USING BTREE,
  KEY `biblio_id_2` (`biblio_id`,`file_id`) USING BTREE,
  KEY `file_id` (`file_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `biblio_count`
--

LOCK TABLES `biblio_count` WRITE;
/*!40000 ALTER TABLE `biblio_count` DISABLE KEYS */;
/*!40000 ALTER TABLE `biblio_count` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `biblio_custom`
--

DROP TABLE IF EXISTS `biblio_custom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `biblio_custom` (
  `biblio_id` int(11) NOT NULL,
  PRIMARY KEY (`biblio_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED COMMENT='one to one relation with real biblio table';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `biblio_custom`
--

LOCK TABLES `biblio_custom` WRITE;
/*!40000 ALTER TABLE `biblio_custom` DISABLE KEYS */;
/*!40000 ALTER TABLE `biblio_custom` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `biblio_examiner`
--

DROP TABLE IF EXISTS `biblio_examiner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `biblio_examiner` (
  `biblio_id` int(11) NOT NULL DEFAULT '0',
  `examiner_id` int(11) NOT NULL DEFAULT '0',
  `level` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`biblio_id`,`examiner_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `biblio_examiner`
--

LOCK TABLES `biblio_examiner` WRITE;
/*!40000 ALTER TABLE `biblio_examiner` DISABLE KEYS */;
INSERT INTO `biblio_examiner` VALUES (1,1,1);
/*!40000 ALTER TABLE `biblio_examiner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `biblio_supervisor`
--

DROP TABLE IF EXISTS `biblio_supervisor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `biblio_supervisor` (
  `biblio_id` int(11) NOT NULL DEFAULT '0',
  `supervisor_id` int(11) NOT NULL DEFAULT '0',
  `level` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`biblio_id`,`supervisor_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `biblio_supervisor`
--

LOCK TABLES `biblio_supervisor` WRITE;
/*!40000 ALTER TABLE `biblio_supervisor` DISABLE KEYS */;
INSERT INTO `biblio_supervisor` VALUES (1,1,1);
/*!40000 ALTER TABLE `biblio_supervisor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `biblio_topic`
--

DROP TABLE IF EXISTS `biblio_topic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `biblio_topic` (
  `biblio_id` int(11) NOT NULL DEFAULT '0',
  `topic_id` int(11) NOT NULL DEFAULT '0',
  `level` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`biblio_id`,`topic_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=FIXED;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `biblio_topic`
--

LOCK TABLES `biblio_topic` WRITE;
/*!40000 ALTER TABLE `biblio_topic` DISABLE KEYS */;
/*!40000 ALTER TABLE `biblio_topic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `biblio_id` int(11) NOT NULL,
  `member_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `input_date` datetime DEFAULT NULL,
  `last_update` datetime DEFAULT NULL,
  PRIMARY KEY (`comment_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `content`
--

DROP TABLE IF EXISTS `content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `content` (
  `content_id` int(11) NOT NULL AUTO_INCREMENT,
  `content_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `content_path` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `input_date` datetime NOT NULL,
  `last_update` datetime NOT NULL,
  `content_ownpage` enum('1','2') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`content_id`) USING BTREE,
  UNIQUE KEY `content_path` (`content_path`) USING BTREE,
  FULLTEXT KEY `content_title` (`content_title`),
  FULLTEXT KEY `content_desc` (`content_desc`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `content`
--

LOCK TABLES `content` WRITE;
/*!40000 ALTER TABLE `content` DISABLE KEYS */;
/*!40000 ALTER TABLE `content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `files` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_title` text COLLATE utf8_unicode_ci NOT NULL,
  `file_name` text COLLATE utf8_unicode_ci NOT NULL,
  `file_url` text COLLATE utf8_unicode_ci,
  `file_dir` text COLLATE utf8_unicode_ci,
  `mime_type` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_desc` text COLLATE utf8_unicode_ci,
  `uploader_id` int(11) NOT NULL,
  `input_date` datetime NOT NULL,
  `last_update` datetime NOT NULL,
  PRIMARY KEY (`file_id`) USING BTREE,
  FULLTEXT KEY `file_name` (`file_name`),
  FULLTEXT KEY `file_dir` (`file_dir`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `files`
--

LOCK TABLES `files` WRITE;
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
INSERT INTO `files` VALUES (1,'Disertasi','B_11_attahcment-20260831173510-0.pdf','-','./uploads/repository',NULL,'-',1,'2026-08-31 17:35:10','2026-08-31 18:03:53');
/*!40000 ALTER TABLE `files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fines`
--

DROP TABLE IF EXISTS `fines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fines` (
  `fines_id` int(11) NOT NULL AUTO_INCREMENT,
  `fines_date` date NOT NULL,
  `member_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `debet` int(11) DEFAULT '0',
  `credit` int(11) DEFAULT '0',
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`fines_id`) USING BTREE,
  KEY `member_id` (`member_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fines`
--

LOCK TABLES `fines` WRITE;
/*!40000 ALTER TABLE `fines` DISABLE KEYS */;
/*!40000 ALTER TABLE `fines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `group_access`
--

DROP TABLE IF EXISTS `group_access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `group_access` (
  `group_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `r` int(11) NOT NULL DEFAULT '0',
  `w` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`group_id`,`module_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=FIXED;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group_access`
--

LOCK TABLES `group_access` WRITE;
/*!40000 ALTER TABLE `group_access` DISABLE KEYS */;
INSERT INTO `group_access` VALUES (1,5,1,1),(1,2,1,1),(1,1,1,1),(1,18,1,1),(1,48,1,1),(1,36,1,1),(1,9,1,1),(1,4,1,1),(2,5,1,1),(2,48,1,1),(2,4,1,1),(2,9,1,1),(2,36,1,1),(3,5,1,1),(3,4,1,1),(4,5,1,1),(6,4,1,1),(6,36,0,1),(6,9,1,0),(6,18,1,0),(6,48,1,0),(6,62,1,0),(6,5,1,1),(7,18,1,1),(7,48,0,1),(7,9,1,1),(7,62,0,1),(1,3,1,1),(1,8,1,1),(1,12,1,1),(1,29,1,1),(1,41,1,1),(1,53,1,1),(1,6,1,1),(1,7,1,1),(1,10,1,1),(1,11,1,1),(1,13,1,1),(1,20,1,1),(1,26,1,1),(1,27,1,1),(1,28,1,1),(1,14,1,1),(1,15,1,1),(1,16,1,1),(1,17,1,1),(1,19,1,1),(1,21,1,1),(1,22,1,1),(1,23,1,1),(1,24,1,1),(1,25,1,1),(1,30,1,1),(1,31,1,1),(1,32,1,1),(1,33,1,1),(1,34,1,1),(1,35,1,1),(1,37,1,1),(1,38,1,1),(1,39,1,1),(1,40,1,1),(1,42,1,1),(1,45,1,1),(1,43,1,1),(1,44,1,1),(1,54,1,1),(1,46,1,1),(1,47,1,1),(1,49,1,1),(1,50,1,1),(1,51,1,1),(1,52,1,1);
/*!40000 ALTER TABLE `group_access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `holiday`
--

DROP TABLE IF EXISTS `holiday`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `holiday` (
  `holiday_id` int(11) NOT NULL AUTO_INCREMENT,
  `holiday_dayname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `holiday_date` date DEFAULT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`holiday_id`) USING BTREE,
  UNIQUE KEY `holiday_dayname` (`holiday_dayname`,`holiday_date`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `holiday`
--

LOCK TABLES `holiday` WRITE;
/*!40000 ALTER TABLE `holiday` DISABLE KEYS */;
/*!40000 ALTER TABLE `holiday` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `biblio_id` int(11) DEFAULT NULL,
  `call_number` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `coll_type_id` int(11) DEFAULT NULL,
  `item_code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `inventory_code` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `received_date` date DEFAULT NULL,
  `supplier_id` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_no` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location_id` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `item_status_id` char(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `site` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `source` int(11) NOT NULL DEFAULT '0',
  `invoice` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `price_currency` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `invoice_date` date DEFAULT NULL,
  `input_date` datetime NOT NULL,
  `last_update` datetime DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_id`) USING BTREE,
  UNIQUE KEY `item_code` (`item_code`) USING BTREE,
  KEY `item_references_idx` (`coll_type_id`,`location_id`,`item_status_id`) USING BTREE,
  KEY `uid` (`uid`) USING BTREE,
  KEY `biblio_id_idx` (`biblio_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kardex`
--

DROP TABLE IF EXISTS `kardex`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kardex` (
  `kardex_id` int(11) NOT NULL AUTO_INCREMENT,
  `date_expected` date NOT NULL,
  `date_received` date DEFAULT NULL,
  `seq_number` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8_unicode_ci,
  `serial_id` int(11) DEFAULT NULL,
  `input_date` date NOT NULL,
  `last_update` date NOT NULL,
  PRIMARY KEY (`kardex_id`) USING BTREE,
  KEY `fk_serial` (`serial_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kardex`
--

LOCK TABLES `kardex` WRITE;
/*!40000 ALTER TABLE `kardex` DISABLE KEYS */;
/*!40000 ALTER TABLE `kardex` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loan`
--

DROP TABLE IF EXISTS `loan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `loan` (
  `loan_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loan_date` date NOT NULL,
  `due_date` date NOT NULL,
  `renewed` int(11) NOT NULL DEFAULT '0',
  `loan_rules_id` int(11) NOT NULL DEFAULT '0',
  `actual` date DEFAULT NULL,
  `is_lent` int(11) NOT NULL DEFAULT '0',
  `is_return` int(11) NOT NULL DEFAULT '0',
  `return_date` date DEFAULT NULL,
  PRIMARY KEY (`loan_id`) USING BTREE,
  KEY `item_code` (`item_code`) USING BTREE,
  KEY `member_id` (`member_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loan`
--

LOCK TABLES `loan` WRITE;
/*!40000 ALTER TABLE `loan` DISABLE KEYS */;
/*!40000 ALTER TABLE `loan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `long_pattern`
--

DROP TABLE IF EXISTS `long_pattern`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `long_pattern` (
  `pattern_id` int(11) NOT NULL AUTO_INCREMENT,
  `pattern_prefix` varchar(5) DEFAULT NULL,
  `pattern_zero` int(11) DEFAULT NULL,
  `pattern_suffix` varchar(5) DEFAULT NULL,
  `input_date` date DEFAULT NULL,
  `last_update` datetime DEFAULT NULL,
  PRIMARY KEY (`pattern_id`) USING BTREE,
  UNIQUE KEY `pattern_prefix` (`pattern_prefix`,`pattern_suffix`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `long_pattern`
--

LOCK TABLES `long_pattern` WRITE;
/*!40000 ALTER TABLE `long_pattern` DISABLE KEYS */;
/*!40000 ALTER TABLE `long_pattern` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member` (
  `member_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `member_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` int(11) NOT NULL,
  `birth_date` date DEFAULT NULL,
  `member_type_id` int(11) DEFAULT NULL,
  `member_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_mail_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `inst_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_new` int(11) DEFAULT NULL,
  `member_image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pin` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_phone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_fax` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_since_date` date DEFAULT NULL,
  `register_date` date DEFAULT NULL,
  `expire_date` date NOT NULL,
  `member_notes` text COLLATE utf8_unicode_ci,
  `is_pending` smallint(6) NOT NULL DEFAULT '0',
  `mpasswd` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_login_ip` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `input_date` date DEFAULT NULL,
  `last_update` date DEFAULT NULL,
  PRIMARY KEY (`member_id`) USING BTREE,
  KEY `member_name` (`member_name`) USING BTREE,
  KEY `member_type_id` (`member_type_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member`
--

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` VALUES ('20202','Cupak',1,'1998-08-31',3,'Jepang','cupank23@gmail.com','cupank23@gmail.com','86111','UniMof',NULL,'member_var-20260831171520.jpg','1234567','082147201903','123456','2026-08-31','2026-08-31','2030-08-31','Cupank',0,'$2y$12$NQJsy4teag0xc8HIUZ1vh.trWBPQPMUloCT6OXHf//WzeEwNP3pd6',NULL,NULL,'2026-08-31','2026-08-31'),('6844-4368-0770-9442','admin',1,'2026-08-31',1,'ggg','ggg','falenhurin32@gmail.com','86111','UniMof',NULL,NULL,'321','082147201903','123456','2026-08-31','2026-08-31','2026-08-31','ggg',0,'$2y$12$sI9wQKBTYsySlHvtdm5Lm.O0bBN/GTTYrpXs1PoWHLo36ncGbYcca',NULL,NULL,'2026-08-31','2026-08-31'),('20201','yolis',1,'2016-08-20',1,'lepolima','falentinus@gmail.com','falenhurin32@gmail.com','86111','UniMof',NULL,'member_var-20260831162126.jpg','1234567','082147201903','123456','2026-08-31','2026-08-31','2030-08-31','ready',0,'$2y$12$GTLnwe9/7pRttIqjzBen.Ok0bY/3oTIlH1sgrBUenPPjTXnB7T.g2',NULL,NULL,'2026-08-31','2026-08-31'),('TEST002','Test Member Dua',1,'1990-01-01',1,'Alamat Test','Mail Alamat Test','test2@example.com','12345','Test Inst',NULL,NULL,'12345','08123456789','021-123456','2026-08-31','2026-08-31','2027-08-31','Catatan test',0,'$2y$12$abcdefghijklmnopqrstuvwxyz0123456789ABCDE',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member_custom`
--

DROP TABLE IF EXISTS `member_custom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member_custom` (
  `member_id` varchar(20) NOT NULL,
  PRIMARY KEY (`member_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC COMMENT='one to one relation with real member table';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member_custom`
--

LOCK TABLES `member_custom` WRITE;
/*!40000 ALTER TABLE `member_custom` DISABLE KEYS */;
/*!40000 ALTER TABLE `member_custom` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member_type`
--

DROP TABLE IF EXISTS `member_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member_type` (
  `member_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_type_name` varchar(100) NOT NULL,
  `loan_periode` smallint(6) DEFAULT '7',
  `enable_reserve` tinyint(1) DEFAULT '1',
  `reserve_limit` smallint(6) DEFAULT '3',
  `fine_each_day` decimal(10,2) DEFAULT '0.00',
  `grace_periode` smallint(6) DEFAULT '0',
  `reborrow_limit` smallint(6) DEFAULT '0',
  PRIMARY KEY (`member_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member_type`
--

LOCK TABLES `member_type` WRITE;
/*!40000 ALTER TABLE `member_type` DISABLE KEYS */;
INSERT INTO `member_type` VALUES (1,'Standard',7,1,3,0.00,0,0);
/*!40000 ALTER TABLE `member_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mst_author`
--

DROP TABLE IF EXISTS `mst_author`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mst_author` (
  `author_id` int(11) NOT NULL AUTO_INCREMENT,
  `author_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `author_year` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `authority_type` enum('p','o','c') COLLATE utf8_unicode_ci DEFAULT 'p',
  `auth_list` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `orcid_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `input_date` date NOT NULL,
  `last_update` date DEFAULT NULL,
  PRIMARY KEY (`author_id`) USING BTREE,
  UNIQUE KEY `author_name` (`author_name`,`authority_type`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_author`
--

LOCK TABLES `mst_author` WRITE;
/*!40000 ALTER TABLE `mst_author` DISABLE KEYS */;
INSERT INTO `mst_author` VALUES (1,'Dian Ayu Cahyanngrum',NULL,'p',NULL,NULL,'2026-08-31',NULL),(2,'RISKY AKAPUTRA',NULL,'p',NULL,NULL,'2026-08-31',NULL),(3,'Yolis Libman','1990','p','Pengarang',NULL,'2026-08-31','2026-08-31');
/*!40000 ALTER TABLE `mst_author` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mst_code_ministry`
--

DROP TABLE IF EXISTS `mst_code_ministry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mst_code_ministry` (
  `code_ministry` varchar(20) NOT NULL,
  `name_prodi` varchar(100) NOT NULL,
  `degree` varchar(20) NOT NULL,
  `university` varchar(100) NOT NULL,
  `input_date` date NOT NULL,
  `last_update` date NOT NULL,
  PRIMARY KEY (`code_ministry`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_code_ministry`
--

LOCK TABLES `mst_code_ministry` WRITE;
/*!40000 ALTER TABLE `mst_code_ministry` DISABLE KEYS */;
/*!40000 ALTER TABLE `mst_code_ministry` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mst_coll_type`
--

DROP TABLE IF EXISTS `mst_coll_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mst_coll_type` (
  `coll_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `coll_type_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `input_date` date DEFAULT NULL,
  `last_update` date DEFAULT NULL,
  PRIMARY KEY (`coll_type_id`) USING BTREE,
  UNIQUE KEY `coll_type_name` (`coll_type_name`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_coll_type`
--

LOCK TABLES `mst_coll_type` WRITE;
/*!40000 ALTER TABLE `mst_coll_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `mst_coll_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mst_contributor`
--

DROP TABLE IF EXISTS `mst_contributor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mst_contributor` (
  `contributor_id` int(11) NOT NULL AUTO_INCREMENT,
  `contributor_name` varchar(100) NOT NULL,
  `contributor_type` enum('p','o','c') NOT NULL,
  `input_date` date NOT NULL,
  `last_update` date NOT NULL,
  PRIMARY KEY (`contributor_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_contributor`
--

LOCK TABLES `mst_contributor` WRITE;
/*!40000 ALTER TABLE `mst_contributor` DISABLE KEYS */;
INSERT INTO `mst_contributor` VALUES (1,'Muh Nasrum Massi','p','2026-08-31','0000-00-00');
/*!40000 ALTER TABLE `mst_contributor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mst_copyright`
--

DROP TABLE IF EXISTS `mst_copyright`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mst_copyright` (
  `copyright_id` int(11) NOT NULL AUTO_INCREMENT,
  `copyright_name` varchar(100) NOT NULL,
  `input_date` date NOT NULL,
  `last_update` date NOT NULL,
  PRIMARY KEY (`copyright_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_copyright`
--

LOCK TABLES `mst_copyright` WRITE;
/*!40000 ALTER TABLE `mst_copyright` DISABLE KEYS */;
INSERT INTO `mst_copyright` VALUES (1,'Lembaga Penerbit','2019-03-14','2019-03-14'),(2,'Individu Penulis','2020-05-18','2020-05-18'),(3,'Sekolah Tinggi Ilmu Kesehatan Holistik','2020-07-26','2020-07-26'),(4,'Institut Teknologi Nasional Bandung','2020-07-29','2020-07-29');
/*!40000 ALTER TABLE `mst_copyright` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mst_examiner`
--

DROP TABLE IF EXISTS `mst_examiner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mst_examiner` (
  `examiner_id` int(11) NOT NULL AUTO_INCREMENT,
  `examiner_name` varchar(100) NOT NULL,
  `examiner_number` varchar(100) NOT NULL,
  `examiner_type` enum('p','o','c') NOT NULL,
  `input_date` date NOT NULL,
  `last_update` date NOT NULL,
  PRIMARY KEY (`examiner_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_examiner`
--

LOCK TABLES `mst_examiner` WRITE;
/*!40000 ALTER TABLE `mst_examiner` DISABLE KEYS */;
INSERT INTO `mst_examiner` VALUES (1,'Muhammad Fachri','','p','2026-08-31','0000-00-00'),(2,'Yolis Libman','2','p','2026-08-31','2026-08-31');
/*!40000 ALTER TABLE `mst_examiner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mst_frequency`
--

DROP TABLE IF EXISTS `mst_frequency`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mst_frequency` (
  `frequency_id` int(11) NOT NULL AUTO_INCREMENT,
  `frequency` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `language_prefix` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time_increment` smallint(6) DEFAULT NULL,
  `time_unit` enum('day','week','month','year') COLLATE utf8_unicode_ci DEFAULT 'day',
  `input_date` date NOT NULL,
  `last_update` date NOT NULL,
  PRIMARY KEY (`frequency_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_frequency`
--

LOCK TABLES `mst_frequency` WRITE;
/*!40000 ALTER TABLE `mst_frequency` DISABLE KEYS */;
/*!40000 ALTER TABLE `mst_frequency` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mst_gmd`
--

DROP TABLE IF EXISTS `mst_gmd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mst_gmd` (
  `gmd_id` int(11) NOT NULL AUTO_INCREMENT,
  `gmd_code` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gmd_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `icon_image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `input_date` date NOT NULL,
  `last_update` date DEFAULT NULL,
  PRIMARY KEY (`gmd_id`) USING BTREE,
  UNIQUE KEY `gmd_name` (`gmd_name`) USING BTREE,
  UNIQUE KEY `gmd_code` (`gmd_code`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_gmd`
--

LOCK TABLES `mst_gmd` WRITE;
/*!40000 ALTER TABLE `mst_gmd` DISABLE KEYS */;
INSERT INTO `mst_gmd` VALUES (1,'TE','Text',NULL,'2017-08-16','2017-08-16'),(2,'AR','Art Original',NULL,'2017-08-16','2018-03-20'),(3,'CH','Chart',NULL,'2017-08-16','2017-08-16'),(4,'CO','Computer Software',NULL,'2017-08-16','2017-08-16'),(5,'DI','Diorama',NULL,'2017-08-16','2017-08-16'),(6,'FI','Filmstrip',NULL,'2017-08-16','2017-08-16'),(7,'FL','Flash Card',NULL,'2017-08-16','2017-08-16'),(8,'GA','Game',NULL,'2017-08-16','2017-08-16'),(9,'GL','Globe',NULL,'2017-08-16','2017-08-16'),(10,'KI','Kit',NULL,'2017-08-16','2017-08-16'),(11,'MA','Map',NULL,'2017-08-16','2017-08-16'),(12,'MI','Microform',NULL,'2017-08-16','2017-08-16'),(13,'MN','Manuscript',NULL,'2017-08-16','2017-08-16'),(14,'MO','Model',NULL,'2017-08-16','2017-08-16'),(15,'MP','Motion Picture',NULL,'2017-08-16','2017-08-16'),(16,'MS','Microscope Slide',NULL,'2017-08-16','2017-08-16'),(17,'MU','Music',NULL,'2017-08-16','2017-08-16'),(18,'PI','Picture',NULL,'2017-08-16','2017-08-16'),(19,'RE','Realia',NULL,'2017-08-16','2017-08-16'),(20,'SL','Slide',NULL,'2017-08-16','2017-08-16'),(21,'SO','Sound Recording',NULL,'2017-08-16','2017-08-16'),(22,'TD','Technical Drawing',NULL,'2017-08-16','2017-08-16'),(23,'TR','Transparency',NULL,'2017-08-16','2017-08-16'),(24,'VI','Video Recording',NULL,'2017-08-16','2017-08-16'),(25,'EQ','Equipment',NULL,'2017-08-16','2017-08-16'),(26,'CF','Computer File',NULL,'2017-08-16','2017-08-16'),(27,'CA','Cartographic Material',NULL,'2017-08-16','2017-08-16'),(28,'CD','CD-ROM',NULL,'2017-08-16','2017-08-16'),(29,'MV','Multimedia',NULL,'2017-08-16','2017-08-16'),(30,'ER','Electronic Resource',NULL,'2017-08-16','2017-08-16'),(31,'DVD','Digital Versatile Disc',NULL,'2017-08-16','2017-08-16'),(46,NULL,'Mainan',NULL,'2018-03-23','2018-03-23'),(43,'SK','Skripsi',NULL,'2020-07-26','2020-07-26'),(47,NULL,'Disertasi',NULL,'2026-08-31','2026-08-31'),(48,NULL,'Tesis',NULL,'2026-08-31','2026-08-31'),(49,'MK','Makalah',NULL,'2026-08-31','2026-08-31');
/*!40000 ALTER TABLE `mst_gmd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mst_icon`
--

DROP TABLE IF EXISTS `mst_icon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mst_icon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(50) NOT NULL,
  `icon_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=620 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_icon`
--

LOCK TABLES `mst_icon` WRITE;
/*!40000 ALTER TABLE `mst_icon` DISABLE KEYS */;
INSERT INTO `mst_icon` VALUES (1,'fa-adjust','fa fa-adjust'),(2,'fa-anchor','fa fa-anchor'),(3,'fa-archive','fa fa-archive'),(4,'fa-area-chart','fa fa-area-chart'),(5,'fa-arrows','fa fa-arrows'),(6,'fa-arrows-h','fa fa-arrows-h'),(7,'fa-arrows-v','fa fa-arrows-v'),(8,'fa-asterisk','fa fa-asterisk'),(9,'fa-at','fa fa-at'),(10,'fa-automobile','fa fa-automobile'),(11,'fa-ban','fa fa-ban'),(12,'fa-bank','fa fa-bank'),(13,'fa-bar-chart','fa fa-bar-chart'),(14,'fa-bar-chart-o','fa fa-bar-chart-o'),(15,'fa-barcode','fa fa-barcode'),(16,'fa-bars','fa fa-bars'),(17,'fa-beer','fa fa-beer'),(18,'fa-bell','fa fa-bell'),(19,'fa-bell-o','fa fa-bell-o'),(20,'fa-bell-slash','fa fa-bell-slash'),(21,'fa-bell-slash-o','fa fa-bell-slash-o'),(22,'fa-bicycle','fa fa-bicycle'),(23,'fa-binoculars','fa fa-binoculars'),(24,'fa-birthday-cake','fa fa-birthday-cake'),(25,'fa-bolt','fa fa-bolt'),(26,'fa-bomb','fa fa-bomb'),(27,'fa-book','fa fa-book'),(28,'fa-bookmark','fa fa-bookmark'),(29,'fa-bookmark-o','fa fa-bookmark-o'),(30,'fa-briefcase','fa fa-briefcase'),(31,'fa-bug','fa fa-bug'),(32,'fa-building','fa fa-building'),(33,'fa-building-o','fa fa-building-o'),(34,'fa-bullhorn','fa fa-bullhorn'),(35,'fa-bullseye','fa fa-bullseye'),(36,'fa-bus','fa fa-bus'),(37,'fa-cab','fa fa-cab'),(38,'fa-calculator','fa fa-calculator'),(39,'fa-calendar','fa fa-calendar'),(40,'fa-calendar-o','fa fa-calendar-o'),(41,'fa-camera','fa fa-camera'),(42,'fa-camera-retro','fa fa-camera-retro'),(43,'fa-car','fa fa-car'),(44,'fa-caret-square-o-down','fa fa-caret-square-o-down'),(45,'fa-caret-square-o-left','fa fa-caret-square-o-left'),(46,'fa-caret-square-o-right','fa fa-caret-square-o-right'),(47,'fa-caret-square-o-up','fa fa-caret-square-o-up'),(48,'fa-cc','fa fa-cc'),(49,'fa-certificate','fa fa-certificate'),(50,'fa-check','fa fa-check'),(51,'fa-check-circle','fa fa-check-circle'),(52,'fa-check-circle-o','fa fa-check-circle-o'),(53,'fa-check-square','fa fa-check-square'),(54,'fa-check-square-o','fa fa-check-square-o'),(55,'fa-child','fa fa-child'),(56,'fa-circle','fa fa-circle'),(57,'fa-circle-o','fa fa-circle-o'),(58,'fa-circle-o-notch','fa fa-circle-o-notch'),(59,'fa-circle-thin','fa fa-circle-thin'),(60,'fa-clock-o','fa fa-clock-o'),(61,'fa-close','fa fa-close'),(62,'fa-cloud','fa fa-cloud'),(63,'fa-cloud-download','fa fa-cloud-download'),(64,'fa-cloud-upload','fa fa-cloud-upload'),(65,'fa-code','fa fa-code'),(66,'fa-code-fork','fa fa-code-fork'),(67,'fa-coffee','fa fa-coffee'),(68,'fa-cog','fa fa-cog'),(69,'fa-cogs','fa fa-cogs'),(70,'fa-comment','fa fa-comment'),(71,'fa-comment-o','fa fa-comment-o'),(72,'fa-comments','fa fa-comments'),(73,'fa-comments-o','fa fa-comments-o'),(74,'fa-compass','fa fa-compass'),(75,'fa-copyright','fa fa-copyright'),(76,'fa-credit-card','fa fa-credit-card'),(77,'fa-crop','fa fa-crop'),(78,'fa-crosshairs','fa fa-crosshairs'),(79,'fa-cube','fa fa-cube'),(80,'fa-cubes','fa fa-cubes'),(81,'fa-cutlery','fa fa-cutlery'),(82,'fa-dashboard','fa fa-dashboard'),(83,'fa-database','fa fa-database'),(84,'fa-desktop','fa fa-desktop'),(85,'fa-dot-circle-o','fa fa-dot-circle-o'),(86,'fa-download','fa fa-download'),(87,'fa-edit','fa fa-edit'),(88,'fa-ellipsis-h','fa fa-ellipsis-h'),(89,'fa-ellipsis-v','fa fa-ellipsis-v'),(90,'fa-envelope','fa fa-envelope'),(91,'fa-envelope-o','fa fa-envelope-o'),(92,'fa-envelope-square','fa fa-envelope-square'),(93,'fa-eraser','fa fa-eraser'),(94,'fa-exchange','fa fa-exchange'),(95,'fa-exclamation','fa fa-exclamation'),(96,'fa-exclamation-circle','fa fa-exclamation-circle'),(97,'fa-exclamation-triangle','fa fa-exclamation-triangle'),(98,'fa-external-link','fa fa-external-link'),(99,'fa-external-link-square','fa fa-external-link-square'),(100,'fa-eye','fa fa-eye'),(101,'fa-eye-slash','fa fa-eye-slash'),(102,'fa-eyedropper','fa fa-eyedropper'),(103,'fa-fax','fa fa-fax'),(104,'fa-female','fa fa-female'),(105,'fa-fighter-jet','fa fa-fighter-jet'),(106,'fa-file-archive-o','fa fa-file-archive-o'),(107,'fa-file-audio-o','fa fa-file-audio-o'),(108,'fa-file-code-o','fa fa-file-code-o'),(109,'fa-file-excel-o','fa fa-file-excel-o'),(110,'fa-file-image-o','fa fa-file-image-o'),(111,'fa-file-movie-o','fa fa-file-movie-o'),(112,'fa-file-pdf-o','fa fa-file-pdf-o'),(113,'fa-file-photo-o','fa fa-file-photo-o'),(114,'fa-file-picture-o','fa fa-file-picture-o'),(115,'fa-file-powerpoint-o','fa fa-file-powerpoint-o'),(116,'fa-file-sound-o','fa fa-file-sound-o'),(117,'fa-file-video-o','fa fa-file-video-o'),(118,'fa-file-word-o','fa fa-file-word-o'),(119,'fa-file-zip-o','fa fa-file-zip-o'),(120,'fa-film','fa fa-film'),(121,'fa-filter','fa fa-filter'),(122,'fa-fire','fa fa-fire'),(123,'fa-fire-extinguisher','fa fa-fire-extinguisher'),(124,'fa-flag','fa fa-flag'),(125,'fa-flag-checkered','fa fa-flag-checkered'),(126,'fa-flag-o','fa fa-flag-o'),(127,'fa-flash','fa fa-flash'),(128,'fa-flask','fa fa-flask'),(129,'fa-folder','fa fa-folder'),(130,'fa-folder-o','fa fa-folder-o'),(131,'fa-folder-open','fa fa-folder-open'),(132,'fa-folder-open-o','fa fa-folder-open-o'),(133,'fa fa-frown-o','fa-frown-o'),(134,'fa fa-futbol-o','fa-futbol-o'),(135,'fa fa-gamepad','fa-gamepad'),(136,'fa fa-gavel','fa-gavel'),(137,'fa fa-gear','fa-gear'),(138,'fa fa-gears','fa-gears'),(139,'fa fa-gift','fa-gift'),(140,'fa fa-glass','fa-glass'),(141,'fa fa-globe','fa-globe'),(142,'fa fa-graduation-cap','fa-graduation-cap'),(143,'fa fa-group','fa-group'),(144,'fa fa-hdd-o','fa-hdd-o'),(145,'fa fa-headphones','fa-headphones'),(146,'fa fa-heart','fa-heart'),(147,'fa fa-heart-o','fa-heart-o'),(148,'fa fa-history','fa-history'),(149,'fa fa-home','fa-home'),(150,'fa fa-image','fa-image'),(151,'fa fa-inbox','fa-inbox'),(152,'fa fa-info','fa-info'),(153,'fa fa-info-circle','fa-info-circle'),(154,'fa fa-institution','fa-institution'),(155,'fa fa-key','fa-key'),(156,'fa fa-keyboard-o','fa-keyboard-o'),(157,'fa fa-language','fa-language'),(158,'fa fa-laptop','fa-laptop'),(159,'fa fa-leaf','fa-leaf'),(160,'fa fa-legal','fa-legal'),(161,'fa fa-lemon-o','fa-lemon-o'),(162,'fa fa-level-down','fa-level-down'),(163,'fa fa-level-up','fa-level-up'),(164,'fa fa-life-bouy','fa-life-bouy'),(165,'fa fa-life-buoy','fa-life-buoy'),(166,'fa fa-life-ring','fa-life-ring'),(167,'fa fa-life-saver','fa-life-saver'),(168,'fa fa-lightbulb-o','fa-lightbulb-o'),(169,'fa fa-line-chart','fa-line-chart'),(170,'fa fa-location-arrow','fa-location-arrow'),(171,'fa fa-lock','fa-lock'),(172,'fa fa-magic','fa-magic'),(173,'fa fa-magnet','fa-magnet'),(174,'fa fa-mail-forward','fa-mail-forward'),(175,'fa fa-mail-reply','fa-mail-reply'),(176,'fa fa-mail-reply-all','fa-mail-reply-all'),(177,'fa fa-male','fa-male'),(178,'fa fa-map-marker','fa-map-marker'),(179,'fa fa-meh-o','fa-meh-o'),(180,'fa fa-microphone','fa-microphone'),(181,'fa fa-microphone-slash','fa-microphone-slash'),(182,'fa fa-minus','fa-minus'),(183,'fa fa-minus-circle','fa-minus-circle'),(184,'fa fa-minus-square','fa-minus-square'),(185,'fa fa-minus-square-o','fa-minus-square-o'),(186,'fa fa-mobile','fa-mobile'),(187,'fa fa-mobile-phone','fa-mobile-phone'),(188,'fa fa-money','fa-money'),(189,'fa fa-moon-o','fa-moon-o'),(190,'fa fa-mortar-board','fa-mortar-board'),(191,'fa fa-music','fa-music'),(192,'fa fa-navicon','fa-navicon'),(193,'fa fa-newspaper-o','fa-newspaper-o'),(194,'fa fa-paint-brush','fa-paint-brush'),(195,'fa fa-paper-plane','fa-paper-plane'),(196,'fa fa-paper-plane-o','fa-paper-plane-o'),(197,'fa fa-paw','fa-paw'),(198,'fa fa-pencil','fa-pencil'),(199,'fa fa-pencil-square','fa-pencil-square'),(200,'fa fa-pencil-square-o','fa-pencil-square-o'),(201,'fa fa-phone','fa-phone'),(202,'fa fa-phone-square','fa-phone-square'),(203,'fa fa-photo','fa-photo'),(204,'fa fa-picture-o','fa-picture-o'),(205,'fa fa-pie-chart','fa-pie-chart'),(206,'fa fa-plane','fa-plane'),(207,'fa fa-plug','fa-plug'),(208,'fa fa-plus','fa-plus'),(209,'fa fa-plus-circle','fa-plus-circle'),(210,'fa fa-plus-square','fa-plus-square'),(211,'fa fa-plus-square-o','fa-plus-square-o'),(212,'fa fa-power-off','fa-power-off'),(213,'fa fa-print','fa-print'),(214,'fa fa-puzzle-piece','fa-puzzle-piece'),(215,'fa fa-qrcode','fa-qrcode'),(216,'fa fa-question','fa-question'),(217,'fa fa-question-circle','fa-question-circle'),(218,'fa fa-quote-left','fa-quote-left'),(219,'fa fa-quote-right','fa-quote-right'),(220,'fa fa-random','fa-random'),(221,'fa fa-recycle','fa-recycle'),(222,'fa fa-refresh','fa-refresh'),(223,'fa fa-remove','fa-remove'),(224,'fa fa-reorder','fa-reorder'),(225,'fa fa-reply','fa-reply'),(226,'fa fa-reply-all','fa-reply-all'),(227,'fa fa-retweet','fa-retweet'),(228,'fa fa-road','fa-road'),(229,'fa fa-rocket','fa-rocket'),(230,'fa fa-rss','fa-rss'),(231,'fa fa-rss-square','fa-rss-square'),(232,'fa fa-search','fa-search'),(233,'fa fa-search-minus','fa-search-minus'),(234,'fa fa-search-plus','fa-search-plus'),(235,'fa fa-send','fa-send'),(236,'fa fa-send-o','fa-send-o'),(237,'fa fa-share','fa-share'),(238,'fa fa-share-alt','fa-share-alt'),(239,'fa fa-share-alt-square','fa-share-alt-square'),(240,'fa fa-share-square','fa-share-square'),(241,'fa fa-share-square-o','fa-share-square-o'),(242,'fa fa-shield','fa-shield'),(243,'fa fa-shopping-cart','fa-shopping-cart'),(244,'fa fa-sign-in','fa-sign-in'),(245,'fa fa-sign-out','fa-sign-out'),(246,'fa fa-signal','fa-signal'),(247,'fa fa-sitemap','fa-sitemap'),(248,'fa fa-sliders','fa-sliders'),(249,'fa fa-smile-o','fa-smile-o'),(250,'fa fa-soccer-ball-o','fa-soccer-ball-o'),(251,'fa fa-sort','fa-sort'),(252,'fa fa-sort-alpha-asc','fa-sort-alpha-asc'),(253,'fa fa-sort-alpha-desc','fa-sort-alpha-desc'),(254,'fa fa-sort-amount-asc','fa-sort-amount-asc'),(255,'fa fa-sort-amount-desc','fa-sort-amount-desc'),(256,'fa fa-sort-asc','fa-sort-asc'),(257,'fa fa-sort-desc','fa-sort-desc'),(258,'fa fa-sort-down','fa-sort-down'),(259,'fa fa-sort-numeric-asc','fa-sort-numeric-asc'),(260,'fa fa-sort-numeric-desc','fa-sort-numeric-desc'),(261,'fa fa-sort-up','fa-sort-up'),(262,'fa fa-space-shuttle','fa-space-shuttle'),(263,'fa fa-spinner','fa-spinner'),(264,'fa fa-spoon','fa-spoon'),(265,'fa fa-square','fa-square'),(266,'fa fa-square-o','fa-square-o'),(267,'fa fa-star','fa-star'),(268,'fa fa-star-half','fa-star-half'),(269,'fa fa-star-half-empty','fa-star-half-empty'),(270,'fa fa-star-half-full','fa-star-half-full'),(271,'fa fa-star-half-o','fa-star-half-o'),(272,'fa fa-star-o','fa-star-o'),(273,'fa fa-suitcase','fa-suitcase'),(274,'fa fa-sun-o','fa-sun-o'),(275,'fa fa-support','fa-support'),(276,'fa fa-tablet','fa-tablet'),(277,'fa fa-tachometer','fa-tachometer'),(278,'fa fa-tag','fa-tag'),(279,'fa fa-tags','fa-tags'),(280,'fa fa-tasks','fa-tasks'),(281,'fa fa-taxi','fa-taxi'),(282,'fa fa-terminal','fa-terminal'),(283,'fa fa-thumb-tack','fa-thumb-tack'),(284,'fa fa-thumbs-down','fa-thumbs-down'),(285,'fa fa-thumbs-o-down','fa-thumbs-o-down'),(286,'fa fa-thumbs-o-up','fa-thumbs-o-up'),(287,'fa fa-thumbs-up','fa-thumbs-up'),(288,'fa fa-ticket','fa-ticket'),(289,'fa fa-times','fa-times'),(290,'fa fa-times-circle','fa-times-circle'),(291,'fa fa-times-circle-o','fa-times-circle-o'),(292,'fa fa-tint','fa-tint'),(293,'fa fa-toggle-down','fa-toggle-down'),(294,'fa fa-toggle-left','fa-toggle-left'),(295,'fa fa-toggle-off','fa-toggle-off'),(296,'fa fa-toggle-on','fa-toggle-on'),(297,'fa fa-toggle-right','fa-toggle-right'),(298,'fa fa-toggle-up','fa-toggle-up'),(299,'fa fa-trash','fa-trash'),(300,'fa fa-trash-o','fa-trash-o'),(301,'fa fa-tree','fa-tree'),(302,'fa fa-trophy','fa-trophy'),(303,'fa fa-truck','fa-truck'),(304,'fa fa-tty','fa-tty'),(305,'fa fa-umbrella','fa-umbrella'),(306,'fa fa-university','fa-university'),(307,'fa fa-unlock','fa-unlock'),(308,'fa fa-unlock-alt','fa-unlock-alt'),(309,'fa fa-unsorted','fa-unsorted'),(310,'fa fa-upload','fa-upload'),(311,'fa fa-user','fa-user'),(312,'fa fa-users','fa-users'),(313,'fa fa-video-camera','fa-video-camera'),(314,'fa fa-volume-down','fa-volume-down'),(315,'fa fa-volume-off','fa-volume-off'),(316,'fa fa-volume-up','fa-volume-up'),(317,'fa fa-warning','fa-warning'),(318,'fa fa-wheelchair','fa-wheelchair'),(319,'fa fa-wifi','fa-wifi'),(320,'fa fa-wrench','fa-wrench'),(321,'fa fa-file','fa-file'),(322,'fa fa-file-archive-o','fa-file-archive-o'),(323,'fa fa-file-audio-o','fa-file-audio-o'),(324,'fa fa-file-code-o','fa-file-code-o'),(325,'fa fa-file-excel-o','fa-file-excel-o'),(326,'fa fa-file-image-o','fa-file-image-o'),(327,'fa fa-file-movie-o','fa-file-movie-o'),(328,'fa fa-file-o','fa-file-o'),(329,'fa fa-file-pdf-o','fa-file-pdf-o'),(330,'fa fa-file-photo-o','fa-file-photo-o'),(331,'fa fa-file-picture-o','fa-file-picture-o'),(332,'fa fa-file-powerpoint-o','fa-file-powerpoint-o'),(333,'fa fa-file-sound-o','fa-file-sound-o'),(334,'fa fa-file-text','fa-file-text'),(335,'fa fa-file-text-o','fa-file-text-o'),(336,'fa fa-file-video-o','fa-file-video-o'),(337,'fa fa-file-word-o','fa-file-word-o'),(338,'fa fa-file-zip-o','fa-file-zip-o'),(339,'fa fa-info-circle fa-lg fa-li','fa-info-circle'),(340,'fa fa-circle-o-notch','fa-circle-o-notch'),(341,'fa fa-cog','fa-cog'),(342,'fa fa-gear','fa-gear'),(343,'fa fa-refresh','fa-refresh'),(344,'fa fa-spinner','fa-spinner'),(345,'fa fa-check-square','fa-check-square'),(346,'fa fa-check-square-o','fa-check-square-o'),(347,'fa fa-circle','fa-circle'),(348,'fa fa-circle-o','fa-circle-o'),(349,'fa fa-dot-circle-o','fa-dot-circle-o'),(350,'fa fa-minus-square','fa-minus-square'),(351,'fa fa-minus-square-o','fa-minus-square-o'),(352,'fa fa-plus-square','fa-plus-square'),(353,'fa fa-plus-square-o','fa-plus-square-o'),(354,'fa fa-square','fa-square'),(355,'fa fa-square-o','fa-square-o'),(356,'fa fa-cc-amex','fa-cc-amex'),(357,'fa fa-cc-discover','fa-cc-discover'),(358,'fa fa-cc-mastercard','fa-cc-mastercard'),(359,'fa fa-cc-paypal','fa-cc-paypal'),(360,'fa fa-cc-stripe','fa-cc-stripe'),(361,'fa fa-cc-visa','fa-cc-visa'),(362,'fa fa-credit-card','fa-credit-card'),(363,'fa fa-google-wallet','fa-google-wallet'),(364,'fa fa-paypal','fa-paypal'),(365,'fa fa-area-chart','fa-area-chart'),(366,'fa fa-bar-chart','fa-bar-chart'),(367,'fa fa-bar-chart-o','fa-bar-chart-o'),(368,'fa fa-line-chart','fa-line-chart'),(369,'fa fa-pie-chart','fa-pie-chart'),(370,'fa fa-bitcoin','fa-bitcoin'),(371,'fa fa-btc','fa-btc'),(372,'fa fa-cny','fa-cny'),(373,'fa fa-dollar','fa-dollar'),(374,'fa fa-eur','fa-eur'),(375,'fa fa-euro','fa-euro'),(376,'fa fa-gbp','fa-gbp'),(377,'fa fa-ils','fa-ils'),(378,'fa fa-inr','fa-inr'),(379,'fa fa-jpy','fa-jpy'),(380,'fa fa-krw','fa-krw'),(381,'fa fa-money','fa-money'),(382,'fa fa-rmb','fa-rmb'),(383,'fa fa-rouble','fa-rouble'),(384,'fa fa-rub','fa-rub'),(385,'fa fa-ruble','fa-ruble'),(386,'fa fa-rupee','fa-rupee'),(387,'fa fa-shekel','fa-shekel'),(388,'fa fa-sheqel','fa-sheqel'),(389,'fa fa-try','fa-try'),(390,'fa fa-turkish-lira','fa-turkish-lira'),(391,'fa fa-usd','fa-usd'),(392,'fa fa-won','fa-won'),(393,'fa fa-yen','fa-yen'),(394,'fa fa-align-center','fa-align-center'),(395,'fa fa-align-justify','fa-align-justify'),(396,'fa fa-align-left','fa-align-left'),(397,'fa fa-align-right','fa-align-right'),(398,'fa fa-bold','fa-bold'),(399,'fa fa-chain','fa-chain'),(400,'fa fa-chain-broken','fa-chain-broken'),(401,'fa fa-clipboard','fa-clipboard'),(402,'fa fa-columns','fa-columns'),(403,'fa fa-copy','fa-copy'),(404,'fa fa-cut','fa-cut'),(405,'fa fa-dedent','fa-dedent'),(406,'fa fa-eraser','fa-eraser'),(407,'fa fa-file','fa-file'),(408,'fa fa-file-o','fa-file-o'),(409,'fa fa-file-text','fa-file-text'),(410,'fa fa-file-text-o','fa-file-text-o'),(411,'fa fa-chevron-circle-up','fa-chevron-circle-up'),(412,'fa fa-chevron-down','fa-chevron-down'),(413,'fa fa-chevron-left','fa-chevron-left'),(414,'fa fa-chevron-right','fa-chevron-right'),(415,'fa fa-chevron-up','fa-chevron-up'),(416,'fa fa-hand-o-down','fa-hand-o-down'),(417,'fa fa-hand-o-left','fa-hand-o-left'),(418,'fa fa-hand-o-right','fa-hand-o-right'),(419,'fa fa-hand-o-up','fa-hand-o-up'),(420,'fa fa-long-arrow-down','fa-long-arrow-down'),(421,'fa fa-long-arrow-left','fa-long-arrow-left'),(422,'fa fa-long-arrow-right','fa-long-arrow-right'),(423,'fa fa-long-arrow-up','fa-long-arrow-up'),(424,'fa fa-toggle-down','fa-toggle-down'),(425,'fa fa-toggle-left','fa-toggle-left'),(426,'fa fa-toggle-right','fa-toggle-right'),(427,'fa fa-toggle-up','fa-toggle-up'),(428,'fa fa-arrows-alt','fa-arrows-alt'),(429,'fa fa-backward','fa-backward'),(430,'fa fa-compress','fa-compress'),(431,'fa fa-eject','fa-eject'),(432,'fa fa-expand','fa-expand'),(433,'fa fa-fast-backward','fa-fast-backward'),(434,'fa fa-fast-forward','fa-fast-forward'),(435,'fa fa-forward','fa-forward'),(436,'fa fa-pause','fa-pause'),(437,'fa fa-play','fa-play'),(438,'fa fa-play-circle','fa-play-circle'),(439,'fa fa-play-circle-o','fa-play-circle-o'),(440,'fa fa-step-backward','fa-step-backward'),(441,'fa fa-step-forward','fa-step-forward'),(442,'fa fa-stop','fa-stop'),(443,'fa fa-youtube-play','fa-youtube-play'),(444,'fa fa-adn','fa-adn'),(445,'fa fa-android','fa-android'),(446,'fa fa-angellist','fa-angellist'),(447,'fa fa-apple','fa-apple'),(448,'fa fa-behance','fa-behance'),(449,'fa fa-behance-square','fa-behance-square'),(450,'fa fa-bitbucket','fa-bitbucket'),(451,'fa fa-bitbucket-square','fa-bitbucket-square'),(452,'fa fa-bitcoin','fa-bitcoin'),(453,'fa fa-btc','fa-btc'),(454,'fa fa-cc-amex','fa-cc-amex'),(455,'fa fa-cc-discover','fa-cc-discover'),(456,'fa fa-cc-mastercard','fa-cc-mastercard'),(457,'fa fa-cc-paypal','fa-cc-paypal'),(458,'fa fa-cc-stripe','fa-cc-stripe'),(459,'fa fa-cc-visa','fa-cc-visa'),(460,'fa fa-codepen','fa-codepen'),(461,'fa fa-css3','fa-css3'),(462,'fa fa-delicious','fa-delicious'),(463,'fa fa-deviantart','fa-deviantart'),(464,'fa fa-digg','fa-digg'),(465,'fa fa-dribbble','fa-dribbble'),(466,'fa fa-dropbox','fa-dropbox'),(467,'fa fa-drupal','fa-drupal'),(468,'fa fa-empire','fa-empire'),(469,'fa fa-facebook','fa-facebook'),(470,'fa fa-facebook-square','fa-facebook-square'),(471,'fa fa-flickr','fa-flickr'),(472,'fa fa-foursquare','fa-foursquare'),(473,'fa fa-ge','fa-ge'),(474,'fa fa-git','fa-git'),(475,'fa fa-git-square','fa-git-square'),(476,'fa fa-github','fa-github'),(477,'fa fa-github-alt','fa-github-alt'),(478,'fa fa-github-square','fa-github-square'),(479,'fa fa-gittip','fa-gittip'),(480,'fa fa-google','fa-google'),(481,'fa fa-google-plus','fa-google-plus'),(482,'fa fa-google-plus-square','fa-google-plus-square'),(483,'fa fa-google-wallet','fa-google-wallet'),(484,'fa fa-hacker-news','fa-hacker-news'),(485,'fa fa-html5','fa-html5'),(486,'fa fa-files-o','fa-files-o'),(487,'fa fa-floppy-o','fa-floppy-o'),(488,'fa fa-font','fa-font'),(489,'fa fa-header','fa-header'),(490,'fa fa-indent','fa-indent'),(491,'fa fa-italic','fa-italic'),(492,'fa fa-link','fa-link'),(493,'fa fa-list','fa-list'),(494,'fa fa-list-alt','fa-list-alt'),(495,'fa fa-list-ol','fa-list-ol'),(496,'fa fa-list-ul','fa-list-ul'),(497,'fa fa-outdent','fa-outdent'),(498,'fa fa-paperclip','fa-paperclip'),(499,'fa fa-paragraph','fa-paragraph'),(500,'fa fa-paste','fa-paste'),(501,'fa fa-repeat','fa-repeat'),(502,'fa fa-rotate-left','fa-rotate-left'),(503,'fa fa-rotate-right','fa-rotate-right'),(504,'fa fa-save','fa-save'),(505,'fa fa-scissors','fa-scissors'),(506,'fa fa-strikethrough','fa-strikethrough'),(507,'fa fa-subscript','fa-subscript'),(508,'fa fa-superscript','fa-superscript'),(509,'fa fa-table','fa-table'),(510,'fa fa-text-height','fa-text-height'),(511,'fa fa-text-width','fa-text-width'),(512,'fa fa-th','fa-th'),(513,'fa fa-th-large','fa-th-large'),(514,'fa fa-th-list','fa-th-list'),(515,'fa fa-underline','fa-underline'),(516,'fa fa-undo','fa-undo'),(517,'fa fa-unlink','fa-unlink'),(518,'fa fa-angle-double-down','fa-angle-double-down'),(519,'fa fa-angle-double-left','fa-angle-double-left'),(520,'fa fa-angle-double-right','fa-angle-double-right'),(521,'fa fa-angle-double-up','fa-angle-double-up'),(522,'fa fa-angle-down','fa-angle-down'),(523,'fa fa-angle-left','fa-angle-left'),(524,'fa fa-angle-right','fa-angle-right'),(525,'fa fa-angle-up','fa-angle-up'),(526,'fa fa-arrow-circle-down','fa-arrow-circle-down'),(527,'fa fa-arrow-circle-left','fa-arrow-circle-left'),(528,'fa fa-arrow-circle-o-down','fa-arrow-circle-o-down'),(529,'fa fa-arrow-circle-o-left','fa-arrow-circle-o-left'),(530,'fa fa-arrow-circle-o-right','fa-arrow-circle-o-right'),(531,'fa fa-arrow-circle-o-up','fa-arrow-circle-o-up'),(532,'fa fa-arrow-circle-right','fa-arrow-circle-right'),(533,'fa fa-arrow-circle-up','fa-arrow-circle-up'),(534,'fa fa-arrow-down','fa-arrow-down'),(535,'fa fa-arrow-left','fa-arrow-left'),(536,'fa fa-arrow-right','fa-arrow-right'),(537,'fa fa-arrow-up','fa-arrow-up'),(538,'fa fa-arrows','fa-arrows'),(539,'fa fa-arrows-alt','fa-arrows-alt'),(540,'fa fa-arrows-h','fa-arrows-h'),(541,'fa fa-arrows-v','fa-arrows-v'),(542,'fa fa-caret-down','fa-caret-down'),(543,'fa fa-caret-left','fa-caret-left'),(544,'fa fa-caret-right','fa-caret-right'),(545,'fa fa-caret-square-o-down','fa-caret-square-o-down'),(546,'fa fa-caret-square-o-left','fa-caret-square-o-left'),(547,'fa fa-caret-square-o-right','fa-caret-square-o-right'),(548,'fa fa-caret-square-o-up','fa-caret-square-o-up'),(549,'fa fa-caret-up','fa-caret-up'),(550,'fa fa-chevron-circle-down','fa-chevron-circle-down'),(551,'fa fa-chevron-circle-left','fa-chevron-circle-left'),(552,'fa fa-chevron-circle-right','fa-chevron-circle-right'),(553,'fa fa-instagram','fa-instagram'),(554,'fa fa-ioxhost','fa-ioxhost'),(555,'fa fa-joomla','fa-joomla'),(556,'fa fa-jsfiddle','fa-jsfiddle'),(557,'fa fa-lastfm','fa-lastfm'),(558,'fa fa-lastfm-square','fa-lastfm-square'),(559,'fa fa-linkedin','fa-linkedin'),(560,'fa fa-linkedin-square','fa-linkedin-square'),(561,'fa fa-linux','fa-linux'),(562,'fa fa-maxcdn','fa-maxcdn'),(563,'fa fa-meanpath','fa-meanpath'),(564,'fa fa-openid','fa-openid'),(565,'fa fa-pagelines','fa-pagelines'),(566,'fa fa-paypal','fa-paypal'),(567,'fa fa-pied-piper','fa-pied-piper'),(568,'fa fa-pied-piper-alt','fa-pied-piper-alt'),(569,'fa fa-pinterest','fa-pinterest'),(570,'fa fa-pinterest-square','fa-pinterest-square'),(571,'fa fa-qq','fa-qq'),(572,'fa fa-ra','fa-ra'),(573,'fa fa-rebel','fa-rebel'),(574,'fa fa-reddit','fa-reddit'),(575,'fa fa-reddit-square','fa-reddit-square'),(576,'fa fa-renren','fa-renren'),(577,'fa fa-share-alt','fa-share-alt'),(578,'fa fa-share-alt-square','fa-share-alt-square'),(579,'fa fa-skype','fa-skype'),(580,'fa fa-slack','fa-slack'),(581,'fa fa-slideshare','fa-slideshare'),(582,'fa fa-soundcloud','fa-soundcloud'),(583,'fa fa-spotify','fa-spotify'),(584,'fa fa-stack-exchange','fa-stack-exchange'),(585,'fa fa-stack-overflow','fa-stack-overflow'),(586,'fa fa-steam','fa-steam'),(587,'fa fa-steam-square','fa-steam-square'),(588,'fa fa-stumbleupon','fa-stumbleupon'),(589,'fa fa-stumbleupon-circle','fa-stumbleupon-circle'),(590,'fa fa-tencent-weibo','fa-tencent-weibo'),(591,'fa fa-trello','fa-trello'),(592,'fa fa-tumblr','fa-tumblr'),(593,'fa fa-tumblr-square','fa-tumblr-square'),(594,'fa fa-twitch','fa-twitch'),(595,'fa fa-twitter','fa-twitter'),(596,'fa fa-twitter-square','fa-twitter-square'),(597,'fa fa-vimeo-square','fa-vimeo-square'),(598,'fa fa-vine','fa-vine'),(599,'fa fa-vk','fa-vk'),(600,'fa fa-wechat','fa-wechat'),(601,'fa fa-weibo','fa-weibo'),(602,'fa fa-weixin','fa-weixin'),(603,'fa fa-windows','fa-windows'),(604,'fa fa-wordpress','fa-wordpress'),(605,'fa fa-xing','fa-xing'),(606,'fa fa-xing-square','fa-xing-square'),(607,'fa fa-yahoo','fa-yahoo'),(608,'fa fa-yelp','fa-yelp'),(609,'fa fa-youtube','fa-youtube'),(610,'fa fa-youtube-play','fa-youtube-play'),(611,'fa fa-youtube-square','fa-youtube-square'),(612,'fa fa-ambulance','fa-ambulance'),(613,'fa fa-h-square','fa-h-square'),(614,'fa fa-hospital-o','fa-hospital-o'),(615,'fa fa-medkit','fa-medkit'),(616,'fa fa-plus-square','fa-plus-square'),(617,'fa fa-stethoscope','fa-stethoscope'),(618,'fa fa-user-md','fa-user-md'),(619,'fa fa-wheelchair','fa-wheelchair');
/*!40000 ALTER TABLE `mst_icon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mst_item_status`
--

DROP TABLE IF EXISTS `mst_item_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mst_item_status` (
  `item_status_id` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `item_status_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `rules` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_loan` smallint(6) NOT NULL DEFAULT '0',
  `skip_stock_take` smallint(6) NOT NULL DEFAULT '0',
  `input_date` date DEFAULT NULL,
  `last_update` date DEFAULT NULL,
  PRIMARY KEY (`item_status_id`) USING BTREE,
  UNIQUE KEY `item_status_name` (`item_status_name`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_item_status`
--

LOCK TABLES `mst_item_status` WRITE;
/*!40000 ALTER TABLE `mst_item_status` DISABLE KEYS */;
/*!40000 ALTER TABLE `mst_item_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mst_item_type`
--

DROP TABLE IF EXISTS `mst_item_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mst_item_type` (
  `item_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_type_code` varchar(3) DEFAULT NULL,
  `item_type_name` varchar(30) DEFAULT NULL,
  `input_date` date DEFAULT NULL,
  `last_update` date DEFAULT NULL,
  PRIMARY KEY (`item_type_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_item_type`
--

LOCK TABLES `mst_item_type` WRITE;
/*!40000 ALTER TABLE `mst_item_type` DISABLE KEYS */;
INSERT INTO `mst_item_type` VALUES (1,'BS','Bachelor\'s Thesis','2020-05-10','2020-05-10'),(3,'THS','Master\'s Thesis','2020-05-10','2020-05-10'),(5,'DSR','Dissertation','2020-05-15','2020-05-15'),(6,'OTH','Other','2020-06-10','2020-06-10');
/*!40000 ALTER TABLE `mst_item_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mst_label`
--

DROP TABLE IF EXISTS `mst_label`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mst_label` (
  `label_id` int(11) NOT NULL AUTO_INCREMENT,
  `label_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `label_desc` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `label_image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `input_date` date NOT NULL,
  `last_update` date NOT NULL,
  PRIMARY KEY (`label_id`) USING BTREE,
  UNIQUE KEY `label_name` (`label_name`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_label`
--

LOCK TABLES `mst_label` WRITE;
/*!40000 ALTER TABLE `mst_label` DISABLE KEYS */;
/*!40000 ALTER TABLE `mst_label` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mst_language`
--

DROP TABLE IF EXISTS `mst_language`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mst_language` (
  `language_id` char(5) COLLATE utf8_unicode_ci NOT NULL,
  `language_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `input_date` date DEFAULT NULL,
  `last_update` date DEFAULT NULL,
  PRIMARY KEY (`language_id`) USING BTREE,
  UNIQUE KEY `language_name` (`language_name`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_language`
--

LOCK TABLES `mst_language` WRITE;
/*!40000 ALTER TABLE `mst_language` DISABLE KEYS */;
INSERT INTO `mst_language` VALUES ('id','Indonesia','2017-08-16','2017-08-16'),('en','English','2017-08-16','2017-08-16'),('KOR','Korean','2026-08-31','2026-08-31');
/*!40000 ALTER TABLE `mst_language` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mst_license`
--

DROP TABLE IF EXISTS `mst_license`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mst_license` (
  `license_id` int(11) NOT NULL AUTO_INCREMENT,
  `license_name` varchar(100) NOT NULL,
  `input_date` date NOT NULL,
  `last_update` date NOT NULL,
  PRIMARY KEY (`license_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_license`
--

LOCK TABLES `mst_license` WRITE;
/*!40000 ALTER TABLE `mst_license` DISABLE KEYS */;
INSERT INTO `mst_license` VALUES (1,'Universitas Hasanudin','2026-08-31','0000-00-00');
/*!40000 ALTER TABLE `mst_license` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mst_loan_rules`
--

DROP TABLE IF EXISTS `mst_loan_rules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mst_loan_rules` (
  `loan_rules_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_type_id` int(11) NOT NULL DEFAULT '0',
  `coll_type_id` int(11) DEFAULT '0',
  `gmd_id` int(11) DEFAULT '0',
  `loan_limit` int(11) DEFAULT '0',
  `loan_periode` int(11) DEFAULT '0',
  `reborrow_limit` int(11) DEFAULT '0',
  `fine_each_day` int(11) DEFAULT '0',
  `grace_periode` int(11) DEFAULT '0',
  `input_date` date DEFAULT NULL,
  `last_update` date DEFAULT NULL,
  PRIMARY KEY (`loan_rules_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=FIXED;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_loan_rules`
--

LOCK TABLES `mst_loan_rules` WRITE;
/*!40000 ALTER TABLE `mst_loan_rules` DISABLE KEYS */;
/*!40000 ALTER TABLE `mst_loan_rules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mst_location`
--

DROP TABLE IF EXISTS `mst_location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mst_location` (
  `location_id` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `location_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `input_date` date NOT NULL,
  `last_update` date NOT NULL,
  PRIMARY KEY (`location_id`) USING BTREE,
  UNIQUE KEY `location_name` (`location_name`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_location`
--

LOCK TABLES `mst_location` WRITE;
/*!40000 ALTER TABLE `mst_location` DISABLE KEYS */;
INSERT INTO `mst_location` VALUES ('1','Ruang Baca','2026-08-31','2026-08-31');
/*!40000 ALTER TABLE `mst_location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mst_member_type`
--

DROP TABLE IF EXISTS `mst_member_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mst_member_type` (
  `member_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_type_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `loan_limit` int(11) NOT NULL,
  `loan_periode` int(11) NOT NULL,
  `enable_reserve` int(11) NOT NULL DEFAULT '0',
  `reserve_limit` int(11) NOT NULL DEFAULT '0',
  `member_periode` int(11) NOT NULL,
  `reborrow_limit` int(11) NOT NULL,
  `fine_each_day` int(11) NOT NULL,
  `grace_periode` int(11) DEFAULT '0',
  `input_date` date NOT NULL,
  `last_update` date DEFAULT NULL,
  PRIMARY KEY (`member_type_id`) USING BTREE,
  UNIQUE KEY `member_type_name` (`member_type_name`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_member_type`
--

LOCK TABLES `mst_member_type` WRITE;
/*!40000 ALTER TABLE `mst_member_type` DISABLE KEYS */;
INSERT INTO `mst_member_type` VALUES (1,'Standard',3,7,1,3,365,0,0,0,'2026-08-31','2026-08-31'),(2,'Mahasiswa',3,7,1,3,365,0,0,0,'2026-08-31','2026-08-31'),(3,'Dosen',5,14,1,5,365,0,0,0,'2026-08-31','2026-08-31');
/*!40000 ALTER TABLE `mst_member_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mst_menu`
--

DROP TABLE IF EXISTS `mst_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mst_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `type` enum('menu','submenu','title') NOT NULL,
  `level` int(11) NOT NULL,
  `desc` text,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `parent_id` (`parent_id`) USING BTREE,
  CONSTRAINT `mst_menu_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `mst_menu` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_menu`
--

LOCK TABLES `mst_menu` WRITE;
/*!40000 ALTER TABLE `mst_menu` DISABLE KEYS */;
INSERT INTO `mst_menu` VALUES (1,NULL,'Pinned',NULL,'fa-thumb-tack','menu',1,NULL),(2,1,'Update User Profile','profile',NULL,'submenu',3,NULL),(3,NULL,'Dashboard','home','fa-bar-chart-o','menu',1,NULL),(4,NULL,'Opac','opac','fa-desktop','menu',1,NULL),(5,NULL,'ETD',NULL,'fa-book','menu',1,NULL),(6,5,'Bibliography','#',NULL,'title',2,NULL),(7,6,'Etd List','bibliography',NULL,'submenu',3,NULL),(8,NULL,'Membership',NULL,'fa-user','menu',1,NULL),(9,8,'Membership',NULL,NULL,'title',2,NULL),(10,9,'List Membership','membership',NULL,'submenu',3,NULL),(11,9,'Member Type','membership/membertype',NULL,'submenu',3,NULL),(12,NULL,'Master File',NULL,'fa-file','menu',1,NULL),(13,12,'List Controlled',NULL,NULL,'title',2,NULL),(14,13,'GMD','master/gmd',NULL,'submenu',3,NULL),(15,13,'Publisher','master/penerbit',NULL,'submenu',3,NULL),(16,13,'Writer','master/pengarang',NULL,'submenu',3,NULL),(17,13,'Supervisor','master/supervisor',NULL,'submenu',3,NULL),(18,13,'Examiner','master/examiner',NULL,'submenu',3,NULL),(19,13,'Location','master/location',NULL,'submenu',3,NULL),(20,12,'References',NULL,NULL,'title',2,NULL),(21,20,'Places','master/place',NULL,'submenu',3,NULL),(22,20,'Exemplar State','master/statusitem',NULL,'submenu',3,NULL),(23,20,'Collection Type','master/collection',NULL,'submenu',3,NULL),(24,20,'Language','master/language',NULL,'submenu',3,NULL),(25,20,'Frequency','master/frequency',NULL,'submenu',3,NULL),(26,12,'License','master/license',NULL,'submenu',3,NULL),(27,12,'Code Ministry PDDIKTI','master/codeministry',NULL,'submenu',3,NULL),(28,12,'Subject','master/subject',NULL,'submenu',3,NULL),(29,NULL,'System',NULL,'fa-sitemap','menu',1,NULL),(30,28,'System',NULL,NULL,'title',2,NULL),(31,29,'System Configuration','sistem/pengaturan-sistem',NULL,'submenu',3,NULL),(32,29,'Content','sistem/konten',NULL,'submenu',3,NULL),(33,29,'Shortcut','sistem/pintasan',NULL,'submenu',3,NULL),(34,29,'Biblio Index','sistem/indeks-biblio',NULL,'submenu',3,NULL),(35,29,'Modules','sistem/modul',NULL,'submenu',3,NULL),(36,29,'Libarian System','sistem/pustakawan',NULL,'submenu',3,NULL),(37,29,'User Groups','sistem/user-groups',NULL,'submenu',3,NULL),(38,29,'Format Scan Generator','',NULL,'submenu',3,NULL),(39,29,'Sys Log','sistem/logs',NULL,'submenu',3,NULL),(40,29,'Backup Data','sistem/backups',NULL,'submenu',3,NULL),(41,NULL,'Reporting',NULL,'fa-table','menu',1,NULL),(42,40,'Reporting',NULL,NULL,'title',2,NULL),(43,41,'Statistic Collection','report/stats-collection',NULL,'submenu',3,NULL),(44,41,'Membership Report','report/membership',NULL,'submenu',3,NULL),(45,40,'Other Report',NULL,NULL,'title',2,NULL),(46,44,'Recapitulation','report/recap',NULL,'submenu',3,NULL),(47,44,'List Title','report/titles',NULL,'submenu',3,NULL),(48,44,'List Membership','report/list-member',NULL,'submenu',3,NULL),(49,44,'Contributor List','report/contributors',NULL,'submenu',3,NULL),(50,44,'Staff Activity','report/staff-activity',NULL,'submenu',3,NULL),(51,44,'Visitor','report/visitor',NULL,'submenu',3,NULL),(52,44,'Visualize Diagram','#',NULL,'submenu',3,NULL),(53,NULL,'Logout','logout','fa-power-off','menu',1,NULL),(54,41,'Download Counter','report/download-counter',NULL,'submenu',3,NULL);
/*!40000 ALTER TABLE `mst_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mst_module`
--

DROP TABLE IF EXISTS `mst_module`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mst_module` (
  `module_id` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `module_path` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `module_desc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`module_id`) USING BTREE,
  UNIQUE KEY `module_name` (`module_name`,`module_path`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_module`
--

LOCK TABLES `mst_module` WRITE;
/*!40000 ALTER TABLE `mst_module` DISABLE KEYS */;
INSERT INTO `mst_module` VALUES (1,'ETD','bibliography','Manage your bibliographic/catalog and items/copies database'),(3,'membership','membership','Manage your library membership and membership type'),(4,'master_file','master_file','Manage your referential data that will be used by other modules'),(6,'system','system','Configure system behaviour, user and backups'),(7,'reporting','reporting','Real time and dynamic report about library collections and circulation');
/*!40000 ALTER TABLE `mst_module` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mst_place`
--

DROP TABLE IF EXISTS `mst_place`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mst_place` (
  `place_id` int(11) NOT NULL AUTO_INCREMENT,
  `place_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `input_date` date DEFAULT NULL,
  `last_update` date DEFAULT NULL,
  PRIMARY KEY (`place_id`) USING BTREE,
  UNIQUE KEY `place_name` (`place_name`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_place`
--

LOCK TABLES `mst_place` WRITE;
/*!40000 ALTER TABLE `mst_place` DISABLE KEYS */;
INSERT INTO `mst_place` VALUES (1,'Makasar','2026-08-31',NULL),(2,'Maumere','2026-08-31','2026-08-31');
/*!40000 ALTER TABLE `mst_place` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mst_publisher`
--

DROP TABLE IF EXISTS `mst_publisher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mst_publisher` (
  `publisher_id` int(11) NOT NULL AUTO_INCREMENT,
  `publisher_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `input_date` date DEFAULT NULL,
  `last_update` date DEFAULT NULL,
  PRIMARY KEY (`publisher_id`) USING BTREE,
  UNIQUE KEY `publisher_name` (`publisher_name`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_publisher`
--

LOCK TABLES `mst_publisher` WRITE;
/*!40000 ALTER TABLE `mst_publisher` DISABLE KEYS */;
INSERT INTO `mst_publisher` VALUES (1,'Universitas Hasanudin','2026-08-31',NULL),(2,'Universitas Maumere Jaya','2026-08-31','2026-08-31');
/*!40000 ALTER TABLE `mst_publisher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mst_supervisor`
--

DROP TABLE IF EXISTS `mst_supervisor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mst_supervisor` (
  `supervisor_id` int(11) NOT NULL AUTO_INCREMENT,
  `supervisor_name` varchar(100) DEFAULT NULL,
  `supervisor_number` varchar(100) NOT NULL,
  `supervisor_year` varchar(20) DEFAULT NULL,
  `supervisor_type` enum('p','o','c') DEFAULT NULL,
  `supervisor_list` varchar(20) DEFAULT NULL,
  `input_date` date NOT NULL,
  `last_update` date NOT NULL,
  PRIMARY KEY (`supervisor_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_supervisor`
--

LOCK TABLES `mst_supervisor` WRITE;
/*!40000 ALTER TABLE `mst_supervisor` DISABLE KEYS */;
INSERT INTO `mst_supervisor` VALUES (1,'Mochammad Hatta','',NULL,NULL,NULL,'2026-08-31','0000-00-00'),(2,'Yolis ','2','1990','p','','2026-08-31','2026-08-31');
/*!40000 ALTER TABLE `mst_supervisor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mst_supplier`
--

DROP TABLE IF EXISTS `mst_supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mst_supplier` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` char(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact` char(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` char(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account` char(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `e_mail` char(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `input_date` date DEFAULT NULL,
  `last_update` date DEFAULT NULL,
  PRIMARY KEY (`supplier_id`) USING BTREE,
  UNIQUE KEY `supplier_name` (`supplier_name`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_supplier`
--

LOCK TABLES `mst_supplier` WRITE;
/*!40000 ALTER TABLE `mst_supplier` DISABLE KEYS */;
/*!40000 ALTER TABLE `mst_supplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mst_topic`
--

DROP TABLE IF EXISTS `mst_topic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mst_topic` (
  `topic_id` int(11) NOT NULL AUTO_INCREMENT,
  `topic` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `topic_type` enum('t','g','n','tm','gr','oc') COLLATE utf8_unicode_ci NOT NULL,
  `auth_list` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `classification` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Classification Code',
  `input_date` date DEFAULT NULL,
  `last_update` date DEFAULT NULL,
  PRIMARY KEY (`topic_id`) USING BTREE,
  UNIQUE KEY `topic` (`topic`,`topic_type`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_topic`
--

LOCK TABLES `mst_topic` WRITE;
/*!40000 ALTER TABLE `mst_topic` DISABLE KEYS */;
/*!40000 ALTER TABLE `mst_topic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reserve`
--

DROP TABLE IF EXISTS `reserve`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reserve` (
  `reserve_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `biblio_id` int(11) NOT NULL,
  `item_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `reserve_date` datetime NOT NULL,
  PRIMARY KEY (`reserve_id`) USING BTREE,
  KEY `references_idx` (`member_id`,`biblio_id`) USING BTREE,
  KEY `item_code_idx` (`item_code`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reserve`
--

LOCK TABLES `reserve` WRITE;
/*!40000 ALTER TABLE `reserve` DISABLE KEYS */;
/*!40000 ALTER TABLE `reserve` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `search_biblio`
--

DROP TABLE IF EXISTS `search_biblio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `search_biblio` (
  `biblio_id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci,
  `edition` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isbn_issn` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author` text COLLATE utf8_unicode_ci,
  `examiner` text COLLATE utf8_unicode_ci,
  `supervisor` text COLLATE utf8_unicode_ci,
  `contributor` text COLLATE utf8_unicode_ci,
  `topic` text COLLATE utf8_unicode_ci,
  `gmd` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publisher` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publish_place` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `language` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `classification` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `spec_detail_info` text COLLATE utf8_unicode_ci,
  `location` text COLLATE utf8_unicode_ci,
  `publish_year` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8_unicode_ci,
  `series_title` text COLLATE utf8_unicode_ci,
  `items` text COLLATE utf8_unicode_ci,
  `collection_types` text COLLATE utf8_unicode_ci,
  `call_number` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `opac_hide` smallint(1) NOT NULL DEFAULT '0',
  `promoted` smallint(1) NOT NULL DEFAULT '0',
  `labels` text COLLATE utf8_unicode_ci,
  `collation` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `input_date` datetime DEFAULT NULL,
  `last_update` datetime DEFAULT NULL,
  UNIQUE KEY `biblio_id` (`biblio_id`),
  KEY `add_indexes` (`gmd`,`publisher`,`publish_place`,`language`,`classification`,`publish_year`,`call_number`),
  KEY `add_indexes2` (`opac_hide`,`promoted`),
  FULLTEXT KEY `title` (`title`),
  FULLTEXT KEY `author` (`author`),
  FULLTEXT KEY `topic` (`topic`),
  FULLTEXT KEY `location` (`location`),
  FULLTEXT KEY `items` (`items`),
  FULLTEXT KEY `collection_types` (`collection_types`),
  FULLTEXT KEY `labels` (`labels`),
  FULLTEXT KEY `supervisor` (`supervisor`),
  FULLTEXT KEY `contributor` (`contributor`),
  FULLTEXT KEY `examiner` (`examiner`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC COMMENT='index table for advance searching technique for SLiMS';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `search_biblio`
--

LOCK TABLES `search_biblio` WRITE;
/*!40000 ALTER TABLE `search_biblio` DISABLE KEYS */;
/*!40000 ALTER TABLE `search_biblio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `serial`
--

DROP TABLE IF EXISTS `serial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `serial` (
  `serial_id` int(11) NOT NULL AUTO_INCREMENT,
  `date_start` date NOT NULL,
  `date_end` date DEFAULT NULL,
  `period` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8_unicode_ci,
  `biblio_id` int(11) DEFAULT NULL,
  `gmd_id` int(11) DEFAULT NULL,
  `input_date` date NOT NULL,
  `last_update` date NOT NULL,
  PRIMARY KEY (`serial_id`) USING BTREE,
  KEY `fk_serial_biblio` (`biblio_id`) USING BTREE,
  KEY `fk_serial_gmd` (`gmd_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `serial`
--

LOCK TABLES `serial` WRITE;
/*!40000 ALTER TABLE `serial` DISABLE KEYS */;
/*!40000 ALTER TABLE `serial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `setting` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `setting_value` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`setting_id`) USING BTREE,
  UNIQUE KEY `setting_name` (`setting_name`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setting`
--

LOCK TABLES `setting` WRITE;
/*!40000 ALTER TABLE `setting` DISABLE KEYS */;
INSERT INTO `setting` VALUES (1,'library_name','s:7:\"Setiadi\";'),(2,'library_subname','s:22:\"Open Source ETD System\";'),(5,'default_lang','s:2:\"id\";'),(6,'opac_result_num','s:2:\"20\";'),(7,'enable_promote_titles','s:1:\"0\";'),(8,'quick_return','b:1;'),(9,'allow_loan_date_change','b:0;'),(10,'loan_limit_override','b:0;'),(11,'enable_xml_detail','s:1:\"1\";'),(12,'enable_xml_result','s:1:\"1\";'),(13,'allow_file_download','s:1:\"1\";'),(14,'session_timeout','s:4:\"7200\";'),(15,'circulation_receipt','b:0;'),(16,'barcode_encoding','s:4:\"128B\";'),(17,'ignore_holidays_fine_calc','b:0;'),(18,'spellchecker_enabled','b:0;'),(19,'ori','a:2:{s:5:\"theme\";s:7:\"default\";s:3:\"css\";s:32:\"admin_template/default/style.css\"'),(20,'setiadi_shortcut_1',''),(21,'recaptcha','a:2:{s:3:\"smc\";i:0;s:6:\"member\";i:0;}');
/*!40000 ALTER TABLE `setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock_take`
--

DROP TABLE IF EXISTS `stock_take`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock_take` (
  `stock_take_id` int(11) NOT NULL AUTO_INCREMENT,
  `stock_take_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime DEFAULT NULL,
  `init_user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `total_item_stock_taked` int(11) DEFAULT NULL,
  `total_item_lost` int(11) DEFAULT NULL,
  `total_item_exists` int(11) DEFAULT '0',
  `total_item_loan` int(11) DEFAULT NULL,
  `stock_take_users` mediumtext COLLATE utf8_unicode_ci,
  `is_active` int(11) NOT NULL DEFAULT '0',
  `report_file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`stock_take_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_take`
--

LOCK TABLES `stock_take` WRITE;
/*!40000 ALTER TABLE `stock_take` DISABLE KEYS */;
/*!40000 ALTER TABLE `stock_take` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock_take_item`
--

DROP TABLE IF EXISTS `stock_take_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock_take_item` (
  `stock_take_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gmd_name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `classification` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `coll_type_name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `call_number` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('e','m','u','l') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'm',
  `checked_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_update` datetime DEFAULT NULL,
  PRIMARY KEY (`stock_take_id`,`item_id`) USING BTREE,
  UNIQUE KEY `item_code` (`item_code`) USING BTREE,
  KEY `status` (`status`) USING BTREE,
  KEY `item_properties_idx` (`gmd_name`,`classification`,`coll_type_name`,`location`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_take_item`
--

LOCK TABLES `stock_take_item` WRITE;
/*!40000 ALTER TABLE `stock_take_item` DISABLE KEYS */;
/*!40000 ALTER TABLE `stock_take_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_log`
--

DROP TABLE IF EXISTS `system_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `log_type` enum('staff','member','system') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'staff',
  `id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `log_location` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `log_msg` text COLLATE utf8_unicode_ci NOT NULL,
  `log_date` datetime NOT NULL,
  PRIMARY KEY (`log_id`) USING BTREE,
  KEY `log_type` (`log_type`) USING BTREE,
  KEY `id` (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_log`
--

LOCK TABLES `system_log` WRITE;
/*!40000 ALTER TABLE `system_log` DISABLE KEYS */;
INSERT INTO `system_log` VALUES (1,'','1','User','Update profile admin success','2026-08-30 21:03:56'),(2,'','1','Backup','Yolis access backup ','2026-08-31 21:15:34'),(3,'','1','User','Add user success','2026-08-31 21:31:04'),(4,'','1','Backup','Yolis access backup ','2026-09-01 06:18:11'),(5,'','1','Backup','Yolis trying backup ','2026-09-01 06:18:17');
/*!40000 ALTER TABLE `system_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `realname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `passwd` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_type` smallint(6) DEFAULT NULL,
  `user_image` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `social_media` text COLLATE utf8_unicode_ci,
  `last_login` datetime DEFAULT NULL,
  `last_login_ip` char(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `groups` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `input_date` date DEFAULT NULL,
  `last_update` date DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE,
  UNIQUE KEY `username` (`username`) USING BTREE,
  KEY `realname` (`realname`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','Yolis','$2y$10$71z2MbioUnHclXtl8N4W0uFazlOgXBNoQSoGdxIn9HMb7yZ1Sm9pG','julianusmitankesik57@gmail.com',2,NULL,'a:6:{s:2:\"fb\";s:0:\"\";s:2:\"tw\";s:0:\"\";s:2:\"li\";s:0:\"\";s:2:\"rd\";s:0:\"\";s:2:\"yt\";s:0:\"\";s:2:\"bl\";s:0:\"\";}','2020-09-12 22:34:52','125.160.113.2','a:1:{i:0;s:1:\"1\";}','2017-08-16','2026-08-30'),(2,'YL','YOLIS','$2y$10$Cip8pbgSvbfFgXdXbk14COgfh6SWEgk8mh2R746Wqq06SqrrgARwS','julianusmitankesik57@gmail.com',1,'user_YL-20260831213103.jpg','a:9:{s:2:\"fb\";s:0:\"\";s:2:\"tw\";s:0:\"\";s:2:\"li\";s:0:\"\";s:2:\"rd\";s:0:\"\";s:2:\"pn\";s:0:\"\";s:2:\"gp\";s:0:\"\";s:2:\"yt\";s:0:\"\";s:2:\"bl\";s:0:\"\";s:2:\"ym\";s:0:\"\";}',NULL,NULL,'a:1:{i:0;s:1:\"2\";}','2026-08-31','2026-08-31');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_group`
--

DROP TABLE IF EXISTS `user_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_group` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `input_date` date DEFAULT NULL,
  `last_update` date DEFAULT NULL,
  PRIMARY KEY (`group_id`) USING BTREE,
  UNIQUE KEY `group_name` (`group_name`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_group`
--

LOCK TABLES `user_group` WRITE;
/*!40000 ALTER TABLE `user_group` DISABLE KEYS */;
INSERT INTO `user_group` VALUES (1,'Administrator','2017-08-16','2017-08-16'),(2,'admin','2017-11-12','2017-11-12'),(3,'Operator','2020-05-15','2020-05-15'),(4,'User','2020-05-15','2020-05-15');
/*!40000 ALTER TABLE `user_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `visitor_count`
--

DROP TABLE IF EXISTS `visitor_count`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `visitor_count` (
  `visitor_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `institution` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `checkin_date` datetime NOT NULL,
  PRIMARY KEY (`visitor_id`) USING BTREE,
  KEY `member_id` (`member_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visitor_count`
--

LOCK TABLES `visitor_count` WRITE;
/*!40000 ALTER TABLE `visitor_count` DISABLE KEYS */;
/*!40000 ALTER TABLE `visitor_count` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-09-01  6:18:20
