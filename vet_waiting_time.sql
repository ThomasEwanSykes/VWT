-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 06, 2025 at 09:28 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `vet_waiting_times`
--

-- --------------------------------------------------------

--
-- Table structure for table `clinic 1`
--

DROP TABLE IF EXISTS `clinic 1`;
CREATE TABLE IF NOT EXISTS `clinic 1` (
  `id` int NOT NULL AUTO_INCREMENT,
  `wait_time_hours` int NOT NULL,
  `wait_time_minutes` int NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `last_updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `festive_theme` varchar(255) DEFAULT 'none',
  `consult_fee` decimal(10,2) DEFAULT '336.00',
  `clinic_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `clinic_id` (`clinic_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clinic 1`
--

INSERT INTO `clinic 1` (`id`, `wait_time_hours`, `wait_time_minutes`, `message`, `last_updated`, `festive_theme`, `consult_fee`, `clinic_id`) VALUES
(1, 2, 0, 'A Vet nurse will be with you shortly to triage.', '2025-01-06 21:12:54', 'none', '336.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `clinic 2`
--

DROP TABLE IF EXISTS `clinic 2`;
CREATE TABLE IF NOT EXISTS `clinic 2` (
  `id` int NOT NULL AUTO_INCREMENT,
  `wait_time_hours` int NOT NULL,
  `wait_time_minutes` int NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `last_updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `festive_theme` varchar(255) DEFAULT 'none',
  `consult_fee` decimal(10,2) DEFAULT '336.00',
  `clinic_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `clinic_id` (`clinic_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clinic 2`
--

INSERT INTO `clinic 2` (`id`, `wait_time_hours`, `wait_time_minutes`, `message`, `last_updated`, `festive_theme`, `consult_fee`, `clinic_id`) VALUES
(1, 2, 0, 'A Vet nurse will be with you shortly to triage.', '2025-01-06 19:10:08', 'none', '336.00', 0);
COMMIT;
