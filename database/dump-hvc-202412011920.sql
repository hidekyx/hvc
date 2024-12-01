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
  `id_user` int NOT NULL,
  `id_collection` int NOT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  `size` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `color` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` enum('Waiting','Processed','Finished') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_cart`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` VALUES (9,1,4,2,'M','Blue','Processed','2024-05-26 08:46:03','2024-05-26 08:48:29'),(10,1,5,4,'L','Black','Processed','2024-05-26 08:46:13','2024-05-26 08:48:29'),(11,1,2,1,'L','White','Processed','2024-05-26 08:48:39','2024-05-26 08:48:44'),(12,1,2,1,'L','White','Processed','2024-05-26 08:50:06','2024-05-26 08:50:16'),(13,1,2,1,'L','White','Processed','2024-05-26 08:50:44','2024-05-26 08:50:51'),(14,1,2,1,'L','White','Processed','2024-05-26 08:51:34','2024-05-26 08:51:39'),(15,1,1,2,'L','Black','Processed','2024-05-26 08:51:58','2024-05-26 08:52:38'),(16,1,5,5,'S','Blue','Processed','2024-05-26 08:52:06','2024-05-26 08:52:38'),(19,1,6,1,'XL','White','Processed','2024-05-26 11:00:29','2024-05-26 11:01:11'),(20,1,3,4,'M','White','Processed','2024-05-26 11:00:38','2024-05-26 11:01:11'),(21,3,4,1,'M','Blue','Waiting','2024-11-25 07:23:40','2024-11-25 07:23:40');
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `collection`
--

LOCK TABLES `collection` WRITE;
/*!40000 ALTER TABLE `collection` DISABLE KEYS */;
INSERT INTO `collection` VALUES (1,NULL,'Candi Bajang Ratu',200000,48,'National','Candi Bajang Ratu adalah sebuah candi peninggalan kerajaan Majapahit yang dibangun pada abad ke-14. Lokasinya berada di Dukuh Kraton, Desa Temon, Kecamatan Trowulan, Kabupaten Mojokerto, Jawa Timur, Indonesia. Candi ini memiliki bentuk segi empat dengan ukuran sekitar 11,5 m x 10,5 m dan tinggi 16,5 m, serta berdiri pada ketinggian 41,49 mdpl. Candi Bajang Ratu merupakan gapura besar yang difungsikan sebagai pintu belakang kerajaan sekaligus sebagai bangunan suci untuk wafatnya Raja Jayanegara.','S, M, L','White, Black, Blue','preview-image-1.png','preview-image-2.png',NULL,NULL,'2024-05-20 12:06:50','2024-05-26 08:52:38'),(2,1,'Bajang Candi Raja',100000,46,'National','Candi Bajang Ratu adalah sebuah candi peninggalan kerajaan Majapahit yang dibangun pada abad ke-14. Lokasinya berada di Dukuh Kraton, Desa Temon, Kecamatan Trowulan, Kabupaten Mojokerto, Jawa Timur, Indonesia. Candi ini memiliki bentuk segi empat dengan ukuran sekitar 11,5 m x 10,5 m dan tinggi 16,5 m, serta berdiri pada ketinggian 41,49 mdpl. Candi Bajang Ratu merupakan gapura besar yang difungsikan sebagai pintu belakang kerajaan sekaligus sebagai bangunan suci untuk wafatnya Raja Jayanegara.','S, M, L','White, Black, Blue','preview-image-1.png','preview-image-2.png',NULL,NULL,'2024-05-20 12:06:50','2024-11-25 06:23:18'),(3,1,'Ratu Bajang Candi',150000,46,'National','Candi Bajang Ratu adalah sebuah candi peninggalan kerajaan Majapahit yang dibangun pada abad ke-14. Lokasinya berada di Dukuh Kraton, Desa Temon, Kecamatan Trowulan, Kabupaten Mojokerto, Jawa Timur, Indonesia. Candi ini memiliki bentuk segi empat dengan ukuran sekitar 11,5 m x 10,5 m dan tinggi 16,5 m, serta berdiri pada ketinggian 41,49 mdpl. Candi Bajang Ratu merupakan gapura besar yang difungsikan sebagai pintu belakang kerajaan sekaligus sebagai bangunan suci untuk wafatnya Raja Jayanegara.','S, M, L','White, Black, Blue','preview-image-1.png','preview-image-2.png',NULL,NULL,'2024-05-20 12:06:50','2024-11-25 06:23:18'),(4,1,'Tes Baju Ratu',250000,48,'National','Candi Bajang Ratu adalah sebuah candi peninggalan kerajaan Majapahit yang dibangun pada abad ke-14. Lokasinya berada di Dukuh Kraton, Desa Temon, Kecamatan Trowulan, Kabupaten Mojokerto, Jawa Timur, Indonesia. Candi ini memiliki bentuk segi empat dengan ukuran sekitar 11,5 m x 10,5 m dan tinggi 16,5 m, serta berdiri pada ketinggian 41,49 mdpl. Candi Bajang Ratu merupakan gapura besar yang difungsikan sebagai pintu belakang kerajaan sekaligus sebagai bangunan suci untuk wafatnya Raja Jayanegara.','S, M, L','White, Black, Blue','preview-image-1.png','preview-image-2.png',NULL,NULL,'2024-05-20 12:06:50','2024-11-25 06:23:18'),(5,NULL,'International Baju',300000,1,'International','Candi Bajang Ratu adalah sebuah candi peninggalan kerajaan Majapahit yang dibangun pada abad ke-14. Lokasinya berada di Dukuh Kraton, Desa Temon, Kecamatan Trowulan, Kabupaten Mojokerto, Jawa Timur, Indonesia. Candi ini memiliki bentuk segi empat dengan ukuran sekitar 11,5 m x 10,5 m dan tinggi 16,5 m, serta berdiri pada ketinggian 41,49 mdpl. Candi Bajang Ratu merupakan gapura besar yang difungsikan sebagai pintu belakang kerajaan sekaligus sebagai bangunan suci untuk wafatnya Raja Jayanegara.','S, M, L','White, Black, Blue','preview-image-1.png','preview-image-2.png',NULL,NULL,'2024-05-20 12:06:50','2024-11-25 06:06:12'),(6,NULL,'Ratu Bajang Jung',500000,3,'National','Candi Bajang Ratu adalah sebuah candi peninggalan kerajaan Majapahit yang dibangun pada abad ke-14. Lokasinya berada di Dukuh Kraton, Desa Temon, Kecamatan Trowulan, Kabupaten Mojokerto, Jawa Timur, Indonesia. Candi ini memiliki bentuk segi empat dengan ukuran sekitar 11,5 m x 10,5 m dan tinggi 16,5 m, serta berdiri pada ketinggian 41,49 mdpl. Candi Bajang Ratu merupakan gapura besar yang difungsikan sebagai pintu belakang kerajaan sekaligus sebagai bangunan suci untuk wafatnya Raja Jayanegara.','L, XL','White, Black, Pink, Polkadot','2d2888242407e966cdf06ab3423ad649.png','5fece262582ff398af8aa76625f9252a.png','7a172f9b5f1002c711c1334819ddb452.png',NULL,'2024-05-20 12:06:50','2024-11-25 06:06:12');
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
INSERT INTO `content` VALUES (2,'home_text','<p>Kami memperkenalkan Historycal Variety Clothes, sebuah brand yang berkomitmen untuk menggabungkan keindahan kebudayaan lokal dan internasional di dalam desain sebuah baju yang unik dan bermakna.</p>\r\n\r\n<p>Kami berfokus pada budaya sebagai sumber inspirasi utama, bukan hanya tren sementara. Setiap pakaian yang kami produksi memiliki cerita, menghormati akar budayanya dan memberikan peluang bagi pelanggan kami untuk merasakan keindahan dan makna di balik setiap desain.</p>\r\n\r\n<p>Kami sangat antusias untuk berbagi warisan kebudayaan melalui fashion, dan kami percaya bahwa Historycal Variety Clothes akan menjadi destinasi utama bagi mereka yang meiliki minat tentang kebudayaan dan ingin mengenakan pakaian yang dapat memberikan wawasan kepada orang lain.</p>'),(3,'home_logo','ffa99363cbeacf9f49a8e60b7ef94482.png'),(4,'home_highlight','1'),(5,'tiktok_link','https://www.tiktok.com/'),(6,'instagram_link','https://www.instagram.com/'),(7,'whatsapp_link','https://wa.me/6287883122665'),(8,'content_information','Lorem ipsum dolor sit amet dolor sit amet ipsum dolor sit amet dolor sit amet ipsum dolor sit amet dolor sit amet ipsum dolor sit amet dolor sit amet');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history`
--

