-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2023 at 08:25 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fc`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `user_one` int(11) NOT NULL,
  `user_two` int(11) NOT NULL,
  `last_sent_user` int(11) NOT NULL,
  `last_message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `user_one`, `user_two`, `last_sent_user`, `last_message`, `created_at`) VALUES
(1, 1, 4, 1, 'hello', '2022-11-16 17:08:08'),
(2, 7, 1, 7, 'hi', '2022-11-27 19:25:50'),
(3, 1, 8, 1, 'hi', '2022-11-29 14:44:10'),
(4, 6, 2, 6, 'hi\n', '2022-12-11 06:42:03');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `post_id`, `user_id`, `comment`, `created_at`) VALUES
(1, 34, 1, 'hi', '2022-11-29 13:59:41'),
(2, 32, 1, 'Hello', '2022-11-29 14:00:22'),
(3, 32, 1, 'Hello', '2022-11-29 14:08:55'),
(4, 32, 1, 'Hello', '2022-11-29 14:09:25'),
(5, 34, 1, 'hello', '2022-11-29 14:09:33'),
(6, 34, 1, 'hello', '2022-11-29 14:14:00'),
(7, 34, 1, 'hello', '2022-11-29 14:17:10'),
(8, 34, 1, 'hello', '2022-11-29 14:17:18'),
(9, 34, 1, 'hello', '2022-11-29 14:20:00'),
(10, 34, 1, 'nice', '2022-11-29 14:20:06'),
(11, 34, 1, 'Nice picture', '2022-11-29 14:21:20'),
(12, 34, 1, 'Nice picture', '2022-11-29 14:25:42'),
(13, 35, 8, 'It is beautiful', '2022-11-29 14:39:32'),
(14, 35, 1, 'Thanks', '2022-11-29 14:46:54'),
(15, 35, 8, 'Where it is', '2022-11-29 14:47:15'),
(16, 35, 1, 'Thanks', '2022-11-29 14:47:19'),
(17, 35, 1, 'I dont know', '2022-11-29 14:47:34'),
(18, 36, 2, 'hi', '2022-12-11 06:39:23'),
(19, 36, 2, 'hi', '2022-12-11 06:39:38');

-- --------------------------------------------------------

--
-- Table structure for table `friend`
--

