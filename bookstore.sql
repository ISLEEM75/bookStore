-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2019 at 07:06 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `author` varchar(250) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  `sale` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `description`, `author`, `price`, `image`, `sale`) VALUES
(13, 'IBRAHIM', 'Lorem Ipsum has been the industrys printer took a galley of type and scrambled it to make a type specimen book. It has survived not only fiveLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem', 'Ibrahim Isleem', 15, '../img/127901545792306product3.jpg', 1),
(15, 'SALAM', ' It has survived not only fiveLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem It has survived not only fiveLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem', 'salam', 15, '../img/75911545862899product2.jpg', 0),
(16, 'RAMZY', ' It has survived not only fiveLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem It has survived not only fiveLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem It has survived not only fiveLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem', 'Ramzy', 50, '../img/63071545862965img3.jpg', 0),
(17, 'PTCDB', ' It has survived not only fiveLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem It has survived not only fiveLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem It has survived not only fiveLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem', 'Ibrahim', 15, '../img/128841545863039product3.jpg', 1),
(18, 'ISLEEM', ' It has survived not only fiveLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem It has survived not only fiveLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem It has survived not only fiveLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem It has survived not only fiveLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem', 'ISLEEM', 24, '../img/224321545863076r1.jpg', 0),
(19, 'PALESTIN', 'It has survived not only fiveLorem Ipsum is simply dummy text of the printing and typesetting industry. LoremIt has survived not only fiveLorem Ipsum is simply dummy text of the printing and typesetting industry. LoremIt has survived not only fiveLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem', 'Ramzy', 100, '../img/182061545865655product3.jpg', 1),
(20, 'GAZA', 'It has survived not only fiveLorem Ipsum is simply dummy text of the printing and typesetting industry. LoremIt has survived not only fiveLorem Ipsum is simply dummy text of the printing and typesetting industry. LoremIt has survived not only fiveLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem', 'Ibrahim', 10, '../img/223481545865686178601545781604img2.jpg', 1),
(21, 'PHP', 'type and scrambled it to make a type specimen book. It has survived not only fiveLorem Ipsum is simply dummy text of the printing and typesetting industry. Loremtype and scrambled it to make a type specimen book. It has survived not only fiveLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem', 'SALAM', 23, '../img/71671545866011r2.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` varchar(250) NOT NULL,
  `book_id` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `book_id`) VALUES
(18, '1', '14'),
(20, '1', '13'),
(23, '1', '19'),
(25, '1', '17');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `password`) VALUES
(1, 'ibrahim', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `comment` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `email`, `comment`) VALUES
(1, 'Ibrahim Isleem', '123456', 'isleem52@gmail.com', 'asdzxcvds'),
(11, 'Isleem', '123456', 'isleem@gmail.com', 'adsfszdf'),
(13, 'salam Isleem', '123456', 'isleem123@gmail.com', 'asdzxv');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
