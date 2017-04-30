-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 24, 2017 at 03:06 PM
-- Server version: 5.6.35
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `CAMA_TEST`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_db`
--
CREATE DATABASE IF NOT EXISTS CAMA_TEST;
USE CAMA_TEST;
CREATE TABLE `user_db` (
  `id` int(11) NOT NULL,
  `login` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` binary(64) NOT NULL COMMENT 'sha-256',
  `email` varchar(254) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `creation_date` date DEFAULT NULL,
  `clef` varchar(255) NOT NULL,
  `actif` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_db`
--

INSERT INTO `user_db` (`id`, `login`, `password`, `email`, `creation_date`, `clef`, `actif`) VALUES
(1, 'abarriel', 0x39663836643038313838346337643635396132666561613063353561643031356133626634663162326230623832326364313564366331356230663030613038, 'allan.barrielle@gmail.com', '2014-09-12', '', 0),
(2, 'lcharvol', 0x9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a080000000000000000000000000000000000000000000000000000000000000000, 'lcharvol@student.42.fr', '2014-05-04', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_db`
--
ALTER TABLE `user_db`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `password` (`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_db`
--
ALTER TABLE `user_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;