LOCK TABLES `history` WRITE;
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
INSERT INTO `history` VALUES (1,'Candi Bajang Batu','National','9bffc99a5ff0d10dd3e171ac68a809d1.png','42b60c468eac65ccd0fac76807d835f8.png',NULL,NULL,'<div><b>Candi Bajang Ratu</b> adalah salah satu peninggalan bersejarah dari Kerajaan Majapahit yang terletak di Desa Temon, Kecamatan Trowulan, Kabupaten Mojokerto, Jawa Timur. Meskipun namanya \"Candi\", bangunan ini lebih tepat disebut sebagai gapura atau gerbang, karena bentuknya yang menyerupai pintu masuk menuju suatu kompleks bangunan suci.</div><div><br></div><div>Sejarah dan Fungsi</div><ul><li>Tugu Peringatan: Candi Bajang Ratu dipercaya dibangun sebagai tugu peringatan untuk menghormati Jayanegara, raja kedua Majapahit yang wafat pada tahun 1328.</li><li>Gerbang Suci: Bentuknya yang menyerupai gapura mengindikasikan bahwa bangunan ini berfungsi sebagai pintu masuk ke sebuah kompleks makam atau bangunan suci lainnya.</li><li>Simbol Kekuasaan: Ornamen dan relief pada Candi Bajang Ratu, seperti motif singa dan garuda, melambangkan kekuatan dan keagungan Kerajaan Majapahit.</li></ul><div><br></div><div>Candi Bajang Ratu, dengan bentuk gapura monumentalnya yang menghadap ke timur, menjadi pintu gerbang menuju masa kejayaan Kerajaan Majapahit. Ornamen relief yang menghiasi dinding-dindingnya, mulai dari motif flora yang menawan hingga fauna yang eksotis, dipahat dengan begitu detail menggunakan teknik pahat yang halus. Motif geometri yang rumit, seperti motif spiral dan lingkaran, dipercaya mengandung simbol-simbol kosmologi yang mendalam. Penggunaan batu bata dan batu andesit sebagai material utama, selain memperkuat struktur bangunan, juga menciptakan kontras warna yang menarik. Meskipun telah mengalami kerusakan akibat pengaruh alam dan waktu, Candi Bajang Ratu tetap berdiri kokoh sebagai saksi bisu kemegahan masa lalu. Dibandingkan dengan candi-candi lain di Trowulan, Candi Bajang Ratu memiliki ciri khas pada ornamennya yang lebih dinamis dan bervariasi.</div><div><br></div><div>Candi Bajang Ratu bukan hanya sekadar reruntuhan kuno, melainkan jendela waktu yang membawa kita kembali ke masa kejayaan Kerajaan Majapahit. Sebagai salah satu situs arkeologi terpenting di Indonesia, candi ini telah memberikan kontribusi besar dalam pemahaman kita tentang sejarah dan kebudayaan Nusantara. Melalui studi mendalam terhadap arsitektur, ornamen, dan artefak yang ditemukan di sini, para ahli telah berhasil mengungkap banyak rahasia tentang kehidupan masyarakat Majapahit. Selain itu, Candi Bajang Ratu juga berperan penting dalam upaya pelestarian warisan budaya bangsa. Sebagai destinasi wisata edukasi, candi ini tidak hanya menarik minat wisatawan domestik, tetapi juga mancanegara yang ingin belajar tentang sejarah dan budaya Indonesia. Meskipun telah banyak penelitian yang dilakukan, Candi Bajang Ratu masih menyimpan banyak misteri yang menanti untuk diungkap oleh generasi mendatang.</div>',1,'2024-11-25 05:35:33','2024-11-25 07:02:04');
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
INSERT INTO `payment` VALUES (3,'BCA','BCA HVC Account','142352',NULL,'2024-05-25 07:07:21','2024-05-25 07:13:09'),(4,'Gopay','Afgan Halimi','087883122665',NULL,'2024-05-25 07:07:21','2024-05-25 07:13:09'),(5,'QRIS',NULL,NULL,'77db4318d4755fcd6b70fa9645deb338.png','2024-05-25 07:07:21','2024-05-25 07:13:09');
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
  `id_quiz_question` int NOT NULL,
  `answer` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_quiz_answer`),
  KEY `quiz_answer_FK` (`id_quiz_question`),
  CONSTRAINT `quiz_answer_FK` FOREIGN KEY (`id_quiz_question`) REFERENCES `quiz_question` (`id_quiz_question`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz_answer`
