/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.14-MariaDB : Database - klikdaily
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`klikdaily` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `klikdaily`;

/*Table structure for table `location` */

DROP TABLE IF EXISTS `location`;

CREATE TABLE `location` (
  `location_id` int(10) NOT NULL AUTO_INCREMENT,
  `location` varchar(10) DEFAULT NULL,
  `product_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `location` */

insert  into `location`(`location_id`,`location`,`product_id`) values 
(1,'A-1-1',1),
(2,'A-1-2',2);

/*Table structure for table `log_details` */

DROP TABLE IF EXISTS `log_details`;

CREATE TABLE `log_details` (
  `log_detail_ids` int(10) NOT NULL AUTO_INCREMENT,
  `log_id` int(10) DEFAULT NULL,
  `type` varchar(15) DEFAULT NULL,
  `adjustment` int(12) DEFAULT NULL,
  `quantity` int(8) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`log_detail_ids`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

/*Data for the table `log_details` */

insert  into `log_details`(`log_detail_ids`,`log_id`,`type`,`adjustment`,`quantity`,`created_at`) values 
(18,25,'Inbound',25,115,'2020-11-12 17:18:46'),
(19,26,'Outbound',-10,140,'2020-11-12 17:18:46');

/*Table structure for table `logs` */

DROP TABLE IF EXISTS `logs`;

CREATE TABLE `logs` (
  `log_id` int(10) NOT NULL AUTO_INCREMENT,
  `location_id` int(10) DEFAULT NULL,
  `location_name` varchar(10) DEFAULT NULL,
  `product` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

/*Data for the table `logs` */

insert  into `logs`(`log_id`,`location_id`,`location_name`,`product`) values 
(25,1,'A-1-1','Indomie Goreng'),
(26,2,'A-1-2','Teh Kotak');

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL AUTO_INCREMENT,
  `product` varchar(50) DEFAULT NULL,
  `quantity` int(8) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `products` */

insert  into `products`(`product_id`,`product`,`quantity`) values 
(1,'Indomie Goreng',115),
(2,'Teh Kotak',140);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
