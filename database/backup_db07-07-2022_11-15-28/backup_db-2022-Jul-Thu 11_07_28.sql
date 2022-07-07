#
# TABLE STRUCTURE FOR: tbl_daerah
#

DROP TABLE IF EXISTS `tbl_daerah`;

CREATE TABLE `tbl_daerah` (
  `idDaerah` int(11) NOT NULL AUTO_INCREMENT,
  `namaDaerah` varchar(100) DEFAULT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idDaerah`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO `tbl_daerah` (`idDaerah`, `namaDaerah`, `dateCreated`) VALUES (1, 'Palembang', '2022-07-03 06:32:24');
INSERT INTO `tbl_daerah` (`idDaerah`, `namaDaerah`, `dateCreated`) VALUES (2, 'Banyuasin', '2022-07-03 06:32:36');
INSERT INTO `tbl_daerah` (`idDaerah`, `namaDaerah`, `dateCreated`) VALUES (4, 'Ogan Ilir', '2022-07-03 09:44:02');
INSERT INTO `tbl_daerah` (`idDaerah`, `namaDaerah`, `dateCreated`) VALUES (5, 'Ogan Komering Ulu', '2022-07-03 06:33:04');
INSERT INTO `tbl_daerah` (`idDaerah`, `namaDaerah`, `dateCreated`) VALUES (6, 'Musi Banyuasin', '2022-07-03 09:43:49');
INSERT INTO `tbl_daerah` (`idDaerah`, `namaDaerah`, `dateCreated`) VALUES (7, 'Ogan Komering Ilir', '2022-07-03 09:44:15');


#
# TABLE STRUCTURE FOR: tbl_jenis_pelayanan
#

DROP TABLE IF EXISTS `tbl_jenis_pelayanan`;

CREATE TABLE `tbl_jenis_pelayanan` (
  `idJenisPelayanan` int(11) NOT NULL AUTO_INCREMENT,
  `namaJenisPelayanan` varchar(50) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idJenisPelayanan`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `tbl_jenis_pelayanan` (`idJenisPelayanan`, `namaJenisPelayanan`, `dateCreated`) VALUES (1, 'Dinas Kesehatan Sumsel', '2022-06-29 19:37:39');
INSERT INTO `tbl_jenis_pelayanan` (`idJenisPelayanan`, `namaJenisPelayanan`, `dateCreated`) VALUES (2, 'Rumah Sakit', '2022-06-29 19:38:16');
INSERT INTO `tbl_jenis_pelayanan` (`idJenisPelayanan`, `namaJenisPelayanan`, `dateCreated`) VALUES (3, 'Puskesmas', '2022-06-29 19:38:16');


#
# TABLE STRUCTURE FOR: tbl_jenis_penyakit
#

DROP TABLE IF EXISTS `tbl_jenis_penyakit`;

CREATE TABLE `tbl_jenis_penyakit` (
  `idJenisPenyakit` int(11) NOT NULL AUTO_INCREMENT,
  `namaPenyakit` varchar(100) NOT NULL,
  `keteranganPenyakit` text NOT NULL,
  `statusPenyakit` int(1) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idJenisPenyakit`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

INSERT INTO `tbl_jenis_penyakit` (`idJenisPenyakit`, `namaPenyakit`, `keteranganPenyakit`, `statusPenyakit`, `dateCreated`) VALUES (1, 'Malaria', 'Malaria Merupakan', 1, '2022-07-02 12:34:45');
INSERT INTO `tbl_jenis_penyakit` (`idJenisPenyakit`, `namaPenyakit`, `keteranganPenyakit`, `statusPenyakit`, `dateCreated`) VALUES (7, 'TBC', 'TBC                                                ', 1, '2022-07-02 12:56:52');
INSERT INTO `tbl_jenis_penyakit` (`idJenisPenyakit`, `namaPenyakit`, `keteranganPenyakit`, `statusPenyakit`, `dateCreated`) VALUES (8, 'Hepatitis', 'Hepatitis', 1, '2022-07-02 12:57:05');
INSERT INTO `tbl_jenis_penyakit` (`idJenisPenyakit`, `namaPenyakit`, `keteranganPenyakit`, `statusPenyakit`, `dateCreated`) VALUES (9, 'Covid 19', 'Covid 19                                                ', 1, '2022-07-02 12:57:15');


#
# TABLE STRUCTURE FOR: tbl_pelayanan_kesehatan
#

DROP TABLE IF EXISTS `tbl_pelayanan_kesehatan`;

CREATE TABLE `tbl_pelayanan_kesehatan` (
  `idPelayanan` int(11) NOT NULL AUTO_INCREMENT,
  `idJenisPelayanan` int(3) NOT NULL,
  `idDaerah` int(5) DEFAULT NULL,
  `namaPelayanan` varchar(100) NOT NULL,
  `lokasiPelayanan` text NOT NULL,
  `lang` varchar(30) NOT NULL,
  `lat` varchar(30) NOT NULL,
  `photoPelayanan` varchar(256) NOT NULL,
  `keteranganPelayanan` text NOT NULL,
  `statusPelayanan` int(1) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idPelayanan`),
  KEY `idJenisPelayanan` (`idJenisPelayanan`),
  KEY `idDaerah` (`idDaerah`),
  CONSTRAINT `tbl_pelayanan_kesehatan_ibfk_1` FOREIGN KEY (`idJenisPelayanan`) REFERENCES `tbl_jenis_pelayanan` (`idJenisPelayanan`),
  CONSTRAINT `tbl_pelayanan_kesehatan_ibfk_2` FOREIGN KEY (`idDaerah`) REFERENCES `tbl_daerah` (`idDaerah`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

INSERT INTO `tbl_pelayanan_kesehatan` (`idPelayanan`, `idJenisPelayanan`, `idDaerah`, `namaPelayanan`, `lokasiPelayanan`, `lang`, `lat`, `photoPelayanan`, `keteranganPelayanan`, `statusPelayanan`, `dateCreated`) VALUES (1, 1, 1, 'Dinas Kesehatan Sumatera Selatan', 'Jalan Kapten A Rivai no 45', '106.6191648866334', '-6.246619582380244', 'logo-dinkes.png', 'Dinas Kesehatan Sumatera Selatan', 1, '2022-07-03 10:25:34');
INSERT INTO `tbl_pelayanan_kesehatan` (`idPelayanan`, `idJenisPelayanan`, `idDaerah`, `namaPelayanan`, `lokasiPelayanan`, `lang`, `lat`, `photoPelayanan`, `keteranganPelayanan`, `statusPelayanan`, `dateCreated`) VALUES (12, 2, 7, 'Rumah Sakit Daerah Kayu Agung', 'Rumah Sakit Daerah Kayu Agung                              ', '106.64851933934814', '-6.261806516093172', 'IMG-20200205-WA0099.jpg', 'Rumah Sakit Daerah Kayu Agung                  ', 1, '2022-07-03 10:07:34');
INSERT INTO `tbl_pelayanan_kesehatan` (`idPelayanan`, `idJenisPelayanan`, `idDaerah`, `namaPelayanan`, `lokasiPelayanan`, `lang`, `lat`, `photoPelayanan`, `keteranganPelayanan`, `statusPelayanan`, `dateCreated`) VALUES (13, 3, 4, 'Puskesmas Medang', 'Puskesmas Medang                                                ', '106.610065404632', '-6.2693145000042785', 'Picture1.png', 'Puskesmas Medang', 1, '2022-07-03 11:03:25');
INSERT INTO `tbl_pelayanan_kesehatan` (`idPelayanan`, `idJenisPelayanan`, `idDaerah`, `namaPelayanan`, `lokasiPelayanan`, `lang`, `lat`, `photoPelayanan`, `keteranganPelayanan`, `statusPelayanan`, `dateCreated`) VALUES (14, 2, 7, 'Rumah Sakit OKI', 'Rumah Sakit OKI', '106.64147389915064', '-6.260100141053154', 'IMG_20191024_104528_482.jpg', '                                                ', 1, '2022-07-06 06:54:44');
INSERT INTO `tbl_pelayanan_kesehatan` (`idPelayanan`, `idJenisPelayanan`, `idDaerah`, `namaPelayanan`, `lokasiPelayanan`, `lang`, `lat`, `photoPelayanan`, `keteranganPelayanan`, `statusPelayanan`, `dateCreated`) VALUES (15, 2, 2, 'Rumah Sakit Banyuasin', 'Rumah Sakit Banyuasin                                                ', '106.6474882993192', '-6.267266878742039', 'original.jpg', 'Rumah Sakit Banyuasin', 1, '2022-07-05 23:15:10');
INSERT INTO `tbl_pelayanan_kesehatan` (`idPelayanan`, `idJenisPelayanan`, `idDaerah`, `namaPelayanan`, `lokasiPelayanan`, `lang`, `lat`, `photoPelayanan`, `keteranganPelayanan`, `statusPelayanan`, `dateCreated`) VALUES (16, 3, 6, 'Puskesmas Banyuasin', 'Puskesmas Banyuasin                                                ', '106.65195613944444', '-6.238258048705209', 'original.jpg', '    Puskesmas Banyuasin                                            ', 1, '2022-07-05 23:23:59');


#
# TABLE STRUCTURE FOR: tbl_rule_access
#

DROP TABLE IF EXISTS `tbl_rule_access`;

CREATE TABLE `tbl_rule_access` (
  `idRuleAccess` int(11) NOT NULL AUTO_INCREMENT,
  `nameRule` varchar(50) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idRuleAccess`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO `tbl_rule_access` (`idRuleAccess`, `nameRule`, `dateCreated`) VALUES (1, 'Administrator', '2022-07-02 07:12:42');
INSERT INTO `tbl_rule_access` (`idRuleAccess`, `nameRule`, `dateCreated`) VALUES (2, 'Dinas Kesehatan', '2022-06-28 07:01:10');
INSERT INTO `tbl_rule_access` (`idRuleAccess`, `nameRule`, `dateCreated`) VALUES (3, 'Rumah Sakit', '2022-06-28 07:01:10');
INSERT INTO `tbl_rule_access` (`idRuleAccess`, `nameRule`, `dateCreated`) VALUES (4, 'Puskesmas', '2022-06-28 07:01:10');
INSERT INTO `tbl_rule_access` (`idRuleAccess`, `nameRule`, `dateCreated`) VALUES (5, 'Default', '2022-06-29 07:39:19');


#
# TABLE STRUCTURE FOR: tbl_sebaran
#

DROP TABLE IF EXISTS `tbl_sebaran`;

CREATE TABLE `tbl_sebaran` (
  `idSebaran` int(11) NOT NULL AUTO_INCREMENT,
  `idPelayananKesehatan` int(5) DEFAULT NULL,
  `idJenisPenyakit` int(5) DEFAULT NULL,
  `inputDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `totalInput` int(10) DEFAULT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateUpdated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idSebaran`),
  KEY `idPelayananKesehatan` (`idPelayananKesehatan`),
  KEY `idJenisPenyakit` (`idJenisPenyakit`),
  CONSTRAINT `tbl_sebaran_ibfk_1` FOREIGN KEY (`idPelayananKesehatan`) REFERENCES `tbl_pelayanan_kesehatan` (`idPelayanan`),
  CONSTRAINT `tbl_sebaran_ibfk_2` FOREIGN KEY (`idJenisPenyakit`) REFERENCES `tbl_jenis_penyakit` (`idJenisPenyakit`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

INSERT INTO `tbl_sebaran` (`idSebaran`, `idPelayananKesehatan`, `idJenisPenyakit`, `inputDate`, `totalInput`, `dateCreated`, `dateUpdated`) VALUES (1, 1, 1, '2022-07-05 22:35:51', 20, '2022-07-03 22:28:35', '0000-00-00 00:00:00');
INSERT INTO `tbl_sebaran` (`idSebaran`, `idPelayananKesehatan`, `idJenisPenyakit`, `inputDate`, `totalInput`, `dateCreated`, `dateUpdated`) VALUES (2, 1, 8, '2022-07-03 22:28:42', 10, '2022-07-03 22:28:39', '0000-00-00 00:00:00');
INSERT INTO `tbl_sebaran` (`idSebaran`, `idPelayananKesehatan`, `idJenisPenyakit`, `inputDate`, `totalInput`, `dateCreated`, `dateUpdated`) VALUES (3, 1, 1, '2022-07-05 22:36:04', 31, '2022-07-03 21:44:23', '0000-00-00 00:00:00');
INSERT INTO `tbl_sebaran` (`idSebaran`, `idPelayananKesehatan`, `idJenisPenyakit`, `inputDate`, `totalInput`, `dateCreated`, `dateUpdated`) VALUES (4, 1, 7, '2022-07-05 22:35:58', 4, '2022-07-03 21:45:34', '0000-00-00 00:00:00');
INSERT INTO `tbl_sebaran` (`idSebaran`, `idPelayananKesehatan`, `idJenisPenyakit`, `inputDate`, `totalInput`, `dateCreated`, `dateUpdated`) VALUES (5, 13, 8, '2022-07-03 00:00:00', 5, '2022-07-03 21:46:07', '0000-00-00 00:00:00');
INSERT INTO `tbl_sebaran` (`idSebaran`, `idPelayananKesehatan`, `idJenisPenyakit`, `inputDate`, `totalInput`, `dateCreated`, `dateUpdated`) VALUES (6, 1, 9, '2022-07-03 00:00:00', 5, '2022-07-03 22:27:28', '0000-00-00 00:00:00');
INSERT INTO `tbl_sebaran` (`idSebaran`, `idPelayananKesehatan`, `idJenisPenyakit`, `inputDate`, `totalInput`, `dateCreated`, `dateUpdated`) VALUES (7, 1, 7, '2022-07-03 00:00:00', 3, '2022-07-03 22:30:31', '0000-00-00 00:00:00');
INSERT INTO `tbl_sebaran` (`idSebaran`, `idPelayananKesehatan`, `idJenisPenyakit`, `inputDate`, `totalInput`, `dateCreated`, `dateUpdated`) VALUES (8, 13, 7, '2022-07-03 00:00:00', 3, '2022-07-03 22:30:51', '0000-00-00 00:00:00');
INSERT INTO `tbl_sebaran` (`idSebaran`, `idPelayananKesehatan`, `idJenisPenyakit`, `inputDate`, `totalInput`, `dateCreated`, `dateUpdated`) VALUES (9, 13, 1, '2022-07-03 00:00:00', 5, '2022-07-03 22:30:59', '0000-00-00 00:00:00');
INSERT INTO `tbl_sebaran` (`idSebaran`, `idPelayananKesehatan`, `idJenisPenyakit`, `inputDate`, `totalInput`, `dateCreated`, `dateUpdated`) VALUES (10, 13, 8, '2022-07-03 00:00:00', 6, '2022-07-03 22:31:09', '0000-00-00 00:00:00');
INSERT INTO `tbl_sebaran` (`idSebaran`, `idPelayananKesehatan`, `idJenisPenyakit`, `inputDate`, `totalInput`, `dateCreated`, `dateUpdated`) VALUES (11, 13, 9, '2022-07-03 00:00:00', 12, '2022-07-03 22:31:17', '0000-00-00 00:00:00');
INSERT INTO `tbl_sebaran` (`idSebaran`, `idPelayananKesehatan`, `idJenisPenyakit`, `inputDate`, `totalInput`, `dateCreated`, `dateUpdated`) VALUES (12, 1, 8, '2022-07-04 00:00:00', 12, '2022-07-04 18:57:54', '0000-00-00 00:00:00');
INSERT INTO `tbl_sebaran` (`idSebaran`, `idPelayananKesehatan`, `idJenisPenyakit`, `inputDate`, `totalInput`, `dateCreated`, `dateUpdated`) VALUES (13, 1, 8, '2022-07-04 00:00:00', 3, '2022-07-04 18:58:02', '0000-00-00 00:00:00');
INSERT INTO `tbl_sebaran` (`idSebaran`, `idPelayananKesehatan`, `idJenisPenyakit`, `inputDate`, `totalInput`, `dateCreated`, `dateUpdated`) VALUES (14, 1, 1, '2022-07-04 00:00:00', 23, '2022-07-04 18:58:10', '0000-00-00 00:00:00');
INSERT INTO `tbl_sebaran` (`idSebaran`, `idPelayananKesehatan`, `idJenisPenyakit`, `inputDate`, `totalInput`, `dateCreated`, `dateUpdated`) VALUES (15, 1, 9, '2022-07-01 00:00:00', 34, '2022-07-04 18:58:18', '0000-00-00 00:00:00');
INSERT INTO `tbl_sebaran` (`idSebaran`, `idPelayananKesehatan`, `idJenisPenyakit`, `inputDate`, `totalInput`, `dateCreated`, `dateUpdated`) VALUES (17, 1, 7, '2022-07-04 00:00:00', 98, '2022-07-04 18:59:50', '0000-00-00 00:00:00');
INSERT INTO `tbl_sebaran` (`idSebaran`, `idPelayananKesehatan`, `idJenisPenyakit`, `inputDate`, `totalInput`, `dateCreated`, `dateUpdated`) VALUES (18, 1, 8, '2022-07-04 00:00:00', 5, '2022-07-04 19:00:01', '0000-00-00 00:00:00');
INSERT INTO `tbl_sebaran` (`idSebaran`, `idPelayananKesehatan`, `idJenisPenyakit`, `inputDate`, `totalInput`, `dateCreated`, `dateUpdated`) VALUES (19, 1, 9, '2022-07-04 00:00:00', 16, '2022-07-04 19:00:14', '0000-00-00 00:00:00');
INSERT INTO `tbl_sebaran` (`idSebaran`, `idPelayananKesehatan`, `idJenisPenyakit`, `inputDate`, `totalInput`, `dateCreated`, `dateUpdated`) VALUES (20, 12, 1, '2022-07-04 00:00:00', 7, '2022-07-04 19:03:26', '0000-00-00 00:00:00');
INSERT INTO `tbl_sebaran` (`idSebaran`, `idPelayananKesehatan`, `idJenisPenyakit`, `inputDate`, `totalInput`, `dateCreated`, `dateUpdated`) VALUES (21, 12, 7, '2022-07-04 00:00:00', 9, '2022-07-04 19:03:33', '0000-00-00 00:00:00');
INSERT INTO `tbl_sebaran` (`idSebaran`, `idPelayananKesehatan`, `idJenisPenyakit`, `inputDate`, `totalInput`, `dateCreated`, `dateUpdated`) VALUES (22, 12, 8, '2022-07-04 00:00:00', 15, '2022-07-04 19:03:41', '0000-00-00 00:00:00');
INSERT INTO `tbl_sebaran` (`idSebaran`, `idPelayananKesehatan`, `idJenisPenyakit`, `inputDate`, `totalInput`, `dateCreated`, `dateUpdated`) VALUES (23, 12, 9, '2022-07-04 00:00:00', 12, '2022-07-04 19:03:48', '0000-00-00 00:00:00');
INSERT INTO `tbl_sebaran` (`idSebaran`, `idPelayananKesehatan`, `idJenisPenyakit`, `inputDate`, `totalInput`, `dateCreated`, `dateUpdated`) VALUES (25, 1, 1, '2022-07-05 00:00:00', 30, '2022-07-05 22:38:13', '0000-00-00 00:00:00');
INSERT INTO `tbl_sebaran` (`idSebaran`, `idPelayananKesehatan`, `idJenisPenyakit`, `inputDate`, `totalInput`, `dateCreated`, `dateUpdated`) VALUES (26, 15, 1, '2022-07-05 00:00:00', 40, '2022-07-05 23:16:11', '0000-00-00 00:00:00');
INSERT INTO `tbl_sebaran` (`idSebaran`, `idPelayananKesehatan`, `idJenisPenyakit`, `inputDate`, `totalInput`, `dateCreated`, `dateUpdated`) VALUES (27, 15, 7, '2022-07-05 00:00:00', 90, '2022-07-05 23:16:20', '0000-00-00 00:00:00');
INSERT INTO `tbl_sebaran` (`idSebaran`, `idPelayananKesehatan`, `idJenisPenyakit`, `inputDate`, `totalInput`, `dateCreated`, `dateUpdated`) VALUES (28, 15, 8, '2022-07-05 00:00:00', 125, '2022-07-05 23:16:29', '0000-00-00 00:00:00');
INSERT INTO `tbl_sebaran` (`idSebaran`, `idPelayananKesehatan`, `idJenisPenyakit`, `inputDate`, `totalInput`, `dateCreated`, `dateUpdated`) VALUES (29, 15, 9, '2022-07-05 00:00:00', 43, '2022-07-05 23:16:36', '0000-00-00 00:00:00');
INSERT INTO `tbl_sebaran` (`idSebaran`, `idPelayananKesehatan`, `idJenisPenyakit`, `inputDate`, `totalInput`, `dateCreated`, `dateUpdated`) VALUES (30, 15, 1, '2022-07-06 00:00:00', 76, '2022-07-05 23:16:51', '0000-00-00 00:00:00');
INSERT INTO `tbl_sebaran` (`idSebaran`, `idPelayananKesehatan`, `idJenisPenyakit`, `inputDate`, `totalInput`, `dateCreated`, `dateUpdated`) VALUES (31, 15, 8, '2022-07-06 00:00:00', 56, '2022-07-05 23:17:39', '0000-00-00 00:00:00');
INSERT INTO `tbl_sebaran` (`idSebaran`, `idPelayananKesehatan`, `idJenisPenyakit`, `inputDate`, `totalInput`, `dateCreated`, `dateUpdated`) VALUES (32, 15, 9, '2022-07-06 00:00:00', 6, '2022-07-05 23:17:47', '0000-00-00 00:00:00');
INSERT INTO `tbl_sebaran` (`idSebaran`, `idPelayananKesehatan`, `idJenisPenyakit`, `inputDate`, `totalInput`, `dateCreated`, `dateUpdated`) VALUES (33, 15, 7, '2022-07-07 00:00:00', 45, '2022-07-05 23:17:54', '0000-00-00 00:00:00');
INSERT INTO `tbl_sebaran` (`idSebaran`, `idPelayananKesehatan`, `idJenisPenyakit`, `inputDate`, `totalInput`, `dateCreated`, `dateUpdated`) VALUES (34, 16, 7, '2022-07-05 00:00:00', 78, '2022-07-05 23:22:13', '0000-00-00 00:00:00');
INSERT INTO `tbl_sebaran` (`idSebaran`, `idPelayananKesehatan`, `idJenisPenyakit`, `inputDate`, `totalInput`, `dateCreated`, `dateUpdated`) VALUES (35, 16, 7, '2022-07-05 00:00:00', 6, '2022-07-05 23:22:20', '0000-00-00 00:00:00');
INSERT INTO `tbl_sebaran` (`idSebaran`, `idPelayananKesehatan`, `idJenisPenyakit`, `inputDate`, `totalInput`, `dateCreated`, `dateUpdated`) VALUES (36, 16, 8, '2022-07-05 00:00:00', 34, '2022-07-05 23:22:28', '0000-00-00 00:00:00');
INSERT INTO `tbl_sebaran` (`idSebaran`, `idPelayananKesehatan`, `idJenisPenyakit`, `inputDate`, `totalInput`, `dateCreated`, `dateUpdated`) VALUES (37, 16, 9, '2022-07-05 00:00:00', 2, '2022-07-05 23:22:35', '0000-00-00 00:00:00');
INSERT INTO `tbl_sebaran` (`idSebaran`, `idPelayananKesehatan`, `idJenisPenyakit`, `inputDate`, `totalInput`, `dateCreated`, `dateUpdated`) VALUES (38, 14, 1, '2022-07-09 00:00:00', 12, '2022-07-06 06:55:48', '0000-00-00 00:00:00');
INSERT INTO `tbl_sebaran` (`idSebaran`, `idPelayananKesehatan`, `idJenisPenyakit`, `inputDate`, `totalInput`, `dateCreated`, `dateUpdated`) VALUES (39, 14, 7, '2022-07-06 00:00:00', 120, '2022-07-06 06:55:57', '0000-00-00 00:00:00');
INSERT INTO `tbl_sebaran` (`idSebaran`, `idPelayananKesehatan`, `idJenisPenyakit`, `inputDate`, `totalInput`, `dateCreated`, `dateUpdated`) VALUES (40, 14, 8, '2022-07-07 00:00:00', 20, '2022-07-06 06:56:05', '0000-00-00 00:00:00');
INSERT INTO `tbl_sebaran` (`idSebaran`, `idPelayananKesehatan`, `idJenisPenyakit`, `inputDate`, `totalInput`, `dateCreated`, `dateUpdated`) VALUES (41, 14, 9, '2022-07-06 00:00:00', 30, '2022-07-06 06:56:15', '0000-00-00 00:00:00');


#
# TABLE STRUCTURE FOR: tbl_user
#

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `idRuleAccess` int(3) NOT NULL,
  `idPelayananKesehatan` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `handphone` varchar(15) NOT NULL,
  `statusUser` int(1) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tokenCreated` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idUser`),
  KEY `idRuleAccess` (`idRuleAccess`),
  KEY `idPelayananKesehatan` (`idPelayananKesehatan`),
  CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`idRuleAccess`) REFERENCES `tbl_rule_access` (`idRuleAccess`),
  CONSTRAINT `tbl_user_ibfk_2` FOREIGN KEY (`idPelayananKesehatan`) REFERENCES `tbl_pelayanan_kesehatan` (`idPelayanan`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;

INSERT INTO `tbl_user` (`idUser`, `idRuleAccess`, `idPelayananKesehatan`, `username`, `email`, `password`, `handphone`, `statusUser`, `dateCreated`, `tokenCreated`) VALUES (55, 5, 1, 'amal@gmail.com', 'amal@gmail.com', '$2y$10$CSp.xBE8RT2esf7JPbjnru5FNQEyEJSxETJwBbajmviN8MlvbLqz2', '082280524264', 1, '2022-07-07 15:17:36', 'wayJizjp');
INSERT INTO `tbl_user` (`idUser`, `idRuleAccess`, `idPelayananKesehatan`, `username`, `email`, `password`, `handphone`, `statusUser`, `dateCreated`, `tokenCreated`) VALUES (57, 1, 16, 'ikhlasul0507@gmail.com', 'ikhlasul0507@gmail.com', '$2y$10$lROI1p510jog3fBK.UHz5eLj1KikSsmSaABEUoWuk58zx2QCJnmyO', '082280524264', 1, '2022-07-06 06:25:34', '');
INSERT INTO `tbl_user` (`idUser`, `idRuleAccess`, `idPelayananKesehatan`, `username`, `email`, `password`, `handphone`, `statusUser`, `dateCreated`, `tokenCreated`) VALUES (68, 3, 15, 'hetty', 'hay@gmail.com', '$2y$10$BLkAdFhzIHBCPFa.UpRnp./P8bEa2ihq38QPdiJ8.SmFVtbVbXix2', '082280524264', 1, '2022-07-05 23:19:06', '');
INSERT INTO `tbl_user` (`idUser`, `idRuleAccess`, `idPelayananKesehatan`, `username`, `email`, `password`, `handphone`, `statusUser`, `dateCreated`, `tokenCreated`) VALUES (69, 1, 1, 'hmeileni@gmail.com', 'ikhlasul0507@gmail.com12', '$2y$10$YDs1JUWvxV1LPkRdvot1euc0xjW4ZNQkYUQkl/L2eaqV5kKU2Le7e', '082280524264', 1, '2022-07-01 09:14:21', '');
INSERT INTO `tbl_user` (`idUser`, `idRuleAccess`, `idPelayananKesehatan`, `username`, `email`, `password`, `handphone`, `statusUser`, `dateCreated`, `tokenCreated`) VALUES (71, 4, 14, 'kris', 'kris', '$2y$10$Yt50kzehmciHKQDGcYlUO.H4kVPq0dg1yYFzuysEOG/uf9utzQDTS', '082280524264', 1, '2022-07-06 06:56:29', '');


