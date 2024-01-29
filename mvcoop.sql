-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2020 at 05:15 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27categories

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `type_id`) VALUES
(2, 'Aung Zin', 'Hello12345', 2),
(3, 'Car', 'my lambo', 1),
(4, 'Blinders', 'Peaky Blinders', 1),
(5, 'cc', 'Hello', 2),
(6, 'test', 'I love coding', 2),
(7, 'zzz', 'Hello zzz', 2),
(8, 'vvvv', 'vvvv added', 2),
(9, 'dddd', 'dddd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `category_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `amount`, `category_id`, `qty`, `user_id`, `date`) VALUES
(1, 10000, 4, 70, 16, '2020-12-02'),
(3, 1290, 3, 1, 16, '2020-12-02'),
(4, 2020, 4, 3, 16, '2020-12-08'),
(5, 1500, 4, 12, 16, '2020-12-09'),
(6, 9000000, 4, 3, 16, '2020-12-10'),
(7, 9090990, 4, 5, 16, '2020-12-10'),
(8, 8000, 4, 16, 16, '2020-12-10'),
(9, 3000, 2, 12, 16, '2020-12-10');

-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `incomes`
--

INSERT INTO `incomes` (`id`, `category_id`, `amount`, `user_id`, `date`) VALUES
(40, 2, 1500, 16, '2020-12-10'),
(41, 3, 20000000, 16, '2020-12-10');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `description`) VALUES
(1, 'Income', 'Des1'),
(2, 'Expense', 'Des2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(20) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `is_confirmed` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `is_login` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `profile_image`, `is_confirmed`, `is_active`, `is_login`, `token`, `date`) VALUES
(1, 'aa', 'aa@gmail.com', 'MTIzNA==', 'default_img.jpg', 0, 0, 0, '7bc090b14097e87d6c8d61543e8f9aad551813a1e6532d83afe85ff1a493adf1826933567d9cfec09664ddbeb1066bb4d9e3', 2020),
(2, 'Aung Zin Lat', 'aungzinlatt007@gmail.com', 'MTIxMg==', 'default_img.jpg', 0, 0, 0, 'a8c59742bc3bd384fdc72f4b180baea14738c3adb458629568c463899484de3e3b4927ac4207b90e1b27c5165524f7e3f8df', 2020),
(3, 'Aung Zin', 'aung007@gmail.com', 'NDc2NzY0ODY1', 'default_img.jpg', 0, 0, 0, 'f3bc200e2d366986d4c2f0092346f69748a218de07fc42a386d64db7c438d66ce8d4bb6ebf0501932a7a15b8b8d3756349d8', 2020),
(4, 'test', 'test@gmail.com', 'MTIzNDU=', 'default_img.jpg', 0, 0, 0, '589d692765e8d48e223934c1c9ec365af3e725d1bf0e4fe764d3bb2f69686692ee64fae379fcc2c9a9b33f552be8d2cc46e5', 2020),
(5, 'bb', 'bb@gmail.com', 'NDg1Nzg0OTc1', 'default_img.jpg', 0, 0, 0, 'e1efa325986154580e03e1e04ae5e34c3680c88a4be31382f733552529113a624e116e1a42d76931a35c0b48d41e14d18edb', 2020),
(6, 'cc', 'cc@gmail.com', 'NTY1NjU3', 'default_img.jpg', 0, 0, 0, '210e004f66ff6eebe100d44435bbe5280f41a68188062fba1ee1b2cc9c7b4c13744d09e086da598d234f8c7192c2a5efeca4', 2020),
(7, 'ee', 'ee@gmail.com', 'MTIzNDU=', 'default_img.jpg', 0, 0, 0, '1fb9a4515660ac051d13fba6cc812bc6e3b90fd6f00a6814d18c37abae775e5f78f6f5265bf82d50ef2bec498513031e2be6', 2020),
(8, 'Peaky', 'peaky@gmail.com', 'MTIzNA==', 'default_img.jpg', 0, 0, 0, '1667a48d3bac3c7407652bc4a8ac70af6a2959117362b3a15efbb0f2867e6e286e2b6d3d2560ff47f71a7a5fc7a0169e2248', 2020),
(9, 'Blinders', 'blinders@gmail.ocm', 'NDY0NTc1Nw==', 'default_img.jpg', 0, 0, 0, '540a6a851169e4a64f4961d1c4be1b2da0c21159a379eb3d246ffff16bef973f4ddd43b69547a4b395f12aa245b9a91f775a', 2020),
(10, 'Peaky Blinders', 'peakyblinders@gmail.com', 'ZmRrZmpsaA==', 'default_img.jpg', 0, 0, 0, '34b9c87dd8a273c6f2ef5cbbe116c7b7194d3585c2f34ced4bbd158ede23b706fb64164f5942e5bd93a6a9e5192a206eb60a', 2020),
(11, 'Peaky Blinders', 'peaky@gmail1.com', 'ZmpkamZsag==', 'default_img.jpg', 0, 0, 0, '2a1cbe9b21adf0d3f93c2c506abac59ecf74b855f1bc4e9124a8b97bc43a3da091ac5582e371c2478f414efba0f865bd203f', 2020),
(12, 'Bo Kaw', 'bokaw@gmail.com', 'amRrZmxqZA==', 'default_img.jpg', 0, 0, 0, 'df67d675b44480af4de819b9bec119347ae6feac3e1d99ba963d1e04c9a825993b3c27eb896bb29a1ca5a982e2543164161c', 2020),
(13, 'ff', 'ff@gmail.com', 'ZGZqZmRsZmpm', 'default_img.jpg', 0, 0, 0, '04068ab414918875744c523f56ee80c2ad91b6887d472953a1a2353c365befa5c21f40a4d80327c20b4daaafe9196d7d5465', 2020),
(14, 'ww', 'ww@gmail.com', 'MTIzNDU=', 'default_img.jpg', 0, 0, 0, '408f920cc2b5116aa521fbad9e0ddbb643a550cd1daed509e67bb8aef7a4c442dae6691f032b28f66506f596a92701248567', 2020),
(15, 'xx', 'xx@gmail.com', 'MTIzNDU=', 'default_img.jpg', 0, 0, 0, '03e6a2fed1a11fac87c7642f4f6f5108510ff7ce86fbdbd876caa14af7cf0057dc0472764c919e60dccf5a34cbf5c51a91cf', 2020),
(16, 'zz', 'zz@gmail.com', 'MzQ1Njc=', 'default_img.jpg', 0, 0, 1, '3401d6777b8ebde39f271fe29c73461f4f8efa7cff8f94231a40ccb9289b4df4fa85ac00bd5f32f963d7cf4776cdfc86551c', 2020),
(17, 'Kwee Zin', 'kweezin@gmail.com', 'MTIzNDU=', 'default_img.jpg', 0, 0, 1, '39660fcc01ff80d1419be6797ef9908f9374c36640ea5971d37ba42ea9deb4e6fa16b28717d7b7e8db0cd335a710f46e7e7c', 2020),
(18, 'dd', 'dd@gmail.com', 'OTA5MA==', 'default_img.jpg', 0, 0, 0, '1b608999a99bfe8a50df54819923f4608e86bfde346b1a03bc4d6e566b6d28047c98763772969b868b036aa395b3331abc6a', 2020),
(19, 'Test', 'test1@gmail.com', 'dGVzdA==', 'default_img.jpg', 0, 0, 1, '483a505f3542424695d523f246426e34bd7f64fe0c78932911a737944f1d8360f3283010204c1fd12f08ba16a319614e4def', 2020),
(20, 'test2', 'test2@gmail.com', 'dGVzdDI=', 'default_img.jpg', 0, 0, 0, '0c66bf0690a9cb4dcdc256bbfe3c05b828917c2872590b56a9d451ff3a42fbea1a8ac55545b8c76397e4b24618ede34488f0', 2020);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_categories_income`
-- (See below for the actual view)
--
CREATE TABLE `vw_categories_income` (
`id` int(11)
,`category_name` varchar(255)
,`amount` int(11)
,`user_name` varchar(255)
,`date` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_categories_type`
-- (See below for the actual view)
--
CREATE TABLE `vw_categories_type` (
`id` int(11)
,`name` varchar(255)
,`description` varchar(255)
,`type_name` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_expenses_categories_users`
-- (See below for the actual view)
--
CREATE TABLE `vw_expenses_categories_users` (
`id` int(11)
,`amount` double
,`qty` int(11)
,`date` date
,`category_name` varchar(255)
,`user_name` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `vw_categories_income`
--
DROP TABLE IF EXISTS `vw_categories_income`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_categories_income`  AS  select `incomes`.`id` AS `id`,`categories`.`name` AS `category_name`,`incomes`.`amount` AS `amount`,`users`.`name` AS `user_name`,`incomes`.`date` AS `date` from ((`incomes` left join `categories` on(`categories`.`id` = `incomes`.`category_id`)) left join `users` on(`users`.`id` = `incomes`.`user_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_categories_type`
--
DROP TABLE IF EXISTS `vw_categories_type`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_categories_type`  AS  select `categories`.`id` AS `id`,`categories`.`name` AS `name`,`categories`.`description` AS `description`,`types`.`name` AS `type_name` from (`categories` left join `types` on(`categories`.`type_id` = `types`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_expenses_categories_users`
--
DROP TABLE IF EXISTS `vw_expenses_categories_users`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_expenses_categories_users`  AS  select `expenses`.`id` AS `id`,`expenses`.`amount` AS `amount`,`expenses`.`qty` AS `qty`,`expenses`.`date` AS `date`,`categories`.`name` AS `category_name`,`users`.`name` AS `user_name` from ((`expenses` left join `categories` on(`categories`.`id` = `expenses`.`category_id`)) left join `users` on(`users`.`id` = `expenses`.`user_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
