-- --------------------------------------------------------
-- 主机:                           127.0.0.1
-- 服务器版本:                        10.1.31-MariaDB - mariadb.org binary distribution
-- 服务器操作系统:                      Win32
-- HeidiSQL 版本:                  9.5.0.5239
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- 导出 wishkick 的数据库结构
CREATE DATABASE IF NOT EXISTS `wishkick` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `wishkick`;

-- 导出  表 wishkick.addresses 结构
CREATE TABLE IF NOT EXISTS `addresses` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `name` varchar(150) NOT NULL,
  `address_line` varchar(150) NOT NULL,
  `suite` varchar(150) DEFAULT NULL,
  `city` varchar(150) DEFAULT NULL,
  `state` varchar(150) DEFAULT NULL,
  `zip` varchar(150) DEFAULT NULL,
  `type` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0:default, 1: billing, 2: delivery',
  `set_default` tinyint(2) NOT NULL DEFAULT '0' COMMENT '1: default',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0: normal, 1:deleted',
  `reg_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 正在导出表  wishkick.addresses 的数据：~0 rows (大约)
/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;
/*!40000 ALTER TABLE `addresses` ENABLE KEYS */;

-- 导出  表 wishkick.assigned_products 结构
CREATE TABLE IF NOT EXISTS `assigned_products` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `video_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 正在导出表  wishkick.assigned_products 的数据：~0 rows (大约)
/*!40000 ALTER TABLE `assigned_products` DISABLE KEYS */;
/*!40000 ALTER TABLE `assigned_products` ENABLE KEYS */;

-- 导出  表 wishkick.carts 结构
CREATE TABLE IF NOT EXISTS `carts` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `video_id` bigint(20) NOT NULL DEFAULT '0',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0: normal 1: deleted',
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 正在导出表  wishkick.carts 的数据：~0 rows (大约)
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;

