/*
SQLyog Ultimate v9.02 
MySQL - 5.6.20 : Database - test
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`test` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `test`;

/*Table structure for table `contact` */

DROP TABLE IF EXISTS `contact`;

CREATE TABLE `contact` (
  `CONTACT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `CONTACT_EMAIL` varchar(255) NOT NULL,
  `CONTACT_NAME` varchar(255) NOT NULL,
  `CONTACT_PHONE` varchar(255) NOT NULL,
  PRIMARY KEY (`CONTACT_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `contact` */

insert  into `contact`(`CONTACT_ID`,`CONTACT_EMAIL`,`CONTACT_NAME`,`CONTACT_PHONE`) values (1,'contact0@loianetest.com','Contact0','(000) 000-0000'),(2,'contact1@loianetest.com','Contact1','(000) 000-0000'),(3,'contact2@loianetest.com','Contact2','(000) 000-0000'),(4,'contact3@loianetest.com','Contact3','(000) 000-0000'),(5,'contact4@loianetest.com','Contact4','(000) 000-0000'),(6,'contact5@loianetest.com','Contact5','(000) 000-0000'),(7,'contact6@loianetest.com','Contact6','(000) 000-0000'),(8,'contact7@loianetest.com','Contact7','(000) 000-0000'),(9,'contact8@loianetest.com','Contact8','(000) 000-0000'),(10,'contact9@loianetest.com','Contact9','(000) 000-0000'),(11,'contact10@loianetest.com','Contact10','(000) 000-0000'),(12,'contact11@loianetest.com','Contact11','(000) 000-0000'),(13,'contact12@loianetest.com','Contact12','(000) 000-0000'),(14,'contact13@loianetest.com','Contact13','(000) 000-0000'),(15,'contact14@loianetest.com','Contact14','(000) 000-0000'),(16,'contact15@loianetest.com','Contact15','(000) 000-0000'),(17,'contact16@loianetest.com','Contact16','(000) 000-0000'),(18,'contact17@loianetest.com','Contact17','(000) 000-0000'),(19,'contact18@loianetest.com','Contact18','(000) 000-0000'),(20,'contact19@loianetest.com','Contact19','(000) 000-0000');

/*Table structure for table `student` */

DROP TABLE IF EXISTS `student`;

CREATE TABLE `student` (
  `rollNo` int(11) NOT NULL AUTO_INCREMENT,
  `studentName` varchar(30) DEFAULT NULL,
  `marks` int(11) DEFAULT NULL,
  PRIMARY KEY (`rollNo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `student` */

insert  into `student`(`rollNo`,`studentName`,`marks`) values (1,'John P',82),(2,'Abdul K',94),(3,'Raju S',35);

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `usuario` varchar(80) DEFAULT NULL,
  `passw` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

/*Data for the table `usuarios` */

insert  into `usuarios`(`iduser`,`nombre`,`apellido`,`usuario`,`passw`) values (26,'SERGIO ANTONIO','AVILA RIVEROS','SAVILA','123456'),(27,'SANTINO NICOLAS','AVILA GAIARDELLI','SNAVILA','456789'),(28,'FABsss','GAIARsss','FGAIsss','789sss');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
