-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 08, 2015 at 02:16 AM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `msgBoard`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
`id` int(10) unsigned NOT NULL,
  `msg_id` int(10) unsigned DEFAULT NULL,
  `author` varchar(20) DEFAULT NULL,
  `heading` varchar(50) DEFAULT NULL,
  `body` varchar(200) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `msg_id`, `author`, `heading`, `body`, `timestamp`) VALUES
(1, 1, 'User2', 'My comment to the first message', 'This is the comment body for the first message.', '2015-02-16 19:25:04'),
(2, 1, 'User3', 'This is the second comment for Message 1', 'blah blah blah blah.', '2015-02-16 19:25:29'),
(3, 2, 'User1', 'User1 comment on Message2', 'The body of the comment by User1.', '2015-02-16 19:25:59'),
(4, 2, 'User3', 'User3 comment', 'blah blah blahblah.', '2015-02-16 19:26:20'),
(5, 1, 'guest', 'Third comment', 'Third comment body', '2015-04-07 00:58:50'),
(6, 1, 'guest', '4th comment for message #1', 'blah blah', '2015-04-07 00:59:54'),
(7, 2, 'guest', 'Third comment for Message #2', 'alsdjfldfj', '2015-04-07 01:00:34'),
(8, 3, 'guest', 'First comment on Messge #3', 'a;dfkj', '2015-04-07 01:04:52');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
`id` int(10) unsigned NOT NULL,
  `author` varchar(20) DEFAULT NULL,
  `heading` varchar(50) DEFAULT NULL,
  `body` varchar(200) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `author`, `heading`, `body`, `timestamp`) VALUES
(1, 'User1', 'This is the first message', 'This is the body of the first message. Nothing too exciting.', '2015-02-16 19:23:44'),
(2, 'User2', 'This is the second message.', 'The body of the second message goes here.', '2015-02-16 19:24:20'),
(3, NULL, 'This is the third msg', 'third messsage content', '2015-04-06 20:36:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`id`), ADD KEY `msg_id` (`msg_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`msg_id`) REFERENCES `messages` (`id`);
