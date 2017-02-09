-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2017 at 11:53 PM
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
  `messageId` int(5) NOT NULL,
  `senderUsername` varchar(15) DEFAULT NULL,
  `senderColor` varchar(10) NOT NULL,
  `message` varchar(130) NOT NULL,
  `dateSent` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
(27, '123faker', 'orange', 'wojowiwef', '2017-02-07'),
(28, 'bojan97', 'noire', 'test', '2017-02-08'),
(29, '123faker', 'orange', 'yo', '2017-02-08'),
(30, '123faker', 'orange', 'test', '2017-02-08'),
(31, '123faker', 'orange', 'agagi', '2017-02-08'),
(32, '123faker', 'orange', 'afs', '2017-02-08'),
(46, '123faker', 'orange', 'df', '2017-02-08'),
(48, '123faker', 'orange', 'ewfwef', '2017-02-08'),
(49, '123faker', 'orange', 'test', '2017-02-08'),
(50, '123faker', 'orange', 'test', '2017-02-08'),
(51, '123faker', 'orange', 'test', '2017-02-08'),
(52, '123faker', 'orange', 'testwef', '2017-02-08'),
(53, '123faker', 'orange', 'test', '2017-02-08'),
(54, '123faker', 'orange', 'it works!!!', '2017-02-08'),
(55, 'bojan97', 'noire', 'damn right', '2017-02-08'),
(56, 'bojan97', 'noire', 'damn right', '2017-02-08'),
(57, '123faker', 'orange', 'test', '2017-02-08'),
(58, '123faker', 'orange', 'test', '2017-02-08'),
(120, '123faker', 'orange', 'test', '2017-02-08'),
(121, '123faker', 'orange', 'ewfwef', '2017-02-08'),
(63, '123faker', 'orange', 'fsd', '2017-02-08'),
(122, '123faker', 'orange', 'again', '2017-02-08'),
(123, '123faker', 'orange', 'weoifjweqoifowefoiwehfoiaweoi;fwefhaskfhasdkljfhaskldjcacao;cqwoeipfhqipwuefhiqoweufhiqwuefhsadjcakj', '2017-02-08'),
(124, 'bojan97', 'noire', 'test', '2017-02-08'),
(125, '123faker', 'orange', 'test', '2017-02-08');

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
  `postId` int(5) NOT NULL,
  `postTitle` varchar(30) NOT NULL,
  `postImage` varchar(100) DEFAULT NULL,
  `postText` varchar(750) NOT NULL,
  `postDate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postId`, `postTitle`, `postImage`, `postText`, `postDate`) VALUES
(25, 'Bienvenue', NULL, 'Bienvenue sur mon site! Vous pouvez naviguer Ã  travers les pages de styles de combat ou du cours pour plus d\'informations sur le programme offert. Vous pouvez aussi crÃ©er un compte gratuitement et utiliser la salle de dicussion pour des questions reliÃ©es au matÃ©riel du cours. De plus, vous pouvez consultez votre profil pour une liste de tous les techniques nÃ©cessaires pour votre prochain examen. Si vous avez des questions, veuillez consulter la page "Contactez-Nous".', '2017-02-08');

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
  `pass` varchar(255) NOT NULL,
  `beltLevel` varchar(15) NOT NULL DEFAULT 'blanche',
  `FName` varchar(50) NOT NULL,
  `LName` varchar(50) NOT NULL,
  `postedMessages` int(5) DEFAULT NULL,
  `dateRegistered` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentID`, `username`, `pass`, `beltLevel`, `FName`, `LName`, `postedMessages`, `dateRegistered`) VALUES
(19, 'passtest3', '$2y$10$bUAspuFHoLk/aI5aUYWTr.jVx3p3la/q8IiNeCie0WjLiSW/wHJ3a', 'blanche', 'bojan', 'srb', 0, '2017-02-08'),
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
(16, 'lalalaal', 'qweqwe2', 'blanche', 'lolo', 'asfasf', 0, '2017-01-29'),
(17, '123faker', '$2y$10$UF5cXj5EWCl7pq/2R2k9f.8QhnGSxYuNVyY01AEgi7zluirPF11my', 'orange', 'bojan', 'srb', 1, '2017-02-08'),
(18, 'passtest2', '$2y$10$w39RHDBJsxbGDP1/lzGK6uT4J.9nq6eM3VjmiJa.3YpfEOb8ArqqG', 'blanche', 'bojan', 'srb', 0, '2017-02-08'),
(20, '1234faker', '$2y$10$Fgq3KlLnRQYxgrh.iKIQPOBtLEll8VWVAFw4ROamASWTm5pOecTnS', 'blanche', 'saad', 'ahmed', 0, '2017-02-08'),
(21, 'asdasdf', '$2y$10$iJZ2R.CwE6XcUs5M5lznFuas3.FJIiGZkhT1Gvk3xwZ9z1VNi01Z.', 'blanche', 'd', 'd', 0, '2017-02-08');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacherUsername` varchar(20) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `beltLevel` varchar(15) DEFAULT NULL,
  `FName` varchar(50) NOT NULL,
  `LName` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacherUsername`, `pass`, `beltLevel`, `FName`, `LName`) VALUES
('bojan97', '$2y$10$M6bwiSymp7FGjUpBNrI2deqEiKJkN4lSyEmfxxUJbnTU0r6wN7tie', 'noire', 'Bojan', 'Srbinoski'),
('saad97', '$2y$10$O4M5uQpMW0ZzD7L0CtiTLuT/vnboFKCxpWVF7znap5WKr5DToP8ti', 'noire', 'Saad', 'Ahmed');

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
  MODIFY `messageId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `rank`
--
ALTER TABLE `rank`
  MODIFY `beltIndex` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
