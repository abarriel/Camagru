<?php 
require_once("connect_db.php");
$db_con = connect_db();
$db_con->exec("CREATE DATABASE IF NOT EXISTS `CAMA_TEST` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `CAMA_TEST`;

CREATE TABLE IF NOT EXISTS `data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(25) NOT NULL,
  `picture` text NOT NULL,
  `likes` text,
  `comments` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

INSERT INTO `data` (`id`, `login`, `picture`, `likes`, `comments`) VALUES
(37, 'Allan', 'e3d7271e463dd033e7ad2ecf2f523783', NULL, NULL),
(38, 'Allan', 'bf3300c9ae37f063c6a882e3032b54fd', NULL, NULL),
(39, 'Allan', '0e691c5c4e1d904257ba7e9fb657e3c6', NULL, NULL),
(40, 'Allan', '1f03ae1720f12f35628431618e3f5e4d', NULL, NULL),
(41, 'Allan', 'ea2cbd46c1a3a98695cf7ce9fba5830e', NULL, NULL),
(42, 'Allan', 'dd35dac2ecc9883a1df9ba72864c10d1', NULL, NULL),
(43, 'Allan', '6e1d1d60d93963ddaee099ccd3f84296', NULL, NULL),
(44, 'Allan', 'fbcfb8c62e371493563e78968c77d393', NULL, NULL),
(45, 'Allan', '0545e8858829505ae802172a8ee4e1e1', NULL, NULL),
(46, 'Allan', '6602439219e3b56c291b20b77281edf7', NULL, NULL),
(47, 'Allan', '3dce223e68112c0847d5b0d5db43c419', NULL, NULL),
(48, 'Allan', '4d6eb1117e80dba76da016a664cf91e2', NULL, NULL),
(49, 'Allan', 'ca6233f6840e196f0ded4b2c3571544b', NULL, NULL),
(50, 'Allan', '1be6cd6148e3a7825d5c4912317e0b2f', NULL, NULL),
(51, 'Allan', '7a899c2b644e4d2532aed93350d6fa60', NULL, NULL),
(52, 'Allan', 'ce82e12c1194bde804e9006e6c1eae5a', NULL, NULL),
(53, 'Allan', '5a9f8eb43da6d8345100f9d3966ca1fa', NULL, NULL),
(54, 'Allan', '2787cd6f674b5b859bbc77056032f13b', NULL, NULL);

CREATE TABLE IF NOT EXISTS `user_db` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` binary(64) NOT NULL,
  `email` varchar(254) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `creation_date` date DEFAULT NULL,
  `cle` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `valid` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

INSERT INTO `user_db` (`id`, `login`, `password`, `email`, `creation_date`, `cle`, `valid`) VALUES
(1, 'Barrielle', 0x33613530383832393537303864333330346630366465303439396239323433626662643638643134383738363135633533316630653334366634376233383964, 'abarriel@student.42.fr', '2017-04-26', '78d45623c812294e6574dae883195e43', 1),
(2, 'Allan', 0x33613530383832393537303864333330346630366465303439396239323433626662643638643134383738363135633533316630653334366634376233383964, 'allan.barrielle@gmail.com', '2017-04-27', '50b0e347f620d19f4a02cb8fa0560b69', 1);

");
?>