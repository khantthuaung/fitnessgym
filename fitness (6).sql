-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2020 at 03:26 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fitness`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `streetName` varchar(40) NOT NULL,
  `state` varchar(15) NOT NULL,
  `city` varchar(15) NOT NULL,
  `zipcode` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `streetName`, `state`, `city`, `zipcode`) VALUES
(1, 'Shwe Pyi Thar', 'yangon ', 'Yangon', '11231');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `pass_key` varchar(20) NOT NULL,
  `securekey` varchar(20) NOT NULL,
  `Full_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `pass_key`, `securekey`, `Full_name`) VALUES
('admin1', 'admin1', 'admin1', 'FitnessGym');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`, `created_date`, `modified_date`) VALUES
(1, 'Cardio Fitness', '2020-02-25 19:00:03', '0000-00-00 00:00:00'),
(2, 'Spinning', '2020-02-25 19:00:03', '0000-00-00 00:00:00'),
(3, 'Pilates', '2020-02-25 19:00:54', '2020-02-25 19:00:54'),
(4, 'Boxing', '2020-02-25 19:00:54', '2020-02-25 19:00:54'),
(5, 'Aerobics', '2020-02-25 19:01:51', '2020-02-25 19:01:51'),
(6, 'Kick Boxing', '2020-02-25 19:01:51', '2020-02-25 19:01:51'),
(7, 'Cross Fit', '2020-02-25 19:01:51', '2020-02-25 19:01:51'),
(8, 'Yoga', '2020-02-25 19:01:51', '2020-02-25 19:01:51');

-- --------------------------------------------------------

--
-- Table structure for table `enrolls_to`
--

CREATE TABLE `enrolls_to` (
  `et_id` int(5) NOT NULL,
  `pid` int(8) NOT NULL,
  `uid` int(20) NOT NULL,
  `paid_date` varchar(15) DEFAULT NULL,
  `method` varchar(255) NOT NULL,
  `expire` varchar(15) DEFAULT NULL,
  `renewal` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `enrolls_to`
--

INSERT INTO `enrolls_to` (`et_id`, `pid`, `uid`, `paid_date`, `method`, `expire`, `renewal`) VALUES
(2, 3, 1, '2020-03-03', 'KBZpay', '2020-04-03', 'yes'),
(3, 6, 1, '2020-03-02', 'KBZpay', '1970-01-01', 'yes'),
(8, 4, 1, '2020-03-02', 'WAVEpay', '2020-06-02', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `health_status`
--

CREATE TABLE `health_status` (
  `hid` int(5) NOT NULL,
  `calorie` varchar(8) DEFAULT NULL,
  `height` varchar(8) DEFAULT NULL,
  `weight` varchar(8) DEFAULT NULL,
  `fat` varchar(8) DEFAULT NULL,
  `remarks` varchar(200) DEFAULT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `health_status`
--

INSERT INTO `health_status` (`hid`, `calorie`, `height`, `weight`, `fat`, `remarks`, `uid`) VALUES
(6, NULL, '160', '100', NULL, NULL, 1),
(7, NULL, '170', '110', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `opening_hours`
--

CREATE TABLE `opening_hours` (
  `id` int(11) NOT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `opening_hours`
--

INSERT INTO `opening_hours` (`id`, `day`, `start`, `end`) VALUES
(1, 'Monday', '8:00', '21:00'),
(2, 'Tuesday', '8:00', '21:00'),
(3, 'Wednesday', '8:00', '21:00'),
(4, 'Thursday', '8:00', '21:00'),
(5, 'Friday', '8:00', '21:00'),
(6, 'Saturday', '8:00', '21:00'),
(7, 'Sunday', '8:00', '21:00');

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `pid` int(8) NOT NULL,
  `planName` varchar(20) NOT NULL,
  `description` varchar(200) NOT NULL,
  `validity` varchar(20) NOT NULL,
  `amount` int(10) NOT NULL,
  `active` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`pid`, `planName`, `description`, `validity`, `amount`, `active`) VALUES
(3, 'Monthly Plan', 'A monthly subscription that unlocks the entire Gym Plan.', '1', 20000, 'yes'),
(4, '3 Month Plan', 'Unlock all Activity that exist at GYM.', '3', 50000, 'yes'),
(6, '6 Month Plan', 'Unlock all Activity that exist at GYM.', '6', 100000, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `media` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` date NOT NULL,
  `modified_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `media`, `created_date`, `modified_date`) VALUES
(1, 'Godzilla Escaped!(Eminem released new album named Music to be murdered by)', 'You get on my way, imma feed you to the monster. I\'m normal during the day but night turn it to the monster.when the moon shines like iceroad truckers i look like a villain outta those blockbuster. Gozilla,fire spinner, monster. Blood on the dance floor luiz V carpet, fire, godzilla, fire, monster bllod on the dance floor luiz V carpet', 'eminem.jpg', '2020-02-27', '2020-02-27');

-- --------------------------------------------------------

--
-- Table structure for table `subscr_packages`
--

CREATE TABLE `subscr_packages` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscr_packages`
--

