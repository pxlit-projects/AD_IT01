-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 30, 2015 at 02:44 PM
-- Server version: 5.5.35-cll-lve
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `appdev_it01`
--

-- --------------------------------------------------------

--
-- Table structure for table `action`
--

CREATE TABLE IF NOT EXISTS `action` (
  `actionid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`actionid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `action`
--

INSERT INTO `action` (`actionid`, `name`) VALUES
(1, 'login');

-- --------------------------------------------------------

--
-- Table structure for table `antwoorden`
--

CREATE TABLE IF NOT EXISTS `antwoorden` (
  `antwoordid` int(11) NOT NULL AUTO_INCREMENT,
  `vraagid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `antwoord` int(11) NOT NULL,
  `werk` tinyint(1) NOT NULL,
  PRIMARY KEY (`antwoordid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `apikey`
--

CREATE TABLE IF NOT EXISTS `apikey` (
  `apikeyid` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(50) NOT NULL,
  PRIMARY KEY (`apikeyid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `apikey`
--

INSERT INTO `apikey` (`apikeyid`, `key`) VALUES
(1, 'SBPgKUiusC5N6H6gorl64D68h357k713');

-- --------------------------------------------------------

--
-- Table structure for table `surveyUsers`
--

CREATE TABLE IF NOT EXISTS `surveyUsers` (
  `surveyUserid` int(11) NOT NULL AUTO_INCREMENT,
  `authkey` varchar(50) NOT NULL,
  PRIMARY KEY (`surveyUserid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `surveyUsers`
--

INSERT INTO `surveyUsers` (`surveyUserid`, `authkey`) VALUES
(1, 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `thema`
--

CREATE TABLE IF NOT EXISTS `thema` (
  `themaid` int(11) NOT NULL AUTO_INCREMENT,
  `themanaam` text NOT NULL,
  PRIMARY KEY (`themaid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `thema`
--

INSERT INTO `thema` (`themaid`, `themanaam`) VALUES
(1, 'Leren en toepassen van kennis');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `rank` int(11) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `firstName`, `lastName`, `email`, `rank`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Kevin', 'Coenegrachts', 'kevin.coenegrachts@student.pxl.be', 10);

-- --------------------------------------------------------

--
-- Table structure for table `vragen`
--

CREATE TABLE IF NOT EXISTS `vragen` (
  `vraagid` int(11) NOT NULL AUTO_INCREMENT,
  `vraag` text NOT NULL,
  `themaid` int(11) NOT NULL,
  `logo` varchar(200) NOT NULL,
  PRIMARY KEY (`vraagid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `vragen`
--

INSERT INTO `vragen` (`vraagid`, `vraag`, `themaid`, `logo`) VALUES
(1, 'Iets nieuws leren (zoals het leren omgaan met bijvoorbeeld een nieuwe GSM, vaatwasmachine of afstandsbediening', 1, 'images/illustraties/d155.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
