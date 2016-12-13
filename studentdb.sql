-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2016 at 12:04 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentdb`
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
(5, 'blazeit123', 'what do i need to know for green belt', '2016-11-01 13:22:54'),
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
  `sessionId` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `message` varchar(50) NOT NULL,
  `dateSent` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`sessionId`, `email`, `message`, `dateSent`) VALUES
('h12i3uhwf89', 'hey@gmail.com', 'where is it located', '2016-11-01'),
('feiuh2f2e', 'johnsmith@yahoo.ca', 'testing message', '2016-11-02'),
('fweuih23f', 'janedoe@yahoo.ca', 'how much', '2016-11-03'),
('jdf021jsd', 'b2they@hotmail.ca', 'what is your name', '2016-11-04'),
('kf290edkd', 'keyon.reed@hotmail.com', 'where is it located', '2016-11-05'),
('93udmxn3', 'vinson.khau@gmail.com', 'i cant find you', '2016-11-06'),
('123iuysdb4', 'amyrose@live.com', 'what is my belt level', '2016-11-07'),
('abfjk39s', 'knuckles@outlook.com', 'where can i contact you', '2016-11-08'),
('pioio2fw2', 'espio@gmail.com', 'are you qualified', '2016-11-09'),
('mxb38as', 'tails.prower@yahoo.com', 'how much does it cost', '2016-11-10');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postId` int(4) NOT NULL,
  `postTitle` varchar(30) NOT NULL,
  `postText` varchar(250) NOT NULL,
  `postDate` datetime NOT NULL,
  `postComment` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postId`, `postTitle`, `postText`, `postDate`, `postComment`) VALUES
(1, 'New Post', 'hello', '2016-11-01 00:00:00', NULL),
(2, 'Test', 'hello', '2016-11-02 00:00:00', 'ok'),
(3, 'Hey it works', 'test', '2016-11-03 00:00:00', NULL),
(4, 'No class today', 'sorry', '2016-11-04 00:00:00', NULL),
(5, 'Hello', 'hi', '2016-11-05 00:00:00', NULL),
(6, 'Umm', 'nothing to say', '2016-11-06 00:00:00', 'what'),
(7, 'Green test', 'its hard', '2016-11-07 00:00:00', NULL),
(8, 'This is cool', 'seriously', '2016-11-08 00:00:00', 'I agree'),
(9, 'Nice post', 'cool', '2016-11-09 00:00:00', NULL),
(10, 'comment on this', 'sample text', '2016-11-10 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

CREATE TABLE `rank` (
  `beltLevel` varchar(15) NOT NULL,
  `beltCode` varchar(15) NOT NULL,
  `combinations` varchar(30) NOT NULL,
  `kempo` int(2) DEFAULT NULL,
  `kicks` int(2) NOT NULL,
  `punches` int(2) NOT NULL,
  `blocks` int(2) DEFAULT NULL,
  `forms` varchar(100) NOT NULL,
  `elbows` int(2) DEFAULT NULL,
  `knees` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rank`
--

INSERT INTO `rank` (`beltLevel`, `beltCode`, `combinations`, `kempo`, `kicks`, `punches`, `blocks`, `forms`, `elbows`, `knees`) VALUES
('blanche', '', '3-6-7', 0, 4, 7, 7, 'Premier Pinan', 0, 0),
('jaune', 'pwutnzjdhq381kl', '7-12-18', 3, 4, 7, 7, 'Deuxieme Pinan', 7, 1),
('orange', 'lkfye5182ncvafd', '2-4', 3, 4, 7, 7, 'Premier Kata', 0, 1),
('violette', 'pqorhgk395znvmx', '8-9', 4, 4, 7, 3, 'Deuxieme Kata', 0, 1),
('bleue', 'mzbcfqrw01pg74j', '10-16', 6, 4, 7, 0, 'Troisieme Pinan, Forme de la Grue, Forme de bloques', 0, 0),
('verte', '0174hfabzitlamg', '11-15-17', 10, 4, 7, 0, 'Quatrieme Pinan, Troisieme Kata', 0, 0),
('brune', 'kqhjg123pfoakvs', '1-13-14-19-21-26', 12, 4, 7, 0, 'Quatrieme Kata, Cinquieme Kata, Sixieme Kata, Two Man Fist Set 1, Forme du Prunier', 0, 0),
('noire', 'ghruacnzm174zca', '20', 2, 4, 7, 7, 'Ansuki, Cinquieme Pinan', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `sessionId` varchar(15) NOT NULL,
  `beltLevel` varchar(6) NOT NULL,
  `FName` varchar(50) NOT NULL,
  `LName` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`sessionId`, `beltLevel`, `FName`, `LName`) VALUES
