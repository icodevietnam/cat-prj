-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2016 at 09:16 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catprj`
--
CREATE DATABASE IF NOT EXISTS `catprj` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `catprj`;

-- --------------------------------------------------------

--
-- Table structure for table `prj_answers`
--

DROP TABLE IF EXISTS `prj_answers`;
CREATE TABLE `prj_answers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `correct` varchar(255) NOT NULL,
  `question` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prj_answers`
--

INSERT INTO `prj_answers` (`id`, `name`, `correct`, `question`) VALUES
(1, 'at school', '1', 1),
(2, 'in the evenings', '0', 1),
(3, 'in the library', '0', 1),
(4, 'How do you do?', '0', 2),
(5, 'How long for?', '1', 2),
(6, 'How was it?', '0', 2),
(7, 'When are you free?', '0', 3),
(8, 'It was two days ago.', '0', 3),
(9, 'Can you help me?', '1', 3),
(10, 'Have you got anything else?', '0', 4),
(11, ' If you like.', '1', 4),
(12, ' Are you sure about that?', '0', 4),
(13, ' You aren''t eating.', '1', 5),
(14, ' There aren''t any.', '0', 5),
(15, ' Tom isn''t here yet', '0', 5),
(16, ' dropping', '0', 6),
(17, ' landing', '1', 6),
(18, ' falling', '0', 6),
(19, ' descending', '0', 6),
(20, ' can', '1', 7),
(21, ' must', '0', 7),
(22, ' ought', '0', 7),
(23, ' would', '0', 7),
(24, ' miss', '1', 8),
(25, ' lose', '0', 8),
(26, ' fail', '0', 8),
(27, ' drop', '0', 8),
(28, ' opinion', '1', 9),
(29, ' advice', '0', 9),
(30, ' knowledge', '0', 9),
(31, ' information', '0', 9),
(32, ' habit', '0', 10),
(33, ' custom', '1', 10),
(34, ' way', '0', 10),
(35, ' system', '0', 10),
(36, ' getting', '1', 11),
(37, ' doing', '1', 11),
(38, ' making', '0', 11),
(39, ' taking', '0', 11),
(40, ' attitude', '1', 12),
(41, ' behaviour', '0', 12),
(42, ' manner', '0', 12),
(43, ' style', '0', 12),
(44, ' has had', '1', 13),
(45, ' has', '0', 13),
(46, ' is having', '0', 13),
(47, ' had', '0', 13),
(48, 'Although', '0', 14),
(49, ' Provided', '1', 14),
(50, ' As', '0', 14),
(51, ' Unless', '0', 14),
(52, ' contribute', '0', 15),
(53, ' supply', '1', 15),
(54, ' give', '0', 15),
(55, ' produce', '0', 15),
(56, ' Although', '1', 16),
(57, ' Provided', '0', 16),
(58, ' As', '0', 16),
(59, ' Unless', '0', 16),
(60, ' found', '0', 17),
(61, ' set', '1', 17),
(62, ' put', '0', 17),
(63, ' placed', '0', 17),
(64, ' convenient', '1', 18),
(65, ' fitting', '0', 18),
(66, ' handy', '0', 18),
(67, ' suitable', '0', 18),
(68, 'answer 1', '0', 19),
(69, ' answer 2', '1', 19);

-- --------------------------------------------------------

--
-- Table structure for table `prj_categories`
--

DROP TABLE IF EXISTS `prj_categories`;
CREATE TABLE `prj_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prj_categories`
--

INSERT INTO `prj_categories` (`id`, `name`, `description`, `code`) VALUES
(2, 'Grammar', 'Grammar', 'grammar'),
(3, 'Reading', 'reading', 'reading'),
(4, 'Listening', 'listening', 'listening'),
(5, ' Speaking', 'speaking', 'speaking');

-- --------------------------------------------------------

--
-- Table structure for table `prj_examinations`
--

DROP TABLE IF EXISTS `prj_examinations`;
CREATE TABLE `prj_examinations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_start` varchar(255) NOT NULL,
  `date_end` varchar(255) NOT NULL,
  `user` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `question` varchar(2000) NOT NULL,
  `total` int(11) NOT NULL,
  `result` int(11) NOT NULL,
  `complete` int(11) NOT NULL,
  `backup` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prj_examinations`
--

