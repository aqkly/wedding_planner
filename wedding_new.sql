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

 Date: 02/07/2023 20:29:31
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
INSERT INTO `admin` VALUES (1, 'admin@gmail.com', 'admin1', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Admin', '2023-07-02 15:09:56');

-- ----------------------------
-- Table structure for catering
-- ----------------------------
DROP TABLE IF EXISTS `catering`;
CREATE TABLE `catering`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_catering` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `harga` decimal(16, 2) NULL DEFAULT NULL,
  `deskripsi` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `foto` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` tinyint(1) NULL DEFAULT 1 COMMENT '1 = AKTIF, 0 atau null = NON AKTIF',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of catering
-- ----------------------------
INSERT INTO `catering` VALUES (1, 'Aneka Tumis', 2000000.00, ' pada olahan ini, harus ada sayurannya. Kalau tidak ada sayurnya, rasanya kurang lengkap. Kemudian tambahan bahan makanan-makanan lain semisal tahu, tempe, atau seafood bisa membuat rasanya makin enak.', 'tumis.jpg', 1);
INSERT INTO `catering` VALUES (2, 'Aneka Olahan Ayam', 5000000.00, 'Olahan ayam tentu banyak sekali. Dan dari banyaknya olahan itu, kira-kira mana yang akan kamu pilih.', 'ayam.jpg', 1);
INSERT INTO `catering` VALUES (3, 'Aneka Olahan Ikan', 4000000.00, 'Mungkin yang terbayang dari benak kalian adalah, jika mengkonsumsi ikan di acara pernikahan, pasti rasanya ribet. Sebab kita harus memisahkan duri dan ikan.\r\n\r\nTapi sebenarnya tergantung olahan dari ikan itu sendiri serta jenisnya.', 'ikan.jpg', 1);
INSERT INTO `catering` VALUES (4, 'TES2', 20000.00, 'TES2', NULL, 0);

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
  `deskripsi` varchar(300) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
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
INSERT INTO `konfigurasi` VALUES (2, 1, 'WEDDING', 'Wedding', 'admin@gmail.com', '087735282147', 'Jl. Gegerkalong Hilir No.117, Sukarasa, Kec. Sukasari, Kota Bandung, Jawa Barat 40153', '', '', '', '', '', 'logo.png', 'logo.png', 'https://facebook.com/', 'https://instagram.com/', '2023-06-30 15:11:14');

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
  `id_tema` int NULL DEFAULT NULL,
  `id_tempat` int NULL DEFAULT NULL,
  `id_musik` int NULL DEFAULT NULL,
  `id_photo` int NULL DEFAULT NULL,
  `id_catering` int NULL DEFAULT NULL,
  `id_kostum` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `harga` decimal(16, 2) NULL DEFAULT NULL,
  `deskripsi` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `status` tinyint(1) NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of paket
-- ----------------------------
INSERT INTO `paket` VALUES (1, 'PAKET 1', 1, 1, 1, 1, 1, '1', 20000000.00, 'TES', 1);
INSERT INTO `paket` VALUES (2, 'PAKET 2', 2, 2, 2, 2, 2, '2', 30000000.00, 'TES', 1);
INSERT INTO `paket` VALUES (3, 'PAKET 3', 3, NULL, 3, 3, 3, NULL, 40000000.00, 'TES', 1);
INSERT INTO `paket` VALUES (4, 'Paket 4', 3, 1, 3, 3, 2, '2', 40000000.00, 'OK', 1);

-- ----------------------------
-- Table structure for photo
-- ----------------------------
DROP TABLE IF EXISTS `photo`;
CREATE TABLE `photo`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `harga` decimal(16, 2) NULL DEFAULT NULL,
  `deskripsi` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `foto` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` tinyint(1) NULL DEFAULT 1 COMMENT '1 = AKTIF, 0 atau null = NON AKTIF',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of photo
-- ----------------------------
INSERT INTO `photo` VALUES (1, 'Pre Wedding', 1500000.00, 'Sebelum nikah', 'pre_wedding.jpg', 1);
INSERT INTO `photo` VALUES (2, 'Wedding', 2000000.00, 'Sesudah nikah', 'wedding.jpg', 1);
INSERT INTO `photo` VALUES (3, 'Pre Wedding + Wedding', 3000000.00, 'Paketan', 'wedding.jpg', 1);

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
  `id_admin` int NULL DEFAULT NULL,
  `id_user` int NULL DEFAULT NULL,
  `tgl_booking` date NULL DEFAULT NULL,
  `jenis_booking` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_tempat` int NULL DEFAULT NULL,
  `id_tema` int NULL DEFAULT NULL,
  `id_musik` int NULL DEFAULT NULL,
  `id_catering` int NULL DEFAULT NULL,
  `id_photo` int NULL DEFAULT NULL,
  `id_kostum` int NULL DEFAULT NULL,
  `id_paket` int NULL DEFAULT NULL,
  `total_harga` decimal(16, 2) NULL DEFAULT NULL,
  `jth_tempo_bayar` datetime NULL DEFAULT NULL,
  `tgl_bayar` datetime NULL DEFAULT NULL,
  `total_bayar` decimal(16, 2) NULL DEFAULT NULL,
  `status` tinyint(1) NULL DEFAULT 1 COMMENT '1 = baru, 2 = menunggu bayar, 3 = bayar, 4 = batal',
  `bukti_bayar` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of transaksi
-- ----------------------------
INSERT INTO `transaksi` VALUES (1, '2023-07-02 06:36:33', '202307-001', 'Aqkly hermawan', NULL, 1, '2023-07-02', 'paketan', 0, 0, 0, 0, 0, 0, 1, 20000000.00, '2023-07-03 06:36:33', NULL, NULL, 2, NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'DENI', 'deni@deni.com', '987434745', 'Kp. ada ada', 'deni', '123456');

SET FOREIGN_KEY_CHECKS = 1;
