-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2019 at 06:23 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

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
  `teacher_id` int(111) NOT NULL,
  `class_id` int(111) NOT NULL,
  `subject_id` int(111) NOT NULL,
  `delete_status` int(111) NOT NULL DEFAULT '1',
  `created_by` int(111) NOT NULL,
  `updated_by` int(111) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 2, 'NCBAE', '23456789', 'RYK', '1122', 'ayoub@gmail.com', 'Active', 'NCBAE', '1122', 'ncbae@gmail.com', 1, 0, 0, '2019-01-16 18:36:22', '0000-00-00 00:00:00'),
(2, 2, 'abc', '1122', 'RYK', '1122', 'ayoub@gmail.com', 'Active', 'NCBAE', '1122', 'ncbae@gmail.com', 0, 0, 0, '2019-01-16 18:23:39', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `class_id` int(11) NOT NULL,
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

INSERT INTO `classes` (`class_id`, `class_name`, `class_description`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'm', ' 5\r\n63512\r\n4\r\n1', 1, 2, 2, '2019-01-16 08:52:47', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(111) NOT NULL,
  `group_type` enum('Morning','Evening') NOT NULL,
  `group_description` varchar(111) NOT NULL,
  `group_status` enum('Active','Inactive') NOT NULL,
  `delete_status` int(111) NOT NULL DEFAULT '1',
  `created_by` int(111) NOT NULL,
  `updated_by` int(111) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `group_name`, `group_type`, `group_description`, `group_status`, `delete_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Mcs', 'Morning', 'Each and everything to show here', 'Active', 1, 2, 2, '2019-01-15 18:41:12', '0000-00-00 00:00:00'),
(2, 'Mcs', 'Morning', 'Nothing to show here', 'Active', 1, 0, 0, '2019-01-15 18:32:20', '0000-00-00 00:00:00'),
(3, 'Mcs', 'Evening', 'Something to show here', 'Active', 0, 0, 0, '2019-01-15 18:44:14', '0000-00-00 00:00:00'),
(4, 'BScs', 'Evening', 'k;knkj', 'Active', 1, 2, 0, '2019-01-15 18:43:10', '0000-00-00 00:00:00');

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
(1, 'DexDevs', 'Software House', 'RYK', 'uploads/download.jpeg', '23524534', 0, '2019-01-16 17:05:12', '0000-00-00 00:00:00', 0, 0),
(2, 'Ayoub Soft', 'Software House', 'RYK', 'uploads/download.jpeg', '23524534', 1, '2019-01-16 17:22:33', '0000-00-00 00:00:00', 0, 0);

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
-- Table structure for table `students_enrollment`
--

CREATE TABLE `students_enrollment` (
  `std_enroll_id` int(11) NOT NULL,
  `std_id` int(111) NOT NULL,
  `group_id` int(111) NOT NULL,
  `assign_teacher_id` int(111) NOT NULL,
  `delete_status` int(111) NOT NULL DEFAULT '1',
  `created_by` int(111) NOT NULL,
  `updated_by` int(111) NOT NULL,
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
  `class_id` int(111) NOT NULL,
  `subject_name` varchar(111) NOT NULL,
  `subject_fee` int(111) NOT NULL,
  `subject_description` varchar(111) NOT NULL,
  `delete_status` int(111) NOT NULL DEFAULT '1',
  `created_by` int(111) NOT NULL,
  `updated_by` int(111) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_personal_info`
--

CREATE TABLE `teacher_personal_info` (
  `teacher_id` int(11) NOT NULL,
  `teacher_name` varchar(111) NOT NULL,
  `teacher_father_name` varchar(111) NOT NULL,
  `teacher_cnic` varchar(111) NOT NULL,
  `teacher_email` varchar(111) NOT NULL,
  `teacher_contact_no` varchar(111) NOT NULL,
  `teacher_gender` enum('Male','Female') NOT NULL,
  `teacher_picture` varchar(111) NOT NULL,
  `teacher_permanent_address` varchar(111) NOT NULL,
  `teacher_qualification` varchar(111) NOT NULL,
  `teacher_marital_status` enum('Married','Single') NOT NULL,
  `delete_status` int(111) NOT NULL DEFAULT '1',
  `created_by` int(111) NOT NULL,
  `updated_by` int(111) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_teacher`
--
ALTER TABLE `assign_teacher`
  ADD PRIMARY KEY (`assign_teacher_id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `subject_id` (`subject_id`);

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
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`);

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
-- Indexes for table `students_enrollment`
--
ALTER TABLE `students_enrollment`
  ADD PRIMARY KEY (`std_enroll_id`),
  ADD KEY `std_id` (`std_id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `assign_teacher_id` (`assign_teacher_id`);

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
  ADD KEY `class_id` (`class_id`);

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
  MODIFY `assign_teacher_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `institutes`
--
ALTER TABLE `institutes`
  MODIFY `institute_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `manage_admin`
--
ALTER TABLE `manage_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher_personal_info`
--
ALTER TABLE `teacher_personal_info`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assign_teacher`
--
ALTER TABLE `assign_teacher`
  ADD CONSTRAINT `assign_teacher_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `classes` (`class_id`),
  ADD CONSTRAINT `assign_teacher_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`),
  ADD CONSTRAINT `assign_teacher_ibfk_3` FOREIGN KEY (`teacher_id`) REFERENCES `teacher_personal_info` (`teacher_id`);

--
-- Constraints for table `branches`
--
ALTER TABLE `branches`
  ADD CONSTRAINT `branches_ibfk_1` FOREIGN KEY (`institute_id`) REFERENCES `institutes` (`institute_id`);

--
-- Constraints for table `students_enrollment`
--
ALTER TABLE `students_enrollment`
  ADD CONSTRAINT `students_enrollment_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `student_personal_information` (`std_id`),
  ADD CONSTRAINT `students_enrollment_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`),
  ADD CONSTRAINT `students_enrollment_ibfk_3` FOREIGN KEY (`assign_teacher_id`) REFERENCES `assign_teacher` (`assign_teacher_id`);

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `classes` (`class_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
