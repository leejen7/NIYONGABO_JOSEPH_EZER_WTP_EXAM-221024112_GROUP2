-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 23, 2024 at 12:06 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bitevents`
--

-- --------------------------------------------------------

--
-- Table structure for table `booked`
--

DROP TABLE IF EXISTS `booked`;
CREATE TABLE IF NOT EXISTS `booked` (
  `booking_id` int NOT NULL AUTO_INCREMENT,
  `event_id` int NOT NULL,
  `user_id` int NOT NULL,
  `tickets_taken` int NOT NULL,
  `booking_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`booking_id`),
  KEY `event_id` (`event_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `booked`
--

INSERT INTO `booked` (`booking_id`, `event_id`, `user_id`, `tickets_taken`, `booking_date`) VALUES
(1, 2, 3, 2, '2024-05-16 11:44:40');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `event_id` int NOT NULL AUTO_INCREMENT,
  `event_title` varchar(100) NOT NULL,
  `event_date` date NOT NULL,
  `event_hour` time NOT NULL,
  `event_place` varchar(100) NOT NULL,
  `event_image` varchar(255) NOT NULL,
  `event_owner` varchar(100) NOT NULL,
  `event_amount` decimal(10,2) NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_title`, `event_date`, `event_hour`, `event_place`, `event_image`, `event_owner`, `event_amount`) VALUES
(1, 'ISHIMA', '2024-05-10', '22:40:00', 'Gasabo', 'background.jpg', 'MUBI', 0.00),
(2, 'Humura', '2024-05-10', '22:40:00', 'Muhima', 'background.jpg', 'Mugabo', 0.00),
(3, 'INKURU YA 30', '2024-05-19', '11:41:00', 'BK Arena', 'Untitled.jpeg', 'Inyamibwa', 0.00),
(4, 'BAL', '2024-05-19', '11:41:00', 'BK Arena', 'Untitled.jpeg', 'FIBA', 0.00),
(5, 'SUMMER KICKS', '2024-09-20', '15:27:00', 'Kivu Belt', '1.jpg', 'MUKIRE', 0.00),
(6, 'SUMMER KICKS', '2024-09-20', '15:27:00', 'Kivu Belt', '1.jpg', 'MUKIRE', 0.00),
(7, 'Graduation', '2024-07-20', '08:40:00', 'BK Arena', '4en9k2mgxeu91.png', 'RP', 2000.00),
(8, 'Umuganda', '2024-05-31', '09:00:00', 'Huye', '8590d921-381f-4ce9-a38d-e4f504a92af47e9bdf130bbee95b14_9187262932_7c98c954b7_k.jpg', 'Igihugu', 10000.00),
(9, 'Umuganda', '2024-05-31', '09:00:00', 'Huye', '8590d921-381f-4ce9-a38d-e4f504a92af47e9bdf130bbee95b14_9187262932_7c98c954b7_k.jpg', 'Igihugu', 10000.00),
(10, 'Umuganda', '2024-05-31', '05:33:00', 'Huye', '8590d921-381f-4ce9-a38d-e4f504a92af47e9bdf130bbee95b14_9187262932_7c98c954b7_k.jpg', 'Igihugu', 10000.00),
(12, 'Amasuku', '2024-05-02', '11:40:00', 'Muhazi', 'ac526959e18608bbb60cf99e9463ccc6.jpg', 'Umudugudu', 6000.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'active',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `name`, `phone`, `email`, `status`) VALUES
(1, 'joseph', '12345', 'ezer', '0782227393', 'leejenezer@gmail.com', 'admin'),
(2, 'James', '4321', 'Mugisha', '0789902134', 'mugijame@gmail.com', 'admin'),
(3, 'Genny', '0987', 'Keza', '0790980897', 'gennyke@gmail.com', 'user'),
(4, 'Bweja', '12345', 'Nzima', '0738475656', 'bwejanzima@gmail.com', 'user'),
(5, 'eric', '00000', 'Rugero', '0798898675', 'rugero@gmail.com', 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
