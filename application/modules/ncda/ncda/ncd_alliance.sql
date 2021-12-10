-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2021 at 09:14 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ncd_alliance`
--

-- --------------------------------------------------------

--
-- Table structure for table `ncda_activities`
--

CREATE TABLE `ncda_activities` (
  `id` int(11) NOT NULL,
  `activity_name` varchar(255) NOT NULL,
  `activity_description` text DEFAULT NULL,
  `objective_id` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ncda_activities`
--

INSERT INTO `ncda_activities` (`id`, `activity_name`, `activity_description`, `objective_id`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Screening', 'They aim to detect diseases at an early stage, before any symptoms become noticeable. This has the advantage of being able to treat the disease', 6, 1, '2021-11-30 19:32:27', '2021-11-30 20:04:58'),
(2, ' Sensitization', ' Sensitization is a non-associative learning process in which repeated administration of a stimulus results in the progressive amplification of a response. Sensitization often is characterized by an enhancement of response to a whole class of stimuli in addition to the one that is repeated.', 6, 1, '2021-11-30 20:06:05', '2021-11-30 20:06:05');

-- --------------------------------------------------------

--
-- Table structure for table `ncda_clinic_types`
--

CREATE TABLE `ncda_clinic_types` (
  `id` int(11) NOT NULL,
  `type_name` varchar(255) NOT NULL,
  `type_description` text DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ncda_contact_catalog`
--

CREATE TABLE `ncda_contact_catalog` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `title` varchar(10) DEFAULT NULL,
  `represents` text DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `address` varchar(255) NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ncda_dhts`
--

CREATE TABLE `ncda_dhts` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact` varchar(100) NOT NULL,
  `facility_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ncda_districts`
--

CREATE TABLE `ncda_districts` (
  `id` int(11) NOT NULL,
  `district_name` varchar(100) NOT NULL,
  `region` varchar(100) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `active` varchar(2) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ncda_districts`
--

INSERT INTO `ncda_districts` (`id`, `district_name`, `region`, `notes`, `active`, `created_at`, `updated_at`) VALUES
(251, 'Buikwe', 'Central Region', NULL, '1', '2021-07-31 07:11:53', '2021-07-31 07:11:53'),
(252, 'Bukomansimbi', 'Central Region', NULL, '1', '2021-07-31 07:11:53', '2021-07-31 07:11:53'),
(253, 'Butambala', 'Central Region', NULL, '1', '2021-07-31 07:11:53', '2021-07-31 07:11:53'),
(254, 'Buvuma', 'Central Region', NULL, '1', '2021-07-31 07:11:53', '2021-07-31 07:11:53'),
(255, 'Gomba', 'Central Region', NULL, '1', '2021-07-31 07:11:53', '2021-07-31 07:11:53'),
(256, 'Kalangala1', 'Central Region', '', '1', '2021-07-31 07:11:53', '2021-11-23 17:04:02'),
(257, 'Kalungu', 'Central Region', NULL, '1', '2021-07-31 07:11:53', '2021-07-31 07:11:53'),
(258, 'Kampala', 'Central Region', NULL, '1', '2021-07-31 07:11:54', '2021-07-31 07:11:54'),
(259, 'Kayunga', 'Central Region', NULL, '1', '2021-07-31 07:11:54', '2021-07-31 07:11:54'),
(260, 'Kiboga', 'Central Region', NULL, '1', '2021-07-31 07:11:54', '2021-07-31 07:11:54'),
(261, 'Kyankwanzi', 'Central Region', NULL, '1', '2021-07-31 07:11:54', '2021-07-31 07:11:54'),
(262, 'Luweero', 'Central Region', NULL, '1', '2021-07-31 07:11:54', '2021-07-31 07:11:54'),
(263, 'Lwengo', 'Central Region', NULL, '1', '2021-07-31 07:11:54', '2021-07-31 07:11:54'),
(264, 'Lyantonde', 'Central Region', NULL, '1', '2021-07-31 07:11:54', '2021-07-31 07:11:54'),
(265, 'Masaka', 'Central Region', NULL, '1', '2021-07-31 07:11:54', '2021-07-31 07:11:54'),
(266, 'Mityana', 'Central Region', NULL, '1', '2021-07-31 07:11:54', '2021-07-31 07:11:54'),
(267, 'Mpigi', 'Central Region', NULL, '1', '2021-07-31 07:11:54', '2021-07-31 07:11:54'),
(268, 'Mubende', 'Central Region', NULL, '1', '2021-07-31 07:11:54', '2021-07-31 07:11:54'),
(269, 'Mukono', 'Central Region', NULL, '1', '2021-07-31 07:11:54', '2021-07-31 07:11:54'),
(270, 'Nakaseke', 'Central Region', NULL, '1', '2021-07-31 07:11:54', '2021-07-31 07:11:54'),
(271, 'Nakasongola', 'Central Region', NULL, '1', '2021-07-31 07:11:54', '2021-07-31 07:11:54'),
(272, 'Rakai', 'Central Region', NULL, '1', '2021-07-31 07:11:55', '2021-07-31 07:11:55'),
(273, 'Sembabule', 'Central Region', NULL, '1', '2021-07-31 07:11:55', '2021-07-31 07:11:55'),
(274, 'Wakiso', 'Central Region', NULL, '1', '2021-07-31 07:11:55', '2021-07-31 07:11:55'),
(275, 'Amuria', 'Eastern Region', NULL, '1', '2021-07-31 07:11:55', '2021-07-31 07:11:55'),
(276, 'Budaka', 'Eastern Region', NULL, '1', '2021-07-31 07:11:55', '2021-07-31 07:11:55'),
(277, 'Bududa', 'Eastern Region', NULL, '1', '2021-07-31 07:11:55', '2021-07-31 07:11:55'),
(278, 'Bugiri', 'Eastern Region', NULL, '1', '2021-07-31 07:11:55', '2021-07-31 07:11:55'),
(279, 'Bukedea', 'Eastern Region', NULL, '1', '2021-07-31 07:11:55', '2021-07-31 07:11:55'),
(280, 'Bukwa', 'Eastern Region', NULL, '1', '2021-07-31 07:11:55', '2021-07-31 07:11:55'),
(281, 'Bulambuli', 'Eastern Region', NULL, '1', '2021-07-31 07:11:55', '2021-07-31 07:11:55'),
(282, 'Busia', 'Eastern Region', NULL, '1', '2021-07-31 07:11:55', '2021-07-31 07:11:55'),
(283, 'Butaleja', 'Eastern Region', NULL, '1', '2021-07-31 07:11:55', '2021-07-31 07:11:55'),
(284, 'Buyende', 'Eastern Region', NULL, '1', '2021-07-31 07:11:55', '2021-07-31 07:11:55'),
(285, 'Iganga', 'Eastern Region', NULL, '1', '2021-07-31 07:11:55', '2021-07-31 07:11:55'),
(286, 'Jinja', 'Eastern Region', NULL, '1', '2021-07-31 07:11:55', '2021-07-31 07:11:55'),
(287, 'Kaberamaido', 'Eastern Region', NULL, '1', '2021-07-31 07:11:56', '2021-07-31 07:11:56'),
(288, 'Kaliro', 'Eastern Region', NULL, '1', '2021-07-31 07:11:56', '2021-07-31 07:11:56'),
(289, 'Kamuli', 'Eastern Region', NULL, '1', '2021-07-31 07:11:56', '2021-07-31 07:11:56'),
(290, 'Kapchorwa', 'Eastern Region', NULL, '1', '2021-07-31 07:11:56', '2021-07-31 07:11:56'),
(291, 'Katakwi', 'Eastern Region', NULL, '1', '2021-07-31 07:11:56', '2021-07-31 07:11:56'),
(292, 'Kibuku', 'Eastern Region', NULL, '1', '2021-07-31 07:11:56', '2021-07-31 07:11:56'),
(293, 'Kumi', 'Eastern Region', NULL, '1', '2021-07-31 07:11:56', '2021-07-31 07:11:56'),
(294, 'Kween', 'Eastern Region', NULL, '1', '2021-07-31 07:11:56', '2021-07-31 07:11:56'),
(295, 'Luuka', 'Eastern Region', NULL, '1', '2021-07-31 07:11:56', '2021-07-31 07:11:56'),
(296, 'Manafwa', 'Eastern Region', NULL, '1', '2021-07-31 07:11:56', '2021-07-31 07:11:56'),
(297, 'Mayuge', 'Eastern Region', NULL, '1', '2021-07-31 07:11:56', '2021-07-31 07:11:56'),
(298, 'Mbale', 'Eastern Region', NULL, '1', '2021-07-31 07:11:56', '2021-07-31 07:11:56'),
(299, 'Namayingo', 'Eastern Region', NULL, '1', '2021-07-31 07:11:56', '2021-07-31 07:11:56'),
(300, 'Namutumba', 'Eastern Region', NULL, '1', '2021-07-31 07:11:56', '2021-07-31 07:11:56'),
(301, 'Ngora', 'Eastern Region', NULL, '1', '2021-07-31 07:11:56', '2021-07-31 07:11:56'),
(302, 'Pallisa', 'Eastern Region', NULL, '1', '2021-07-31 07:11:56', '2021-07-31 07:11:56'),
(303, 'Serere', 'Eastern Region', NULL, '1', '2021-07-31 07:11:56', '2021-07-31 07:11:56'),
(304, 'Sironko', 'Eastern Region', NULL, '1', '2021-07-31 07:11:56', '2021-07-31 07:11:56'),
(305, 'Soroti', 'Eastern Region', NULL, '1', '2021-07-31 07:11:56', '2021-07-31 07:11:56'),
(306, 'Tororo', 'Eastern Region', NULL, '1', '2021-07-31 07:11:56', '2021-07-31 07:11:56'),
(307, 'Abim', 'Northern Region', NULL, '1', '2021-07-31 07:11:56', '2021-07-31 07:11:56'),
(308, 'Adjumani', 'Northern Region', NULL, '1', '2021-07-31 07:11:56', '2021-07-31 07:11:56'),
(309, 'Agago', 'Northern Region', NULL, '1', '2021-07-31 07:11:56', '2021-07-31 07:11:56'),
(310, 'Alebtong', 'Northern Region', NULL, '1', '2021-07-31 07:11:56', '2021-07-31 07:11:56'),
(311, 'Amolatar', 'Northern Region', NULL, '1', '2021-07-31 07:11:57', '2021-07-31 07:11:57'),
(312, 'Amudat', 'Northern Region', NULL, '1', '2021-07-31 07:11:57', '2021-07-31 07:11:57'),
(313, 'Amuru', 'Northern Region', NULL, '1', '2021-07-31 07:11:57', '2021-07-31 07:11:57'),
(314, 'Apac', 'Northern Region', NULL, '1', '2021-07-31 07:11:57', '2021-07-31 07:11:57'),
(315, 'Arua', 'Northern Region', NULL, '1', '2021-07-31 07:11:57', '2021-07-31 07:11:57'),
(316, 'Dokolo', 'Northern Region', NULL, '1', '2021-07-31 07:11:57', '2021-07-31 07:11:57'),
(317, 'Gulu', 'Northern Region', NULL, '1', '2021-07-31 07:11:57', '2021-07-31 07:11:57'),
(318, 'Kaabong', 'Northern Region', NULL, '1', '2021-07-31 07:11:57', '2021-07-31 07:11:57'),
(319, 'Kitgum', 'Northern Region', NULL, '1', '2021-07-31 07:11:57', '2021-07-31 07:11:57'),
(320, 'Koboko', 'Northern Region', NULL, '1', '2021-07-31 07:11:57', '2021-07-31 07:11:57'),
(321, 'Kole', 'Northern Region', NULL, '1', '2021-07-31 07:11:57', '2021-07-31 07:11:57'),
(322, 'Kotido', 'Northern Region', NULL, '1', '2021-07-31 07:11:57', '2021-07-31 07:11:57'),
(323, 'Lamwo', 'Northern Region', NULL, '1', '2021-07-31 07:11:57', '2021-07-31 07:11:57'),
(324, 'Lira', 'Northern Region', NULL, '1', '2021-07-31 07:11:57', '2021-07-31 07:11:57'),
(325, 'Maracha', 'Northern Region', NULL, '1', '2021-07-31 07:11:57', '2021-07-31 07:11:57'),
(326, 'Moroto', 'Northern Region', NULL, '1', '2021-07-31 07:11:57', '2021-07-31 07:11:57'),
(327, 'Moyo', 'Northern Region', NULL, '1', '2021-07-31 07:11:57', '2021-07-31 07:11:57'),
(328, 'Nakapiripirit', 'Northern Region', NULL, '1', '2021-07-31 07:11:57', '2021-07-31 07:11:57'),
(329, 'Napak', 'Northern Region', NULL, '1', '2021-07-31 07:11:57', '2021-07-31 07:11:57'),
(330, 'Nebbi', 'Northern Region', NULL, '1', '2021-07-31 07:11:57', '2021-07-31 07:11:57'),
(331, 'Nwoya', 'Northern Region', NULL, '1', '2021-07-31 07:11:57', '2021-07-31 07:11:57'),
(332, 'Otuke', 'Northern Region', NULL, '1', '2021-07-31 07:11:57', '2021-07-31 07:11:57'),
(333, 'Oyam', 'Northern Region', NULL, '1', '2021-07-31 07:11:57', '2021-07-31 07:11:57'),
(334, 'Pader', 'Northern Region', NULL, '1', '2021-07-31 07:11:57', '2021-07-31 07:11:57'),
(335, 'Yumbe', 'Northern Region', NULL, '1', '2021-07-31 07:11:57', '2021-07-31 07:11:57'),
(336, 'Zombo', 'Northern Region', NULL, '1', '2021-07-31 07:11:57', '2021-07-31 07:11:57'),
(337, 'Buhweju', 'Western Region', NULL, '1', '2021-07-31 07:11:57', '2021-07-31 07:11:57'),
(338, 'Buliisa', 'Western Region', NULL, '1', '2021-07-31 07:11:58', '2021-07-31 07:11:58'),
(339, 'Bundibugyo', 'Western Region', NULL, '1', '2021-07-31 07:11:58', '2021-07-31 07:11:58'),
(340, 'Bushenyi', 'Western Region', NULL, '1', '2021-07-31 07:11:58', '2021-07-31 07:11:58'),
(341, 'Hoima', 'Western Region', NULL, '1', '2021-07-31 07:11:58', '2021-07-31 07:11:58'),
(342, 'Ibanda', 'Western Region', NULL, '1', '2021-07-31 07:11:58', '2021-07-31 07:11:58'),
(343, 'Isingiro', 'Western Region', NULL, '1', '2021-07-31 07:11:58', '2021-07-31 07:11:58'),
(344, 'Kabale', 'Western Region', NULL, '1', '2021-07-31 07:11:58', '2021-07-31 07:11:58'),
(345, 'Kabarole', 'Western Region', NULL, '1', '2021-07-31 07:11:58', '2021-07-31 07:11:58'),
(346, 'Kamwenge', 'Western Region', NULL, '1', '2021-07-31 07:11:58', '2021-07-31 07:11:58'),
(347, 'Kanungu', 'Western Region', NULL, '1', '2021-07-31 07:11:58', '2021-07-31 07:11:58'),
(348, 'Kasese', 'Western Region', NULL, '1', '2021-07-31 07:11:58', '2021-07-31 07:11:58'),
(349, 'Kazo', 'Western Region', NULL, '1', '2021-07-31 07:11:58', '2021-07-31 07:11:58'),
(350, 'Kibaale', 'Western Region', NULL, '1', '2021-07-31 07:11:58', '2021-07-31 07:11:58'),
(351, 'Kiruhura', 'Western Region', NULL, '1', '2021-07-31 07:11:58', '2021-07-31 07:11:58'),
(352, 'Kiryandongo', 'Western Region', NULL, '1', '2021-07-31 07:11:58', '2021-07-31 07:11:58'),
(353, 'Kisoro', 'Western Region', NULL, '1', '2021-07-31 07:11:58', '2021-07-31 07:11:58'),
(354, 'Kyegegwa', 'Western Region', NULL, '1', '2021-07-31 07:11:58', '2021-07-31 07:11:58'),
(355, 'Kyenjojo', 'Western Region', NULL, '1', '2021-07-31 07:11:58', '2021-07-31 07:11:58'),
(356, 'Masindi', 'Western Region', NULL, '1', '2021-07-31 07:11:58', '2021-07-31 07:11:58'),
(357, 'Mitooma', 'Western Region', NULL, '1', '2021-07-31 07:11:58', '2021-07-31 07:11:58'),
(358, 'Ntoroko', 'Western Region', NULL, '1', '2021-07-31 07:11:58', '2021-07-31 07:11:58'),
(359, 'Ntungamo', 'Western Region', NULL, '1', '2021-07-31 07:11:58', '2021-07-31 07:11:58'),
(360, 'Rubirizi', 'Western Region', NULL, '1', '2021-07-31 07:11:58', '2021-07-31 07:11:58'),
(361, 'Rukiga', 'Western Region', NULL, '1', '2021-07-31 07:11:58', '2021-07-31 07:11:58'),
(362, 'Rukungiri', 'Western Region', NULL, '1', '2021-07-31 07:11:58', '2021-07-31 07:11:58'),
(363, 'Sheema', 'Western Region', NULL, '1', '2021-07-31 07:11:58', '2021-07-31 07:11:58');

-- --------------------------------------------------------

--
-- Table structure for table `ncda_facilities`
--

CREATE TABLE `ncda_facilities` (
  `id` int(11) NOT NULL,
  `facility_name` varchar(255) NOT NULL,
  `facilty_description` text DEFAULT NULL,
  `facility_head` varchar(100) DEFAULT NULL,
  `district_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ncda_field_activity_data`
--

CREATE TABLE `ncda_field_activity_data` (
  `id` int(11) NOT NULL,
  `parameter_id` int(11) NOT NULL,
  `parameter_value` int(11) NOT NULL,
  `mode_of_operation` varchar(20) DEFAULT NULL,
  `facility_id` int(11) NOT NULL,
  `clinic_type_id` int(11) NOT NULL,
  `action_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ncda_meetings`
--

CREATE TABLE `ncda_meetings` (
  `id` int(11) NOT NULL,
  `meeting_name` varchar(255) NOT NULL,
  `meeting_description` text DEFAULT NULL,
  `meeting_date` date DEFAULT NULL,
  `venue` varchar(255) DEFAULT NULL,
  `start_at` time DEFAULT NULL,
  `end_at` time DEFAULT NULL,
  `attachments` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ncda_meeting_action_points`
--

CREATE TABLE `ncda_meeting_action_points` (
  `id` int(11) NOT NULL,
  `meeting_id` int(11) NOT NULL,
  `discusion_id` int(11) DEFAULT NULL,
  `action_point` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ncda_meeting_discusions`
--

CREATE TABLE `ncda_meeting_discusions` (
  `id` int(11) NOT NULL,
  `meeting_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_details` text DEFAULT NULL,
  `suggestion` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ncda_meeting_impacts`
--

CREATE TABLE `ncda_meeting_impacts` (
  `id` int(11) NOT NULL,
  `meeting_id` int(11) NOT NULL,
  `impact_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ncda_meeting_participants`
--

CREATE TABLE `ncda_meeting_participants` (
  `id` int(11) NOT NULL,
  `meeting_id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `group_represented` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ncda_ojectives`
--

CREATE TABLE `ncda_ojectives` (
  `id` int(11) NOT NULL,
  `objective_name` varchar(255) NOT NULL,
  `objective_description` text DEFAULT NULL,
  `project_id` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ncda_ojectives`
--

INSERT INTO `ncda_ojectives` (`id`, `objective_name`, `objective_description`, `project_id`, `created_by`, `created_at`, `updated_at`) VALUES
(5, ' To increase testing turnups per quoter', '  To increase testing turnups per quoter', 1, 1, '2021-11-24 17:51:50', '2021-11-24 17:51:50'),
(6, ' To minimize the number of communicable diseases deaths through early detection and medication', ' What is a communicable disease? A communicable disease is one that is spread from one person to another through a variety of ways that include: contact with blood and bodily fluids; breathing in an airborne virus; or by being bitten by an insect.', 1, 1, '2021-11-30 18:30:51', '2021-11-30 18:30:51');

-- --------------------------------------------------------

--
-- Table structure for table `ncda_parameters`
--

CREATE TABLE `ncda_parameters` (
  `id` int(11) NOT NULL,
  `parameter_name` varchar(255) NOT NULL,
  `parameter_description` text DEFAULT NULL,
  `activity_id` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ncda_parameters`
--

INSERT INTO `ncda_parameters` (`id`, `parameter_name`, `parameter_description`, `activity_id`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Number of People Screened', 'aims to improve screening practice through the life-course to increase effective- ... and treatment services in the population and among', 1, 1, '2021-11-30 21:03:05', '2021-11-30 21:03:05'),
(2, ' Number of positive cases (+ve)', ' ', 1, 1, '2021-11-30 21:28:07', '2021-11-30 21:28:07'),
(3, '  Number of negative cases (-ve)', ' ', 1, 1, '2021-11-30 21:29:51', '2021-11-30 21:29:51');

-- --------------------------------------------------------

--
-- Table structure for table `ncda_projects`
--

CREATE TABLE `ncda_projects` (
  `id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_description` text DEFAULT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ncda_projects`
--

INSERT INTO `ncda_projects` (`id`, `project_name`, `project_description`, `duration`, `start_date`, `end_date`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Strengthening Testing of Communicable diseases in South Western Uganda', ' Immunisation is a means of protecting a person against vaccine preventable diseases\r\nby building the body’s defence system so that it is able to fight off diseases.\r\nThis is achieved through giving vaccines to a person through the mouth and/or by\r\ninjections', '150 days', '2021-12-01', '2022-04-30', NULL, '2021-11-22 17:41:26', '2021-11-24 16:33:26'),
(2, 'Assessing the Impact of Immunisation in central Uganda', ' ddreteeww', '37 days', '2021-11-24', '2021-12-31', NULL, '2021-11-24 15:50:37', '2021-11-24 15:53:56'),
(3, ' ddfdsfgd', ' gterttr', '6 days', '2021-11-24', '2021-11-30', NULL, '2021-11-24 16:56:25', '2021-11-24 16:56:25');

-- --------------------------------------------------------

--
-- Table structure for table `ncda_roles`
--

CREATE TABLE `ncda_roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `role_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ncda_system_permissions`
--

CREATE TABLE `ncda_system_permissions` (
  `id` int(11) NOT NULL,
  `permision_name` int(11) NOT NULL,
  `permision_description` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ncda_users`
--

CREATE TABLE `ncda_users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ncda_user_roles`
--

CREATE TABLE `ncda_user_roles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ncda_activities`
--
ALTER TABLE `ncda_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ncda_clinic_types`
--
ALTER TABLE `ncda_clinic_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ncda_contact_catalog`
--
ALTER TABLE `ncda_contact_catalog`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `ncda_dhts`
--
ALTER TABLE `ncda_dhts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone_number` (`contact`);

--
-- Indexes for table `ncda_districts`
--
ALTER TABLE `ncda_districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ncda_facilities`
--
ALTER TABLE `ncda_facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ncda_field_activity_data`
--
ALTER TABLE `ncda_field_activity_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ncda_meetings`
--
ALTER TABLE `ncda_meetings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ncda_meeting_action_points`
--
ALTER TABLE `ncda_meeting_action_points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ncda_meeting_discusions`
--
ALTER TABLE `ncda_meeting_discusions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ncda_meeting_impacts`
--
ALTER TABLE `ncda_meeting_impacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ncda_meeting_participants`
--
ALTER TABLE `ncda_meeting_participants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ncda_ojectives`
--
ALTER TABLE `ncda_ojectives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ncda_parameters`
--
ALTER TABLE `ncda_parameters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ncda_projects`
--
ALTER TABLE `ncda_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ncda_roles`
--
ALTER TABLE `ncda_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ncda_users`
--
ALTER TABLE `ncda_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ncda_user_roles`
--
ALTER TABLE `ncda_user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ncda_activities`
--
ALTER TABLE `ncda_activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ncda_clinic_types`
--
ALTER TABLE `ncda_clinic_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ncda_contact_catalog`
--
ALTER TABLE `ncda_contact_catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ncda_dhts`
--
ALTER TABLE `ncda_dhts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ncda_districts`
--
ALTER TABLE `ncda_districts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=365;

--
-- AUTO_INCREMENT for table `ncda_facilities`
--
ALTER TABLE `ncda_facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ncda_field_activity_data`
--
ALTER TABLE `ncda_field_activity_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ncda_meetings`
--
ALTER TABLE `ncda_meetings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ncda_meeting_action_points`
--
ALTER TABLE `ncda_meeting_action_points`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ncda_meeting_discusions`
--
ALTER TABLE `ncda_meeting_discusions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ncda_meeting_impacts`
--
ALTER TABLE `ncda_meeting_impacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ncda_meeting_participants`
--
ALTER TABLE `ncda_meeting_participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ncda_ojectives`
--
ALTER TABLE `ncda_ojectives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ncda_parameters`
--
ALTER TABLE `ncda_parameters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ncda_projects`
--
ALTER TABLE `ncda_projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ncda_roles`
--
ALTER TABLE `ncda_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ncda_users`
--
ALTER TABLE `ncda_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ncda_user_roles`
--
ALTER TABLE `ncda_user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