INSERT INTO `prj_examinations` (`id`, `name`, `date_start`, `date_end`, `user`, `level`, `question`, `total`, `result`, `complete`, `backup`) VALUES
(8, 'test-3-1-58298c8aba0ba', '2016-11-14 17:06:02', '2016', 3, 1, '4-3-2-1-5', 50, 0, 1, ''),
(9, 'test-3-1-5829db722e601', '2016-11-14 22:42:42', '2016', 3, 1, '4-1-5-16-17-3-18-2', 80, 0, 1, ''),
(10, 'test-3-1-5829e3ffc8682', '2016-11-14 23:19:11', '2016-11-14 23:34:11', 3, 1, '16-5-2-17-18-3-1-4', 80, 0, 1, ''),
(11, 'test-3-1-5829e41639c2c', '2016-11-14 23:19:34', '2016-11-14 23:34:34', 3, 1, '18-5-1-17-2-16-4-3', 80, 0, 1, ''),
(12, 'test-3-1-5829e8be23f4e', '2016-11-14 23:39:26', '2016-11-14 23:54:26', 3, 1, '16-1-5-3-2-18-17-4', 80, 0, 1, ''),
(13, 'test-3-1-5829e9699aabc', '2016-11-14 23:42:17', '2016-11-14 23:57:17', 3, 1, '3-4-18-2-16-17-1-', 80, 0, 1, ''),
(14, 'test-3-1-5829e9ea4b524', '2016-11-14 23:44:26', '2016-11-14 23:59:26', 3, 1, '1-4-2-18-3-16-17-', 80, 0, 1, ''),
(15, 'test-3-1-5829ea559c823', '2016-11-14 23:46:13', '2016-11-15 00:01:13', 3, 1, '5-18-4-1-2-16-3-1', 80, 0, 1, ''),
(16, 'test-3-1-582a4115d9635', '2016-11-15 05:56:21', '2016-11-15 06:11:21', 3, 1, '16-3-5-17-2-18-1-', 80, 0, 1, ''),
(17, 'test-3-2-582a4308910fe', '2016-11-15 06:04:40', '2016-11-15 06:19:40', 3, 2, '8-6-7-9-10--', 50, 0, 1, ''),
(18, 'test-3-1-582a43fbf343f', '2016-11-15 06:08:43', '2016-11-15 06:23:43', 3, 1, '17-18-1-16-2-3-4-', 80, 0, 1, ''),
(19, 'test-3-1-582a4490351cd', '2016-11-15 06:11:12', '2016-11-15 06:26:12', 3, 1, '18-4-2-17-5-1-3-1', 80, 0, 1, ''),
(20, 'test-3-1-5832e047d8e8d', '2016-11-21 18:53:43', '2016-11-21 19:08:43', 3, 1, '4-1-2-17-16-5-18-', 80, 0, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `prj_lessions`
--

DROP TABLE IF EXISTS `prj_lessions`;
CREATE TABLE `prj_lessions` (
  `id` int(11) NOT NULL,
  `title` varchar(1000) DEFAULT NULL,
  `description` varchar(10000) DEFAULT NULL,
  `content` varchar(10000) DEFAULT NULL,
  `img` varchar(2000) DEFAULT NULL,
  `video` mediumtext,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prj_lessions`
--

INSERT INTO `prj_lessions` (`id`, `title`, `description`, `content`, `img`, `video`, `category`) VALUES
(3, 'mmmmm 3', 'mmmmm3', '', 'http://localhost/cat-prj/assets/file/f06e07a14a1a1f0e3445bd3a3804e206.jpg', 'https://www.youtube.com/v/YgEz2gLQRf0', 5),
(4, 'bbbb', 'cccc', '', 'http://localhost/cat-prj/assets/file/4ce162c59197e5d0c0ab42b8e4776678.jpeg', 'https://www.youtube.com/v/YgEz2gLQRf0', 5);

-- --------------------------------------------------------

--
-- Table structure for table `prj_levels`
--

DROP TABLE IF EXISTS `prj_levels`;
CREATE TABLE `prj_levels` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prj_levels`
--

INSERT INTO `prj_levels` (`id`, `name`, `description`) VALUES
(1, 'Easy', 'Easy'),
(2, 'Medium', 'Medium'),
(3, 'Hard', 'Hard');

-- --------------------------------------------------------

--
-- Table structure for table `prj_news`
--

DROP TABLE IF EXISTS `prj_news`;
CREATE TABLE `prj_news` (
  `id` int(11) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `content` varchar(10000) NOT NULL,
  `type` int(11) NOT NULL,
  `image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prj_questions`
--

DROP TABLE IF EXISTS `prj_questions`;
CREATE TABLE `prj_questions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `audio` varchar(255) NOT NULL,
  `point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prj_questions`
--

INSERT INTO `prj_questions` (`id`, `name`, `description`, `level`, `audio`, `point`) VALUES
(1, 'Question 1', '<p>When can we meet again?&nbsp;</p>', 1, 'Do not attach the audio file', 10),
(2, 'Question 2', '<p>My aunt is going to stay with me.&nbsp;</p>', 1, 'Do not attach the audio file', 10),
(3, 'Question 3', '<p>When do you study?&nbsp;</p>', 1, 'Do not attach the audio file', 10),
(4, 'Question 4', '<p>Would you prefer lemonade or orange juice?&nbsp;</p>', 1, 'Do not attach the audio file', 10),
(5, ' Question 5', '<p>Let''s have dinner now.</p>', 1, 'Do not attach the audio file', 10),
(6, 'Question 1', '<p>The snow was ...... heavily when I left the house.&nbsp;</p>', 2, 'Do not attach the audio file', 10),
(7, ' Question 2', '<p>I can''t find my keys anywhere - I ...... have left them at work.&nbsp;</p>', 2, 'Do not attach the audio file', 10),
(8, ' Question 3', '<p>When a car pulled out in front of her, Jane did well not to ...... control of her bicycle.&nbsp;</p>', 2, 'Do not attach the audio file', 10),
(9, ' Question 4', '<p>According to Richard''s ...... the train leaves at 7 o''clock.&nbsp;</p>', 2, 'Do not attach the audio file', 10),
(10, ' Question 5', '<p>When you stay in a country for some time you get used to the people''s ...... of life.&nbsp;</p>', 2, 'Do not attach the audio file', 10),
(11, ' Question 1', '<p>The builders are ...... good progress with the new house.</p>', 3, 'Do not attach the audio file', 10),
(12, 'Question 2', '<p>She is now taking a more positive ...... to her studies and should do well.&nbsp;</p>', 3, 'Do not attach the audio file', 10),
(13, ' Question 3', '<p>My father ...... his new car for two weeks now.&nbsp;</p>', 3, 'Do not attach the audio file', 10),
(14, 'Question 4', '<p><span style="color: #333333; font-family: ''Open Sans'', arial, sans-serif; font-size: 15.4px; background-color: #f2f2f2;">...... you get your father''s permission, I''ll take you skiing next weekend.</span></p>', 3, 'Do not attach the audio file', 10),
(15, ' Question 5', '<p><span style="color: #333333; font-family: ''Open Sans'', arial, sans-serif; font-size: 15.4px; background-color: #f2f2f2;">A local company has agreed to ...... the school team with football shirts.</span></p>', 3, 'Do not attach the audio file', 10),
(16, ' Question 6', '<p><span style="color: #333333; font-family: ''Open Sans'', arial, sans-serif; font-size: 15.4px; background-color: #f2f2f2;">...... you get your father''s permission, I''ll take you skiing next weekend.</span></p>', 1, 'Do not attach the audio file', 10),
(17, ' Question 7', '<p><span style="color: #333333; font-family: ''Open Sans'', arial, sans-serif; font-size: 15.4px; background-color: #f2f2f2;">I really enjoy stories that are ...... in the distant future.</span></p>', 1, 'Do not attach the audio file', 10),
(18, ' Question 8', '<p><span style="color: #333333; font-family: ''Open Sans'', arial, sans-serif; font-size: 15.4px; background-color: #f2f2f2;">That old saucepan will come in ...... when we go camping.</span></p>', 1, 'Do not attach the audio file', 10),
(19, 'q', '<p>asdasd</p>', 3, 'Do not attach the audio file', 10);

-- --------------------------------------------------------

--
-- Table structure for table `prj_roles`
--

DROP TABLE IF EXISTS `prj_roles`;
CREATE TABLE `prj_roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prj_roles`
--

INSERT INTO `prj_roles` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'user', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `prj_users`
--

DROP TABLE IF EXISTS `prj_users`;
CREATE TABLE `prj_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `birthdate` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` varchar(1000) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prj_users`
--

INSERT INTO `prj_users` (`id`, `username`, `password`, `fullname`, `birthdate`, `email`, `avatar`, `role`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'Handsome Admin', '1/4/1984', 'cat@gmail.com', 'http://localhost/cat-prj/assets/uploads/582861954473e.jpg', 1),
(2, 'teacher', '827ccb0eea8a706c4c34a16891f84e7b\n', 'Phan Tuan Tu', '2016-10-11', 'icoding.active@gmail.com', 'http://localhost:9090/cat-prj/assets/uploads/5808b3afbffd9.png', 2),
(3, 'student1', '827ccb0eea8a706c4c34a16891f84e7b', 'Phan Tuan Tu', '1995-01-18', 'student@gmail.com', 'http://localhost/cat-prj/assets/uploads/582860422af06.png', 0),
(4, 'student2', '827ccb0eea8a706c4c34a16891f84e7b', 'Tu Phan Tuan', '1995-11-14', 'don@gmail.com', 'http://localhost/cat-prj/assets/uploads/58290d7553e9c.jpg', 0),
(5, 'cat', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyen An Cat', '1993-09-13', 'a@gmail.com', 'http://localhost/cat-prj/assets/images/default.png', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `prj_answers`
--
ALTER TABLE `prj_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prj_categories`
--
ALTER TABLE `prj_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prj_examinations`
--
ALTER TABLE `prj_examinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prj_lessions`
--
ALTER TABLE `prj_lessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prj_levels`
--
ALTER TABLE `prj_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prj_news`
--
ALTER TABLE `prj_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prj_questions`
--
ALTER TABLE `prj_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prj_roles`
--
ALTER TABLE `prj_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prj_users`
--
ALTER TABLE `prj_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prj_answers`
--
ALTER TABLE `prj_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `prj_categories`
--
ALTER TABLE `prj_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `prj_examinations`
--
ALTER TABLE `prj_examinations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `prj_lessions`
--
ALTER TABLE `prj_lessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `prj_levels`
--
ALTER TABLE `prj_levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `prj_news`
--
ALTER TABLE `prj_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prj_questions`
--
ALTER TABLE `prj_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `prj_roles`
--
ALTER TABLE `prj_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `prj_users`
--
ALTER TABLE `prj_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
