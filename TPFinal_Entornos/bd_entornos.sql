CREATE DATABASE  IF NOT EXISTS `entornos_final` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `entornos_final`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: entornos_final
-- ------------------------------------------------------
-- Server version	5.7.21-log

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
-- Table structure for table `artistas`
--

DROP TABLE IF EXISTS `artistas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `artistas` (
  `id_artista` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_artista` varchar(100) NOT NULL,
  `habilitado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_artista`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artistas`
--

LOCK TABLES `artistas` WRITE;
/*!40000 ALTER TABLE `artistas` DISABLE KEYS */;
INSERT INTO `artistas` VALUES (1,'Ciro y los persas',1),(2,'Los Piojos',1),(3,'Callejeros',1),(5,'Bersuit Vergarabat',1),(7,'Luis Alberto Spinetta',1),(8,'Don Omar',1),(9,'Salta la Banca',1);
/*!40000 ALTER TABLE `artistas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clasificaciones`
--

DROP TABLE IF EXISTS `clasificaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clasificaciones` (
  `id_clasificacion` int(11) NOT NULL AUTO_INCREMENT,
  `puntos` int(11) NOT NULL,
  `mensaje_adjunto` varchar(500) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  PRIMARY KEY (`id_clasificacion`),
  KEY `clasificaciones_usuario` (`id_usuario`),
  KEY `clasificaciones_item_idx` (`id_item`),
  CONSTRAINT `clasificaciones_item` FOREIGN KEY (`id_item`) REFERENCES `items` (`id_item`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `clasificaciones_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clasificaciones`
--

LOCK TABLES `clasificaciones` WRITE;
/*!40000 ALTER TABLE `clasificaciones` DISABLE KEYS */;
INSERT INTO `clasificaciones` VALUES (1,4,NULL,2,1),(2,4,'discazo',2,2),(3,4,'jajaja',2,3),(4,3,'Le sobran acordes',2,5),(5,4,'Un punto menos porque critan a la Jefa',2,7),(6,0,'caca',2,6);
/*!40000 ALTER TABLE `clasificaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `generos`
--