INSERT INTO `subscr_packages` (`id`, `u_id`, `p_id`, `created_date`, `modified_date`) VALUES
(1, 1, 1, '2020-02-26 22:25:57', '2020-02-26 22:25:57');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `tid` int(12) NOT NULL,
  `tname` varchar(45) DEFAULT NULL,
  `day1` varchar(200) DEFAULT NULL,
  `day2` varchar(200) DEFAULT NULL,
  `day3` varchar(200) DEFAULT NULL,
  `day4` varchar(200) DEFAULT NULL,
  `day5` varchar(200) DEFAULT NULL,
  `day6` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

CREATE TABLE `trainers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` int(11) NOT NULL,
  `qualifications` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `speciality` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`id`, `name`, `age`, `role`, `experience`, `qualifications`, `speciality`, `phone`, `gender`, `email`, `photo`, `created_date`, `modified_date`) VALUES
(1, 'Thomas Shelby', 24, 'Shooting Guns', 10, 'Quailty', 'Special', '09443002398', 'Male', 'khantthuaung@uit.edu.mm', 'thomas.jpg', '2020-02-18 20:26:54', '2020-02-18 20:26:54'),
(2, 'Arthur Shelby', 35, 'Boxing', 4, 'quality', 'special', '09784546', 'Male', 'wannathu9@gmail.com', 'arthur.jpg', '2020-03-02 00:00:00', '2020-03-01 22:05:55'),
(4, 'Jonathan', 27, 'Hamen User', 7, 'hamen', 'hamoon', '0945123879', 'Male', 'wannathu9@gmail.com', 'djt.jpg', '2020-03-04 00:00:00', '2020-03-01 22:23:57'),
(5, 'U Thaung Dan', 45, 'Myanmar Latwae', 15, 'He\'s been playing latwae for 15 years 10 years as a player and 5 years as a trainer. He is now retired fpr latwae and guiding the future latwae stars.', 'He\'s been playing latwae for 15 years 10 years as a player and 5 years as a trainer. He is now retired fpr latwae and guiding the future latwae stars.', '0943055058', 'Male', 'thaungdan@gmail.com', 'thaungdan.jpg', '2020-03-03 20:23:04', '2020-03-03 20:23:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(255) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `created_date` date NOT NULL,
  `modified_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `gender`, `mobile`, `email`, `age`, `photo`, `created_date`, `modified_date`) VALUES
(1, 'khantthuaung1234', 'ed0e7882c4b3c8cd26acfa1b885e5999', 'Male', '09768677143', 'wannathu9@gmail.com', 19, '41660.jpg', '2020-03-02', '2020-03-02'),
(2, 'Paing Thet Ko', 'ea43514ade7adec1277209a2533a28a6', 'Male', '09786422974', 'paingthetko2000@gmai', 19, '', '2020-03-02', '2020-03-02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD KEY `userID` (`id`) USING BTREE;

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`) USING BTREE;

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrolls_to`
--
ALTER TABLE `enrolls_to`
  ADD PRIMARY KEY (`et_id`) USING BTREE,
  ADD KEY `user_ID` (`uid`) USING BTREE,
  ADD KEY `plan_ID_idx` (`pid`) USING BTREE;

--
-- Indexes for table `health_status`
--
ALTER TABLE `health_status`
  ADD PRIMARY KEY (`hid`) USING BTREE,
  ADD KEY `userID_idx` (`uid`) USING BTREE;

--
-- Indexes for table `opening_hours`
--
ALTER TABLE `opening_hours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`pid`) USING BTREE,
  ADD KEY `pid` (`pid`) USING BTREE;

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscr_packages`
--
ALTER TABLE `subscr_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`tid`) USING BTREE;

--
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `email` (`email`) USING BTREE,
  ADD KEY `userid` (`userid`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `enrolls_to`
--
ALTER TABLE `enrolls_to`
  MODIFY `et_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `health_status`
--
ALTER TABLE `health_status`
  MODIFY `hid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `opening_hours`
--
ALTER TABLE `opening_hours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `pid` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscr_packages`
--
ALTER TABLE `subscr_packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `tid` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
