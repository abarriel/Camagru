<?php 
require_once("connect_db.php");
$db_con = connect_db();
$db_con->exec("USE `CAMA_TEST`;
CREATE TABLE `data` (
  `login` varchar(25) CHARACTER SET utf8 NOT NULL,
  `picture` text CHARACTER SET utf8 NOT NULL,
  `likes` text CHARACTER SET utf8 NOT NULL,
  `comments` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `user_db` (
  `id` int(11) NOT NULL,
  `login` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` binary(64) NOT NULL,
  `creation_date` date DEFAULT NULL,
  `cle` varchar(255) DEFAULT NULL,
  `valid` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `user_db` (`id`, `login`, `password`, `email`, `creation_date`, `cle`, `valid`) VALUES
(88, 'Barrielle', 0x33613530383832393537303864333330346630366465303439396239323433626662643638643134383738363135633533316630653334366634376233383964, 'abarriel@student.42.fr', '2017-04-26', '78d45623c812294e6574dae883195e43', 1),
(89, 'Allan', 0x33613530383832393537303864333330346630366465303439396239323433626662643638643134383738363135633533316630653334366634376233383964, 'allan.barrielle@gmail.com', '2017-04-27', '50b0e347f620d19f4a02cb8fa0560b69', 1);
ALTER TABLE `user_db`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `user_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;");
?>