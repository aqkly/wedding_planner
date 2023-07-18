/*
 Navicat Premium Data Transfer

 Source Server         : local_asli
 Source Server Type    : MySQL
 Source Server Version : 100138
 Source Host           : localhost:3306
 Source Schema         : wedding_new

 Target Server Type    : MySQL
 Target Server Version : 100138
 File Encoding         : 65001

 Date: 18/07/2023 19:25:46
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `email` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `username` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `akses_level` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tanggal` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (1, 'admin@gmail.com', 'admin1', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Admin', '2023-07-17 08:14:58');

-- ----------------------------
-- Table structure for konfigurasi
-- ----------------------------
DROP TABLE IF EXISTS `konfigurasi`;
CREATE TABLE `konfigurasi`  (
  `id_konfigurasi` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `namaweb` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tagline` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `telepon` varchar(24) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` varchar(300) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `website` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_rek` varchar(300) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `keywords` varchar(300) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `metatext` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `map` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `logo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `facebook` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `instagram` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_konfigurasi`) USING BTREE,
  INDEX `id_user`(`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of konfigurasi
-- ----------------------------
INSERT INTO `konfigurasi` VALUES (2, 1, 'RUMAH RIAS YASMINE', 'RUMAH RIAS YASMINE', 'admin@gmail.com', '087735282147', 'Jl. Gegerkalong Hilir No.117, Sukarasa, Kec. Sukasari, Kota Bandung, Jawa Barat 40153', '', '111.0493.4930 (MANDIRI)', '', '', '', 'logo.png', 'logo.png', 'https://facebook.com/', 'https://instagram.com/', '2023-07-16 18:18:41');

-- ----------------------------
-- Table structure for kostum
-- ----------------------------
DROP TABLE IF EXISTS `kostum`;
CREATE TABLE `kostum`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `harga` decimal(16, 2) NULL DEFAULT NULL,
  `deskripsi` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `foto` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` tinyint(1) NULL DEFAULT 1 COMMENT '1 = AKTIF, 0 atau null = NON AKTIF',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of kostum
-- ----------------------------
INSERT INTO `kostum` VALUES (1, 'Baju Adat Sunda', 1000000.00, NULL, 'sunda.jpg', 1);
INSERT INTO `kostum` VALUES (2, 'Baju Adat Jawa', 2000000.00, NULL, 'jawa.jpg', 1);
INSERT INTO `kostum` VALUES (3, 'TES2', 600000.00, 'TESS2', NULL, 0);

-- ----------------------------
-- Table structure for makeup
-- ----------------------------
DROP TABLE IF EXISTS `makeup`;
CREATE TABLE `makeup`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `harga` decimal(16, 2) NULL DEFAULT NULL,
  `deskripsi` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `foto` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` tinyint(1) NULL DEFAULT 1 COMMENT '1 = AKTIF, 0 atau null = NON AKTIF',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of makeup
-- ----------------------------
INSERT INTO `makeup` VALUES (1, 'Look Sunda', 1000000.00, 'Makeup sunda', 'ini_makeup.jpg', 1);
INSERT INTO `makeup` VALUES (2, 'MAKE UP + HIJAB DO CPW', 5000000.00, 'tes', NULL, 0);
INSERT INTO `makeup` VALUES (3, 'Aneka Olahan Ikan', 4000000.00, 'Mungkin yang terbayang dari benak kalian adalah, jika mengkonsumsi ikan di acara pernikahan, pasti rasanya ribet. Sebab kita harus memisahkan duri dan ikan.\r\n\r\nTapi sebenarnya tergantung olahan dari ikan itu sendiri serta jenisnya.', NULL, 0);
INSERT INTO `makeup` VALUES (4, 'TES2', 20000.00, 'TES2', NULL, 0);
INSERT INTO `makeup` VALUES (5, 'Look Jawa', 1200000.00, 'Makeup Jawa', 'makeup.jpg', 1);

-- ----------------------------
-- Table structure for musik
-- ----------------------------
DROP TABLE IF EXISTS `musik`;
CREATE TABLE `musik`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_musik` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `harga` decimal(16, 2) NULL DEFAULT NULL,
  `deskripsi` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `foto` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` tinyint(1) NULL DEFAULT 1 COMMENT '1 = aktif, 0 = non-aktif',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of musik
-- ----------------------------
INSERT INTO `musik` VALUES (1, 'POP', 8500000.00, 'Pop menjadi salah satu genre musik yang digemari oleh banyak kalangan, dan di tanah air sendiri aliran musik pop masih sangat populer dibawakan para penyanyi maupun band. Nah untuk itu musik pop menjadi salah satu musik pernikahan yang bisa disuguhkan karena mungkin setiap orang mengetahui genre musik ini.', 'pop.jpg', 1);
INSERT INTO `musik` VALUES (2, 'DANGDUT', 12000000.00, 'Sebagai salah satu musik asli dari Indonesia, dangdut bisa menjadi salah satu genre musik yang bisa digunakan untuk acara pernikahan. Harus diakui musik dangdut yang riang bersama hentakan yang berirama membuat siapapun ingin bergoyang, dan bukan tidak mungkin alunan dangdut akan membangkitkan suasana pesta agar terlihat lebih hidup lagi.', 'dangdut.jpg', 1);
INSERT INTO `musik` VALUES (3, 'QASIDAH', 3000000.00, 'Qasidah juga merupakan seni suara yang bernafaskan Islam, dimana lagu-lagunya banyak mengandung unsur-unsur dakwah Islamiyah dan nasihat-nasihat baik sesuai ajaran Islam. Biasanya lagu-lagu itu dinyanyikan dengan irama penuh kegembiraan yang menyerupai irama-irama Timur Tengah dengan diiringi rebana.', 'qasidah.jpg', 1);
INSERT INTO `musik` VALUES (4, 'Jazz2', 20000.00, 'TESS', 'media_order.PNG', 0);

-- ----------------------------
-- Table structure for paket
-- ----------------------------
DROP TABLE IF EXISTS `paket`;
CREATE TABLE `paket`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_paket` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `berisi` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `harga` decimal(16, 2) NULL DEFAULT NULL,
  `deskripsi` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `status` tinyint(1) NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of paket
-- ----------------------------
INSERT INTO `paket` VALUES (1, 'PAKET 1', NULL, 20000000.00, 'TES', 0);
INSERT INTO `paket` VALUES (2, 'PAKET 2', NULL, 30000000.00, 'TES', 0);
INSERT INTO `paket` VALUES (3, 'PAKET 3', NULL, 40000000.00, 'TES', 0);
INSERT INTO `paket` VALUES (4, 'Paket 4', NULL, 40000000.00, 'OK', 0);
INSERT INTO `paket` VALUES (5, 'PACKAGE 1', '<p>MAKE UP + HIJAB<br>DO CPW<br>1 SET KOSTUM<br>AKAD<br>1 SET MELATI FRESH<br>1 SET DEKORASI<br>AKAD<br>FRESH FLOWERS<br>ALAT PERASMAN<br>(100 SET PIRING DAN<br>GARFU)<br>1 ALBUM FOTO</p>', 5000000.00, 'Paket 1', 1);
INSERT INTO `paket` VALUES (6, 'PACKAGE 2', '<p>MAKE UP + HIJAB DO<br>CPW<br>1 SET KOSTUM AKAD<br>CWP &amp; CPP<br>1 SET MELATI FRESH<br>HENNA + KUKU<br>SOFTLENS<br>1 SET KOSTUM RESEPSI<br>2 MAKE UP + HIJAB DO &amp;<br>2 STYLE COSTUM IBU<br>CPW &amp; CPP<br>2 BESKAP BAPA CPW<br>DAN CPP<br>2 MAKE UP + COSTUM<br>PERASMAN<br>4 MAKEUP + COSTUM<br>PAGAR AYU<br>2 BESKAP AGAR BAGUS</p>', 6000000.00, 'Paket 2', 1);
INSERT INTO `paket` VALUES (7, 'PACKAGE 3', '<p>MAKE UP + HIJAB DO<br>CPW<br>1 SET KOSTUM AKAD<br>CWP &amp; CPP<br>1 SET MELATI FRESH<br>HENNA + KUKU<br>SOFTLENS<br>1 SET KOSTUM RESEPSI<br>2 MAKE UP + HIJAB DO &amp;<br>2 STYLE COSTUM IBU<br>CPW &amp; CPP<br>2 BESKAP BAPA CPW DAN<br>CPP<br>2 MAKE UP + COSTUM<br>PERASMAN<br>4 MAKEUP + COSTUM<br>PAGAR AYU<br>2 BESKAP AGAR BAGUS<br>DEKORASI PELAMINAN<br>BUNGA PLASTIK<br>FOTO &amp; VIDEO<br>100 PCS KURSI + SARUNG<br>1 SET MEJA PERASMAN<br>100 SET PIRING, SENDOK<br>&amp; GARFU<br>1 SET PEMANAS<br>PANGGUNG HIBURAN +<br>SOUND<br>TENDA<br>1 SET MEJA TAMU<br>SOUND SYSTEM</p>', 12000000.00, 'Paket 3', 1);
INSERT INTO `paket` VALUES (8, 'PACKAGE 4', '<p>MAKE UP + HIJAB DO CPW (AKAD &amp;<br>RESEPSI)<br>1 SET COSTUM AKAD CPW &amp; CPP<br>2 SET COSTUM RESEPSI CPW &amp; CPP<br>MAKE UP &amp; COSTUM IBU CPW &amp;<br>CPP<br>2 BESKAP BAPAK CPW &amp; CPP<br>4 SET BAJU MAKEUP HIJAB DO<br>PAGAR AYU<br>4 SET MAKEUP HIJAB DO<br>PARASMAN<br>2 BESKAP PAGAR BAGUS<br>1 SET MELATI FRESH<br>HENNA + KUKU<br>SOFTLENS<br>DEKORASI PELAMINAN BUNGA<br>ASLI<br>GALERI<br>1 LORONG LENGKUNG<br>2 STANDING JALAN<br>TENDA 100 M<br>PANGGUNG HIBURAN + SOUND<br>100 PCS KURSI PLASTIK &amp; SARUNG<br>1 SET MEJA PERASMAN<br>1 SET PEMANAS<br>100 PCS PIRING, SENDOK &amp; GARFU<br>2 SET MEJA POJOKAN<br>1 SET MEJA TAMU<br>FOTO &amp; VIDEO<br>MUSIK<br>(ORGAN/QOSIDAH/MARAWIS)<br>1 JANUR/BLOWER</p>', 17000000.00, 'Paket 4', 1);
INSERT INTO `paket` VALUES (9, 'PACKAGE 5', '<p>MAKE UP + HIJAB DO CPW (AKAD &amp;<br>RESEPSI)<br>1 SET COSTUM AKAD CPW &amp; CPP<br>2 SET COSTUM RESEPSI CPW &amp; CPP<br>MAKE UP &amp; COSTUM IBU CPW &amp;<br>CPP<br>MAKE UP &amp; FOTO PRE-WEDDING<br>2 BESKAP BAPAK CPW &amp; CPP<br>4 SET BAJU MAKEUP HIJAB DO<br>PAGAR AYU<br>4 SET MAKEUP HIJAB DO<br>PARASMAN<br>2 BESKAP PAGAR BAGUS<br>1 SET MELATI FRESH<br>HENNA + KUKU<br>SOFTLENS<br>DEKORASI PELAMINAN BUNGA<br>ASLI<br>PHOTOBOOTH<br>1 LORONG LENGKUNG<br>2 STANDING JALAN<br>TENDA 100 M<br>PANGGUNG HIBURAN + SOUND<br>100 PCS KURSI PLASTIK &amp; SARUNG<br>1 SET MEJA PERASMAN<br>1 SET PEMANAS ROLL TOP<br>150 PCS PIRING, SENDOK &amp; GARFU<br>3 SET MEJA POJOKAN<br>1 SET MEJA TAMU<br>FOTO &amp; VIDEO<br>MC AKAD NIKAH (SUNGKEMAN,<br>SAWERAN, PATARIK BAKAKAK)<br>MUSIK<br>(ORGAN/QOSIDAH/MARAWIS)<br>1 JANUR/BLOWER<br>HAND BOUQUET FRESH<br>2 SET MEJA VIP</p>', 20000000.00, 'Paket 5', 1);
INSERT INTO `paket` VALUES (10, 'PACKAGE 6', '<p>MAKE UP + HIJAB DO CPW (AKAD &amp;<br>RESEPSI)<br>1 SET COSTUM AKAD CPW &amp; CPP<br>2 SET COSTUM RESEPSI CPW &amp; CPP<br>MAKE UP &amp; COSTUM IBU CPW &amp; CPP<br>MAKE UP &amp; FOTO PRE-WEDDING<br>2 BESKAP BAPAK CPW &amp; CPP<br>4 SET BAJU MAKEUP HIJAB DO PAGAR AYU<br>4 SET MAKEUP HIJAB DO PARASMAN<br>2 BESKAP PAGAR BAGUS<br>1 SET MELATI FRESH<br>HENNA + KUKU<br>SOFTLENS<br>DEKORASI PELAMINAN BUNGA ASLI<br>PHOTOBOOTH<br>2 LORONG LENGKUNG<br>2 STANDING JALAN<br>TENDA 100 M<br>PANGGUNG HIBURAN + SOUND<br>100 PCS KURSI PLASTIK &amp; SARUNG<br>1 SET MEJA PERASMAN<br>1 SET PEMANAS ROLL TOP<br>150 PCS PIRING, SENDOK &amp; GARFU<br>3 SET MEJA POJOKAN<br>1 SET MEJA TAMU<br>FOTO &amp; VIDEO<br>MC AKAD NIKAH (SUNGKEMAN,<br>SAWERAN, PATARIK BAKAKAK)<br>MUSIK (SEMI BAND/ POP/DANGDUT)<br>1 JANUR/BLOWER<br>HAND BOUQUET FRESH<br>2 SET MEJA VIP<br>SIRAMAN (DEKORASI, FOTO)<br>MC SIRAMAN / JURU KAWIH &amp; KECAPI<br>LIVE<br>1 SET COSTUM MELATI FRESH SIRAMAN<br>UPACARA ADAT (KASET AUDIO)</p>', 25000000.00, 'Paket 6', 1);
INSERT INTO `paket` VALUES (11, 'PACKAGE 7', '<p>MAKE UP + HIJAB DO CPW (AKAD &amp; RESEPSI)<br>1 SET COSTUM AKAD CPW &amp; CPP<br>2 SET COSTUM RESEPSI CPW &amp; CPP<br>MAKE UP &amp; COSTUM IBU CPW &amp; CPP<br>MAKE UP &amp; FOTO PRE-WEDDING<br>2 BESKAP BAPAK CPW &amp; CPP<br>4 SET BAJU MAKEUP HIJAB DO PAGAR AYU<br>4 SET MAKEUP HIJAB DO PARASMAN<br>2 BESKAP PAGAR BAGUS<br>1 SET MELATI FRESH<br>HENNA + KUKU<br>SOFTLENS<br>DEKORASI PELAMINAN BUNGA ASLI<br>PHOTOBOOTH<br>2 LORONG LENGKUNG<br>2 STANDING JALAN<br>TENDA 100 M<br>PANGGUNG HIBURAN + SOUND<br>100 PCS KURSI PLASTIK &amp; SARUNG<br>1 SET MEJA PERASMAN<br>1 SET PEMANAS ROLL TOP<br>200 PCS PIRING, SENDOK &amp; GARFU<br>3 SET MEJA POJOKAN<br>1 SET MEJA TAMU<br>FOTO &amp; VIDEO<br>MC AKAD NIKAH (SUNGKEMAN, SAWERAN,<br>PATARIK BAKAKAK)<br>MUSIK (SEMI BAND/POP/DANGDUT)<br>1 JANUR/BLOWER<br>HAND BOUQUET FRESH<br>2 SET MEJA VIP<br>SIRAMAN (DEKORASI, FOTO)<br>MC SIRAMAN / JURU KAWIH &amp; KECAPI LIVE<br>1 SET COSTUM MELATI FRESH SIRAMAN<br>UPACARA ADAT (KASET AUDIO)<br>WO ( 3 CREW)<br>2 BUAH BUKU TAMU</p>', 30000000.00, 'Paket 7', 1);

-- ----------------------------
-- Table structure for photo
-- ----------------------------
DROP TABLE IF EXISTS `photo`;
CREATE TABLE `photo`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_fotographer` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nama` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `harga` decimal(16, 2) NULL DEFAULT NULL,
  `deskripsi` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `foto` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` tinyint(1) NULL DEFAULT 1 COMMENT '1 = AKTIF, 0 atau null = NON AKTIF',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of photo
-- ----------------------------
INSERT INTO `photo` VALUES (1, NULL, 'Pre Wedding', 1500000.00, 'Sebelum nikah', NULL, 0);
INSERT INTO `photo` VALUES (2, 'NAUFAL', 'FOTO', 1500000.00, 'Foto Saja', 'wedding.jpg', 1);
INSERT INTO `photo` VALUES (3, 'NAUFAL', 'FOTO + VIDEO (CIMETIC)', 3000000.00, 'Foto + Video', 'wedding.jpg', 1);
INSERT INTO `photo` VALUES (4, 'ADI', 'FOTO + VIDEO (DOKUMENTER)', 5000000.00, 'Foto + Video', 'photo.jpg', 1);

-- ----------------------------
-- Table structure for tema
-- ----------------------------
DROP TABLE IF EXISTS `tema`;
CREATE TABLE `tema`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_tema` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `harga` decimal(16, 2) NULL DEFAULT NULL,
  `deskripsi` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `foto` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` tinyint(1) NULL DEFAULT 1 COMMENT '1 = AKTIF, 0 atau null = NON AKTIF',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tema
-- ----------------------------
INSERT INTO `tema` VALUES (1, 'Mewah/Glamor', 6500000.00, 'Tema pernikahan yang mengusung konsep mewah tidak terlepas dari pemandangan yang gemerlap. Pernikahan dengan konsep ini umumnya dipenuhi dengan dekorasi-dekorasi mewah mulai dari display ornamen utama hingga penampilan untuk tamu.\r\n\r\nWarna-warna yang biasanya diusung pada tema pernikahan mewah umumnya berwarna silver, putih, dan emas. Pernikahan dengan tema mewah dan glamor biasanya membutuhkan tempat atau ruangan yang luas', 'mewah.jpg', 1);
INSERT INTO `tema` VALUES (2, 'Rustic', 4300000.00, 'Tema pernikahan selanjutnya adalah rustic, Biasanya tema ini menjadi favorit dari para wanita karena konsep ini mengusung sisi romantisme dan feminisme yang kental.\r\n\r\nTema rustic mengusung warna-warna pastel serta motif-motif bunga dalam dekorasinya. Hanya saja, tema pernikahan rustic lebih condong kepada konsep vintage dan unsur-unsur kayu.', 'rustic.jpg', 1);
INSERT INTO `tema` VALUES (3, 'Shabby Chic', 4500000.00, 'Tema pernikahan berikutnya adalah shabby chic yang tidak terlalu berbeda dengan rustic. Namun, tema pernikahan shabby chic lebih mengusung pemilihan warna pink dan pastel dalam dekorasinya.\r\n\r\nPemilihan warna yang lebih cerah membuat dekorasi dalam tema ini terlihat lebih ramai dari rustic, namun tetap mengusung sisi romantisme dari pesta pernikahan.', 'shabby.jpg', 1);
INSERT INTO `tema` VALUES (4, 'TES22', 30000.00, 'TEASDAA2', 'Use-Case-Iklan-Baru1.png', 0);

-- ----------------------------
-- Table structure for tempat
-- ----------------------------
DROP TABLE IF EXISTS `tempat`;
CREATE TABLE `tempat`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_lokasi` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `alamat` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `harga` decimal(16, 2) NULL DEFAULT NULL,
  `deskripsi` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `foto` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` tinyint(1) NULL DEFAULT 1 COMMENT '1 = aktif, 2 = non',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tempat
-- ----------------------------
INSERT INTO `tempat` VALUES (1, 'GOR PLERED', 'Plered', 2000000.00, 'GOR DEKAT DESA PLERED', NULL, 1);
INSERT INTO `tempat` VALUES (2, 'GOR CITEKO', 'Citeko', 1500000.00, 'GOR CITEKO', NULL, 1);
INSERT INTO `tempat` VALUES (3, 'GOR BABAKAN SARI', 'Plered', 4000000.00, 'GORRR', NULL, 0);

-- ----------------------------
-- Table structure for transaksi
-- ----------------------------
DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` datetime NULL DEFAULT NULL,
  `no_transaksi` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nama_pemesan` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `alamat` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `id_admin` int NULL DEFAULT NULL,
  `id_user` int NULL DEFAULT NULL,
  `tgl_booking` date NULL DEFAULT NULL,
  `jenis_booking` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_tema` int NULL DEFAULT NULL,
  `id_musik` int NULL DEFAULT NULL,
  `id_makeup` int NULL DEFAULT NULL,
  `id_photo` int NULL DEFAULT NULL,
  `id_kostum` int NULL DEFAULT NULL,
  `id_paket` int NULL DEFAULT NULL,
  `total_harga` decimal(16, 2) NULL DEFAULT NULL,
  `jth_tempo_bayar` datetime NULL DEFAULT NULL,
  `status` tinyint(1) NULL DEFAULT 1 COMMENT '1 = baru, 2 = menunggu bayar, 3 = bayar sebagian, 4 = bayar full, 5 = batal',
  `ket` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of transaksi
-- ----------------------------
INSERT INTO `transaksi` VALUES (1, '2023-07-16 13:38:14', '202307-001', 'Aqkly hermawan', 'TES', NULL, 1, '2023-07-16', 'paketan', 0, 0, 0, 0, 0, 6, 6000000.00, '2023-07-17 13:38:14', 4, 'TES');
INSERT INTO `transaksi` VALUES (2, '2023-07-16 13:52:52', '202307-002', 'ISMA', 'TES alamat', NULL, 1, '2023-07-17', 'custom', 1, 1, 1, 2, 0, 0, 17500000.00, '2023-07-17 13:52:52', 2, 'TES');

-- ----------------------------
-- Table structure for transaksi_detail
-- ----------------------------
DROP TABLE IF EXISTS `transaksi_detail`;
CREATE TABLE `transaksi_detail`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_transaksi` int NULL DEFAULT NULL,
  `tgl_bayar` date NULL DEFAULT NULL,
  `total_bayar` decimal(16, 2) NULL DEFAULT NULL,
  `bukti_bayar` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of transaksi_detail
-- ----------------------------
INSERT INTO `transaksi_detail` VALUES (3, 1, '2023-07-16', 3000000.00, 'dash1.PNG');
INSERT INTO `transaksi_detail` VALUES (4, 1, '2023-07-16', 3000000.00, 'ap3.PNG');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `no_hp` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `alamat` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'DENI', 'deni@deni.com', '987434745', 'Kp. ada ada', 'deni', '123456');
INSERT INTO `user` VALUES (5, 'Aqkly hermawan', 'aqklyhermawan@gmail.com', '+628994501518', 'kp. Empang sari rt 12/04 plered', 'aqlyplered', '12345678');

SET FOREIGN_KEY_CHECKS = 1;
