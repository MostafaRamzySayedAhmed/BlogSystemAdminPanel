-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2020 at 06:33 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(255) NOT NULL,
  `CategoryDescription` varchar(255) NOT NULL,
  `CategoryVisibility` tinyint(2) NOT NULL DEFAULT 1,
  `CategoryComments` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='The Categories Table';

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CategoryID`, `CategoryName`, `CategoryDescription`, `CategoryVisibility`, `CategoryComments`) VALUES
(1, 'IT Solutions', 'Providing Solutions For All IT Aspects.', 1, 1),
(2, 'Marketing', 'Providing Marketing Solutions', 0, 0),
(4, 'Advertising', 'Providing Advertising Solutions', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `CommentID` int(11) NOT NULL,
  `CommentContent` varchar(255) NOT NULL,
  `CommentStatus` int(3) NOT NULL DEFAULT 0,
  `CommentDateTime` datetime NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Post_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='The Comments Table';

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `PostID` int(11) NOT NULL,
  `PostTitle` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `PostContent` varchar(255) NOT NULL,
  `PostDateTime` datetime NOT NULL,
  `PostApproval` int(3) NOT NULL DEFAULT 0 COMMENT '1 : Approved, 0: Pending Approval',
  `PostTags` varchar(255) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Category_ID` int(11) NOT NULL,
  `PostImage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='The Posts Table';

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`PostID`, `PostTitle`, `PostContent`, `PostDateTime`, `PostApproval`, `PostTags`, `User_ID`, `Category_ID`, `PostImage`) VALUES
(1, 'PHP', 'PHP is a server scripting language', '2020-05-16 06:13:06', 1, 'PHP', 3, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Fullname` varchar(255) NOT NULL,
  `GroupID` int(3) NOT NULL DEFAULT 0 COMMENT '1 : Admin, 0: User',
  `RegistrationStatus` int(3) NOT NULL DEFAULT 0 COMMENT '1 : Registered, 0 : Pending Activation',
  `UserDateTime` datetime NOT NULL,
  `UserImage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='The Users Table';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Email`, `Password`, `Fullname`, `GroupID`, `RegistrationStatus`, `UserDateTime`, `UserImage`) VALUES
(3, 'Mostafa', 'mostafa@yahoo.com', '123', 'Mostafa Ramzy', 1, 1, '2020-05-16 04:43:50', '928135421_no_image.png'),
(4, 'Ahmed', 'ahmed@yahoo.com', '12', 'Ahmed Ramzy', 0, 1, '2020-06-08 02:17:30', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`CommentID`),
  ADD KEY `Post_ID Constraint` (`Post_ID`),
  ADD KEY `The User_ID Constraint` (`User_ID`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`PostID`),
  ADD KEY `User_ID Constraint` (`User_ID`),
  ADD KEY `Category_ID Constraint` (`Category_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `PostID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `Post_ID Constraint` FOREIGN KEY (`Post_ID`) REFERENCES `posts` (`PostID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `The User_ID Constraint` FOREIGN KEY (`User_ID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `Category_ID Constraint` FOREIGN KEY (`Category_ID`) REFERENCES `categories` (`CategoryID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `User_ID Constraint` FOREIGN KEY (`User_ID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