--

LOCK TABLES `quiz_answer` WRITE;
/*!40000 ALTER TABLE `quiz_answer` DISABLE KEYS */;
INSERT INTO `quiz_answer` VALUES (9,5,'Keraton',1,'2024-11-29 05:52:06','2024-11-29 05:52:06'),(10,5,'Keranjang',0,'2024-11-29 05:52:06','2024-11-29 05:52:06'),(11,5,'Kerampok',0,'2024-11-29 05:52:06','2024-11-29 05:52:06'),(12,5,'Kerakera',0,'2024-11-29 05:52:06','2024-11-29 05:52:06'),(13,6,'Orang ga kena',1,'2024-11-29 08:37:02','2024-11-29 08:37:02'),(14,6,'Orang gila',0,'2024-11-29 08:37:02','2024-11-29 08:37:02'),(15,6,'Orang udah mati',0,'2024-11-29 08:37:02','2024-11-29 08:37:02'),(16,6,'Orangutan',0,'2024-11-29 08:37:02','2024-11-29 08:37:02');
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
  `id_history` int NOT NULL,
  `question` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_quiz_question`),
  KEY `quiz_question_FK` (`id_history`),
  CONSTRAINT `quiz_question_FK` FOREIGN KEY (`id_history`) REFERENCES `history` (`id_history`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz_question`
