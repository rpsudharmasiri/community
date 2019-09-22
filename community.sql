-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2019 at 07:32 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `community`
--

-- --------------------------------------------------------

--
-- Table structure for table `community`
--

CREATE TABLE IF NOT EXISTS `community` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gov_reg_no` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `category` varchar(100) NOT NULL,
  `adress` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact_no` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `acc_num` varchar(20) NOT NULL,
  `pass` varchar(200) NOT NULL,
  PRIMARY KEY (`id`,`gov_reg_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `community`
--

INSERT INTO `community` (`id`, `gov_reg_no`, `name`, `category`, `adress`, `email`, `contact_no`, `status`, `acc_num`, `pass`) VALUES
(9, '001', 'kavish', 'New', 'Anuradhapura', 'dfbd@gmail.com', 2147483647, 'accepted', '34325335', '123'),
(10, '002', 'sdg', 'efs', 'ds', 'nng@gmail.com', 34234434, 'pending', '34325335', '123');

-- --------------------------------------------------------

--
-- Table structure for table `donate`
--

CREATE TABLE IF NOT EXISTS `donate` (
  `did` int(11) NOT NULL AUTO_INCREMENT,
  `dname` varchar(100) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `acc_num` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  PRIMARY KEY (`did`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `donator`
--

CREATE TABLE IF NOT EXISTS `donator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_no` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `pass` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `donator`
--

INSERT INTO `donator` (`id`, `fname`, `mname`, `lname`, `email`, `contact_no`, `status`, `pass`) VALUES
(1, 'charith', 'kalum', 'senevi', 'iuy@gmail.com', 4390, 'accepted', '123'),
(2, 'csm', 'chathu', 'aaZ', 'dfbd@gmail.com', 43, 'pending', '123'),
(3, 'd', 'maduka', 'fgf', 'das@gmail.coms', 770359648, 'pending', '123'),
(4, 'rgv', 'sfvs', 'edf', 'vcdd@gmail.com', 770359648, 'pending', '123'),
(5, 'csm', 'maduka', 'senevirathna', 'nng@gmail.com', 770359648, 'pending', '123');

-- --------------------------------------------------------

--
-- Table structure for table `login_credential`
--

CREATE TABLE IF NOT EXISTS `login_credential` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `passcode` varchar(200) NOT NULL,
  `last_logged` date NOT NULL,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`,`type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_credential`
--

INSERT INTO `login_credential` (`id`, `username`, `passcode`, `last_logged`, `type`) VALUES
(0, 'csm', '123', '0000-00-00', 'Donator'),
(1, 'umesha', '123', '2019-01-28', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `message` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
