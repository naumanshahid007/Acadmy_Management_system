-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2019 at 05:55 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ams`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign_teacher`
--

CREATE TABLE `assign_teacher` (
  `assign_teacher_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `delete_status` int(11) NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_teacher`
--

INSERT INTO `assign_teacher` (`assign_teacher_id`, `teacher_id`, `class_id`, `group_id`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 6, 1, 17, 1, 0, 0, '2019-01-31 05:47:29', '0000-00-00 00:00:00'),
(2, 5, 2, 18, 1, 0, 0, '2019-01-31 06:05:10', '0000-00-00 00:00:00'),
(3, 8, 11, 18, 1, 0, 0, '2019-01-31 08:58:48', '0000-00-00 00:00:00'),
(4, 9, 2, 22, 1, 0, 0, '2019-02-27 08:38:52', '0000-00-00 00:00:00'),
(5, 8, 1, 20, 1, 0, 0, '2019-03-05 07:31:46', '0000-00-00 00:00:00'),
(6, 6, 1, 20, 1, 0, 0, '2019-03-05 07:32:16', '0000-00-00 00:00:00'),
(7, 6, 1, 19, 1, 0, 0, '2019-03-05 07:33:37', '0000-00-00 00:00:00'),
(8, 6, 1, 19, 1, 0, 0, '2019-03-05 07:34:18', '0000-00-00 00:00:00'),
(9, 6, 1, 19, 1, 0, 0, '2019-03-05 07:35:03', '0000-00-00 00:00:00'),
(10, 6, 1, 20, 1, 0, 0, '2019-03-05 07:35:11', '0000-00-00 00:00:00'),
(11, 6, 1, 21, 1, 0, 0, '2019-03-05 07:37:28', '0000-00-00 00:00:00'),
(12, 9, 1, 23, 1, 0, 0, '2019-03-11 11:24:19', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `branch_id` int(11) NOT NULL,
  `institute_id` int(111) NOT NULL,
  `branch_name` varchar(111) NOT NULL,
  `branch_code` varchar(111) NOT NULL,
  `branch_location` varchar(111) NOT NULL,
  `branch_contact_no` varchar(111) NOT NULL,
  `branch_email` varchar(111) NOT NULL,
  `branch_status` enum('Active','Inactive') NOT NULL,
  `branch_head_name` varchar(111) NOT NULL,
  `branch_head_contact_no` varchar(111) NOT NULL,
  `branch_head_email` varchar(111) NOT NULL,
  `delete_status` int(11) NOT NULL DEFAULT '1',
  `created_by` int(111) NOT NULL,
  `updated_by` int(111) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`branch_id`, `institute_id`, `branch_name`, `branch_code`, `branch_location`, `branch_contact_no`, `branch_email`, `branch_status`, `branch_head_name`, `branch_head_contact_no`, `branch_head_email`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'gulshin', '068', 'Gulshin Iqbal', '+92(300)-6999824', 'saif@gmail.com', 'Active', 'sir faraz', '+92(300)-6999824', 'farazahmad@gmail.com', 1, 2, 2, '2019-02-27 07:55:34', '0000-00-00 00:00:00'),
(2, 1, 'Khanpur', '025', 'Khanpur Model Town', '0333-5869507', 'branch@gmail.com', 'Active', 'Nauman', '0333-5522480', 'head@gmail.com', 0, 0, 0, '2019-01-26 06:29:36', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `class_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `class_name` varchar(111) NOT NULL,
  `class_description` varchar(111) NOT NULL,
  `delete_status` int(111) DEFAULT '1',
  `created_by` int(111) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class_id`, `branch_id`, `class_name`, `class_description`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'ICS (Part - I)', ' Intermediate ICS (Part - I)', 1, 1, 1, '2019-01-25 10:43:35', '0000-00-00 00:00:00'),
(2, 1, 'ICS (Part - II)', '  Intermediate ICS (Part - II)', 1, 1, 1, '2019-01-26 06:28:13', '0000-00-00 00:00:00'),
(11, 1, 'BSC part - I', '  BSC', 1, 1, 1, '2019-01-26 06:28:17', '0000-00-00 00:00:00'),
(12, 1, 'FSC Pre-Medical (Part - 1)', ' FSC (pre medical) 1', 1, 1, 1, '2019-01-26 06:28:22', '0000-00-00 00:00:00'),
(13, 1, 'FSC Pre-Medical (Part - 2)', '  fsc - 2', 0, 1, 1, '2019-02-27 08:03:23', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fee_transaction_details`
--

CREATE TABLE `fee_transaction_details` (
  `fee_transaction_detail_id` int(11) NOT NULL,
  `fee_transaction_head_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `fee` int(11) NOT NULL,
  `delete_status` int(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fee_transaction_head`
--

CREATE TABLE `fee_transaction_head` (
  `fee_transaction_head_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `std_name` varchar(30) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `paid_amount` int(11) NOT NULL,
  `remaining_amount` int(11) NOT NULL,
  `month` int(2) NOT NULL,
  `delete_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee_transaction_head`
--

INSERT INTO `fee_transaction_head` (`fee_transaction_head_id`, `std_id`, `std_name`, `total_amount`, `paid_amount`, `remaining_amount`, `month`, `delete_status`) VALUES
(1, 115, 'Shahzad', 4590, 4000, 590, 0, 1),
(2, 115, 'shahzad', 4590, 4300, 290, 0, 1),
(3, 115, 'Shahzad Saeed', 4880, 1600, 3280, 1, 1),
(4, 115, 'Shahzad Saeed', 7870, 7500, 370, 1, 1),
(5, 115, 'Shahzad Saeed', 1960, 1600, 360, 2, 1),
(6, 115, 'Shahzad Saeed', 1950, 200, 1750, 3, 1),
(8, 115, 'Shahzad Saeed', 1750, 1750, 0, 4, 1),
(9, 116, 'Saif', 4700, 4700, 0, 1, 1),
(10, 116, 'Saif', 2700, 2700, 0, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `group_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `group_name` varchar(111) NOT NULL,
  `group_type` enum('Morning','Evening') NOT NULL,
  `group_time` text NOT NULL,
  `group_start_date` date NOT NULL,
  `group_end_date` date NOT NULL,
  `group_description` varchar(111) NOT NULL,
  `group_info` varchar(100) NOT NULL,
  `group_status` varchar(10) NOT NULL,
  `assign_status` int(11) NOT NULL DEFAULT '0',
  `delete_status` int(111) NOT NULL DEFAULT '1',
  `created_by` int(111) NOT NULL,
  `updated_by` int(111) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `subject_id`, `group_name`, `group_type`, `group_time`, `group_start_date`, `group_end_date`, `group_description`, `group_info`, `group_status`, `assign_status`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(17, 9, 'Girls', 'Evening', '15:00', '2019-01-31', '2019-02-28', 'girls group', 'Physics - I - Girls - 03:PM', 'Active', 1, 1, 1, 0, '2019-03-05 07:00:15', '0000-00-00 00:00:00'),
(18, 8, 'Girls', 'Evening', '16:00', '2019-01-31', '2019-03-31', 'girls group 2', 'Introduction to Computer - Girls - 04:PM', 'Active', 1, 1, 1, 0, '2019-03-05 07:00:25', '0000-00-00 00:00:00'),
(19, 9, 'Boys', 'Evening', '17:00', '2019-02-20', '2019-03-28', 'boys group', 'Physics - I - Boys - 05:PM', 'Active', 1, 1, 1, 0, '2019-03-05 07:35:03', '0000-00-00 00:00:00'),
(20, 8, 'Boys', 'Evening', '18:00', '2019-01-31', '2019-02-28', 'boys', 'Introduction to Computer - Boys - 06:PM', 'Active', 1, 1, 1, 0, '2019-03-05 07:35:11', '0000-00-00 00:00:00'),
(21, 9, 'Boys', 'Evening', '16:00', '2019-01-30', '2019-02-23', 'boys 3', 'Physics - I - Boys - 01:AM', 'Active', 1, 1, 1, 0, '2019-03-05 07:37:28', '0000-00-00 00:00:00'),
(22, 10, 'Girls', 'Evening', '18:00', '2019-01-31', '2019-02-23', 'mklmkkk', 'Maths (Trigonometry) - Girls - 06:PM', 'Active', 1, 1, 1, 0, '2019-03-05 07:00:32', '0000-00-00 00:00:00'),
(23, 10, 'Girls', 'Morning', '05:30', '2019-03-01', '2019-04-30', 'Math', 'Maths (Trigonometry) - Girls (morning)- 05:AM', 'Active', 1, 1, 1, 0, '2019-03-11 11:24:19', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `institutes`
--

CREATE TABLE `institutes` (
  `institute_id` int(11) NOT NULL,
  `institute_name` varchar(111) NOT NULL,
  `institute_description` varchar(111) NOT NULL,
  `institute_location` varchar(111) NOT NULL,
  `institute_picture` varchar(111) NOT NULL,
  `institute_account_no` varchar(111) NOT NULL,
  `delete_status` int(111) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(111) NOT NULL,
  `updated_by` int(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `institutes`
--

INSERT INTO `institutes` (`institute_id`, `institute_name`, `institute_description`, `institute_location`, `institute_picture`, `institute_account_no`, `delete_status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'DexDEVS', 'GUlshin iqbal Rahim yar khan', 'GUlshin iqbal Rahim yar khan', 'uploads/Chrysanthemum.jpg', '311200455631', 1, '2019-01-24 16:42:05', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `manage_admin`
--

CREATE TABLE `manage_admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(111) NOT NULL,
  `password` varchar(111) NOT NULL,
  `email` varchar(111) NOT NULL,
  `picture` varchar(111) NOT NULL,
  `contact` varchar(111) NOT NULL,
  `delete_status` int(111) NOT NULL DEFAULT '1',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(111) NOT NULL,
  `created_by` int(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manage_admin`
--

INSERT INTO `manage_admin` (`admin_id`, `username`, `password`, `email`, `picture`, `contact`, `delete_status`, `updated_at`, `created_at`, `updated_by`, `created_by`) VALUES
(1, 'saif', '21232f297a57a5a743894a0e4a801fc3', 'saifarshad.6987@gmail.com', 'uploads/48390604_2110319835949361_3990755995079933952_n.jpg', '+92(308)-3152014', 1, '2019-01-15 17:38:56', '0000-00-00 00:00:00', 0, 0),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'saifarshad.6987@gmail.com', 'uploads/5a7b3ba99d47d46e5caab794a6b17729--tulips-flowers-photo-effects.jpg', '+92(308)-3152045', 1, '2019-01-14 19:10:21', '0000-00-00 00:00:00', 0, 0),
(6, 'Noman Sir', 'saif', 'saif123@gmail.com', 'uploads/images (3).jpg', '+78(965)-4123002', 1, '2019-01-15 17:38:03', '0000-00-00 00:00:00', 0, 0),
(7, 'Noman Sir', 'saif', 'anasshafqat01@gmail.com', 'uploads/download.jpg', '+78(456)-1230784', 1, '2019-01-15 17:38:49', '0000-00-00 00:00:00', 0, 0),
(8, 'Noman', 'saif', 'saifarshad.6987@gmail.com', 'uploads/images (3).jpg', '+78(965)-4789654', 1, '2019-01-15 17:39:02', '0000-00-00 00:00:00', 0, 0),
(9, 'saifarshad.6987@gmail.com', 'adkfj', 'msaifrehman897@gmail.com', 'uploads/images (7).jpg', '+78(965)-4123333', 1, '2019-01-15 07:52:49', '0000-00-00 00:00:00', 0, 0),
(10, 'Noman Sir', 'saif', 'saifalksdj@gmail.com', 'uploads/images (1).jpg', '+92(308)-3152045', 1, '2019-01-15 17:39:07', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `std_enrollment_details`
--

CREATE TABLE `std_enrollment_details` (
  `std_enrollment_details_id` int(11) NOT NULL,
  `std_enrollment_head_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `std_name` varchar(30) NOT NULL,
  `delete_status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `update_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `std_enrollment_details`
--

INSERT INTO `std_enrollment_details` (`std_enrollment_details_id`, `std_enrollment_head_id`, `std_id`, `std_name`, `delete_status`, `created_at`, `updated_at`, `created_by`, `update_by`) VALUES
(34, 26, 97, 'Muhammad Saif Ur Rehman', 1, '2019-03-06 08:30:59', '0000-00-00 00:00:00', 1, 0),
(36, 26, 76, 'Muhammad Saif Ur Rehman', 1, '2019-03-06 08:31:36', '0000-00-00 00:00:00', 1, 0),
(37, 26, 76, 'Muhammad Saif Ur Rehman', 1, '2019-03-06 08:31:58', '0000-00-00 00:00:00', 1, 0),
(38, 26, 76, 'Muhammad Saif Ur Rehman', 1, '2019-03-06 08:37:10', '0000-00-00 00:00:00', 1, 0),
(39, 26, 97, 'Muhammad Saif Ur Rehman', 1, '2019-03-06 08:37:10', '0000-00-00 00:00:00', 1, 0),
(41, 26, 76, 'Muhammad Saif Ur Rehman', 1, '2019-03-06 08:39:01', '0000-00-00 00:00:00', 1, 0),
(42, 26, 97, 'Muhammad Saif Ur Rehman', 1, '2019-03-06 08:39:02', '0000-00-00 00:00:00', 1, 0),
(44, 26, 76, 'Muhammad Saif Ur Rehman', 1, '2019-03-06 08:41:14', '0000-00-00 00:00:00', 1, 0),
(45, 26, 97, 'Muhammad Saif Ur Rehman', 1, '2019-03-06 08:41:14', '0000-00-00 00:00:00', 1, 0),
(50, 26, 76, 'Muhammad Saif Ur Rehman', 1, '2019-03-06 08:42:39', '0000-00-00 00:00:00', 1, 0),
(51, 26, 97, 'Muhammad Saif Ur Rehman', 1, '2019-03-06 08:42:39', '0000-00-00 00:00:00', 1, 0),
(53, 26, 76, 'Muhammad Saif Ur Rehman', 1, '2019-03-06 08:43:00', '0000-00-00 00:00:00', 1, 0),
(54, 26, 97, 'Muhammad Saif Ur Rehman', 1, '2019-03-06 08:43:00', '0000-00-00 00:00:00', 1, 0),
(56, 26, 76, 'Muhammad Saif Ur Rehman', 1, '2019-03-06 08:46:41', '0000-00-00 00:00:00', 1, 0),
(57, 26, 97, 'Muhammad Saif Ur Rehman', 1, '2019-03-06 08:46:41', '0000-00-00 00:00:00', 1, 0),
(58, 26, 102, 'Saif ', 1, '2019-03-06 08:46:41', '0000-00-00 00:00:00', 1, 0),
(59, 26, 76, 'Muhammad Saif Ur Rehman', 1, '2019-03-06 08:48:05', '0000-00-00 00:00:00', 1, 0),
(60, 26, 97, 'Muhammad Saif Ur Rehman', 1, '2019-03-06 08:48:05', '0000-00-00 00:00:00', 1, 0),
(61, 26, 102, 'Saif ', 1, '2019-03-06 08:48:05', '0000-00-00 00:00:00', 1, 0),
(62, 27, 76, 'Muhammad Saif Ur Rehman', 1, '2019-03-06 13:53:25', '0000-00-00 00:00:00', 1, 0),
(63, 27, 97, 'Muhammad Saif Ur Rehman', 1, '2019-03-06 13:53:25', '0000-00-00 00:00:00', 1, 0),
(64, 27, 102, 'Saif ', 1, '2019-03-06 13:53:25', '0000-00-00 00:00:00', 1, 0),
(66, 28, 97, 'Muhammad Saif Ur Rehman', 1, '2019-03-06 17:37:43', '0000-00-00 00:00:00', 1, 0),
(68, 29, 76, 'Muhammad Saif Ur Rehman', 1, '2019-03-06 17:54:55', '0000-00-00 00:00:00', 1, 0),
(71, 29, 97, 'Muhammad Saif Ur Rehman', 1, '2019-03-07 12:18:35', '0000-00-00 00:00:00', 0, 0),
(72, 29, 97, 'Muhammad Saif Ur Rehman', 1, '2019-03-07 12:19:22', '0000-00-00 00:00:00', 0, 0),
(73, 29, 97, 'Muhammad Saif Ur Rehman', 1, '2019-03-07 12:20:55', '0000-00-00 00:00:00', 0, 0),
(74, 29, 97, 'Muhammad Saif Ur Rehman', 1, '2019-03-07 12:23:56', '0000-00-00 00:00:00', 0, 0),
(75, 29, 97, 'Muhammad Saif Ur Rehman', 1, '2019-03-07 12:24:03', '0000-00-00 00:00:00', 0, 0),
(76, 30, 102, 'Saif ', 1, '2019-03-07 12:25:49', '0000-00-00 00:00:00', 1, 0),
(78, 28, 76, 'Muhammad Saif Ur Rehman', 1, '2019-03-07 14:22:54', '0000-00-00 00:00:00', 0, 0),
(79, 28, 102, 'Saif ', 1, '2019-03-07 14:22:54', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `std_enrollment_head`
--

CREATE TABLE `std_enrollment_head` (
  `std_enrollment_head_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `group_info` varchar(60) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `delete_status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `update_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `std_enrollment_head`
--

INSERT INTO `std_enrollment_head` (`std_enrollment_head_id`, `group_id`, `group_info`, `subject_id`, `delete_status`, `created_at`, `updated_at`, `created_by`, `update_by`) VALUES
(25, 21, 'Physics - I - Boys - 01:AM', 9, 1, '2019-03-11 07:58:49', '0000-00-00 00:00:00', 1, 0),
(26, 21, 'Physics - I - Boys - 01:AM', 9, 1, '2019-03-11 07:58:42', '0000-00-00 00:00:00', 1, 0),
(27, 21, 'Physics - I - Boys - 01:AM', 9, 1, '2019-03-06 13:53:25', '0000-00-00 00:00:00', 1, 0),
(28, 17, 'Physics - I - Girls - 03:PM', 9, 1, '2019-03-06 17:37:43', '0000-00-00 00:00:00', 1, 0),
(29, 19, 'Physics - I - Boys - 05:PM', 9, 1, '2019-03-06 17:54:55', '0000-00-00 00:00:00', 1, 0),
(30, 17, 'Physics - I - Girls - 03:PM', 9, 1, '2019-03-11 06:32:29', '0000-00-00 00:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `std_fee_details`
--

CREATE TABLE `std_fee_details` (
  `std_fee_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `std_monthly_fee` int(11) NOT NULL,
  `discount_monthly_fee` int(11) NOT NULL,
  `delete_status` int(1) NOT NULL DEFAULT '1',
  `net_total` int(11) NOT NULL,
  `enroll_status` int(11) NOT NULL DEFAULT '0',
  `month_duration` int(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `std_fee_details`
--

INSERT INTO `std_fee_details` (`std_fee_id`, `std_id`, `subject_id`, `std_monthly_fee`, `discount_monthly_fee`, `delete_status`, `net_total`, `enroll_status`, `month_duration`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(109, 76, 9, 800, 100, 1, 700, 1, 0, '2019-03-07 14:22:54', 0, '0000-00-00 00:00:00', 0),
(112, 97, 9, 800, 0, 1, 800, 1, 0, '2019-03-07 12:23:56', 0, '0000-00-00 00:00:00', 0),
(117, 102, 9, 800, 0, 1, 800, 1, 0, '2019-03-07 14:22:54', 0, '0000-00-00 00:00:00', 0),
(118, 97, 9, 800, 0, 0, 800, 0, 0, '2019-03-07 12:25:35', 0, '0000-00-00 00:00:00', 0),
(119, 97, 12, 1000, 0, 1, 0, 0, 0, '2019-03-11 06:01:15', 0, '0000-00-00 00:00:00', 0),
(120, 103, 12, 2000, 0, 2, 0, 0, 0, '2019-03-11 06:32:59', 0, '0000-00-00 00:00:00', 0),
(121, 103, 8, 1000, 100, 1, 900, 0, 0, '2019-03-11 06:23:42', 0, '0000-00-00 00:00:00', 0),
(122, 103, 9, 800, 100, 1, 700, 0, 0, '2019-03-11 06:23:42', 0, '0000-00-00 00:00:00', 0),
(123, 103, 10, 1200, 0, 1, 1200, 0, 0, '2019-03-11 06:29:46', 0, '0000-00-00 00:00:00', 0),
(124, 104, 12, 3000, 0, 2, 0, 0, 0, '2019-03-11 06:37:07', 0, '0000-00-00 00:00:00', 0),
(125, 104, 8, 1000, 100, 1, 900, 0, 0, '2019-03-11 06:37:07', 0, '0000-00-00 00:00:00', 0),
(126, 104, 9, 800, 100, 1, 700, 0, 0, '2019-03-11 06:37:07', 0, '0000-00-00 00:00:00', 0),
(127, 105, 12, 4000, 0, 2, 0, 0, 0, '2019-03-11 06:41:20', 0, '0000-00-00 00:00:00', 0),
(128, 105, 9, 800, 100, 0, 700, 0, 0, '2019-03-11 07:04:57', 0, '0000-00-00 00:00:00', 0),
(129, 105, 8, 1000, 100, 1, 900, 0, 0, '2019-03-11 06:41:20', 0, '0000-00-00 00:00:00', 0),
(130, 104, 11, 1000, 0, 0, 1000, 0, 0, '2019-03-11 07:11:59', 0, '0000-00-00 00:00:00', 0),
(131, 106, 12, 0, 0, 2, 0, 0, 0, '2019-03-11 15:08:00', 0, '0000-00-00 00:00:00', 0),
(132, 76, 8, 1000, 0, 1, 1000, 0, 0, '2019-03-12 10:50:01', 0, '0000-00-00 00:00:00', 0),
(133, 107, 12, 0, 0, 2, 0, 0, 0, '2019-03-13 14:08:39', 0, '0000-00-00 00:00:00', 0),
(134, 107, 8, 1000, 100, 1, 900, 0, 0, '2019-03-13 14:08:39', 0, '0000-00-00 00:00:00', 0),
(135, 108, 12, 2000, 0, 2, 2000, 0, 0, '2019-03-13 14:24:27', 0, '0000-00-00 00:00:00', 0),
(136, 108, 8, 1000, 0, 1, 1000, 0, 0, '2019-03-13 14:24:27', 0, '0000-00-00 00:00:00', 0),
(137, 108, 9, 800, 100, 1, 700, 0, 0, '2019-03-13 14:24:27', 0, '0000-00-00 00:00:00', 0),
(138, 109, 12, 0, 0, 2, 0, 0, 0, '2019-03-13 14:25:53', 0, '0000-00-00 00:00:00', 0),
(139, 109, 8, 1000, 1, 1, 999, 0, 0, '2019-03-13 14:25:53', 0, '0000-00-00 00:00:00', 0),
(140, 109, 9, 800, 100, 1, 700, 0, 0, '2019-03-13 14:25:53', 0, '0000-00-00 00:00:00', 0),
(141, 110, 12, 2000, 0, 2, 2000, 0, 0, '2019-03-13 14:28:48', 0, '0000-00-00 00:00:00', 0),
(142, 110, 8, 1000, 1, 1, 999, 0, 0, '2019-03-13 14:28:48', 0, '0000-00-00 00:00:00', 0),
(143, 110, 10, 1200, 100, 1, 1100, 0, 0, '2019-03-13 14:28:48', 0, '0000-00-00 00:00:00', 0),
(144, 111, 12, 2000, 0, 2, 2000, 0, 0, '2019-03-13 17:22:29', 0, '0000-00-00 00:00:00', 0),
(145, 111, 8, 1000, 1, 1, 999, 0, 2, '2019-03-13 17:22:29', 0, '0000-00-00 00:00:00', 0),
(146, 111, 10, 1200, 100, 1, 1100, 0, 2, '2019-03-13 17:22:29', 0, '0000-00-00 00:00:00', 0),
(147, 111, 10, 1200, 100, 1, 1100, 0, 5, '2019-03-13 17:22:29', 0, '0000-00-00 00:00:00', 0),
(148, 112, 12, 4000, 0, 2, 4000, 0, 0, '2019-03-15 17:29:31', 0, '0000-00-00 00:00:00', 0),
(149, 112, 8, 1000, 100, 1, 900, 0, 3, '2019-03-15 17:29:31', 0, '0000-00-00 00:00:00', 0),
(150, 112, 9, 800, 0, 1, 800, 0, 5, '2019-03-15 17:29:31', 0, '0000-00-00 00:00:00', 0),
(151, 112, 10, 1200, 100, 1, 1100, 0, 5, '2019-03-15 17:29:31', 0, '0000-00-00 00:00:00', 0),
(152, 112, 11, 1000, 100, 1, 900, 0, 3, '2019-03-15 17:32:52', 0, '0000-00-00 00:00:00', 0),
(153, 113, 12, 0, 0, 2, 0, 0, 1, '2019-03-15 17:56:08', 0, '0000-00-00 00:00:00', 0),
(154, 114, 12, 0, 0, 2, 0, 0, 1, '2019-03-15 17:56:09', 0, '0000-00-00 00:00:00', 0),
(155, 115, 12, 3000, 0, 2, 3000, 0, 1, '2019-03-15 17:57:05', 0, '0000-00-00 00:00:00', 0),
(156, 115, 9, 800, 10, 1, 790, 0, 3, '2019-03-15 17:57:06', 0, '0000-00-00 00:00:00', 0),
(157, 115, 9, 800, 0, 1, 800, 0, 3, '2019-03-15 17:57:06', 0, '0000-00-00 00:00:00', 0),
(158, 116, 12, 2000, 0, 2, 2000, 0, 1, '2019-03-18 04:43:28', 0, '0000-00-00 00:00:00', 0),
(159, 116, 9, 800, 100, 1, 700, 0, 3, '2019-03-18 04:43:28', 0, '0000-00-00 00:00:00', 0),
(160, 116, 11, 1000, 100, 1, 900, 0, 3, '2019-03-18 04:43:28', 0, '0000-00-00 00:00:00', 0),
(161, 116, 10, 1200, 100, 1, 1100, 0, 3, '2019-03-18 04:43:28', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_personal_information`
--

CREATE TABLE `student_personal_information` (
  `std_id` int(11) NOT NULL,
  `std_name` varchar(32) NOT NULL,
  `std_contact_no` varchar(15) NOT NULL,
  `std_father_name` varchar(32) NOT NULL,
  `std_father_contact_no` varchar(15) NOT NULL,
  `std_gender` enum('Male','Female') NOT NULL,
  `std_email` varchar(32) NOT NULL,
  `std_picture` varchar(111) NOT NULL,
  `std_address` varchar(111) NOT NULL,
  `std_district` varchar(15) NOT NULL,
  `std_tehseel` varchar(15) NOT NULL,
  `std_religion` varchar(10) NOT NULL,
  `std_cnic` varchar(15) NOT NULL,
  `delete_status` int(111) NOT NULL DEFAULT '1',
  `created_by` int(111) NOT NULL,
  `updated_by` int(111) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_personal_information`
--

INSERT INTO `student_personal_information` (`std_id`, `std_name`, `std_contact_no`, `std_father_name`, `std_father_contact_no`, `std_gender`, `std_email`, `std_picture`, `std_address`, `std_district`, `std_tehseel`, `std_religion`, `std_cnic`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(113, 'Shahzad', '+32(321)-321213', 'abc', '+32(132)-132132', 'Male', 'shahzad@gmail.com', '', 'RahimYar khan', 'Rahim Yar Khan', 'Rahim Yar Khan', '', '', 1, 0, 0, '2019-03-15 17:56:08', '0000-00-00 00:00:00'),
(114, 'Shahzad', '+32(321)-321213', 'abc', '+32(132)-132132', 'Male', 'shahzad@gmail.com', '', 'RahimYar khan', 'Rahim Yar Khan', 'Rahim Yar Khan', '', '', 1, 0, 0, '2019-03-15 17:56:08', '0000-00-00 00:00:00'),
(115, 'Shahzad Saeed', '+32(321)-321213', 'abc', '+32(132)-132132', 'Male', 'shahzad@gmail.com', '', 'RahimYar khan', 'Rahim Yar Khan', 'Rahim Yar Khan', 'Islam', '33321-3213213-2', 1, 0, 0, '2019-03-16 17:55:31', '0000-00-00 00:00:00'),
(116, 'Saif', '+68(798)-79878_', 'saif', '+54(687)-878798', 'Female', 'shahzad@gmail.com', '', 'RahimYar khan', 'Rahim Yar Khan', 'Rahim Yar Khan', 'Islam', '54465-4564654-6', 1, 0, 0, '2019-03-18 04:43:28', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_name` varchar(111) NOT NULL,
  `subject_fee` int(111) NOT NULL,
  `subject_description` varchar(111) NOT NULL,
  `delete_status` int(111) NOT NULL DEFAULT '1',
  `created_by` int(111) NOT NULL,
  `updated_by` int(111) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `class_id`, `subject_name`, `subject_fee`, `subject_description`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(8, 1, 'Introduction to Computer', 1000, 'Computer Basics\"', 1, 1, 1, '2019-02-26 09:09:19', '0000-00-00 00:00:00'),
(9, 1, 'Physics - I', 800, 'Physics for 11 class', 1, 1, 0, '2019-02-26 09:09:26', '0000-00-00 00:00:00'),
(10, 1, 'Maths (Trigonometry)', 1200, 'Maths for 11 class', 1, 1, 0, '2019-02-26 09:09:31', '0000-00-00 00:00:00'),
(11, 1, 'Statistic', 1000, 'jhgfdxsz', 1, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 1, 'Admission', 0, 'Admission fee of student', 0, 0, 0, '2019-03-11 05:57:58', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_personal_info`
--

CREATE TABLE `teacher_personal_info` (
  `teacher_id` int(11) NOT NULL,
  `teacher_name` varchar(30) NOT NULL,
  `teacher_father_name` varchar(30) NOT NULL,
  `teacher_cnic` varchar(20) NOT NULL,
  `teacher_email` varchar(30) NOT NULL,
  `teacher_contact_no` varchar(15) NOT NULL,
  `teacher_gender` varchar(7) NOT NULL,
  `teacher_picture` varchar(200) NOT NULL,
  `teacher_permanent_address` varchar(50) NOT NULL,
  `teacher_qualification` varchar(30) NOT NULL,
  `teacher_marital_status` varchar(11) NOT NULL,
  `teacher_joining_date` date NOT NULL,
  `teacher_salary` int(11) NOT NULL,
  `delete_status` int(11) NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_personal_info`
--

INSERT INTO `teacher_personal_info` (`teacher_id`, `teacher_name`, `teacher_father_name`, `teacher_cnic`, `teacher_email`, `teacher_contact_no`, `teacher_gender`, `teacher_picture`, `teacher_permanent_address`, `teacher_qualification`, `teacher_marital_status`, `teacher_joining_date`, `teacher_salary`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(5, 'waleed', 'naeem', '31303-5869577-9', 'waleed@gmail.com', '0333-5863204', 'Male', 'uploads/Jellyfish.jpg', '             RYK                                  ', 'BSCS', 'Single', '2019-01-28', 200000, 0, 0, 0, '2019-02-21 02:15:32', '0000-00-00 00:00:00'),
(6, 'Nauman', 'Shahid', '31303-4586255-9', 'nauman@gmail.com', '0333-7486520', 'Male', 'uploads/13149990_615933705248371_981907217_n.jpg', 'RYK                    ', 'BSCS', 'Single', '2019-01-28', 20000, 1, 0, 0, '2019-02-21 02:15:08', '0000-00-00 00:00:00'),
(8, 'nadia', 'iftkgar', '31331-3133131-3', 'nadia@gmail.com', '+65(465)-654323', 'Female', 'uploads/Koala.jpg', 'cshfwhfwkjhwjhfwhw                                ', 'BSCS', 'Single', '2019-01-31', 10000, 1, 0, 0, '2019-02-27 08:38:26', '0000-00-00 00:00:00'),
(9, 'Faraz Ahmad', 'Naveed Ahmad', '31304-2076970-7', 'ranafraz@gmail.com', '+92(300)-699982', 'Male', 'uploads/download.jpg', '                Nothing    ', 'PHD', 'Single', '2019-02-27', 350000, 1, 0, 0, '2019-02-27 08:25:17', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_teacher`
--
ALTER TABLE `assign_teacher`
  ADD PRIMARY KEY (`assign_teacher_id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `subject_id` (`group_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`branch_id`),
  ADD KEY `institute_id` (`institute_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`class_id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `fee_transaction_details`
--
ALTER TABLE `fee_transaction_details`
  ADD PRIMARY KEY (`fee_transaction_detail_id`),
  ADD KEY `fee_transection_head_id` (`fee_transaction_head_id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `fee_transaction_head`
--
ALTER TABLE `fee_transaction_head`
  ADD PRIMARY KEY (`fee_transaction_head_id`),
  ADD KEY `std_id` (`std_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `institutes`
--
ALTER TABLE `institutes`
  ADD PRIMARY KEY (`institute_id`);

--
-- Indexes for table `manage_admin`
--
ALTER TABLE `manage_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `std_enrollment_details`
--
ALTER TABLE `std_enrollment_details`
  ADD PRIMARY KEY (`std_enrollment_details_id`),
  ADD KEY `std_enrollment_head_id` (`std_enrollment_head_id`),
  ADD KEY `std_id` (`std_id`);

--
-- Indexes for table `std_enrollment_head`
--
ALTER TABLE `std_enrollment_head`
  ADD PRIMARY KEY (`std_enrollment_head_id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `std_fee_details`
--
ALTER TABLE `std_fee_details`
  ADD PRIMARY KEY (`std_fee_id`),
  ADD KEY `std_id` (`std_id`,`subject_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `student_personal_information`
--
ALTER TABLE `student_personal_information`
  ADD PRIMARY KEY (`std_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `class_id_2` (`class_id`);

--
-- Indexes for table `teacher_personal_info`
--
ALTER TABLE `teacher_personal_info`
  ADD PRIMARY KEY (`teacher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign_teacher`
--
ALTER TABLE `assign_teacher`
  MODIFY `assign_teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `fee_transaction_details`
--
ALTER TABLE `fee_transaction_details`
  MODIFY `fee_transaction_detail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee_transaction_head`
--
ALTER TABLE `fee_transaction_head`
  MODIFY `fee_transaction_head_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `institutes`
--
ALTER TABLE `institutes`
  MODIFY `institute_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `manage_admin`
--
ALTER TABLE `manage_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `std_enrollment_details`
--
ALTER TABLE `std_enrollment_details`
  MODIFY `std_enrollment_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `std_enrollment_head`
--
ALTER TABLE `std_enrollment_head`
  MODIFY `std_enrollment_head_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `std_fee_details`
--
ALTER TABLE `std_fee_details`
  MODIFY `std_fee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `student_personal_information`
--
ALTER TABLE `student_personal_information`
  MODIFY `std_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `teacher_personal_info`
--
ALTER TABLE `teacher_personal_info`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assign_teacher`
--
ALTER TABLE `assign_teacher`
  ADD CONSTRAINT `assign_teacher_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `classes` (`class_id`),
  ADD CONSTRAINT `assign_teacher_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teacher_personal_info` (`teacher_id`);

--
-- Constraints for table `branches`
--
ALTER TABLE `branches`
  ADD CONSTRAINT `branches_ibfk_1` FOREIGN KEY (`institute_id`) REFERENCES `institutes` (`institute_id`);

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`branch_id`);

--
-- Constraints for table `fee_transaction_details`
--
ALTER TABLE `fee_transaction_details`
  ADD CONSTRAINT `fee_transaction_details_ibfk_1` FOREIGN KEY (`fee_transaction_head_id`) REFERENCES `fee_transaction_head` (`fee_transaction_head_id`),
  ADD CONSTRAINT `fee_transaction_details_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`),
  ADD CONSTRAINT `fee_transaction_details_ibfk_3` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`);

--
-- Constraints for table `fee_transaction_head`
--
ALTER TABLE `fee_transaction_head`
  ADD CONSTRAINT `fee_transaction_head_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `student_personal_information` (`std_id`);

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`);

--
-- Constraints for table `std_enrollment_details`
--
ALTER TABLE `std_enrollment_details`
  ADD CONSTRAINT `std_enrollment_details_ibfk_1` FOREIGN KEY (`std_enrollment_head_id`) REFERENCES `std_enrollment_head` (`std_enrollment_head_id`),
  ADD CONSTRAINT `std_enrollment_details_ibfk_2` FOREIGN KEY (`std_id`) REFERENCES `student_personal_information` (`std_id`);

--
-- Constraints for table `std_enrollment_head`
--
ALTER TABLE `std_enrollment_head`
  ADD CONSTRAINT `std_enrollment_head_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`),
  ADD CONSTRAINT `std_enrollment_head_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`);

--
-- Constraints for table `std_fee_details`
--
ALTER TABLE `std_fee_details`
  ADD CONSTRAINT `std_fee_details_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `student_personal_information` (`std_id`),
  ADD CONSTRAINT `std_fee_details_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