('h12i3uhwf89', 'white', 'John', 'Smith'),
('feiuh2f2e', 'yellow', 'Jane', 'Jenkins'),
('fweuih23f', 'yellow', 'Jack', 'Hope'),
('jdf021jsd', 'orange', 'Jill', 'Treliving'),
('kf290edkd', 'black', 'Max', 'Grey');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `username` varchar(15) NOT NULL,
  `pass` varchar(15) NOT NULL,
  `beltLevel` varchar(6) NOT NULL,
  `FName` varchar(50) NOT NULL,
  `LName` varchar(30) NOT NULL,
  `postedMessages` int(3) DEFAULT NULL,
  `postedComments` int(3) DEFAULT NULL,
  `dateRegistered` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`username`, `pass`, `beltLevel`, `FName`, `LName`, `postedMessages`, `postedComments`, `dateRegistered`) VALUES
('123faker', 'newpass456', 'purple', 'Bill', 'Bush', 15, 15, '2016-11-16'),
('bieberlove', 'iforgot123', 'white', 'Sarah', 'Black', 9, 5, '2016-11-15'),
('najob79', 'player2', 'black', 'Max', 'Grey', 5, 7, '2016-11-11'),
('swagman', 'tryhard12', 'orange', 'Jill', 'Treliving', 3, 15, '2016-11-14'),
('user222', 'zombieman97', 'yellow', 'Jack', 'Hope', 1, 2, '2016-11-13'),
('clueless', 'passman', 'yellow', 'Jane', 'Jenkins', 2, 3, '2016-11-12'),
('newStudent', 'password', 'white', 'John', 'Smith', 2, 3, '2016-11-11'),
('1name1', 'confirm987', 'blue', 'Steve', 'Kennedy', 20, 31, '2016-11-17'),
('yoloswag420', 'youtubeman23', 'brown', 'Alex', 'Lopez', 44, 10, '2016-11-18'),
('blazeit123', 'amazonprime', 'green', 'Max', 'Lafleur', 4, 5, '2016-11-19');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `techerUsername` varchar(20) NOT NULL,
  `pass` varchar(15) NOT NULL,
  `beltLevel` varchar(15) DEFAULT NULL,
  `FName` varchar(30) NOT NULL,
  `LName` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`techerUsername`, `pass`, `beltLevel`, `FName`, `LName`) VALUES
('bojan97', 'adminP@$sw0rd', 'black', 'Bojan', 'Srbinoski'),
('saad97', 'adminP@$sw0rd', 'white', 'Saad', 'Ahmed'),
('theRealTeacher', 'fakePass123', 'yellow', 'John', 'Smith'),
('martialMaster', 'adminP@$sw0rd', 'black', 'Jane', 'Doe'),
('coolname', 'password', 'orange', 'Max', 'Sirloin'),
('anotherUser', 'panda1998', 'blue', 'Max', 'Franco'),
('blackBelt85', 'ert123', 'black', 'Michel', 'Sylvain'),
('sonicBoom', 'blueBoy194', 'purple', 'Sam', 'Fisher'),
('trollinsky', 'memeMaker123', 'green', 'Kane', 'Lynch'),
('da1ndonly', 'wordpass', 'brown', 'Jackie', 'Chan');

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
  ADD PRIMARY KEY (`sessionId`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postId`);

--
-- Indexes for table `rank`
--
ALTER TABLE `rank`
  ADD PRIMARY KEY (`beltLevel`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`sessionId`,`beltLevel`),
  ADD KEY `beltLevel` (`beltLevel`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`username`),
  ADD KEY `beltLevel` (`beltLevel`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`techerUsername`);

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
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
