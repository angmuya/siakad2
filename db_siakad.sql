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

/*Table structure for table `tb_dosen` */

DROP TABLE IF EXISTS `tb_dosen`;

CREATE TABLE `tb_dosen` (
  `NIP` varchar(15) NOT NULL,
  `Nama` varchar(40) DEFAULT NULL,
  `NIDN` varchar(15) DEFAULT NULL,
  `TpLahir` varchar(20) DEFAULT NULL,
  `TgLahir` date DEFAULT NULL,
  `Sex` varchar(15) DEFAULT NULL,
  `GolDarah` varchar(2) DEFAULT NULL,
  `Agama` varchar(20) DEFAULT NULL,
  `Alamat` varchar(100) DEFAULT NULL,
  `NoTlp` varchar(20) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `NoKTP` varchar(30) DEFAULT NULL,
  `SD` varchar(30) DEFAULT NULL,
  `ThSD` year(4) DEFAULT NULL,
  `SMP` varchar(30) DEFAULT NULL,
  `ThSMP` year(4) DEFAULT NULL,
  `SMA` varchar(30) DEFAULT NULL,
  `JrSMA` varchar(20) DEFAULT NULL,
  `ThSMA` year(4) DEFAULT NULL,
  `DIII` varchar(30) DEFAULT NULL,
  `JrDIII` varchar(30) DEFAULT NULL,
  `ThDIII` year(4) DEFAULT NULL,
  `S1` varchar(30) DEFAULT NULL,
  `JrS1` varchar(30) DEFAULT NULL,
  `ThS1` year(4) DEFAULT NULL,
  `S2` varchar(30) DEFAULT NULL,
  `JrS2` varchar(30) DEFAULT NULL,
  `ThS2` year(4) DEFAULT NULL,
  `S3` varchar(30) DEFAULT NULL,
  `JrS3` varchar(30) DEFAULT NULL,
  `ThS3` year(4) DEFAULT NULL,
  `Penelitian` varchar(30) DEFAULT NULL,
  `TarafPenelitian` varchar(10) DEFAULT NULL,
  `ThPenelitian` year(4) DEFAULT NULL,
  `ThMasuk` year(4) DEFAULT NULL,
  `KdGol` varchar(15) DEFAULT NULL,
  `NoSK` varchar(20) DEFAULT NULL,
  `TgSK` date DEFAULT NULL,
  `KdJab` varchar(30) DEFAULT NULL,
  `KdFung` varchar(15) DEFAULT NULL,
  `StaPeg` varchar(10) DEFAULT NULL,
  `StatusPA` varchar(1) DEFAULT NULL,
  `StaKerja` varchar(20) DEFAULT NULL,
  `KdStatus` varchar(20) DEFAULT NULL,
  `NamaPsg` varchar(30) DEFAULT NULL,
  `Pass` varchar(50) DEFAULT NULL,
  `Poto` varchar(100) DEFAULT NULL,
  `Kd_Fakultas` varchar(5) NOT NULL,
  `kd_user` int(10) DEFAULT NULL,
  PRIMARY KEY (`NIP`,`Kd_Fakultas`),
  KEY `SMS_Dosen_Kd_Fakultas` (`Kd_Fakultas`),
  KEY `SMS_Dosen_Nama` (`Nama`),
  KEY `SMS_Dosen_NIPPNS` (`NIDN`),
  KEY `SMS_Dosen_TpLahir` (`TpLahir`),
  KEY `SMS_Dosen_TgLahir` (`TgLahir`),
  KEY `SMS_Dosen_Sex` (`Sex`),
  KEY `SMS_Dosen_GolDarah` (`GolDarah`),
  KEY `SMS_Dosen_Agama` (`Agama`),
  KEY `SMS_Dosen_Alamat` (`Alamat`),
  KEY `SMS_Dosen_NoTlp` (`NoTlp`),
  KEY `SMS_Dosen_Email` (`Email`),
  KEY `SMS_Dosen_NoKTP` (`NoKTP`),
  KEY `SMS_Dosen_SD` (`SD`),
  KEY `SMS_Dosen_ThSD` (`ThSD`),
  KEY `SMS_Dosen_SMP` (`SMP`),
  KEY `SMS_Dosen_ThSMP` (`ThSMP`),
  KEY `SMS_Dosen_SMA` (`SMA`),
  KEY `SMS_Dosen_JrSMA` (`JrSMA`),
  KEY `SMS_Dosen_ThSMA` (`ThSMA`),
  KEY `SMS_Dosen_DIII` (`DIII`),
  KEY `SMS_Dosen_JrDIII` (`JrDIII`),
  KEY `SMS_Dosen_ThDIII` (`ThDIII`),
  KEY `SMS_Dosen_S1` (`S1`),
  KEY `SMS_Dosen_JrS1` (`JrS1`),
  KEY `SMS_Dosen_ThS1` (`ThS1`),
  KEY `SMS_Dosen_S2` (`S2`),
  KEY `SMS_Dosen_JrS2` (`JrS2`),
  KEY `SMS_Dosen_ThS2` (`ThS2`),
  KEY `SMS_Dosen_S3` (`S3`),
  KEY `SMS_Dosen_JrS3` (`JrS3`),
  KEY `SMS_Dosen_ThS3` (`ThS3`),
  KEY `SMS_Dosen_Penelitian` (`Penelitian`),
  KEY `SMS_Dosen_TarafPenelitian` (`TarafPenelitian`),
  KEY `SMS_Dosen_ThPenelitian` (`ThPenelitian`),
  KEY `SMS_Dosen_ThMasuk` (`ThMasuk`),
  KEY `SMS_Dosen_KdGol` (`KdGol`),
  KEY `SMS_Dosen_NoSK` (`NoSK`),
  KEY `SMS_Dosen_TgSK` (`TgSK`),
  KEY `SMS_Dosen_KdJab` (`KdJab`),
  KEY `SMS_Dosen_KdFung` (`KdFung`),
  KEY `SMS_Dosen_StaPeg` (`StaPeg`),
  KEY `SMS_Dosen_StatusPA` (`StatusPA`),
  KEY `SMS_Dosen_StaKerja` (`StaKerja`),
  KEY `SMS_Dosen_KdStatus` (`KdStatus`),
  KEY `SMS_Dosen_NamaPsg` (`NamaPsg`),
  KEY `SMS_Dosen_Pass` (`Pass`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

/*Table structure for table `tb_mahasiswa` */

DROP TABLE IF EXISTS `tb_mahasiswa`;

CREATE TABLE `tb_mahasiswa` (
  `NPM` varchar(255) DEFAULT NULL,
  `NamaMhs` varchar(255) DEFAULT NULL,
  `TpLahir` varchar(255) DEFAULT NULL,
  `TgLahir` varchar(255) DEFAULT NULL,
  `Sex` varchar(255) DEFAULT NULL,
  `Suku` varchar(25) NOT NULL,
  `Agama` varchar(255) DEFAULT NULL,
  `AsalSekolah` varchar(255) DEFAULT NULL,
  `ThnLulus` varchar(255) DEFAULT NULL,
  `NEM` varchar(255) DEFAULT NULL,
  `ThnMasuk` varchar(255) DEFAULT NULL,
  `Alamat` varchar(255) DEFAULT NULL,
  `KabS` varchar(255) DEFAULT NULL,
  `PropS` varchar(255) DEFAULT NULL,
  `Kota` varchar(255) DEFAULT NULL,
  `Prop` varchar(255) DEFAULT NULL,
  `NoTlp` varchar(255) DEFAULT NULL,
  `Hobi` varchar(255) DEFAULT NULL,
  `NmAyah` varchar(255) DEFAULT NULL,
  `UmurAyah` varchar(255) DEFAULT NULL,
  `PkjAyah` varchar(255) DEFAULT NULL,
  `NmIbu` varchar(255) DEFAULT NULL,
  `UmurIbu` varchar(255) DEFAULT NULL,
  `PkjIbu` varchar(255) DEFAULT NULL,
  `AlamatOrta` varchar(255) DEFAULT NULL,
  `KotaO` varchar(255) DEFAULT NULL,
  `NoTlpOrta` varchar(255) DEFAULT NULL,
  `NoUSM` varchar(255) DEFAULT NULL,
  `Pekerjaan` varchar(255) DEFAULT NULL,
  `Jabatan` varchar(255) DEFAULT NULL,
  `A_Pekerjaan` varchar(255) DEFAULT NULL,
  `Tlp_Pekerjaan` varchar(15) NOT NULL,
  `NIRP1` varchar(255) DEFAULT NULL,
  `Nama1` varchar(255) DEFAULT NULL,
  `NIRP2` varchar(255) DEFAULT NULL,
  `Nama2` varchar(255) DEFAULT NULL,
  `Kd_Jrs` varchar(255) DEFAULT NULL,
  `PKls` varchar(255) DEFAULT NULL,
  `Kls` varchar(255) DEFAULT NULL,
  `PStudi` varchar(255) DEFAULT NULL,
  `StaKuliah` varchar(255) DEFAULT NULL,
  `Pass` varchar(255) DEFAULT NULL,
  `Poto` varchar(255) DEFAULT NULL,
  `ThnK` varchar(255) DEFAULT NULL,
  `Skripsi` varchar(255) DEFAULT NULL,
  `Kd_Fakultas` varchar(255) DEFAULT NULL,
  `kd_user` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Table structure for table `tb_matakuliah` */

DROP TABLE IF EXISTS `tb_matakuliah`;

CREATE TABLE `tb_matakuliah` (
  `id_mk` int(11) NOT NULL AUTO_INCREMENT,
  `kd_mk` varchar(10) DEFAULT NULL,
  `nm_mk` varchar(10) DEFAULT NULL,
  `semester` varchar(10) DEFAULT NULL,
  `smt` smallint(6) DEFAULT NULL,
  `kredit` int(11) DEFAULT NULL,
  `kd_kk` varchar(10) DEFAULT NULL,
  `kd_prodi` varchar(10) DEFAULT NULL,
  `tahun_k` year(4) DEFAULT NULL,
  `NIP` varchar(15) DEFAULT NULL,
  `kd_fakultas` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id_mk`),
  KEY `SMS_Matakuliah_Kd_Fakultas` (`kd_fakultas`),
  KEY `SMS_Matakuliah_Kd_Jrs` (`kd_prodi`),
  KEY `SMS_Matakuliah_Tahun_K` (`tahun_k`),
  KEY `SMS_Matakuliah_Nm_MK` (`nm_mk`),
  KEY `SMS_Matakuliah_NIRP` (`NIP`),
  KEY `SMS_Matakuliah_Kredit` (`kredit`),
  KEY `SMS_Matakuliah_Semester` (`semester`),
  KEY `SMS_Matakuliah_Kd_KK` (`kd_kk`),
  KEY `SMS_Matakuliah_Smt` (`smt`)
) ENGINE=MyISAM AUTO_INCREMENT=3793 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Table structure for table `tb_role` */

DROP TABLE IF EXISTS `tb_role`;

CREATE TABLE `tb_role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `nama_role` varchar(225) DEFAULT NULL,
  KEY `id_role` (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level_id` int(3) DEFAULT NULL,
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
