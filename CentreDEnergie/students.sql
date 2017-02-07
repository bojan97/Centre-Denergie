-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2017 at 05:18 PM
-- Server version: 5.7.9
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `students`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
  `messageId` int(4) NOT NULL AUTO_INCREMENT,
  `senderUsername` varchar(15) DEFAULT NULL,
  `senderColor` varchar(10) NOT NULL,
  `message` varchar(300) NOT NULL,
  `dateSent` date NOT NULL,
  PRIMARY KEY (`messageId`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`messageId`, `senderUsername`, `senderColor`, `message`, `dateSent`) VALUES
(1, 'username', 'blanche', 'hello', '2016-11-01'),
(2, '123faker', 'jaune', 'yo', '2016-11-01'),
(3, '1name1', 'orange', 'how is everyone', '2016-11-01'),
(4, 'yoloswag420', 'violette', 'this is a cool site', '2016-11-01'),
(5, 'blazeit123', 'bleue', 'what do i need to know for verte belt', '2016-11-01'),
(6, 'chatkool2', 'verte', 'nice chat room', '2016-11-01'),
(7, 'user432', 'brune', 'easy exam?', '2016-11-01'),
(8, 'play4723', 'noire', 'lol', '2016-11-01'),
(9, 'testing75', 'orange', 'better train hard', '2016-11-01'),
(10, 'awww', 'violette', 'nice memes', '2016-11-01'),
(11, '123faker', 'bleue', 'wieof', '2017-02-02'),
(22, '123faker', 'orange', 'ewfw', '2017-02-07'),
(24, '123faker', 'orange', 'fuck off', '2017-02-07'),
(25, '123faker', 'orange', 'wefiwojfoewfjewojewo', '2017-02-07'),
(26, '123faker', 'orange', 'oiaejfoiewjfoiewfjewfoiewjfoew', '2017-02-07'),
(27, '123faker', 'orange', 'wojowiwef', '2017-02-07');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `email` varchar(30) NOT NULL,
  `message` varchar(50) NOT NULL,
  `dateSent` date NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`email`, `message`, `dateSent`) VALUES