DROP TABLE IF EXISTS `generos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `generos` (
  `id_genero` int(11) NOT NULL AUTO_INCREMENT,
  `desc_genero` varchar(50) NOT NULL,
  `habilitado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_genero`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `generos`
--

LOCK TABLES `generos` WRITE;
/*!40000 ALTER TABLE `generos` DISABLE KEYS */;
INSERT INTO `generos` VALUES (1,'Rock',1),(2,'Pop',1),(3,'Indie',1),(4,'Tango',1),(5,'Reggaeton',1),(6,'Trap',1),(7,'Cumbia',1);
/*!40000 ALTER TABLE `generos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items` (
  `id_item` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `anio_lanzamiento` varchar(4) NOT NULL,
  `stock` int(11) NOT NULL,
  `habilitado` tinyint(1) NOT NULL,
  `id_artista` int(11) NOT NULL,
  `id_genero` int(11) NOT NULL,
  `id_tipo_disco` int(11) NOT NULL,
  `url_portada` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id_item`),
  KEY `item_artista` (`id_artista`),
  KEY `item_genero` (`id_genero`),
  KEY `item_tipo_item_idx` (`id_tipo_disco`),
  CONSTRAINT `item_artista` FOREIGN KEY (`id_artista`) REFERENCES `artistas` (`id_artista`),
  CONSTRAINT `item_genero` FOREIGN KEY (`id_genero`) REFERENCES `generos` (`id_genero`),
  CONSTRAINT `item_tipo_item` FOREIGN KEY (`id_tipo_disco`) REFERENCES `tipos_item` (`id_tipo_item`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES (1,'Espejos','2010',74,1,1,1,2,'http://covers.discorder.com/fullsize/front/0656291228724.jpg'),(2,'27','2012',100,1,2,2,2,'http://1.bp.blogspot.com/-8HBeN45MWoE/UkcG-Kf-K-I/AAAAAAAABio/PwoxzD5n0_w/s1600/Ciro_Y_Los_Persas-27-Frontal.jpg'),(3,'Verde Paisaje del Infierno','2000',92,1,2,1,2,'http://images.coveralia.com/audio/l/Los_Piojos-Verde_Paisaje_Del_Infierno-Frontal.jpg'),(5,'Artaud','1973',95,1,7,1,5,'http://1.bp.blogspot.com/-JymquRyAGps/UKjeS7t_1dI/AAAAAAAAAP0/fDOUteefGA8/s1600/Pescado%2BRabioso%2B-%2BArtaud%2B-%2BCover.jpg'),(6,'The Last Don','2003',93,1,8,5,2,'http://obligao.net/ipauta/images/frontcuvu.jpg'),(7,'Visceral','2013',0,1,9,1,2,'http://www.cmtv.com.ar/tapas-cd/saltalabancavisceral.jpg'),(24,'Máquina de Sangre','2003',200,1,2,1,2,'http://www.cmtv.com.ar/tapas-cd/piojosmaquinadesangre.jpg'),(25,'Presión','2001',200,1,3,1,2,'http://www.cmtv.com.ar/tapas-cd/callejerospresion.jpg'),(26,'Señales','2006',200,1,3,1,2,'http://www.cmtv.com.ar/tapas-cd/callejerossenales.jpg'),(27,'Sed','2001',200,1,3,1,2,'http://www.cmtv.com.ar/tapas-cd/callejerossed.jpg'),(28,'Naranja Persa 2','2018',200,1,1,1,2,'https://pbs.twimg.com/media/DXolZNvXkAIV0Al.jpg'),(29,'Que placer verte otra vez','2015',200,1,1,1,3,'http://cyjdiscos.com.ar/subidas/300815204029c80a11.jpg'),(30,'Azul','1998',100,1,2,1,2,'https://images.genius.com/30385b258aefa11b6d94339292502e0d.953x953x1.jpg'),(31,'Tercer Arco','1996',100,1,2,1,2,'http://media.rock.com.ar/fotos/discos/000/001/211/original/piojos-tercer-arco.png'),(32,'Ay, Ay, Ay','1994',200,1,2,1,2,'http://fracturerecords.com.mx/tienda/images/lopiojosayayaycd.jpg'),(33,'Chac tu chac','1992',200,1,2,1,2,'http://www.cmtv.com.ar/tapas-cd/piojoschac.jpg'),(35,'Fantasmas peleándole al viento','2006',200,1,2,1,3,'https://ugc.kn3.net/i/origin/http://3.bp.blogspot.com/_DOwjLnlGyQ4/SQuE11RGg8I/AAAAAAAAAKQ/rmM45IpfuQw/s400/fantasmas.jpg'),(37,'Don Leopardo','1996',100,1,5,1,2,'http://www.cmtv.com.ar/tapas-cd/bersuitdonleopardo.jpg'),(38,'... Y Punto','1992',200,1,5,1,2,'http://www.cmtv.com.ar/tapas-cd/bersuitypunto.jpg'),(40,'?','2007',200,1,5,1,2,'http://2.bp.blogspot.com/-0XZRltZnuGw/VNQxBm0ywgI/AAAAAAAAAJY/Tr-tYyWsj1c/s1600/Bersuit%2B%5BDelantera%5D.jpg'),(41,'Kink of king','2006',200,1,8,5,2,'http://images.mp3teca.com/14950_250.jpg'),(42,'iDon','2009',100,1,8,5,2,'https://is3-ssl.mzstatic.com/image/thumb/Music/0d/45/fd/mzi.svxtqwqj.jpg/268x0w.jpg'),(43,'Meet the Orphans','2010',100,1,8,5,2,'https://upload.wikimedia.org/wikipedia/en/thumb/8/81/Meet_the_Orphans_album_cover.jpg/220px-Meet_the_Orphans_album_cover.jpg'),(44,'Meet the Orphans 2','2012',100,1,8,5,2,'http://www.reggaetonline.net/images/CDs/meet-the-orphans-2.jpg'),(45,'Asquerosa alegría','1994',100,1,5,1,2,'https://www.lacanciondelpais.com.ar/sitio/jpg/asquerosa%20alegria.jpg'),(46,'Hijos del culo','2000',99,1,5,1,2,'http://www.cmtv.com.ar/tapas-cd/bersuithijosdelculo.jpg');
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `precios`
--

DROP TABLE IF EXISTS `precios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `precios` (
  `id_item` int(11) unsigned NOT NULL,
  `fecha_desde` date NOT NULL,
  `monto` double NOT NULL,
  PRIMARY KEY (`id_item`,`fecha_desde`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `precios`
--

LOCK TABLES `precios` WRITE;
/*!40000 ALTER TABLE `precios` DISABLE KEYS */;
INSERT INTO `precios` VALUES (0,'2018-05-11',100),(1,'2017-03-05',100),(1,'2017-04-17',200),(1,'2018-05-01',200),(2,'2017-03-05',100),(2,'2017-04-21',200),(2,'2018-05-01',200),(2,'2018-05-04',200),(2,'2018-05-07',200),(3,'2017-03-05',100),(4,'2017-03-05',100),(5,'2017-03-05',100),(5,'2018-05-01',100),(5,'2018-05-07',100),(6,'2017-03-05',100),(7,'2017-03-05',200),(24,'2018-04-26',200),(25,'2018-04-26',200),(26,'2018-04-26',200),(27,'2018-05-01',200),(28,'2018-05-01',197),(29,'2018-05-01',400),(30,'2018-05-04',250),(31,'2018-05-04',250),(31,'2018-05-07',250),(32,'2018-05-07',250),(33,'2018-05-07',250),(34,'2018-05-07',0),(35,'2018-05-08',350),(36,'2018-05-08',0),(36,'2018-05-09',0),(37,'2018-05-09',102.2),(38,'2018-05-09',67.4),(39,'2018-05-09',100),(40,'2018-05-10',200),(41,'2008-05-11',100),(42,'2018-05-11',100),(43,'2018-05-11',100),(44,'2018-05-11',100),(45,'2018-05-11',100),(46,'2018-05-11',100);
/*!40000 ALTER TABLE `precios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provincias`
--

DROP TABLE IF EXISTS `provincias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provincias` (
  `id_provincia` int(11) NOT NULL AUTO_INCREMENT,
  `desc_provincia` varchar(45) NOT NULL,
  PRIMARY KEY (`id_provincia`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provincias`
--

LOCK TABLES `provincias` WRITE;
/*!40000 ALTER TABLE `provincias` DISABLE KEYS */;
INSERT INTO `provincias` VALUES (1,'Buenos Aires'),(2,'Capital Federal'),(4,'Catamarca'),(5,'Chaco'),(6,'Chubut'),(7,'Córdoba'),(8,'Corrientes'),(9,'Entre Ríos'),(10,'Formosa'),(11,'Jujuy'),(12,'La Pampa'),(13,'La Rioja'),(14,'Mendoza'),(15,'Misiones'),(16,'Neuquén'),(17,'Río Negro'),(18,'Salta'),(19,'San Juan'),(20,'San Luis'),(21,'Santa Cruz'),(22,'Santa Fe'),(23,'Santiago del Estero'),(24,'Tierra del Fuego'),(25,'Tucumán');
/*!40000 ALTER TABLE `provincias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos_item`
--

DROP TABLE IF EXISTS `tipos_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipos_item` (
  `id_tipo_item` int(11) NOT NULL AUTO_INCREMENT,
  `desc_tipo_item` varchar(45) NOT NULL,
  `habilitado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_tipo_item`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos_item`
--

LOCK TABLES `tipos_item` WRITE;
/*!40000 ALTER TABLE `tipos_item` DISABLE KEYS */;
INSERT INTO `tipos_item` VALUES (1,'Blue-Ray',1),(2,'CD',1),(3,'DVD',1),(4,'Pasta',1),(5,'Vinilo',1);
/*!40000 ALTER TABLE `tipos_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos_usuario`
--

DROP TABLE IF EXISTS `tipos_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipos_usuario` (
  `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `desc_tipo_usuario` varchar(50) NOT NULL,
  `habilitado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_tipo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos_usuario`
--

LOCK TABLES `tipos_usuario` WRITE;
/*!40000 ALTER TABLE `tipos_usuario` DISABLE KEYS */;
INSERT INTO `tipos_usuario` VALUES (1,'Administrador',1),(2,'Empleado',1),(3,'Usuario',1);
/*!40000 ALTER TABLE `tipos_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `habilitado` tinyint(1) NOT NULL,
  `id_tipo_usuario` int(11) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `dni` varchar(50) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_tipo_usuario` (`id_tipo_usuario`),
  CONSTRAINT `id_tipo_usuario` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipos_usuario` (`id_tipo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (2,'David','Martínez',1,3,'fer12345','martinezd@gmail.com','martinezd','12345678'),(3,'Alejandro','Suarez',1,1,'fer12345','a@gmail.com','suareza','holis@gmail.com'),(4,'Araceli','Castelletta',1,1,'fer12345','12','arac','arac@gmail.com'),(5,'Diego','Maradona',1,2,'fer12345','3223','maradonad','diegote@gmail.com'),(6,'1','1',0,3,'fer12345','a','golpe','a');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venta_item`
--

DROP TABLE IF EXISTS `venta_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `venta_item` (
  `id_venta` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`id_venta`,`id_item`),
  KEY `venta_item_item` (`id_item`),
  CONSTRAINT `venta_item_item` FOREIGN KEY (`id_item`) REFERENCES `items` (`id_item`),
  CONSTRAINT `venta_item_venta` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id_venta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venta_item`
--

LOCK TABLES `venta_item` WRITE;
/*!40000 ALTER TABLE `venta_item` DISABLE KEYS */;
INSERT INTO `venta_item` VALUES (5,1,3),(6,2,3),(6,3,2),(7,5,1),(8,3,3),(8,6,4),(9,1,3),(9,2,4),(10,1,4),(20,3,3),(21,2,1),(21,6,1),(23,46,1);
/*!40000 ALTER TABLE `venta_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `titular_tarjeta` varchar(150) NOT NULL,
  `nro_tarjeta` varchar(16) NOT NULL,
  `habilitado` tinyint(1) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `calle` varchar(45) NOT NULL,
  `numero` varchar(8) NOT NULL,
  `localidad` varchar(60) NOT NULL,
  `id_provincia` int(11) NOT NULL,
  `piso` char(1) DEFAULT NULL,
  `dpto` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_venta`),
  KEY `venta_usuario` (`id_usuario`),
  KEY `venta_provincia_idx` (`id_provincia`),
  CONSTRAINT `venta_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
INSERT INTO `ventas` VALUES (5,'2017-03-05','aaa','1212',1,2,'','0','0',0,NULL,NULL),(6,'2017-03-12','yo','44',1,2,'','0','0',0,NULL,NULL),(7,'2017-03-25','Dios','443',1,2,'','0','0',0,NULL,NULL),(8,'2017-03-30','kakak','2323',1,2,'','0','0',0,NULL,NULL),(9,'2017-04-17','Macri Gato','43434',1,2,'','0','0',0,NULL,NULL),(10,'2017-04-24','Loco','34343434',1,2,'San Juan','5329','Rosario',22,NULL,NULL),(11,'2017-04-26','Adolf','heils',1,2,'Falsa','123','Charata',5,'1','a'),(20,'2017-04-29','Dios','1234123412341234',1,2,'Falsa','123','Corrientes',8,NULL,NULL),(21,'2018-04-24','Dios','123412341231234',1,2,'Falsa','123','Rosario',22,NULL,NULL),(22,'2018-05-16','Cosme Fulanito','1111111111111111',1,2,'San Juan','5329','Rosario',22,'0',''),(23,'2018-05-16','Cosme Fulanito','1111111111111111',1,2,'San Juan','5329','Rosario',22,'0','');
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-08 18:41:38
