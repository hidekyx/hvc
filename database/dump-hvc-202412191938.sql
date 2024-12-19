-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: hvc
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart` (
  `id_cart` int NOT NULL AUTO_INCREMENT,
  `id_user` int DEFAULT NULL,
  `id_collection` int DEFAULT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  `size` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `color` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` enum('Waiting','Processed','Finished') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_cart`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` VALUES (25,1,13,1,'L','Dark Brown','Processed','2024-12-18 03:49:59','2024-12-18 04:04:51'),(26,1,11,1,'M','Grey','Processed','2024-12-18 03:50:21','2024-12-18 04:04:51'),(27,1,12,1,'L','Black','Processed','2024-12-18 04:07:40','2024-12-18 04:08:09'),(28,1,12,2,'L','Maroon','Processed','2024-12-18 04:07:48','2024-12-18 04:08:09'),(29,1,12,1,'L','Silver','Processed','2024-12-18 04:07:56','2024-12-18 04:08:09'),(30,1,9,2,'XL','Olive Green','Processed','2024-12-18 04:10:44','2024-12-18 04:11:13'),(31,1,10,1,'L','Mint','Processed','2024-12-18 04:11:00','2024-12-18 04:11:13'),(32,1,1,2,'L','Black','Processed','2024-12-18 04:31:00','2024-12-18 04:31:10'),(34,4,1,2,'M','Blue','Processed','2024-12-19 05:41:27','2024-12-19 05:43:52'),(35,4,13,8,'XXL','Seaweed','Processed','2024-12-19 05:54:32','2024-12-19 06:01:19');
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `collection`
--

