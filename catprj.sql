-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 14, 2016 at 02:06 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catprj`
--

-- --------------------------------------------------------

--
-- Table structure for table `prj_answers`
--

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
(1, 'a', '1', 1),
(2, 'b', '0', 1),
(3, 'c', '0', 1),
(4, 'a', '0', 2),
(5, 'b ', '1', 2),
(6, ' c', '0', 2),
(7, 'a ', '1', 3),
(8, 'b ', '0', 3),
(9, ' c', '0', 3);

-- --------------------------------------------------------

--
-- Table structure for table `prj_examinations`
--

CREATE TABLE `prj_examinations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_start` varchar(255) NOT NULL,
  `date_end` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `question` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `result` int(11) NOT NULL,
  `complete` int(11) NOT NULL,
  `backup` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prj_examinations`
--

INSERT INTO `prj_examinations` (`id`, `name`, `date_start`, `date_end`, `user`, `level`, `question`, `total`, `result`, `complete`, `backup`) VALUES
(1, 'test-3-1-58289b8205225', '2016-11-13 23:57:38', 2016, 3, 1, 1, 10, 0, 1, ''),
(2, 'test-3-1-5829008784ee8', '2016-11-14 07:08:39', 2016, 3, 1, 2, 30, 0, 1, '4'),
(3, 'test-3-1-58290ac4c983c', '2016-11-14 07:52:20', 2016, 3, 1, 2, 30, 10, 1, '5'),
(4, 'test-4-1-58290d9147bdc', '2016-11-14 08:04:17', 2016, 4, 1, 3, 30, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `prj_levels`
--

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
(1, 'Question 1', '<p>Question 1</p>', 1, 'Do not attach the audio file', 10),
(2, 'Question 2', '<p>Question 2</p>', 1, 'Do not attach the audio file', 10),
(3, 'Question 3', '<p>Question 3</p>', 1, 'Do not attach the audio file', 10);

-- --------------------------------------------------------

--
-- Table structure for table `prj_roles`
--

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
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Handsome Admin', '1/4/1984', 'cat@gmail.com', 'http://localhost/cat-prj/assets/uploads/582861954473e.jpg', 1),
(2, 'user', 'e10adc3949ba59abbe56e057f20f883e', 'Phan Tuan Tu', '2016-10-11', 'icoding.active@gmail.com', 'http://localhost:9090/cat-prj/assets/uploads/5808b3afbffd9.png', 2),
(3, 'student1', '21232f297a57a5a743894a0e4a801fc3', 'Phan Tuan Tu', '1995-01-18', 'student@gmail.com', 'http://localhost/cat-prj/assets/uploads/582860422af06.png', 0),
(4, 'student2', '827ccb0eea8a706c4c34a16891f84e7b', 'Tu Phan Tuan', '1995-11-14', 'don@gmail.com', 'http://localhost/cat-prj/assets/uploads/58290d7553e9c.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `prj_answers`
--
ALTER TABLE `prj_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prj_examinations`
--
ALTER TABLE `prj_examinations`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `prj_examinations`
--
ALTER TABLE `prj_examinations`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `prj_roles`
--
ALTER TABLE `prj_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `prj_users`
--
ALTER TABLE `prj_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
