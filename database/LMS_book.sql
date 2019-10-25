-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2019 at 07:58 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `BookId` int(10) NOT NULL,
  `Title` varchar(50) DEFAULT NULL,
  `Publisher` varchar(50) DEFAULT NULL,
  `Year` varchar(50) DEFAULT NULL,
  `Availability` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`BookId`, `Title`, `Publisher`, `Year`, `Availability`) VALUES
(1, 'OS', 'PEARSON', '2009', 3),
(2, 'DBMS', 'TARGET67', '2010', 0),
(3, 'TOC', 'NITC', '2018', 0),
(4, 'TOC', 'NITC', '2018', 0),
(5, 'DAA', 'y', '2014', 0),
(6, 'DSA', 'X', '2010', 9),
(7, 'Discrete Structures', 'Pearson', '2010', 9),
(8, 'Database Processing', 'Prentice Hall', '2013', 12),
(9, 'Computer System Architecture', 'Prentice Hall', '2015', 6),
(10, 'C: How to program', 'Prentice Hall', '2009', 4),
(11, 'Atomic and Nuclear Systems', 'Pearson India ', '2017', 14),
(12, 'The PlayBook', 'Stinson', '2010', 12),
(13, 'General Theory of Relativity', 'Pearson India ', '2012', 6),
(14, 'Heat and Thermodynamics', 'Pearson', '2013', 9),
(15, 'Machine Design', 'Pearson India ', '2012', 4),
(16, 'Nuclear Physics', 'Pearson India ', '1998', 7),
(17, 'Operating System', 'Pearson India ', '1990', 6),
(18, 'Theory of Machines', 'Pearson', '1992', 13),
(19, 'WEB TECH ', 'KK', '2010', 3),
(20, 'applied thermodynamics', 'po', '2012', 2),
(21, 'oomd', 'rome', '1997', 0),
(22, 'TDL', 'iiop', '2000', 2),
(23, 'SOFTWARE ENGINEERING', 'Monsterhomes', '2009', 1),
(24, 'Knowledge Management', 'Shivam ', '2000', 3),
(25, 'Web tech ', 'Raksha house', '1998', 2),
(26, 'Learn Python', 'Hede', '1990', 5),
(27, 'OS', 'PEARSONs', '2006', 2),
(28, 'Machine learning', 'TARGET67', '2010', 0),
(29, 'TOC', 'NITC', '2018', 4),
(30, 'HTML CSS from Basics', 'NITC', '2018', 1),
(31, 'Algorithms', 'y', '2014', 0),
(32, 'Crack GRE', 'X', '2010', 10),
(33, 'Data Structures', 'Pearson', '2010', 10),
(34, 'Database Processing', 'Prentice Hall', '2013', 12),
(35, 'Computer System Architecture', 'Prentice Hall', '2015', 4),
(36, 'C: How to program', 'Prentice Hall', '2009', 3),
(37, 'Nuclear Systems', 'Pearson India ', '2017', 13),
(38, 'The PlayBook', 'Stinson', '2010', 12),
(39, 'General Theories', 'Pearson India ', '2012', 5),
(40, 'Thermodynamics', 'Pearson', '2013', 9),
(41, 'Machine Design', 'Pearson India ', '2012', 5),
(42, 'Object oriented', 'India ', '1990', 1),
(43, 'Learning Advanced networks', 'Pearson', '2013', 3),
(44, 'Deep Learning ', 'Pearson India ', '2012', 5),
(45, 'Reinforcement Learning', 'Pearson India ', '2012', 5),
(46, 'Time and relativity', 'Somewell', '2003', 0),
(47, ' Design and designers', 'Goodwill books ', '1999', 2),
(48, 'Learn Python', 'Hede', '1990', 5),
(49, 'Computer Vision', 'Cormen', '2006', 0),
(50, 'Introduction to Algorithms', 'TARGET67', '2001', 0),
(51, ' C Programming Language', 'Kernighan', '2017', 1),
(52, 'Design Patterns', 'Gamma', '2018', 4),
(53, 'Software Engineering', ' Frederick', '2014', 2),
(54, 'Code Complete', 'McConnell', '2010', 1),
(55, 'Compilers: Principles', 'Pearson', '2010', 4),
(56, 'The Protocols ', 'Stevens', '2013', 2),
(57, 'Artificial Intelligence', 'Hall', '2005', 1),
(58, '	Introduction to Automata Theory', 'Hopcrafts', '2016', 2),
(59, 'Learn You a Haskell', 'TARGETs', '2011', 2),
(60, ' Discipline of Programming', ' Friedman', '2008', 4),
(61, 'Concrete Mathematics', 'Ronald L. Graham', '1998', 4),
(62, 'Algorithm Design Manual', 'E. Bryant', '2014', 2),
(63, 'Joel on Software', 'Spolsky', '2010', 1),
(64, 'Hackers Delight', 'Pearson', '2010', 4),
(65, 'Programming Pearls', 'Steve', '2013', 0),
(66, 'Autobiographical Sketches', 'Schrödinger', '2015', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`BookId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `BookId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
