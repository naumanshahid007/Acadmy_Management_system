-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2019 at 12:05 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

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
(3, 8, 11, 18, 1, 0, 0, '2019-01-31 08:58:48', '0000-00-00 00:00:00');

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
(1, 1, 'gulshin', '068', 'Gulshin Iqbal', '03006999824', 'saif@gmail.com', 'Active', 'sir faraz', '03006999824', 'farazahmad@gmail.com', 1, 2, 2, '2019-01-17 13:01:22', '0000-00-00 00:00:00'),
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
(13, 1, 'FSC Pre-Medical (Part - 2)', '  fsc - 2', 1, 1, 1, '2019-01-26 06:28:30', '0000-00-00 00:00:00');

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
  `delete_status` int(111) NOT NULL DEFAULT '1',
  `created_by` int(111) NOT NULL,
  `updated_by` int(111) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `subject_id`, `group_name`, `group_type`, `group_time`, `group_start_date`, `group_end_date`, `group_description`, `group_info`, `group_status`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(17, 9, 'Girls', 'Evening', '15:00', '2019-01-31', '2019-02-28', 'girls group', 'Physics - I - Girls - 03:PM', 'Active', 1, 1, 0, '2019-02-01 13:53:22', '0000-00-00 00:00:00'),
(18, 8, 'Girls', 'Evening', '16:00', '2019-01-31', '2019-03-31', 'girls group 2', 'Introduction to Computer - Girls - 04:PM', 'Active', 1, 1, 0, '2019-02-01 13:53:28', '0000-00-00 00:00:00'),
(19, 9, 'Boys', 'Evening', '17:00', '2019-02-20', '2019-03-28', 'boys group', 'Physics - I - Boys - 05:PM', 'Active', 1, 1, 0, '2019-02-01 13:52:44', '0000-00-00 00:00:00'),
(20, 8, 'Boys', 'Evening', '18:00', '2019-01-31', '2019-02-28', 'boys', 'Introduction to Computer - Boys - 06:PM', 'Active', 1, 1, 0, '2019-02-01 13:52:38', '0000-00-00 00:00:00'),
(21, 9, 'Boys', 'Evening', '16:00', '2019-01-30', '2019-02-23', 'boys 3', 'Physics - I - Boys - 01:AM', 'Active', 1, 1, 0, '2019-02-01 15:21:10', '0000-00-00 00:00:00'),
(22, 10, 'Girls', 'Evening', '18:00', '2019-01-31', '2019-02-23', 'mklmkkk', 'Maths (Trigonometry) - Girls - 06:PM', 'Active', 1, 1, 0, '2019-02-01 13:53:33', '0000-00-00 00:00:00');

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
-- Table structure for table `std_fee_details`
--

CREATE TABLE `std_fee_details` (
  `std_fee_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `std_registration_fee` int(11) NOT NULL,
  `std_monthly_fee` int(11) NOT NULL,
  `discount_monthly_fee` int(11) NOT NULL,
  `net_total` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students_enrollment`
--

CREATE TABLE `students_enrollment` (
  `std_enroll_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `delete_status` int(11) NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_personal_information`
--

CREATE TABLE `student_personal_information` (
  `std_id` int(11) NOT NULL,
  `std_name` varchar(111) NOT NULL,
  `std_contact_no` varchar(111) NOT NULL,
  `std_father_name` varchar(111) NOT NULL,
  `std_father_contact_no` varchar(111) NOT NULL,
  `std_gender` enum('Male','Female') NOT NULL,
  `std_email` varchar(111) NOT NULL,
  `std_picture` varchar(111) NOT NULL,
  `std_address` varchar(111) NOT NULL,
  `std_district` varchar(111) NOT NULL,
  `std_tehseel` varchar(111) NOT NULL,
  `std_religion` varchar(111) NOT NULL,
  `delete_status` int(111) NOT NULL DEFAULT '1',
  `created_by` int(111) NOT NULL,
  `updated_by` int(111) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(7, 11, 'Introduction to Computer', 500, 'Basic of computer\"\"\"', 0, 1, 1, '2019-01-25 11:41:33', '0000-00-00 00:00:00'),
(8, 1, 'Introduction to Computer', 500, 'Computer Basics\"', 1, 1, 1, '2019-01-25 11:42:23', '0000-00-00 00:00:00'),
(9, 1, 'Physics - I', 700, 'Physics for 11 class', 1, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 1, 'Maths (Trigonometry)', 700, 'Maths for 11 class', 1, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 1, 'Introduction to Computer', 500, 'Intermediate ICS part - I', 0, 1, 0, '2019-01-28 14:15:18', '0000-00-00 00:00:00');

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
(5, 'waleed', 'naeem', '31303-5869577-9', 'waleed@gmail.com', '0333-5863204', 'Male', 'uploads/Jellyfish.jpg', '             RYK                                  ', 'BSCS', 'Single', '2019-01-28', 200000, 1, 0, 0, '2019-01-31 06:04:52', '0000-00-00 00:00:00'),
(6, 'Nauman', 'Shahid', '31303-4586255-9', 'nauman@gmail.com', '0333-7486520', 'Male', 'uploads/13149990_615933705248371_981907217_n.jpg', 'RYK                    ', 'BSCS', 'Single', '2019-01-28', 20000, 1, 0, 0, '2019-01-30 17:49:31', '0000-00-00 00:00:00'),
(7, '', '', '', '', '', '', 'uploads/', '', '', '', '0000-00-00', 0, 0, 0, 0, '2019-01-31 06:04:44', '0000-00-00 00:00:00'),
(8, 'nadia', 'iftkgar', '166456546', 'nadia@gmail.com', '65465654', 'Female', 'uploads/Koala.jpg', 'cshfwhfwkjhwjhfwhw          ', 'BSCS', 'Single', '2019-01-31', 10000, 1, 0, 0, '2019-01-31 07:29:34', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_teacher`
--
ALTER TABLE `assign_teacher`
  ADD PRIMARY KEY (`assign_teacher_id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `subject_id` (`group_id`);

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
-- Indexes for table `std_fee_details`
--
ALTER TABLE `std_fee_details`
  ADD PRIMARY KEY (`std_fee_id`),
  ADD KEY `std_id` (`std_id`,`subject_id`);

--
-- Indexes for table `students_enrollment`
--
ALTER TABLE `students_enrollment`
  ADD PRIMARY KEY (`std_enroll_id`),
  ADD KEY `std_id` (`std_id`),
  ADD KEY `group_id` (`group_id`);

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
  MODIFY `assign_teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
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
-- AUTO_INCREMENT for table `std_fee_details`
--
ALTER TABLE `std_fee_details`
  MODIFY `std_fee_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `students_enrollment`
--
ALTER TABLE `students_enrollment`
  MODIFY `std_enroll_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student_personal_information`
--
ALTER TABLE `student_personal_information`
  MODIFY `std_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `teacher_personal_info`
--
ALTER TABLE `teacher_personal_info`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