CREATE TABLE `friend` (
  `id` int(11) NOT NULL,
  `user_one` int(11) NOT NULL,
  `user_two` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friend`
--

INSERT INTO `friend` (`id`, `user_one`, `user_two`, `created_at`) VALUES
(6, 4, 2, '2022-11-07 14:52:50'),
(8, 1, 2, '2022-11-16 15:09:38'),
(9, 1, 3, '2022-11-16 15:09:43'),
(10, 1, 5, '2022-11-16 15:09:47'),
(11, 7, 1, '2022-11-27 17:43:00'),
(13, 6, 2, '2022-12-11 06:41:35');

-- --------------------------------------------------------

--
-- Table structure for table `friend_request`
--

CREATE TABLE `friend_request` (
  `id` int(11) NOT NULL,
  `send_user` int(11) NOT NULL,
  `recive_user` int(11) NOT NULL,
  `status` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friend_request`
--

INSERT INTO `friend_request` (`id`, `send_user`, `recive_user`, `status`, `created_at`) VALUES
(7, 2, 4, 'confirm', '2022-11-07 14:52:50'),
(13, 2, 1, 'confirm', '2022-11-16 15:09:38'),
(14, 3, 1, 'confirm', '2022-11-16 15:09:43'),
(15, 5, 1, 'confirm', '2022-11-16 15:09:47'),
(16, 5, 4, 'pending', '2022-11-07 14:54:50'),
(17, 1, 7, 'confirm', '2022-11-27 17:43:00'),
(19, 1, 4, 'pending', '2022-12-11 04:24:10'),
(20, 2, 6, 'confirm', '2022-12-11 06:41:35');

-- --------------------------------------------------------

--
-- Table structure for table `interest`
--

CREATE TABLE `interest` (
  `id` int(11) NOT NULL,
  `name` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `interest`
--

INSERT INTO `interest` (`id`, `name`) VALUES
(1, 'Walking'),
(4, 'Running'),
(5, 'Action games'),
(6, 'Board Game'),
(7, 'Card Games'),
(8, 'Ballet'),
(9, 'Dancehalls'),
(10, 'Action Movies'),
(11, 'Comedy Movies'),
(12, 'Drama Movies'),
(13, 'Horror Movies'),
(14, 'Electronic Music'),
(15, 'Book'),
(16, 'Baking'),
(17, 'Basketball'),
(18, 'Golf'),
(19, 'Swimming'),
(20, 'Tennis');

-- --------------------------------------------------------

--
-- Table structure for table `interest_detail`
--

CREATE TABLE `interest_detail` (
  `interest_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `interest_detail`
--

INSERT INTO `interest_detail` (`interest_id`, `user_id`, `created_at`) VALUES
(1, 1, '2022-11-01 10:08:12'),
(1, 4, '2022-11-03 07:39:27'),
(5, 1, '2022-11-01 10:08:03'),
(6, 1, '2022-10-30 15:15:11'),
(7, 1, '2022-10-30 15:04:51'),
(10, 4, '2022-11-03 07:39:31'),
(14, 1, '2022-10-30 15:06:09'),
(16, 1, '2022-10-30 15:04:31');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `chat_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `chat_id`, `from_id`, `to_id`, `message`, `status`, `created_at`) VALUES
(1, 1, 1, 4, 'hello', 'seen', '2022-11-20 12:39:11'),
(2, 1, 1, 4, 'hey\n', 'seen', '2022-11-20 12:39:11'),
(3, 1, 1, 4, 'hello', 'seen', '2022-11-20 12:39:11'),
(4, 1, 4, 1, 'hello', 'seen', '2022-11-20 12:39:22'),
(5, 1, 1, 4, 'what is up', 'seen', '2022-11-20 12:43:43'),
(6, 2, 7, 1, 'hi', 'seen', '2022-11-27 19:36:39'),
(7, 2, 1, 7, 'hi', 'seen', '2022-11-27 19:37:50'),
(8, 3, 1, 8, 'hi', 'seen', '2022-11-29 14:45:38'),
(9, 3, 1, 8, 'What is up', 'seen', '2022-11-29 14:45:38'),
(10, 3, 1, 8, 'hello', 'seen', '2022-11-29 14:45:38'),
(11, 3, 8, 1, 'hi what is up', 'seen', '2022-11-29 14:46:13'),
(12, 3, 1, 8, 'i am fine\n', 'seen', '2022-11-29 14:46:23'),
(13, 3, 8, 1, 'what about you', 'seen', '2022-11-29 14:46:36'),
(14, 4, 6, 2, 'hi\n', 'seen', '2022-12-11 06:42:24'),
(15, 4, 2, 6, 'hello\n', 'seen', '2022-12-11 06:42:45'),
(16, 4, 6, 2, 'What is up', 'seen', '2022-12-11 06:43:08');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `caption` text DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `user_id`, `caption`, `photo`, `created_at`) VALUES
(1, 1, 'Hello World', 'post/_456498.jpg', '2022-10-29 23:33:05'),
(3, 2, 'Hello', '', '2022-10-30 00:41:17'),
(6, 2, '', 'post/_David-Gandy.jpg', '2022-10-30 00:46:34'),
(8, 1, '', 'post/_istockphoto-1059661424-612x612.jpg', '2022-10-30 02:46:18'),
(9, 1, '', 'post/_20190820_133519.jpg', '2022-11-01 15:39:55'),
(10, 1, '', 'post/_received_391120821534836.jpeg', '2022-11-01 15:40:10'),
(11, 1, '', 'post/_received_1445491752256037.gif', '2022-11-01 15:40:25'),
(12, 2, '', 'post/_20190829_154916.jpg', '2022-11-01 15:46:05'),
(13, 2, '', 'post/_20190822_112720.jpg', '2022-11-01 15:46:15'),
(14, 2, '', 'post/_20190827_120158.jpg', '2022-11-01 15:46:25'),
(15, 2, '', 'post/_dmz2.PNG', '2022-11-01 15:46:35'),
(16, 2, '', 'post/_Screenshot (19).png', '2022-11-01 15:46:42'),
(18, 2, '', 'post/_Screenshot (30).png', '2022-11-01 15:54:04'),
(19, 2, '', 'post/_Screenshot (342).png', '2022-11-01 16:03:20'),
(20, 2, 'New Movie', 'post/_Screenshot (371).png', '2022-11-01 16:06:44'),
(21, 2, 'Family Chat ', '', '2022-11-01 19:17:01'),
(22, 3, '', 'post/_Screenshot (384).png', '2022-11-02 03:39:43'),
(23, 3, '', 'post/_Screenshot (446).png', '2022-11-02 03:39:53'),
(24, 3, '', 'post/_Screenshot (233).png', '2022-11-02 03:40:14'),
(25, 3, 'hello friends', '', '2022-11-02 03:40:28'),
(26, 3, '', 'post/_Screenshot (238).png', '2022-11-02 03:40:41'),
(27, 3, 'hello\r\n', '', '2022-11-02 03:58:20'),
(28, 3, '', 'post/_Screenshot (230).png', '2022-11-02 03:58:30'),
(29, 4, '', 'post/_20190829_154924.jpg', '2022-11-03 07:39:04'),
(30, 7, 'HEllO\r\n', '', '2022-11-27 15:36:43'),
(31, 7, '', 'post/_hci.jpg', '2022-11-27 15:57:01'),
(32, 7, 'dfgdfg', 'post/_qm.PNG', '2022-11-27 16:11:41'),
(33, 7, 'sadfsaf', 'post/_hanzo.jpg', '2022-11-27 16:20:03'),
(34, 7, 'Hello What is up guys', 'post/_hci.jpg', '2022-11-27 16:21:37'),
(35, 1, 'Hello', 'post/_ekpsf.jpg', '2022-11-29 14:37:34'),
(36, 1, 'hi', 'post/_768px-Woman_1.jpg', '2022-12-11 06:34:52');

-- --------------------------------------------------------

--
-- Table structure for table `reaction`
--

CREATE TABLE `reaction` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reaction` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reaction`
--

INSERT INTO `reaction` (`id`, `post_id`, `user_id`, `reaction`, `created_at`) VALUES
(40, 28, 1, 'like', '2022-11-17 17:03:26'),
(44, 26, 1, 'like', '2022-11-18 09:47:09'),
(45, 25, 1, 'like', '2022-11-18 09:47:47'),
(50, 27, 1, 'like', '2022-11-18 12:11:48'),
(51, 11, 1, 'like', '2022-11-18 15:19:14'),
(52, 29, 1, 'like', '2022-11-20 12:36:22'),
(53, 34, 1, 'like', '2022-11-27 17:56:35'),
(54, 35, 8, 'like', '2022-11-29 14:39:03'),
(55, 35, 1, 'like', '2022-11-29 14:39:14'),
(56, 36, 2, 'like', '2022-12-11 06:35:54'),
(57, 35, 2, 'like', '2022-12-11 06:39:10');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Admin'),
(3, 'System Analysis');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(16) NOT NULL,
  `birth` date NOT NULL,
  `gender` varchar(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `address` varchar(11) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `picture` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `email`, `name`, `password`, `birth`, `gender`, `role_id`, `address`, `phone`, `picture`, `created_at`) VALUES
(1, 'myolwinmoeaung125@gmail.com', 'Myo Lwin Moe Aung', 'asd', '2001-07-02', 'Male', 1, 'Naraward 5 ', '09971111306', 'staffimg /_crop_image.jpg', '2022-10-27 05:05:09'),
(3, 'jacksmit91@gmail.com', 'JN', 'asd', '2000-07-31', 'Male', 1, 'asdfasdf', '49774654', 'staffimg /_photo_2021-11-12_17-10-06.jpg', '2022-10-27 10:41:11'),
(4, 'admin@gmail.com', 'JN', 'asd', '0000-00-00', 'Male', 3, 'Naraward 5 ', '0941055648', 'staffimg /_hanzo.jpg', '2022-11-28 22:02:10'),
(5, 'mlam@gmial.com', 'MLMLA', 'asd', '0000-00-00', 'Male', 3, '123499', '12346456', 'staffimg /_photo-1614252369475-531eba835eb1.jpeg', '2022-12-11 06:32:52');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(16) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `age` varchar(16) NOT NULL,
  `picture` text NOT NULL,
  `cover_photo` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `gender`, `phone`, `age`, `picture`, `cover_photo`, `created_at`) VALUES
