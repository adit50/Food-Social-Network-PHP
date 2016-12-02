-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2016 at 06:51 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cookzz`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `comments` varchar(1024) NOT NULL,
  `fname` varchar(150) NOT NULL,
  `lname` varchar(150) NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `frndlist`
--

CREATE TABLE IF NOT EXISTS `frndlist` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `followers` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `favourite` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `friend` int(11) NOT NULL,
  `message` varchar(1024) NOT NULL,
  `time` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `mon` varchar(10) NOT NULL,
  `day` varchar(10) NOT NULL,
  `h` int(2) NOT NULL,
  `i` int(2) NOT NULL,
  `s` int(2) NOT NULL,
  `d` int(2) NOT NULL,
  `m` int(2) NOT NULL,
  `y` int(4) NOT NULL,
  `a` varchar(2) NOT NULL,
  `stamp` int(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message_list`
--

CREATE TABLE IF NOT EXISTS `message_list` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `friend` int(11) NOT NULL,
  `msg_unread` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `friend` int(11) NOT NULL,
  `status` varchar(11) NOT NULL,
  `time` varchar(11) NOT NULL,
  `date` varchar(11) NOT NULL,
  `mon` varchar(11) NOT NULL,
  `h` varchar(11) NOT NULL,
  `i` varchar(11) NOT NULL,
  `s` varchar(11) NOT NULL,
  `d` varchar(11) NOT NULL,
  `m` varchar(11) NOT NULL,
  `y` varchar(11) NOT NULL,
  `a` varchar(11) NOT NULL,
  `day` varchar(11) NOT NULL,
  `stamp` int(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `image` varchar(1024) NOT NULL,
  `fname` varchar(150) NOT NULL,
  `lname` varchar(150) NOT NULL,
  `likes` int(11) NOT NULL,
  `comments` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `title` varchar(1024) NOT NULL,
  `share` varchar(11) NOT NULL,
  `minu` int(11) NOT NULL,
  `serv` int(11) NOT NULL,
  `time` varchar(11) NOT NULL,
  `date` varchar(11) NOT NULL,
  `mon` varchar(11) NOT NULL,
  `h` varchar(11) NOT NULL,
  `i` varchar(11) NOT NULL,
  `s` varchar(11) NOT NULL,
  `d` varchar(11) NOT NULL,
  `m` varchar(11) NOT NULL,
  `y` varchar(11) NOT NULL,
  `a` varchar(11) NOT NULL,
  `day` varchar(11) NOT NULL,
  `stamp` int(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `regvisitor`
--

CREATE TABLE IF NOT EXISTS `regvisitor` (
  `userid` int(11) NOT NULL,
  `emailid` varchar(200) NOT NULL,
  `fname` varchar(250) NOT NULL,
  `lname` varchar(250) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `profile_pic` varchar(100) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `total_followers` int(11) NOT NULL,
  `total_following` int(11) NOT NULL,
  `total_favourites` int(11) NOT NULL,
  `new_message` int(50) NOT NULL,
  `new_notification` int(11) NOT NULL,
  `post` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regvisitor`
--

INSERT INTO `regvisitor` (`userid`, `emailid`, `fname`, `lname`, `password`, `status`, `profile_pic`, `sex`, `total_followers`, `total_following`, `total_favourites`, `new_message`, `new_notification`, `post`) VALUES
(1, 'aditraj2@gmail.com', 'Aditya', 'Raj', '123', 0, 'images/avatar.jpg', 'Male', 0, 0, 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frndlist`
--
ALTER TABLE `frndlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_list`
--
ALTER TABLE `message_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regvisitor`
--
ALTER TABLE `regvisitor`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `frndlist`
--
ALTER TABLE `frndlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `message_list`
--
ALTER TABLE `message_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `regvisitor`
--
ALTER TABLE `regvisitor`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
