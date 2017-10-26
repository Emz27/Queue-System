-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2017 at 10:40 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prs`
--

-- --------------------------------------------------------

--
-- Table structure for table `agreement_type`
--

CREATE TABLE `agreement_type` (
  `id` int(8) NOT NULL,
  `description` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agreement_type`
--

INSERT INTO `agreement_type` (`id`, `description`) VALUES
(2, 'Agreement Type test');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `description` int(11) NOT NULL,
  `town` int(11) NOT NULL,
  `street_address` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cancel_reason`
--

CREATE TABLE `cancel_reason` (
  `id` int(8) NOT NULL,
  `description` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cancel_reason`
--

INSERT INTO `cancel_reason` (`id`, `description`) VALUES
(2, 'cancel 1'),
(3, 'test1');

-- --------------------------------------------------------

--
-- Table structure for table `center`
--

CREATE TABLE `center` (
  `id` int(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `project_owner` int(32) NOT NULL,
  `city` int(8) NOT NULL,
  `status` int(8) NOT NULL,
  `search_inquiry_date` datetime NOT NULL,
  `entry_date` datetime NOT NULL,
  `growth_type` int(8) NOT NULL,
  `agreement_type` int(8) NOT NULL,
  `commercial_term` int(8) NOT NULL,
  `rentable_area` double(32,5) NOT NULL,
  `local_corporate_guarantee` double(32,5) NOT NULL,
  `corporate_plc_guarantee` double(32,5) NOT NULL,
  `bank_guarantee` double(32,5) NOT NULL,
  `cash_security_deposit` double(32,5) NOT NULL,
  `sign_date` datetime NOT NULL,
  `center_type` int(8) NOT NULL,
  `gross_capex` double(32,5) NOT NULL,
  `landlord_capex_contribution` double(32,5) NOT NULL,
  `net_corporate_capex` double(32,5) NOT NULL,
  `submit_date` datetime NOT NULL,
  `opening_date` datetime NOT NULL,
  `approve_date` datetime NOT NULL,
  `ws_num` int(8) NOT NULL,
  `usable_area` double(32,5) NOT NULL,
  `lead_broker` varchar(32) NOT NULL,
  `execute_date` datetime NOT NULL,
  `center_num` varchar(32) NOT NULL,
  `commence_date` datetime NOT NULL,
  `target_date` datetime NOT NULL,
  `street_address` varchar(32) NOT NULL,
  `latitude` double(32,16) NOT NULL,
  `longitude` double(32,16) NOT NULL,
  `comment` text NOT NULL,
  `rate` double(32,5) NOT NULL,
  `open_date` datetime NOT NULL,
  `cancel_reason` int(8) NOT NULL,
  `cancel_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `center`
--

INSERT INTO `center` (`id`, `name`, `project_owner`, `city`, `status`, `search_inquiry_date`, `entry_date`, `growth_type`, `agreement_type`, `commercial_term`, `rentable_area`, `local_corporate_guarantee`, `corporate_plc_guarantee`, `bank_guarantee`, `cash_security_deposit`, `sign_date`, `center_type`, `gross_capex`, `landlord_capex_contribution`, `net_corporate_capex`, `submit_date`, `opening_date`, `approve_date`, `ws_num`, `usable_area`, `lead_broker`, `execute_date`, `center_num`, `commence_date`, `target_date`, `street_address`, `latitude`, `longitude`, `comment`, `rate`, `open_date`, `cancel_reason`, `cancel_date`) VALUES
(23, 'Hello this is just a test', 4, 1, 0, '2017-03-16 00:00:00', '2017-03-10 04:26:10', 2, 2, 1, 1.00000, 1.25000, 1.35000, 1.36000, 1.26000, '2017-03-31 00:00:00', 2, 0.00000, 0.00000, 112.00000, '2017-03-10 00:00:00', '2017-03-29 00:00:00', '2017-03-10 12:48:39', 1, 12.10000, 'testing lead broker', '2017-03-11 00:00:00', '', '2017-03-12 00:00:00', '2018-04-10 00:00:00', '', 14.6074881022157490, 121.0786341503262500, 'test comment', 12.00000, '2020-03-20 00:00:00', 2, '2017-04-01 00:00:00'),
(24, 'test112', 4, 1, 0, '0000-00-00 00:00:00', '2017-03-10 21:56:05', 2, 2, 1, 0.00000, 123.00000, 123.00000, 123.00000, 123.00000, '2017-03-29 00:00:00', 2, 123.00000, 123.00000, 0.00000, '2017-03-29 00:00:00', '2017-03-29 00:00:00', '2017-03-30 00:00:00', 12, 12.00000, 'testing lead broker', '2017-03-29 00:00:00', '', '2017-03-02 00:00:00', '2017-03-31 00:00:00', 'street address', 14.6110166695743060, 121.0759375244379000, 'test', 1.00000, '2017-03-30 00:00:00', 2, '0000-00-00 00:00:00'),
(25, 'center name', 6, 3, 0, '0000-00-00 00:00:00', '2017-03-11 00:04:41', 0, 0, 0, 0.00000, 0.00000, 0.00000, 0.00000, 0.00000, '0000-00-00 00:00:00', 0, 0.00000, 0.00000, 0.00000, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0.00000, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0.0000000000000000, 0.0000000000000000, '', 0.00000, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(26, 'testblah', 4, 1, 0, '2017-03-30 00:00:00', '2017-03-17 08:12:05', 2, 2, 1, 0.00000, 123.00000, 123.00000, 123.00000, 123.00000, '2017-03-30 00:00:00', 2, 123.00000, 123.00000, 0.00000, '2017-03-24 00:00:00', '2017-03-29 00:00:00', '2017-03-30 00:00:00', 1, 1.00000, 'adssad', '2017-03-30 00:00:00', '', '2017-03-30 00:00:00', '2017-03-31 00:00:00', 'asdsdadsa', 14.6465379700305170, 121.0420846939086900, 'asdsad', 5.00000, '2017-03-30 00:00:00', 0, '0000-00-00 00:00:00'),
(27, 'testemz', 4, 3, 0, '2017-01-01 00:00:00', '2017-03-19 12:36:49', 0, 0, 0, 0.00000, 0.00000, 0.00000, 0.00000, 0.00000, '0000-00-00 00:00:00', 0, 0.00000, 0.00000, 0.00000, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0.00000, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'asdsadas', 0.0000000000000000, 0.0000000000000000, '', 0.00000, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(28, 'testbenz', 4, 1, 0, '0000-00-00 00:00:00', '2017-03-19 13:33:55', 0, 0, 0, 0.00000, 0.00000, 0.00000, 0.00000, 0.00000, '0000-00-00 00:00:00', 0, 0.00000, 0.00000, 0.00000, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0.00000, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'asdas', 0.0000000000000000, 0.0000000000000000, '', 0.00000, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(29, '1', 4, 1, 0, '0000-00-00 00:00:00', '2017-03-19 16:23:31', 0, 0, 0, 0.00000, 0.00000, 0.00000, 0.00000, 0.00000, '0000-00-00 00:00:00', 0, 0.00000, 0.00000, 0.00000, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0.00000, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'asdfasfd', 0.0000000000000000, 0.0000000000000000, '', 0.00000, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(30, '2', 4, 1, 0, '1970-01-01 00:00:00', '2017-03-19 16:24:27', 0, 0, 0, 0.00000, 0.00000, 0.00000, 0.00000, 0.00000, '0000-00-00 00:00:00', 0, 0.00000, 0.00000, 0.00000, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0.00000, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'asdfasfd', 0.0000000000000000, 0.0000000000000000, '', 0.00000, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(31, '3', 4, 1, 0, '1970-01-01 00:00:00', '2017-03-19 16:24:50', 0, 0, 0, 0.00000, 0.00000, 0.00000, 0.00000, 0.00000, '0000-00-00 00:00:00', 0, 0.00000, 0.00000, 0.00000, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0.00000, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'asdfasfd', 0.0000000000000000, 0.0000000000000000, '', 0.00000, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(32, '3', 4, 1, 0, '2017-03-09 00:00:00', '2017-03-19 16:25:21', 0, 0, 0, 0.00000, 0.00000, 0.00000, 0.00000, 0.00000, '0000-00-00 00:00:00', 0, 0.00000, 0.00000, 0.00000, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0.00000, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'asdfasfd', 0.0000000000000000, 0.0000000000000000, '', 0.00000, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(33, 'asdsad', 4, 1, 0, '2017-03-28 00:00:00', '2017-03-19 21:44:43', 0, 0, 0, 0.00000, 0.00000, 0.00000, 0.00000, 0.00000, '0000-00-00 00:00:00', 0, 0.00000, 0.00000, 0.00000, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0.00000, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'asdasd', 0.0000000000000000, 0.0000000000000000, '', 0.00000, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `center_follow`
--

CREATE TABLE `center_follow` (
  `id` int(32) NOT NULL,
  `user` int(32) NOT NULL,
  `center` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `center_image`
--

CREATE TABLE `center_image` (
  `id` int(8) NOT NULL,
  `center` int(8) NOT NULL,
  `path` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `center_status`
--

CREATE TABLE `center_status` (
  `id` int(8) NOT NULL,
  `description` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `center_type`
--

CREATE TABLE `center_type` (
  `id` int(8) NOT NULL,
  `description` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `center_type`
--

INSERT INTO `center_type` (`id`, `description`) VALUES
(2, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(8) NOT NULL,
  `description` varchar(32) NOT NULL,
  `region` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `description`, `region`) VALUES
(1, 'Pasig', 1),
(3, 'Manila', 1);

-- --------------------------------------------------------

--
-- Table structure for table `commercial_term`
--

CREATE TABLE `commercial_term` (
  `id` int(8) NOT NULL,
  `description` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commercial_term`
--

INSERT INTO `commercial_term` (`id`, `description`) VALUES
(1, 'Commercial term test');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `center_id` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `name`, `size`, `type`, `url`, `title`, `center_id`) VALUES
(1, 'Untitled - Copy.png', 1321324, 'image/png', NULL, 'hello', 23);

-- --------------------------------------------------------

--
-- Table structure for table `growth_type`
--

CREATE TABLE `growth_type` (
  `id` int(8) NOT NULL,
  `description` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `growth_type`
--

INSERT INTO `growth_type` (`id`, `description`) VALUES
(2, 'growth type test');

-- --------------------------------------------------------

--
-- Table structure for table `inquire`
--

CREATE TABLE `inquire` (
  `id` int(32) NOT NULL,
  `workstation` int(11) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `company` varchar(32) NOT NULL,
  `city` int(11) NOT NULL,
  `cellphone_number` varchar(32) NOT NULL,
  `telephone_number` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `message` text NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `inquire`
--

INSERT INTO `inquire` (`id`, `workstation`, `firstname`, `lastname`, `company`, `city`, `cellphone_number`, `telephone_number`, `email`, `message`, `date_time`) VALUES
(1, 1, 'asdsad', 'asdsad', 'assad', 1, '+632132131231', '(123)123-1231', 'assadsad!@asdfasdf.com', 'asdfasdf', '2017-03-19 22:23:42'),
(2, 1, 'asdsadsad', 'asdsad', 'asdsad', 1, '+631231231232', '(123)123-1231', 'asdasdsad@asdfsadf.com', 'sdfsasad', '2017-03-19 22:24:55'),
(3, 6, 'asdsadsad', 'asdsad', 'asdsad', 1, '+631231231232', '(123)123-1231', 'asdasdsad@asdfsadf.com', 'sdfsasad', '2017-03-19 22:25:14'),
(4, 15, 'asdsadsad', 'asdsad', 'asdsad', 1, '+631231231232', '(123)123-1231', 'asdasdsad@asdfsadf.com', 'sdfsasad', '2017-03-19 22:25:54'),
(5, 4, 'asdsadsad', 'asdsad', 'asdsad', 1, '+631231231232', '(123)123-1231', 'asdasdsad@asdfsadf.com', 'sdfsasad', '2017-03-19 22:26:06'),
(6, 5, 'asdsadsad', 'asdsad', 'asdsad', 1, '+631231231232', '(123)123-1231', 'asdasdsad@asdfsadf.com', 'sdfsasad', '2017-03-19 22:26:27'),
(7, 1, 'EMz', 'asd', 'asd', 1, '+631231231231', '(123)123-1232', 'asdasd@asdfasdf.com', 'asdsad', '2017-03-19 23:52:23');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(32) NOT NULL,
  `user` int(32) NOT NULL,
  `date_time` datetime NOT NULL,
  `type` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(32) NOT NULL,
  `isLogin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log_type`
--

CREATE TABLE `log_type` (
  `id` int(8) NOT NULL,
  `description` varchar(32) NOT NULL,
  `message` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(64) NOT NULL,
  `user` int(32) NOT NULL,
  `target_user` int(32) NOT NULL,
  `content` text NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `id` int(8) NOT NULL,
  `description` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id`, `description`) VALUES
(1, 'NCR');

-- --------------------------------------------------------

--
-- Table structure for table `town`
--

CREATE TABLE `town` (
  `id` int(8) NOT NULL,
  `description` varchar(32) NOT NULL,
  `city` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `town`
--

INSERT INTO `town` (`id`, `description`, `city`) VALUES
(1, 'Napico', 1),
(3, 'Paco', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(32) NOT NULL,
  `employee_id` varchar(32) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `birth_date` date NOT NULL,
  `gender` varchar(1) NOT NULL,
  `city` int(8) NOT NULL,
  `street_address` varchar(128) NOT NULL,
  `cellphone_number` varchar(32) NOT NULL,
  `telephone_number` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registration_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_type` int(8) NOT NULL,
  `branch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `employee_id`, `firstname`, `lastname`, `birth_date`, `gender`, `city`, `street_address`, `cellphone_number`, `telephone_number`, `email`, `username`, `password`, `registration_date`, `user_type`, `branch`) VALUES
(4, '1', 'Emmanuel', 'Benitez', '2017-03-08', 'm', 1, 'sadsadsda', '+632131231232', '(123)123-2131', 'emmanuel@gmail.com', 'emz', '$2y$10$UfGif9iBSvsi7xrHR7oVRurUW1Z2z2JRHrqphX8dwVKy7ybZZOtda', '2017-03-07 20:05:04', 1, 0),
(5, '2', 'Emmanuel', 'Benz', '2017-03-07', 'm', 1, 'test', '+631231232132', '(123)123-2131', 'asdfsadf@gmail.com', 'manager', '$2y$10$VBFO.bTqhmuCH9.9I1HHoefXWQ3cGGGNrIaQdU8l90KVQqBaVQc4i', '2017-03-08 08:40:29', 2, 0),
(6, '4', 'employee1', 'employee1', '2017-03-16', 'm', 1, '', '', '', 'hello@test.com', 'employee1', '$2y$10$V0c/ydGui8t8E/E01rD23OWyjjdEkdMewUK2pMkvQ7KUO/S1tAWhm', '2017-03-11 00:01:40', 5, 0),
(7, '5', '123123', 'employee2', '2017-03-08', 'm', 1, 'test Street Address', '', '', 'asdsad@sdafsadfafsd.asdfsadf', 'employee2', '$2y$10$UquNRZOEEIH1nIGKBKzMauD2R830Csucrtmad.ojSUkRyf9oNPGIC', '2017-03-11 00:02:24', 5, 0),
(9, '', 'asd', 'asd', '2017-03-09', 'f', 1, 'sad', '', '', 'asd@asdfasdf.com', 'asdasd', '$2y$10$mGSmaidHlMgweqnR4n09Fuz53V8HF.PBW7oPsBpllvgu5qjWqxm3K', '2017-03-19 12:19:46', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(8) NOT NULL,
  `num` int(8) NOT NULL,
  `description` varchar(32) NOT NULL,
  `level` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `num`, `description`, `level`) VALUES
(1, 1, 'Administrator', 4),
(2, 2, 'Manager', 3),
(3, 3, 'Branch Manager', 2),
(5, 4, 'Project Owner', 1);

-- --------------------------------------------------------

--
-- Table structure for table `view_center`
--

CREATE TABLE `view_center` (
  `id` int(32) NOT NULL,
  `center` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `view_message`
--

CREATE TABLE `view_message` (
  `id` int(64) NOT NULL,
  `message` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `workstation`
--

CREATE TABLE `workstation` (
  `id` int(32) NOT NULL,
  `center` int(8) NOT NULL,
  `square_meter` double NOT NULL,
  `isOccupied` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `workstation`
--

INSERT INTO `workstation` (`id`, `center`, `square_meter`, `isOccupied`) VALUES
(1, 23, 10, 0),
(2, 23, 0.1, 0),
(3, 23, 1, 0),
(4, 24, 1, 0),
(5, 24, 12, 0),
(6, 26, 13, 0),
(7, 26, 1, 0),
(8, 26, 2, 0),
(9, 26, 3, 0),
(10, 26, 4, 0),
(11, 26, 5, 0),
(12, 26, 6, 0),
(13, 26, 7, 0),
(14, 26, 8, 0),
(15, 26, 9, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agreement_type`
--
ALTER TABLE `agreement_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cancel_reason`
--
ALTER TABLE `cancel_reason`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `center`
--
ALTER TABLE `center`
  ADD PRIMARY KEY (`id`),
  ADD KEY `location` (`city`,`status`,`growth_type`,`agreement_type`,`commercial_term`,`center_type`,`cancel_reason`),
  ADD KEY `status` (`status`),
  ADD KEY `cancel_reason` (`cancel_reason`),
  ADD KEY `commercial_term` (`commercial_term`),
  ADD KEY `agreement_type` (`agreement_type`),
  ADD KEY `growth_type` (`growth_type`),
  ADD KEY `center_type` (`center_type`),
  ADD KEY `location_2` (`city`),
  ADD KEY `project_owner` (`project_owner`);

--
-- Indexes for table `center_follow`
--
ALTER TABLE `center_follow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`),
  ADD KEY `center` (`center`);

--
-- Indexes for table `center_image`
--
ALTER TABLE `center_image`
  ADD KEY `center` (`center`);

--
-- Indexes for table `center_status`
--
ALTER TABLE `center_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `center_type`
--
ALTER TABLE `center_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `region` (`region`);

--
-- Indexes for table `commercial_term`
--
ALTER TABLE `commercial_term`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `growth_type`
--
ALTER TABLE `growth_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquire`
--
ALTER TABLE `inquire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_type`
--
ALTER TABLE `log_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `target_user` (`user`),
  ADD KEY `target_user_2` (`target_user`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `town`
--
ALTER TABLE `town`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city` (`city`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_type` (`user_type`),
  ADD KEY `town` (`city`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `view_center`
--
ALTER TABLE `view_center`
  ADD PRIMARY KEY (`id`),
  ADD KEY `center` (`center`);

--
-- Indexes for table `view_message`
--
ALTER TABLE `view_message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `message` (`message`);

--
-- Indexes for table `workstation`
--
ALTER TABLE `workstation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `center` (`center`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agreement_type`
--
ALTER TABLE `agreement_type`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cancel_reason`
--
ALTER TABLE `cancel_reason`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `center`
--
ALTER TABLE `center`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `center_follow`
--
ALTER TABLE `center_follow`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `center_status`
--
ALTER TABLE `center_status`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `center_type`
--
ALTER TABLE `center_type`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `commercial_term`
--
ALTER TABLE `commercial_term`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `growth_type`
--
ALTER TABLE `growth_type`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `inquire`
--
ALTER TABLE `inquire`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `log_type`
--
ALTER TABLE `log_type`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `town`
--
ALTER TABLE `town`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `workstation`
--
ALTER TABLE `workstation`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `center`
--
ALTER TABLE `center`
  ADD CONSTRAINT `center_ibfk_1` FOREIGN KEY (`project_owner`) REFERENCES `user` (`id`);

--
-- Constraints for table `center_follow`
--
ALTER TABLE `center_follow`
  ADD CONSTRAINT `center_follow_ibfk_1` FOREIGN KEY (`center`) REFERENCES `center` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `center_follow_ibfk_2` FOREIGN KEY (`user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `center_image`
--
ALTER TABLE `center_image`
  ADD CONSTRAINT `center_image_ibfk_1` FOREIGN KEY (`center`) REFERENCES `center` (`id`);

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`region`) REFERENCES `region` (`id`);

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `log_ibfk_2` FOREIGN KEY (`type`) REFERENCES `log_type` (`id`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`id`) REFERENCES `log` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`target_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `town`
--
ALTER TABLE `town`
  ADD CONSTRAINT `town_ibfk_1` FOREIGN KEY (`city`) REFERENCES `city` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_4` FOREIGN KEY (`user_type`) REFERENCES `user_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_ibfk_6` FOREIGN KEY (`city`) REFERENCES `city` (`id`);

--
-- Constraints for table `view_center`
--
ALTER TABLE `view_center`
  ADD CONSTRAINT `view_center_ibfk_1` FOREIGN KEY (`id`) REFERENCES `log` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `view_center_ibfk_2` FOREIGN KEY (`center`) REFERENCES `center` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `view_message`
--
ALTER TABLE `view_message`
  ADD CONSTRAINT `view_message_ibfk_1` FOREIGN KEY (`id`) REFERENCES `log` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `view_message_ibfk_2` FOREIGN KEY (`message`) REFERENCES `message` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `workstation`
--
ALTER TABLE `workstation`
  ADD CONSTRAINT `workstation_ibfk_1` FOREIGN KEY (`center`) REFERENCES `center` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
