-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2017 at 06:57 AM
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
-- Database: `feedback_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(150) NOT NULL,
  `admin_email` varchar(150) NOT NULL,
  `admin_password` varchar(150) NOT NULL,
  `status` varchar(150) NOT NULL,
  `created_at` varchar(150) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `admin_name`, `admin_email`, `admin_password`, `status`, `created_at`, `flag`) VALUES
(1, 'Admin', 'admin@gmail.com', '427961536b38745577596146364f64616a44464266773d3d', '0', '', 0),
(3, 'Haritha', 'haritha@lanciussolutions.com', '6132445962674b3574433735475955556b4b543170673d3d', '0', '2017-09-14 03:19:19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `banner` varchar(250) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `banner`, `status`) VALUES
(20, 'Banner1', 'back.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(150) NOT NULL,
  `category_image` varchar(150) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_image`, `status`) VALUES
(1, 'Wash Rooms', '9,6,5', 0),
(2, 'Parking Area', '8,7,6', 0),
(3, 'Hospital Beds', '9,8', 0),
(4, 'Enquiry Room', '6', 0),
(5, 'aaaa', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `client_admin_users`
--

CREATE TABLE `client_admin_users` (
  `id` int(11) NOT NULL,
  `client_name` varchar(200) NOT NULL,
  `client_email` varchar(200) NOT NULL,
  `client_mobile` varchar(200) NOT NULL,
  `remember_name` varchar(250) NOT NULL,
  `no_of_accounts` int(11) NOT NULL,
  `no_of_floors` int(11) NOT NULL,
  `client_admin_logo` varchar(350) NOT NULL,
  `client_country_id` int(11) NOT NULL,
  `client_state_id` int(11) NOT NULL,
  `client_city_id` int(11) NOT NULL,
  `client_location_id` int(11) NOT NULL,
  `created_super_admin_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_admin_users`
--

INSERT INTO `client_admin_users` (`id`, `client_name`, `client_email`, `client_mobile`, `remember_name`, `no_of_accounts`, `no_of_floors`, `client_admin_logo`, `client_country_id`, `client_state_id`, `client_city_id`, `client_location_id`, `created_super_admin_id`, `status`, `created_at`) VALUES
(1, 'Client 1', 'client1@gmail.com', '7894561235', 'IBM Hitech', 10, 5, 'home loan-01.png', 99, 1, 9, 1, 1, 0, '2017-10-06 01:28:42');

-- --------------------------------------------------------

--
-- Table structure for table `client_selected_feedback_options`
--

CREATE TABLE `client_selected_feedback_options` (
  `id` int(11) NOT NULL,
  `client_user_id` int(11) NOT NULL,
  `category_id` varchar(250) NOT NULL,
  `sub_category_id` varchar(250) NOT NULL,
  `feedback_options` varchar(350) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_selected_feedback_options`
--

INSERT INTO `client_selected_feedback_options` (`id`, `client_user_id`, `category_id`, `sub_category_id`, `feedback_options`, `created_at`) VALUES
(5, 1, 'Wash Rooms', '', 'Faulty Equipment,Dirty Tolilet Bowl,No Tolilet Paper', '0000-00-00 00:00:00'),
(6, 1, 'Parking Area', '', 'Faulty Equipment,Temparature', '0000-00-00 00:00:00'),
(7, 1, 'Hospital Beds', '', 'Temparature,Faulty Equipment', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `content_pages`
--

CREATE TABLE `content_pages` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_enqueries`
--

CREATE TABLE `customer_enqueries` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_mobile` varchar(150) NOT NULL,
  `customer_feedback` text NOT NULL,
  `status` varchar(25) NOT NULL,
  `created_at` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback_options`
--

CREATE TABLE `feedback_options` (
  `id` int(11) NOT NULL,
  `feedback_option` varchar(150) NOT NULL,
  `feedback_option_image` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback_options`
--

INSERT INTO `feedback_options` (`id`, `feedback_option`, `feedback_option_image`, `status`) VALUES
(3, 'No Tolilet Paper', 'toilet-paper.png', 0),
(4, 'Foul Smell', 'foul-smell.png', 0),
(5, 'Litter Bin Full', 'litterbin-full.png', 0),
(6, 'Wet Floor', 'wet-floor.png', 0),
(7, 'Dirty Basin', 'dirty-basin.png', 0),
(8, 'Dirty Tolilet Bowl', 'dirty-toilet-bowl.png', 0),
(9, 'Temparature', 'toilet-temparature.png', 0),
(10, 'Faulty Equipment', 'equipments.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lkp_cities`
--

CREATE TABLE `lkp_cities` (
  `id` int(11) NOT NULL,
  `lkp_country_id` int(11) NOT NULL DEFAULT '0',
  `lkp_state_id` int(11) NOT NULL,
  `city_name` varchar(150) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lkp_cities`
--

INSERT INTO `lkp_cities` (`id`, `lkp_country_id`, `lkp_state_id`, `city_name`, `status`) VALUES
(1, 99, 35, 'North and Middle Andaman', '0'),
(2, 99, 35, 'South Andaman', '0'),
(3, 99, 35, 'Nicobar', '0'),
(4, 99, 1, 'Adilabad', '0'),
(5, 99, 1, 'Anantapur', '0'),
(6, 99, 1, 'Chittoor', '0'),
(7, 99, 1, 'East Godavari', '0'),
(8, 99, 1, 'Guntur', '0'),
(9, 99, 1, 'Hyderabad', '0'),
(10, 99, 1, 'Kadapa', '0'),
(11, 99, 1, 'Karimnagar', '0'),
(12, 99, 1, 'Khammam', '0'),
(13, 99, 1, 'Krishna', '0'),
(14, 99, 1, 'Kurnool', '0'),
(15, 99, 1, 'Mahbubnagar', '0'),
(16, 99, 1, 'Medak', '0'),
(17, 99, 1, 'Nalgonda', '0'),
(18, 99, 1, 'Nellore', '0'),
(19, 99, 1, 'Nizamabad', '0'),
(20, 99, 1, 'Prakasam', '0'),
(21, 99, 1, 'Rangareddi', '0'),
(22, 99, 1, 'Srikakulam', '0'),
(23, 99, 1, 'Vishakhapatnam', '0'),
(24, 99, 1, 'Vizianagaram', '0'),
(25, 99, 1, 'Warangal', '0'),
(26, 99, 1, 'West Godavari', '0'),
(27, 99, 3, 'Anjaw', '0'),
(28, 99, 3, 'Changlang', '0'),
(29, 99, 3, 'East Kameng', '0'),
(30, 99, 3, 'Lohit', '0'),
(31, 99, 3, 'Lower Subansiri', '0'),
(32, 99, 3, 'Papum Pare', '0'),
(33, 99, 3, 'Tirap', '0'),
(34, 99, 3, 'Dibang Valley', '0'),
(35, 99, 3, 'Upper Subansiri', '0'),
(36, 99, 3, 'West Kameng', '0'),
(37, 99, 2, 'Barpeta', '0'),
(38, 99, 2, 'Bongaigaon', '0'),
(39, 99, 2, 'Cachar', '0'),
(40, 99, 2, 'Darrang', '0'),
(41, 99, 2, 'Dhemaji', '0'),
(42, 99, 2, 'Dhubri', '0'),
(43, 99, 2, 'Dibrugarh', '0'),
(44, 99, 2, 'Goalpara', '0'),
(45, 99, 2, 'Golaghat', '0'),
(46, 99, 2, 'Hailakandi', '0'),
(47, 99, 2, 'Jorhat', '0'),
(48, 99, 2, 'Karbi Anglong', '0'),
(49, 99, 2, 'Karimganj', '0'),
(50, 99, 2, 'Kokrajhar', '0'),
(51, 99, 2, 'Lakhimpur', '0'),
(52, 99, 2, 'Marigaon', '0'),
(53, 99, 2, 'Nagaon', '0'),
(54, 99, 2, 'Nalbari', '0'),
(55, 99, 2, 'North Cachar Hills', '0'),
(56, 99, 2, 'Sibsagar', '0'),
(57, 99, 2, 'Sonitpur', '0'),
(58, 99, 2, 'Tinsukia', '0'),
(59, 99, 5, 'Araria', '0'),
(60, 99, 5, 'Aurangabad', '0'),
(61, 99, 5, 'Banka', '0'),
(62, 99, 5, 'Begusarai', '0'),
(63, 99, 5, 'Bhagalpur', '0'),
(64, 99, 5, 'Bhojpur', '0'),
(65, 99, 5, 'Buxar', '0'),
(66, 99, 5, 'Darbhanga', '0'),
(67, 99, 5, 'Purba Champaran', '0'),
(68, 99, 5, 'Gaya', '0'),
(69, 99, 5, 'Gopalganj', '0'),
(70, 99, 5, 'Jamui', '0'),
(71, 99, 5, 'Jehanabad', '0'),
(72, 99, 5, 'Khagaria', '0'),
(73, 99, 5, 'Kishanganj', '0'),
(74, 99, 5, 'Kaimur', '0'),
(75, 99, 5, 'Katihar', '0'),
(76, 99, 5, 'Lakhisarai', '0'),
(77, 99, 5, 'Madhubani', '0'),
(78, 99, 5, 'Munger', '0'),
(79, 99, 5, 'Madhepura', '0'),
(80, 99, 5, 'Muzaffarpur', '0'),
(81, 99, 5, 'Nalanda', '0'),
(82, 99, 5, 'Nawada', '0'),
(83, 99, 5, 'Patna', '0'),
(84, 99, 5, 'Purnia', '0'),
(85, 99, 5, 'Rohtas', '0'),
(86, 99, 5, 'Saharsa', '0'),
(87, 99, 5, 'Samastipur', '0'),
(88, 99, 5, 'Sheohar', '0'),
(89, 99, 5, 'Sheikhpura', '0'),
(90, 99, 5, 'Saran', '0'),
(91, 99, 5, 'Sitamarhi', '0'),
(92, 99, 5, 'Supaul', '0'),
(93, 99, 5, 'Siwan', '0'),
(94, 99, 5, 'Vaishali', '0'),
(95, 99, 5, 'Pashchim Champaran', '0'),
(96, 99, 34, 'Bastar', '0'),
(97, 99, 34, 'Bilaspur', '0'),
(98, 99, 34, 'Dantewada', '0'),
(99, 99, 34, 'Dhamtari', '0'),
(100, 99, 34, 'Durg', '0'),
(101, 99, 34, 'Jashpur', '0'),
(102, 99, 34, 'Janjgir-Champa', '0'),
(103, 99, 34, 'Korba', '0'),
(104, 99, 34, 'Koriya', '0'),
(105, 99, 34, 'Kanker', '0'),
(106, 99, 34, 'Kawardha', '0'),
(107, 99, 34, 'Mahasamund', '0'),
(108, 99, 34, 'Raigarh', '0'),
(109, 99, 34, 'Rajnandgaon', '0'),
(110, 99, 34, 'Raipur', '0'),
(111, 99, 34, 'Surguja', '0'),
(112, 99, 28, 'Diu', '0'),
(113, 99, 28, 'Daman', '0'),
(114, 99, 37, 'Central Delhi', '0'),
(115, 99, 37, 'East Delhi', '0'),
(116, 99, 37, 'New Delhi', '0'),
(117, 99, 37, 'North Delhi', '0'),
(118, 99, 37, 'North East Delhi', '0'),
(119, 99, 37, 'North West Delhi', '0'),
(120, 99, 37, 'South Delhi', '0'),
(121, 99, 37, 'South West Delhi', '0'),
(122, 99, 37, 'West Delhi', '0'),
(123, 99, 38, 'North Goa', '0'),
(124, 99, 38, 'South Goa', '0'),
(125, 99, 4, 'Ahmedabad', '0'),
(126, 99, 4, 'Amreli District', '0'),
(127, 99, 4, 'Anand', '0'),
(128, 99, 4, 'Banaskantha', '0'),
(129, 99, 4, 'Bharuch', '0'),
(130, 99, 4, 'Bhavnagar', '0'),
(131, 99, 4, 'Dahod', '0'),
(132, 99, 4, 'The Dangs', '0'),
(133, 99, 4, 'Gandhinagar', '0'),
(134, 99, 4, 'Jamnagar', '0'),
(135, 99, 4, 'Junagadh', '0'),
(136, 99, 4, 'Kutch', '0'),
(137, 99, 4, 'Kheda', '0'),
(138, 99, 4, 'Mehsana', '0'),
(139, 99, 4, 'Narmada', '0'),
(140, 99, 4, 'Navsari', '0'),
(141, 99, 4, 'Patan', '0'),
(142, 99, 4, 'Panchmahal', '0'),
(143, 99, 4, 'Porbandar', '0'),
(144, 99, 4, 'Rajkot', '0'),
(145, 99, 4, 'Sabarkantha', '0'),
(146, 99, 4, 'Surendranagar', '0'),
(147, 99, 4, 'Surat', '0'),
(148, 99, 4, 'Vadodara', '0'),
(149, 99, 4, 'Valsad', '0'),
(150, 99, 6, 'Ambala', '0'),
(151, 99, 6, 'Bhiwani', '0'),
(152, 99, 6, 'Faridabad', '0'),
(153, 99, 6, 'Fatehabad', '0'),
(154, 99, 6, 'Gurgaon', '0'),
(155, 99, 6, 'Hissar', '0'),
(156, 99, 6, 'Jhajjar', '0'),
(157, 99, 6, 'Jind', '0'),
(158, 99, 6, 'Karnal', '0'),
(159, 99, 6, 'Kaithal', '0'),
(160, 99, 6, 'Kurukshetra', '0'),
(161, 99, 6, 'Mahendragarh', '0'),
(162, 99, 6, 'Mewat', '0'),
(163, 99, 6, 'Panchkula', '0'),
(164, 99, 6, 'Panipat', '0'),
(165, 99, 6, 'Rewari', '0'),
(166, 99, 6, 'Rohtak', '0'),
(167, 99, 6, 'Sirsa', '0'),
(168, 99, 6, 'Sonepat', '0'),
(169, 99, 6, 'Yamuna Nagar', '0'),
(170, 99, 6, 'Palwal', '0'),
(171, 99, 7, 'Bilaspur', '0'),
(172, 99, 7, 'Chamba', '0'),
(173, 99, 7, 'Hamirpur', '0'),
(174, 99, 7, 'Kangra', '0'),
(175, 99, 7, 'Kinnaur', '0'),
(176, 99, 7, 'Kulu', '0'),
(177, 99, 7, 'Lahaul and Spiti', '0'),
(178, 99, 7, 'Mandi', '0'),
(179, 99, 7, 'Shimla', '0'),
(180, 99, 7, 'Sirmaur', '0'),
(181, 99, 7, 'Solan', '0'),
(182, 99, 7, 'Una', '0'),
(183, 99, 8, 'Anantnag', '0'),
(184, 99, 8, 'Badgam', '0'),
(185, 99, 8, 'Bandipore', '0'),
(186, 99, 8, 'Baramula', '0'),
(187, 99, 8, 'Doda', '0'),
(188, 99, 8, 'Jammu', '0'),
(189, 99, 8, 'Kargil', '0'),
(190, 99, 8, 'Kathua', '0'),
(191, 99, 8, 'Kupwara', '0'),
(192, 99, 8, 'Leh', '0'),
(193, 99, 8, 'Poonch', '0'),
(194, 99, 8, 'Pulwama', '0'),
(195, 99, 8, 'Rajauri', '0'),
(196, 99, 8, 'Srinagar', '0'),
(197, 99, 8, 'Samba', '0'),
(198, 99, 8, 'Udhampur', '0'),
(199, 99, 33, 'Bokaro', '0'),
(200, 99, 33, 'Chatra', '0'),
(201, 99, 33, 'Deoghar', '0'),
(202, 99, 33, 'Dhanbad', '0'),
(203, 99, 33, 'Dumka', '0'),
(204, 99, 33, 'Purba Singhbhum', '0'),
(205, 99, 33, 'Garhwa', '0'),
(206, 99, 33, 'Giridih', '0'),
(207, 99, 33, 'Godda', '0'),
(208, 99, 33, 'Gumla', '0'),
(209, 99, 33, 'Hazaribagh', '0'),
(210, 99, 33, 'Koderma', '0'),
(211, 99, 33, 'Lohardaga', '0'),
(212, 99, 33, 'Pakur', '0'),
(213, 99, 33, 'Palamu', '0'),
(214, 99, 33, 'Ranchi', '0'),
(215, 99, 33, 'Sahibganj', '0'),
(216, 99, 33, 'Seraikela and Kharsawan', '0'),
(217, 99, 33, 'Pashchim Singhbhum', '0'),
(218, 99, 33, 'Ramgarh', '0'),
(219, 99, 9, 'Bidar', '0'),
(220, 99, 9, 'Belgaum', '0'),
(221, 99, 9, 'Bijapur', '0'),
(222, 99, 9, 'Bagalkot', '0'),
(223, 99, 9, 'Bellary', '0'),
(224, 99, 9, 'Bangalore Rural District', '0'),
(225, 99, 9, 'Bangalore Urban District', '0'),
(226, 99, 9, 'Chamarajnagar', '0'),
(227, 99, 9, 'Chikmagalur', '0'),
(228, 99, 9, 'Chitradurga', '0'),
(229, 99, 9, 'Davanagere', '0'),
(230, 99, 9, 'Dharwad', '0'),
(231, 99, 9, 'Dakshina Kannada', '0'),
(232, 99, 9, 'Gadag', '0'),
(233, 99, 9, 'Gulbarga', '0'),
(234, 99, 9, 'Hassan', '0'),
(235, 99, 9, 'Haveri District', '0'),
(236, 99, 9, 'Kodagu', '0'),
(237, 99, 9, 'Kolar', '0'),
(238, 99, 9, 'Koppal', '0'),
(239, 99, 9, 'Mandya', '0'),
(240, 99, 9, 'Mysore', '0'),
(241, 99, 9, 'Raichur', '0'),
(242, 99, 9, 'Shimoga', '0'),
(243, 99, 9, 'Tumkur', '0'),
(244, 99, 9, 'Udupi', '0'),
(245, 99, 9, 'Uttara Kannada', '0'),
(246, 99, 9, 'Ramanagara', '0'),
(247, 99, 9, 'Chikballapur', '0'),
(248, 99, 9, 'Yadagiri', '0'),
(249, 99, 10, 'Alappuzha', '0'),
(250, 99, 10, 'Ernakulam', '0'),
(251, 99, 10, 'Idukki', '0'),
(252, 99, 10, 'Kollam', '0'),
(253, 99, 10, 'Kannur', '0'),
(254, 99, 10, 'Kasaragod', '0'),
(255, 99, 10, 'Kottayam', '0'),
(256, 99, 10, 'Kozhikode', '0'),
(257, 99, 10, 'Malappuram', '0'),
(258, 99, 10, 'Palakkad', '0'),
(259, 99, 10, 'Pathanamthitta', '0'),
(260, 99, 10, 'Thrissur', '0'),
(261, 99, 10, 'Thiruvananthapuram', '0'),
(262, 99, 10, 'Wayanad', '0'),
(263, 99, 11, 'Alirajpur', '0'),
(264, 99, 11, 'Anuppur', '0'),
(265, 99, 11, 'Ashok Nagar', '0'),
(266, 99, 11, 'Balaghat', '0'),
(267, 99, 11, 'Barwani', '0'),
(268, 99, 11, 'Betul', '0'),
(269, 99, 11, 'Bhind', '0'),
(270, 99, 11, 'Bhopal', '0'),
(271, 99, 11, 'Burhanpur', '0'),
(272, 99, 11, 'Chhatarpur', '0'),
(273, 99, 11, 'Chhindwara', '0'),
(274, 99, 11, 'Damoh', '0'),
(275, 99, 11, 'Datia', '0'),
(276, 99, 11, 'Dewas', '0'),
(277, 99, 11, 'Dhar', '0'),
(278, 99, 11, 'Dindori', '0'),
(279, 99, 11, 'Guna', '0'),
(280, 99, 11, 'Gwalior', '0'),
(281, 99, 11, 'Harda', '0'),
(282, 99, 11, 'Hoshangabad', '0'),
(283, 99, 11, 'Indore', '0'),
(284, 99, 11, 'Jabalpur', '0'),
(285, 99, 11, 'Jhabua', '0'),
(286, 99, 11, 'Katni', '0'),
(287, 99, 11, 'Khandwa', '0'),
(288, 99, 11, 'Khargone', '0'),
(289, 99, 11, 'Mandla', '0'),
(290, 99, 11, 'Mandsaur', '0'),
(291, 99, 11, 'Morena', '0'),
(292, 99, 11, 'Narsinghpur', '0'),
(293, 99, 11, 'Neemuch', '0'),
(294, 99, 11, 'Panna', '0'),
(295, 99, 11, 'Rewa', '0'),
(296, 99, 11, 'Rajgarh', '0'),
(297, 99, 11, 'Ratlam', '0'),
(298, 99, 11, 'Raisen', '0'),
(299, 99, 11, 'Sagar', '0'),
(300, 99, 11, 'Satna', '0'),
(301, 99, 11, 'Sehore', '0'),
(302, 99, 11, 'Seoni', '0'),
(303, 99, 11, 'Shahdol', '0'),
(304, 99, 11, 'Shajapur', '0'),
(305, 99, 11, 'Sheopur', '0'),
(306, 99, 11, 'Shivpuri', '0'),
(307, 99, 11, 'Sidhi', '0'),
(308, 99, 11, 'Singrauli', '0'),
(309, 99, 11, 'Tikamgarh', '0'),
(310, 99, 11, 'Ujjain', '0'),
(311, 99, 11, 'Umaria', '0'),
(312, 99, 11, 'Vidisha', '0'),
(313, 99, 12, 'Ahmednagar', '0'),
(314, 99, 12, 'Akola', '0'),
(315, 99, 12, 'Amrawati', '0'),
(316, 99, 12, 'Aurangabad', '0'),
(317, 99, 12, 'Bhandara', '0'),
(318, 99, 12, 'Beed', '0'),
(319, 99, 12, 'Buldhana', '0'),
(320, 99, 12, 'Chandrapur', '0'),
(321, 99, 12, 'Dhule', '0'),
(322, 99, 12, 'Gadchiroli', '0'),
(323, 99, 12, 'Gondiya', '0'),
(324, 99, 12, 'Hingoli', '0'),
(325, 99, 12, 'Jalgaon', '0'),
(326, 99, 12, 'Jalna', '0'),
(327, 99, 12, 'Kolhapur', '0'),
(328, 99, 12, 'Latur', '0'),
(329, 99, 12, 'Mumbai City', '0'),
(330, 99, 12, 'Mumbai suburban', '0'),
(331, 99, 12, 'Nandurbar', '0'),
(332, 99, 12, 'Nanded', '0'),
(333, 99, 12, 'Nagpur', '0'),
(334, 99, 12, 'Nashik', '0'),
(335, 99, 12, 'Osmanabad', '0'),
(336, 99, 12, 'Parbhani', '0'),
(337, 99, 12, 'Pune', '0'),
(338, 99, 12, 'Raigad', '0'),
(339, 99, 12, 'Ratnagiri', '0'),
(340, 99, 12, 'Sindhudurg', '0'),
(341, 99, 12, 'Sangli', '0'),
(342, 99, 12, 'Solapur', '0'),
(343, 99, 12, 'Satara', '0'),
(344, 99, 12, 'Thane', '0'),
(345, 99, 12, 'Wardha', '0'),
(346, 99, 12, 'Washim', '0'),
(347, 99, 12, 'Yavatmal', '0'),
(348, 99, 13, 'Bishnupur', '0'),
(349, 99, 13, 'Churachandpur', '0'),
(350, 99, 13, 'Chandel', '0'),
(351, 99, 13, 'Imphal East', '0'),
(352, 99, 13, 'Senapati', '0'),
(353, 99, 13, 'Tamenglong', '0'),
(354, 99, 13, 'Thoubal', '0'),
(355, 99, 13, 'Ukhrul', '0'),
(356, 99, 13, 'Imphal West', '0'),
(357, 99, 14, 'East Garo Hills', '0'),
(358, 99, 14, 'East Khasi Hills', '0'),
(359, 99, 14, 'Jaintia Hills', '0'),
(360, 99, 14, 'Ri-Bhoi', '0'),
(361, 99, 14, 'South Garo Hills', '0'),
(362, 99, 14, 'West Garo Hills', '0'),
(363, 99, 14, 'West Khasi Hills', '0'),
(364, 99, 15, 'Aizawl', '0'),
(365, 99, 15, 'Champhai', '0'),
(366, 99, 15, 'Kolasib', '0'),
(367, 99, 15, 'Lawngtlai', '0'),
(368, 99, 15, 'Lunglei', '0'),
(369, 99, 15, 'Mamit', '0'),
(370, 99, 15, 'Saiha', '0'),
(371, 99, 15, 'Serchhip', '0'),
(372, 99, 16, 'Dimapur', '0'),
(373, 99, 16, 'Kohima', '0'),
(374, 99, 16, 'Mokokchung', '0'),
(375, 99, 16, 'Mon', '0'),
(376, 99, 16, 'Phek', '0'),
(377, 99, 16, 'Tuensang', '0'),
(378, 99, 16, 'Wokha', '0'),
(379, 99, 16, 'Zunheboto', '0'),
(380, 99, 17, 'Angul', '0'),
(381, 99, 17, 'Boudh', '0'),
(382, 99, 17, 'Bhadrak', '0'),
(383, 99, 17, 'Bolangir', '0'),
(384, 99, 17, 'Bargarh', '0'),
(385, 99, 17, 'Baleswar', '0'),
(386, 99, 17, 'Cuttack', '0'),
(387, 99, 17, 'Debagarh', '0'),
(388, 99, 17, 'Dhenkanal', '0'),
(389, 99, 17, 'Ganjam', '0'),
(390, 99, 17, 'Gajapati', '0'),
(391, 99, 17, 'Jharsuguda', '0'),
(392, 99, 17, 'Jajapur', '0'),
(393, 99, 17, 'Jagatsinghpur', '0'),
(394, 99, 17, 'Khordha', '0'),
(395, 99, 17, 'Kendujhar', '0'),
(396, 99, 17, 'Kalahandi', '0'),
(397, 99, 17, 'Kandhamal', '0'),
(398, 99, 17, 'Koraput', '0'),
(399, 99, 17, 'Kendrapara', '0'),
(400, 99, 17, 'Malkangiri', '0'),
(401, 99, 17, 'Mayurbhanj', '0'),
(402, 99, 17, 'Nabarangpur', '0'),
(403, 99, 17, 'Nuapada', '0'),
(404, 99, 17, 'Nayagarh', '0'),
(405, 99, 17, 'Puri', '0'),
(406, 99, 17, 'Rayagada', '0'),
(407, 99, 17, 'Sambalpur', '0'),
(408, 99, 17, 'Subarnapur', '0'),
(409, 99, 17, 'Sundargarh', '0'),
(410, 99, 26, 'Karaikal', '0'),
(411, 99, 26, 'Mahe', '0'),
(412, 99, 26, 'Puducherry', '0'),
(413, 99, 26, 'Yanam', '0'),
(414, 99, 18, 'Amritsar', '0'),
(415, 99, 18, 'Bathinda', '0'),
(416, 99, 18, 'Firozpur', '0'),
(417, 99, 18, 'Faridkot', '0'),
(418, 99, 18, 'Fatehgarh Sahib', '0'),
(419, 99, 18, 'Gurdaspur', '0'),
(420, 99, 18, 'Hoshiarpur', '0'),
(421, 99, 18, 'Jalandhar', '0'),
(422, 99, 18, 'Kapurthala', '0'),
(423, 99, 18, 'Ludhiana', '0'),
(424, 99, 18, 'Mansa', '0'),
(425, 99, 18, 'Moga', '0'),
(426, 99, 18, 'Mukatsar', '0'),
(427, 99, 18, 'Nawan Shehar', '0'),
(428, 99, 18, 'Patiala', '0'),
(429, 99, 18, 'Rupnagar', '0'),
(430, 99, 18, 'Sangrur', '0'),
(431, 99, 19, 'Ajmer', '0'),
(432, 99, 19, 'Alwar', '0'),
(433, 99, 19, 'Bikaner', '0'),
(434, 99, 19, 'Barmer', '0'),
(435, 99, 19, 'Banswara', '0'),
(436, 99, 19, 'Bharatpur', '0'),
(437, 99, 19, 'Baran', '0'),
(438, 99, 19, 'Bundi', '0'),
(439, 99, 19, 'Bhilwara', '0'),
(440, 99, 19, 'Churu', '0'),
(441, 99, 19, 'Chittorgarh', '0'),
(442, 99, 19, 'Dausa', '0'),
(443, 99, 19, 'Dholpur', '0'),
(444, 99, 19, 'Dungapur', '0'),
(445, 99, 19, 'Ganganagar', '0'),
(446, 99, 19, 'Hanumangarh', '0'),
(447, 99, 19, 'Juhnjhunun', '0'),
(448, 99, 19, 'Jalore', '0'),
(449, 99, 19, 'Jodhpur', '0'),
(450, 99, 19, 'Jaipur', '0'),
(451, 99, 19, 'Jaisalmer', '0'),
(452, 99, 19, 'Jhalawar', '0'),
(453, 99, 19, 'Karauli', '0'),
(454, 99, 19, 'Kota', '0'),
(455, 99, 19, 'Nagaur', '0'),
(456, 99, 19, 'Pali', '0'),
(457, 99, 19, 'Pratapgarh', '0'),
(458, 99, 19, 'Rajsamand', '0'),
(459, 99, 19, 'Sikar', '0'),
(460, 99, 19, 'Sawai Madhopur', '0'),
(461, 99, 19, 'Sirohi', '0'),
(462, 99, 19, 'Tonk', '0'),
(463, 99, 19, 'Udaipur', '0'),
(464, 99, 20, 'East Sikkim', '0'),
(465, 99, 20, 'North Sikkim', '0'),
(466, 99, 20, 'South Sikkim', '0'),
(467, 99, 20, 'West Sikkim', '0'),
(468, 99, 21, 'Ariyalur', '0'),
(469, 99, 21, 'Chennai', '0'),
(470, 99, 21, 'Coimbatore', '0'),
(471, 99, 21, 'Cuddalore', '0'),
(472, 99, 21, 'Dharmapuri', '0'),
(473, 99, 21, 'Dindigul', '0'),
(474, 99, 21, 'Erode', '0'),
(475, 99, 21, 'Kanchipuram', '0'),
(476, 99, 21, 'Kanyakumari', '0'),
(477, 99, 21, 'Karur', '0'),
(478, 99, 21, 'Madurai', '0'),
(479, 99, 21, 'Nagapattinam', '0'),
(480, 99, 21, 'The Nilgiris', '0'),
(481, 99, 21, 'Namakkal', '0'),
(482, 99, 21, 'Perambalur', '0'),
(483, 99, 21, 'Pudukkottai', '0'),
(484, 99, 21, 'Ramanathapuram', '0'),
(485, 99, 21, 'Salem', '0'),
(486, 99, 21, 'Sivagangai', '0'),
(487, 99, 21, 'Tiruppur', '0'),
(488, 99, 21, 'Tiruchirappalli', '0'),
(489, 99, 21, 'Theni', '0'),
(490, 99, 21, 'Tirunelveli', '0'),
(491, 99, 21, 'Thanjavur', '0'),
(492, 99, 21, 'Thoothukudi', '0'),
(493, 99, 21, 'Thiruvallur', '0'),
(494, 99, 21, 'Thiruvarur', '0'),
(495, 99, 21, 'Tiruvannamalai', '0'),
(496, 99, 21, 'Vellore', '0'),
(497, 99, 21, 'Villupuram', '0'),
(498, 99, 22, 'Dhalai', '0'),
(499, 99, 22, 'North Tripura', '0'),
(500, 99, 22, 'South Tripura', '0'),
(501, 99, 22, 'West Tripura', '0'),
(502, 99, 36, 'Almora', '0'),
(503, 99, 36, 'Bageshwar', '0'),
(504, 99, 36, 'Chamoli', '0'),
(505, 99, 36, 'Champawat', '0'),
(506, 99, 36, 'Dehradun', '0'),
(507, 99, 36, 'Haridwar', '0'),
(508, 99, 36, 'Nainital', '0'),
(509, 99, 36, 'Pauri Garhwal', '0'),
(510, 99, 36, 'Pithoragharh', '0'),
(511, 99, 36, 'Rudraprayag', '0'),
(512, 99, 36, 'Tehri Garhwal', '0'),
(513, 99, 36, 'Udham Singh Nagar', '0'),
(514, 99, 36, 'Uttarkashi', '0'),
(515, 99, 23, 'Agra', '0'),
(516, 99, 23, 'Allahabad', '0'),
(517, 99, 23, 'Aligarh', '0'),
(518, 99, 23, 'Ambedkar Nagar', '0'),
(519, 99, 23, 'Auraiya', '0'),
(520, 99, 23, 'Azamgarh', '0'),
(521, 99, 23, 'Barabanki', '0'),
(522, 99, 23, 'Badaun', '0'),
(523, 99, 23, 'Bagpat', '0'),
(524, 99, 23, 'Bahraich', '0'),
(525, 99, 23, 'Bijnor', '0'),
(526, 99, 23, 'Ballia', '0'),
(527, 99, 23, 'Banda', '0'),
(528, 99, 23, 'Balrampur', '0'),
(529, 99, 23, 'Bareilly', '0'),
(530, 99, 23, 'Basti', '0'),
(531, 99, 23, 'Bulandshahr', '0'),
(532, 99, 23, 'Chandauli', '0'),
(533, 99, 23, 'Chitrakoot', '0'),
(534, 99, 23, 'Deoria', '0'),
(535, 99, 23, 'Etah', '0'),
(536, 99, 23, 'Kanshiram Nagar', '0'),
(537, 99, 23, 'Etawah', '0'),
(538, 99, 23, 'Firozabad', '0'),
(539, 99, 23, 'Farrukhabad', '0'),
(540, 99, 23, 'Fatehpur', '0'),
(541, 99, 23, 'Faizabad', '0'),
(542, 99, 23, 'Gautam Buddha Nagar', '0'),
(543, 99, 23, 'Gonda', '0'),
(544, 99, 23, 'Ghazipur', '0'),
(545, 99, 23, 'Gorkakhpur', '0'),
(546, 99, 23, 'Ghaziabad', '0'),
(547, 99, 23, 'Hamirpur', '0'),
(548, 99, 23, 'Hardoi', '0'),
(549, 99, 23, 'Mahamaya Nagar', '0'),
(550, 99, 23, 'Jhansi', '0'),
(551, 99, 23, 'Jalaun', '0'),
(552, 99, 23, 'Jyotiba Phule Nagar', '0'),
(553, 99, 23, 'Jaunpur District', '0'),
(554, 99, 23, 'Kanpur Dehat', '0'),
(555, 99, 23, 'Kannauj', '0'),
(556, 99, 23, 'Kanpur Nagar', '0'),
(557, 99, 23, 'Kaushambi', '0'),
(558, 99, 23, 'Kushinagar', '0'),
(559, 99, 23, 'Lalitpur', '0'),
(560, 99, 23, 'Lakhimpur Kheri', '0'),
(561, 99, 23, 'Lucknow', '0'),
(562, 99, 23, 'Mau', '0'),
(563, 99, 23, 'Meerut', '0'),
(564, 99, 23, 'Maharajganj', '0'),
(565, 99, 23, 'Mahoba', '0'),
(566, 99, 23, 'Mirzapur', '0'),
(567, 99, 23, 'Moradabad', '0'),
(568, 99, 23, 'Mainpuri', '0'),
(569, 99, 23, 'Mathura', '0'),
(570, 99, 23, 'Muzaffarnagar', '0'),
(571, 99, 23, 'Pilibhit', '0'),
(572, 99, 23, 'Pratapgarh', '0'),
(573, 99, 23, 'Rampur', '0'),
(574, 99, 23, 'Rae Bareli', '0'),
(575, 99, 23, 'Saharanpur', '0'),
(576, 99, 23, 'Sitapur', '0'),
(577, 99, 23, 'Shahjahanpur', '0'),
(578, 99, 23, 'Sant Kabir Nagar', '0'),
(579, 99, 23, 'Siddharthnagar', '0'),
(580, 99, 23, 'Sonbhadra', '0'),
(581, 99, 23, 'Sant Ravidas Nagar', '0'),
(582, 99, 23, 'Sultanpur', '0'),
(583, 99, 23, 'Shravasti', '0'),
(584, 99, 23, 'Unnao', '0'),
(585, 99, 23, 'Varanasi', '0'),
(586, 99, 24, 'Birbhum', '0'),
(587, 99, 24, 'Bankura', '0'),
(588, 99, 24, 'Bardhaman', '0'),
(589, 99, 24, 'Darjeeling', '0'),
(590, 99, 24, 'Dakshin Dinajpur', '0'),
(591, 99, 24, 'Hooghly', '0'),
(592, 99, 24, 'Howrah', '0'),
(593, 99, 24, 'Jalpaiguri', '0'),
(594, 99, 24, 'Cooch Behar', '0'),
(595, 99, 24, 'Kolkata', '0'),
(596, 99, 24, 'Malda', '0'),
(597, 99, 24, 'Midnapore', '0'),
(598, 99, 24, 'Murshidabad', '0'),
(599, 99, 24, 'Nadia', '0'),
(600, 99, 24, 'North 24 Parganas', '0'),
(601, 99, 24, 'South 24 Parganas', '0'),
(602, 99, 24, 'Purulia', '0'),
(603, 99, 24, 'Uttar Dinajpur', '0');

-- --------------------------------------------------------

--
-- Table structure for table `lkp_countries`
--

CREATE TABLE `lkp_countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(25) NOT NULL,
  `country_name` varchar(150) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lkp_countries`
--

INSERT INTO `lkp_countries` (`id`, `country_code`, `country_name`, `status`) VALUES
(1, 'AF', 'Afghanistan', 0),
(2, 'AL', 'Albania', 0),
(3, 'DZ', 'Algeria', 0),
(4, 'DS', 'American Samoa', 0),
(5, 'AD', 'Andorra', 0),
(6, 'AO', 'Angola', 0),
(7, 'AI', 'Anguilla', 0),
(8, 'AQ', 'Antarctica', 0),
(9, 'AG', 'Antigua and Barbuda', 0),
(10, 'AR', 'Argentina', 0),
(11, 'AM', 'Armenia', 0),
(12, 'AW', 'Aruba', 0),
(13, 'AU', 'Australia', 0),
(14, 'AT', 'Austria', 0),
(15, 'AZ', 'Azerbaijan', 0),
(16, 'BS', 'Bahamas', 0),
(17, 'BH', 'Bahrain', 0),
(18, 'BD', 'Bangladesh', 0),
(19, 'BB', 'Barbados', 0),
(20, 'BY', 'Belarus', 0),
(21, 'BE', 'Belgium', 0),
(22, 'BZ', 'Belize', 0),
(23, 'BJ', 'Benin', 0),
(24, 'BM', 'Bermuda', 0),
(25, 'BT', 'Bhutan', 0),
(26, 'BO', 'Bolivia', 0),
(27, 'BA', 'Bosnia and Herzegovina', 0),
(28, 'BW', 'Botswana', 0),
(29, 'BV', 'Bouvet Island', 0),
(30, 'BR', 'Brazil', 0),
(31, 'IO', 'British Indian Ocean Territory', 0),
(32, 'BN', 'Brunei Darussalam', 0),
(33, 'BG', 'Bulgaria', 0),
(34, 'BF', 'Burkina Faso', 0),
(35, 'BI', 'Burundi', 0),
(36, 'KH', 'Cambodia', 0),
(37, 'CM', 'Cameroon', 0),
(38, 'CA', 'Canada', 0),
(39, 'CV', 'Cape Verde', 0),
(40, 'KY', 'Cayman Islands', 0),
(41, 'CF', 'Central African Republic', 0),
(42, 'TD', 'Chad', 0),
(43, 'CL', 'Chile', 0),
(44, 'CN', 'China', 0),
(45, 'CX', 'Christmas Island', 0),
(46, 'CC', 'Cocos (Keeling) Islands', 0),
(47, 'CO', 'Colombia', 0),
(48, 'KM', 'Comoros', 0),
(49, 'CG', 'Congo', 0),
(50, 'CK', 'Cook Islands', 0),
(51, 'CR', 'Costa Rica', 0),
(52, 'HR', 'Croatia (Hrvatska)', 0),
(53, 'CU', 'Cuba', 0),
(54, 'CY', 'Cyprus', 0),
(55, 'CZ', 'Czech Republic', 0),
(56, 'DK', 'Denmark', 0),
(57, 'DJ', 'Djibouti', 0),
(58, 'DM', 'Dominica', 0),
(59, 'DO', 'Dominican Republic', 0),
(60, 'TP', 'East Timor', 0),
(61, 'EC', 'Ecuador', 0),
(62, 'EG', 'Egypt', 0),
(63, 'SV', 'El Salvador', 0),
(64, 'GQ', 'Equatorial Guinea', 0),
(65, 'ER', 'Eritrea', 0),
(66, 'EE', 'Estonia', 0),
(67, 'ET', 'Ethiopia', 0),
(68, 'FK', 'Falkland Islands (Malvinas)', 0),
(69, 'FO', 'Faroe Islands', 0),
(70, 'FJ', 'Fiji', 0),
(71, 'FI', 'Finland', 0),
(72, 'FR', 'France', 0),
(73, 'FX', 'France, Metropolitan', 0),
(74, 'GF', 'French Guiana', 0),
(75, 'PF', 'French Polynesia', 0),
(76, 'TF', 'French Southern Territories', 0),
(77, 'GA', 'Gabon', 0),
(78, 'GM', 'Gambia', 0),
(79, 'GE', 'Georgia', 0),
(80, 'DE', 'Germany', 0),
(81, 'GH', 'Ghana', 0),
(82, 'GI', 'Gibraltar', 0),
(83, 'GK', 'Guernsey', 0),
(84, 'GR', 'Greece', 0),
(85, 'GL', 'Greenland', 0),
(86, 'GD', 'Grenada', 0),
(87, 'GP', 'Guadeloupe', 0),
(88, 'GU', 'Guam', 0),
(89, 'GT', 'Guatemala', 0),
(90, 'GN', 'Guinea', 0),
(91, 'GW', 'Guinea-Bissau', 0),
(92, 'GY', 'Guyana', 0),
(93, 'HT', 'Haiti', 0),
(94, 'HM', 'Heard and Mc Donald Islands', 0),
(95, 'HN', 'Honduras', 0),
(96, 'HK', 'Hong Kong', 0),
(97, 'HU', 'Hungary', 0),
(98, 'IS', 'Iceland', 0),
(99, 'IN', 'India', 0),
(100, 'IM', 'Isle of Man', 0),
(101, 'ID', 'Indonesia', 0),
(102, 'IR', 'Iran (Islamic Republic of)', 0),
(103, 'IQ', 'Iraq', 0),
(104, 'IE', 'Ireland', 0),
(105, 'IL', 'Israel', 0),
(106, 'IT', 'Italy', 0),
(107, 'CI', 'Ivory Coast', 0),
(108, 'JE', 'Jersey', 0),
(109, 'JM', 'Jamaica', 0),
(110, 'JP', 'Japan', 0),
(111, 'JO', 'Jordan', 0),
(112, 'KZ', 'Kazakhstan', 0),
(113, 'KE', 'Kenya', 0),
(114, 'KI', 'Kiribati', 0),
(115, 'KP', 'Korea, Democratic People\'s Republic of', 0),
(116, 'KR', 'Korea, Republic of', 0),
(117, 'XK', 'Kosovo', 0),
(118, 'KW', 'Kuwait', 0),
(119, 'KG', 'Kyrgyzstan', 0),
(120, 'LA', 'Lao People\'s Democratic Republic', 0),
(121, 'LV', 'Latvia', 0),
(122, 'LB', 'Lebanon', 0),
(123, 'LS', 'Lesotho', 0),
(124, 'LR', 'Liberia', 0),
(125, 'LY', 'Libyan Arab Jamahiriya', 0),
(126, 'LI', 'Liechtenstein', 0),
(127, 'LT', 'Lithuania', 0),
(128, 'LU', 'Luxembourg', 0),
(129, 'MO', 'Macau', 0),
(130, 'MK', 'Macedonia', 0),
(131, 'MG', 'Madagascar', 0),
(132, 'MW', 'Malawi', 0),
(133, 'MY', 'Malaysia', 0),
(134, 'MV', 'Maldives', 0),
(135, 'ML', 'Mali', 0),
(136, 'MT', 'Malta', 0),
(137, 'MH', 'Marshall Islands', 0),
(138, 'MQ', 'Martinique', 0),
(139, 'MR', 'Mauritania', 0),
(140, 'MU', 'Mauritius', 0),
(141, 'TY', 'Mayotte', 0),
(142, 'MX', 'Mexico', 0),
(143, 'FM', 'Micronesia, Federated States of', 0),
(144, 'MD', 'Moldova, Republic of', 0),
(145, 'MC', 'Monaco', 0),
(146, 'MN', 'Mongolia', 0),
(147, 'ME', 'Montenegro', 0),
(148, 'MS', 'Montserrat', 0),
(149, 'MA', 'Morocco', 0),
(150, 'MZ', 'Mozambique', 0),
(151, 'MM', 'Myanmar', 0),
(152, 'NA', 'Namibia', 0),
(153, 'NR', 'Nauru', 0),
(154, 'NP', 'Nepal', 0),
(155, 'NL', 'Netherlands', 0),
(156, 'AN', 'Netherlands Antilles', 0),
(157, 'NC', 'New Caledonia', 0),
(158, 'NZ', 'New Zealand', 0),
(159, 'NI', 'Nicaragua', 0),
(160, 'NE', 'Niger', 0),
(161, 'NG', 'Nigeria', 0),
(162, 'NU', 'Niue', 0),
(163, 'NF', 'Norfolk Island', 0),
(164, 'MP', 'Northern Mariana Islands', 0),
(165, 'NO', 'Norway', 0),
(166, 'OM', 'Oman', 0),
(167, 'PK', 'Pakistan', 0),
(168, 'PW', 'Palau', 0),
(169, 'PS', 'Palestine', 0),
(170, 'PA', 'Panama', 0),
(171, 'PG', 'Papua New Guinea', 0),
(172, 'PY', 'Paraguay', 0),
(173, 'PE', 'Peru', 0),
(174, 'PH', 'Philippines', 0),
(175, 'PN', 'Pitcairn', 0),
(176, 'PL', 'Poland', 0),
(177, 'PT', 'Portugal', 0),
(178, 'PR', 'Puerto Rico', 0),
(179, 'QA', 'Qatar', 0),
(180, 'RE', 'Reunion', 0),
(181, 'RO', 'Romania', 0),
(182, 'RU', 'Russian Federation', 0),
(183, 'RW', 'Rwanda', 0),
(184, 'KN', 'Saint Kitts and Nevis', 0),
(185, 'LC', 'Saint Lucia', 0),
(186, 'VC', 'Saint Vincent and the Grenadines', 0),
(187, 'WS', 'Samoa', 0),
(188, 'SM', 'San Marino', 0),
(189, 'ST', 'Sao Tome and Principe', 0),
(190, 'SA', 'Saudi Arabia', 0),
(191, 'SN', 'Senegal', 0),
(192, 'RS', 'Serbia', 0),
(193, 'SC', 'Seychelles', 0),
(194, 'SL', 'Sierra Leone', 0),
(195, 'SG', 'Singapore', 0),
(196, 'SK', 'Slovakia', 0),
(197, 'SI', 'Slovenia', 0),
(198, 'SB', 'Solomon Islands', 0),
(199, 'SO', 'Somalia', 0),
(200, 'ZA', 'South Africa', 0),
(201, 'GS', 'South Georgia South Sandwich Islands', 0),
(202, 'ES', 'Spain', 0),
(203, 'LK', 'Sri Lanka', 0),
(204, 'SH', 'St. Helena', 0),
(205, 'PM', 'St. Pierre and Miquelon', 0),
(206, 'SD', 'Sudan', 0),
(207, 'SR', 'Suriname', 0),
(208, 'SJ', 'Svalbard and Jan Mayen Islands', 0),
(209, 'SZ', 'Swaziland', 0),
(210, 'SE', 'Sweden', 0),
(211, 'CH', 'Switzerland', 0),
(212, 'SY', 'Syrian Arab Republic', 0),
(213, 'TW', 'Taiwan', 0),
(214, 'TJ', 'Tajikistan', 0),
(215, 'TZ', 'Tanzania, United Republic of', 0),
(216, 'TH', 'Thailand', 0),
(217, 'TG', 'Togo', 0),
(218, 'TK', 'Tokelau', 0),
(219, 'TO', 'Tonga', 0),
(220, 'TT', 'Trinidad and Tobago', 0),
(221, 'TN', 'Tunisia', 0),
(222, 'TR', 'Turkey', 0),
(223, 'TM', 'Turkmenistan', 0),
(224, 'TC', 'Turks and Caicos Islands', 0),
(225, 'TV', 'Tuvalu', 0),
(226, 'UG', 'Uganda', 0),
(227, 'UA', 'Ukraine', 0),
(228, 'AE', 'United Arab Emirates', 0),
(229, 'GB', 'United Kingdom', 0),
(230, 'US', 'United States', 0),
(231, 'UM', 'United States minor outlying islands', 0),
(232, 'UY', 'Uruguay', 0),
(233, 'UZ', 'Uzbekistan', 0),
(234, 'VU', 'Vanuatu', 0),
(235, 'VA', 'Vatican City State', 0),
(236, 'VE', 'Venezuela', 0),
(237, 'VN', 'Vietnam', 0),
(238, 'VG', 'Virgin Islands (British)', 0),
(239, 'VI', 'Virgin Islands (U.S.)', 0),
(240, 'WF', 'Wallis and Futuna Islands', 0),
(241, 'EH', 'Western Sahara', 0),
(242, 'YE', 'Yemen', 0),
(243, 'ZR', 'Zaire', 0),
(244, 'ZM', 'Zambia', 0),
(245, 'ZW', 'Zimbabwe', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lkp_locations`
--

CREATE TABLE `lkp_locations` (
  `id` int(11) NOT NULL,
  `lkp_country_id` int(11) NOT NULL,
  `lkp_state_id` int(11) NOT NULL,
  `lkp_city_id` int(11) NOT NULL,
  `location_name` varchar(150) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lkp_locations`
--

INSERT INTO `lkp_locations` (`id`, `lkp_country_id`, `lkp_state_id`, `lkp_city_id`, `location_name`, `status`) VALUES
(1, 99, 1, 9, 'Madhapur - 500081 ', 0),
(2, 0, 0, 0, 'Hitech City - 500081', 0),
(3, 0, 0, 0, 'Kondapur - 500084', 0),
(4, 0, 0, 0, 'Jubilee Hills - 500033', 0),
(5, 0, 0, 0, 'Banjara Hills - 500034', 0),
(6, 0, 0, 0, 'Gachibowli - 500032', 0),
(7, 0, 0, 0, 'Kothaguda - 500084', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lkp_states`
--

CREATE TABLE `lkp_states` (
  `id` int(11) NOT NULL,
  `lkp_country_id` int(11) NOT NULL,
  `state_name` varchar(150) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lkp_states`
--

INSERT INTO `lkp_states` (`id`, `lkp_country_id`, `state_name`, `status`) VALUES
(1, 99, 'ANDHRA PRADESH', '0'),
(2, 99, 'ASSAM', '0'),
(3, 99, 'ARUNACHAL PRADESH', '0'),
(4, 99, 'GUJRAT', '0'),
(5, 99, 'BIHAR', '0'),
(6, 99, 'HARYANA', '0'),
(7, 99, 'HIMACHAL PRADESH', '0'),
(8, 99, 'JAMMU & KASHMIR', '0'),
(9, 99, 'KARNATAKA', '0'),
(10, 99, 'KERALA', '0'),
(11, 99, 'MADHYA PRADESH', '0'),
(12, 99, 'MAHARASHTRA', '0'),
(13, 99, 'MANIPUR', '0'),
(14, 99, 'MEGHALAYA', '0'),
(15, 99, 'MIZORAM', '0'),
(16, 99, 'NAGALAND', '0'),
(17, 99, 'ORISSA', '0'),
(18, 99, 'PUNJAB', '0'),
(19, 99, 'RAJASTHAN', '0'),
(20, 99, 'SIKKIM', '0'),
(21, 99, 'TAMIL NADU', '0'),
(22, 99, 'TRIPURA', '0'),
(23, 99, 'UTTAR PRADESH', '0'),
(24, 99, 'WEST BENGAL', '0'),
(25, 99, 'GOA', '0'),
(26, 99, 'PONDICHERY', '0'),
(27, 99, 'LAKSHDWEEP', '0'),
(28, 99, 'DAMAN & DIU', '0'),
(29, 99, 'DADRA & NAGAR', '0'),
(30, 99, 'CHANDIGARH', '0'),
(31, 99, 'ANDAMAN & NICOBAR', '0'),
(32, 99, 'UTTARANCHAL', '0'),
(33, 99, 'JHARKHAND', '0'),
(34, 99, 'CHATTISGARH', '0'),
(35, 99, 'Andaman and Nicobar', '0'),
(36, 99, 'Uttarakhand', '0'),
(37, 99, 'Delhi', '0'),
(38, 99, 'Goa', '0');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `address1` varchar(200) NOT NULL,
  `address2` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `district` varchar(200) NOT NULL,
  `pin_code` varchar(200) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `product_id` varchar(200) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_quantity` varchar(100) NOT NULL,
  `cart_sub_total` varchar(100) NOT NULL,
  `packaging_charges` varchar(250) NOT NULL,
  `delivery_charges` varchar(250) NOT NULL,
  `order_total` varchar(100) NOT NULL,
  `product_price` varchar(200) NOT NULL,
  `product_total_price` varchar(200) NOT NULL,
  `payment_type` varchar(200) NOT NULL DEFAULT '1',
  `payment_status` varchar(200) NOT NULL,
  `order_status` varchar(200) NOT NULL,
  `order_date` datetime NOT NULL,
  `order_id` varchar(150) NOT NULL,
  `transaction_id` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `status`) VALUES
(1, 'Pending'),
(2, 'Completed'),
(3, 'Cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `payment_status`
--

CREATE TABLE `payment_status` (
  `id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_status`
--

INSERT INTO `payment_status` (`id`, `status`) VALUES
(1, 'Pending'),
(2, 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `payment_types`
--

CREATE TABLE `payment_types` (
  `id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_types`
--

INSERT INTO `payment_types` (`id`, `status`) VALUES
(1, 'Cash On Delivery'),
(2, 'Online');

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(11) NOT NULL,
  `admin_title` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `logo` varchar(150) NOT NULL,
  `delivery_charges` varchar(150) NOT NULL,
  `packaging_charges` varchar(250) NOT NULL,
  `footer_text` varchar(150) NOT NULL,
  `address` text NOT NULL,
  `fb_link` varchar(150) NOT NULL,
  `twitter_link` varchar(150) NOT NULL,
  `gplus_link` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `admin_title`, `email`, `mobile`, `logo`, `delivery_charges`, `packaging_charges`, `footer_text`, `address`, `fb_link`, `twitter_link`, `gplus_link`) VALUES
(1, 'FeedBack Panel Super Admin', 'info@ixora.com', '9393497856', 'logo.png', '40', '10', 'Design & Developed By Lancius IT Solutions ', 'Hyderabad', 'https://www.facebook.com/ixora/', 'https://www.instagram.com/', 'https://www.youtube.com/');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_name` varchar(150) NOT NULL,
  `sub_category_image` varchar(150) NOT NULL,
  `subcat_feedback_options` varchar(300) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `sub_category_name`, `sub_category_image`, `subcat_feedback_options`, `status`) VALUES
(1, 6, 'test', 'messages.png', '9,6,5', 0),
(2, 8, 'sandisk', '', '9,8', 0),
(3, 8, 'sony', '', '8,7,6', 0),
(4, 6, 'cellkon', '', '8', 1),
(5, 6, 'Sony', '', '6,5', 0);

-- --------------------------------------------------------

--
-- Table structure for table `supervisors_admin_users`
--

CREATE TABLE `supervisors_admin_users` (
  `id` int(11) NOT NULL,
  `supervisors_random_id` varchar(150) NOT NULL,
  `supervisor_name` varchar(150) NOT NULL,
  `supervisor_email` varchar(50) NOT NULL,
  `supervisor_mobile` varchar(25) NOT NULL,
  `supervisor_location` varchar(250) NOT NULL,
  `supervisor_ref_name` varchar(150) NOT NULL,
  `supervisor_branch` varchar(150) NOT NULL,
  `created_client_admin_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supervisors_admin_users`
--

INSERT INTO `supervisors_admin_users` (`id`, `supervisors_random_id`, `supervisor_name`, `supervisor_email`, `supervisor_mobile`, `supervisor_location`, `supervisor_ref_name`, `supervisor_branch`, `created_client_admin_id`, `status`, `created_at`) VALUES
(1, 'SUPEVIScxg564', 'Supervisor 1', 'sup1@gmail.com', '7894561237', 'Hyderabad', 'Tata Hitch sup', 'hyderabad', 1, 0, '2017-10-06 01:36:02'),
(2, 'SUPEVISqse908', 'Supervisor 2', 'sup2@gmail.com', '9687453214', 'Hyderabad', 'Reference 1', 'Hyderabad', 1, 0, '2017-10-06 03:43:09');

-- --------------------------------------------------------

--
-- Table structure for table `table_status`
--

CREATE TABLE `table_status` (
  `id` int(11) NOT NULL,
  `status` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_status`
--

INSERT INTO `table_status` (`id`, `status`) VALUES
(1, 'All Records'),
(2, 'Single Record'),
(3, 'Active Status'),
(4, 'Using Where'),
(5, 'Rowscount'),
(6, 'Active Top');

-- --------------------------------------------------------

--
-- Table structure for table `tabs_registration`
--

CREATE TABLE `tabs_registration` (
  `id` int(11) NOT NULL,
  `tab_ref_name` varchar(150) NOT NULL,
  `tab_email` varchar(150) NOT NULL,
  `tab_location` varchar(150) NOT NULL,
  `tab_address` varchar(150) NOT NULL,
  `supervisor_name` varchar(150) NOT NULL,
  `category_name` varchar(150) NOT NULL,
  `floor_no` varchar(150) NOT NULL,
  `tab_user_name` varchar(250) NOT NULL,
  `tab_password` varchar(250) NOT NULL,
  `created_client_admin_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabs_registration`
--

INSERT INTO `tabs_registration` (`id`, `tab_ref_name`, `tab_email`, `tab_location`, `tab_address`, `supervisor_name`, `category_name`, `floor_no`, `tab_user_name`, `tab_password`, `created_client_admin_id`, `status`, `created_at`) VALUES
(1, 'Tab 1', 'tab1@gmail.com', 'Hyderabad', 'Hitech City, Hyderabad', 'Supervisor 1', 'Parking Area', '1', 'tab1@gmail.com', 'IQBWSugs', 1, 0, '2017-10-06 03:44:48'),
(2, 'Tab 2 ', 'tab2@gmail.com', 'Hyderabad', 'Madhapur, Hyderabad', 'Supervisor 1', 'Wash Rooms', '2', 'tab2@gmail.com', 'emuhaE8s', 1, 0, '2017-10-06 03:45:44'),
(3, 'Tab 3 ', 'tab3@gmail.com', 'Hyderabad', 'Jubli Hills, Hyderabad', 'Supervisor 2', 'Hospital Beds', '3', 'tab3@gmail.com', 'EVsIHuzK', 1, 0, '2017-10-06 03:46:27'),
(4, 'Tab 4', 'tab4@gmail.com', 'Hyderabad', 'Kondapur, Hyderabad', 'Supervisor 2', 'Parking Area', '4', 'tab4@gmail.com', '2EZVR3db', 1, 0, '2017-10-06 03:47:20');

-- --------------------------------------------------------

--
-- Table structure for table `tab_mobile_feedbacks`
--

CREATE TABLE `tab_mobile_feedbacks` (
  `id` int(11) NOT NULL,
  `tab_ref_name` int(11) NOT NULL,
  `tab_id` int(11) NOT NULL,
  `feedback_status` varchar(150) NOT NULL,
  `category` varchar(250) NOT NULL,
  `client_admin_id` int(11) NOT NULL,
  `supervisor_admin_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_mobile` varchar(200) NOT NULL,
  `user_country_id` int(11) NOT NULL,
  `user_state_id` int(11) NOT NULL,
  `user_city_id` int(11) NOT NULL,
  `user_location_id` int(11) NOT NULL,
  `user_password` varchar(150) NOT NULL DEFAULT '0',
  `user_address` text NOT NULL,
  `created_admin_id` varchar(50) NOT NULL,
  `status` int(200) NOT NULL,
  `created_at` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

CREATE TABLE `user_status` (
  `id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_status`
--

INSERT INTO `user_status` (`id`, `status`) VALUES
(0, 'Active'),
(1, 'In Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_admin_users`
--
ALTER TABLE `client_admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_selected_feedback_options`
--
ALTER TABLE `client_selected_feedback_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content_pages`
--
ALTER TABLE `content_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_enqueries`
--
ALTER TABLE `customer_enqueries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback_options`
--
ALTER TABLE `feedback_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lkp_cities`
--
ALTER TABLE `lkp_cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lkp_countries`
--
ALTER TABLE `lkp_countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lkp_locations`
--
ALTER TABLE `lkp_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lkp_states`
--
ALTER TABLE `lkp_states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_status`
--
ALTER TABLE `payment_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_types`
--
ALTER TABLE `payment_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supervisors_admin_users`
--
ALTER TABLE `supervisors_admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_status`
--
ALTER TABLE `table_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabs_registration`
--
ALTER TABLE `tabs_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `client_admin_users`
--
ALTER TABLE `client_admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `client_selected_feedback_options`
--
ALTER TABLE `client_selected_feedback_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `content_pages`
--
ALTER TABLE `content_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer_enqueries`
--
ALTER TABLE `customer_enqueries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `feedback_options`
--
ALTER TABLE `feedback_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `lkp_cities`
--
ALTER TABLE `lkp_cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=604;
--
-- AUTO_INCREMENT for table `lkp_countries`
--
ALTER TABLE `lkp_countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;
--
-- AUTO_INCREMENT for table `lkp_locations`
--
ALTER TABLE `lkp_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `lkp_states`
--
ALTER TABLE `lkp_states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `payment_status`
--
ALTER TABLE `payment_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `payment_types`
--
ALTER TABLE `payment_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `supervisors_admin_users`
--
ALTER TABLE `supervisors_admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `table_status`
--
ALTER TABLE `table_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tabs_registration`
--
ALTER TABLE `tabs_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_status`
--
ALTER TABLE `user_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
