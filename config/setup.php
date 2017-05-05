<?php 
require_once("database.php");
$db_con = connect_db();
$db_con->exec("CREATE DATABASE IF NOT EXISTS `camagru` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `camagru`;
CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `login` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `picture` text COLLATE utf8_unicode_ci NOT NULL,
  `likes` int(11) DEFAULT '0',
  `liker` text COLLATE utf8_unicode_ci,
  `comments` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `user_db` (
  `id` int(11) NOT NULL,
  `login` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `password` binary(64) NOT NULL COMMENT 'sha-256',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `creation_date` date DEFAULT NULL,
  `cle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `valid` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `user_db`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `user_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
");
?>