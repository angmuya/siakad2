/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.1.36-MariaDB : Database - db_siakad
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_siakad` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_siakad`;

/*Table structure for table `tb_fakultas` */

DROP TABLE IF EXISTS `tb_fakultas`;

CREATE TABLE `tb_fakultas` (
  `kd_fakultas` int(5) NOT NULL AUTO_INCREMENT,
  `nm_fakultas` varchar(50) DEFAULT NULL,
  `dekan` varchar(50) DEFAULT NULL,
  `pd1` varchar(50) DEFAULT NULL,
  `pd2` varchar(50) DEFAULT NULL,
  `pd3` varchar(50) DEFAULT NULL,
  `pd4` varchar(50) DEFAULT NULL,
  `kasubag_perkuliahan` varchar(50) DEFAULT NULL,
  `kasubag_akademik` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kd_fakultas`),
  KEY `SMS_Fakultas_Nm_Fakultas` (`nm_fakultas`),
  KEY `SMS_Fakultas_Dekan` (`dekan`),
  KEY `SMS_Fakultas_PD1` (`pd1`),
  KEY `SMS_Fakultas_PD2` (`pd2`),
  KEY `SMS_Fakultas_PD3` (`pd3`),
  KEY `SMS_Fakultas_PD4` (`pd4`),
  KEY `SMS_Fakultas_Kasubag_Perkuliahan` (`kasubag_perkuliahan`),
  KEY `SMS_Fakultas_Kasubag_Akademik` (`kasubag_akademik`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

/*Data for the table `tb_fakultas` */

insert  into `tb_fakultas`(`kd_fakultas`,`nm_fakultas`,`dekan`,`pd1`,`pd2`,`pd3`,`pd4`,`kasubag_perkuliahan`,`kasubag_akademik`) values 
(11,'Administrasi Negara','-','-','-','-','-','-','-'),
(22,'Administrasi Negaranknkn','-','-','-','-','-','-','-');

/*Table structure for table `tb_prodi` */

DROP TABLE IF EXISTS `tb_prodi`;

CREATE TABLE `tb_prodi` (
  `kd_prodi` int(11) NOT NULL AUTO_INCREMENT,
  `nm_prodi` varchar(50) DEFAULT NULL,
  `ketua_prodi` varchar(50) DEFAULT NULL,
  `sekretaris_prodi` varchar(50) DEFAULT NULL,
  `kd_fakultas` varchar(5) NOT NULL,
  KEY `SMS_Jurusan_Kd_Fakultas` (`kd_fakultas`),
  KEY `SMS_Jurusan_Nm_Jrs` (`nm_prodi`),
  KEY `SMS_Jurusan_Ketua_Jrs` (`ketua_prodi`),
  KEY `SMS_Jurusan_Sekretaris_Jrs` (`sekretaris_prodi`),
  KEY `Kd_Jrs` (`kd_prodi`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `tb_prodi` */

insert  into `tb_prodi`(`kd_prodi`,`nm_prodi`,`ketua_prodi`,`sekretaris_prodi`,`kd_fakultas`) values 
(1,'Akuntansi','Bambang','udin','');

/*Table structure for table `tb_role` */

DROP TABLE IF EXISTS `tb_role`;

CREATE TABLE `tb_role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `nama_role` varchar(225) DEFAULT NULL,
  KEY `id_role` (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tb_role` */

insert  into `tb_role`(`id_role`,`nama_role`) values 
(1,'DOSEN'),
(2,'MAHASISWA'),
(3,'ADMIN');

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level_id` int(3) DEFAULT NULL,
  `nama_user` varchar(255) DEFAULT NULL,
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tb_user` */

insert  into `tb_user`(`id_user`,`user_name`,`password`,`level_id`,`nama_user`) values 
(1,'admin','c4ca4238a0b923820dcc509a6f75849b',3,'Muhammad Yasin'),
(2,'mhs','c4ca4238a0b923820dcc509a6f75849b',2,'M Yasin'),
(3,'dosen','c4ca4238a0b923820dcc509a6f75849b',1,'Muh Yasin');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