--

LOCK TABLES `quiz_question` WRITE;
/*!40000 ALTER TABLE `quiz_question` DISABLE KEYS */;
INSERT INTO `quiz_question` VALUES (5,1,'Kera apa yang bikin nyamanssss','2024-11-29 03:55:39','2024-11-29 05:52:06'),(6,1,'Orang apa yang ditembak ga mati','2024-11-29 08:37:02','2024-11-29 08:37:02');
/*!40000 ALTER TABLE `quiz_question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `review` (
  `id_review` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `id_transaction_detail` int NOT NULL,
  `id_collection` int NOT NULL,
  `text` text NOT NULL,
  `star` int NOT NULL,
  `img_1` varchar(255) DEFAULT NULL,
  `img_2` varchar(255) DEFAULT NULL,
  `img_3` varchar(255) DEFAULT NULL,
  `img_4` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_review`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `review`
--

LOCK TABLES `review` WRITE;
/*!40000 ALTER TABLE `review` DISABLE KEYS */;
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
  `id_user` int NOT NULL,
  `id_courier` int NOT NULL,
  `id_payment` int NOT NULL,
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
  PRIMARY KEY (`id_transaction`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction`
--

LOCK TABLES `transaction` WRITE;
/*!40000 ALTER TABLE `transaction` DISABLE KEYS */;
INSERT INTO `transaction` VALUES (11,1,3,5,113000,'Finished','Jl. Jauh Banget Kelurahan Deket Kecamatan Jauh Kota Kotaan','165122','5f9596ef3ac5e114bce7db2b0277a4a3.png','2024-05-26 08:51:39','2024-05-26 12:13:46','2024-05-26 10:32:24','2024-05-26 12:09:18','2024-05-26 12:13:46'),(12,1,3,4,1913000,'Delivering','Jl. Jauh Banget Kelurahan Deket Kecamatan Jauh Kota Kotaan','231423',NULL,'2024-05-26 08:52:38','2024-05-26 11:41:32','2024-05-26 10:23:34','2024-05-26 11:41:32',NULL),(13,1,3,5,1113000,'Payment','Jl. Jauh Banget Kelurahan Deket Kecamatan Jauh Kota Kotaan',NULL,NULL,'2024-05-26 11:01:11','2024-05-26 11:01:11',NULL,NULL,NULL);
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
  `id_user` int NOT NULL,
  `id_collection` int NOT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  `size` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_transaction_detail`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction_detail`
--

LOCK TABLES `transaction_detail` WRITE;
/*!40000 ALTER TABLE `transaction_detail` DISABLE KEYS */;
INSERT INTO `transaction_detail` VALUES (18,11,1,2,1,'L','White','2024-05-26 08:51:39','2024-05-26 08:51:39'),(19,12,1,5,5,'S','Blue','2024-05-26 08:52:38','2024-05-26 08:52:38'),(20,12,1,1,2,'L','Black','2024-05-26 08:52:38','2024-05-26 08:52:38'),(21,13,1,3,4,'M','White','2024-05-26 11:01:11','2024-05-26 11:01:11'),(22,13,1,6,1,'XL','White','2024-05-26 11:01:11','2024-05-26 11:01:11');
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
  `active` enum('Y','N') CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `lastlog` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `remember_token` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Afgan','afganhalimi@gmail.com','$2y$10$UihRGXOLYPrJIrsqDbHjO.WaGUOM0g4YK.GZEbRgbJLf2lJFpJyJC','087883122665','Jl. Jauh Banget Kelurahan Deket Kecamatan Jauh Kota Kotaan','Admin','Y','2024-11-29 02:40:40','2024-05-20 12:02:41','2024-11-29 02:40:40',NULL),(3,'Admin','admin@gmail.com','$2y$10$UihRGXOLYPrJIrsqDbHjO.WaGUOM0g4YK.GZEbRgbJLf2lJFpJyJC','087883122665','Jl. Jauh Banget Kelurahan Deket Kecamatan Jauh Kota Kotaan','Admin','Y','2024-11-25 07:25:02','2024-05-20 12:02:41','2024-11-25 05:12:40',NULL);
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
  `id_history` int NOT NULL,
  PRIMARY KEY (`id_voucher`),
  KEY `voucher_FK` (`id_history`),
  CONSTRAINT `voucher_FK` FOREIGN KEY (`id_history`) REFERENCES `history` (`id_history`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `voucher`
--

LOCK TABLES `voucher` WRITE;
/*!40000 ALTER TABLE `voucher` DISABLE KEYS */;
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

-- Dump completed on 2024-12-01 19:20:43