DROP TABLE IF EXISTS `collection`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `collection` (
  `id_collection` int NOT NULL AUTO_INCREMENT,
  `id_history` int DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `price` int NOT NULL,
  `stock` int NOT NULL DEFAULT '0',
  `category` enum('National','International') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` text NOT NULL,
  `size` varchar(100) NOT NULL,
  `color` varchar(255) NOT NULL,
  `img_1` varchar(255) NOT NULL,
  `img_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `img_3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `img_4` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_collection`),
  KEY `collection_FK` (`id_history`),
  CONSTRAINT `collection_FK` FOREIGN KEY (`id_history`) REFERENCES `history` (`id_history`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `collection`
--

LOCK TABLES `collection` WRITE;
/*!40000 ALTER TABLE `collection` DISABLE KEYS */;
INSERT INTO `collection` VALUES (1,NULL,'Candi Bajang Ratu',200000,44,'National','Candi Bajang Ratu adalah sebuah candi peninggalan kerajaan Majapahit yang dibangun pada abad ke-14. Lokasinya berada di Dukuh Kraton, Desa Temon, Kecamatan Trowulan, Kabupaten Mojokerto, Jawa Timur, Indonesia. Candi ini memiliki bentuk segi empat dengan ukuran sekitar 11,5 m x 10,5 m dan tinggi 16,5 m, serta berdiri pada ketinggian 41,49 mdpl. Candi Bajang Ratu merupakan gapura besar yang difungsikan sebagai pintu belakang kerajaan sekaligus sebagai bangunan suci untuk wafatnya Raja Jayanegara.','S, M, L','White, Black, Blue','preview-image-1.png','preview-image-2.png','','','2024-05-20 12:06:50','2024-12-19 05:43:52'),(10,NULL,'Executive Oxford Long Sleeve',164000,49,'National','Blouse lengan panjang, Kerah kemeja, Front button opening, Rounded hemline, Regular Fit, Material: Cotton. Gunakan Detergen Yang Lembut, Jangan Gunakan Pemutih, Setrika Suhu Rendah','S, M, L, XL, XXL','Light Blue, Black, Mint, White','31fe1cac703210629ab8cdd859ae0c4c.jpg','0da51daa15262e2530b5e2b8b6bc759c.jpg','82f29b6f71f8ce6caff2f47beb16bfa1.jpg','2d4852975442a66a82c23072b4d37be2.jpg','2024-12-18 03:23:06','2024-12-18 04:11:13'),(12,NULL,'Non-Cobra Backpack',940000,46,'National','This bag features a signature bright yellow liner for increased browsing visibility, an easy access zip opening to the entire main compartment, weatherproof construction, a semi-rigid polyethylene back-plate, height extendability, a total of six organizer pockets, two side pockets, a transparent mica sheet inner pocket for organizing visibility, a suspended and padded laptop compartment with a soft felt liner (fits up to 15\"), integrated 3M reflective webbing, seam sealing for extra liquid protection, flaptop or rolltop mode, compression straps that double as a versatile two-way external carry system, and a handle slip-thru slot for secure carry on top of luggage.','L','Black, Maroon, Navy, Silver','1796e58380cf97c3b6c3d110d7ea6faa.jpg','5c3817a7295e82601e62f8f076b5ad55.jpg','a7773664cae81da19b77bbc8c2d2ae83.webp','9a4d0d973bbb45b07605dc6a5cd0d9e0.jpg','2024-12-18 03:32:50','2024-12-18 04:08:09'),(13,3,'KATTOEN Pullover Hoodie',330000,38,'National','Dibuat dengan bahan Cotton Fleece Material & Zipper YKK Premium. Menggunakan Pola Bodyfit Pattern agar dapat Mengikuti Bentuk Tubuh.','M, L, XL, XXL','Carbon Grey, Dark Brown, Seaweed','d13ad69b9645ec6114ad138f98efa091.jpg','7b3e115fff317cfb7c75eee7ff28d1e4.jpg','6070ca53f75dd000dccd68f49b4e4d60.jpg',NULL,'2024-12-18 03:41:23','2024-12-19 06:03:31');
/*!40000 ALTER TABLE `collection` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `content`
--

DROP TABLE IF EXISTS `content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `content` (
  `id_content` int NOT NULL AUTO_INCREMENT,
  `key` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `value` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_content`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `content`
--

LOCK TABLES `content` WRITE;
/*!40000 ALTER TABLE `content` DISABLE KEYS */;
INSERT INTO `content` VALUES (2,'home_text','<p>Kami memperkenalkan Historycal Variety Clothes, sebuah brand yang berkomitmen untuk menggabungkan keindahan kebudayaan lokal dan internasional di dalam desain sebuah baju yang unik dan bermakna.</p>\r\n\r\n<p>Kami berfokus pada budaya sebagai sumber inspirasi utama, bukan hanya tren sementara. Setiap pakaian yang kami produksi memiliki cerita, menghormati akar budayanya dan memberikan peluang bagi pelanggan kami untuk merasakan keindahan dan makna di balik setiap desain.</p>\r\n\r\n<p>Kami sangat antusias untuk berbagi warisan kebudayaan melalui fashion, dan kami percaya bahwa Historycal Variety Clothes akan menjadi destinasi utama bagi mereka yang meiliki minat tentang kebudayaan dan ingin mengenakan pakaian yang dapat memberikan wawasan kepada orang lain.</p>'),(3,'home_logo','ffa99363cbeacf9f49a8e60b7ef94482.png'),(4,'home_highlight','1'),(5,'tiktok_link','https://www.tiktok.com/'),(6,'instagram_link','https://www.instagram.com/'),(7,'whatsapp_link','https://wa.me/6287883122665'),(8,'content_information','Sebuah brand yang berkomitmen untuk menggabungkan keindahan kebudayaan lokal dan internasional di dalam desain sebuah baju yang unik dan bermakna');
/*!40000 ALTER TABLE `content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courier`
--

DROP TABLE IF EXISTS `courier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `courier` (
  `id_courier` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_courier`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courier`
--

LOCK TABLES `courier` WRITE;
/*!40000 ALTER TABLE `courier` DISABLE KEYS */;
INSERT INTO `courier` VALUES (2,'Gojek',12000,'2024-05-26 05:37:19','2024-05-26 05:37:19'),(3,'Grab',13000,'2024-05-26 05:37:19','2024-05-26 05:37:19'),(4,'JNT',9000,'2024-05-26 05:37:19','2024-05-26 05:37:19');
/*!40000 ALTER TABLE `courier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `history` (
  `id_history` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `category` enum('National','International') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `img_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `img_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `img_3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `img_4` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `quiz_enabled` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_history`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history`
--

LOCK TABLES `history` WRITE;
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
INSERT INTO `history` VALUES (3,'Sejarah Terbentuknya NARASON','National','242c16d8c5c21b34b014d6ef74d0977c.webp','b9fb9e8b6628e859d561c208fee6eb4d.webp',NULL,NULL,'NARASON merupakan topi topian berwarna hitam',0,'2024-12-19 06:03:31','2024-12-19 06:08:03');
/*!40000 ALTER TABLE `history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payment` (
  `id_payment` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `account_holder` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `account_number` varchar(100) DEFAULT NULL,
  `account_qris` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_payment`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
INSERT INTO `payment` VALUES (3,'BCA','BCA HVC Account','7005389178',NULL,'2024-05-25 07:07:21','2024-12-18 02:56:31'),(4,'Gopay','Afgan Halimi','087883122665',NULL,'2024-05-25 07:07:21','2024-05-25 07:13:09'),(5,'QRIS',NULL,NULL,'c0b3a762967c1404bb7ef18b95f8fdd2.jpg','2024-05-25 07:07:21','2024-12-18 02:59:11');
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz_answer`
--

DROP TABLE IF EXISTS `quiz_answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quiz_answer` (
  `id_quiz_answer` int NOT NULL AUTO_INCREMENT,
  `id_quiz_question` int DEFAULT NULL,
  `answer` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_quiz_answer`),
  KEY `quiz_answer_FK` (`id_quiz_question`),
  CONSTRAINT `quiz_answer_FK` FOREIGN KEY (`id_quiz_question`) REFERENCES `quiz_question` (`id_quiz_question`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz_answer`
--

LOCK TABLES `quiz_answer` WRITE;
/*!40000 ALTER TABLE `quiz_answer` DISABLE KEYS */;
INSERT INTO `quiz_answer` VALUES (17,7,'Jendela Waktu',1,'2024-12-18 04:23:15','2024-12-18 04:23:15'),(18,7,'Pintu Surga',0,'2024-12-18 04:23:15','2024-12-18 04:23:15'),(19,7,'Lantai Keramik',0,'2024-12-18 04:23:15','2024-12-18 04:23:15'),(20,7,'Gerbang Suci',0,'2024-12-18 04:23:15','2024-12-18 04:23:15'),(21,8,'Tugu Peringatan',1,'2024-12-18 04:23:53','2024-12-18 04:23:53'),(22,8,'Gerbang Suci',0,'2024-12-18 04:23:53','2024-12-18 04:23:53'),(23,8,'Simbol Kekuasaan',0,'2024-12-18 04:23:53','2024-12-18 04:23:53'),(24,8,'Bajang Ratu',0,'2024-12-18 04:23:53','2024-12-18 04:23:53'),(25,9,'Timur',1,'2024-12-18 04:25:00','2024-12-18 04:25:00'),(26,9,'Barat Laut',0,'2024-12-18 04:25:00','2024-12-18 04:25:00'),(27,9,'Barat Daya',0,'2024-12-18 04:25:00','2024-12-18 04:25:00'),(28,9,'Tenggara',0,'2024-12-18 04:25:00','2024-12-18 04:25:00'),(29,10,'Batu Andesit',1,'2024-12-18 04:26:39','2024-12-18 04:26:39'),(30,10,'Batu Sungai',0,'2024-12-18 04:26:39','2024-12-18 04:26:39'),(31,10,'Batu Bata',0,'2024-12-18 04:26:39','2024-12-18 04:26:39'),(32,10,'Batu Bara',0,'2024-12-18 04:26:39','2024-12-18 04:26:39');
/*!40000 ALTER TABLE `quiz_answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz_question`
--

DROP TABLE IF EXISTS `quiz_question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quiz_question` (
  `id_quiz_question` int NOT NULL AUTO_INCREMENT,
  `id_history` int DEFAULT NULL,
  `question` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_quiz_question`),
  KEY `quiz_question_FK` (`id_history`),
  CONSTRAINT `quiz_question_FK` FOREIGN KEY (`id_history`) REFERENCES `history` (`id_history`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz_question`
--

LOCK TABLES `quiz_question` WRITE;
/*!40000 ALTER TABLE `quiz_question` DISABLE KEYS */;
INSERT INTO `quiz_question` VALUES (7,NULL,'Candi Bajang Ratu bukan hanya sekadar reruntuhan kuno, melainkan?','2024-12-18 04:23:15','2024-12-18 04:23:15'),(8,NULL,'Candi Bajang Ratu dipercaya dibangun sebagai tugu peringatan untuk menghormati Jayanegara, raja kedua Majapahit yang wafat pada tahun 1328 merupakan fungsi?','2024-12-18 04:23:53','2024-12-18 04:23:53'),(9,NULL,'Candi Bajang Ratu, dengan bentuk gapura monumentalnya yang menghadap ke?','2024-12-18 04:25:00','2024-12-18 04:25:00'),(10,NULL,'Penggunaan batu pada Candi Bajang Batu yang berfungsi untuk memperkuat struktur bangunan dan menciptakan kontras menarik adalah','2024-12-18 04:26:39','2024-12-18 04:26:39');
/*!40000 ALTER TABLE `quiz_question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz_session`
--

DROP TABLE IF EXISTS `quiz_session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quiz_session` (
  `id_quiz_session` int NOT NULL AUTO_INCREMENT,
  `id_user` int DEFAULT NULL,
  `id_history` int DEFAULT NULL,
  `status` enum('Unfinished','Finished') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_quiz_session`),
  KEY `quiz_session_FK` (`id_user`),
  KEY `quiz_session_FK_1` (`id_history`),
  CONSTRAINT `quiz_session_FK` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE SET NULL ON UPDATE RESTRICT,
  CONSTRAINT `quiz_session_FK_1` FOREIGN KEY (`id_history`) REFERENCES `history` (`id_history`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz_session`
--

LOCK TABLES `quiz_session` WRITE;
/*!40000 ALTER TABLE `quiz_session` DISABLE KEYS */;
INSERT INTO `quiz_session` VALUES (17,1,NULL,'Unfinished','2024-12-18 04:29:35','2024-12-18 04:29:35'),(18,1,NULL,'Finished','2024-12-18 04:29:51','2024-12-18 04:30:25'),(21,NULL,NULL,'Finished','2024-12-18 05:53:03','2024-12-19 05:53:47'),(23,NULL,NULL,'Finished','2024-12-19 05:55:55','2024-12-19 05:56:44'),(24,NULL,3,'Unfinished','2024-12-19 06:14:06','2024-12-19 06:14:06');
/*!40000 ALTER TABLE `quiz_session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `review` (
  `id_review` int NOT NULL AUTO_INCREMENT,
  `id_user` int DEFAULT NULL,
  `id_transaction_detail` int DEFAULT NULL,
  `id_collection` int DEFAULT NULL,
  `review` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `rate` int NOT NULL,
  `img_1` varchar(255) DEFAULT NULL,
  `img_2` varchar(255) DEFAULT NULL,
  `img_3` varchar(255) DEFAULT NULL,
  `img_4` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_review`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `review`
--

LOCK TABLES `review` WRITE;
/*!40000 ALTER TABLE `review` DISABLE KEYS */;
INSERT INTO `review` VALUES (1,1,33,11,'Baseball Cap NARASON emang mantap, ga perlu diraguin lagi kualitasnya. Ukuran juga fleksibel bisa disesuaikan dengan kepala',5,'9eb27e6561dc06129c14f28cc5961b6b.webp',NULL,NULL,NULL,'2024-12-18 04:34:21','2024-12-18 04:34:21'),(2,1,36,12,'Build Quality Mantab, dari masukin laptop sampe potongan tangan muat semuanya!',5,'a77872ae2cd99a65fbf5bca22d173b21.webp','47ab91ea6d42eeb132c13514bbb4733a.webp','045ac98dfccff2a0b958151400f85269.webp',NULL,'2024-12-18 04:42:14','2024-12-18 04:42:14'),(3,1,37,10,'Bahan apaan nih!? Kucel banget, gampang robek. Mending gue beli di tanah abang',2,'04050597a09e35abadccb6a09e583ebe.webp','7aabbaa6bee84fc5396f16984b2e8e7b.webp',NULL,NULL,'2024-12-18 04:45:21','2024-12-18 04:45:21'),(4,4,40,1,'Anjay baju bagus keren banget gelooo',2,'83bdb144e5e17c3cb680349029aaeb6b.webp',NULL,NULL,NULL,'2024-12-19 05:47:35','2024-12-19 05:47:35');
/*!40000 ALTER TABLE `review` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transaction` (
  `id_transaction` int NOT NULL AUTO_INCREMENT,
  `id_user` int DEFAULT NULL,
  `id_courier` int DEFAULT NULL,
  `id_payment` int DEFAULT NULL,
  `id_voucher` int DEFAULT NULL,
  `total` int NOT NULL,
  `status` enum('Payment','Packaging','Delivering','Finished') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `address` text NOT NULL,
  `receipt` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `proof` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `packaging_at` timestamp NULL DEFAULT NULL,
  `delivering_at` timestamp NULL DEFAULT NULL,
  `finished_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_transaction`),
  KEY `transaction_FK` (`id_user`),
  KEY `transaction_FK_1` (`id_courier`),
  KEY `transaction_FK_2` (`id_payment`),
  KEY `transaction_FK_3` (`id_voucher`),
  CONSTRAINT `transaction_FK` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE SET NULL ON UPDATE RESTRICT,
  CONSTRAINT `transaction_FK_1` FOREIGN KEY (`id_courier`) REFERENCES `courier` (`id_courier`) ON DELETE SET NULL ON UPDATE RESTRICT,
  CONSTRAINT `transaction_FK_2` FOREIGN KEY (`id_payment`) REFERENCES `payment` (`id_payment`) ON DELETE SET NULL ON UPDATE RESTRICT,
  CONSTRAINT `transaction_FK_3` FOREIGN KEY (`id_voucher`) REFERENCES `voucher` (`id_voucher`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction`
--

LOCK TABLES `transaction` WRITE;
/*!40000 ALTER TABLE `transaction` DISABLE KEYS */;
INSERT INTO `transaction` VALUES (17,1,3,3,NULL,453000,'Finished','Jl. Jauh Banget Kelurahan Deket Kecamatan Jauh Kota Kotaan','168848','82644497cd2c5a32b202bdf5f15fb7aa.png','2024-12-18 04:04:51','2024-12-18 04:07:01','2024-12-18 04:06:12','2024-12-18 04:06:50','2024-12-18 04:07:01'),(18,1,2,4,NULL,3772000,'Finished','Jl. Jauh Banget Kelurahan Deket Kecamatan Jauh Kota Kotaan','482515','003ba0ec21b0962e2afe0cfe1387bbc5.png','2024-12-18 04:08:09','2024-12-18 04:08:56','2024-12-18 04:08:18','2024-12-18 04:08:24','2024-12-18 04:08:56'),(19,1,4,5,NULL,731000,'Finished','Jl. Jauh Banget Kelurahan Deket Kecamatan Jauh Kota Kotaan','120585','c61d2dc7103fff360847c77f339b27d6.png','2024-12-18 04:11:13','2024-12-18 04:11:31','2024-12-18 04:11:21','2024-12-18 04:11:27','2024-12-18 04:11:31'),(20,1,4,4,11,389000,'Packaging','Jl. Jauh Banget Kelurahan Deket Kecamatan Jauh Kota Kotaan',NULL,'4f7cde1fc532d15208ce599e3a342ca4.png','2024-12-18 04:31:10','2024-12-18 04:31:19','2024-12-18 04:31:19',NULL,NULL),(21,NULL,3,5,NULL,413000,'Finished','Apalah alamatnya yang penting ada','947821','d2981f7689087bbe68579acc841f6e00.png','2024-12-19 05:43:52','2024-12-19 05:46:44','2024-12-19 05:44:44','2024-12-19 05:45:32','2024-12-19 05:46:44'),(22,NULL,4,5,13,2517000,'Payment','Apalah alamatnya yang penting ada',NULL,NULL,'2024-12-19 06:01:19','2024-12-19 06:01:19',NULL,NULL,NULL);
/*!40000 ALTER TABLE `transaction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaction_detail`
--

DROP TABLE IF EXISTS `transaction_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transaction_detail` (
  `id_transaction_detail` int NOT NULL AUTO_INCREMENT,
  `id_transaction` int DEFAULT NULL,
  `id_user` int DEFAULT NULL,
  `id_collection` int DEFAULT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  `size` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_transaction_detail`),
  KEY `transaction_detail_FK` (`id_transaction`),
  KEY `transaction_detail_FK_1` (`id_collection`),
  KEY `transaction_detail_FK_2` (`id_user`),
  CONSTRAINT `transaction_detail_FK` FOREIGN KEY (`id_transaction`) REFERENCES `transaction` (`id_transaction`) ON DELETE SET NULL ON UPDATE RESTRICT,
  CONSTRAINT `transaction_detail_FK_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction_detail`
--

LOCK TABLES `transaction_detail` WRITE;
/*!40000 ALTER TABLE `transaction_detail` DISABLE KEYS */;
INSERT INTO `transaction_detail` VALUES (32,17,1,13,1,'L','Dark Brown','2024-12-18 04:04:51','2024-12-18 04:04:51'),(33,17,1,11,1,'M','Grey','2024-12-18 04:04:51','2024-12-18 04:04:51'),(34,18,1,12,1,'L','Silver','2024-12-18 04:08:09','2024-12-18 04:08:09'),(35,18,1,12,2,'L','Maroon','2024-12-18 04:08:09','2024-12-18 04:08:09'),(36,18,1,12,1,'L','Black','2024-12-18 04:08:09','2024-12-18 04:08:09'),(37,19,1,10,1,'L','Mint','2024-12-18 04:11:13','2024-12-18 04:11:13'),(38,19,1,9,2,'XL','Olive Green','2024-12-18 04:11:13','2024-12-18 04:11:13'),(39,20,1,1,2,'L','Black','2024-12-18 04:31:10','2024-12-18 04:31:10'),(40,21,NULL,1,2,'M','Blue','2024-12-19 05:43:52','2024-12-19 05:43:52'),(41,22,NULL,13,8,'XXL','Seaweed','2024-12-19 06:01:19','2024-12-19 06:01:19');
/*!40000 ALTER TABLE `transaction_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `no_telp` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `role` enum('Admin','Customer') CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `active` enum('Y','N') CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `lastlog` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `remember_token` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Afgan','afganhalimi@gmail.com','$2y$10$UihRGXOLYPrJIrsqDbHjO.WaGUOM0g4YK.GZEbRgbJLf2lJFpJyJC','087883122665','Jl. Jauh Banget Kelurahan Deket Kecamatan Jauh Kota Kotaan','Customer',NULL,'Y','2024-12-18 03:49:41','2024-05-20 12:02:41','2024-12-18 03:49:41',NULL),(3,'Admin','admin@gmail.com','$2y$10$UihRGXOLYPrJIrsqDbHjO.WaGUOM0g4YK.GZEbRgbJLf2lJFpJyJC','087832356412','Jalan Admin Jalan Jalan Kepinggir Kota Jalan Jauh Admin','Admin',NULL,'Y','2024-12-19 12:25:25','2024-05-20 12:02:41','2024-12-19 12:25:25',NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `voucher`
--

DROP TABLE IF EXISTS `voucher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `voucher` (
  `id_voucher` int NOT NULL AUTO_INCREMENT,
  `id_history` int DEFAULT NULL,
  `id_user` int DEFAULT NULL,
  `category` enum('Diskon 5 Persen','Gratis Ongkir') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` enum('Unused','Used') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_voucher`),
  KEY `voucher_FK` (`id_history`),
  KEY `voucher_FK_1` (`id_user`),
  CONSTRAINT `voucher_FK` FOREIGN KEY (`id_history`) REFERENCES `history` (`id_history`) ON DELETE SET NULL ON UPDATE RESTRICT,
  CONSTRAINT `voucher_FK_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `voucher`
--

LOCK TABLES `voucher` WRITE;
/*!40000 ALTER TABLE `voucher` DISABLE KEYS */;
INSERT INTO `voucher` VALUES (11,NULL,1,'Diskon 5 Persen','Used','2024-12-18 04:30:25','2024-12-18 04:31:10'),(12,NULL,NULL,'Gratis Ongkir','Unused','2024-12-18 05:53:47','2024-12-19 05:53:47'),(13,NULL,NULL,'Diskon 5 Persen','Used','2024-12-19 05:56:44','2024-12-19 06:01:19');
/*!40000 ALTER TABLE `voucher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'hvc'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-19 19:38:37
