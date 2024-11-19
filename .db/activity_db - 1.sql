-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 19, 2024 at 12:34 PM
-- Server version: 11.4.2-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `activity_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_activity`
--

CREATE TABLE `tbl_activity` (
  `act_id` int(10) NOT NULL,
  `act_name` varchar(100) NOT NULL COMMENT 'ชื่อกิจกรรม',
  `act_year` varchar(10) NOT NULL COMMENT 'ปีการศึกษา',
  `act_hour` int(10) NOT NULL COMMENT 'จำนวนชั่วโมง',
  `act_day` date NOT NULL COMMENT 'วัน',
  `act_time` varchar(20) NOT NULL COMMENT 'เวลา',
  `act_number` int(11) DEFAULT 40 COMMENT 'จำนวนนักศึกษา',
  `act_status` varchar(50) NOT NULL DEFAULT '1' COMMENT 'สถานะการจัดกิจกรรม',
  `tch_id` int(11) NOT NULL COMMENT 'ไอดี อาจารย์',
  `act_phone` varchar(20) NOT NULL COMMENT 'เบอร์โทร',
  `act_details` varchar(500) NOT NULL COMMENT 'รายละเอียดเพิ่มเติม',
  `act_delete` int(1) DEFAULT NULL COMMENT '1 ลบ',
  `adm_id` int(11) NOT NULL COMMENT 'ไอดี แอด',
  `act_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `tbl_activity`
--

INSERT INTO `tbl_activity` (`act_id`, `act_name`, `act_year`, `act_hour`, `act_day`, `act_time`, `act_number`, `act_status`, `tch_id`, `act_phone`, `act_details`, `act_delete`, `adm_id`, `act_stamp`) VALUES
(33, 'ddddddก', '2546ด', 31, '2024-11-14', '0001', 401, '2', 1, '3333se', '33333ede', 1, 1, '2024-11-18 17:37:59'),
(34, 'ffffff', '2564', 3, '2024-10-30', '08.00-12.00', 20, '1', 1, '0123456789', 'ffffffgg', 1, 1, '2024-11-18 17:47:02'),
(35, 'ddddd', '2564', 3, '2024-11-26', '08.00-12.00', 50, '1', 1, '0123456789', 'fff', NULL, 1, '2024-11-18 19:05:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl _admin`
--

CREATE TABLE `tbl _admin` (
  `adm_id` int(11) NOT NULL,
  `adm_name` varchar(50) NOT NULL,
  `adm_username` varchar(50) NOT NULL,
  `adm_pass` varchar(50) NOT NULL,
  `adm_delete` int(1) DEFAULT NULL COMMENT '1 ลบ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `tbl _admin`
--

INSERT INTO `tbl _admin` (`adm_id`, `adm_name`, `adm_username`, `adm_pass`, `adm_delete`) VALUES
(1, 'admin', 'admin', 'admin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bookingdata`
--

CREATE TABLE `tbl_bookingdata` (
  `bkd_id` int(11) NOT NULL,
  `bkd_code` varchar(50) NOT NULL COMMENT 'รหัสการจอง',
  `std_id` int(11) NOT NULL COMMENT 'รหัสนักศึกษา',
  `act_id` int(11) NOT NULL COMMENT 'รหัสกิจกรรม',
  `bkd_day` varchar(50) NOT NULL COMMENT 'วันที่บันทึก',
  `bkd_status` varchar(100) NOT NULL COMMENT 'สถานะ',
  `bkd_token` varchar(20) DEFAULT NULL COMMENT 'โทเค็น'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_registrationdata`
--

CREATE TABLE `tbl_registrationdata` (
  `rgb_id` int(11) NOT NULL,
  `rgb_code` varchar(50) NOT NULL COMMENT 'รหัสลงทะเบียน',
  `bkd_id` int(11) NOT NULL COMMENT 'รหัสการจอง',
  `std_id` int(11) NOT NULL COMMENT 'รหัสนักศึกษา',
  `act_id` int(11) NOT NULL COMMENT 'รหัสกิจกรรม',
  `rgb_token` varchar(20) NOT NULL COMMENT 'โทเค็น'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_std`
--

CREATE TABLE `tbl_std` (
  `std_id` int(11) NOT NULL,
  `std_code` varchar(50) DEFAULT NULL COMMENT 'รหัสนศ.',
  `std_group` varchar(20) NOT NULL COMMENT 'หมู่เรียน',
  `std_program` varchar(100) NOT NULL COMMENT 'ภาคปกติ ภาคพิเศษ',
  `std_prefix` varchar(50) NOT NULL COMMENT 'คำนำหน้า',
  `std_name` varchar(100) NOT NULL COMMENT 'ชื่อ',
  `std_lastname` varchar(100) NOT NULL COMMENT 'นามสกุล',
  `std_phone` varchar(10) NOT NULL COMMENT 'เบอร์โทร',
  `std_email` varchar(50) NOT NULL COMMENT 'อีเมล์',
  `std_pass` varchar(50) NOT NULL,
  `std_delete` int(1) DEFAULT NULL COMMENT '1 ลบ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tbl_std`
--

INSERT INTO `tbl_std` (`std_id`, `std_code`, `std_group`, `std_program`, `std_prefix`, `std_name`, `std_lastname`, `std_phone`, `std_email`, `std_pass`, `std_delete`) VALUES
(4, '6660705117', 'บ6605T', 'ภาคปกติ', 'นางสาว', 'กัลย์สุดา', 'อินทวงศ์', '0941703055', 'sb6660705117@lru.ac.th', '6660705117', 1),
(5, '6660705119eeee', 'บ6605T', 'ภาคปกติ', 'นางสาว', 'กัลยรัตน์', 'อาจปาสา', '0941703055', 'sb6660705119@lru.ac.th', 'fffffffff', NULL),
(7, '123456789', '123', '123', '1', '2222', 'fff', '012333', 'ddddd', 'fffff', 1),
(8, '123456', 'fffffff', 'ภาคกศบ.', 'นาย', 'ggggg', 'hhhhhh', '0123456789', 'ddddd@gg.com', 'fffff', 1),
(9, '123456ดดด', 'fffffffเเเ', 'ภาคปกติ', 'นาย', 'เเเหหหหหหห', 'hhhhhh', '0123456789', 'admin@dff.com', 'fffff', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tch`
--

CREATE TABLE `tbl_tch` (
  `tch_id` int(11) NOT NULL,
  `tch_mail` varchar(50) NOT NULL,
  `tch_pass` varchar(20) NOT NULL,
  `thc_fname` varchar(50) NOT NULL,
  `thc_lname` varchar(50) NOT NULL,
  `thc_delete` int(1) DEFAULT NULL COMMENT ' 1 ลบ',
  `thc_phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `tbl_tch`
--

INSERT INTO `tbl_tch` (`tch_id`, `tch_mail`, `tch_pass`, `thc_fname`, `thc_lname`, `thc_delete`, `thc_phone`) VALUES
(1, 's1@gmail.com', 's1@gmail.com', 'ผู้ช่วยศาสตราจารย์ ดร.ชรินทร์ญา', 'หวังวัชรกุล', NULL, '0123456789'),
(2, 'admin@fff.comddd', 'fffff', 'fffffffsss', 'ffffssss', NULL, '0213654893');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_activity`
--
ALTER TABLE `tbl_activity`
  ADD PRIMARY KEY (`act_id`),
  ADD KEY `_tex_1` (`tch_id`),
  ADD KEY `_tex_2` (`adm_id`);

--
-- Indexes for table `tbl _admin`
--
ALTER TABLE `tbl _admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `tbl_bookingdata`
--
ALTER TABLE `tbl_bookingdata`
  ADD PRIMARY KEY (`bkd_id`),
  ADD KEY `bkd_code` (`bkd_code`),
  ADD KEY `_tex_3` (`std_id`),
  ADD KEY `_tex_4` (`act_id`);

--
-- Indexes for table `tbl_registrationdata`
--
ALTER TABLE `tbl_registrationdata`
  ADD PRIMARY KEY (`rgb_id`),
  ADD KEY `_tex_5` (`bkd_id`),
  ADD KEY `_tex_6` (`std_id`),
  ADD KEY `_tex_7` (`act_id`);

--
-- Indexes for table `tbl_std`
--
ALTER TABLE `tbl_std`
  ADD PRIMARY KEY (`std_id`);

--
-- Indexes for table `tbl_tch`
--
ALTER TABLE `tbl_tch`
  ADD PRIMARY KEY (`tch_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_activity`
--
ALTER TABLE `tbl_activity`
  MODIFY `act_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl _admin`
--
ALTER TABLE `tbl _admin`
  MODIFY `adm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_bookingdata`
--
ALTER TABLE `tbl_bookingdata`
  MODIFY `bkd_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_registrationdata`
--
ALTER TABLE `tbl_registrationdata`
  MODIFY `rgb_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_std`
--
ALTER TABLE `tbl_std`
  MODIFY `std_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_tch`
--
ALTER TABLE `tbl_tch`
  MODIFY `tch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_activity`
--
ALTER TABLE `tbl_activity`
  ADD CONSTRAINT `_tex_1` FOREIGN KEY (`tch_id`) REFERENCES `tbl_tch` (`tch_id`),
  ADD CONSTRAINT `_tex_2` FOREIGN KEY (`adm_id`) REFERENCES `tbl _admin` (`adm_id`);

--
-- Constraints for table `tbl_bookingdata`
--
ALTER TABLE `tbl_bookingdata`
  ADD CONSTRAINT `_tex_3` FOREIGN KEY (`std_id`) REFERENCES `tbl_std` (`std_id`),
  ADD CONSTRAINT `_tex_4` FOREIGN KEY (`act_id`) REFERENCES `tbl_activity` (`act_id`);

--
-- Constraints for table `tbl_registrationdata`
--
ALTER TABLE `tbl_registrationdata`
  ADD CONSTRAINT `_tex_5` FOREIGN KEY (`bkd_id`) REFERENCES `tbl_bookingdata` (`bkd_id`),
  ADD CONSTRAINT `_tex_6` FOREIGN KEY (`std_id`) REFERENCES `tbl_std` (`std_id`),
  ADD CONSTRAINT `_tex_7` FOREIGN KEY (`act_id`) REFERENCES `tbl_activity` (`act_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
