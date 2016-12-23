-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2016 at 10:26 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `swahilipot-php`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `reg_no` varchar(250) NOT NULL,
  `name` text NOT NULL,
  `gender` text NOT NULL,
  `email` varchar(250) NOT NULL,
  `cartegory` text NOT NULL,
  `created` varchar(250) NOT NULL,
  `bio` text NOT NULL,
  `address` varchar(250) NOT NULL,
  `website` text NOT NULL,
  `tel` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `bounties` int(10) NOT NULL,
  `profile_pic` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `users`
--

-- INSERT INTO `users` (`id`, `reg_no`, `name`, `gender`, `email`, `cartegory`, `created`, `bio`, `address`, `website`, `tel`, `password`, `bounties`, `profile_pic`, `status`) VALUES
-- (36, '', 'joram mwanyuma', '', 'jomwashighadi@gmail.com', 'techie', '2016-12-12', '', '', '', '', '', 0, '', 0),
-- (37, '', 'joram mwanyuma', '', 'jomwashighadi@gmail.com', 'techie', '2016-12-12', '', '', '', '', '', 0, '', 0),
-- (38, '', 'joram mwanyuma', '', 'jomwashighadi@gmail.com', 'art', '2016-12-12', '', '', '', '', '', 0, '', 0),
-- (39, '', 'joram mwanyuma', '', 'jomwashighadi@gmail.com', 'art', '2016-12-12', '', '', '', '', '', 0, '', 0),
-- (40, '', 'joram mwanyuma', '', 'jomwashighadi@gmail.com', 'art', '2016-12-12', '', '', '', '', '', 0, '', 0),
-- (41, '', 'joram mwanyuma', '', 'jomwashighadi@gmail.com', 'art', '2016-12-12', '', '', '', '', '', 0, '', 0),
-- (42, '', 'joram mwanyuma', '', 'jomwashighadi@gmail.com', 'art', '2016-12-12', '', '', '', '', '', 0, '', 0),
-- (43, '', 'joram mwanyuma', '', 'jomwashighadi@gmail.com', 'both', '2016-12-12', '', '', '', '', '', 0, '', 0),
-- (44, '', 'joram mwanyuma', '', 'jomwashighadi@gmail.com', 'both', '2016-12-12', '', '', '', '', '', 0, '', 0),
-- (45, '', 'joram mwanyuma', 'male', 'jomwashighadi@gmail.com', 'both', '2016-12-13', '', '', '', '', '', 0, '', 0),
-- (46, '', 'joram mwanyuma', 'male', 'jomwashighadi@gmail.com', 'art', '2016-12-13 05:18:12', '', '', '', '', '', 0, '', 0),
-- (47, '', 'joram mwanyuma', 'M', 'jomwashighadi@gmail.com', 'art', '2016-12-13 05:30:52', '', '', '', '', '', 0, '', 0),
-- (48, '', 'joram mwanyuma', 'M', 'jomwashighadi@gmail.com', 'both', '2016-12-13 05:42:55', '', '', '', '', '', 0, '', 0),
-- (49, '', 'joram mwanyuma', 'M', 'jomwashighadi@gmail.com', 'both', '2016-12-13 05:47:21', '', '', '', '', '', 0, '', 0),
-- (50, '', 'joram mwanyuma', 'M', 'jomwashighadi@gmail.com', 'both', '2016-12-13 05:47:49', '', '', '', '', '', 0, '', 0),
-- (51, '', 'joram mwanyuma', 'M', 'jomwashighadi@gmail.com', 'both', '2016-12-13 05:48:52', '', '', '', '', '', 0, '', 0),
-- (52, '', 'joram mwanyuma', 'M', 'jomwashighadi@gmail.com', 'both', '2016-12-13 05:49:47', '', '', '', '', '', 0, '', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
