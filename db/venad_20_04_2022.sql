-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 20, 2022 at 11:30 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `venad`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_advancepayment`
--

DROP TABLE IF EXISTS `tbl_advancepayment`;
CREATE TABLE IF NOT EXISTS `tbl_advancepayment` (
  `adv_id` int(11) NOT NULL AUTO_INCREMENT,
  `adv_date` date NOT NULL,
  `emp_id_fk` int(11) NOT NULL,
  `adv_amount` varchar(100) NOT NULL,
  `remaining_amount` int(11) NOT NULL,
  `adv_status` int(11) NOT NULL,
  PRIMARY KEY (`adv_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_advancepayment`
--

INSERT INTO `tbl_advancepayment` (`adv_id`, `adv_date`, `emp_id_fk`, `adv_amount`, `remaining_amount`, `adv_status`) VALUES
(1, '2020-03-27', 8, '2000', 0, 1),
(2, '2020-05-29', 8, '1000', 0, 1),
(3, '2020-07-07', 3, '1000', 0, 1),
(4, '2020-10-16', 2, '1000', 0, 1),
(5, '2021-11-03', 1, '1200', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_allotment`
--

DROP TABLE IF EXISTS `tbl_allotment`;
CREATE TABLE IF NOT EXISTS `tbl_allotment` (
  `allot_id` int(11) NOT NULL AUTO_INCREMENT,
  `allot_item_id` int(11) NOT NULL,
  `allot_quantity` int(11) NOT NULL,
  `allot_dead_chicken_qty` int(11) DEFAULT NULL,
  `allot_member_id_fk` int(11) NOT NULL,
  `allot_integration_code` varchar(200) DEFAULT NULL,
  `allot_integration_type` tinyint(2) DEFAULT NULL COMMENT 'Broiler=1&Layer=2',
  `allot_weight` float NOT NULL,
  `allot_unit_fk` int(11) NOT NULL,
  `allot_vaccine_fk` int(11) NOT NULL,
  `allot_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=Pending,1=Allotted,2=Integrated',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`allot_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_allotment`
--

INSERT INTO `tbl_allotment` (`allot_id`, `allot_item_id`, `allot_quantity`, `allot_dead_chicken_qty`, `allot_member_id_fk`, `allot_integration_code`, `allot_integration_type`, `allot_weight`, `allot_unit_fk`, `allot_vaccine_fk`, `allot_status`, `created_at`, `updated_at`) VALUES
(1, 6, 50, NULL, 1, 'AS6879434', 1, 110, 2, 4, 1, '2022-04-08 16:11:31', '2022-02-24 22:43:34'),
(3, 5, 100, NULL, 1, 'AS6874311', 2, 85, 2, 4, 1, '2022-04-08 16:11:20', '2022-03-01 11:48:20'),
(4, 6, 20, NULL, 3, 'AS7854525', 1, 35, 2, 2, 1, '2022-04-08 16:11:01', '2022-03-01 11:50:48'),
(5, 6, 50, NULL, 2, 'AS8854621', 2, 100, 2, 2, 1, '2022-04-08 16:10:50', '2022-03-13 21:33:40'),
(6, 6, 10, NULL, 2, 'AS45622', 2, 120, 1, 2, 1, '2022-04-08 16:10:36', '2022-03-24 05:33:52'),
(7, 5, 6, NULL, 4, 'AS474545', 1, 10, 2, 1, 1, '2022-04-08 16:10:22', '2022-04-08 05:30:22'),
(8, 2, 1, NULL, 10, 'AS474545', 1, 90, 1, 1, 1, '2022-04-08 16:10:15', '2022-04-08 05:30:45'),
(11, 5, 10, NULL, 15, 'AS4745857', 1, 30, 2, 0, 1, '2022-04-12 14:28:59', '2022-04-12 08:58:59'),
(12, 5, 1000, NULL, 15, 'AS4562223', 1, 120, 3, 0, 1, '2022-04-12 14:35:04', '2022-04-12 09:05:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_basic_info`
--

DROP TABLE IF EXISTS `tbl_basic_info`;
CREATE TABLE IF NOT EXISTS `tbl_basic_info` (
  `basic_info_id` int(11) NOT NULL AUTO_INCREMENT,
  `basic_login_id_fk` int(11) NOT NULL,
  `basic_desc` mediumtext DEFAULT NULL,
  `basic_comp_name` varchar(255) DEFAULT NULL,
  `basic_address` varchar(255) DEFAULT NULL,
  `bsic_reg_no` varchar(150) DEFAULT NULL,
  `basic_cn` varchar(150) DEFAULT NULL,
  `basic_join_date` date DEFAULT NULL,
  `basic_web_add` varchar(255) DEFAULT NULL,
  `basic_email_add` varchar(255) DEFAULT NULL,
  `basic_phone_1` varchar(50) DEFAULT NULL,
  `basic_phone_2` varchar(50) DEFAULT NULL,
  `basic_status` tinyint(2) NOT NULL DEFAULT 1,
  `basic_pan` varchar(100) DEFAULT NULL,
  `basic_udhyam` varchar(200) DEFAULT NULL,
  `basic_drug_lic` varchar(200) DEFAULT NULL,
  `basic_trade_lic` varchar(200) DEFAULT NULL,
  `basic_gst` varchar(200) DEFAULT NULL,
  `basic_farm` varchar(200) DEFAULT NULL,
  `basic_import_export_code` varchar(255) DEFAULT NULL,
  `basic_fssai` varchar(200) DEFAULT NULL,
  `basic_title` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`basic_info_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_basic_info`
--

INSERT INTO `tbl_basic_info` (`basic_info_id`, `basic_login_id_fk`, `basic_desc`, `basic_comp_name`, `basic_address`, `bsic_reg_no`, `basic_cn`, `basic_join_date`, `basic_web_add`, `basic_email_add`, `basic_phone_1`, `basic_phone_2`, `basic_status`, `basic_pan`, `basic_udhyam`, `basic_drug_lic`, `basic_trade_lic`, `basic_gst`, `basic_farm`, `basic_import_export_code`, `basic_fssai`, `basic_title`) VALUES
(1, 1, 'VENAD POULTRY FARMERS PRODUCER COMPANY LIMITED has established themselves as a reputed supplier of a wide range of products like Egg, Chicken Vaccines And Medicines, Poultry Equipment, Chicks . As an ace manufacturer and suppliers of Egg, Chicken Vaccines And Medicines, Poultry Equipment, Chicks , they have have established a strong name in the market. Their introduced products are broadly acclaimed and acknowledged for their high performance, low maintenance cost . They offer Egg, Chicken Vaccines And Medicines, Poultry Equipment, Chicks at reasonable prices.', 'VENAD POULTRY FARMERS PRODUCER COMPANY LIMITED', 'Kochi', '045926', '78521321', '2016-01-01', 'www.abc.com', 'abc@corporate.com', '9865327410', '9764318520', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 1, 'VENAD POULTRY FARMERS PRODUCER COMPANY LIMITED has established themselves as a reputed supplier of a wide range of products like Egg, Chicken Vaccines And Medicines, Poultry Equipment, Chicks . As an ace manufacturer and suppliers of Egg, Chicken Vaccines And Medicines, Poultry Equipment, Chicks , they have have established a strong name in the market. Their introduced products are broadly acclaimed and acknowledged for their high performance, low maintenance cost . They offer Egg, Chicken Vaccines And Medicines, Poultry Equipment, Chicks at reasonable prices.', 'VENAD POULTRY FARMERS PRODUCER COMPANY LIMITED', 'Kochi', '045926', '78521321', '2016-01-01', 'www.abc.com', 'abc@corporate.com', '9865327410', '9764318520', 1, 'ABC34BX34', '7846545412001', 'ADEC45454FFC3', '788535435312121545', '4534345345687487', 'VENAD  FARM', '875441321/545453131', '857673876876876', 'VENAD TITLE');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch`
--

DROP TABLE IF EXISTS `tbl_branch`;
CREATE TABLE IF NOT EXISTS `tbl_branch` (
  `branch_id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `branch_address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `branch_phn` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `branch_phn2` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `branch_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `branch_web_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `branch_trade_licenses` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `branch_cn_number` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `branch_animator` int(11) NOT NULL,
  `branch_gst` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `branch_status` int(11) NOT NULL,
  `branch_created_at` date NOT NULL,
  `branch_updated_at` date NOT NULL,
  PRIMARY KEY (`branch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_branch`
--

INSERT INTO `tbl_branch` (`branch_id`, `branch_name`, `branch_address`, `branch_phn`, `branch_phn2`, `branch_email`, `branch_web_address`, `branch_trade_licenses`, `branch_cn_number`, `branch_animator`, `branch_gst`, `branch_status`, `branch_created_at`, `branch_updated_at`) VALUES
(1, 'Head Office, Kottarakkara', 'No.542/XIV, Opposite Railway Station, Kottarakkara', '8111884441', '8111884442', 'venadpfpc@gmail.com', 'www.venadfarms.com', '1234', '12343', 0, 'Ffffff', 1, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_commision`
--

DROP TABLE IF EXISTS `tbl_commision`;
CREATE TABLE IF NOT EXISTS `tbl_commision` (
  `commission_id` int(11) NOT NULL AUTO_INCREMENT,
  `commission_name` varchar(50) NOT NULL,
  `commission_amount` float NOT NULL,
  `commission_per_unit_id` int(11) NOT NULL,
  `commission_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=Inactive, 1=Active',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`commission_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_commision`
--

INSERT INTO `tbl_commision` (`commission_id`, `commission_name`, `commission_amount`, `commission_per_unit_id`, `commission_status`, `created_at`, `updated_at`) VALUES
(1, 'Share holder commission', 15, 2, 1, '2022-02-04 12:58:29', '2022-02-03 20:28:29'),
(2, 'Outlets commission', 30, 2, 1, '2022-02-04 12:59:02', '2022-02-03 20:29:02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_commission_history`
--

DROP TABLE IF EXISTS `tbl_commission_history`;
CREATE TABLE IF NOT EXISTS `tbl_commission_history` (
  `history_id` int(11) NOT NULL AUTO_INCREMENT,
  `history_allotment_fk` int(11) NOT NULL,
  `history_member_id_fk` int(11) NOT NULL,
  `history_commission_amount` float NOT NULL,
  `history_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=Inactive,1=Active',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`history_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_commission_history`
--

INSERT INTO `tbl_commission_history` (`history_id`, `history_allotment_fk`, `history_member_id_fk`, `history_commission_amount`, `history_status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 150, 1, '2022-03-02 04:03:37', '2022-03-01 11:33:37'),
(2, 5, 2, 200, 1, '2022-03-14 14:09:21', '2022-03-13 21:39:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

DROP TABLE IF EXISTS `tbl_customer`;
CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `cust_id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_project_id_fk` int(11) NOT NULL,
  `customertype` varchar(50) NOT NULL,
  `custname` varchar(50) NOT NULL,
  `shopname` varchar(50) NOT NULL,
  `custaddress` text NOT NULL,
  `custphone` bigint(20) NOT NULL,
  `custemail` varchar(50) NOT NULL,
  `customerdob` date NOT NULL,
  `custpan` varchar(100) NOT NULL,
  `custgst` varchar(100) NOT NULL,
  `custstatus` int(11) NOT NULL,
  `weddingdate` date NOT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`cust_id`, `cust_project_id_fk`, `customertype`, `custname`, `shopname`, `custaddress`, `custphone`, `custemail`, `customerdob`, `custpan`, `custgst`, `custstatus`, `weddingdate`) VALUES
(1, 1, 'retail', 'JAMES MATHEW', 'CHick Center', 'CHick Center, Thiruvalla, Pathanamthitta ', 9809402838, 'CHickcenter@gmail.com', '0000-00-00', '91023232', '32XA901919', 1, '0000-00-00'),
(2, 0, 'retail', 'Beez', 'Beez Honey', '  asas', 9809402838, 'Sindia@gmail.com', '0000-00-00', '91023232', '32XA901919', 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cust_acc`
--

DROP TABLE IF EXISTS `tbl_cust_acc`;
CREATE TABLE IF NOT EXISTS `tbl_cust_acc` (
  `cust_acc_id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_acc_fk_id` int(11) NOT NULL,
  `cust_acc_old_bal` double NOT NULL,
  `cust_acc_status` tinyint(2) NOT NULL DEFAULT 1,
  PRIMARY KEY (`cust_acc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cust_acc`
--

INSERT INTO `tbl_cust_acc` (`cust_acc_id`, `cust_acc_fk_id`, `cust_acc_old_bal`, `cust_acc_status`) VALUES
(1, 1, 5000, 1),
(2, 2, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_daybook`
--

DROP TABLE IF EXISTS `tbl_daybook`;
CREATE TABLE IF NOT EXISTS `tbl_daybook` (
  `daybook_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id_fk` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `closing_amt` int(20) NOT NULL,
  `credit_status` int(11) NOT NULL,
  `daybook_status` int(11) NOT NULL,
  PRIMARY KEY (`daybook_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_daybook`
--

INSERT INTO `tbl_daybook` (`daybook_id`, `project_id_fk`, `date`, `closing_amt`, `credit_status`, `daybook_status`) VALUES
(1, 1, '2021-11', -2000, 1, 2),
(2, 0, '2022-03', 0, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_direct_details`
--

DROP TABLE IF EXISTS `tbl_direct_details`;
CREATE TABLE IF NOT EXISTS `tbl_direct_details` (
  `d_details_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_details_name` varchar(100) NOT NULL,
  `d_details_address` varchar(255) NOT NULL,
  `d_details_email` varchar(100) NOT NULL,
  `d_details_pan` varchar(120) NOT NULL,
  `d_details_aadhaar` varchar(250) NOT NULL,
  `d_details_din` varchar(255) NOT NULL,
  `d_details_phone` varchar(20) NOT NULL,
  `d_details_father_name` varchar(100) NOT NULL,
  `d_details_status` tinyint(2) NOT NULL,
  `d_details_dob` date DEFAULT NULL,
  `d_details_photo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`d_details_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_direct_details`
--

INSERT INTO `tbl_direct_details` (`d_details_id`, `d_details_name`, `d_details_address`, `d_details_email`, `d_details_pan`, `d_details_aadhaar`, `d_details_din`, `d_details_phone`, `d_details_father_name`, `d_details_status`, `d_details_dob`, `d_details_photo`) VALUES
(1, 'adsda asdad', 'asdasdd', 'rajeev654@gamil.com', '2323dds', '23232122321312', '121321232132', '1354654', 'chandran', 1, '1991-12-04', 'tom.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_distributions`
--

DROP TABLE IF EXISTS `tbl_distributions`;
CREATE TABLE IF NOT EXISTS `tbl_distributions` (
  `dist_id` int(11) NOT NULL AUTO_INCREMENT,
  `dist_item_id_fk` int(11) NOT NULL,
  `dist_member_id_fk` int(11) NOT NULL,
  `dist_quantity_fk` int(11) NOT NULL,
  `dist_unit` varchar(20) NOT NULL,
  `dist_weight` int(11) NOT NULL,
  `dist_code` varchar(50) DEFAULT NULL,
  `dist_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=Inactive,1=Active',
  `dist_next_date` date DEFAULT NULL,
  `dist_mop` tinyint(2) DEFAULT NULL COMMENT 'debit=1&credit=2',
  `dist_paid` double DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`dist_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_distributions`
--

INSERT INTO `tbl_distributions` (`dist_id`, `dist_item_id_fk`, `dist_member_id_fk`, `dist_quantity_fk`, `dist_unit`, `dist_weight`, `dist_code`, `dist_status`, `dist_next_date`, `dist_mop`, `dist_paid`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 10, '2', 15, NULL, 1, NULL, NULL, NULL, '2022-02-15 05:49:58', '2022-02-14 13:19:58'),
(2, 3, 1, 10, '2', 25, NULL, 1, NULL, NULL, NULL, '2022-02-15 10:27:56', '2022-02-14 17:57:56'),
(3, 7, 4, 5, '4', 0, NULL, 1, NULL, NULL, NULL, '2022-02-25 11:12:50', '2022-02-24 18:42:50'),
(4, 1, 1, 10, '2', 10, 'ABC', 1, NULL, NULL, NULL, '2022-03-21 20:40:45', '2022-03-21 04:10:45'),
(5, 1, 15, 50, '2', 100, 'ABC0026', 1, '2022-04-19', 1, 2000, '2022-04-12 13:56:12', '2022-04-12 08:26:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

DROP TABLE IF EXISTS `tbl_district`;
CREATE TABLE IF NOT EXISTS `tbl_district` (
  `district_id` int(11) NOT NULL AUTO_INCREMENT,
  `district_state_id_fk` int(11) DEFAULT NULL,
  `district_name` varchar(50) NOT NULL,
  `district_number` varchar(20) NOT NULL,
  `district_incharge` varchar(50) NOT NULL,
  `district_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=Inactive, 1=Active',
  `district_created_at` datetime NOT NULL,
  `district_updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`district_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_state_id_fk`, `district_name`, `district_number`, `district_incharge`, `district_status`, `district_created_at`, `district_updated_at`) VALUES
(1, 1, 'Thiruvanandapuram', '9809402848', 'Jack', 1, '0000-00-00 00:00:00', '2022-01-31 20:47:58'),
(2, 1, 'Kollam', '9809402843', 'Jackb', 1, '0000-00-00 00:00:00', '2022-01-31 20:49:02'),
(3, 1, 'Alappuzha', '9809402841', 'Jane', 1, '0000-00-00 00:00:00', '2022-01-31 20:51:14'),
(4, 1, 'Ernakulam', '9847745452', 'Test Incharge name', 1, '0000-00-00 00:00:00', '2022-02-18 19:59:24'),
(5, 1, 'Malappuram', '789456', 're', 1, '2022-03-15 11:45:35', '2022-03-14 19:15:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_drivers`
--

DROP TABLE IF EXISTS `tbl_drivers`;
CREATE TABLE IF NOT EXISTS `tbl_drivers` (
  `driver_id` int(11) NOT NULL AUTO_INCREMENT,
  `driver_name` varchar(100) NOT NULL,
  `driver_email` varchar(20) DEFAULT NULL,
  `driver_mobile` varchar(20) NOT NULL,
  `driver_address` varchar(100) NOT NULL,
  `driver_license_no` varchar(20) NOT NULL,
  `driver_image` varchar(200) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0-InActive,1-Active',
  PRIMARY KEY (`driver_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_drivers`
--

INSERT INTO `tbl_drivers` (`driver_id`, `driver_name`, `driver_email`, `driver_mobile`, `driver_address`, `driver_license_no`, `driver_image`, `created_at`, `updated_at`, `status`) VALUES
(1, 'ABIN', 'abin123@gmail.com', '9846565656', 'ABC Homes, JK Road, KM Street, Cochin', 'KL-1320120123425', '3.jpg', '2022-02-22 13:01:12', '2022-02-21 20:31:12', 1),
(2, 'Mukesh', 'mukesh123@gmail.com', '8089656565', 'JM Homes, HB Road, BH Street, Cochin', 'KL-1230120123498', '12.jpg', '2022-02-22 13:02:11', '2022-02-21 20:32:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_drivers1`
--

DROP TABLE IF EXISTS `tbl_drivers1`;
CREATE TABLE IF NOT EXISTS `tbl_drivers1` (
  `driver_id` int(11) NOT NULL AUTO_INCREMENT,
  `driver_name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0-InActive,1-Active',
  PRIMARY KEY (`driver_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_drivers1`
--

INSERT INTO `tbl_drivers1` (`driver_id`, `driver_name`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Driver 1', '2022-02-15 05:07:30', '2022-02-13 20:27:13', 1),
(2, 'Driver 2', '2022-02-15 05:07:20', '2022-02-13 21:15:53', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_empabsent`
--

DROP TABLE IF EXISTS `tbl_empabsent`;
CREATE TABLE IF NOT EXISTS `tbl_empabsent` (
  `absent_id` int(11) NOT NULL AUTO_INCREMENT,
  `absent_date` date NOT NULL,
  `emp_id_fk` int(11) NOT NULL,
  `absent_status` int(11) NOT NULL,
  PRIMARY KEY (`absent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_empabsent`
--

INSERT INTO `tbl_empabsent` (`absent_id`, `absent_date`, `emp_id_fk`, `absent_status`) VALUES
(1, '2020-07-22', 8, 1),
(2, '1970-01-01', 5, 1),
(3, '1970-01-01', 7, 1),
(4, '1970-01-01', 8, 1),
(5, '1970-01-01', 6, 1),
(6, '1970-01-01', 4, 1),
(7, '1970-01-01', 3, 1),
(8, '1970-01-01', 2, 1),
(9, '1970-01-01', 1, 1),
(10, '2020-10-15', 7, 1),
(11, '2020-10-15', 2, 1),
(12, '2020-10-15', 5, 1),
(13, '2020-10-15', 7, 1),
(14, '2020-10-16', 2, 1),
(15, '2020-12-01', 5, 1),
(16, '2020-12-01', 6, 1),
(17, '2020-12-01', 8, 1),
(18, '2020-12-01', 7, 1),
(19, '2020-12-01', 3, 1),
(20, '2020-12-01', 4, 1),
(21, '2020-12-01', 2, 1),
(22, '2020-12-01', 1, 1),
(23, '2020-12-01', 7, 1),
(24, '2020-12-01', 5, 1),
(25, '2020-12-01', 6, 1),
(26, '2020-12-01', 3, 1),
(27, '2020-12-01', 4, 1),
(28, '2020-12-01', 2, 1),
(29, '2020-12-01', 1, 1),
(30, '2021-11-15', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_empanabsent`
--

DROP TABLE IF EXISTS `tbl_empanabsent`;
CREATE TABLE IF NOT EXISTS `tbl_empanabsent` (
  `absent_id` int(11) NOT NULL AUTO_INCREMENT,
  `absent_date` date NOT NULL,
  `emp_id_fk` int(11) NOT NULL,
  `absent_status` int(11) NOT NULL,
  PRIMARY KEY (`absent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_empanabsent`
--

INSERT INTO `tbl_empanabsent` (`absent_id`, `absent_date`, `emp_id_fk`, `absent_status`) VALUES
(1, '2020-04-02', 5, 1),
(2, '2020-04-02', 7, 1),
(3, '2020-04-02', 8, 1),
(4, '2020-04-02', 2, 1),
(5, '2020-04-02', 6, 1),
(6, '2020-04-02', 1, 1),
(7, '2020-04-02', 4, 1),
(8, '2020-04-02', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_empattendance`
--

DROP TABLE IF EXISTS `tbl_empattendance`;
CREATE TABLE IF NOT EXISTS `tbl_empattendance` (
  `att_id` int(11) NOT NULL AUTO_INCREMENT,
  `att_date` date NOT NULL,
  `emp_id_fk` int(11) NOT NULL,
  `att_status` int(11) NOT NULL,
  PRIMARY KEY (`att_id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_empattendance`
--

INSERT INTO `tbl_empattendance` (`att_id`, `att_date`, `emp_id_fk`, `att_status`) VALUES
(1, '2020-06-09', 8, 1),
(2, '2020-06-09', 7, 1),
(3, '2020-06-09', 6, 1),
(4, '2020-06-09', 5, 1),
(5, '2020-06-09', 2, 1),
(6, '2020-06-09', 3, 1),
(7, '2020-06-09', 1, 1),
(8, '2020-07-07', 6, 1),
(9, '2020-07-07', 5, 1),
(10, '2020-07-07', 7, 1),
(11, '2020-07-07', 8, 1),
(12, '2020-07-07', 4, 1),
(13, '2020-07-07', 2, 1),
(14, '2020-07-07', 1, 1),
(15, '2020-07-19', 8, 1),
(16, '2020-07-19', 6, 1),
(17, '2020-07-19', 3, 1),
(18, '2020-07-19', 7, 1),
(19, '2020-07-19', 5, 1),
(20, '2020-07-19', 4, 1),
(21, '2020-07-19', 2, 1),
(22, '2020-07-19', 1, 1),
(23, '2020-07-22', 5, 1),
(24, '2020-07-22', 3, 1),
(25, '2020-07-22', 4, 1),
(26, '2020-07-22', 6, 1),
(27, '2020-07-22', 7, 1),
(28, '2020-07-22', 1, 1),
(29, '2020-07-22', 2, 1),
(30, '2020-08-03', 4, 1),
(31, '2020-08-03', 6, 1),
(32, '2020-08-03', 5, 1),
(33, '2020-08-03', 8, 1),
(34, '2020-08-03', 7, 1),
(35, '2020-08-03', 3, 1),
(36, '2020-08-03', 1, 1),
(37, '2020-10-15', 5, 1),
(38, '2020-10-15', 8, 1),
(39, '2020-10-15', 6, 1),
(40, '2020-10-15', 1, 1),
(41, '2020-10-15', 4, 1),
(42, '2020-10-16', 8, 1),
(43, '2020-10-16', 6, 1),
(44, '2020-10-16', 7, 1),
(45, '2020-10-16', 5, 1),
(46, '2020-10-16', 4, 1),
(47, '2020-10-16', 3, 1),
(48, '2020-10-16', 1, 1),
(49, '2020-11-28', 8, 1),
(50, '2020-11-28', 4, 1),
(51, '2020-11-28', 3, 1),
(52, '2020-11-28', 1, 1),
(53, '2020-11-28', 2, 1),
(54, '2020-12-01', 8, 1),
(55, '2021-05-10', 8, 1),
(56, '2021-05-10', 7, 1),
(57, '2021-05-10', 6, 1),
(58, '2021-05-10', 5, 1),
(59, '2021-05-10', 3, 1),
(60, '2021-05-10', 4, 1),
(61, '2021-05-10', 1, 1),
(62, '2021-05-10', 2, 1),
(63, '2021-11-15', 4, 1),
(64, '2021-11-15', 5, 1),
(65, '2021-11-15', 3, 1),
(66, '2021-11-15', 6, 1),
(67, '2021-11-15', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

DROP TABLE IF EXISTS `tbl_employee`;
CREATE TABLE IF NOT EXISTS `tbl_employee` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_eid` varchar(50) NOT NULL,
  `emp_name` varchar(255) NOT NULL,
  `emp_designation` varchar(60) NOT NULL,
  `emp_address` varchar(255) NOT NULL,
  `emp_phone` varchar(100) NOT NULL,
  `emp_email` varchar(255) NOT NULL,
  `emp_doj` date NOT NULL,
  `emp_sal` int(11) NOT NULL,
  `emp_img` varchar(60) NOT NULL,
  `emp_status` int(11) NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`emp_id`, `emp_eid`, `emp_name`, `emp_designation`, `emp_address`, `emp_phone`, `emp_email`, `emp_doj`, `emp_sal`, `emp_img`, `emp_status`) VALUES
(1, 'VFPC/001', 'Suhaib', 'Staff', 'Kottayam', '9961299612', '', '2019-10-26', 10000, 'images_(1).jpg', 1),
(2, '', 'Mani', '', 'Kottayam', '7761277612', '', '2019-10-25', 12000, '', 1),
(3, '', 'Rizwan', '', 'Kochi', '9995599887', '', '2019-09-01', 12000, '', 1),
(4, '', 'Sanju', '', 'Palaakkad', '812658961', '', '2019-01-01', 15000, '', 1),
(5, '', 'Sabu', '', 'Kollam', '9966333322', '', '2019-10-02', 15000, '', 1),
(6, '', 'James', '', 'Kottayam', '9633668999', '', '1970-01-01', 10000, '', 1),
(7, '', 'Sethu', '', 'Muvattupuzha', '9946123321', '', '2019-10-21', 12000, '', 1),
(8, '', 'Ramesh', '', 'Kodungallur', '788984556', '', '2020-01-01', 10000, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feeds`
--

DROP TABLE IF EXISTS `tbl_feeds`;
CREATE TABLE IF NOT EXISTS `tbl_feeds` (
  `feeds_id` int(11) NOT NULL AUTO_INCREMENT,
  `feeds_allotment_fk` int(11) NOT NULL,
  `feeds_distribution_date` date NOT NULL,
  `feeds_date` datetime NOT NULL,
  `feeds_id_fk` int(11) DEFAULT NULL,
  `feeds_details` varchar(250) DEFAULT NULL,
  `feeds_quantity` int(11) DEFAULT NULL,
  `feeds_unit` int(11) DEFAULT NULL,
  `feeds_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=Inactive,1=Active',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`feeds_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_feeds`
--

INSERT INTO `tbl_feeds` (`feeds_id`, `feeds_allotment_fk`, `feeds_distribution_date`, `feeds_date`, `feeds_id_fk`, `feeds_details`, `feeds_quantity`, `feeds_unit`, `feeds_status`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-02-25', '0000-00-00 00:00:00', 2, 'TEST FEED DETAILS', 65, 2, 1, '2022-02-25 15:14:14', '0000-00-00 00:00:00'),
(2, 5, '2022-03-14', '0000-00-00 00:00:00', 1, 'kol;pjk', 10, 2, 1, '2022-03-14 14:05:24', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feed_item`
--

DROP TABLE IF EXISTS `tbl_feed_item`;
CREATE TABLE IF NOT EXISTS `tbl_feed_item` (
  `feed_id` int(11) NOT NULL AUTO_INCREMENT,
  `feed_name` varchar(100) NOT NULL,
  `feed_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=Inactive, 1=Active',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `feed_code` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`feed_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_feed_item`
--

INSERT INTO `tbl_feed_item` (`feed_id`, `feed_name`, `feed_status`, `created_at`, `updated_at`, `feed_code`) VALUES
(1, 'Pre - Starter', 1, '2022-04-08 09:24:53', '2022-04-08 03:54:53', 'FD10000'),
(2, 'Starter', 1, '2022-04-08 09:25:28', '2022-04-08 03:55:28', 'FD10001'),
(3, 'Finisher', 1, '2022-04-08 09:25:50', '2022-04-08 03:55:50', 'FD10002'),
(4, 'Chick Starter', 1, '2022-04-08 09:32:11', '2022-04-08 04:02:11', 'FD10003'),
(5, 'Groomer', 1, '2022-04-08 09:32:44', '2022-04-08 04:02:44', 'FD10004'),
(6, 'Layer', 1, '2022-04-08 09:32:26', '2022-04-08 04:02:26', 'FD10005');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feed_purchase`
--

DROP TABLE IF EXISTS `tbl_feed_purchase`;
CREATE TABLE IF NOT EXISTS `tbl_feed_purchase` (
  `purchase_id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_item_fk` int(11) NOT NULL,
  `purchase_vendor_name` varchar(100) NOT NULL,
  `purchase_quantity` int(11) NOT NULL,
  `purchase_unit_fk` int(11) NOT NULL,
  `purchase_price` float NOT NULL,
  `purchase_total_cost` float NOT NULL,
  `purchase_status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`purchase_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_feed_purchase`
--

INSERT INTO `tbl_feed_purchase` (`purchase_id`, `purchase_item_fk`, `purchase_vendor_name`, `purchase_quantity`, `purchase_unit_fk`, `purchase_price`, `purchase_total_cost`, `purchase_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'ABC Ltc', 10, 2, 100, 1000, 1, '2022-02-20 13:50:51', '2022-02-19 21:20:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_finyear`
--

DROP TABLE IF EXISTS `tbl_finyear`;
CREATE TABLE IF NOT EXISTS `tbl_finyear` (
  `finyear_id` int(11) NOT NULL AUTO_INCREMENT,
  `fin_year` varchar(50) NOT NULL,
  `fin_no_of_share_holders` int(11) DEFAULT NULL,
  `fin_share_capital` double DEFAULT NULL,
  `fin_business_turn_over` double DEFAULT NULL,
  `fin_income_tax_period` double DEFAULT NULL,
  `fin_net_profit` double DEFAULT NULL,
  `fin_per_bonus` double DEFAULT NULL,
  `fin_divident_bonus` double DEFAULT NULL,
  `fin_audit_report` varchar(255) DEFAULT NULL,
  `fin_startdate` varchar(50) NOT NULL,
  `fin_enddate` varchar(50) NOT NULL,
  `fin_status` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`finyear_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_finyear`
--

INSERT INTO `tbl_finyear` (`finyear_id`, `fin_year`, `fin_no_of_share_holders`, `fin_share_capital`, `fin_business_turn_over`, `fin_income_tax_period`, `fin_net_profit`, `fin_per_bonus`, `fin_divident_bonus`, `fin_audit_report`, `fin_startdate`, `fin_enddate`, `fin_status`, `status`) VALUES
(2, '2020-2021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-26', '2021-09-26', 0, 1),
(23, '2021 - 2022', 50, 10000, 6000000, 4, 500000, 12, 6, '92961591.pdf', '2021-04-01', '2022-03-31', 1, 1),
(26, '2023-2024', 80, 600000, 900000, 5, 900000, 30, 24, 'VENAD FPO MD VOICE MESSAGE IN WRITING (2).pdf', '2023-03-23', '2024-03-23', 0, 0),
(27, '2024-2025', 60, 600000, 3000000, 6, 2000000, 35, 10, '70591223.pdf', '2024-03-23', '2025-03-23', 0, 0),
(28, '2024-2025', 60, 600000, 3000000, 6, 2000000, 35, 10, '70162203.pdf', '2024-03-23', '2025-03-23', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_groups`
--

DROP TABLE IF EXISTS `tbl_groups`;
CREATE TABLE IF NOT EXISTS `tbl_groups` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(100) NOT NULL,
  `group_region_fk` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=Inactive, 1=Active',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_halfleave`
--

DROP TABLE IF EXISTS `tbl_halfleave`;
CREATE TABLE IF NOT EXISTS `tbl_halfleave` (
  `half_id` int(11) NOT NULL AUTO_INCREMENT,
  `half_date` date NOT NULL,
  `emp_id_fk` int(11) NOT NULL,
  `half_status` int(11) NOT NULL,
  PRIMARY KEY (`half_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_halfleave`
--

INSERT INTO `tbl_halfleave` (`half_id`, `half_date`, `emp_id_fk`, `half_status`) VALUES
(1, '2020-10-15', 6, 1),
(2, '2020-10-15', 3, 1),
(3, '2020-10-15', 2, 1),
(4, '2020-11-28', 7, 1),
(5, '2020-11-28', 5, 1),
(6, '2021-11-15', 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hsncode`
--

DROP TABLE IF EXISTS `tbl_hsncode`;
CREATE TABLE IF NOT EXISTS `tbl_hsncode` (
  `hsn_id` int(11) NOT NULL AUTO_INCREMENT,
  `hsncode` int(11) NOT NULL,
  `unique_hsncode` int(11) NOT NULL,
  `description` varchar(300) NOT NULL,
  `goods_service` varchar(30) NOT NULL,
  `hsn_igst` int(11) NOT NULL,
  `hsn_sgst` float NOT NULL,
  `hsn_cgst` float NOT NULL,
  `hsn_cess` int(11) NOT NULL,
  `hsn_comcess` int(11) NOT NULL,
  `hsn_flood_cess` int(11) NOT NULL,
  `hsn_project_id_fk` int(11) NOT NULL DEFAULT 1,
  `hsn_status` int(11) NOT NULL,
  PRIMARY KEY (`hsn_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hsncode`
--

INSERT INTO `tbl_hsncode` (`hsn_id`, `hsncode`, `unique_hsncode`, `description`, `goods_service`, `hsn_igst`, `hsn_sgst`, `hsn_cgst`, `hsn_cess`, `hsn_comcess`, `hsn_flood_cess`, `hsn_project_id_fk`, `hsn_status`) VALUES
(1, 7109000, 710, '0', 'GOODS', 12, 6, 5, 5, 5, 5, 1, 0),
(2, 7109000, 710, '0', 'GOODS', 12, 6, 6, 0, 0, 1, 1, 1),
(3, 11010000, 1101, '0', 'GOODS', 5, 3, 3, 0, 0, 1, 1, 0),
(4, 11010000, 1101, ' CERAMIC TROUGHS, TUBS;POTS JARS AND THE LIKE Products Include: Ceramic Plates ', 'GOODS', 5, 2.5, 2.5, 0, 0, 1, 1, 1),
(5, 123000, 0, '   Test ', 'GOODS', 10, 5, 5, 2, 2, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_integration_stock`
--

DROP TABLE IF EXISTS `tbl_integration_stock`;
CREATE TABLE IF NOT EXISTS `tbl_integration_stock` (
  `integration_stock_id` int(11) NOT NULL AUTO_INCREMENT,
  `integration_stock_type` tinyint(2) DEFAULT NULL COMMENT 'broiler=1&layer=2',
  `integration_stock_qty` int(11) DEFAULT NULL,
  `integration_stock_weight` int(11) DEFAULT NULL,
  `integration_stock_status` tinyint(2) NOT NULL DEFAULT 1,
  PRIMARY KEY (`integration_stock_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_integration_stock`
--

INSERT INTO `tbl_integration_stock` (`integration_stock_id`, `integration_stock_type`, `integration_stock_qty`, `integration_stock_weight`, `integration_stock_status`) VALUES
(1, 1, -120, -50, 1),
(2, 2, 60, 160, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_licenses`
--

DROP TABLE IF EXISTS `tbl_licenses`;
CREATE TABLE IF NOT EXISTS `tbl_licenses` (
  `license_id` int(11) NOT NULL AUTO_INCREMENT,
  `license_name` varchar(255) NOT NULL,
  `license_number` varchar(255) NOT NULL,
  `license_reminder` date NOT NULL,
  `license_expirery_date` date NOT NULL,
  `license_upload` int(11) NOT NULL,
  `license_status` tinyint(2) NOT NULL DEFAULT 1,
  PRIMARY KEY (`license_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_licenses`
--

INSERT INTO `tbl_licenses` (`license_id`, `license_name`, `license_number`, `license_reminder`, `license_expirery_date`, `license_upload`, `license_status`) VALUES
(1, 'GST', '86435435', '2022-03-20', '2022-03-31', 3803200, 0),
(2, 'GST', '86435435', '2022-03-20', '2022-03-31', 87942218, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

DROP TABLE IF EXISTS `tbl_login`;
CREATE TABLE IF NOT EXISTS `tbl_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `password` int(100) NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT 0 COMMENT '0=Others,1=Shareholders,2=Outlets,3=Outside Members, 5=States, 6=Districts, 7=Panchayath',
  `mem_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=Inactive, 1=Active',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `user_name`, `password`, `user_type`, `mem_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 4321, 0, 0, 1, '2022-01-25 11:58:39', '2022-01-24 23:58:46'),
(2, 'JISHNU', 1234, 1, 2, 1, '2022-02-18 17:13:40', '2022-02-18 00:43:40'),
(3, 'JIshnuUser001', 0, 1, 2, 1, '2022-02-19 12:18:27', '2022-02-18 19:48:27'),
(4, 'allen123', 123, 2, 6, 1, '2022-02-19 12:24:29', '2022-02-18 19:54:29'),
(5, 'district001', 0, 5, 2, 1, '2022-02-20 10:16:48', '2022-02-19 17:46:48'),
(6, 'district002', 5263, 5, 3, 1, '2022-02-20 10:18:58', '2022-02-19 17:48:58'),
(7, 'Kollam123', 1234, 6, 2, 1, '2022-02-20 10:46:05', '2022-02-19 18:16:05'),
(8, 'Alappuzha001', 4321, 6, 3, 1, '2022-02-20 10:49:38', '2022-02-19 18:19:38'),
(9, 'test123', 123, 7, 1, 0, '0000-00-00 00:00:00', '2022-02-25 19:15:56'),
(10, 'aas', 1234, 7, 2, 0, '0000-00-00 00:00:00', '2022-03-13 22:00:56'),
(11, 'admin', 1234, 7, 1, 0, '0000-00-00 00:00:00', '2022-03-13 22:33:18'),
(12, 'KALPANA', 123265, 1, 3, 1, '2022-03-14 15:07:57', '2022-03-13 22:37:57'),
(13, 'admin', 0, 3, 4, 1, '2022-03-14 15:12:00', '2022-03-13 22:42:00'),
(14, 'yeeey', 1234, 2, 5, 1, '2022-03-14 16:03:27', '2022-03-13 23:33:32'),
(15, 'admin', 121212, 7, 2, 0, '0000-00-00 00:00:00', '2022-03-13 23:41:54'),
(16, 'padamugal', 1234, 7, 2, 1, '0000-00-00 00:00:00', '2022-03-13 23:42:27'),
(17, 'thodiyoor', 1234, 7, 4, 1, '0000-00-00 00:00:00', '2022-03-14 17:18:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_maintanance_history`
--

DROP TABLE IF EXISTS `tbl_maintanance_history`;
CREATE TABLE IF NOT EXISTS `tbl_maintanance_history` (
  `history_id` int(11) NOT NULL AUTO_INCREMENT,
  `history_vehicle_fk` int(11) NOT NULL,
  `history_incharge_driver_fk` int(11) NOT NULL,
  `history_complaint` varchar(100) NOT NULL,
  `history_reason` varchar(100) NOT NULL,
  `history_date` date NOT NULL,
  `history_workshop_name` varchar(50) NOT NULL,
  `history_cost` float NOT NULL,
  `history_insurance_received` float NOT NULL,
  `history_remarks` varchar(150) NOT NULL,
  `history_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=Inactive,1=Active',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`history_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_maintanance_history`
--

INSERT INTO `tbl_maintanance_history` (`history_id`, `history_vehicle_fk`, `history_incharge_driver_fk`, `history_complaint`, `history_reason`, `history_date`, `history_workshop_name`, `history_cost`, `history_insurance_received`, `history_remarks`, `history_status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Complaint 1', 'Reason 1', '2022-02-22', 'Workshop 1', 1500, 0, 'Test Remarks', 1, '2022-02-15 16:29:22', '2022-02-14 23:59:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

DROP TABLE IF EXISTS `tbl_member`;
CREATE TABLE IF NOT EXISTS `tbl_member` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_name` varchar(100) NOT NULL,
  `member_mid` varchar(20) NOT NULL,
  `member_img` varchar(50) DEFAULT NULL,
  `member_type` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=Others 1=Shareholders, 2=Outlets,\r\n3=Outside members\r\n4=Misc\r\n5=Shop\r\n6=Customer',
  `member_gender` int(11) NOT NULL,
  `member_pnumber` varchar(20) NOT NULL,
  `member_email` varchar(20) NOT NULL,
  `member_address` varchar(100) NOT NULL,
  `member_dob` date NOT NULL,
  `member_panchayath` int(11) NOT NULL,
  `member_district` int(11) NOT NULL,
  `member_state` int(11) NOT NULL,
  `member_share_aahar` int(60) DEFAULT NULL,
  `member_share_pan` varchar(50) DEFAULT NULL,
  `member_share_no_shares` double DEFAULT NULL,
  `member_outlet_code` varchar(50) DEFAULT NULL,
  `member_shop` varchar(100) DEFAULT NULL,
  `member_shop_name` varchar(255) DEFAULT NULL,
  `member_shop_gst` varchar(200) DEFAULT NULL,
  `member_gst` varchar(100) DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `member_status` tinyint(4) NOT NULL DEFAULT 1,
  `area_of_shed` double DEFAULT NULL,
  `area_capacity` double DEFAULT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`member_id`, `member_name`, `member_mid`, `member_img`, `member_type`, `member_gender`, `member_pnumber`, `member_email`, `member_address`, `member_dob`, `member_panchayath`, `member_district`, `member_state`, `member_share_aahar`, `member_share_pan`, `member_share_no_shares`, `member_outlet_code`, `member_shop`, `member_shop_name`, `member_shop_gst`, `member_gst`, `created_at`, `updated_at`, `member_status`, `area_of_shed`, `area_capacity`) VALUES
(1, 'Ajith', '1', '1.jpg', 1, 1, '9809402838', '123@gmail.com', 'test', '1989-10-30', 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-30', '0000-00-00', 1, NULL, NULL),
(2, 'Jishnu', '1', 'index.jpg', 1, 1, '7559972845', 'j4mejishnu@yahoo.com', 'Pulappatta House', '1995-03-05', 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-04', '0000-00-00', 1, NULL, NULL),
(3, 'Anil Kumar', '3', '3.jpg', 1, 1, '7559972542', 'anilkumar123@gmail.c', 'Test address', '1995-03-10', 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-16', '0000-00-00', 1, NULL, NULL),
(4, 'Neena', '4', 'abstract1.jpg', 3, 2, '5689653242', 'neena@123.com', 'Test address', '1995-02-06', 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-03', '0000-00-00', 1, NULL, NULL),
(5, 'RAHUL', 'ABC100', 'abstract3.jpg', 2, 1, '7558859456', 'rahul@gmail.com', 'Test address', '2022-03-06', 0, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-06', '0000-00-00', 1, NULL, NULL),
(6, 'ALLEN', 'ABC101', 'abstract6.jpg', 2, 1, '7559865981', 'allen123@gmail.com', 'Test address', '1990-12-10', 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-19', '0000-00-00', 1, NULL, NULL),
(7, 'adsadasd', '1234ed', 'profile_pic.png', 1, 2, '34134214', 'rajeev654@gamil.com', 'asdasdd', '2022-03-14', 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-14', '0000-00-00', 1, NULL, NULL),
(8, 'Big Mall Ent', '478854', 'Not uploaded', 1, 1, '34134214', 'rajeev654@gamil.com', 'affafsdsadasd', '2022-03-15', 5, 5, 1, 2147483647, 'AEPD23DDD', 50, NULL, NULL, NULL, NULL, NULL, '2022-03-15', '0000-00-00', 1, NULL, NULL),
(9, 'wewewd', '1234ed', 'Not uploaded', 2, 1, '34134214', 'rajeev654@gamil.com', 'adfadsasd', '2022-03-15', 5, 5, 1, NULL, NULL, NULL, '2343434', NULL, NULL, NULL, NULL, '2022-03-15', '0000-00-00', 1, NULL, NULL),
(10, 'Kalika Shops', 'S12334e34', 'Not uploaded', 5, 1, '787454211', 'rajeev654@gamil.com', 'dsadasdasdasdasdasdsadaddasddasdasdadwrtvscfdgf', '2022-03-17', 4, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-17', '0000-00-00', 1, NULL, NULL),
(11, 'JAMES MATHEW', '84765415465', 'Not uploaded', 6, 1, '4567895113', 'james@gmail.com', 'aasdasdasdasdasdasd', '2022-03-23', 1, 1, 1, NULL, NULL, NULL, NULL, 'CHick Center', NULL, NULL, 'asd34dsds34ew', '2022-03-23', '0000-00-00', 1, NULL, NULL),
(12, 'Rajesh', 'FS01', 'Not uploaded', 0, 1, '09962325950', 'freedomvarsha@gmail.', 'Souparnika, Kakkakkunnu P.O,\r\nSooranad South,\r\nKollam', '2022-04-02', 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 1, NULL, NULL),
(13, 'Prasad', 'FS2', 'Not uploaded', 0, 1, '09962325950', 'freedomvarsha@gmail.', 'Souparnika, Kakkakkunnu P.O,\r\nSooranad South,\r\nKollam', '0000-00-00', 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 1, NULL, NULL),
(14, 'Ponnu', '9876435435345', 'Not uploaded', 3, 1, '78451239894', 'ponnu@gmail.com', 'Havana', '2022-04-05', 4, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-05', '0000-00-00', 1, 5000, 600),
(15, 'Rajeev', '85786748', NULL, 3, 1, '', '', 'Ernakulam', '2000-01-01', 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member_commission_details`
--

DROP TABLE IF EXISTS `tbl_member_commission_details`;
CREATE TABLE IF NOT EXISTS `tbl_member_commission_details` (
  `commission_id` int(11) NOT NULL AUTO_INCREMENT,
  `commission_member_id_fk` int(11) NOT NULL,
  `commission_type_id_fk` int(11) NOT NULL,
  `commission_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=Inactive,1=Active',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`commission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member_type`
--

DROP TABLE IF EXISTS `tbl_member_type`;
CREATE TABLE IF NOT EXISTS `tbl_member_type` (
  `member_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_type_name` varchar(100) NOT NULL,
  `member_type_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=Inactive, 1=Active',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`member_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_member_type`
--

INSERT INTO `tbl_member_type` (`member_type_id`, `member_type_name`, `member_type_status`, `created_at`, `updated_at`) VALUES
(1, 'Share Holder', 1, '2022-02-04 02:44:12', '2022-02-03 14:45:01'),
(2, 'Outlets', 1, '2022-02-04 02:44:12', '2022-02-03 14:45:01'),
(3, 'Outside members', 1, '2022-02-04 02:44:12', '2022-02-03 14:45:01'),
(4, 'Test Member 1', 1, '2022-02-04 02:44:12', '2022-02-03 14:45:01'),
(5, 'Shop', 1, '2022-03-17 12:24:27', '2022-03-16 19:54:41'),
(6, 'Customer', 1, '2022-03-23 22:12:26', '2022-03-23 11:12:49'),
(7, 'Integration Farmer', 1, '2022-04-12 09:31:03', '2022-04-12 04:01:03'),
(8, 'Retailer', 1, '2022-04-12 09:31:03', '2022-04-12 04:01:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mem_account`
--

DROP TABLE IF EXISTS `tbl_mem_account`;
CREATE TABLE IF NOT EXISTS `tbl_mem_account` (
  `mem_acc_id` int(11) NOT NULL AUTO_INCREMENT,
  `mem_acc_id_fk` int(11) NOT NULL,
  `mem_acc_old_bal` double NOT NULL,
  `mem_acc_status` tinyint(2) NOT NULL DEFAULT 1,
  PRIMARY KEY (`mem_acc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mem_account`
--

INSERT INTO `tbl_mem_account` (`mem_acc_id`, `mem_acc_id_fk`, `mem_acc_old_bal`, `mem_acc_status`) VALUES
(1, 11, 0, 1),
(2, 5, 500, 1),
(3, 10, 500, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

DROP TABLE IF EXISTS `tbl_orders`;
CREATE TABLE IF NOT EXISTS `tbl_orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=Pending,1=Completed',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`order_id`, `user_id`, `item_id`, `quantity`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 10, 1, '2022-04-18 08:39:15', '2022-04-18 03:09:15'),
(2, 2, 4, 25, 1, '2022-04-18 08:44:57', '2022-04-18 03:14:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_overtime`
--

DROP TABLE IF EXISTS `tbl_overtime`;
CREATE TABLE IF NOT EXISTS `tbl_overtime` (
  `overtym_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id_fk` int(11) NOT NULL,
  `total_amount` varchar(100) NOT NULL,
  `overtym_date` date NOT NULL,
  `overtym_hrs` int(11) NOT NULL,
  `overtym_status` int(11) NOT NULL,
  PRIMARY KEY (`overtym_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_overtime`
--

INSERT INTO `tbl_overtime` (`overtym_id`, `emp_id_fk`, `total_amount`, `overtym_date`, `overtym_hrs`, `overtym_status`) VALUES
(1, 8, '1200', '2020-03-01', 2, 1),
(2, 2, '1000', '2020-10-16', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_panchayath`
--

DROP TABLE IF EXISTS `tbl_panchayath`;
CREATE TABLE IF NOT EXISTS `tbl_panchayath` (
  `panchayath_id` int(11) NOT NULL AUTO_INCREMENT,
  `panchayath_district` int(11) NOT NULL,
  `panchayath_name` varchar(50) NOT NULL,
  `panchayath_address` varchar(100) NOT NULL,
  `panchayath_number` varchar(20) NOT NULL,
  `panchayath_incharge` varchar(50) NOT NULL,
  `panchayath_status` int(11) NOT NULL,
  `panchayath_created_at` date NOT NULL,
  `panchayath_updated_at` date NOT NULL,
  PRIMARY KEY (`panchayath_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_panchayath`
--

INSERT INTO `tbl_panchayath` (`panchayath_id`, `panchayath_district`, `panchayath_name`, `panchayath_address`, `panchayath_number`, `panchayath_incharge`, `panchayath_status`, `panchayath_created_at`, `panchayath_updated_at`) VALUES
(1, 1, 'Vennala', 'dfdtes', '9809402848', 'Jacob', 1, '0000-00-00', '0000-00-00'),
(2, 4, 'Padamugal', 'Test address of the mentioned panchayath', '8089706025', 'Test Incharge Name', 1, '0000-00-00', '0000-00-00'),
(3, 1, 'hello', 'awsdasdasd', '322323', 'me', 0, '0000-00-00', '0000-00-00'),
(4, 2, 'Thodiyoor', 'asdfhgdfhgff', '87515263213', 'raghu', 1, '2022-03-15', '2022-03-15'),
(5, 5, 'Adhavanad', 'azfafddfsdafdsfdf', '23234335464', 'refsf', 1, '2022-03-15', '2022-03-15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payroll`
--

DROP TABLE IF EXISTS `tbl_payroll`;
CREATE TABLE IF NOT EXISTS `tbl_payroll` (
  `payroll_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id_fk` int(11) NOT NULL,
  `sal_month` int(11) NOT NULL,
  `payroll_basicsalary` int(11) NOT NULL,
  `payroll_leaveded` int(11) NOT NULL,
  `payroll_epf` int(11) NOT NULL,
  `payroll_salary` int(11) NOT NULL,
  `payroll_salarydate` date NOT NULL,
  `overtime_pay` int(11) NOT NULL,
  `advance_pay` int(11) NOT NULL,
  `payroll_status` int(11) NOT NULL,
  PRIMARY KEY (`payroll_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payroll`
--

INSERT INTO `tbl_payroll` (`payroll_id`, `emp_id_fk`, `sal_month`, `payroll_basicsalary`, `payroll_leaveded`, `payroll_epf`, `payroll_salary`, `payroll_salarydate`, `overtime_pay`, `advance_pay`, `payroll_status`) VALUES
(1, 3, 1, 12000, 1, 0, 0, '2020-01-31', 0, 0, 1),
(2, 8, 3, 10000, 1, 0, 9200, '2020-03-31', 0, 0, 1),
(3, 1, 3, 10000, 0, 0, 10000, '2020-03-31', 0, 0, 1),
(4, 3, 7, 12000, 461, 0, 10539, '2020-07-07', 0, 0, 1),
(6, 2, 6, 12000, 0, 1440, 10560, '2020-07-08', 0, 0, 1),
(7, 2, 10, 12000, 461, 1440, 10099, '1970-01-01', 1000, 1000, 1),
(8, 2, 10, 12000, 461, 1440, 10099, '2020-10-30', 1000, 1000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE IF NOT EXISTS `tbl_product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `product_code` varchar(100) DEFAULT NULL,
  `product_type` int(11) NOT NULL,
  `product_sub_type` int(11) NOT NULL,
  `product_unit` int(11) NOT NULL,
  `product_open_stock` int(11) NOT NULL,
  `product_stock` int(20) NOT NULL,
  `min_stock` int(11) NOT NULL,
  `product_des` varchar(100) NOT NULL,
  `product_status` int(11) NOT NULL,
  `product_created_date` date NOT NULL,
  `product_updated_date` date NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_code`, `product_type`, `product_sub_type`, `product_unit`, `product_open_stock`, `product_stock`, `min_stock`, `product_des`, `product_status`, `product_created_date`, `product_updated_date`) VALUES
(2, 'Equipment', 'CODE1', 2, 0, 3, 50, 50, 10, 'Test description for equipment', 1, '2022-02-22', '2022-02-22'),
(3, 'Medicine', 'CODE2', 4, 0, 3, 50, 50, 10, 'Test description for medicines', 1, '2022-02-22', '2022-02-22'),
(4, 'Vaccines', 'CODE3', 3, 0, 3, 50, 50, 10, 'Test description for vaccines', 1, '2022-02-22', '2022-02-22'),
(5, 'Broiler Chicken', 'CODE4', 1, 0, 2, 100, 100, 10, 'Test Description', 1, '2022-04-08', '2022-04-08'),
(6, 'Layer', 'CODE5', 1, 0, 2, 100, 1100, 50, 'Test description', 1, '2022-02-22', '2022-02-22'),
(7, 'Anti-biotic', 'CODE6', 4, 0, 4, 50, 50, 10, 'Anti Biotic', 1, '2022-03-15', '2022-03-15'),
(8, 'Agriculture', 'PC109', 2, 0, 4, 100, 100, 50, 'sadsadasdasd', 1, '2022-04-07', '2022-04-07'),
(9, 'Feeds', 'CODE10', 5, 0, 2, 100, 100, 10, 'dsadasdsadd', 1, '2022-04-12', '2022-04-12'),
(10, 'Agri Equipments', 'CODE11', 2, 0, 9, 100, 100, 20, 'sadsadad', 1, '2022-04-12', '2022-04-12'),
(11, 'Chicken Net', 'CODE12', 2, 0, 4, 200, 200, 20, 'asdasddsd', 1, '2022-04-12', '2022-04-12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_production_details`
--

DROP TABLE IF EXISTS `tbl_production_details`;
CREATE TABLE IF NOT EXISTS `tbl_production_details` (
  `production_id` int(11) NOT NULL AUTO_INCREMENT,
  `production_item_id_fk` int(11) NOT NULL,
  `production_mfd` varchar(20) NOT NULL,
  `production_expiry` varchar(20) NOT NULL,
  `production_quantity` int(11) NOT NULL,
  `production_price` int(11) NOT NULL,
  `production_chicken_type` tinyint(2) DEFAULT NULL COMMENT 'Broiler=1&Layer=2',
  `production_row_mat_count` int(11) NOT NULL,
  `production_unit_id_fk` int(11) NOT NULL,
  `production_packet_weight` int(11) NOT NULL,
  `production_packet_count` int(11) DEFAULT NULL,
  `production_chicken_count` int(11) NOT NULL,
  `production_chicken_weight` double DEFAULT NULL,
  `production_chicken_waste` double DEFAULT NULL,
  `production_chicken_old_stock` int(11) DEFAULT NULL,
  `production_chicken_new_bal` int(11) DEFAULT NULL,
  `production_qr` varchar(5000) DEFAULT NULL,
  `production_barcode` varchar(5000) DEFAULT NULL,
  `production_code` varchar(50) DEFAULT NULL,
  `production_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=Inactive, 1=Active',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`production_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_production_details`
--

INSERT INTO `tbl_production_details` (`production_id`, `production_item_id_fk`, `production_mfd`, `production_expiry`, `production_quantity`, `production_price`, `production_chicken_type`, `production_row_mat_count`, `production_unit_id_fk`, `production_packet_weight`, `production_packet_count`, `production_chicken_count`, `production_chicken_weight`, `production_chicken_waste`, `production_chicken_old_stock`, `production_chicken_new_bal`, `production_qr`, `production_barcode`, `production_code`, `production_status`, `created_at`, `updated_at`) VALUES
(1, 2, '2022-03-23', '2022-03-23', 10, 120, 1, 10, 2, 10, 2, 10, 22, NULL, NULL, NULL, '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', 'ABC005', 1, '2022-03-23 16:57:12', '2022-03-23 00:27:12'),
(2, 4, '2022-03-24', '2022-03-26', 10, 250, 2, 10, 2, 10, 2, 10, 26, NULL, NULL, NULL, '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/vnn29vb9+/fHwRBSUlJTU3Nxx9/nHz0zDPPXLx4Mfmot+rq6h9++KH3ym233bZw4cLkYD0+RVFR0VNPPbVz586YIo8ePTp8+PCtW7e+9NJLyZWlS5du2rSpra2tra1t2LBhTU1NU6dOTTZh+PDh99133/79+8+dOzdkyJCVK1euWLEieWrBggV79uw5derUdTUaAABuDv52HgAAspKfn7969eozZ87s2LFj+vTpp0+frq+vHzVq1MmTJ4MgOHz48NWrV8ePH592qqioqLu7e/To0e+8886CBQsee+yxPXv2XLlyJbVh1KhRqc+lpaWXL1/OmD31v8JevXr1xIkTL7zwwpo1a5K/P9NnimHDhiU/RBV58ODBIAgmTZqUWpk0aVJHR8eRI0daWlqCIHj88cdTTUgdP3To0J9//llTU5M6NX78+NOnT//88899tBIAADCdBwCAfikuLp42bdqHH3545syZxsbGM2fOrFy5MgiC5E/S33333eEjixcvHj169NatWwsKCt54443a2treT2+99dbU57y8vL/++iu+gPz8/Pvvv3/z5s1lZWW7du3KJkVpaWnyQ1SRFy9eTFsvKysLgqCjoyP8KC3a2LFjB/ztueeeC4Lg7Nmz8VcAAACCICi40QUAAMD/pPz8/Hnz5u3evTv5mzN33nlnEATt7e333ntv720HDhzYsGHD5s2bU/957JYtW/6V7A888EBHR0e/UkQVmVovLy9PrrS1tQVBUFpampzFnz17NvUb96n/Gjd56vjx40OHDr3+GwEAwM3G384DAEDfvv/++wEDBnz22Wdp66WlpQ899FAQBGPHji0oKEj+RExvx48fD4Ig9fMv3d3dhw8f7vMP5PvU3d3d2to6evTofqWIKvLRRx8NgmDv3r2plb179w4aNGjMmDHjx4/Py8v76quvUo+Sv3UTBMG4ceMKCgp6n1q9enVxcXFnZ+d13g4AAG4GpvMAANC36urqKVOm1NXVffDBB0ePHu3q6jp16tT7779/6NCh+vr6IAgGDx5cV1f35ptv7t+/v6ur68cff6yurn755ZeTI+xEItHZ2Xnq1KmZM2e2tbVF/bh8ls6dOzdnzpwrV64sXLgw+HtKnk2KqCKrqqpefPHFJUuW7Nu379KlS9u3b29sbKyvry8sLKyoqKirq1u+fPk333xz4cKFxYsXHzt2LBmtoqJizpw59fX1X3zxRWdn5759+9asWbNkyZLbb7/9em4HAAA3CdN5AADIyo4dO1auXLlly5Zx48YNGjRo7NixX3/9dUtLS1VVVXLD22+//corr8yYMeOOO+6YPHny5MmTGxsbR4wYsW3btubm5rKysokTJ95zzz0NDQ2tra0XLlzoV/Y9e/Ykf9s9Pz9/+PDh7e3tLS0tI0eODIKgXykyFhkEwXvvvTdnzpxZs2aVlZU1NDQ0NjYuXbo0eSSRSMycOXPKlClDhgw5ceLE9OnTU9ESicTrr7++cOHC0tLS+fPnr1q1asWKFf+svQAAcLP5D1vE/Rn1NrwSAAAAAElFTkSuQmCC', 'ABC006', 1, '2022-03-23 17:15:04', '2022-03-23 00:45:04'),
(3, 5, '2022-03-23', '2022-03-24', 10, 100, 1, 10, 2, 10, 5, 10, 23, NULL, NULL, NULL, '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', 'ABC007', 1, '2022-03-23 17:29:35', '2022-03-23 00:59:35'),
(4, 2, '2022-04-11', '2022-04-17', 10, 202, 1, 800, 1, 200, 10, 2, 5, NULL, NULL, NULL, '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', 'NU877', 1, '2022-04-11 12:39:07', '2022-04-11 07:09:07'),
(5, 0, '2022-04-11', '2022-04-13', 50, 3500, 1, 200, 1, 130, 10, 13, 32, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-04-11 05:29:00', '2022-04-11 11:59:09'),
(6, 0, '2022-04-12', '2022-04-14', 50, 100, 1, 1, 2, 50, 40, 50, 120, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-04-12 09:20:49', '2022-04-12 03:50:50'),
(7, 8, '2022-04-12', '2022-04-14', 50, 100, 2, 2, 2, 80, 20, 100, 220, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-04-12 09:42:01', '2022-04-12 04:12:03'),
(8, 2, '2022-04-13', '2022-04-18', 30, 100, 1, 170, 1, 500, 50, 100, 230, 60, NULL, NULL, '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', 'CODE665', 1, '2022-04-13 14:41:19', '2022-04-13 09:11:33'),
(9, 3, '2022-04-14', '2022-04-18', 110, 100, 1, 70, 2, 1, 70, 50, 110, 40, 145, 35, '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AAAAADlm+A4AAAAAADlm+A4AAAAAADlm+A4AAAAAADlm+A4AAAAAADlm+A4AAAAAADlm+A4AAAAAADlm+A4AAAAAADlm+A4AAAAAADlm+A4AAAAAADlm+A4AAAAAADlm+A4AAAAAADlm+A4AAAAAADlm+A4AAAAAADlm+A4AAAAAADlm+A4AAAAAADlm+A4AAAAAADlm+A4AAAAAADlm+A4AAAAAADlm+A4AAAAAADnWp6ur65+uAQAAAAAAbit++Q4AAAAAADlm+A4AAAAAADlm+A4AAAAAADlm+A4AAOH279//zDPPlJSUFBYWPvLII3Pnzv3tt99uQd6RI0f2+a/8/Pzy8vIpU6acPHnyFqTONHXq1PHjx/8jqQEA4P+a4TsAAIRoamqaMGFCVVVVS0vLxYsXd+3a9eOPPz7++OOXLl26Bdmrq6u7urq6urquXr164MCBX3/9taqqqrOz8xakBgAAcsLwHQAAQqxdu3bChAkLFy7s379/3759H3vssYaGhhMnTjQ0NNzKMu64447Kysply5a1tLQcPnz4VqYGAABuhuE7AACEOH/+fFtbW/crAwYM6OrqmjVrVurKmjVrKioq+vbtW1FR8c477yQvdnR0LF26dPDgwYWFheXl5XPmzPnzzz+Tt0pKStatW/fcc88VFRXdd999c+bM6ejoyKaYgoKCgoKCQYMG9ZiiqKho4cKFlZWVJSUln3/+eVSRnZ2da9asGTZsWN++fYcNG7Z58+ZUro6OjjfeeKO8vLy4uHjWrFl//PFH90rWrVtXUVFRWFg4fPjwTz/9NOt2AgDAv47hOwAAhKiurv7hhx/Gjx+/c+fO33//PXPBwoUL6+rqEonE2bNnt2zZsmHDhlWrVgVBUFNT09jY+M0337S3t+/evXvXrl3r169P7aqtra2urm5tbf3iiy+2bduWSCTiy7h+/frPP/9cV1e3YcOGBx98MHkxPsXGjRsbGhqam5uffvrpqCJnzpy5du3aRCLR2tq6bNmyefPmrVu3Lrl9+vTpX331VWNj47Fjx/Ly8hobG1ORly5dunLlytWrV58/f37lypUzZszYvn37DfYXAABud326urr+6RoAAOB/zvXr12traxOJxJUrV/Ly8kaPHv3CCy/MmzevuLg4CIILFy6UlZWtX79+/vz53XddunSptLR027ZtU6dOTV556aWX2tra9u3bFwRBSUlJVVXVZ599lrz1/PPPX7x4MXmru5EjR/7000/dr9x1110LFixIzs3jUxQVFT377LM7d+6MKfLo0aNDhw7dunXrq6++mryyZMmSjRs3tra2tra2DhkypKGhYcqUKckmDB06dNCgQfv27Tt37tzAgQNXrFixfPny5K758+fv2bPn1KlTN9VoAAC4TfnlOwAAhMjPz1+1atWZM2d27Ngxbdq006dP19bWjhgx4uTJk0EQHDp06Nq1a+PGjUvbVVRU1NnZOWrUqA8++GD+/PlPPvnknj17rl69mlowYsSI1OfS0tIrV66EZk/9w9Vr166dOHHi5ZdfXr169YcffphNiiFDhiQ/RBV54MCBIAgmTpyYujJx4sT29vbDhw83NzcHQfDUU0+lmpDafvDgwb/++quqqiq1a9y4cadPn/7ll196aCUAAPwrGb4DAECk4uLiqVOnfvLJJ2fOnKmvrz9z5syKFSuCIEi+Dv7+++/P3LJo0aJRo0Zt3bq1oKDgrbfeqq6u7n73zjvvTH3Oy8v7+++/4wvIz89/6KGHNm3aVFZWtmvXrmxSlJaWJj9EFXnx4sW062VlZUEQtLe3Z95KizZmzJg+//Xiiy8GQXD27Nn4IwAAwL9TwT9dAAAA/B/Iz8+fO3fu7t27ky+Euffee4MgaGtrS72HPWn//v3r16/ftGlT6v+ybtmyJSfZH3744fb29l6liCoydb28vDx5pbW1NQiC0tLS5Kj97NmzAwYMSN5K/dfZ5K7jx48PHjz45k8EAAC3Pb98BwCAdEeOHOnTp8+XX36Zdr20tPTRRx8NgmDMmDEFBQXJ97d0d/z48SAIUu9m6ezsPHToUI8/b+9RZ2dnS0vLqFGjepUiqsgnnngiCIK9e/emruzdu7dfv36jR48eN25cXl7et99+m7qVfBFNEARjx47Ny8vrvuu9994rLi6+fPnyTZ4OAABuS4bvAACQbvjw4ZMnT66pqfn444+PHj3a0dFx6tSpzZs3Hzx4sLa2NgiC/v3719TUvP322/v27evo6Dhy5MjIkSNfe+21sWPHFhQUJBKJy5cvnzp1asaMGa2trVEvds/SuXPnZs+effXq1QULFgRBkH2KqCIrKytfeeWVxYsXNzU1Xbp0afv27fX19bW1tYWFhQMGDKipqVm2bNn3339/4cKFRYsWHTt2LBkteau2tvbrr7++fPlyU1PTu+++u3jx4rvvvvtmTgcAALcrw3cAAAixY8eOFStWbNmyZezYsf369RszZsx3333X3NxcWVmZXPD++++//vrr06dPv+eeeyZNmjRp0qT6+vphw4Zt27atsbGxrKxswoQJDzzwQF1dXUtLy4ULF3qVfc+ePcn3qufn5w8dOrStra25uXn48OFBEPQqRWiRQRB89NFHs2fPnjlzZllZWV1dXX19/ZIlS5JbEonEjBkzJk+ePHDgwBMnTkybNi0VLZFIvPnmmwsWLCgtLZ03b97KlSuXL19+Y+0FAIDb3n8Aikr0ImbQ4VkAAAAASUVORK5CYII=', 'CODE42245', 1, '2022-04-14 09:50:59', '2022-04-14 04:21:00'),
(10, 3, '2022-04-14', '2022-04-21', 50, 100, 1, 30, 2, 1, 30, 120, 50, 20, 145, 95, NULL, NULL, 'A7845646', 1, '2022-04-14 10:06:36', '2022-04-14 04:36:36');
INSERT INTO `tbl_production_details` (`production_id`, `production_item_id_fk`, `production_mfd`, `production_expiry`, `production_quantity`, `production_price`, `production_chicken_type`, `production_row_mat_count`, `production_unit_id_fk`, `production_packet_weight`, `production_packet_count`, `production_chicken_count`, `production_chicken_weight`, `production_chicken_waste`, `production_chicken_old_stock`, `production_chicken_new_bal`, `production_qr`, `production_barcode`, `production_code`, `production_status`, `created_at`, `updated_at`) VALUES
(11, 3, '2022-04-14', '2022-04-21', 50, 100, 1, 30, 2, 1, 30, 120, 50, 20, 145, 95, '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vfRSa2vrvn37QgglJSWVlZWfffZZ6tbzzz9/8eLF1K3uRowY8dNPP3W/ctddd82fPz81Fo9PUVRU9Oyzz+7YsSOmyKNHjw4ZMmTLli2vvvpq6srixYs3bNjQ0tLS0tIyaNCghoaGyZMnp5owZMiQAQMG7Nu379y5c/3791++fPmyZctSu+bNm7d79+5Tp079o0YDAMBtwe/WAQAghBDy8/NXrlx55syZ7du3T5069fTp0zU1NcOHDz958mQI4dChQ9euXRs7dmzarqKioo6OjpEjR37wwQfz5s178sknd+/effXq1a4Fw4cP7/pcWlp65cqVrNm7/pfptWvXTpw48fLLL69aterDDz/MJcWgQYNSH6KKPHDgQAhhwoQJXVcmTJjQ1tZ2+PDhpqamEMJTTz3V1YSu7QcPHvzrr78qKyu7do0dO/b06dO//PJLD60EAID/AmbrAADwf4qLi6dMmfLJJ5+cOXOmvr7+zJkzy5cvDyGkXsV+//33Z25ZuHDhyJEjt2zZUlBQ8NZbb1VVVXW/e+edd3Z9zsvL+/vvv+MLyM/Pf+ihhzZu3FhWVrZz585cUpSWlqY+RBV58eLFtOtlZWUhhLa2tsxbadFGjx7d619efPHFEMLZs2fjjwAAAP8NCm51AQAA8P9Rfn7+nDlzdu3alXpby7333htCaG1t7XoHesr+/fvXrVu3cePGrn95unnz5n9L9ocffritrS1Riqgiu66Xl5enrrS0tIQQSktLU5P0s2fP9uvXL3Wr6x+6pnYdP3584MCB//xEAABwm/G7dQAACEeOHOnVq9eXX36Zdr20tPTRRx8NIYwePbqgoCD1cpXujh8/HkLoenFKR0fHoUOHevxxeo86Ojqam5tHjhyZKEVUkU888UQIYc+ePV1X9uzZ06dPn1GjRo0dOzYvL+/bb7/tupV6S0wIYcyYMXl5ed13vffee8XFxZcvX/6HpwMAgNuA2ToAAIRhw4ZNmjSpurr6448/Pnr0aHt7+6lTpzZt2nTw4MGampoQQt++faurq99+++19+/a1t7cfOXJkxIgRr7322pgxYwoKCurq6i5fvnzq1Knp06e3tLREvVQ9R+fOnZs1a9bVq1fnz58fQsg9RVSRFRUVr7zyyqJFi/bu3Xvp0qVt27bV19fX1NQUFhb269evurp66dKl33///YULFxYuXHjs2LFUtNStmpqar7/++vLly3v37n333XcXLVp09913/5PTAQDA7cFsHQAAQghh+/bty5cv37x585gxY/r06TN69OjvvvuuqampoqIiteD9999//fXXp02bds8990ycOHHixIn19fVDhw7dunVrY2NjWVnZ+PHjH3jggdra2ubm5gsXLiTKvnv37tQ7zfPz84cMGdLa2trU1DRs2LAQQqIUWYsMIXz00UezZs2aMWNGWVlZbW1tfX394sWLU1vq6uqmT58+adKk/v37nzhxYurUqV3R6urq3nzzzfnz55eWls6dO3fFihXLli27sfYCAMBt5n8AbkPrK43z2QYAAAAASUVORK5CYII=', 'A7845646', 1, '2022-04-14 10:08:18', '2022-04-14 04:38:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_production_details_old`
--

DROP TABLE IF EXISTS `tbl_production_details_old`;
CREATE TABLE IF NOT EXISTS `tbl_production_details_old` (
  `production_id` int(11) NOT NULL AUTO_INCREMENT,
  `production_item_id_fk` int(11) NOT NULL,
  `production_mfd` varchar(20) NOT NULL,
  `production_expiry` varchar(20) NOT NULL,
  `production_quantity` int(11) NOT NULL,
  `production_price` int(11) NOT NULL,
  `production_row_mat_count` int(11) NOT NULL,
  `production_unit_id_fk` int(11) NOT NULL,
  `production_packet_weight` int(11) NOT NULL,
  `production_chicken_count` int(11) NOT NULL,
  `production_qr` varchar(5000) DEFAULT NULL,
  `production_code` varchar(50) DEFAULT NULL,
  `production_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=Inactive, 1=Active',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`production_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_production_details_old`
--

INSERT INTO `tbl_production_details_old` (`production_id`, `production_item_id_fk`, `production_mfd`, `production_expiry`, `production_quantity`, `production_price`, `production_row_mat_count`, `production_unit_id_fk`, `production_packet_weight`, `production_chicken_count`, `production_qr`, `production_code`, `production_status`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-03-08', '2022-03-20', 100, 100, 10, 2, 250, 1, NULL, 'A7841112', 1, '2022-03-16 10:08:46', '2022-03-07 23:39:53'),
(2, 2, '2022-03-08', '2022-03-22', 200, 150, 20, 2, 500, 10, NULL, NULL, 1, '2022-03-08 16:17:41', '2022-03-07 23:47:41'),
(3, 1, '2022-03-22', '2022-03-22', 10, 100, 10, 2, 10, 5, NULL, 'CH12AC', 1, '2022-03-22 13:08:17', '2022-03-21 20:38:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_production_itemlist`
--

DROP TABLE IF EXISTS `tbl_production_itemlist`;
CREATE TABLE IF NOT EXISTS `tbl_production_itemlist` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(100) NOT NULL,
  `product_code` varchar(50) DEFAULT NULL,
  `item_price` int(11) DEFAULT NULL,
  `item_quantity` int(11) DEFAULT NULL,
  `item_latest_qr` varchar(5000) DEFAULT NULL,
  `item_latest_barcode` varchar(5000) DEFAULT NULL,
  `item_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=Inactive,1=Active',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_production_itemlist`
--

INSERT INTO `tbl_production_itemlist` (`item_id`, `item_name`, `product_code`, `item_price`, `item_quantity`, `item_latest_qr`, `item_latest_barcode`, `item_status`, `created_at`, `updated_at`) VALUES
(1, 'Whole Chicken', 'CO1', 0, 0, NULL, NULL, 1, '2022-02-04 17:00:11', '2022-03-17 12:23:47'),
(2, 'Drumsticks', 'CO2', 100, 234, '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', 1, '2022-02-04 17:00:19', '2022-03-08 10:15:17'),
(3, 'Lollipop', 'CO3', 100, 50, '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vfRSa2vrvn37QgglJSWVlZWfffZZ6tbzzz9/8eLF1K3uRowY8dNPP3W/ctddd82fPz81Fo9PUVRU9Oyzz+7YsSOmyKNHjw4ZMmTLli2vvvpq6srixYs3bNjQ0tLS0tIyaNCghoaGyZMnp5owZMiQAQMG7Nu379y5c/3791++fPmyZctSu+bNm7d79+5Tp079o0YDAMBtwe/WAQAghBDy8/NXrlx55syZ7du3T5069fTp0zU1NcOHDz958mQI4dChQ9euXRs7dmzarqKioo6OjpEjR37wwQfz5s178sknd+/effXq1a4Fw4cP7/pcWlp65cqVrNm7/pfptWvXTpw48fLLL69aterDDz/MJcWgQYNSH6KKPHDgQAhhwoQJXVcmTJjQ1tZ2+PDhpqamEMJTTz3V1YSu7QcPHvzrr78qKyu7do0dO/b06dO//PJLD60EAID/AmbrAADwf4qLi6dMmfLJJ5+cOXOmvr7+zJkzy5cvDyGkXsV+//33Z25ZuHDhyJEjt2zZUlBQ8NZbb1VVVXW/e+edd3Z9zsvL+/vvv+MLyM/Pf+ihhzZu3FhWVrZz585cUpSWlqY+RBV58eLFtOtlZWUhhLa2tsxbadFGjx7d619efPHFEMLZs2fjjwAAAP8NCm51AQAA8P9Rfn7+nDlzdu3alXpby7333htCaG1t7XoHesr+/fvXrVu3cePGrn95unnz5n9L9ocffritrS1Riqgiu66Xl5enrrS0tIQQSktLU5P0s2fP9uvXL3Wr6x+6pnYdP3584MCB//xEAABwm/G7dQAACEeOHOnVq9eXX36Zdr20tPTRRx8NIYwePbqgoCD1cpXujh8/HkLoenFKR0fHoUOHevxxeo86Ojqam5tHjhyZKEVUkU888UQIYc+ePV1X9uzZ06dPn1GjRo0dOzYvL+/bb7/tupV6S0wIYcyYMXl5ed13vffee8XFxZcvX/6HpwMAgNuA2ToAAIRhw4ZNmjSpurr6448/Pnr0aHt7+6lTpzZt2nTw4MGampoQQt++faurq99+++19+/a1t7cfOXJkxIgRr7322pgxYwoKCurq6i5fvnzq1Knp06e3tLREvVQ9R+fOnZs1a9bVq1fnz58fQsg9RVSRFRUVr7zyyqJFi/bu3Xvp0qVt27bV19fX1NQUFhb269evurp66dKl33///YULFxYuXHjs2LFUtNStmpqar7/++vLly3v37n333XcXLVp09913/5PTAQDA7cFsHQAAQghh+/bty5cv37x585gxY/r06TN69OjvvvuuqampoqIiteD9999//fXXp02bds8990ycOHHixIn19fVDhw7dunVrY2NjWVnZ+PHjH3jggdra2ubm5gsXLiTKvnv37tQ7zfPz84cMGdLa2trU1DRs2LAQQqIUWYsMIXz00UezZs2aMWNGWVlZbW1tfX394sWLU1vq6uqmT58+adKk/v37nzhxYurUqV3R6urq3nzzzfnz55eWls6dO3fFihXLli27sfYCAMBt5n8AbkPrK43z2QYAAAAASUVORK5CYII=', 1, '2022-02-04 17:00:26', '2022-02-03 19:00:26'),
(4, 'Curry Cut', 'CO4', 250, 20, NULL, NULL, 1, '2022-02-04 17:00:34', '2022-02-03 19:00:34'),
(5, 'Biriyani Cut', 'CO5', 100, 10, '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', 1, '2022-02-04 17:00:42', '2022-02-03 19:00:42'),
(6, 'Boneless', 'CO6', 0, 0, NULL, NULL, 1, '2022-02-04 17:00:50', '2022-02-03 19:00:50'),
(7, 'Farmers Equipment 1', 'CO7', 0, 0, NULL, NULL, 1, '2022-03-16 14:14:01', '2022-02-24 13:11:19'),
(9, 'Agricultural Equipments', 'CO85', NULL, NULL, NULL, NULL, 1, '2022-04-12 10:25:00', '2022-04-11 23:25:00'),
(10, 'Mannure', 'CO55', NULL, NULL, NULL, NULL, 1, '2022-04-12 10:25:18', '2022-04-11 23:25:18'),
(11, 'Vaccines', 'CO44', NULL, NULL, NULL, NULL, 1, '2022-04-12 10:25:34', '2022-04-11 23:25:34'),
(12, 'Chicks', 'POC7884', NULL, NULL, NULL, NULL, 1, '2022-04-12 14:52:08', '2022-04-12 03:52:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_production_itemlist_old`
--

DROP TABLE IF EXISTS `tbl_production_itemlist_old`;
CREATE TABLE IF NOT EXISTS `tbl_production_itemlist_old` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(100) NOT NULL,
  `product_code` varchar(50) DEFAULT NULL,
  `item_price` int(11) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=Inactive,1=Active',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_production_itemlist_old`
--

INSERT INTO `tbl_production_itemlist_old` (`item_id`, `item_name`, `product_code`, `item_price`, `item_quantity`, `item_status`, `created_at`, `updated_at`) VALUES
(1, 'Whole Chicken', 'CO1', 100, 60, 1, '2022-02-04 17:00:11', '2022-03-17 17:53:47'),
(2, 'Drumsticks', 'CO2', 150, 70, 1, '2022-02-04 17:00:19', '2022-03-08 15:45:17'),
(3, 'Lollipop', 'CO3', 0, 0, 1, '2022-02-04 17:00:26', '2022-02-04 00:30:26'),
(4, 'Curry Cut', 'CO4', 0, 0, 1, '2022-02-04 17:00:34', '2022-02-04 00:30:34'),
(5, 'Biriyani Cut', 'CO5', 0, 0, 1, '2022-02-04 17:00:42', '2022-02-04 00:30:42'),
(6, 'Boneless', 'CO6', 0, 0, 1, '2022-02-04 17:00:50', '2022-02-04 00:30:50'),
(7, 'Farmers Equipment 1', 'CO7', 0, 0, 1, '2022-03-16 14:14:01', '2022-02-24 18:41:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_production_stock`
--

DROP TABLE IF EXISTS `tbl_production_stock`;
CREATE TABLE IF NOT EXISTS `tbl_production_stock` (
  `pstock_id` int(11) NOT NULL AUTO_INCREMENT,
  `production_id_fk` int(11) NOT NULL,
  `product_id_fk` int(11) NOT NULL,
  `pstock_price` int(11) NOT NULL,
  `pstock_quantity` int(11) NOT NULL,
  `pstock_date` date NOT NULL,
  `pstock_udate` date NOT NULL,
  `pstock_status` int(11) NOT NULL,
  PRIMARY KEY (`pstock_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_category`
--

DROP TABLE IF EXISTS `tbl_product_category`;
CREATE TABLE IF NOT EXISTS `tbl_product_category` (
  `prod_cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_cat_name` varchar(100) NOT NULL,
  `prod_cat_code` varchar(100) NOT NULL,
  `prod_cat_status` tinyint(2) NOT NULL DEFAULT 1,
  PRIMARY KEY (`prod_cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product_category`
--

INSERT INTO `tbl_product_category` (`prod_cat_id`, `prod_cat_name`, `prod_cat_code`, `prod_cat_status`) VALUES
(1, 'Chicks', 'PC100', 1),
(2, 'Poultry Equipment', 'PC101', 1),
(3, 'Chicken Vaccines', 'PC102', 1),
(4, 'Medicines', 'PC103', 1),
(5, 'Poultry Feed', 'PC104', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project_receipt`
--

DROP TABLE IF EXISTS `tbl_project_receipt`;
CREATE TABLE IF NOT EXISTS `tbl_project_receipt` (
  `receipt_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id_fk` int(11) NOT NULL,
  `receipt_id_fk` varchar(11) NOT NULL,
  `finyear_id_fk` int(11) NOT NULL,
  `receipt_number` int(11) NOT NULL,
  `receipt_amount` varchar(100) NOT NULL,
  `rept_date` date NOT NULL,
  `paid_to` varchar(200) NOT NULL,
  `narration` varchar(250) NOT NULL,
  `receipt_status` int(11) NOT NULL,
  `group` int(11) NOT NULL,
  PRIMARY KEY (`receipt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_project_receipt`
--

INSERT INTO `tbl_project_receipt` (`receipt_id`, `project_id_fk`, `receipt_id_fk`, `finyear_id_fk`, `receipt_number`, `receipt_amount`, `rept_date`, `paid_to`, `narration`, `receipt_status`, `group`) VALUES
(1, 0, '1', 0, 12658, '1000', '1970-01-01', 'SELF', ' GEGDG ', 1, 0),
(2, 0, '2', 0, 2113, '15000', '2022-04-05', 'GOPI', ' FEED', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project_receipthead`
--

DROP TABLE IF EXISTS `tbl_project_receipthead`;
CREATE TABLE IF NOT EXISTS `tbl_project_receipthead` (
  `receipt_id` int(11) NOT NULL AUTO_INCREMENT,
  `receiptId` varchar(100) NOT NULL,
  `fin_year` varchar(100) NOT NULL,
  `receipt_head` varchar(250) NOT NULL,
  `receipt_desc` varchar(255) NOT NULL,
  `receipt_date` date NOT NULL,
  `receipt_status` int(11) NOT NULL,
  PRIMARY KEY (`receipt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_project_receipthead`
--

INSERT INTO `tbl_project_receipthead` (`receipt_id`, `receiptId`, `fin_year`, `receipt_head`, `receipt_desc`, `receipt_date`, `receipt_status`) VALUES
(1, '', '', 'INTEREST', 'Interest on deposits', '0000-00-00', 1),
(2, '', '', 'SALES', 'Sale of salable   items in the inventories ', '0000-00-00', 1),
(3, '', '', 'COMMISSION', 'Commission eligible under various categories ', '0000-00-00', 1),
(4, '', '', 'GRANTS', 'Grants from NABARD/Govt. Agencies', '0000-00-00', 1),
(5, '', '', 'LOANS', 'Eligible loans from institutions', '0000-00-00', 1),
(6, '', '', 'SHARES', 'Share capital raised', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project_voucher`
--

DROP TABLE IF EXISTS `tbl_project_voucher`;
CREATE TABLE IF NOT EXISTS `tbl_project_voucher` (
  `voucher_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id_fk` int(11) NOT NULL,
  `vouch_id_fk` int(11) NOT NULL,
  `finyear_id_fk` int(11) NOT NULL,
  `voucher_number` varchar(50) NOT NULL,
  `voucher_amount` varchar(100) NOT NULL,
  `paid_to` varchar(200) NOT NULL,
  `voucher_date` date NOT NULL,
  `narration` varchar(250) NOT NULL,
  `voucher_status` int(11) NOT NULL,
  `voucher_group` int(11) NOT NULL,
  PRIMARY KEY (`voucher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_project_voucher`
--

INSERT INTO `tbl_project_voucher` (`voucher_id`, `project_id_fk`, `vouch_id_fk`, `finyear_id_fk`, `voucher_number`, `voucher_amount`, `paid_to`, `voucher_date`, `narration`, `voucher_status`, `voucher_group`) VALUES
(1, 0, 2, 0, '1234', '200', 'GOPI', '2022-04-05', ' UNLOADING CHARGES  ', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project_vouchhead`
--

DROP TABLE IF EXISTS `tbl_project_vouchhead`;
CREATE TABLE IF NOT EXISTS `tbl_project_vouchhead` (
  `vouch_id` int(11) NOT NULL AUTO_INCREMENT,
  `voucherId` varchar(100) NOT NULL,
  `fin_year` varchar(100) NOT NULL,
  `vouch_head` varchar(250) NOT NULL,
  `vouch_desc` varchar(255) NOT NULL,
  `vouch_date` date NOT NULL,
  `vouch_status` int(11) NOT NULL,
  PRIMARY KEY (`vouch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_project_vouchhead`
--

INSERT INTO `tbl_project_vouchhead` (`vouch_id`, `voucherId`, `fin_year`, `vouch_head`, `vouch_desc`, `vouch_date`, `vouch_status`) VALUES
(1, '', '', 'FARM  INTEGRATION EXPENSES', 'EXPENSES FOR GROWING LAYER AND BROILER BIRDS, COMMISSION TO FARM OWNER', '0000-00-00', 1),
(2, '', '', 'WAGES', 'WAGES OF LABORERS', '0000-00-00', 1),
(3, '', '', 'SALARIES', 'SALARY OF CEO, BRANCH MANAGER,ACCOUNTANT, PHARMACIST, DRIVER, AND ATTENDANT', '0000-00-00', 1),
(4, '', '', 'TRAVELLING EXPENSES', 'INCLUDING DIESEL/ PETROL EXPENSES,  FLIGHT/TRAIN/BUS CHARGES. APPROVED DA FOR HALTS, HOTEL ROOM RENT ETC', '0000-00-00', 1),
(5, '', '', 'TRANSPORTATION CHARGES', 'TRANSPORTATION OF FEED, BIRDS, CAGES,OTHER ITEMS', '0000-00-00', 1),
(6, '', '', 'STATUTORY PAYMENTS', 'ELECTRICITY, TELEPHONE, WATER CHARGE, BUILDING TAX, LICENSE FEE, LAND TAX, AND OTHER MANDATORY CHARGES TO GOVERNMENT', '0000-00-00', 1),
(7, '', '', 'PRINTING AND STATIONARY', 'COST OF PRINTING REGISTERS, COST OF STATIONARIES', '0000-00-00', 1),
(8, '', '', 'REPAIRS AND MAINTENANCE', 'REPAIR OF INSTALLATIONS , EQUIPMENT, VEHICLES', '0000-00-00', 1),
(9, '', '', 'INCOME TAX, AUDIT FEES, COMPANY SECRETARY FEE, GST FILING', 'EXPENSES CONNECTED WITH COMPLIANCES ', '0000-00-00', 1),
(10, '', '', 'FIXED ASSETS', 'EXPENDITURE FOR CREATING FIXED ASSETS', '0000-00-00', 1),
(11, '', '', 'LOADING AND UNLOADING CHARGES', 'EXPENSES FOR LOADING /UNLOADING OF FEED AND OTHER RELATED ITEMS', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase`
--

DROP TABLE IF EXISTS `tbl_purchase`;
CREATE TABLE IF NOT EXISTS `tbl_purchase` (
  `purchase_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id_fk` int(11) NOT NULL,
  `vendor_id_fk` int(11) NOT NULL,
  `shop_id_fk` int(11) NOT NULL,
  `login_id_fk` int(11) NOT NULL,
  `finyear` varchar(20) NOT NULL,
  `invoice_number` varchar(50) NOT NULL,
  `auto_invoice` varchar(20) NOT NULL,
  `purchase_quantity` int(11) NOT NULL,
  `purchase_price` double NOT NULL,
  `discount_price` bigint(20) NOT NULL,
  `total_price` double NOT NULL,
  `pur_old_bal` int(11) NOT NULL,
  `pur_paid_amt` int(11) NOT NULL,
  `pur_new_bal` int(11) NOT NULL,
  `purchase_date` date NOT NULL,
  `tax_id_fk` int(11) NOT NULL,
  `stockstatus` int(11) NOT NULL,
  `purchase_status` int(11) NOT NULL,
  PRIMARY KEY (`purchase_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_purchase`
--

INSERT INTO `tbl_purchase` (`purchase_id`, `product_id_fk`, `vendor_id_fk`, `shop_id_fk`, `login_id_fk`, `finyear`, `invoice_number`, `auto_invoice`, `purchase_quantity`, `purchase_price`, `discount_price`, `total_price`, `pur_old_bal`, `pur_paid_amt`, `pur_new_bal`, `purchase_date`, `tax_id_fk`, `stockstatus`, `purchase_status`) VALUES
(1, 6, 1, 0, 1, '2021 - 2022', '001', '12875463190', 1000, 100, 10, 100800, 888, 0, 101688, '2022-02-22', 2, 1, 1),
(2, 5, 1, 0, 1, '2021 - 2022', '1234', '16238405719', 50, 100, 0, 5900, 101688, 0, 107588, '2022-02-25', 1, 1, 1),
(3, 6, 1, 0, 1, '2021 - 2022', '003', '12130764958', 1000, 100, 0, 112000, 10000, 100000, 55600, '2022-03-09', 2, 0, 1),
(4, 5, 1, 0, 1, '2021 - 2022', '003', '12130764958', 300, 100, 0, 33600, 10000, 100000, 55600, '2022-03-09', 2, 0, 1),
(6, 4, 3, 0, 1, '2021 - 2022', '34453454', '18691270453', 30, 100, 0, 3000, 10, 3000, 10, '2022-03-24', 0, 0, 1),
(7, 3, 3, 0, 1, '2021 - 2022', '34453454', '17238490156', 32, 100, 0, 3200, 0, 3200, 0, '2022-03-24', 0, 0, 1),
(8, 6, 3, 0, 1, '2021 - 2022', '687351322', '13014987256', 35, 100, 0, 3500, 0, 1000, 2500, '2022-03-24', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_receive_back`
--

DROP TABLE IF EXISTS `tbl_receive_back`;
CREATE TABLE IF NOT EXISTS `tbl_receive_back` (
  `rec_id` int(11) NOT NULL AUTO_INCREMENT,
  `rec_allotment_fk` int(11) NOT NULL,
  `rec_quantity` int(11) NOT NULL,
  `rec_weight` float NOT NULL,
  `rec_unit` int(11) NOT NULL,
  `rec_given_feeds_total` float NOT NULL,
  `rec_fcr` float DEFAULT NULL,
  `rec_fpr` float DEFAULT NULL,
  `rec_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=Not active, 1=Active',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_commission_received` tinyint(1) DEFAULT 0,
  `commission_amount` float DEFAULT 0,
  PRIMARY KEY (`rec_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_receive_back`
--

INSERT INTO `tbl_receive_back` (`rec_id`, `rec_allotment_fk`, `rec_quantity`, `rec_weight`, `rec_unit`, `rec_given_feeds_total`, `rec_fcr`, `rec_fpr`, `rec_status`, `created_at`, `updated_at`, `is_commission_received`, `commission_amount`) VALUES
(1, 1, 50, 230, 2, 65, 0.769231, NULL, 1, '0000-00-00 00:00:00', '2022-02-24 22:48:07', 1, 150),
(2, 5, 50, 250, 2, 10, 5, NULL, 1, '0000-00-00 00:00:00', '2022-03-13 21:36:09', 1, 200),
(3, 1, 50, 120, 2, 65, 0.769231, NULL, 1, '0000-00-00 00:00:00', '2022-04-13 10:21:35', 0, 0),
(4, 7, 8, 25, 2, 0, 0, NULL, 1, '0000-00-00 00:00:00', '2022-04-13 10:41:42', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_receive_item`
--

DROP TABLE IF EXISTS `tbl_receive_item`;
CREATE TABLE IF NOT EXISTS `tbl_receive_item` (
  `receival_id` int(11) NOT NULL AUTO_INCREMENT,
  `receival_item_id` int(11) NOT NULL,
  `receival_quantity` int(11) NOT NULL,
  `receival_member_id` int(11) NOT NULL,
  `receival_weight` float NOT NULL,
  `commission_amt` varchar(50) NOT NULL,
  `receival_unit_fk` int(11) NOT NULL,
  `receival_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=not received, 1=received',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`receival_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_receive_item`
--

INSERT INTO `tbl_receive_item` (`receival_id`, `receival_item_id`, `receival_quantity`, `receival_member_id`, `receival_weight`, `commission_amt`, `receival_unit_fk`, `receival_status`, `created_at`, `updated_at`) VALUES
(1, 2, 4, 1, 1, '', 1, 1, '2022-02-08 16:40:23', '2022-02-08 00:10:23'),
(2, 4, 4, 1, 12, '1', 2, 1, '2022-02-09 11:35:59', '2022-02-08 19:05:59'),
(3, 4, 4, 1, 12, '1', 2, 1, '2022-02-09 11:36:56', '2022-02-08 19:06:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reminders`
--

DROP TABLE IF EXISTS `tbl_reminders`;
CREATE TABLE IF NOT EXISTS `tbl_reminders` (
  `reminder_id` int(11) NOT NULL AUTO_INCREMENT,
  `reminder_title` varchar(100) NOT NULL,
  `reminder_description` varchar(250) NOT NULL,
  `reminder_date` date NOT NULL,
  `reminder_broadcast_time` time NOT NULL,
  `reminder_no_of_times` int(11) NOT NULL DEFAULT 1,
  `reminder_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=Inactive,1=Active',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`reminder_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_reminders`
--

INSERT INTO `tbl_reminders` (`reminder_id`, `reminder_title`, `reminder_description`, `reminder_date`, `reminder_broadcast_time`, `reminder_no_of_times`, `reminder_status`, `created_at`, `updated_at`) VALUES
(1, 'Hello', 'Test description', '2022-04-12', '00:00:00', 0, 1, '2022-04-11 14:23:57', '2022-04-11 08:53:57'),
(2, 'as', 'as', '2022-04-12', '17:10:00', 1, 1, '2022-04-11 14:32:01', '2022-04-11 09:02:01'),
(3, 'Reminder 2', 'R2 Reminder', '2022-04-12', '19:50:00', 4, 1, '2022-04-11 14:58:14', '2022-04-11 09:04:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sale`
--

DROP TABLE IF EXISTS `tbl_sale`;
CREATE TABLE IF NOT EXISTS `tbl_sale` (
  `sale_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id_fk` int(11) NOT NULL,
  `product_id_fk` int(11) NOT NULL,
  `shop_id_fk` int(11) NOT NULL,
  `login_id_fk` int(11) NOT NULL,
  `size_id_fk` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_address` varchar(500) NOT NULL,
  `customer_gst` varchar(50) DEFAULT NULL,
  `customer_phone` varchar(50) DEFAULT NULL,
  `customer_email` varchar(50) DEFAULT NULL,
  `finyear` varchar(11) NOT NULL,
  `invoice_number` varchar(50) NOT NULL,
  `auto_invoice` varchar(255) NOT NULL,
  `hsn` varchar(50) NOT NULL,
  `sale_quantity` bigint(20) NOT NULL,
  `sale_price` double NOT NULL,
  `discount_price` double NOT NULL,
  `total_price` double NOT NULL,
  `customer_paid_amt` double DEFAULT NULL,
  `customer_old_bal` double DEFAULT NULL,
  `sale_date` date NOT NULL,
  `tax_id_fk` int(11) NOT NULL,
  `sale_status` int(11) NOT NULL,
  PRIMARY KEY (`sale_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sale`
--

INSERT INTO `tbl_sale` (`sale_id`, `project_id_fk`, `product_id_fk`, `shop_id_fk`, `login_id_fk`, `size_id_fk`, `customer_name`, `customer_address`, `customer_gst`, `customer_phone`, `customer_email`, `finyear`, `invoice_number`, `auto_invoice`, `hsn`, `sale_quantity`, `sale_price`, `discount_price`, `total_price`, `customer_paid_amt`, `customer_old_bal`, `sale_date`, `tax_id_fk`, `sale_status`) VALUES
(1, 0, 2, 0, 0, 0, '1', 'CHick Center, Thiruvalla, Pathanamthitta ', '', '9809402838', '0', '2021 - 2022', '5294', '4qjtlFd36V', '30023000', 100, 150, 0, 15000, NULL, NULL, '2022-03-09', 2, 1),
(2, 0, 1, 0, 0, 0, '2', 'CHick Center, Thiruvalla, Pathanamthitta ', '', '9809402838', '0', '2021 - 2022', '2614', 'E1j2Ma67F5', '30023000', 10, 100, 0, 1000, NULL, NULL, '2022-03-09', 2, 1),
(3, 0, 1, 0, 0, 0, '2', '  asas', '', '9809402838', '0', '2021 - 2022', '6388', 'PQwSVE248e', '12213124334524', 10, 100, 0, 1000, 8000, 0, '2022-03-18', 2, 1),
(4, 0, 1, 0, 0, 0, '2', '  asas', '', '9809402838', '0', '2021 - 2022', '2788', 'bsP5mTZpR2', '4253645646565', 10, 100, 0, 1000, 8000, 0, '2022-03-18', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shares`
--

DROP TABLE IF EXISTS `tbl_shares`;
CREATE TABLE IF NOT EXISTS `tbl_shares` (
  `share_id` int(11) NOT NULL AUTO_INCREMENT,
  `share_name` varchar(100) NOT NULL,
  `share_value` float NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0-InActive,1-Active',
  PRIMARY KEY (`share_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_shares`
--

INSERT INTO `tbl_shares` (`share_id`, `share_name`, `share_value`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Share  1', 250, '2022-02-14 11:24:56', '2022-02-13 22:57:25', 1),
(2, 'Share 2', 500, '2022-02-14 11:24:39', '2022-02-14 00:24:39', 1),
(3, 'Share 3', 100, '2022-04-12 10:39:30', '2022-04-12 05:09:30', 1),
(4, 'Share 4', 1250, '2022-04-12 10:53:06', '2022-04-12 05:15:10', 1),
(5, 'Share 5', 350, '2022-04-13 10:19:12', '2022-04-13 04:49:12', 1),
(6, 'Share 6', 2000, '2022-04-13 11:32:08', '2022-04-13 06:02:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_share_purchase_details`
--

DROP TABLE IF EXISTS `tbl_share_purchase_details`;
CREATE TABLE IF NOT EXISTS `tbl_share_purchase_details` (
  `purchase_id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_shareholder_id` int(11) NOT NULL,
  `purchase_share_id` int(11) NOT NULL,
  `purchase_qty` int(11) NOT NULL,
  `purchase_total` float NOT NULL,
  `purchase_payment` float NOT NULL,
  `purchase_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=Inactive,1=Active',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`purchase_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_share_purchase_details`
--

INSERT INTO `tbl_share_purchase_details` (`purchase_id`, `purchase_shareholder_id`, `purchase_share_id`, `purchase_qty`, `purchase_total`, `purchase_payment`, `purchase_status`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 10, 5000, 4800, 1, '2022-04-13 16:14:18', '2022-04-13 10:44:18'),
(2, 8, 3, 10, 1000, 1500, 1, '2022-04-13 16:15:34', '2022-04-13 10:45:34'),
(3, 1, 6, 10, 20000, 19500, 1, '2022-04-13 16:16:41', '2022-04-13 10:46:41'),
(4, 2, 6, 5, 10000, 10000, 1, '2022-04-13 16:17:45', '2022-04-13 10:47:45'),
(5, 1, 6, 5, 10000, 9000, 1, '2022-04-13 16:33:09', '2022-04-13 11:03:09'),
(6, 1, 6, 10, 20000, 1000, 1, '2022-04-13 16:34:00', '2022-04-13 11:04:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_share_settings`
--

DROP TABLE IF EXISTS `tbl_share_settings`;
CREATE TABLE IF NOT EXISTS `tbl_share_settings` (
  `settings_id` int(11) NOT NULL AUTO_INCREMENT,
  `settings_share_id` int(11) NOT NULL,
  `settings_share_period` int(11) DEFAULT 0,
  `settings_period_type` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=Days, 1= Months',
  `settings_divident_percent` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=Inactive, 1=Active',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`settings_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_share_settings`
--

INSERT INTO `tbl_share_settings` (`settings_id`, `settings_share_id`, `settings_share_period`, `settings_period_type`, `settings_divident_percent`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 160, 0, 5, 1, '0000-00-00 00:00:00', '2022-04-12 08:33:06'),
(2, 2, 10, 1, 5, 1, '0000-00-00 00:00:00', '2022-04-12 08:33:29'),
(3, 5, 24, 1, 10, 1, '0000-00-00 00:00:00', '2022-04-13 04:49:39'),
(4, 4, 40, 1, 20, 1, '0000-00-00 00:00:00', '2022-04-13 05:52:17'),
(5, 6, 10, 1, 14, 1, '0000-00-00 00:00:00', '2022-04-13 06:02:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_share_stock_balance`
--

DROP TABLE IF EXISTS `tbl_share_stock_balance`;
CREATE TABLE IF NOT EXISTS `tbl_share_stock_balance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shareholder_id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `stock_balance` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=Inactive,1=Active',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_share_stock_balance`
--

INSERT INTO `tbl_share_stock_balance` (`id`, `shareholder_id`, `stock_id`, `stock_balance`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 10, 1, '2022-04-13 16:16:41', '2022-04-13 10:46:41'),
(2, 1, 6, 5, 1, '2022-04-13 16:17:45', '2022-04-13 10:47:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_share_transfer_history`
--

DROP TABLE IF EXISTS `tbl_share_transfer_history`;
CREATE TABLE IF NOT EXISTS `tbl_share_transfer_history` (
  `transfer_id` int(11) NOT NULL AUTO_INCREMENT,
  `transfer_from_id` int(11) NOT NULL,
  `transfer_to_id` int(11) NOT NULL,
  `transfer_share_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=Inactive,1=Active',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `transfer_no_of_shares` int(11) NOT NULL DEFAULT 0,
  `transfer_share_total` float NOT NULL DEFAULT 0,
  PRIMARY KEY (`transfer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_share_transfer_history`
--

INSERT INTO `tbl_share_transfer_history` (`transfer_id`, `transfer_from_id`, `transfer_to_id`, `transfer_share_id`, `status`, `created_at`, `updated_at`, `transfer_no_of_shares`, `transfer_share_total`) VALUES
(1, 1, 2, 1, 1, '2022-04-12 11:10:12', '2022-04-12 09:10:29', 10, 100),
(2, 2, 3, 6, 1, '2022-04-18 11:13:22', '2022-04-18 05:43:22', 1, 0),
(3, 2, 1, 6, 1, '2022-04-18 11:14:49', '2022-04-18 05:44:49', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sickleave`
--

DROP TABLE IF EXISTS `tbl_sickleave`;
CREATE TABLE IF NOT EXISTS `tbl_sickleave` (
  `sick_id` int(11) NOT NULL AUTO_INCREMENT,
  `sick_date` date NOT NULL,
  `emp_id_fk` int(11) NOT NULL,
  `sick_status` int(11) NOT NULL,
  PRIMARY KEY (`sick_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sickleave`
--

INSERT INTO `tbl_sickleave` (`sick_id`, `sick_date`, `emp_id_fk`, `sick_status`) VALUES
(1, '2020-10-15', 8, 1),
(2, '2020-10-15', 1, 1),
(3, '2020-11-28', 6, 1),
(4, '2021-11-15', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state`
--

DROP TABLE IF EXISTS `tbl_state`;
CREATE TABLE IF NOT EXISTS `tbl_state` (
  `state_id` int(11) NOT NULL AUTO_INCREMENT,
  `state_name` varchar(255) NOT NULL,
  `state_number` varchar(20) NOT NULL,
  `state_incharge` varchar(20) NOT NULL,
  `state_status` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`state_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_state`
--

INSERT INTO `tbl_state` (`state_id`, `state_name`, `state_number`, `state_incharge`, `state_status`) VALUES
(1, 'Kerala', '9809675657', 'qe', 1),
(2, 'Tamilnadu', '', '', 1),
(3, 'Karnataka', '8978675666', 'trr', 1),
(4, 'Andrapradesh', '9809675657', 'qe', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supp_acc`
--

DROP TABLE IF EXISTS `tbl_supp_acc`;
CREATE TABLE IF NOT EXISTS `tbl_supp_acc` (
  `sacc_id` int(11) NOT NULL AUTO_INCREMENT,
  `sup_id_fk` int(11) NOT NULL,
  `old_balance` int(11) NOT NULL,
  `sacc_status` int(11) NOT NULL,
  PRIMARY KEY (`sacc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_supp_acc`
--

INSERT INTO `tbl_supp_acc` (`sacc_id`, `sup_id_fk`, `old_balance`, `sacc_status`) VALUES
(1, 1, 100, 1),
(2, 2, 100, 1),
(3, 3, 2500, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_taxdetails`
--

DROP TABLE IF EXISTS `tbl_taxdetails`;
CREATE TABLE IF NOT EXISTS `tbl_taxdetails` (
  `tax_id` int(11) NOT NULL AUTO_INCREMENT,
  `taxname` varchar(50) NOT NULL,
  `taxamount` double NOT NULL,
  `tax_gst` double DEFAULT NULL,
  `tax_cgst` double DEFAULT NULL,
  `tax_sgst` double DEFAULT NULL,
  `taxdetails` text NOT NULL,
  `tax_status` int(11) NOT NULL,
  PRIMARY KEY (`tax_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_taxdetails`
--

INSERT INTO `tbl_taxdetails` (`tax_id`, `taxname`, `taxamount`, `tax_gst`, `tax_cgst`, `tax_sgst`, `taxdetails`, `tax_status`) VALUES
(1, 'GST 18%', 18, NULL, NULL, NULL, 'dkfkdslfsd', 1),
(2, 'GST 12%', 12, 12, 6, 6, 'dkfkdslfsd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_travel`
--

DROP TABLE IF EXISTS `tbl_travel`;
CREATE TABLE IF NOT EXISTS `tbl_travel` (
  `travel_id` int(11) NOT NULL AUTO_INCREMENT,
  `travel_vehicle_fk` int(11) NOT NULL,
  `travel_driver_fk` int(11) NOT NULL,
  `travel_date` date NOT NULL,
  `travel_start_km` float NOT NULL,
  `travel_end_km` float NOT NULL,
  `travel_total_km` float NOT NULL,
  `travel_root_details` varchar(200) NOT NULL,
  `travel_fuel` float NOT NULL,
  `travel_fuel_cost` float NOT NULL,
  `travel_other_exp` float NOT NULL,
  `travel_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=Inactive,1=Active',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`travel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_travel`
--

INSERT INTO `tbl_travel` (`travel_id`, `travel_vehicle_fk`, `travel_driver_fk`, `travel_date`, `travel_start_km`, `travel_end_km`, `travel_total_km`, `travel_root_details`, `travel_fuel`, `travel_fuel_cost`, `travel_other_exp`, `travel_status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2022-02-15', 1000, 1500.52, 500.52, 'Test Root details', 10.5, 1500, 0, 1, '2022-02-15 15:37:49', '2022-02-14 23:07:49'),
(2, 2, 1, '2022-02-16', 2500, 2562.6, 562.6, 'Test Root details', 18.5, 2000, 820, 1, '2022-02-15 15:50:04', '2022-02-14 23:20:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_unit`
--

DROP TABLE IF EXISTS `tbl_unit`;
CREATE TABLE IF NOT EXISTS `tbl_unit` (
  `unit_id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_name` varchar(255) NOT NULL,
  `unit_description` text NOT NULL,
  `unit_status` int(11) NOT NULL,
  PRIMARY KEY (`unit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_unit`
--

INSERT INTO `tbl_unit` (`unit_id`, `unit_name`, `unit_description`, `unit_status`) VALUES
(1, 'Gram', '', 1),
(2, 'KG', '', 1),
(3, 'NO', '', 1),
(4, 'PCS', '', 1),
(5, 'Dozen', '12 pieces', 1),
(6, 'Barrel', '', 1),
(7, 'ML', 'Milliliter', 1),
(8, 'LTR', 'Litre', 1),
(9, 'BAGS', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vaccination`
--

DROP TABLE IF EXISTS `tbl_vaccination`;
CREATE TABLE IF NOT EXISTS `tbl_vaccination` (
  `vaccination_id` int(11) NOT NULL AUTO_INCREMENT,
  `vaccination_name` varchar(100) NOT NULL,
  `vaccination_days` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0-InActive,1-Active',
  PRIMARY KEY (`vaccination_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_vaccination`
--

INSERT INTO `tbl_vaccination` (`vaccination_id`, `vaccination_name`, `vaccination_days`, `created_at`, `updated_at`, `status`) VALUES
(1, 'RDV F1', '5', '2022-02-16 12:23:54', '2022-02-08 01:14:32', 0),
(2, 'IBD Vaccine', '14', '2022-02-16 12:24:07', '2022-02-08 04:59:34', 1),
(4, 'RDV La Sota', '21', '2022-02-16 12:24:25', '2022-02-08 17:25:58', 1),
(6, 'Mareks Disease Vaccine (HVT)', '1', '2022-02-16 12:24:57', '2022-02-08 22:33:58', 1),
(7, ' 	\n\nRD vaccine Booster- La Sota', '30', '2022-02-16 12:25:30', '2022-02-08 22:34:07', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vaccination_schedule`
--

DROP TABLE IF EXISTS `tbl_vaccination_schedule`;
CREATE TABLE IF NOT EXISTS `tbl_vaccination_schedule` (
  `schedule_id` int(11) NOT NULL AUTO_INCREMENT,
  `schedule_allotment_fk` int(11) NOT NULL,
  `schedule_vaccine_fk` int(11) NOT NULL,
  `schedule_vaccine_dose` int(11) NOT NULL,
  `schedule_vaccine_total_dose` int(11) NOT NULL,
  `schedule_vaccine_date` date NOT NULL,
  `schedule_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=Pending,1=Completed,2=Partial',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`schedule_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_vaccination_schedule`
--

INSERT INTO `tbl_vaccination_schedule` (`schedule_id`, `schedule_allotment_fk`, `schedule_vaccine_fk`, `schedule_vaccine_dose`, `schedule_vaccine_total_dose`, `schedule_vaccine_date`, `schedule_status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 4, '2022-03-10', 1, '2022-03-02 03:28:47', '2022-03-01 10:58:47'),
(2, 5, 2, 10, 10, '2022-03-14', 0, '2022-03-14 14:07:26', '2022-03-13 21:37:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vechicles_root`
--

DROP TABLE IF EXISTS `tbl_vechicles_root`;
CREATE TABLE IF NOT EXISTS `tbl_vechicles_root` (
  `vroot_id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_id_fk` int(11) NOT NULL,
  `driver_id_fk` int(11) NOT NULL,
  `vroot_details` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `total_weight` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`vroot_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_vechicles_root`
--

INSERT INTO `tbl_vechicles_root` (`vroot_id`, `vehicle_id_fk`, `driver_id_fk`, `vroot_details`, `date`, `total_weight`, `status`) VALUES
(4, 1, 2, 'Poultry Delivery ', '2022-04-07', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle`
--

DROP TABLE IF EXISTS `tbl_vehicle`;
CREATE TABLE IF NOT EXISTS `tbl_vehicle` (
  `vehicle_id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_type_fk` int(11) NOT NULL,
  `vehicle_reg_no` varchar(50) NOT NULL,
  `vehicle_name` varchar(100) NOT NULL,
  `vehicle_engine_number` varchar(50) NOT NULL,
  `vehicle_make_model` varchar(50) NOT NULL,
  `vehicle_chassis_number` varchar(75) NOT NULL,
  `vehicle_year_of_mfd` varchar(10) NOT NULL,
  `vehicle_fuel_type` varchar(20) NOT NULL,
  `vehicle_color` varchar(20) NOT NULL,
  `vehicle_fuel_mesurement` varchar(20) NOT NULL,
  `vehicle_image` varchar(200) NOT NULL,
  `vehicle_track_usage` varchar(100) NOT NULL,
  `vehicle_group_fk` int(11) NOT NULL,
  `vehicle_sec_or_aux` tinyint(1) NOT NULL COMMENT '0=Secondary,1=Auxilary',
  `vehicle_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=Inactive,1=Active',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`vehicle_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_vehicle`
--

INSERT INTO `tbl_vehicle` (`vehicle_id`, `vehicle_type_fk`, `vehicle_reg_no`, `vehicle_name`, `vehicle_engine_number`, `vehicle_make_model`, `vehicle_chassis_number`, `vehicle_year_of_mfd`, `vehicle_fuel_type`, `vehicle_color`, `vehicle_fuel_mesurement`, `vehicle_image`, `vehicle_track_usage`, `vehicle_group_fk`, `vehicle_sec_or_aux`, `vehicle_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'KL55H1610', 'ASHOK LEYLAND', 'ENX25362514', 'KNVB142532', 'ANVWUS', '2010', 'PETROL', 'RED', 'TEST', 'vehicle1.jpg', 'TEST', 1, 0, 1, '2022-02-22 12:51:33', '2022-02-21 20:21:33'),
(2, 2, 'KL7B5522', 'Mahindra Truck', 'HFN25362518', 'HNGB142552', 'JNDTGE', '2010', 'DIESEL', 'BLUE', 'TEST', 'Vehicle2.jpg', 'TEST', 2, 1, 1, '2022-02-22 12:59:01', '2022-02-21 20:29:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle1`
--

DROP TABLE IF EXISTS `tbl_vehicle1`;
CREATE TABLE IF NOT EXISTS `tbl_vehicle1` (
  `vehicle_id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_type_fk` int(11) NOT NULL,
  `vehicle_reg_no` int(11) NOT NULL,
  `vehicle_name` varchar(100) NOT NULL,
  `vehicle_engine_number` varchar(50) NOT NULL,
  `vehicle_make_model` varchar(50) NOT NULL,
  `vehicle_chassis_number` varchar(75) NOT NULL,
  `vehicle_year_of_mfd` varchar(10) NOT NULL,
  `vehicle_fuel_type` varchar(20) NOT NULL,
  `vehicle_color` varchar(20) NOT NULL,
  `vehicle_fuel_mesurement` varchar(20) NOT NULL,
  `vehicle_image` varchar(200) NOT NULL,
  `vehicle_track_usage` varchar(100) NOT NULL,
  `vehicle_group_fk` int(11) NOT NULL,
  `vehicle_sec_or_aux` tinyint(1) NOT NULL COMMENT '0=Secondary,1=Auxilary',
  `vehicle_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=Inactive,1=Active',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`vehicle_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_vehicle1`
--

INSERT INTO `tbl_vehicle1` (`vehicle_id`, `vehicle_type_fk`, `vehicle_reg_no`, `vehicle_name`, `vehicle_engine_number`, `vehicle_make_model`, `vehicle_chassis_number`, `vehicle_year_of_mfd`, `vehicle_fuel_type`, `vehicle_color`, `vehicle_fuel_mesurement`, `vehicle_image`, `vehicle_track_usage`, `vehicle_group_fk`, `vehicle_sec_or_aux`, `vehicle_status`, `created_at`, `updated_at`) VALUES
(1, 2, 123, 'JEETO', 'ABC123', '2015', 'ANVWUS', '2001', 'PETROL', 'RED', 'TEST', 'TEST', 'TEST', 2, 0, 1, '2022-02-21 11:44:04', '2022-02-21 06:14:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicles_item`
--

DROP TABLE IF EXISTS `tbl_vehicles_item`;
CREATE TABLE IF NOT EXISTS `tbl_vehicles_item` (
  `vitem_id` int(11) NOT NULL AUTO_INCREMENT,
  `root_id_fk` int(11) NOT NULL,
  `item_id_fk` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `tweight` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `damage` varchar(50) NOT NULL,
  `where_damage` varchar(50) NOT NULL,
  `damage_weight` int(11) NOT NULL,
  PRIMARY KEY (`vitem_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_vehicles_item`
--

INSERT INTO `tbl_vehicles_item` (`vitem_id`, `root_id_fk`, `item_id_fk`, `weight`, `unit`, `tweight`, `balance`, `damage`, `where_damage`, `damage_weight`) VALUES
(1, 0, 5, 10, 'kg', 10, 10, '0', '', 0),
(2, 1, 5, 10, 'kg', 10, 10, '0', '', 0),
(3, 2, 6, 10, 'KG', 10, 10, '0', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_group`
--

DROP TABLE IF EXISTS `tbl_vehicle_group`;
CREATE TABLE IF NOT EXISTS `tbl_vehicle_group` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(100) NOT NULL,
  `group_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=Inactive,1=Active',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_vehicle_group`
--

INSERT INTO `tbl_vehicle_group` (`group_id`, `group_name`, `group_status`, `created_at`, `updated_at`) VALUES
(1, 'GROUP 1', 1, '2022-02-21 06:01:40', '2022-02-21 05:02:10'),
(2, 'GROUP 2', 1, '2022-02-21 06:01:40', '2022-02-21 05:02:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_types`
--

DROP TABLE IF EXISTS `tbl_vehicle_types`;
CREATE TABLE IF NOT EXISTS `tbl_vehicle_types` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(100) NOT NULL,
  `type_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=Inactive,1=Active',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_vehicle_types`
--

INSERT INTO `tbl_vehicle_types` (`type_id`, `type_name`, `type_status`, `created_at`, `updated_at`) VALUES
(1, 'TYPE 1', 1, '2022-02-21 06:04:26', '2022-02-21 05:04:38'),
(2, 'TYPE 2', 1, '2022-02-21 06:04:26', '2022-02-21 05:04:38');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vendor`
--

DROP TABLE IF EXISTS `tbl_vendor`;
CREATE TABLE IF NOT EXISTS `tbl_vendor` (
  `vendor_id` int(11) NOT NULL AUTO_INCREMENT,
  `vendorname` varchar(60) NOT NULL,
  `vendoraddress` text NOT NULL,
  `vendorphone` bigint(20) NOT NULL,
  `vendoremail` varchar(50) NOT NULL,
  `vendor_oldbal` int(50) NOT NULL,
  `vendorgst` varchar(50) NOT NULL,
  `vendorstatus` int(11) NOT NULL,
  PRIMARY KEY (`vendor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_vendor`
--

INSERT INTO `tbl_vendor` (`vendor_id`, `vendorname`, `vendoraddress`, `vendorphone`, `vendoremail`, `vendor_oldbal`, `vendorgst`, `vendorstatus`) VALUES
(1, 'Venad Chicken', ' Venad Chicken  Opposite Kottarakkara Railway Station, Kottarakkara, ,Kottarakkara,Kerala,India,691506 ', 9809402838, 'hs@gmail.com', 10000, '32AWE#$Fdfdf', 1),
(2, 'Lucky Market Pvt. Ltd.', '    Shop No. 7895, MG Road, Erankulam,123456789  ', 1234567890, 'luck@market.com', 100, '32ABX5346712U', 0),
(3, 'Lucky Market Pvt. Ltd.', ' Shop No. 134, MG Road, Kaloor,  Kochi - 525410', 9638527410, 'lucky@hart.com', 10, '32ADQPA2740Q1ZE', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_destination`
--

DROP TABLE IF EXISTS `vehicle_destination`;
CREATE TABLE IF NOT EXISTS `vehicle_destination` (
  `v_destination_id` int(11) NOT NULL AUTO_INCREMENT,
  `v_destination_fk_id` int(11) DEFAULT NULL,
  `v_destination_name` varchar(255) DEFAULT NULL,
  `v_detination_place` varchar(100) DEFAULT NULL,
  `v_destination_km` int(11) DEFAULT NULL,
  `v_destination_arrival_time` time DEFAULT NULL,
  `v_destination_status` tinyint(2) NOT NULL DEFAULT 1,
  PRIMARY KEY (`v_destination_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle_destination`
--

INSERT INTO `vehicle_destination` (`v_destination_id`, `v_destination_fk_id`, `v_destination_name`, `v_detination_place`, `v_destination_km`, `v_destination_arrival_time`, `v_destination_status`) VALUES
(3, 4, 'Venad Poultry Farm', 'Thrissur', 12, '00:00:00', 1),
(4, 4, 'Royal Emarald Park Hotel', 'Venus Rd, Thrissur', 10, '10:10:00', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
