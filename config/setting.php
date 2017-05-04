<?php 
require_once("connect_db.php");
$db_con = connect_db();
$db_con->exec("CREATE DATABASE IF NOT EXISTS `CAMA_TEST` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `CAMA_TEST`;

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `login` varchar(25) NOT NULL,
  `picture` text NOT NULL,
  `likes` text,
  `liker` text,
  `comments` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

INSERT INTO `data` (`id`, `login`, `picture`, `likes`, `liker`, `comments`) VALUES
(57, 'Allan', 'b5b31b5131fd79fc0d8079e13a6617bf', '0', NULL, NULL),
(58, 'Allan', 'd80a87c2c3e3e6dfff3037b81a0a9f6e', '0', NULL, NULL),
(59, 'Allan', '7fe4e147cfcdd600895bc3a57b448a7c', '0', NULL, NULL),
(60, 'Allan', '0f6aa727ad599bb3209a1ba9d96c11fa', '0', NULL, NULL),
(61, 'Allan', '973936274300c730e7cb4dce70928924', '0', NULL, NULL),
(62, 'Allan', 'b54ddb5a986d6e8301ecf932e9d72c77', '0', NULL, NULL),
(63, 'Allan', '2dab4841550ad01dc1b2e389e87e6ae1', '0', NULL, NULL),
(64, 'Allan', 'eada974400296b9f425360fe2aad84f2', '0', NULL, NULL),
(65, 'Allan', 'f036737643e061af604d010b81bc52b7', '0', NULL, NULL),
(66, 'Allan', '0b45142a95f6cfe457995fc3f0ee83d2', '0', NULL, NULL),
(67, 'Allan', '09b0924860e830bf07ae6f9f7d79997f', '0', NULL, NULL),
(68, 'Allan', 'e33ba9b3fb858aca61aefec150323a03', '0', NULL, NULL),
(69, 'Allan', '9a3442ced33ce2eab36a6506fc55caae', '0', NULL, NULL),
(70, 'Allan', '2e201ca6ce8b5b8e8231489eb2a4f893', '0', NULL, NULL),
(71, 'Allan', '41340f4a9b0cc191f23139f260460f55', '0', NULL, NULL),
(72, 'Allan', '3a9e665e81a9b84b0b74fc3187bebb19', '0', NULL, NULL),
(73, 'Allan', 'f6ac0a25333b060055efa03128ce896f', '0', NULL, NULL),
(74, 'Allan', '390ba07258a18a6ee76c0c98f4412d17', '0', NULL, NULL),
(75, 'Allan', '26cadb39a30218fc70d301ea772de1b7', '0', NULL, NULL),
(76, 'Barrielle', 'ad6f295f472bf715c822285c54685fa5', '0', NULL, NULL),
(77, 'Barrielle', '472cf1a23de557ae6dccb4603a85ffd5', '0', NULL, NULL),
(78, 'Barrielle', '57e54d853f444f012842837cd2e9b99f', '0', NULL, NULL),
(79, 'Barrielle', 'a6bfd38c9dcca7375442180daa137f05', '0', NULL, NULL),
(80, 'Barrielle', 'a9a74dec7548d95ce8b6e3ab73787f4c', '0', NULL, NULL),
(81, 'Barrielle', '5c00412e0ff2bce15b6d51d11c08781b', '0', NULL, NULL),
(82, 'Barrielle', '477a001c522ca001df90d0fc7385c37a', '0', NULL, NULL),
(83, 'Barrielle', '63c2a255a81a8191d9feceea82d0ab89', '0', NULL, NULL),
(85, 'Barrielle', '0d4d3f09dc6edfa3efa0e298c047afb1', '0', NULL, NULL),
(86, 'Barrielle', '3900a8e2c77add99d69c1a1c245c4d7e', '0', NULL, NULL),
(87, 'Barrielle', 'e487a9d298caf316f0289190e32c3f84', '0', NULL, NULL),
(88, 'Barrielle', 'cbce3c42a55e42c549aa4393f0feda37', '0', NULL, NULL),
(89, 'Barrielle', '3f306cc19e57470bf822a4b88c63c47f', '0', NULL, NULL),
(90, 'Barrielle', 'b58aaad8cc4894751e26d446a50b76c0', '0', NULL, NULL),
(91, 'Barrielle', 'a7d0d826935c59610dee1b5b50f60175', '0', NULL, NULL),
(92, 'Barrielle', 'cd1dc65da31bf1bde1148fe4ab7bcd1e', '0', NULL, NULL),
(93, 'Barrielle', 'e1683dc4b8e2cd13cc186978b355f8ab', '0', NULL, NULL);

CREATE TABLE `user_db` (
  `id` int(11) NOT NULL,
  `login` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` binary(64) NOT NULL,
  `email` varchar(254) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `creation_date` date DEFAULT NULL,
  `cle` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `valid` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

INSERT INTO `user_db` (`id`, `login`, `password`, `email`, `creation_date`, `cle`, `valid`) VALUES
(1, 'Barrielle', 0x33613530383832393537303864333330346630366465303439396239323433626662643638643134383738363135633533316630653334366634376233383964, 'abarriel@student.42.fr', '2017-04-26', '78d45623c812294e6574dae883195e43', 1),
(2, 'Allan', 0x33613530383832393537303864333330346630366465303439396239323433626662643638643134383738363135633533316630653334366634376233383964, 'allan.barrielle@gmail.com', '2017-04-27', '50b0e347f620d19f4a02cb8fa0560b69', 1);
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `user_db`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
ALTER TABLE `user_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

");
?>