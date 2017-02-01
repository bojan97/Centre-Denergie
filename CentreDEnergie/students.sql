-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2017 at 01:12 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

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

CREATE TABLE `chat` (
  `messageId` int(4) NOT NULL,
  `senderUsername` varchar(15) DEFAULT NULL,
  `message` varchar(50) NOT NULL,
  `dateSent` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`messageId`, `senderUsername`, `message`, `dateSent`) VALUES
(1, 'username', 'hello', '2016-11-01 10:42:21'),
(2, '123faker', 'yo', '2016-11-01 11:53:53'),
(3, '1name1', 'how is everyone', '2016-11-01 11:29:12'),
(4, 'yoloswag420', 'this is a cool site', '2016-11-01 09:13:11'),
(5, 'blazeit123', 'what do i need to know for verte belt', '2016-11-01 13:22:54'),
(6, 'chatkool2', 'nice chat room', '2016-11-01 13:22:58'),
(7, 'user432', 'easy exam?', '2016-11-01 05:32:23'),
(8, 'play4723', 'lol', '2016-11-01 05:32:46'),
(9, 'testing75', 'better train hard', '2016-11-01 11:22:33'),
(10, 'awww', 'nice memes', '2016-11-01 22:33:44');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `email` varchar(30) NOT NULL,
  `message` varchar(50) NOT NULL,
  `dateSent` date NOT NULL
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

CREATE TABLE `posts` (
  `postId` int(4) NOT NULL,
  `postTitle` varchar(30) NOT NULL,
  `postText` varchar(750) NOT NULL,
  `postDate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postId`, `postTitle`, `postText`, `postDate`) VALUES
(1, 'New Post', 'hello', '2016-11-01 00:00:00'),
(2, 'Test', 'hello', '2016-11-02 00:00:00'),
(3, 'Hey it works', 'test', '2016-11-03 00:00:00'),
(4, 'No class today', 'sorry', '2016-11-04 00:00:00'),
(5, 'Hello', 'hi', '2016-11-05 00:00:00'),
(6, 'Umm', 'nothing to say', '2016-11-06 00:00:00'),
(7, 'verte test', 'its hard', '2016-11-07 00:00:00'),
(8, 'This is cool', 'seriously', '2016-11-08 00:00:00'),
(9, 'Nice post', 'cool', '2016-11-09 00:00:00'),
(10, 'comment on this', 'sample text', '2016-11-10 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

CREATE TABLE `rank` (
  `beltIndex` int(2) NOT NULL,
  `beltLevel` varchar(15) NOT NULL,
  `beltCode` varchar(15) NOT NULL,
  `combinations` varchar(30) NOT NULL,
  `kempo` int(2) DEFAULT NULL,
  `kicks` int(2) NOT NULL,
  `punches` int(2) NOT NULL,
  `blocks` int(2) DEFAULT NULL,
  `forms` varchar(150) NOT NULL,
  `elbows` int(2) DEFAULT NULL,
  `knees` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

CREATE TABLE `student` (
  `studentID` int(4) NOT NULL,
  `username` varchar(15) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `beltLevel` varchar(15) NOT NULL DEFAULT 'blanche',
  `FName` varchar(50) NOT NULL,
  `LName` varchar(50) NOT NULL,
  `postedMessages` int(3) DEFAULT NULL,
  `dateRegistered` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentID`, `username`, `pass`, `beltLevel`, `FName`, `LName`, `postedMessages`, `dateRegistered`) VALUES
(1, '123faker', 'newpass456', 'brune', 'Bill', 'Bush', 15, '2016-11-16'),
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

CREATE TABLE `teacher` (
  `teacherUsername` varchar(20) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `beltLevel` varchar(15) DEFAULT NULL,
  `FName` varchar(50) NOT NULL,
  `LName` varchar(50) NOT NULL
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`messageId`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postId`);

--
-- Indexes for table `rank`
--
ALTER TABLE `rank`
  ADD PRIMARY KEY (`beltLevel`),
  ADD UNIQUE KEY `beltIndex` (`beltIndex`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `beltLevel` (`beltLevel`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacherUsername`),
  ADD UNIQUE KEY `teacherUsername` (`teacherUsername`),
  ADD KEY `beltLevel` (`beltLevel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `messageId` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postId` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `rank`
--
ALTER TABLE `rank`
  MODIFY `beltIndex` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