(1, 'Myo Lwin Moe Aung', 'user@gmail.com', 'asd', 'on', '0997111130677', '2001-07-02', 'profile/_photo_2021-11-12_17-10-06.jpg', 'coverphoto/_20190820_133506.jpg', '2022-11-18 14:45:38'),
(2, 'user2', 'u2@gmail.com', 'asd', 'Female', '09946446468', '2002-08-04', 'img/2.png', 'images/resources/timeline-1.jpg', '2022-11-03 15:48:49'),
(3, 'u3', 'u3@gmail.com', 'asd', 'Male', '09889765488', '1997-08-12', 'img/2.png', 'images/resources/timeline-1.jpg', '2022-11-03 15:48:56'),
(4, 'Myo Lwin Moe Aung', 'u4@gmail.com', 'asd', 'Male', '0945005946', '2000-07-02', 'profile/_20191012_173009.jpg', 'coverphoto/_20190820_095736.jpg', '2022-11-03 07:38:09'),
(5, 'User2', 'u5@gmail.com', 'asd', 'Male', '096746546544', '1997-04-05', 'img/2.png', 'images/resources/timeline-1.jpg', '2022-11-03 15:52:31'),
(6, 'Jason', 'u6@gmail.com', 'asd', 'Male', '097876542', '2000-07-05', 'img/2.png', 'images/resources/timeline-1.jpg', '2022-11-06 14:15:46'),
(7, 'Jack Smit', 'u8@gmail.com', 'asd', 'Male', '09422390225', '1997-11-03', 'profile/_8k.jpg', 'coverphoto/_e.jpg', '2022-11-27 15:31:02'),
(8, 'U22', 'u22@gmail.com', 'asd', 'Male', '09450234', '2000-12-31', 'profile/_hanzo.jpg', 'coverphoto/_8k.jpg', '2022-11-29 14:40:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `u1-fk` (`user_one`),
  ADD KEY `u2-fk` (`user_two`),
  ADD KEY `s-u-m-fk` (`last_sent_user`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friend`
--
ALTER TABLE `friend`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_one` (`user_one`,`user_two`);

--
-- Indexes for table `friend_request`
--
ALTER TABLE `friend_request`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `send_user` (`send_user`,`recive_user`);

--
-- Indexes for table `interest`
--
ALTER TABLE `interest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interest_detail`
--
ALTER TABLE `interest_detail`
  ADD PRIMARY KEY (`interest_id`,`user_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c-fk` (`chat_id`),
  ADD KEY `f-fk` (`from_id`),
  ADD KEY `to-fk` (`to_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid_fk` (`user_id`);

--
-- Indexes for table `reaction`
--
ALTER TABLE `reaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `r` (`role_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `friend`
--
ALTER TABLE `friend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `friend_request`
--
ALTER TABLE `friend_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `interest`
--
ALTER TABLE `interest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `reaction`
--
ALTER TABLE `reaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `s-u-m-fk` FOREIGN KEY (`last_sent_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `u1-fk` FOREIGN KEY (`user_one`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `u2-fk` FOREIGN KEY (`user_two`) REFERENCES `user` (`id`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `c-fk` FOREIGN KEY (`chat_id`) REFERENCES `chat` (`id`),
  ADD CONSTRAINT `f-fk` FOREIGN KEY (`from_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `to-fk` FOREIGN KEY (`to_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `uid_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `r` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