-- 导出  表 wishkick.categories 结构
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1: deleted',
  `reg_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- 正在导出表  wishkick.categories 的数据：~6 rows (大约)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`, `description`, `status`, `reg_date`) VALUES
	(1, 'Popular', 'This is popular category', 0, '2020-10-16 06:17:20'),
	(2, 'Clothes', 'This is Clothes Category', 0, '2020-10-16 06:52:28'),
	(3, 'Food', 'This is Food Category', 0, '2020-10-17 10:47:16'),
	(4, 'Deserts', 'This is Desert Category', 0, '2020-10-17 10:47:31'),
	(5, 'Toy', 'This is Toy Category', 0, '2020-10-17 10:47:43'),
	(6, 'Womens', 'This is Womens Category', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- 导出  表 wishkick.orders 结构
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(50) NOT NULL,
  `product_id` bigint(20) NOT NULL DEFAULT '0',
  `quantity` bigint(20) NOT NULL DEFAULT '0',
  `order_date` datetime NOT NULL,
  `delivered_date` datetime NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0: order, 1:delivered 2: deleted',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 正在导出表  wishkick.orders 的数据：~0 rows (大约)
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- 导出  表 wishkick.payments 结构
CREATE TABLE IF NOT EXISTS `payments` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `card_name` varchar(150) DEFAULT NULL,
  `card_number` varchar(150) DEFAULT NULL,
  `expire_date` date DEFAULT NULL,
  `paypal_email` varchar(150) DEFAULT NULL,
  `type` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0: card, 1: paypal, 2: deleted',
  `reg_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 正在导出表  wishkick.payments 的数据：~0 rows (大约)
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;

-- 导出  表 wishkick.products 结构
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `image` text NOT NULL,
  `description` longtext NOT NULL,
  `category_id` bigint(20) NOT NULL DEFAULT '0',
  `new_price` float NOT NULL DEFAULT '0',
  `old_price` float NOT NULL DEFAULT '0',
  `points` int(11) NOT NULL DEFAULT '0',
  `amount` bigint(20) NOT NULL DEFAULT '0',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0: normal, 1: deleted',
  `reg_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- 正在导出表  wishkick.products 的数据：~8 rows (大约)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `name`, `image`, `description`, `category_id`, `new_price`, `old_price`, `points`, `amount`, `status`, `reg_date`) VALUES
	(1, 'Noodle', 'c8a325f5d3ae10dbb8cae937ee4a9168.png', 'Noodle was born in Osaka, Japan on October 31, 1990. She spent a portion of her childhood in Japan as a subject of a classified Japanese super soldier project under the management of the Japanese scientist, Mr. Kyuzo.\n\nNoodle, along with 22 other children, were trained with the sole purpose of fighting as soldiers of the Japanese military and government. After the children were deemed too dangerous and unstable for combat, the project was scrapped. Mr. Kyuzo was then ordered to dispose of all possible traces of the failed experiment, as well as its participants. [1]\n\nAfter killing the other 22 children, Kyuzo was reluctant in killing Noodle. Rather than killing her, Kyuzo placed her in a state of amnesia through the use of verbal commands. The phrase used to place Noodle in her state of amnesia was known as Ocean Bacon. After temporarily clearing her memory of the project, Kyuzo smuggled Noodle to the United Kingdom in a FedEx crate and falsely reported her death (along with the other 22 children) to his superiors.\n\nNoodle arrived at the doorstep of Kong Studios in 1998, in a FedEx crate. Once the crate was taken inside, Noodle sprung out of the box and performed a guitar solo (which 2-D described as "200 demons screaming in Arabic. Brilliant!"). She ended her solo with a 20-foot high karate kick and saying a few words in Japanese before bowing and saying the word "Noodle". This resulted in her earning the name "Noodle" (her only currently known name) and replacing Paula Cracker as the band\'s lead guitarist. ', 3, 50.5, 120, 0, 50, 0, '2020-10-18 02:57:43'),
	(2, 'Apple', '162fbae777ff369d115717fe1cd661a1.png', 'Noodle was born in Osaka, Japan on October 31, 1990. She spent a portion of her childhood in Japan as a subject of a classified Japanese super soldier project under the management of the Japanese scientist, Mr. Kyuzo.\r\n\r\nNoodle, along with 22 other children, were trained with the sole purpose of fighting as soldiers of the Japanese military and government. After the children were deemed too dangerous and unstable for combat, the project was scrapped. Mr. Kyuzo was then ordered to dispose of all possible traces of the failed experiment, as well as its participants. [1]\r\n\r\nAfter killing the other 22 children, Kyuzo was reluctant in killing Noodle. Rather than killing her, Kyuzo placed her in a state of amnesia through the use of verbal commands. The phrase used to place Noodle in her state of amnesia was known as Ocean Bacon. After temporarily clearing her memory of the project, Kyuzo smuggled Noodle to the United Kingdom in a FedEx crate and falsely reported her death (along with the other 22 children) to his superiors.\r\n\r\nNoodle arrived at the doorstep of Kong Studios in 1998, in a FedEx crate. Once the crate was taken inside, Noodle sprung out of the box and performed a guitar solo (which 2-D described as "200 demons screaming in Arabic. Brilliant!"). She ended her solo with a 20-foot high karate kick and saying a few words in Japanese before bowing and saying the word "Noodle". This resulted in her earning the name "Noodle" (her only currently known name) and replacing Paula Cracker as the band\'s lead guitarist. ', 4, 12, 120, 0, 50, 0, '2020-10-18 03:00:49'),
	(3, 'Apple1', '162fbae777ff369d115717fe1cd661a1.png', 'Noodle was born in Osaka, Japan on October 31, 1990. She spent a portion of her childhood in Japan as a subject of a classified Japanese super soldier project under the management of the Japanese scientist, Mr. Kyuzo.\r\n\r\nNoodle, along with 22 other children, were trained with the sole purpose of fighting as soldiers of the Japanese military and government. After the children were deemed too dangerous and unstable for combat, the project was scrapped. Mr. Kyuzo was then ordered to dispose of all possible traces of the failed experiment, as well as its participants. [1]\r\n\r\nAfter killing the other 22 children, Kyuzo was reluctant in killing Noodle. Rather than killing her, Kyuzo placed her in a state of amnesia through the use of verbal commands. The phrase used to place Noodle in her state of amnesia was known as Ocean Bacon. After temporarily clearing her memory of the project, Kyuzo smuggled Noodle to the United Kingdom in a FedEx crate and falsely reported her death (along with the other 22 children) to his superiors.\r\n\r\nNoodle arrived at the doorstep of Kong Studios in 1998, in a FedEx crate. Once the crate was taken inside, Noodle sprung out of the box and performed a guitar solo (which 2-D described as "200 demons screaming in Arabic. Brilliant!"). She ended her solo with a 20-foot high karate kick and saying a few words in Japanese before bowing and saying the word "Noodle". This resulted in her earning the name "Noodle" (her only currently known name) and replacing Paula Cracker as the band\'s lead guitarist. ', 4, 12, 120, 0, 50, 0, '2020-10-18 03:01:07'),
	(4, 'Mango', 'c8a325f5d3ae10dbb8cae937ee4a9168.png', 'Noodle was born in Osaka, Japan on October 31, 1990. She spent a portion of her childhood in Japan as a subject of a classified Japanese super soldier project under the management of the Japanese scientist, Mr. Kyuzo.\n\nNoodle, along with 22 other children, were trained with the sole purpose of fighting as soldiers of the Japanese military and government. After the children were deemed too dangerous and unstable for combat, the project was scrapped. Mr. Kyuzo was then ordered to dispose of all possible traces of the failed experiment, as well as its participants. [1]\n\nAfter killing the other 22 children, Kyuzo was reluctant in killing Noodle. Rather than killing her, Kyuzo placed her in a state of amnesia through the use of verbal commands. The phrase used to place Noodle in her state of amnesia was known as Ocean Bacon. After temporarily clearing her memory of the project, Kyuzo smuggled Noodle to the United Kingdom in a FedEx crate and falsely reported her death (along with the other 22 children) to his superiors.\n\nNoodle arrived at the doorstep of Kong Studios in 1998, in a FedEx crate. Once the crate was taken inside, Noodle sprung out of the box and performed a guitar solo (which 2-D described as "200 demons screaming in Arabic. Brilliant!"). She ended her solo with a 20-foot high karate kick and saying a few words in Japanese before bowing and saying the word "Noodle". This resulted in her earning the name "Noodle" (her only currently known name) and replacing Paula Cracker as the band\'s lead guitarist. ', 4, 50, 120, 0, 30, 0, '2020-10-18 03:03:59'),
	(5, 'Mango32', '2d963f9b70dc8d9e9283e779ab3bcf4c.png', 'Noodle was born in Osaka, Japan on October 31, 1990. She spent a portion of her childhood in Japan as a subject of a classified Japanese super soldier project under the management of the Japanese scientist, Mr. Kyuzo.\r\n\r\nNoodle, along with 22 other children, were trained with the sole purpose of fighting as soldiers of the Japanese military and government. After the children were deemed too dangerous and unstable for combat, the project was scrapped. Mr. Kyuzo was then ordered to dispose of all possible traces of the failed experiment, as well as its participants. [1]\r\n\r\nAfter killing the other 22 children, Kyuzo was reluctant in killing Noodle. Rather than killing her, Kyuzo placed her in a state of amnesia through the use of verbal commands. The phrase used to place Noodle in her state of amnesia was known as Ocean Bacon. After temporarily clearing her memory of the project, Kyuzo smuggled Noodle to the United Kingdom in a FedEx crate and falsely reported her death (along with the other 22 children) to his superiors.\r\n\r\nNoodle arrived at the doorstep of Kong Studios in 1998, in a FedEx crate. Once the crate was taken inside, Noodle sprung out of the box and performed a guitar solo (which 2-D described as "200 demons screaming in Arabic. Brilliant!"). She ended her solo with a 20-foot high karate kick and saying a few words in Japanese before bowing and saying the word "Noodle". This resulted in her earning the name "Noodle" (her only currently known name) and replacing Paula Cracker as the band\'s lead guitarist. ', 4, 50, 120, 0, 30, 0, '2020-10-18 03:04:50'),
	(6, 'asdf12', '3371f969cd1e8372a640eec02381b6f1.png', 'Noodle was born in Osaka, Japan on October 31, 1990. She spent a portion of her childhood in Japan as a subject of a classified Japanese super soldier project under the management of the Japanese scientist, Mr. Kyuzo.\r\n\r\nNoodle, along with 22 other children, were trained with the sole purpose of fighting as soldiers of the Japanese military and government. After the children were deemed too dangerous and unstable for combat, the project was scrapped. Mr. Kyuzo was then ordered to dispose of all possible traces of the failed experiment, as well as its participants. [1]\r\n\r\nAfter killing the other 22 children, Kyuzo was reluctant in killing Noodle. Rather than killing her, Kyuzo placed her in a state of amnesia through the use of verbal commands. The phrase used to place Noodle in her state of amnesia was known as Ocean Bacon. After temporarily clearing her memory of the project, Kyuzo smuggled Noodle to the United Kingdom in a FedEx crate and falsely reported her death (along with the other 22 children) to his superiors.\r\n\r\nNoodle arrived at the doorstep of Kong Studios in 1998, in a FedEx crate. Once the crate was taken inside, Noodle sprung out of the box and performed a guitar solo (which 2-D described as "200 demons screaming in Arabic. Brilliant!"). She ended her solo with a 20-foot high karate kick and saying a few words in Japanese before bowing and saying the word "Noodle". This resulted in her earning the name "Noodle" (her only currently known name) and replacing Paula Cracker as the band\'s lead guitarist. ', 3, 34, 23, 0, 23, 1, '2020-10-18 03:05:23'),
	(7, 'Spagetti', '7075d9e9cb3958870fcba2249b13efdd.png', 'Noodle was born in Osaka, Japan on October 31, 1990. She spent a portion of her childhood in Japan as a subject of a classified Japanese super soldier project under the management of the Japanese scientist, Mr. Kyuzo.\r\n\r\nNoodle, along with 22 other children, were trained with the sole purpose of fighting as soldiers of the Japanese military and government. After the children were deemed too dangerous and unstable for combat, the project was scrapped. Mr. Kyuzo was then ordered to dispose of all possible traces of the failed experiment, as well as its participants. [1]\r\n\r\nAfter killing the other 22 children, Kyuzo was reluctant in killing Noodle. Rather than killing her, Kyuzo placed her in a state of amnesia through the use of verbal commands. The phrase used to place Noodle in her state of amnesia was known as Ocean Bacon. After temporarily clearing her memory of the project, Kyuzo smuggled Noodle to the United Kingdom in a FedEx crate and falsely reported her death (along with the other 22 children) to his superiors.\r\n\r\nNoodle arrived at the doorstep of Kong Studios in 1998, in a FedEx crate. Once the crate was taken inside, Noodle sprung out of the box and performed a guitar solo (which 2-D described as "200 demons screaming in Arabic. Brilliant!"). She ended her solo with a 20-foot high karate kick and saying a few words in Japanese before bowing and saying the word "Noodle". This resulted in her earning the name "Noodle" (her only currently known name) and replacing Paula Cracker as the band\'s lead guitarist. ', 3, 30, 30, 0, 30, 0, '2020-10-18 03:05:59'),
	(8, 'asdf23', '2d963f9b70dc8d9e9283e779ab3bcf4c.png', 'Noodle was born in Osaka, Japan on October 31, 1990. She spent a portion of her childhood in Japan as a subject of a classified Japanese super soldier project under the management of the Japanese scientist, Mr. Kyuzo.\n\nNoodle, along with 22 other children, were trained with the sole purpose of fighting as soldiers of the Japanese military and government. After the children were deemed too dangerous and unstable for combat, the project was scrapped. Mr. Kyuzo was then ordered to dispose of all possible traces of the failed experiment, as well as its participants. [1]\n\nAfter killing the other 22 children, Kyuzo was reluctant in killing Noodle. Rather than killing her, Kyuzo placed her in a state of amnesia through the use of verbal commands. The phrase used to place Noodle in her state of amnesia was known as Ocean Bacon. After temporarily clearing her memory of the project, Kyuzo smuggled Noodle to the United Kingdom in a FedEx crate and falsely reported her death (along with the other 22 children) to his superiors.\n\nNoodle arrived at the doorstep of Kong Studios in 1998, in a FedEx crate. Once the crate was taken inside, Noodle sprung out of the box and performed a guitar solo (which 2-D described as "200 demons screaming in Arabic. Brilliant!"). She ended her solo with a 20-foot high karate kick and saying a few words in Japanese before bowing and saying the word "Noodle". This resulted in her earning the name "Noodle" (her only currently known name) and replacing Paula Cracker as the band\'s lead guitarist. ', 1, 0, 0, 0, 0, 0, '2020-10-18 03:11:07'),
	(9, 'asdf1', 'ad58475d7268c1248514f2662962cd0e.png', 'Noodle was born in Osaka, Japan on October 31, 1990. She spent a portion of her childhood in Japan as a subject of a classified Japanese super soldier project under the management of the Japanese scientist, Mr. Kyuzo.\r\n\r\nNoodle, along with 22 other children, were trained with the sole purpose of fighting as soldiers of the Japanese military and government. After the children were deemed too dangerous and unstable for combat, the project was scrapped. Mr. Kyuzo was then ordered to dispose of all possible traces of the failed experiment, as well as its participants. [1]\r\n\r\nAfter killing the other 22 children, Kyuzo was reluctant in killing Noodle. Rather than killing her, Kyuzo placed her in a state of amnesia through the use of verbal commands. The phrase used to place Noodle in her state of amnesia was known as Ocean Bacon. After temporarily clearing her memory of the project, Kyuzo smuggled Noodle to the United Kingdom in a FedEx crate and falsely reported her death (along with the other 22 children) to his superiors.\r\n\r\nNoodle arrived at the doorstep of Kong Studios in 1998, in a FedEx crate. Once the crate was taken inside, Noodle sprung out of the box and performed a guitar solo (which 2-D described as "200 demons screaming in Arabic. Brilliant!"). She ended her solo with a 20-foot high karate kick and saying a few words in Japanese before bowing and saying the word "Noodle". This resulted in her earning the name "Noodle" (her only currently known name) and replacing Paula Cracker as the band\'s lead guitarist. ', 3, 0, 0, 0, 0, 0, '2020-10-18 03:11:27'),
	(10, 'asdf123', 'e9c27437d178bb19c418ec384d48758b.png', 'Noodle was born in Osaka, Japan on October 31, 1990. She spent a portion of her childhood in Japan as a subject of a classified Japanese super soldier project under the management of the Japanese scientist, Mr. Kyuzo.\r\n\r\nNoodle, along with 22 other children, were trained with the sole purpose of fighting as soldiers of the Japanese military and government. After the children were deemed too dangerous and unstable for combat, the project was scrapped. Mr. Kyuzo was then ordered to dispose of all possible traces of the failed experiment, as well as its participants. [1]\r\n\r\nAfter killing the other 22 children, Kyuzo was reluctant in killing Noodle. Rather than killing her, Kyuzo placed her in a state of amnesia through the use of verbal commands. The phrase used to place Noodle in her state of amnesia was known as Ocean Bacon. After temporarily clearing her memory of the project, Kyuzo smuggled Noodle to the United Kingdom in a FedEx crate and falsely reported her death (along with the other 22 children) to his superiors.\r\n\r\nNoodle arrived at the doorstep of Kong Studios in 1998, in a FedEx crate. Once the crate was taken inside, Noodle sprung out of the box and performed a guitar solo (which 2-D described as "200 demons screaming in Arabic. Brilliant!"). She ended her solo with a 20-foot high karate kick and saying a few words in Japanese before bowing and saying the word "Noodle". This resulted in her earning the name "Noodle" (her only currently known name) and replacing Paula Cracker as the band\'s lead guitarist. ', 3, 0, 0, 0, 0, 0, '2020-10-18 03:14:47');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- 导出  表 wishkick.users 结构
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `first_name` varchar(150) DEFAULT NULL,
  `last_name` varchar(150) DEFAULT NULL,
  `username` varchar(150) DEFAULT NULL,
  `phone` varchar(150) DEFAULT NULL,
  `photo` varchar(150) DEFAULT NULL,
  `role` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0: user 1: admin',
  `google_id` varchar(150) DEFAULT NULL,
  `facebook_id` varchar(150) DEFAULT NULL,
  `point` bigint(20) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0: normal, 1:deleted',
  `reg_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- 正在导出表  wishkick.users 的数据：~0 rows (大约)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `email`, `password`, `first_name`, `last_name`, `username`, `phone`, `photo`, `role`, `google_id`, `facebook_id`, `point`, `status`, `reg_date`) VALUES
	(1, 'admin@gmail.com', '47bce5c74f589f4867dbd57e9ca9f808', 'Jhone', 'Doe', 'Admin', NULL, NULL, 1, NULL, NULL, NULL, 0, '2020-10-15 00:00:00');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- 导出  表 wishkick.videos 结构
CREATE TABLE IF NOT EXISTS `videos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) NOT NULL DEFAULT '0',
  `title` varchar(150) NOT NULL,
  `description` longtext NOT NULL,
  `video` text NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0: normal, 1: deleted',
  `reg_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- 正在导出表  wishkick.videos 的数据：~0 rows (大约)
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
INSERT INTO `videos` (`id`, `category_id`, `title`, `description`, `video`, `status`, `reg_date`) VALUES
	(1, 2, 'asdf', 'Noodle was born in Osaka, Japan on October 31, 1990. She spent a portion of her childhood in Japan as a subject of a classified Japanese super soldier project under the management of the Japanese scientist, Mr. Kyuzo. Noodle, along with 22 other children, were trained with the sole purpose of fighting as soldiers of the Japanese military and government. After the children were deemed too dangerous and unstable for combat, the project was scrapped. Mr. Kyuzo was then ordered to dispose of all possible traces of the failed experiment, as well as its participants. [1] After killing the other 22 children, Kyuzo was reluctant in killing Noodle. Rather than killing her, Kyuzo placed her in a state of amnesia through the use of verbal commands. The phrase used to place Noodle in her state of amnesia was known as Ocean Bacon. After temporarily clearing her memory of the project, Kyuzo smuggled Noodle to the United Kingdom in a FedEx crate and falsely reported her death (along with the other 22 children) to his superiors.', '12df1e6f16763b8ebf08f3ad17e1cd26.mp4', 0, '2020-10-18 06:38:36');
/*!40000 ALTER TABLE `videos` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
