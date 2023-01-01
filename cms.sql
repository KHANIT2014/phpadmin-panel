-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 01, 2023 at 06:38 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'latest good'),
(2, 'My Name is Khan'),
(3, 'PHP'),
(4, 'javascript '),
(5, 'Angularr js'),
(6, 'new'),
(7, 'new'),
(8, 'happy new year');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(1, 22, 'C AUTHOR', 'C EMAIL@G.COM', 'C CONTENT', 'C STATUS', '2023-01-01'),
(2, 245, 'javid', 'javid@khanits.in', 'this is company ', 'Approved', '2023-01-01'),
(3, 124, 'au test', 'auemail@gmail.com', 'cont test', 'status test', '2023-01-01'),
(4, 55, 'au', 'em@g.com', 'con', 'noce', '2023-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_category_id` int(11) NOT NULL,
  `post_title` varchar(210) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_image` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_image`, `post_date`, `post_content`, `post_tags`, `post_status`) VALUES
(1, 0, 'NEW ONE1', 'javid', '', '2022-12-31', '1112', '1012', 'good12'),
(3, 0, 'this', 'javid new', '', '2028-12-22', ' this is my content', 'latedtt', 'good'),
(5, 0, 'this is ', 'asif', '', '2028-12-22', ' asif  is greate person', 'latest', 'new'),
(6, 0, 'this is 1', 'asif1', 'this is image', '2022-12-30', ' asif  is greate person1', 'latest1', 'new1'),
(7, 3, 'NEW ONE', 'khan javid hibo jaan', '', '2031-12-22', '                      \r\n    LATESTE', 'LOVELY', 'MY GOOD'),
(8, 0, 'jahangir', 'khan', '', '2028-12-22', 'jahangir parveena and Hibbo ', 'praveena', 'special'),
(9, 0, 'js', 'myself', 'Black Gold Luxurious Playful Happy New Year Instagram Post Video (Instagram Post (Square)).jpg', '2029-12-22', ' this is latest update', 'nice', 'good'),
(10, 0, 'js', 'myself', 'Black Gold Luxurious Playful Happy New Year Instagram Post Video (Instagram Post (Square)).jpg', '2029-12-22', ' this is latest update', 'nice', 'good'),
(11, 0, 'khan', 'you', 'Black Gold Luxurious Playful Happy New Year Instagram Post Video (Instagram Post (Square)).jpg', '2029-12-22', 'this is with date ', 'lovely', 'nice'),
(12, 0, 'NEW ONE1', 'JAVID AH KHAN', '', '2031-12-22', '                                    this is new year\r\n                \r\n                \r\n                \r\n                \r\n                \r\n                \r\n                \r\n                \r\n                \r\n                \r\n                \r\n                \r\n                \r\n                \r\n                \r\n                \r\n    ', 'latest121', 'good one121'),
(14, 0, 'Today', 'khan javid hibo jaan', '', '2031-12-22', '                                     todays latest            \r\n                \r\n                \r\n                \r\n    ', 'good123', 'good'),
(15, 1, 'my love hibbo', 'khan javid', '', '2031-12-22', '  latest update today 30-12-2022            \r\n                \r\n                \r\n    ', 'my ', 'good look'),
(16, 12, 'title', 'author', 'image', '2022-12-31', 'content', 'tags', 'status'),
(17, 121, 'title', 'this is author', '', '2031-12-22', 'sdsdfff ', 'sderf', 'nice status'),
(22, 123, 'til', 'aut', 'img', '2023-01-01', 'conten', 'tagsla', 'statusla');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
