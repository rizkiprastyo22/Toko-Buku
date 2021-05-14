DROP DATABASE IF EXISTS `toko_ubur`;
CREATE DATABASE `toko_ubur`;
USE `toko_ubur`;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('administrator','pelanggan') NOT NULL DEFAULT 'administrator',
  `active` enum('aktif','tidak aktif') NOT NULL DEFAULT 'aktif',
  `last_login` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Toko Ubur Ubur', 'admin@tokoubur.id', '$2y$10$msjK0HDeOOHMyOJXM7jY6Oc09YuslmGZV18BekjJ2i1acDQ6PPq/C', 'administrator', 'aktif', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('2', 'Sheilla Anjani', 'sheilla.anjani@gmail.com', '$2y$10$msjK0HDeOOHMyOJXM7jY6Oc09YuslmGZV18BekjJ2i1acDQ6PPq/C', 'pelanggan', 'aktif', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for data buku
-- ----------------------------
DROP TABLE IF EXISTS `buku`;
CREATE TABLE `buku`
(
   `id` INT(11) NOT NULL AUTO_INCREMENT,
   `nisn` varchar(50) NOT NULL,
   `judul` varchar(50) NOT NULL,
   `pengarang` varchar(50),
   `stock` INT(5),
   `harga` varchar(50) NOT NULL,
   `deskripsi` varchar(500) NOT NULL,
    `foto` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of data buku
-- ----------------------------
INSERT INTO `buku` VALUES (1, '281120001', 'Sebuah Seni untuk Bersikap Bodo Amat', 'Mark Manson', 10, 67000, 'Buku ini tidak berbicara bagaimana cara meringankan masalah atau rasa sakit, Namun, buku ini akan mengubah rasa sakit menjadi kekuatan dan mengubahnya menjadi lebih baik.','SeniBersikapBodoAmat_01.png');
INSERT INTO `buku` VALUES (2, '281120002', 'Nanti Kita Cerita Tentang Hari Ini', 'Marchella FP', 5, 125000, 'NKCTHI merupakan kumpulan tulisan yang merefleksikan pengalaman personal banyak orang. Marcella menghimpun ribuan cerita dari berbagai sudut pandang.','NKCTHI_02.jpg');
INSERT INTO `buku` VALUES (3, '281120003', 'Shine', 'Jesica Jung', 1, 104250, 'Buku ini secara garis besar menceritakan tentang kehidupan seorang remaja yang bernama Rachel Kim, dimana ia diceritakan mengalami banyak struggle dalam menjalani kehidupannya.','Shine_03.jpg');
INSERT INTO `buku` VALUES (4, '281120004', 'Nebula', 'Tere Liye', 2, 63750, 'Bercerita tentang masa muda Selena yang nantinya akan menjadi guru matematika kesayangan Raib, Seli, dan Ali di dunia Klan Bumi.','Nebula_04.png');
INSERT INTO `buku` VALUES (5, '281120005', 'Inestable', 'Eko Viano Winata', 6, 52000, 'Buku ini bercerita tentang kegembiraan Aluna setelah kembali bertemu dengan Nakula yang sebelumnya mereka menjalani hubungan jarak jauh saat Nakula menemui adiknya.','Inestable_05.png');

-- ----------------------------
-- Table structure for data pembeli
-- ----------------------------
DROP TABLE IF EXISTS `pembeli`;
CREATE TABLE `pembeli`
(
   `id` INT(11) NOT NULL AUTO_INCREMENT,
   `email` INT(11),
   `judul` INT(11),
   `jumlah` INT(5),
   FOREIGN KEY (email) REFERENCES users(id),
   FOREIGN KEY (judul) REFERENCES buku(id),
   PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


-- ----------------------------
-- Table structure for data pembeli
-- ----------------------------
DROP TABLE IF EXISTS `topup`;
CREATE TABLE `topup`
(
   `id` INT(11) NOT NULL AUTO_INCREMENT,
   `email` INT(11),
   `topup` INT(11),
   FOREIGN KEY (email) REFERENCES users(id),
   PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

SELECT *
FROM pembeli
   INNER JOIN
   users
   ON pembeli.email = users.id
   INNER JOIN
   buku
   ON pembeli.judul = buku.id
   WHERE pembeli.transaksi IS NULL;