-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2023 at 08:06 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(10000) NOT NULL,
  `group` varchar(10) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`name`, `email`, `message`, `group`, `date`) VALUES
('Kuddus Miah', 'Kuddus@gmail.com', 'I need B- blood near Mirpur for my cousin by tomorrow.', 'O-', '2023/03/17 06:51:13am'),
('Shuvo Talukder', 'shuvo@gmail.com', 'My friend has B-. You can contract him by this number 0172283910.', 'O+', '2023/03/17 06:53:14am'),
('Shuvo Talukder', 'shuvo@gmail.com', 'By the way anyone know how long you have to wait after giving someone blood?', 'O+', '2023/03/17 06:58:14am'),
('Bilkis Begum', 'bilkis@gmail.com', 'You can donate after 3 months.', 'A-', '2023/03/17 07:02:17am'),
('Kuddus Miah', 'Kuddus@gmail.com', 'Tnx. will do!', 'O-', '2023/03/17 10:15:51am'),
('Walid Ibne Hasan', 'walid@gmail.com', 'Hello!', 'B+', '2023-03-17 10:20:13'),
('Walid Ibne Hasan', 'walid@gmail.com', 'I just gave my first blood :D', 'B+', '2023-03-17 15:22:47'),
('Apu Kumar Roy Bappi', 'apu@gmail.com', 'Bravo!', 'B-', '2023-03-17 15:24:04'),
('Alison Burger', 'alison@gmail.com', 'I used to work for Aladin! now I will save people life here.', 'AB+', '2023-03-18 00:10:59'),
('Apu Kumar Roy Bappi', 'apu@gmail.com', 'Nice name you got there Mr.burger!', 'B-', '2023-03-18 00:12:47'),
('Bilkis Begum', 'bilkis@gmail.com', 'Hey', 'A-', '2023-03-18 15:30:28'),
('Bilkis Begum', 'bilkis@gmail.com', 'sup', 'A-', '03:30 PM'),
('Bilkis Begum', 'bilkis@gmail.com', 'sup', 'A-', '2023-03-18 15:32:44 PM'),
('Bilkis Begum', 'bilkis@gmail.com', 's', 'A-', '2023/03/18 15:33:59 PM'),
('Bilkis Begum', 'bilkis@gmail.com', 's', 'A-', '2023/03/18 | 15:34:22 | PM'),
('Bilkis Begum', 'bilkis@gmail.com', 'ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', 'A-', '2023/03/18 | 15:34:36 | PM'),
('Bilkis Begum', 'bilkis@gmail.com', 'asdasd asdas das dasdasd asdasd as das das das dasd as a asdasd asdasd asdas das dasd asd asd as asd as', 'A-', '2023/03/18 | 15:36:12 | PM'),
('Shuvo Talukder', 'shuvo@gmail.com', 'sadasdas', 'O+', '2023/03/18 | 23:21:59 | PM'),
('Shuvo Talukder', 'shuvo@gmail.com', 'sup', 'O+', '2023/03/19 | 19:06:09 | PM'),
('Kuddus Miah', 'Kuddus@gmail.com', 'sds', 'O-', '2023/03/19 | 22:31:11 | PM'),
('Kuddus Miah', 'Kuddus@gmail.com', 'ds', 'O-', '2023/03/19 | 22:31:14 | PM');

-- --------------------------------------------------------

--
-- Table structure for table `urgent`
--

CREATE TABLE `urgent` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `sub` varchar(100) NOT NULL,
  `phone` int(50) NOT NULL,
  `group` varchar(5) NOT NULL,
  `message` varchar(10000) NOT NULL,
  `pdf` varchar(100) NOT NULL,
  `time` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `urgent`
--

INSERT INTO `urgent` (`id`, `name`, `sub`, `phone`, `group`, `message`, `pdf`, `time`, `email`) VALUES
(1, 'asdddddddd', 'asdddddddd', 2147483647, 'O+', 'asdddddddddddddddddddddddddddddddd', 'q5.pdf', '2023/03/19 | 13:52:32 | PM', 'shuvo@gmail.com'),
(2, 'asdad', 'asdasd', 12312312, 'O+', 'dsaaaaaaaaaaaaaaaaa', 'q6.pdf', '2023/03/19 | 22:31:55 | PM', 'Kuddus@gmail.com'),
(3, 'asdasd', 'asdasd', 123123123, 'O+', 'asdasdsdadasddddd', 'practise_sheet-1.pdf', '2023/03/20 | 16:19:47 | PM', 'apu@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `f_name` varchar(200) NOT NULL,
  `l_name` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `b_date` date NOT NULL,
  `Password` varchar(20) NOT NULL,
  `p_number` int(20) NOT NULL,
  `group` varchar(10) NOT NULL,
  `pdf` varchar(200) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `active` varchar(15) NOT NULL,
  `Status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `f_name`, `l_name`, `Email`, `b_date`, `Password`, `p_number`, `group`, `pdf`, `Gender`, `active`, `Status`) VALUES
(9, 'Fokor', 'Ali', 'admin47@gmail.com', '2023-03-09', 'letmeinman', 1922283459, 'B-', '340-Q1-solution.pdf', 'Male', 'Available', 'Unban'),
(4, 'Alison', 'Burger', 'alison@gmail.com', '2023-02-27', 'alison', 1922847583, 'AB+', 'CSE340-Assignment-2-Spring-2023.pdf', 'Other', 'Available', 'Unban'),
(6, 'Apu Kumar', 'Roy Bappi', 'apu@gmail.com', '2016-01-12', 'apuroy', 172283647, 'B-', 'Solution_Make-up_Assignment_2.pdf', 'Male', 'Available', 'Unban'),
(3, 'Bilkis', 'Begum', 'bilkis@gmail.com', '2023-03-31', 'bilkis', 1533456785, 'A-', 'q6.pdf', 'Female', 'Available', 'Ban'),
(1, 'Chy Zaber', 'Bin Zahid', 'chowdhury.zaber.bin.zahid@g.bracu.ac.bd', '2000-06-13', 'admin47', 1722345456, 'A+', 'practise_sheet-2.pdf', 'Male', 'Available', 'Unban'),
(2, 'Kuddus', 'Miah', 'Kuddus@gmail.com', '2009-03-10', 'kuddus', 1833746590, 'O-', '340-Q1-solution-1.pdf', 'Male', 'Unavailable', 'Ban'),
(10, 'Moni', 'Akther', 'moni@gmail.com', '2023-03-23', 'moni', 1722345986, 'O-', 'practise_sheet-1.pdf', 'Female', 'Available', 'Unban'),
(8, 'Shuvo', 'Talukder', 'shuvo@gmail.com', '2023-03-24', 'shuvo', 182273649, 'O+', 'q5-1.pdf', 'Male', 'Available', 'Unban'),
(7, 'Sokina', 'Begum', 'sokina@gmail.com', '1998-02-19', 'sokina', 1722834563, 'AB-', 'ADVISING_PAYSLIP_20301256_CHOWDHURY ZABER BIN ZAHID-6.pdf', 'Female', 'Available', 'Unban'),
(5, 'Walid Ibne', 'Hasan', 'walid@gmail.com', '2019-03-20', 'walidhasan', 1822635478, 'B+', 'q1.pdf', 'Male', 'Unavailable', 'Unban');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Email`),
  ADD KEY `index` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