('hey@gmail.com', 'where is it located', '2016-11-01'),
('johnsmith@yahoo.ca', 'testing message', '2016-11-02'),
('janedoe@yahoo.ca', 'how much', '2016-11-03'),
('b2they@hotmail.ca', 'what is your name', '2016-11-04'),
('keyon.reed@hotmail.com', 'where is it located', '2016-11-05'),
('vinson.khau@gmail.com', 'i cant find you', '2016-11-06'),
('amyrose@live.com', 'what is my belt level', '2016-11-07'),
('knuckles@outlook.com', 'where can i contact you', '2016-11-08'),
('espio@gmail.com', 'are you qualified', '2016-11-09'),
('tails.prower@yahoo.com', 'how much does it cost', '2016-11-10');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `postId` int(4) NOT NULL AUTO_INCREMENT,
  `postTitle` varchar(30) NOT NULL,
  `postImage` varchar(100) DEFAULT NULL,
  `postText` varchar(750) NOT NULL,
  `postDate` date NOT NULL,
  PRIMARY KEY (`postId`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postId`, `postTitle`, `postImage`, `postText`, `postDate`) VALUES
(1, 'New Post', NULL, 'hello', '2016-11-01'),
(2, 'Test', NULL, 'hello', '2016-11-02'),
(3, 'Hey it works', NULL, 'test', '2016-11-03'),
(4, 'No class today', NULL, 'sorry', '2016-11-04'),
(5, 'Hello', NULL, 'hi', '2016-11-05'),
(6, 'Umm', NULL, 'nothing to say', '2016-11-06'),
(7, 'verte test', NULL, 'its hard', '2016-11-07'),
(8, 'This is cool', NULL, 'seriously', '2016-11-08'),
(9, 'Nice post', NULL, 'cool', '2016-11-09'),
(10, 'comment on this', NULL, 'sample text', '2016-11-10'),
(20, 'dfg', NULL, 'Bienvenue sur mon site! Vous pouvez naviguer Ã  travers les pages de styles de combat ou du cours pour plus d''informations sur le programme offert.Vous pouvez aussicrÃ©er un compte gratuitement et utiliser la salle de dicussion pour des questions reliÃ©es au matÃ©riel du cours. De plus, vous pouvez consultez votre profil \npour une liste de tous les techniques nÃ©cessaires pour votre prochain examen. Si vous avez des questions, veuillez consulter la page "Contactez-Nous".', '2017-02-01'),
(21, 'It Works!!', 'snake2.jpg', 'Bienvenue sur mon site! Vous pouvez naviguer Ã  travers les pages de styles de combat ou du cours pour plus d''informations sur le programme offert.Vous pouvez aussicrÃ©er un compte gratuitement et utiliser la salle de dicussion pour des questions reliÃ©es au matÃ©riel du cours. De plus, vous pouvez consultez votre profil \r\npour une liste de tous les techniques nÃ©cessaires pour votre prochain examen. Si vous avez des questions, veuillez consulter la page "Contactez-Nous".', '2017-02-01'),
(22, 'another post', 'leopard.jpg', 'this works too', '2017-02-01'),
(23, 'another post', NULL, 'this works too', '2017-02-01'),
(24, 'Nice title', 'img3.png', 'cool message', '2017-02-02');

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

DROP TABLE IF EXISTS `rank`;
CREATE TABLE IF NOT EXISTS `rank` (
  `beltIndex` int(2) NOT NULL AUTO_INCREMENT,
  `beltLevel` varchar(15) NOT NULL,
  `beltCode` varchar(15) NOT NULL,
  `combinations` varchar(30) NOT NULL,
  `kempo` int(2) DEFAULT NULL,
  `kicks` int(2) NOT NULL,
  `punches` int(2) NOT NULL,
  `blocks` int(2) DEFAULT NULL,
  `forms` varchar(150) NOT NULL,
  `elbows` int(2) DEFAULT NULL,
  `knees` int(2) DEFAULT NULL,
  PRIMARY KEY (`beltLevel`),
  UNIQUE KEY `beltIndex` (`beltIndex`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rank`
--

INSERT INTO `rank` (`beltIndex`, `beltLevel`, `beltCode`, `combinations`, `kempo`, `kicks`, `punches`, `blocks`, `forms`, `elbows`, `knees`) VALUES
(1, 'blanche', '', '3,6,7', 0, 4, 7, 8, 'Pinan 1', 0, 0),
(2, 'jaune', 'pwutnzjdhq381kl', '12,18', 3, 4, 7, 8, 'Pinan 2', 7, 1),
(3, 'orange', 'lkfye5182ncvafd', '2,4', 3, 4, 7, 8, 'Kata 1', 0, 1),
(4, 'violette', 'pqorhgk395znvmx', '8,9', 4, 4, 7, 3, 'Kata 2', 0, 1),
(5, 'bleue', 'mzbcfqrw01pg74j', '10,15,16', 6, 4, 7, 0, 'Pinan 3, Pinan 4, Forme de Bloques', 0, 0),
(6, 'verte', '0174hfabzitlamg', '11,13,14', 10, 4, 7, 3, 'Pinan 5, Forme de la Grue', 0, 0),
(7, 'brune', 'kqhjg123pfoakvs', '1,19,21,26', 12, 4, 7, 0, 'Kata 3, Kata 4, Kata 5, Forme du Prunier, Two Man Fist Set A', 0, 0),
(8, 'noire', 'ghruacnzm174zca', '22', 5, 5, 7, 0, 'Kata 6, Ansuki, Two Man Fist Set B', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `studentID` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `beltLevel` varchar(15) NOT NULL DEFAULT 'blanche',
  `FName` varchar(50) NOT NULL,
  `LName` varchar(50) NOT NULL,
  `postedMessages` int(3) DEFAULT NULL,
  `dateRegistered` date NOT NULL,
  PRIMARY KEY (`studentID`),
  UNIQUE KEY `username` (`username`),
  KEY `beltLevel` (`beltLevel`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentID`, `username`, `pass`, `beltLevel`, `FName`, `LName`, `postedMessages`, `dateRegistered`) VALUES
(1, '123faker', 'newpass456', 'orange', 'Bill', 'Bush', 15, '2016-11-16'),
(3, 'bieberlove', 'iforgot123', 'blanche', 'Sarah', 'noire', 9, '2016-11-15'),
(6, 'najob79', 'player2', 'noire', 'Max', 'Grey', 5, '2016-11-11'),
(8, 'swagman', 'tryhard12', 'orange', 'Jill', 'Treliving', 3, '2016-11-14'),
(9, 'user222', 'zombieman97', 'jaune', 'Jack', 'Hope', 1, '2016-11-13'),
(5, 'clueless', 'passman', 'bleue', 'Jane', 'Jenkins', 2, '2016-11-12'),
(7, 'newStudent', 'password', 'blanche', 'John', 'Smith', 2, '2016-11-11'),
(2, '1name1', 'confirm987', 'bleue', 'Steve', 'Kennedy', 20, '2016-11-17'),
(10, 'yoloswag420', 'youtubeman23', 'brune', 'Alex', 'Lopez', 44, '2016-11-18'),
(4, 'blazeit123', 'amazonprime', 'verte', 'Max', 'Lafleur', 4, '2016-11-19'),
(13, 'hopethisworks', 'qweqwe2', 'blanche', 'bojan', 'srbinoski', 0, '2017-01-29'),
(14, 'hopethisworks2', 'qweqwe2', 'blanche', 'bojan', 'srbinoski', 0, '2017-01-29'),
(15, 'wepifjwpioef', 'qweqwe2', 'blanche', 'bojan', 'sriwopej', 0, '2017-01-29'),
(16, 'lalalaal', 'qweqwe2', 'blanche', 'lolo', 'asfasf', 0, '2017-01-29');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE IF NOT EXISTS `teacher` (
  `teacherUsername` varchar(20) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `beltLevel` varchar(15) DEFAULT NULL,
  `FName` varchar(50) NOT NULL,
  `LName` varchar(50) NOT NULL,
  PRIMARY KEY (`teacherUsername`),
  UNIQUE KEY `teacherUsername` (`teacherUsername`),
  KEY `beltLevel` (`beltLevel`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacherUsername`, `pass`, `beltLevel`, `FName`, `LName`) VALUES
('bojan97', 'adminP@$sw0rd', 'noire', 'Bojan', 'Srbinoski'),
('saad97', 'adminP@$sw0rd', 'blanche', 'Saad', 'Ahmed'),
('theRealTeacher', 'fakePass123', 'jaune', 'John', 'Smith'),
('martialMaster', 'adminP@$sw0rd', 'noire', 'Jane', 'Doe'),
('coolname', 'password', 'orange', 'Max', 'Sirloin'),
('anotherUser', 'panda1998', 'bleue', 'Max', 'Franco'),
('noireBelt85', 'ert123', 'noire', 'Michel', 'Sylvain'),
('sonicBoom', 'bleueBoy194', 'violette', 'Sam', 'Fisher'),
('trollinsky', 'memeMaker123', 'verte', 'Kane', 'Lynch'),
('da1ndonly', 'wordpass', 'brune', 'Jackie', 'Chan');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
