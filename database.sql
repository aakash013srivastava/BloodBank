-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 09, 2017 at 09:43 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `bloodbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

DROP TABLE IF EXISTS `requests`;
CREATE TABLE IF NOT EXISTS `requests` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `requested_id` varchar(30) NOT NULL,
  `requested_username` varchar(30) NOT NULL,
  `requesting_username` varchar(50) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  `reg_date` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `requested_id`, `requested_username`, `requesting_username`, `status`, `reg_date`) VALUES
(1, '1', 'Aakash', 'Amit', 'granted', '2017-12-09 03:58:28'),
(3, '1', 'Aakash', 'Ananya', 'granted', '2017-12-09 07:20:24'),
(4, '1', 'Aakash', 'Amit', 'granted', '2017-12-09 09:23:53'),
(5, '1', 'Aakash', 'Amit', 'granted', '2017-12-09 09:25:32'),
(6, '1', 'Aakash', 'Amit', 'granted', '2017-12-09 09:30:15'),
(7, '1', 'Aakash', 'Amit', 'granted', '2017-12-09 09:32:09'),
(8, '5', 'Abhay', 'yuvi', 'granted', '2017-12-09 09:34:10'),
(9, '3', 'Ankit', 'yuvi', 'granted', '2017-12-09 09:34:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `bgroup` varchar(50) DEFAULT NULL,
  `reg_date` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `type`, `password`, `bgroup`, `reg_date`) VALUES
(1, 'Aakash', 'hospital', 'Aakash', 'A+;A-;AB-;', '2017-12-08 12:47:53'),
(2, 'Amit', 'receiver', 'Amit', 'A+', '2017-12-08 13:16:27'),
(3, 'Ankit', 'hospital', 'Ankit', 'O+;', '2017-12-09 02:47:23'),
(4, 'Ananya', 'receiver', 'Ananya', 'A+', '2017-12-09 02:48:07'),
(5, 'Abhay', 'hospital', 'Abhay', 'O+;', '2017-12-09 02:57:16'),
(6, 'yuvi', 'receiver', 'yuvi', 'O+', '2017-12-09 03:44:19');
