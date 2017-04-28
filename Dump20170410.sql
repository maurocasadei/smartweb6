CREATE DATABASE  IF NOT EXISTS `smartweb6` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `smartweb6`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: localhost    Database: smartweb6
-- ------------------------------------------------------
-- Server version	5.6.19

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `adm_IDAdmin` int(11) NOT NULL AUTO_INCREMENT,
  `adm_username` varchar(20) DEFAULT NULL,
  `adm_password` varchar(32) DEFAULT NULL,
  `adm_livello` char(1) DEFAULT NULL,
  `adm_modificatoIl` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`adm_IDAdmin`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (24,'ssoftware','b134860b473ea4a20f923b7b990f34d5','A','2017-04-09 19:56:34'),(25,'test','e358efa489f58062f10dd7316b65649e','A','2017-03-05 13:42:37'),(26,'guest','dbd65784717c867e8993450bf915aa2f','A','2017-03-11 21:41:55'),(27,'ddd','d41d8cd98f00b204e9800998ecf8427e','N','2017-03-06 20:47:42');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_data`
--

DROP TABLE IF EXISTS `admin_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_data` (
  `adm_IDAdmindata` bigint(20) NOT NULL AUTO_INCREMENT,
  `adm_IDAdmin` int(11) NOT NULL,
  `adm_language` varchar(2) DEFAULT NULL,
  `adm_descrizione` varchar(200) DEFAULT NULL,
  `adm_modificatoIl` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `adm_ruolo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`adm_IDAdmindata`),
  UNIQUE KEY `KeyLanguage` (`adm_language`,`adm_IDAdmin`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_data`
--

LOCK TABLES `admin_data` WRITE;
/*!40000 ALTER TABLE `admin_data` DISABLE KEYS */;
INSERT INTO `admin_data` VALUES (1,24,'it','<h2>titolo</h2>\r\n<p>test <strong>ita 2</strong></p>','2017-03-13 14:01:48','rita 2 222 aaaa'),(2,24,'en','<p>test 2</p>','2017-03-06 20:51:20','reg 2'),(3,24,'fr','<p>dd fra fra</p>','2017-03-06 20:51:20','a333 bb fra'),(4,26,'it','<p>ita</p>','2017-03-06 22:44:09',''),(5,27,'it','','2017-03-06 20:47:42',''),(6,26,'en','','2017-03-06 22:44:09',''),(7,26,'fr','','2017-03-11 21:41:55','');
/*!40000 ALTER TABLE `admin_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `album`
--

DROP TABLE IF EXISTS `album`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `album` (
  `al_IDAlbum` bigint(20) NOT NULL AUTO_INCREMENT,
  `al_immagine` longtext,
  `al_ordine` bigint(20) DEFAULT NULL,
  `al_modificatoIl` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`al_IDAlbum`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `album`
--

LOCK TABLES `album` WRITE;
/*!40000 ALTER TABLE `album` DISABLE KEYS */;
INSERT INTO `album` VALUES (1,'immagini/album/thumb/imgslider1.jpg',1,'2017-03-19 17:03:54'),(2,'immagini/album/thumb/Depositphotos_1041673_m-2015.jpg',2,'2017-03-19 15:58:04');
/*!40000 ALTER TABLE `album` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `album_data`
--

DROP TABLE IF EXISTS `album_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `album_data` (
  `al_IDAlbumdata` bigint(20) NOT NULL AUTO_INCREMENT,
  `al_IDAlbum` bigint(20) NOT NULL,
  `al_language` varchar(2) NOT NULL,
  `al_nome` varchar(255) DEFAULT NULL,
  `al_description` longtext,
  `al_testo` longtext,
  `al_modificatoIl` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`al_IDAlbumdata`),
  UNIQUE KEY `KeyLanguage` (`al_IDAlbum`,`al_language`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `album_data`
--

LOCK TABLES `album_data` WRITE;
/*!40000 ALTER TABLE `album_data` DISABLE KEYS */;
INSERT INTO `album_data` VALUES (1,1,'it','Album piada','Album Piada','<p>Album Piada Testo Ita</p>','2017-03-19 08:14:02'),(2,1,'en','','','','2017-03-18 16:45:16'),(3,1,'fr','','','','2017-03-18 16:45:16'),(4,2,'it','Foto NITAL','foto nital 2 desc','','2017-03-19 15:58:04'),(5,2,'en','','','','2017-03-19 15:58:04'),(6,2,'fr','','','','2017-03-19 15:58:04');
/*!40000 ALTER TABLE `album_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `albumfoto`
--

DROP TABLE IF EXISTS `albumfoto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `albumfoto` (
  `af_IDAlbumfoto` bigint(20) NOT NULL AUTO_INCREMENT,
  `af_IDAlbum` bigint(20) NOT NULL,
  `af_immagine` longtext,
  `af_ordine` bigint(20) DEFAULT NULL,
  `af_modificatoIl` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`af_IDAlbumfoto`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `albumfoto`
--

LOCK TABLES `albumfoto` WRITE;
/*!40000 ALTER TABLE `albumfoto` DISABLE KEYS */;
INSERT INTO `albumfoto` VALUES (2,1,'immagini/album/thumb/AdobeStock_116508834.jpeg',2,'2017-04-08 17:44:52'),(5,1,'immagini/album/thumb/30113004_m.jpg',3,'2017-03-19 13:31:28'),(6,2,'immagini/album/thumb/cucina.jpg',1,'2017-03-19 15:58:52'),(7,2,'immagini/album/thumb/30113004_m.jpg',2,'2017-03-19 15:59:07'),(8,2,'immagini/album/thumb/18654211_s.jpg',3,'2017-03-19 15:59:32'),(9,1,NULL,2,'2017-04-09 06:24:35');
/*!40000 ALTER TABLE `albumfoto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `albumfoto_data`
--

DROP TABLE IF EXISTS `albumfoto_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `albumfoto_data` (
  `af_IDAlbumfotodata` bigint(20) NOT NULL AUTO_INCREMENT,
  `af_IDAlbumfoto` bigint(20) NOT NULL,
  `af_language` varchar(2) NOT NULL,
  `af_nome` varchar(255) DEFAULT NULL,
  `af_modificatoIl` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`af_IDAlbumfotodata`),
  UNIQUE KEY `KeyLanguage` (`af_IDAlbumfoto`,`af_language`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `albumfoto_data`
--

LOCK TABLES `albumfoto_data` WRITE;
/*!40000 ALTER TABLE `albumfoto_data` DISABLE KEYS */;
INSERT INTO `albumfoto_data` VALUES (4,2,'it','ita foto 1111','2017-04-08 14:59:17'),(5,2,'en','d foto 21','2017-04-08 14:59:04'),(6,2,'fr','','2017-03-19 13:20:57'),(13,5,'it','fita','2017-03-19 13:31:28'),(14,5,'en','feng','2017-03-19 13:31:28'),(15,5,'fr','ffra','2017-03-19 13:31:28'),(16,6,'it','','2017-03-19 15:58:52'),(17,6,'en','','2017-03-19 15:58:52'),(18,6,'fr','','2017-03-19 15:58:52'),(19,7,'it','','2017-03-19 15:59:07'),(20,7,'en','','2017-03-19 15:59:07'),(21,7,'fr','','2017-03-19 15:59:07'),(22,8,'it','foto n3','2017-03-19 15:59:32'),(23,8,'en','','2017-03-19 15:59:32'),(24,8,'fr','','2017-03-19 15:59:32'),(25,9,'it','ita 11ss22','2017-04-09 06:24:35'),(26,9,'en','','2017-04-09 06:24:35'),(27,9,'fr','','2017-04-09 06:24:35');
/*!40000 ALTER TABLE `albumfoto_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorie` (
  `ca_IDCategoria` bigint(20) NOT NULL AUTO_INCREMENT,
  `ca_IDMacroCategoria` bigint(20) NOT NULL,
  `ca_immagine` longtext,
  `ca_ordine` bigint(20) DEFAULT NULL,
  `ca_modificatoIl` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ca_IDCategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie`
--

LOCK TABLES `categorie` WRITE;
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorie_data`
--

DROP TABLE IF EXISTS `categorie_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorie_data` (
  `ca_IDCategoriadata` bigint(20) NOT NULL AUTO_INCREMENT,
  `ca_IDCategoria` bigint(20) NOT NULL,
  `ca_language` varchar(2) NOT NULL,
  `ca_nome` varchar(255) DEFAULT NULL,
  `ca_description` longtext,
  `ca_testo` longtext,
  `ca_modificatoIl` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ca_IDCategoriadata`),
  UNIQUE KEY `KeyLanguage` (`ca_IDCategoria`,`ca_language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie_data`
--

LOCK TABLES `categorie_data` WRITE;
/*!40000 ALTER TABLE `categorie_data` DISABLE KEYS */;
/*!40000 ALTER TABLE `categorie_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contenuto`
--

DROP TABLE IF EXISTS `contenuto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contenuto` (
  `cn_IDContenuto` bigint(20) NOT NULL AUTO_INCREMENT,
  `cn_modificatoIl` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cn_visibile` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`cn_IDContenuto`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contenuto`
--

LOCK TABLES `contenuto` WRITE;
/*!40000 ALTER TABLE `contenuto` DISABLE KEYS */;
INSERT INTO `contenuto` VALUES (1,'2017-03-16 07:46:33',1),(2,'2017-03-16 07:46:33',1),(3,'2017-03-16 17:06:32',0),(4,'2017-03-17 16:05:52',1);
/*!40000 ALTER TABLE `contenuto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contenuto_data`
--

DROP TABLE IF EXISTS `contenuto_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contenuto_data` (
  `cn_IDContenutodata` bigint(20) NOT NULL AUTO_INCREMENT,
  `cn_IDContenuto` bigint(20) NOT NULL,
  `cn_language` varchar(2) DEFAULT NULL,
  `cn_titolo` longtext,
  `cn_slug` varchar(255) DEFAULT NULL,
  `cn_testo` longtext,
  `cn_keywords` longtext,
  `cn_description` longtext,
  `cn_modificatoIl` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cn_IDContenutodata`),
  UNIQUE KEY `KeyLanguage` (`cn_IDContenuto`,`cn_language`),
  KEY `slug` (`cn_slug`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contenuto_data`
--

LOCK TABLES `contenuto_data` WRITE;
/*!40000 ALTER TABLE `contenuto_data` DISABLE KEYS */;
INSERT INTO `contenuto_data` VALUES (1,0,'en','','','<div id=\"keditor-content-area-1489766467015\" class=\"keditor-content-area ui-droppable ui-sortable\"></div>','','','2017-03-17 16:03:48'),(2,1,'fr','','','<div id=\"keditor-content-area-1489854088334\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489769582701\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489684034806\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489683927947\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489648617866\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489413746864\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489354726626\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489354666945\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489325763135\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489267763881\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489267663159\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489267030097\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489266959640\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489265356990\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489265242108\" class=\"keditor-content-area ui-droppable ui-sortable\"></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div>','','','2017-03-18 16:21:31'),(3,0,'fr','','','<div id=\"keditor-content-area-1489766467023\" class=\"keditor-content-area ui-droppable ui-sortable\"></div>','','','2017-03-17 16:03:48'),(4,1,'it','Chi Siamo','chi-siamo','<div id=\"keditor-content-area-1489854088320\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489769582649\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489684034745\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489683927868\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489648617850\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489413746845\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489354726548\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489354666885\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489325763123\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489267763843\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489267663119\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489267030056\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489266959589\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489265356981\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489265242099\" class=\"keditor-content-area ui-droppable ui-sortable\"><section class=\"keditor-container keditor-initialized-container\" id=\"keditor-container-1489265246203\">   <section class=\"keditor-container-inner\"><div class=\"row\">\r\n        <div class=\"col-sm-12 keditor-container-content ui-droppable ui-sortable\" data-type=\"container-content\" id=\"keditor-container-content-1489265246203\">\r\n        <section class=\"keditor-component keditor-initialized-component\" data-type=\"component-text\" id=\"keditor-component-1489265262355\">   <section class=\"keditor-component-content cke_editable cke_editable_inline cke_contents_ltr cke_show_borders\" id=\"keditor-component-content-1489265262355\" tabindex=\"0\" spellcheck=\"false\" role=\"textbox\" aria-label=\"Rich Text Editor, keditor-component-content-1489265262355\" aria-describedby=\"cke_106\" title=\"Rich Text Editor, keditor-component-content-1489265262355\" style=\"position: relative;\" contenteditable=\"true\"><div class=\"row\"><div class=\"col-md-6 text-center\"><img data-cke-saved-src=\"assets/composer/snippets/default/img/sydney_australia_squared.jpg\" src=\"assets/composer/snippets/default/img/sydney_australia_squared.jpg\" style=\"display:inline-block\" class=\"img-circle img-responsive\"></div><div class=\"col-md-6\"><h3>Lorem ipsum</h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi molestias eius quaerat, adipisci ratione aliquid eum explicabo illum temporibus? Optio facilis eveniet quam, impedit eos architecto sequi dolorum illo facere, consequatur sit voluptatibus sunt eius ad officia corrupti modi quia minima voluptas vero. Minus, maxime!</p></div></div></section><div class=\"keditor-toolbar keditor-toolbar-component\">   <a href=\"#\" class=\"btn-component-reposition\"><i class=\"fa fa-arrows\"></i></a>   <a href=\"#\" class=\"btn-component-duplicate\"><i class=\"fa fa-files-o\"></i></a>   <a href=\"#\" class=\"btn-component-delete\"><i class=\"fa fa-times\"></i></a></div></section></div>\r\n    </div></section><div class=\"keditor-toolbar keditor-toolbar-container\">   <a href=\"#\" class=\"btn-container-reposition\"><i class=\"fa fa-sort\"></i></a>   <a href=\"#\" class=\"btn-container-duplicate\"><i class=\"fa fa-files-o\"></i></a>   <a href=\"#\" class=\"btn-container-delete\"><i class=\"fa fa-times\"></i></a></div></section></div><section class=\"keditor-container keditor-initialized-container showed-keditor-toolbar\" id=\"keditor-container-1489265391212\">   <section class=\"keditor-container-inner\"><div class=\"row\">\r\n        <div class=\"col-sm-4 keditor-container-content ui-droppable ui-sortable\" data-type=\"container-content\" id=\"keditor-container-content-1489265391212\">\r\n        <div class=\"tooltip fade left in\" role=\"tooltip\" id=\"tooltip591574\" style=\"top: 7.95488px; left: 24.3715px; display: block;\"><div class=\"tooltip-arrow\" style=\"top: 47.8261%;\"></div><div class=\"tooltip-inner\">Photo</div></div><section class=\"keditor-component keditor-initialized-component showed-keditor-toolbar\" data-type=\"component-photo\" id=\"keditor-component-1489265404899\">   <section class=\"keditor-component-content\" id=\"keditor-component-content-1489265404899\"><div class=\"photo-panel\">\r\n        <img src=\"http://localhost:81/smartweb6/immagini//source/imgslider1.jpg\" style=\"display: inline-block;\" data-pin-nopin=\"true\" height=\"\" width=\"100%\">\r\n    </div></section><div class=\"keditor-toolbar keditor-toolbar-component\">   <a href=\"#\" class=\"btn-component-reposition\"><i class=\"fa fa-arrows\"></i></a><a href=\"#\" class=\"btn-component-setting\"><i class=\"fa fa-cog\"></i></a>   <a href=\"#\" class=\"btn-component-duplicate\"><i class=\"fa fa-files-o\"></i></a>   <a href=\"#\" class=\"btn-component-delete\"><i class=\"fa fa-times\"></i></a></div></section></div>\r\n        <div class=\"col-sm-4 keditor-container-content ui-droppable ui-sortable\" data-type=\"container-content\" id=\"keditor-container-content-1489265391216\">\r\n        <section class=\"keditor-component keditor-initialized-component\" data-type=\"component-video\" id=\"keditor-component-1489265401182\">   <section class=\"keditor-component-content\" id=\"keditor-component-content-1489265401182\"><div class=\"video-wrapper\">\r\n        <video controls=\"\" style=\"background: #222;\" height=\"180\" width=\"320\">\r\n            <source src=\"http://www.w3schools.com/html/mov_bbb.mp4\" type=\"video/mp4\">\r\n            <source src=\"http://www.w3schools.com/html/mov_bbb.ogg\" type=\"video/ogg\">\r\n        </video>\r\n    </div></section><div class=\"keditor-toolbar keditor-toolbar-component\">   <a href=\"#\" class=\"btn-component-reposition\"><i class=\"fa fa-arrows\"></i></a><a href=\"#\" class=\"btn-component-setting\"><i class=\"fa fa-cog\"></i></a>   <a href=\"#\" class=\"btn-component-duplicate\"><i class=\"fa fa-files-o\"></i></a>   <a href=\"#\" class=\"btn-component-delete\"><i class=\"fa fa-times\"></i></a></div></section></div>\r\n        <div class=\"col-sm-4 keditor-container-content ui-droppable ui-sortable\" data-type=\"container-content\" id=\"keditor-container-content-1489265391217\">\r\n        <section class=\"keditor-component keditor-initialized-component\" data-type=\"component-photo\" id=\"keditor-component-1489265394475\">   <section class=\"keditor-component-content\" id=\"keditor-component-content-1489265394475\"><div class=\"photo-panel\">\r\n        <img src=\"http://localhost:81/smartweb6/immagini//source/banner2.jpg\" style=\"display: inline-block;\" height=\"\" width=\"100%\">\r\n    </div></section><div class=\"keditor-toolbar keditor-toolbar-component\">   <a href=\"#\" class=\"btn-component-reposition\"><i class=\"fa fa-arrows\"></i></a><a href=\"#\" class=\"btn-component-setting\"><i class=\"fa fa-cog\"></i></a>   <a href=\"#\" class=\"btn-component-duplicate\"><i class=\"fa fa-files-o\"></i></a>   <a href=\"#\" class=\"btn-component-delete\"><i class=\"fa fa-times\"></i></a></div></section></div>\r\n    </div></section><div class=\"keditor-toolbar keditor-toolbar-container\">   <a href=\"#\" class=\"btn-container-reposition\"><i class=\"fa fa-sort\"></i></a>   <a href=\"#\" class=\"btn-container-duplicate\"><i class=\"fa fa-files-o\"></i></a>   <a href=\"#\" class=\"btn-container-delete\"><i class=\"fa fa-times\"></i></a></div></section></div><div class=\"tooltip fade left in\" role=\"tooltip\" id=\"tooltip724159\" style=\"top: 542.817px; left: 312.5px; display: block;\"><div class=\"tooltip-arrow\" style=\"top: 50%;\"></div><div class=\"tooltip-inner\">2 columns (50% - 50%)</div></div><section class=\"keditor-container keditor-initialized-container\" id=\"keditor-container-1489266978860\">   <section class=\"keditor-container-inner\"><div class=\"row\">\r\n        <div class=\"col-sm-6 keditor-container-content ui-droppable ui-sortable\" data-type=\"container-content\" id=\"keditor-container-content-1489266978861\">\r\n        </div>\r\n        <div class=\"col-sm-6 keditor-container-content ui-droppable ui-sortable\" data-type=\"container-content\" id=\"keditor-container-content-1489266978868\">\r\n        </div>\r\n    </div></section><div class=\"keditor-toolbar keditor-toolbar-container\">   <a href=\"#\" class=\"btn-container-reposition\"><i class=\"fa fa-sort\"></i></a>   <a href=\"#\" class=\"btn-container-duplicate\"><i class=\"fa fa-files-o\"></i></a>   <a href=\"#\" class=\"btn-container-delete\"><i class=\"fa fa-times\"></i></a></div></section><section class=\"keditor-container keditor-initialized-container\" id=\"keditor-container-1489266992924\">   <section class=\"keditor-container-inner\"><div class=\"row\">\r\n        <div class=\"col-sm-6 keditor-container-content ui-droppable ui-sortable\" data-type=\"container-content\" id=\"keditor-container-content-1489266992924\">\r\n        </div>\r\n        <div class=\"col-sm-6 keditor-container-content ui-droppable ui-sortable\" data-type=\"container-content\" id=\"keditor-container-content-1489266992930\">\r\n        <section class=\"keditor-component keditor-initialized-component\" data-type=\"component-text\" id=\"keditor-component-1489266996997\">   <section class=\"keditor-component-content cke_editable cke_editable_inline cke_contents_ltr cke_show_borders\" id=\"keditor-component-content-1489266996998\" tabindex=\"0\" spellcheck=\"false\" role=\"textbox\" aria-label=\"Rich Text Editor, keditor-component-content-1489266996998\" aria-describedby=\"cke_192\" title=\"Rich Text Editor, keditor-component-content-1489266996998\" style=\"position: relative;\" contenteditable=\"true\"><div class=\"page-header\"><h1><strong>Cra</strong><strong>s justo odio</strong> <small>Donec id elit non mi</small></h1><p><em>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</em></p></div></section><div class=\"keditor-toolbar keditor-toolbar-component\">   <a href=\"#\" class=\"btn-component-reposition\"><i class=\"fa fa-arrows\"></i></a>   <a href=\"#\" class=\"btn-component-duplicate\"><i class=\"fa fa-files-o\"></i></a>   <a href=\"#\" class=\"btn-component-delete\"><i class=\"fa fa-times\"></i></a></div></section><div class=\"tooltip fade left in\" role=\"tooltip\" id=\"tooltip827659\" style=\"top: 17.2667px; left: 40.5px; display: block;\"><div class=\"tooltip-arrow\" style=\"top: 50%;\"></div><div class=\"tooltip-inner\">Jumbotron</div></div></div>\r\n    </div></section><div class=\"keditor-toolbar keditor-toolbar-container\">   <a href=\"#\" class=\"btn-container-reposition\"><i class=\"fa fa-sort\"></i></a>   <a href=\"#\" class=\"btn-container-duplicate\"><i class=\"fa fa-files-o\"></i></a>   <a href=\"#\" class=\"btn-container-delete\"><i class=\"fa fa-times\"></i></a></div></section></div></div></div><section class=\"keditor-container keditor-initialized-container\" id=\"keditor-container-1489267799597\">   <section class=\"keditor-container-inner\"><div class=\"row\">\r\n        <div class=\"col-sm-4 keditor-container-content ui-droppable ui-sortable\" data-type=\"container-content\" id=\"keditor-container-content-1489267799597\">\r\n        </div>\r\n        <div class=\"col-sm-4 keditor-container-content ui-droppable ui-sortable\" data-type=\"container-content\" id=\"keditor-container-content-1489267799603\">\r\n        </div>\r\n        <div class=\"col-sm-4 keditor-container-content ui-droppable ui-sortable\" data-type=\"container-content\" id=\"keditor-container-content-1489267799607\">\r\n        </div>\r\n    </div></section><div class=\"keditor-toolbar keditor-toolbar-container\">   <a href=\"#\" class=\"btn-container-reposition\"><i class=\"fa fa-sort\"></i></a>   <a href=\"#\" class=\"btn-container-duplicate\"><i class=\"fa fa-files-o\"></i></a>   <a href=\"#\" class=\"btn-container-delete\"><i class=\"fa fa-times\"></i></a></div></section><section class=\"keditor-container keditor-initialized-container\" id=\"keditor-container-1489267805128\">   <section class=\"keditor-container-inner\"><div class=\"row\">\r\n        <div class=\"col-sm-3 keditor-container-content ui-droppable ui-sortable\" data-type=\"container-content\" id=\"keditor-container-content-1489267805128\">\r\n        </div>\r\n        <div class=\"col-sm-3 keditor-container-content ui-droppable ui-sortable\" data-type=\"container-content\" id=\"keditor-container-content-1489267805134\">\r\n        </div>\r\n        <div class=\"col-sm-3 keditor-container-content ui-droppable ui-sortable\" data-type=\"container-content\" id=\"keditor-container-content-1489267805138\">\r\n        <section class=\"keditor-component keditor-initialized-component\" data-type=\"component-text\" id=\"keditor-component-1489267810685\">   <section class=\"keditor-component-content cke_editable cke_editable_inline cke_contents_ltr cke_show_borders\" id=\"keditor-component-content-1489267810685\" tabindex=\"0\" spellcheck=\"false\" role=\"textbox\" aria-label=\"Rich Text Editor, keditor-component-content-1489267810685\" aria-describedby=\"cke_278\" title=\"Rich Text Editor, keditor-component-content-1489267810685\" style=\"position: relative;\" contenteditable=\"true\"><div class=\"jumbotron\"><h1>Hello, world!</h1><p>This is a simple hero unit</p><p><a data-cke-saved-href=\"#\" href=\"#\" class=\"btn btn-primary btn-lg\">Learn more</a></p></div><div id=\"keditor-dynamic-element-1489267810686\"><h1>It\'s dynamic content</h1></div></section><div class=\"keditor-toolbar keditor-toolbar-component\">   <a href=\"#\" class=\"btn-component-reposition\"><i class=\"fa fa-arrows\"></i></a>   <a href=\"#\" class=\"btn-component-duplicate\"><i class=\"fa fa-files-o\"></i></a>   <a href=\"#\" class=\"btn-component-delete\"><i class=\"fa fa-times\"></i></a></div></section></div>\r\n        <div class=\"col-sm-3 keditor-container-content ui-droppable ui-sortable\" data-type=\"container-content\" id=\"keditor-container-content-1489267805142\">\r\n        </div>\r\n    </div></section><div class=\"keditor-toolbar keditor-toolbar-container\">   <a href=\"#\" class=\"btn-container-reposition\"><i class=\"fa fa-sort\"></i></a>   <a href=\"#\" class=\"btn-container-duplicate\"><i class=\"fa fa-files-o\"></i></a>   <a href=\"#\" class=\"btn-container-delete\"><i class=\"fa fa-times\"></i></a></div></section><section class=\"keditor-container keditor-initialized-container\" id=\"keditor-container-1489267795806\">   <section class=\"keditor-container-inner\"><div class=\"row\">\r\n        <div class=\"col-sm-3 keditor-container-content ui-droppable ui-sortable\" data-type=\"container-content\" id=\"keditor-container-content-1489267795806\">\r\n        </div>\r\n        <div class=\"col-sm-6 keditor-container-content ui-droppable ui-sortable\" data-type=\"container-content\" id=\"keditor-container-content-1489267795813\">\r\n        </div>\r\n        <div class=\"col-sm-3 keditor-container-content ui-droppable ui-sortable\" data-type=\"container-content\" id=\"keditor-container-content-1489267795819\">\r\n        </div>\r\n    </div></section><div class=\"keditor-toolbar keditor-toolbar-container\">   <a href=\"#\" class=\"btn-container-reposition\"><i class=\"fa fa-sort\"></i></a>   <a href=\"#\" class=\"btn-container-duplicate\"><i class=\"fa fa-files-o\"></i></a>   <a href=\"#\" class=\"btn-container-delete\"><i class=\"fa fa-times\"></i></a></div></section><div class=\"tooltip fade left in\" role=\"tooltip\" id=\"tooltip323847\" style=\"top: 1479.82px; left: 611.5px; display: block;\"><div class=\"tooltip-arrow\" style=\"top: 50%;\"></div><div class=\"tooltip-inner\">3 columns (33% - 33% - 33%)</div></div></div><section class=\"keditor-container keditor-initialized-container\" id=\"keditor-container-1489325772557\">   <section class=\"keditor-container-inner\"><div class=\"row\">\r\n        <div class=\"col-sm-6 keditor-container-content ui-droppable ui-sortable\" data-type=\"container-content\" id=\"keditor-container-content-1489325772557\">\r\n        </div>\r\n        <div class=\"col-sm-6 keditor-container-content ui-droppable ui-sortable\" data-type=\"container-content\" id=\"keditor-container-content-1489325772560\">\r\n        <section class=\"keditor-component keditor-initialized-component\" data-type=\"component-text\" id=\"keditor-component-1489325800057\">   <section class=\"keditor-component-content cke_editable cke_editable_inline cke_contents_ltr cke_show_borders\" id=\"keditor-component-content-1489325800057\" tabindex=\"0\" spellcheck=\"false\" role=\"textbox\" aria-label=\"Rich Text Editor, keditor-component-content-1489325800057\" aria-describedby=\"cke_364\" title=\"Rich Text Editor, keditor-component-content-1489325800057\" style=\"position: relative;\" contenteditable=\"true\"><div class=\"jumbotron\"><h1>Hello, world!</h1><p>This is a simple hero unit</p><p><a data-cke-saved-href=\"#\" href=\"#\" class=\"btn btn-primary btn-lg\">Learn more</a></p></div><div id=\"keditor-dynamic-element-1489325800061\"><h1>It\'s dynamic content</h1></div></section><div class=\"keditor-toolbar keditor-toolbar-component\">   <a href=\"#\" class=\"btn-component-reposition\"><i class=\"fa fa-arrows\"></i></a>   <a href=\"#\" class=\"btn-component-duplicate\"><i class=\"fa fa-files-o\"></i></a>   <a href=\"#\" class=\"btn-component-delete\"><i class=\"fa fa-times\"></i></a></div></section></div>\r\n    </div></section><div class=\"keditor-toolbar keditor-toolbar-container\">   <a href=\"#\" class=\"btn-container-reposition\"><i class=\"fa fa-sort\"></i></a>   <a href=\"#\" class=\"btn-container-duplicate\"><i class=\"fa fa-files-o\"></i></a>   <a href=\"#\" class=\"btn-container-delete\"><i class=\"fa fa-times\"></i></a></div></section><section class=\"keditor-container keditor-initialized-container\" id=\"keditor-container-1489325778934\">   <section class=\"keditor-container-inner\"><div class=\"row\">\r\n        <div class=\"col-sm-12 keditor-container-content ui-droppable ui-sortable\" data-type=\"container-content\" id=\"keditor-container-content-1489325778934\">\r\n        </div>\r\n    </div></section><div class=\"keditor-toolbar keditor-toolbar-container\">   <a href=\"#\" class=\"btn-container-reposition\"><i class=\"fa fa-sort\"></i></a>   <a href=\"#\" class=\"btn-container-duplicate\"><i class=\"fa fa-files-o\"></i></a>   <a href=\"#\" class=\"btn-container-delete\"><i class=\"fa fa-times\"></i></a></div></section><div class=\"tooltip fade left in\" role=\"tooltip\" id=\"tooltip579377\" style=\"top: 2031.28px; left: 566.483px; display: block;\"><div class=\"tooltip-arrow\" style=\"top: 50%;\"></div><div class=\"tooltip-inner\">1 column</div></div></div></div></div></div></div></div></div><div class=\"tooltip fade left in\" role=\"tooltip\" id=\"tooltip217894\" style=\"top: 2373.82px; left: 106.5px; display: block;\"><div class=\"tooltip-arrow\" style=\"top: 50%;\"></div><div class=\"tooltip-inner\">2 columns (50% - 50%)</div></div><section class=\"keditor-container keditor-initialized-container\" id=\"keditor-container-1489769600895\">   <section class=\"keditor-container-inner\"><div class=\"row\">\r\n        <div class=\"col-sm-6 keditor-container-content ui-droppable ui-sortable\" data-type=\"container-content\" id=\"keditor-container-content-1489769600897\">\r\n        </div>\r\n        <div class=\"col-sm-6 keditor-container-content ui-droppable ui-sortable\" data-type=\"container-content\" id=\"keditor-container-content-1489769600904\">\r\n        </div>\r\n    </div></section><div class=\"keditor-toolbar keditor-toolbar-container\">   <a href=\"#\" class=\"btn-container-reposition\"><i class=\"fa fa-sort\"></i></a>   <a href=\"#\" class=\"btn-container-duplicate\"><i class=\"fa fa-files-o\"></i></a>   <a href=\"#\" class=\"btn-container-delete\"><i class=\"fa fa-times\"></i></a></div></section><section class=\"keditor-container keditor-initialized-container\" id=\"keditor-container-1489769675418\">   <section class=\"keditor-container-inner\"><div class=\"row\">\r\n        <div class=\"col-sm-12 keditor-container-content ui-droppable ui-sortable\" data-type=\"container-content\" id=\"keditor-container-content-1489769675418\">\r\n        </div>\r\n    </div></section><div class=\"keditor-toolbar keditor-toolbar-container\">   <a href=\"#\" class=\"btn-container-reposition\"><i class=\"fa fa-sort\"></i></a>   <a href=\"#\" class=\"btn-container-duplicate\"><i class=\"fa fa-files-o\"></i></a>   <a href=\"#\" class=\"btn-container-delete\"><i class=\"fa fa-times\"></i></a></div></section></div></div>','','','2017-03-18 16:21:31'),(5,1,'en','','','<div id=\"keditor-content-area-1489854088331\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489769582691\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489684034786\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489683927918\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489648617862\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489413746861\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489354726579\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489354666915\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489325763135\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489267763874\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489267663152\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489267030088\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489266959626\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489265356986\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489265242105\" class=\"keditor-content-area ui-droppable ui-sortable\"></div></div><section class=\"keditor-container keditor-initialized-container\" id=\"keditor-container-1489267013740\">   <section class=\"keditor-container-inner\"><div class=\"row\">\r\n        <div class=\"col-sm-6 keditor-container-content ui-droppable ui-sortable\" data-type=\"container-content\" id=\"keditor-container-content-1489267013740\">\r\n        </div>\r\n        <div class=\"col-sm-6 keditor-container-content ui-droppable ui-sortable\" data-type=\"container-content\" id=\"keditor-container-content-1489267013746\">\r\n        <section class=\"keditor-component keditor-initialized-component\" data-type=\"component-photo\" id=\"keditor-component-1489267017316\">   <section class=\"keditor-component-content\" id=\"keditor-component-content-1489267017316\"><div class=\"photo-panel\">\r\n        <img src=\"blob:http://localhost:81/47918630-2968-40a7-89f9-837b9e2a87d1\" style=\"display: inline-block;\" height=\"\" width=\"100%\">\r\n    </div></section><div class=\"keditor-toolbar keditor-toolbar-component\">   <a href=\"#\" class=\"btn-component-reposition\"><i class=\"fa fa-arrows\"></i></a><a href=\"#\" class=\"btn-component-setting\"><i class=\"fa fa-cog\"></i></a>   <a href=\"#\" class=\"btn-component-duplicate\"><i class=\"fa fa-files-o\"></i></a>   <a href=\"#\" class=\"btn-component-delete\"><i class=\"fa fa-times\"></i></a></div></section></div>\r\n    </div></section><div class=\"keditor-toolbar keditor-toolbar-container\">   <a href=\"#\" class=\"btn-container-reposition\"><i class=\"fa fa-sort\"></i></a>   <a href=\"#\" class=\"btn-container-duplicate\"><i class=\"fa fa-files-o\"></i></a>   <a href=\"#\" class=\"btn-container-delete\"><i class=\"fa fa-times\"></i></a></div></section></div></div></div></div></div></div></div></div></div></div></div></div></div>','','','2017-03-18 16:21:31'),(6,2,'it','certificazioni','certificazioni','<div id=\"keditor-content-area-1489683940881\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489682295175\" class=\"keditor-content-area ui-droppable ui-sortable\"></div></div>','','','2017-03-16 17:06:01'),(7,2,'en','','','<div id=\"keditor-content-area-1489683940916\" class=\"keditor-content-area ui-droppable ui-sortable\"></div>','','','2017-03-16 17:06:01'),(8,3,'it','Lista Notizie','news','<div id=\"keditor-content-area-1489684098423\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489684023150\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489683967200\" class=\"keditor-content-area ui-droppable ui-sortable\"></div></div></div>','','','2017-03-16 17:08:30'),(9,3,'en','','','<div id=\"keditor-content-area-1489684098448\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489684023181\" class=\"keditor-content-area ui-droppable ui-sortable\"></div></div>','','','2017-03-16 17:08:30'),(10,3,'fr','','','<div id=\"keditor-content-area-1489684098491\" class=\"keditor-content-area ui-droppable ui-sortable\"></div>','','','2017-03-16 17:08:30'),(11,4,'it','Pagina di Ale','pagina-di-ale','<div id=\"keditor-content-area-1489771689052\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489771329992\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489771283285\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489771220553\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489766467001\" class=\"keditor-content-area ui-droppable ui-sortable\"><section class=\"keditor-container keditor-initialized-container  \" id=\"keditor-container-1489766480689\">   <section class=\"keditor-container-inner\"><div class=\"row\"></div></section></section></div>					</div><section class=\"keditor-container keditor-initialized-container\" id=\"keditor-container-1489771291523\">   <section class=\"keditor-container-inner\"><div class=\"row\">\r\n        <div class=\"col-sm-6 keditor-container-content ui-droppable ui-sortable\" data-type=\"container-content\" id=\"keditor-container-content-1489771291524\">\r\n        <section class=\"keditor-component keditor-initialized-component\" data-type=\"component-text\" id=\"keditor-component-1489771294857\">   <section class=\"keditor-component-content cke_editable cke_editable_inline cke_contents_ltr cke_show_borders\" id=\"keditor-component-content-1489771294857\" tabindex=\"0\" spellcheck=\"false\" role=\"textbox\" aria-label=\"Rich Text Editor, keditor-component-content-1489771294857\" aria-describedby=\"cke_105\" style=\"position: relative;\" title=\"Rich Text Editor, keditor-component-content-1489771294857\" contenteditable=\"true\"><div class=\"jumbotron\"><h1>Hello, world!</h1><p>This is a simple hero unit</p><p><a data-cke-saved-href=\"#\" href=\"#\" class=\"btn btn-primary btn-lg\">Learn more</a></p></div><div id=\"keditor-dynamic-element-1489771294858\"><h1>It\'s dynamic content</h1></div></section><div class=\"keditor-toolbar keditor-toolbar-component\">   <a href=\"#\" class=\"btn-component-reposition\"><i class=\"fa fa-arrows\"></i></a>   <a href=\"#\" class=\"btn-component-duplicate\"><i class=\"fa fa-files-o\"></i></a>   <a href=\"#\" class=\"btn-component-delete\"><i class=\"fa fa-times\"></i></a></div></section></div>\r\n        <div class=\"col-sm-6 keditor-container-content ui-droppable ui-sortable\" data-type=\"container-content\" id=\"keditor-container-content-1489771291530\">\r\n        <section class=\"keditor-component keditor-initialized-component\" data-type=\"component-text\" id=\"keditor-component-1489771298700\">   <section class=\"keditor-component-content cke_editable cke_editable_inline cke_contents_ltr cke_show_borders\" id=\"keditor-component-content-1489771298700\" tabindex=\"0\" spellcheck=\"false\" role=\"textbox\" aria-label=\"Rich Text Editor, keditor-component-content-1489771298700\" aria-describedby=\"cke_190\" style=\"position: relative;\" title=\"Rich Text Editor, keditor-component-content-1489771298700\" contenteditable=\"true\"><div class=\"jumbotron\"><h1>Hello, world!</h1><p>This is a simple hero unit</p><p><a data-cke-saved-href=\"#\" href=\"#\" class=\"btn btn-primary btn-lg\">Learn more</a></p></div><div id=\"keditor-dynamic-element-1489771298701\"><h1>It\'s dynamic content</h1></div></section><div class=\"keditor-toolbar keditor-toolbar-component\">   <a href=\"#\" class=\"btn-component-reposition\"><i class=\"fa fa-arrows\"></i></a>   <a href=\"#\" class=\"btn-component-duplicate\"><i class=\"fa fa-files-o\"></i></a>   <a href=\"#\" class=\"btn-component-delete\"><i class=\"fa fa-times\"></i></a></div></section></div>\r\n    </div></section><div class=\"keditor-toolbar keditor-toolbar-container\">   <a href=\"#\" class=\"btn-container-reposition\"><i class=\"fa fa-sort\"></i></a>   <a href=\"#\" class=\"btn-container-duplicate\"><i class=\"fa fa-files-o\"></i></a>   <a href=\"#\" class=\"btn-container-delete\"><i class=\"fa fa-times\"></i></a></div></section></div><div class=\"tooltip fade left in\" role=\"tooltip\" id=\"tooltip353636\" style=\"top: 876.817px; left: 786.5px; display: block;\"><div class=\"tooltip-arrow\" style=\"top: 50%;\"></div><div class=\"tooltip-inner\">2 columns (33% - 67%)</div></div><section class=\"keditor-container keditor-initialized-container showed-keditor-toolbar\" id=\"keditor-container-1489771386421\">   <section class=\"keditor-container-inner\"><div class=\"row\">\r\n        <div class=\"col-sm-4 keditor-container-content ui-droppable ui-sortable\" data-type=\"container-content\" id=\"keditor-container-content-1489771386421\">\r\n        <section class=\"keditor-component keditor-initialized-component\" data-type=\"component-text\" id=\"keditor-component-1489771393004\">   <section class=\"keditor-component-content cke_editable cke_editable_inline cke_contents_ltr cke_show_borders\" id=\"keditor-component-content-1489771393004\" tabindex=\"0\" spellcheck=\"false\" role=\"textbox\" aria-label=\"Rich Text Editor, keditor-component-content-1489771393004\" aria-describedby=\"cke_275\" style=\"position: relative;\" title=\"Rich Text Editor, keditor-component-content-1489771393004\" contenteditable=\"true\"><div class=\"thumbnail\"><img data-cke-saved-src=\"assets/composer/snippets/default/img/somewhere_bangladesh.jpg\" src=\"assets/composer/snippets/default/img/somewhere_bangladesh.jpg\" style=\"width:100%\"><div class=\"caption\"><h3>Thumbnail label</h3><p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p><p><a data-cke-saved-href=\"#\" href=\"#\" class=\"btn btn-primary\">Button</a> <a data-cke-saved-href=\"#\" href=\"#\" class=\"btn btn-default\">Button</a></p></div></div></section><div class=\"keditor-toolbar keditor-toolbar-component\">   <a href=\"#\" class=\"btn-component-reposition\"><i class=\"fa fa-arrows\"></i></a>   <a href=\"#\" class=\"btn-component-duplicate\"><i class=\"fa fa-files-o\"></i></a>   <a href=\"#\" class=\"btn-component-delete\"><i class=\"fa fa-times\"></i></a></div></section></div>\r\n        <div class=\"col-sm-8 keditor-container-content ui-droppable ui-sortable\" data-type=\"container-content\" id=\"keditor-container-content-1489771386427\">\r\n        <section class=\"keditor-component keditor-initialized-component showed-keditor-toolbar\" data-type=\"component-text\" id=\"keditor-component-1489771397239\">   <section class=\"keditor-component-content cke_editable cke_editable_inline cke_contents_ltr cke_show_borders cke_focus\" id=\"keditor-component-content-1489771397239\" tabindex=\"0\" spellcheck=\"false\" role=\"textbox\" aria-label=\"Rich Text Editor, keditor-component-content-1489771397239\" aria-describedby=\"cke_360\" style=\"position: relative;\" title=\"Rich Text Editor, keditor-component-content-1489771397239\" contenteditable=\"true\"><div class=\"jumbotron\"><h1><strong>Hello</strong>, world!<br></h1><p>This is a simple hero unit<br></p><p><a data-cke-saved-href=\"#\" href=\"#\" class=\"btn btn-primary btn-lg\">Learn more</a></p><img data-cke-saved-src=\"assets/composer/snippets/default/img/somewhere_bangladesh.jpg\" src=\"assets/composer/snippets/default/img/somewhere_bangladesh.jpg\" style=\"width:100%\"><br></div><div id=\"keditor-dynamic-element-1489771397240\"><h1>It\'s dynamic content</h1></div></section><div class=\"keditor-toolbar keditor-toolbar-component\">   <a href=\"#\" class=\"btn-component-reposition\"><i class=\"fa fa-arrows\"></i></a>   <a href=\"#\" class=\"btn-component-duplicate\"><i class=\"fa fa-files-o\"></i></a>   <a href=\"#\" class=\"btn-component-delete\"><i class=\"fa fa-times\"></i></a></div></section></div>\r\n    </div></section><div class=\"keditor-toolbar keditor-toolbar-container\">   <a href=\"#\" class=\"btn-container-reposition\"><i class=\"fa fa-sort\"></i></a>   <a href=\"#\" class=\"btn-container-duplicate\"><i class=\"fa fa-files-o\"></i></a>   <a href=\"#\" class=\"btn-container-delete\"><i class=\"fa fa-times\"></i></a></div></section><section class=\"keditor-container keditor-initialized-container\" id=\"keditor-container-1489771694523\"><section class=\"keditor-container-inner\"><div class=\"row\">\r\n        <div class=\"col-sm-4 keditor-container-content ui-droppable ui-sortable\" data-type=\"container-content\" id=\"keditor-container-content-1489771694524\">\r\n        </div>\r\n        <div class=\"col-sm-8 keditor-container-content ui-droppable ui-sortable\" data-type=\"container-content\" id=\"keditor-container-content-1489771694542\">\r\n        <section data-type=\"component-text\" class=\"keditor-component existing-component keditor-initialized-component\" id=\"keditor-component-1489771694537\" style=\"position: relative; z-index: 2; left: 0px; top: 0px;\"><section class=\"keditor-component-content cke_editable cke_editable_inline cke_contents_ltr cke_show_borders\" id=\"keditor-component-content-1489771694537\" tabindex=\"0\" spellcheck=\"false\" role=\"textbox\" aria-label=\"false\" aria-describedby=\"cke_403\" contenteditable=\"true\"><div class=\"thumbnail\"><div class=\"caption\"><h3>Thumbnail label</h3><p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p><p><a class=\"btn btn-primary\" data-cke-saved-href=\"#\" href=\"#\">Button</a> <a class=\"btn btn-default\" data-cke-saved-href=\"#\" href=\"#\">Button</a></p></div></div></section><div class=\"keditor-toolbar keditor-toolbar-component\">   <a href=\"#\" class=\"btn-component-reposition\"><i class=\"fa fa-arrows\"></i></a>   <a href=\"#\" class=\"btn-component-duplicate\"><i class=\"fa fa-files-o\"></i></a>   <a href=\"#\" class=\"btn-component-delete\"><i class=\"fa fa-times\"></i></a></div></section><section data-type=\"component-text\" class=\"keditor-component existing-component keditor-initialized-component\" id=\"keditor-component-1489771694552\"><section class=\"keditor-component-content cke_editable cke_editable_inline cke_contents_ltr cke_show_borders\" id=\"keditor-component-content-1489771694552\" tabindex=\"0\" spellcheck=\"false\" role=\"textbox\" aria-label=\"false\" aria-describedby=\"cke_444\" contenteditable=\"true\"><div class=\"jumbotron\"><h1>Hello, world!</h1><p>This is a simple hero unit</p><p><a class=\"btn btn-primary btn-lg\" data-cke-saved-href=\"#\" href=\"#\">Learn more</a></p></div><div id=\"keditor-dynamic-element-1489771397240\"><h1>It\'s dynamic content</h1></div></section><div class=\"keditor-toolbar keditor-toolbar-component\">   <a href=\"#\" class=\"btn-component-reposition\"><i class=\"fa fa-arrows\"></i></a>   <a href=\"#\" class=\"btn-component-duplicate\"><i class=\"fa fa-files-o\"></i></a>   <a href=\"#\" class=\"btn-component-delete\"><i class=\"fa fa-times\"></i></a></div></section></div>\r\n    </div></section><div class=\"keditor-toolbar keditor-toolbar-container\">   <a href=\"#\" class=\"btn-container-reposition\"><i class=\"fa fa-sort\"></i></a>   <a href=\"#\" class=\"btn-container-duplicate\"><i class=\"fa fa-files-o\"></i></a>   <a href=\"#\" class=\"btn-container-delete\"><i class=\"fa fa-times\"></i></a></div></section></div></div>','','','2017-03-17 17:29:14'),(12,1,'de','','','<div id=\"keditor-content-area-1489854088336\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489769582708\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489766467030\" class=\"keditor-content-area ui-droppable ui-sortable\"></div></div></div>','','','2017-03-18 16:21:31'),(13,4,'en','','','<div id=\"keditor-content-area-1489771689075\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489771330009\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489771283301\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489771220566\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489766467001\" class=\"keditor-content-area ui-droppable ui-sortable\"><section class=\"keditor-container keditor-initialized-container  \" id=\"keditor-container-1489766480689\">   <section class=\"keditor-container-inner\"><div class=\"row\"></div></section></section></div>					</div></div></div></div>','','','2017-03-17 17:29:14'),(14,4,'fr','','','<div id=\"keditor-content-area-1489771689082\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489771330016\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489771283306\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489771220573\" class=\"keditor-content-area ui-droppable ui-sortable\"></div></div></div></div>','','','2017-03-17 17:29:14'),(15,4,'de','','','<div id=\"keditor-content-area-1489771689089\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489771330022\" class=\"keditor-content-area ui-droppable ui-sortable\"><div id=\"keditor-content-area-1489771283311\" class=\"keditor-content-area ui-droppable ui-sortable\"></div></div></div>','','','2017-03-17 17:29:14');
/*!40000 ALTER TABLE `contenuto_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `macrocategorie`
--

DROP TABLE IF EXISTS `macrocategorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `macrocategorie` (
  `mc_IDMacroCategoria` bigint(20) NOT NULL AUTO_INCREMENT,
  `mc_immagine` longtext,
  `mc_ordine` bigint(20) DEFAULT NULL,
  `mc_modificatoIl` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`mc_IDMacroCategoria`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `macrocategorie`
--

LOCK TABLES `macrocategorie` WRITE;
/*!40000 ALTER TABLE `macrocategorie` DISABLE KEYS */;
/*!40000 ALTER TABLE `macrocategorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `macrocategorie_data`
--

DROP TABLE IF EXISTS `macrocategorie_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `macrocategorie_data` (
  `mc_IDMacrocategoriadata` bigint(20) NOT NULL AUTO_INCREMENT,
  `mc_IDMacroCategoria` bigint(20) NOT NULL,
  `mc_language` varchar(2) DEFAULT NULL,
  `mc_testo` longtext,
  `mc_description` longtext,
  `mc_modificatoIl` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`mc_IDMacrocategoriadata`),
  UNIQUE KEY `KeyLanguage` (`mc_IDMacroCategoria`,`mc_language`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `macrocategorie_data`
--

LOCK TABLES `macrocategorie_data` WRITE;
/*!40000 ALTER TABLE `macrocategorie_data` DISABLE KEYS */;
/*!40000 ALTER TABLE `macrocategorie_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `mn_IDMenu` bigint(11) NOT NULL AUTO_INCREMENT,
  `mn_ordine` bigint(11) DEFAULT NULL,
  `mn_livello` char(1) DEFAULT NULL,
  `mn_IDContenuto` bigint(11) DEFAULT NULL,
  `mn_visibile` tinyint(4) DEFAULT NULL,
  `mn_tipomenu` varchar(20) DEFAULT NULL,
  `mn_link` longtext,
  `mn_IDPadre` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`mn_IDMenu`)
) ENGINE=MyISAM AUTO_INCREMENT=121 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (97,1,'1',0,NULL,'alto','',0),(105,1,'1',2,NULL,'alto','',0),(118,1,'1',3,1,'alto','',0),(119,1,'1',0,1,'alto','',0),(117,2,'2',2,1,'alto','',105),(116,1,'2',1,1,'alto','',105),(120,1,'2',4,NULL,'alto','',119);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_data`
--

DROP TABLE IF EXISTS `menu_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu_data` (
  `mn_IDMenudata` bigint(20) NOT NULL AUTO_INCREMENT,
  `mn_IDMenu` bigint(11) NOT NULL,
  `mn_language` varchar(2) NOT NULL,
  `mn_nome` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`mn_IDMenudata`),
  UNIQUE KEY `KeyLanguage` (`mn_IDMenu`,`mn_language`)
) ENGINE=MyISAM AUTO_INCREMENT=114 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_data`
--

LOCK TABLES `menu_data` WRITE;
/*!40000 ALTER TABLE `menu_data` DISABLE KEYS */;
INSERT INTO `menu_data` VALUES (97,97,'it','Home'),(98,1,'de',''),(99,119,'it','Menu Ale'),(100,120,'fr',''),(101,120,'en',''),(102,105,'it','Azienda ä, ö, ü e ß'),(103,116,'en',''),(104,117,'en',''),(105,118,'en',''),(106,105,'en','Azienda e'),(107,118,'it','News'),(108,116,'it','Chi Siamo'),(109,117,'it','Certificazioni'),(110,97,'en','Home e'),(111,97,'fr','Home f'),(112,120,'it','Menu Ale 2.1'),(113,105,'fr','Azienda f');
/*!40000 ALTER TABLE `menu_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `nw_IDNews` bigint(20) NOT NULL AUTO_INCREMENT,
  `nw_data` varchar(10) DEFAULT NULL,
  `nw_immagine` longtext,
  `nw_ordine` bigint(20) DEFAULT NULL,
  `nw_modificatoIl` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nw_inevidenza` tinyint(4) DEFAULT NULL,
  `nw_scadenza` varchar(10) DEFAULT NULL,
  `nw_allegato` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`nw_IDNews`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (3,'','',1,'2017-04-09 20:45:34',1,'scad',''),(4,'15/02/2017','immagini/news/thumb/Depositphotos_1041673_m-2015.jpg',2,'2017-03-17 14:29:46',1,NULL,NULL),(5,'','immagini/news/thumb/21139654_s - Copia.jpg',2,'2017-04-09 06:52:03',NULL,'',NULL),(6,'12/03/2017','immagini/news/thumb/Depositphotos_1908512_m.jpg',3,'2017-03-17 15:14:08',1,'12/03/2017',NULL);
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news_data`
--

DROP TABLE IF EXISTS `news_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news_data` (
  `nw_IDNewsdata` bigint(20) NOT NULL AUTO_INCREMENT,
  `nw_IDNews` bigint(20) NOT NULL,
  `nw_language` varchar(2) DEFAULT NULL,
  `nw_titolo` varchar(255) DEFAULT NULL,
  `nw_claim` longtext,
  `nw_testo` longtext,
  `nw_description` longtext,
  `nw_modificatoIl` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`nw_IDNewsdata`),
  UNIQUE KEY `KeyLanguage` (`nw_IDNews`,`nw_language`),
  UNIQUE KEY `nw_titolo_UNIQUE` (`nw_titolo`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news_data`
--

LOCK TABLES `news_data` WRITE;
/*!40000 ALTER TABLE `news_data` DISABLE KEYS */;
INSERT INTO `news_data` VALUES (1,3,'it','t20','c2','<h2>titolo paragrafo</h2>\r\n<p>testo della <strong>news</strong> di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di ale</p>\r\n<p>esto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di ale</p>\r\n<p>esto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di aleesto della news di ale</p>','description tag','2017-03-18 14:31:54'),(2,1,'en','t2','claim fr',NULL,NULL,'2017-03-18 14:19:27'),(3,1,'fr','t3','claim fr',NULL,NULL,'2017-03-18 14:29:57'),(4,3,'en','t4','c2','','','2017-03-18 14:29:57'),(5,3,'fr','t5','c2','','','2017-03-18 14:29:57'),(6,4,'it','t6','c4','','','2017-03-18 14:29:57'),(7,4,'en','t7','c4','','<p>test</p>\r\n<p>test</p>','2017-03-18 14:29:57'),(8,5,'it','t8','c6','','','2017-03-18 14:29:57'),(9,4,'fr','t9','c4','','','2017-03-18 14:29:57'),(10,5,'en','t10','c6','','','2017-03-18 14:29:57'),(11,5,'fr','t11','c6','','','2017-03-18 14:29:57'),(12,3,'de','12','c2','','<p>asd fsd asd f</p>','2017-03-18 14:29:57'),(13,6,'it','News Ita Test ale 2','','<h2>titolo 1</h2>\r\n<p>News Ita <strong>Test</strong> ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test<em> ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale</em> 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2News Ita Test ale 2v</p>','','2017-03-18 14:30:11'),(14,6,'en','t21','','','','2017-03-18 14:31:54'),(15,6,'fr','t22','','','','2017-03-18 14:31:54'),(16,6,'de','t23','','','','2017-03-18 14:31:54'),(18,0,'en','','','','','2017-03-18 16:04:54');
/*!40000 ALTER TABLE `news_data` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-10  8:59:03
