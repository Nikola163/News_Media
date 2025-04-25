-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2024 at 04:01 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zavrsna`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gallery_id` int(11) UNSIGNED NOT NULL,
  `gallery_title` varchar(255) NOT NULL,
  `gallery_description` varchar(4096) NOT NULL,
  `gallery_publish_date` date NOT NULL,
  `gallery_publish_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `gallery_title`, `gallery_description`, `gallery_publish_date`, `gallery_publish_time`) VALUES
(1, 'slika #1', 'slika #1 opis', '2024-03-15', '12:54:32'),
(2, 'slika #2', 'slika #2 opis', '2024-03-15', '12:58:03'),
(11, 'test', 'test', '2024-03-15', '13:46:08'),
(12, 'test', 'test', '2024-03-15', '13:46:28'),
(13, 'asdasd', 'ssad', '2024-08-31', '22:02:13');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) UNSIGNED NOT NULL,
  `news_publisher` varchar(255) NOT NULL,
  `news_category` varchar(255) NOT NULL,
  `news_title` varchar(255) NOT NULL,
  `news_short` varchar(255) NOT NULL,
  `news_description` varchar(4096) NOT NULL,
  `news_publish_date` date NOT NULL,
  `news_publish_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_publisher`, `news_category`, `news_title`, `news_short`, `news_description`, `news_publish_date`, `news_publish_time`) VALUES
(70, 'marko', '', 'Svetsko prvenstvo', 'Marko', 'Marko', '2024-09-01', '03:36:56'),
(71, 'marko', '', 'Proba', 'Proba', 'Proba', '2024-09-01', '03:37:20'),
(72, 'Proba', '', 'Proba', 'Proba', 'Proba\r\n', '2024-09-01', '03:39:52'),
(73, 'Proba', '', 'Ja sam admin', 'admin', 'admin', '2024-09-01', '03:40:16'),
(74, 'Proba', '', 'asddas', 'dasdas', 'adsdas', '2024-09-01', '03:41:24'),
(75, 'Proba', '', 'sad', 'asd', 'asd', '2024-09-01', '03:41:59'),
(76, '', '', 'ad', 'ad', 'ad', '2024-09-01', '03:43:56'),
(77, 'proba1', '', 'proba', 'proba', 'proba', '2024-09-01', '03:44:52'),
(78, 'admin2', '', 'asd', 'asd', 'asd', '2024-09-01', '03:45:21'),
(79, 'admin2', '', 'admin1', 'admin1', 'admin1', '2024-09-01', '03:45:48'),
(80, 'Kako', '', 'kako', 'kako', 'kako\r\n', '2024-09-01', '03:46:59'),
(81, 'sad', '', 'sad', 'sad', 'sad', '2024-09-01', '03:47:21'),
(85, 'ja', '', 'Evroliga', 'sad ', 'sad', '2024-09-01', '03:55:37'),
(86, 'ja', '', 'NBA', 'Danas se igrala utakmica ', 'pise\nDanas se igrala utakmica  Danas se igrala utakmica  Danas se igrala utakmica  Danas se igrala utakmica  Danas se igrala utakmica  Danas se igrala utakmica  Danas se igrala utakmica ', '2024-09-01', '03:57:30'),
(99, 'ana', '', 'Jelen super liga', 'Fudbalksa utakmica', 'Fudbalksa utakmica Fudbalksa utakmica Fudbalksa utakmica Fudbalksa utakmica Fudbalksa utakmica Fudbalksa utakmica', '2024-09-01', '04:09:06'),
(100, 'ana', '', 'Aba liga', 'Aba liga Aba liga Aba liga Aba liga Aba liga ', 'Aba liga je bila ovo Aba liga je bila ovo Aba liga je bila ovo Aba liga je bila ovo Aba liga je bila ovo ', '2024-09-01', '04:09:21'),
(101, 'ana', '', 'Evroliga', 'Kosarkaska utakmica', 'Danas igraju Danas igraju Danas igraju Danas igraju Danas igraju', '2024-09-01', '04:10:39'),
(102, 'ana', '', 'Odbojka ', 'Danas igraju srbija - australia', 'Na danasnjoj utakmici je bilo Na danasnjoj utakmici je bilo Na danasnjoj utakmici je bilo ', '2024-09-01', '04:11:27'),
(103, 'ana', '', 'Vaterpolo', 'Vaterpolo utakmica', 'Vaterpolo vaterpolo vaterpolo', '2024-09-01', '04:22:47'),
(121, 'Nikola', '', 'Tenis', 'Utakmica', 'Tenis igraju Tenis igraju Tenis igraju\n\n', '2024-09-01', '04:49:31'),
(123, 'Nikola', '', 'Olimpijske igre', 'Utakmica Srbija-Amerika', 'Igra se utakmica izmedju Srbije i Amerike', '2024-09-01', '04:51:43');

-- --------------------------------------------------------

--
-- Table structure for table `news_category`
--

CREATE TABLE `news_category` (
  `ID` int(11) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news_category`
--

INSERT INTO `news_category` (`ID`, `category_name`) VALUES
(1, 'Sport News'),
(2, 'Travel news\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `user_level` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `user_level`) VALUES
(1, 'admin', 'admin', 1),
(46, 'Jovan', 'jovan', 0),
(47, 'Kako', 'Kako', 0),
(48, 'media', 'media', 0),
(49, 'proba123', 'proba123', 0),
(50, 'sad', 'sad', 0),
(51, 'nikola', 'nikola', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`),
  ADD KEY `news_publisher` (`news_publisher`),
  ADD KEY `news_publisher_2` (`news_publisher`),
  ADD KEY `news_category` (`news_category`);

--
-- Indexes for table `news_category`
--
ALTER TABLE `news_category`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `news_category`
--
ALTER TABLE `news_category`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
