-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2023 at 04:12 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `permis_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_logs`
--

CREATE TABLE `app_logs` (
  `log_id` int(11) NOT NULL,
  `Timestamp` varchar(255) DEFAULT NULL,
  `Action` varchar(255) DEFAULT NULL,
  `TableName` varchar(255) DEFAULT NULL,
  `RecordID` varchar(255) DEFAULT NULL,
  `SqlQuery` varchar(255) DEFAULT NULL,
  `UserID` varchar(255) DEFAULT NULL,
  `ServerIP` varchar(255) DEFAULT NULL,
  `RequestUrl` text DEFAULT NULL,
  `RequestData` text DEFAULT NULL,
  `RequestCompleted` varchar(255) DEFAULT NULL,
  `RequestMsg` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `Id` int(11) NOT NULL,
  `FileName` longtext DEFAULT NULL,
  `Path` longtext DEFAULT NULL,
  `FileGivenName` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `auditorgeneralfocusarea`
--

CREATE TABLE `auditorgeneralfocusarea` (
  `AudGenPlanId` int(11) NOT NULL,
  `AudKeyResultArea` varchar(255) NOT NULL,
  `AudWeight` int(11) NOT NULL,
  `AudTotalKRA` int(11) NOT NULL,
  `Employee` int(11) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Supervisor` int(11) NOT NULL,
  `Period` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `auditor_general_opinion_and_findings`
--

CREATE TABLE `auditor_general_opinion_and_findings` (
  `id` int(11) NOT NULL,
  `employee` int(11) NOT NULL,
  `period` varchar(100) NOT NULL,
  `template_name` varchar(200) NOT NULL,
  `ag_weight` int(11) NOT NULL,
  `ag_assessment_score` int(11) NOT NULL,
  `app_weight` int(11) NOT NULL,
  `num_planned_targets` int(11) NOT NULL,
  `targets_achieved` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auditor_general_opinion_and_findings`
--

INSERT INTO `auditor_general_opinion_and_findings` (`id`, `employee`, `period`, `template_name`, `ag_weight`, `ag_assessment_score`, `app_weight`, `num_planned_targets`, `targets_achieved`) VALUES
(1, 2, '2023/2024', 'ANNUAL ASSESSMENT', 3, 3, 3, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `business_unit`
--

CREATE TABLE `business_unit` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business_unit`
--

INSERT INTO `business_unit` (`id`, `name`) VALUES
(1, 'GITO'),
(2, 'HR');

-- --------------------------------------------------------

--
-- Table structure for table `competencies_personal_development_plan`
--

CREATE TABLE `competencies_personal_development_plan` (
  `id` int(11) NOT NULL,
  `core_management_competencies` varchar(1000) NOT NULL,
  `process_competencies` varchar(1000) NOT NULL,
  `other_developmental_areas_identified` varchar(1000) NOT NULL,
  `employee` int(50) NOT NULL,
  `period` varchar(20) NOT NULL,
  `template_name` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `Id` int(11) NOT NULL,
  `ContractName` longtext DEFAULT NULL,
  `Type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contracttypes`
--

CREATE TABLE `contracttypes` (
  `TypeId` int(11) NOT NULL,
  `TypeName` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `directorate`
--

CREATE TABLE `directorate` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `directorate`
--

INSERT INTO `directorate` (`id`, `name`) VALUES
(1, 'Operational Employee2'),
(2, 'prolance'),
(3, 'kjlknvda'),
(4, 'GITO');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `DistrictId` int(11) NOT NULL,
  `DistrictName` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`DistrictId`, `DistrictName`) VALUES
(1, 'LIMPOPO2'),
(2, 'Thima24'),
(3, 'Operational Employee2');

-- --------------------------------------------------------

--
-- Table structure for table `duties`
--

CREATE TABLE `duties` (
  `id` int(11) NOT NULL,
  `employee` int(11) NOT NULL,
  `period` varchar(100) NOT NULL,
  `template_name` varchar(200) NOT NULL,
  `description` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `duties`
--

INSERT INTO `duties` (`id`, `employee`, `period`, `template_name`, `description`) VALUES
(1, 2, '2023/2024', 'PERFORMANCE INSTRUMENT', 'Annual Leave for 2022/2023'),
(2, 2, '2023/2024', 'PERFORMANCE INSTRUMENT', 'x');

-- --------------------------------------------------------

--
-- Table structure for table `duty_reason`
--

CREATE TABLE `duty_reason` (
  `id` int(11) NOT NULL,
  `employee` int(11) NOT NULL,
  `period` varchar(100) NOT NULL,
  `template_name` varchar(200) NOT NULL,
  `description` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `duty_reason`
--

INSERT INTO `duty_reason` (`id`, `employee`, `period`, `template_name`, `description`) VALUES
(1, 2, '2023/2024', 'PERFORMANCE INSTRUMENT', 'Annual Leave for 2023/2024'),
(2, 2, '2023/2024', 'PERFORMANCE INSTRUMENT', 'Annual Leave for 2023/2024'),
(3, 2, '2023/2024', 'PERFORMANCE INSTRUMENT', 'a'),
(4, 2, '2023/2024', 'PERFORMANCE INSTRUMENT', 'zzzzz'),
(6, 2, '2023/2024', 'PERFORMANCE INSTRUMENT', 'x');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `Id` int(11) NOT NULL,
  `Name` longtext DEFAULT NULL,
  `LastName` longtext DEFAULT NULL,
  `Email` longtext DEFAULT NULL,
  `Gender` longtext DEFAULT NULL,
  `IdNumber` longtext DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Persal` int(11) NOT NULL,
  `DateCreated` date DEFAULT NULL,
  `DateContracted` date DEFAULT NULL,
  `Username` longtext DEFAULT NULL,
  `SupervisorId` int(11) DEFAULT NULL,
  `JobTitle` int(11) DEFAULT NULL,
  `Role` int(11) DEFAULT NULL,
  `Race` longtext DEFAULT NULL,
  `DistrictId` int(11) DEFAULT NULL,
  `Status` varchar(100) DEFAULT NULL,
  `Contact` varchar(20) DEFAULT NULL,
  `Disability` varchar(5) DEFAULT NULL,
  `AppointmentDate` date DEFAULT NULL,
  `SalaryLevelEntryDate` date DEFAULT NULL,
  `SalaryLevel` int(10) DEFAULT NULL,
  `assigned_directorate` int(11) DEFAULT NULL,
  `directorate` int(11) DEFAULT NULL,
  `sub_directorate` int(11) DEFAULT NULL,
  `notch` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`Id`, `Name`, `LastName`, `Email`, `Gender`, `IdNumber`, `Password`, `Persal`, `DateCreated`, `DateContracted`, `Username`, `SupervisorId`, `JobTitle`, `Role`, `Race`, `DistrictId`, `Status`, `Contact`, `Disability`, `AppointmentDate`, `SalaryLevelEntryDate`, `SalaryLevel`, `assigned_directorate`, `directorate`, `sub_directorate`, `notch`) VALUES
(2, 'ADMIN', 'USER', 'thimakulani@gmail.com', 'Male', '121212', '8cb2237d0679ca88db6464eac60da96345513964', 12345, '2022-11-24', '2022-11-24', '108813', 2, 1, 2, 'African', 1, 'Active', '0713934923', 'No', '2023-02-10', '2023-02-10', 13, 2, 1, 0, NULL),
(50, NULL, 'Tjebana M.P', NULL, NULL, NULL, '75b66f59e59ff0a170af569e627f0da830110891', 82091081, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, NULL, NULL, 13, NULL, NULL, NULL, '1173231'),
(51, NULL, 'Nemadzhilili AC', NULL, NULL, NULL, NULL, 81617585, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, NULL, NULL, 13, NULL, NULL, NULL, '1173231'),
(52, NULL, 'Moshoana DJ', NULL, NULL, NULL, NULL, 81517386, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, NULL, NULL, 13, NULL, NULL, NULL, '1226817'),
(53, NULL, 'Pholosi M.V (Mbulaheni)', NULL, NULL, NULL, NULL, 82370486, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, NULL, NULL, 13, NULL, NULL, NULL, '1155891'),
(54, NULL, 'Mphahlele M.S', NULL, NULL, NULL, NULL, 17461588, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, NULL, NULL, 13, NULL, NULL, NULL, '1245231'),
(55, NULL, 'Matlala  M.L', NULL, NULL, NULL, NULL, 14597446, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, NULL, NULL, 14, NULL, NULL, NULL, '1409157'),
(56, NULL, 'Makamu RI', NULL, NULL, NULL, NULL, 80215068, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, NULL, NULL, 14, NULL, NULL, NULL, '1347606'),
(57, NULL, 'Ramaipadi M.A', NULL, NULL, NULL, NULL, 81119135, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, NULL, NULL, 14, NULL, NULL, NULL, '1367811'),
(58, NULL, 'Moja MM', NULL, NULL, NULL, NULL, 16486862, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, NULL, NULL, 14, NULL, NULL, NULL, '1263900'),
(59, NULL, 'Baloyi S.T', NULL, NULL, NULL, NULL, 23029293, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, NULL, NULL, 13, NULL, NULL, NULL, '1190826'),
(60, NULL, 'Chuma A.M', NULL, NULL, NULL, NULL, 80721681, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, NULL, NULL, 13, NULL, NULL, NULL, '1208691'),
(61, NULL, 'Mposhomali R', NULL, NULL, NULL, NULL, 82603804, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, NULL, NULL, 13, NULL, NULL, NULL, '1226817'),
(62, NULL, 'Mamabolo KB', NULL, NULL, NULL, NULL, 21682674, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, NULL, NULL, 13, NULL, NULL, NULL, '1138800'),
(63, NULL, 'Nake MP', NULL, NULL, NULL, NULL, 80210708, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, NULL, NULL, 13, NULL, NULL, NULL, '1208691'),
(64, NULL, 'Mashamba NS', NULL, NULL, NULL, NULL, 81742941, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, NULL, NULL, 13, NULL, NULL, NULL, '1208691'),
(65, NULL, 'Netshanzhe TG', NULL, NULL, NULL, NULL, 81781067, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, NULL, NULL, 13, NULL, NULL, NULL, '1105383'),
(66, NULL, 'Malahlela NP', NULL, NULL, NULL, NULL, 82370010, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, NULL, NULL, 13, NULL, NULL, NULL, '1173231'),
(67, NULL, 'Selomo ME', NULL, NULL, NULL, NULL, 81884982, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, NULL, NULL, 14, NULL, NULL, NULL, '1409157'),
(68, NULL, 'Mashashane PJ', NULL, NULL, NULL, NULL, 81619154, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, NULL, NULL, 13, NULL, NULL, NULL, '1138800'),
(69, NULL, 'Mashamaite EN', NULL, NULL, NULL, NULL, 19279931, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, NULL, NULL, 13, NULL, NULL, NULL, '1190826'),
(70, NULL, 'Buys IY', NULL, NULL, NULL, NULL, 80085521, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, NULL, NULL, 13, NULL, NULL, NULL, '1105383'),
(71, NULL, 'Phalane AM (Mokou)', NULL, NULL, NULL, NULL, 22069933, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, NULL, NULL, 13, NULL, NULL, NULL, '1105383'),
(72, NULL, 'MathunyanecSM', NULL, NULL, NULL, NULL, 84203269, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, NULL, NULL, 14, NULL, NULL, NULL, '1327680'),
(73, NULL, 'Mohlala PM', NULL, NULL, NULL, NULL, 16851943, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, NULL, NULL, 14, NULL, NULL, NULL, '1327680'),
(74, NULL, 'Dkotla MR', NULL, NULL, NULL, NULL, 80464921, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, NULL, NULL, 14, NULL, NULL, NULL, '1540839'),
(75, NULL, 'Budeli MS', NULL, NULL, NULL, NULL, 81573251, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, NULL, NULL, 13, NULL, NULL, NULL, '1105632'),
(76, NULL, 'Mariba N', NULL, NULL, NULL, NULL, 82635226, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, NULL, NULL, 14, NULL, NULL, NULL, '1473537'),
(77, NULL, 'Mokgala MS', NULL, NULL, NULL, NULL, 80745741, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, NULL, NULL, 15, NULL, NULL, NULL, ''),
(78, NULL, 'Kgoahla MS', NULL, NULL, NULL, NULL, 82131686, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, NULL, NULL, 15, NULL, NULL, NULL, ''),
(79, NULL, 'Dr Malahlela MM', NULL, NULL, NULL, NULL, 80629521, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, NULL, NULL, 16, NULL, NULL, NULL, ''),
(80, NULL, 'Mokoena MA', NULL, NULL, NULL, NULL, 81340869, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, NULL, NULL, 13, NULL, NULL, NULL, ''),
(81, NULL, 'Mashashane J', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, NULL, NULL, 13, NULL, NULL, NULL, ''),
(82, NULL, 'Mubva T', NULL, NULL, NULL, NULL, 22524720, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, NULL, NULL, 13, NULL, NULL, NULL, ''),
(83, NULL, 'Rambiyana RT', NULL, NULL, NULL, NULL, 19074182, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, NULL, NULL, 14, NULL, NULL, NULL, ''),
(84, NULL, 'Malatji KE', NULL, NULL, NULL, NULL, 82562873, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, NULL, NULL, 13, NULL, NULL, NULL, ''),
(85, NULL, 'Libago AV', NULL, NULL, NULL, NULL, 80347649, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, NULL, NULL, 13, NULL, NULL, NULL, ''),
(86, NULL, 'Ngoveni RM', NULL, NULL, NULL, NULL, 85894818, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, NULL, NULL, 14, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `factor`
--

CREATE TABLE `factor` (
  `id` int(11) NOT NULL,
  `employee` int(11) NOT NULL,
  `period` varchar(200) NOT NULL,
  `template_name` varchar(200) NOT NULL,
  `sub_total_a` int(11) NOT NULL,
  `of_assessment` int(11) NOT NULL,
  `c_score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `generic_management_competencies`
--

CREATE TABLE `generic_management_competencies` (
  `id` int(11) NOT NULL,
  `employee` int(11) NOT NULL,
  `period` varchar(10) NOT NULL,
  `core_management` varchar(1000) NOT NULL,
  `competencies` varchar(1000) DEFAULT NULL,
  `process_competencies` varchar(1000) NOT NULL,
  `dev_required` varchar(1000) DEFAULT NULL,
  `dev_required_cmcs` varchar(1000) DEFAULT NULL,
  `dev_required_pcs` varchar(1000) DEFAULT NULL,
  `template_name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `generic_management_competencies`
--

INSERT INTO `generic_management_competencies` (`id`, `employee`, `period`, `core_management`, `competencies`, `process_competencies`, `dev_required`, `dev_required_cmcs`, `dev_required_pcs`, `template_name`) VALUES
(1, 2, '2023/2024', 'qwtyu', NULL, '354', NULL, 'YES', 'NO', 0),
(2, 2, '2023/2024', 'qwtyu', NULL, '354', 'NO', NULL, NULL, 0),
(3, 2, '2023/2024', 'qwtyu', NULL, '3543333', 'YES', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `generic_management_competencies_personal_development_plan`
--

CREATE TABLE `generic_management_competencies_personal_development_plan` (
  `id` int(11) NOT NULL,
  `core_management_competencies` varchar(255) NOT NULL,
  `process_competencies` varchar(255) NOT NULL,
  `dev_required` varchar(10) NOT NULL,
  `employee` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `supervisor` int(11) NOT NULL,
  `period` varchar(100) NOT NULL,
  `template_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `generic_management_competencies_personal_development_plan`
--

INSERT INTO `generic_management_competencies_personal_development_plan` (`id`, `core_management_competencies`, `process_competencies`, `dev_required`, `employee`, `status`, `supervisor`, `period`, `template_name`) VALUES
(1, '1scv', '354', 'NO', 2, '', 0, '2023/2024', 'PERFORMANCE INSTRUMENT'),
(3, '1scv', '3543333', 'NO', 2, '', 0, '2023/2024', 'ANNUAL ASSESSMENT'),
(4, 'z', 'd', 'YES', 4, '', 0, '2023/2024', 'PERFORMANCE INSTRUMENT'),
(5, 'y', 'x', 'YES', 4, '', 0, '2023/2024', 'PERFORMANCE INSTRUMENT'),
(6, '1scv', '3543333', 'YES', 1, '', 0, '2023/2024', 'PERFORMANCE INSTRUMENT');

-- --------------------------------------------------------

--
-- Table structure for table `individual_performance`
--

CREATE TABLE `individual_performance` (
  `id` int(11) NOT NULL,
  `key_results_area` varchar(1000) NOT NULL,
  `batho_pele_principles` varchar(1000) NOT NULL,
  `weight_of_outcome` varchar(1000) NOT NULL,
  `employee` int(11) NOT NULL,
  `period` varchar(200) NOT NULL,
  `template_name` varchar(200) NOT NULL,
  `category` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `individual_performance`
--

INSERT INTO `individual_performance` (`id`, `key_results_area`, `batho_pele_principles`, `weight_of_outcome`, `employee`, `period`, `template_name`, `category`) VALUES
(2, 'w', 'w', '60', 2, '2023/2024', 'PERFORMANCE INSTRUMENT', NULL),
(3, 's', 'd', '10', 4, '2023/2024', 'PERFORMANCE INSTRUMENT', NULL),
(4, 's', 'd', '40', 4, '2023/2024', 'PERFORMANCE INSTRUMENT', NULL),
(6, 'w', 'w', '60', 1, '2023/2024', 'PERFORMANCE INSTRUMENT', NULL),
(8, 'HOUSING', 'SDI', '50', 10, '2023/2024', 'PERFORMANCE INSTRUMENT', NULL),
(9, 'HOUSING 2', 'SDI', '50', 10, '2023/2024', 'PERFORMANCE INSTRUMENT', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `initializations`
--

CREATE TABLE `initializations` (
  `id` int(11) NOT NULL,
  `initials` varchar(100) NOT NULL,
  `template_name` varchar(200) NOT NULL,
  `table_name` varchar(200) NOT NULL,
  `employee` int(11) NOT NULL,
  `period` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `initializations`
--

INSERT INTO `initializations` (`id`, `initials`, `template_name`, `table_name`, `employee`, `period`) VALUES
(1, 'tk', 'PERFORMANCE INSTRUMENT', 'PART 1', 2, '2023/2024'),
(2, 'tk', 'PERFORMANCE INSTRUMENT', 'PART 1', 2, '2023/2024'),
(3, 'tk', 'PERFORMANCE INSTRUMENT', 'PART 1', 2, '2023/2024'),
(4, 'tk', 'PERFORMANCE INSTRUMENT', 'PART 1', 2, '2023/2024'),
(5, 'tk', 'PERFORMANCE INSTRUMENT', 'PART 1', 2, '2023/2024'),
(6, 'TK', 'PERFORMANCE INSTRUMENT', 'PART 1', 1, '2023/2024'),
(7, 'TK', 'PERFORMANCE INSTRUMENT', 'PART 1', 10, '2023/2024');

-- --------------------------------------------------------

--
-- Table structure for table `key_government_focus_areas`
--

CREATE TABLE `key_government_focus_areas` (
  `id` int(11) NOT NULL,
  `period` varchar(100) NOT NULL,
  `employee` int(11) NOT NULL,
  `template_name` varchar(1000) NOT NULL,
  `key_focus_area_activities_outputs` varchar(1000) NOT NULL,
  `indicator_target` varchar(1000) NOT NULL,
  `progress_review_comment` varchar(1000) NOT NULL,
  `progress` varchar(1000) NOT NULL,
  `key_government_focus_areas_no` int(11) NOT NULL,
  `kgfa_id` int(11) NOT NULL,
  `baseline_data` varchar(1000) DEFAULT NULL,
  `resource_required` varchar(1000) DEFAULT NULL,
  `enabling_condition` varchar(1000) DEFAULT NULL,
  `target_date` varchar(20) NOT NULL,
  `actual_performance` varchar(200) DEFAULT NULL,
  `sms_rating` int(11) DEFAULT NULL,
  `supervisor_rating` int(11) DEFAULT NULL,
  `agreed_rating` int(11) DEFAULT NULL,
  `evaluated_score` varchar(200) DEFAULT NULL,
  `moderated_rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `key_government_focus_areas`
--

INSERT INTO `key_government_focus_areas` (`id`, `period`, `employee`, `template_name`, `key_focus_area_activities_outputs`, `indicator_target`, `progress_review_comment`, `progress`, `key_government_focus_areas_no`, `kgfa_id`, `baseline_data`, `resource_required`, `enabling_condition`, `target_date`, `actual_performance`, `sms_rating`, `supervisor_rating`, `agreed_rating`, `evaluated_score`, `moderated_rating`) VALUES
(1, '2023/2024', 2, 'PERFORMANCE INSTRUMENT', 'w', 'add_work_plan', '', '', 0, 1, 'd', 'add_work_plan', 'a', '2023-03-31', NULL, 3, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `key_responsibility`
--

CREATE TABLE `key_responsibility` (
  `id` int(11) NOT NULL,
  `employee` int(11) NOT NULL,
  `period` varchar(100) NOT NULL,
  `template_name` varchar(200) NOT NULL,
  `description` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `key_responsibility`
--

INSERT INTO `key_responsibility` (`id`, `employee`, `period`, `template_name`, `description`) VALUES
(5, 2, '2023/2024', 'PERFORMANCE INSTRUMENT', 'xxxxxxxx'),
(7, 2, '2023/2024', 'PERFORMANCE INSTRUMENT', 'xxxxxxxxxxxxxxxxxx'),
(8, 2, '2023/2024', 'PERFORMANCE INSTRUMENT', 'xxxxxxxxxxxxxxxxxxxxxx'),
(9, 2, '2023/2024', 'PERFORMANCE INSTRUMENT', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxx'),
(12, 2, '2023/2024', 'PERFORMANCE INSTRUMENT', 'x');

-- --------------------------------------------------------

--
-- Table structure for table `key_result_area`
--

CREATE TABLE `key_result_area` (
  `id` int(11) NOT NULL,
  `employee` int(11) NOT NULL,
  `activities` varchar(200) NOT NULL,
  `achievement` varchar(200) NOT NULL,
  `sms_rating` int(11) DEFAULT NULL,
  `supervisor_rating` int(11) DEFAULT NULL,
  `agree_rating` int(11) DEFAULT NULL,
  `moderated_rating` int(11) DEFAULT NULL,
  `kra_no` varchar(20) NOT NULL,
  `target` varchar(200) NOT NULL,
  `period` varchar(50) NOT NULL,
  `template_name` varchar(100) NOT NULL,
  `evaluated_score` int(11) DEFAULT NULL,
  `kra_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kgfa`
--

CREATE TABLE `kgfa` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `period` varchar(200) NOT NULL,
  `template_name` varchar(200) NOT NULL,
  `employee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kgfa`
--

INSERT INTO `kgfa` (`id`, `name`, `period`, `template_name`, `employee`) VALUES
(1, 'xxxxxxxxxx', '2023/2024', 'PERFORMANCE INSTRUMENT', 2);

-- --------------------------------------------------------

--
-- Table structure for table `kra`
--

CREATE TABLE `kra` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `period` varchar(200) NOT NULL,
  `template_name` varchar(200) NOT NULL,
  `employee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kra`
--

INSERT INTO `kra` (`id`, `name`, `period`, `template_name`, `employee`) VALUES
(1, 'qwsdf', '2023/2024', 'PERFORMANCE INSTRUMENT', 2),
(2, 'weeeeeeeeeeeeeee', '2023/2024', 'PERFORMANCE INSTRUMENT', 2),
(3, 'weeeeeeeeeeeeeee', '2023/2024', 'PERFORMANCE INSTRUMENT', 2),
(4, 's', '2023/2024', 'PERFORMANCE INSTRUMENT', 4),
(5, 's', '2023/2024', 'PERFORMANCE INSTRUMENT', 4),
(6, 'qqqqqqqqqqqqqqqqqqqqqqq', '2023/2024', 'PERFORMANCE INSTRUMENT', 1),
(7, 'qqqqqqqqqqqqqqqqqqqqqqq', '2023/2024', 'PERFORMANCE INSTRUMENT', 1),
(8, 'qwsdf', '2023/2024', 'PERFORMANCE INSTRUMENT', 10),
(9, 'Housing', '2023/2024', 'PERFORMANCE INSTRUMENT', 10),
(10, 'PLANNING', '2023/2024', 'PERFORMANCE INSTRUMENT', 10);

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `attachment` varchar(200) DEFAULT NULL,
  `comment` varchar(1000) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `employee` int(11) NOT NULL,
  `recommender` int(11) DEFAULT NULL,
  `approver` int(11) DEFAULT NULL,
  `leave_type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `start_date`, `end_date`, `attachment`, `comment`, `status`, `employee`, `recommender`, `approver`, `leave_type`) VALUES
(1, '2023-03-04', '2023-03-11', 'm,', 'kjj', 'APPROVED', 1, 1, 1, '0'),
(2, '2023-04-18', '2023-04-19', NULL, '11111111111', 'APPROVED', 1, 2, 2, '0'),
(3, '2023-04-18', '2023-04-27', 'Contract_of_Employment_Hlayisani2.pdf', '', 'APPROVED', 1, 2, 1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `leavestatuses`
--

CREATE TABLE `leavestatuses` (
  `StatusId` int(11) NOT NULL,
  `SttusName` longtext DEFAULT NULL,
  `Employee` int(20) NOT NULL,
  `SupervisorId` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `link_directorate`
--

CREATE TABLE `link_directorate` (
  `id` int(11) NOT NULL,
  `employee` int(11) NOT NULL,
  `directorate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `operational_memorandum`
--

CREATE TABLE `operational_memorandum` (
  `id` int(11) NOT NULL,
  `key_result_areas` varchar(255) NOT NULL,
  `gafs` varchar(255) NOT NULL,
  `outcome_weight` int(15) NOT NULL,
  `job_holder_rating` int(11) NOT NULL,
  `supervisor_rating` int(11) DEFAULT NULL,
  `decision_of_supervisor` varchar(255) NOT NULL,
  `par_score` int(11) NOT NULL,
  `performance_report` varchar(255) NOT NULL,
  `employee` int(11) NOT NULL,
  `template_name` varchar(100) NOT NULL,
  `period` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `organisational_performance`
--

CREATE TABLE `organisational_performance` (
  `id` int(11) NOT NULL,
  `targeted_objectives` varchar(1000) NOT NULL,
  `performance_measures_target` varchar(1000) NOT NULL,
  `progress` varchar(200) NOT NULL,
  `progress_review_comment` mediumtext NOT NULL,
  `period` varchar(20) NOT NULL,
  `employee` int(11) NOT NULL,
  `template_name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organisational_performance`
--

INSERT INTO `organisational_performance` (`id`, `targeted_objectives`, `performance_measures_target`, `progress`, `progress_review_comment`, `period`, `employee`, `template_name`) VALUES
(1, 'w', 'w', 'w', 'zzzzzzzzzzzzzz', '2023/2024', 2, 0),
(2, 'w', 'w', 'f', 'w', '2023/2024', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `performanceagreements`
--

CREATE TABLE `performanceagreements` (
  `Id` int(11) NOT NULL,
  `DepartmentName` longtext DEFAULT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `Supervisor` int(11) NOT NULL,
  `Manager` int(11) NOT NULL,
  `Employee` int(11) NOT NULL,
  `SalaryLevel` longtext DEFAULT NULL,
  `Components` longtext DEFAULT NULL,
  `Notch` longtext DEFAULT NULL,
  `Status` varchar(100) DEFAULT NULL,
  `Period` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `performanceplans`
--

CREATE TABLE `performanceplans` (
  `PerformancePlanId` int(11) NOT NULL,
  `Responsibility` longtext DEFAULT NULL,
  `GAFS` longtext DEFAULT NULL,
  `PerformanceOutcome` longtext DEFAULT NULL,
  `OutcomeWeight` longtext DEFAULT NULL,
  `PerformanceMeasurement` longtext DEFAULT NULL,
  `Timeframes` longtext DEFAULT NULL,
  `Resources` longtext DEFAULT NULL,
  `Employee` int(11) NOT NULL,
  `SupervisorId` int(20) NOT NULL,
  `Status` varchar(100) NOT NULL,
  `DateCaptured` date NOT NULL DEFAULT '0001-01-01',
  `Period` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `performance_assessment`
--

CREATE TABLE `performance_assessment` (
  `id` int(100) NOT NULL,
  `employee` int(100) NOT NULL,
  `supervisor` int(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `status_final` varchar(50) NOT NULL,
  `sup_comment` text DEFAULT NULL,
  `emp_comment` text DEFAULT NULL,
  `pmd_comment` text DEFAULT NULL,
  `date_captured` date NOT NULL,
  `period` varchar(50) NOT NULL,
  `template_name` varchar(50) NOT NULL,
  `agree` varchar(5) DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `comment_final` text DEFAULT NULL,
  `emp_agree` varchar(100) DEFAULT NULL,
  `sup_agree` varchar(100) DEFAULT NULL,
  `dispatch` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `performance_assessment`
--

INSERT INTO `performance_assessment` (`id`, `employee`, `supervisor`, `status`, `status_final`, `sup_comment`, `emp_comment`, `pmd_comment`, `date_captured`, `period`, `template_name`, `agree`, `reason`, `comment_final`, `emp_agree`, `sup_agree`, `dispatch`) VALUES
(15, 2, 2, 'APPROVED', 'PENDING', '', '', NULL, '2023-03-07', '2023/2024', 'PERFORMANCE INSTRUMENT', NULL, NULL, NULL, NULL, NULL, NULL),
(16, 2, 2, 'APPROVED', 'PENDING', NULL, '', NULL, '2023-03-08', '2023/2024', 'MID YEAR ASSESSMENT', NULL, NULL, NULL, NULL, NULL, NULL),
(17, 2, 2, 'APPROVED', 'PENDING', '', '', NULL, '2023-03-08', '2023/2024', 'ANNUAL ASSESSMENT', NULL, NULL, NULL, NULL, NULL, NULL),
(18, 1, 2, 'PENDING', 'PENDING', '', '', NULL, '2023-04-04', '2023/2024', 'PERFORMANCE INSTRUMENT', NULL, NULL, NULL, NULL, NULL, NULL),
(19, 10, 1, 'REJECTED', 'PENDING', '', '', NULL, '2023-04-20', '2023/2024', 'PERFORMANCE INSTRUMENT', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `performance_plan`
--

CREATE TABLE `performance_plan` (
  `id` int(11) NOT NULL,
  `employee` int(11) NOT NULL,
  `period` varchar(100) NOT NULL,
  `template_name` varchar(200) NOT NULL,
  `key_responsibility` varchar(2000) NOT NULL,
  `gafs` varchar(2000) NOT NULL,
  `performance_outcome` varchar(2000) NOT NULL,
  `outcome_weight` int(11) NOT NULL,
  `performance_measurement` varchar(2000) NOT NULL,
  `time_frames` varchar(1000) NOT NULL,
  `resources` varchar(2000) NOT NULL,
  `job_holder_rating` int(11) DEFAULT NULL,
  `supervisor_rating` int(11) DEFAULT NULL,
  `decision_of_supervisor` varchar(1000) DEFAULT NULL,
  `par_score` int(11) DEFAULT NULL,
  `performance_report` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `performance_plan`
--

INSERT INTO `performance_plan` (`id`, `employee`, `period`, `template_name`, `key_responsibility`, `gafs`, `performance_outcome`, `outcome_weight`, `performance_measurement`, `time_frames`, `resources`, `job_holder_rating`, `supervisor_rating`, `decision_of_supervisor`, `par_score`, `performance_report`) VALUES
(1, 2, '2023/2024', 'PERFORMANCE INSTRUMENT', 'PHP', 'SITA', 'react', 10, 'yghj', '2023-03-31', 'PC', 3, 3, 'jhvioaugbr', 3, ' 3333'),
(2, 2, '2023/2024', 'PERFORMANCE INSTRUMENT', 'wdf', 'fdcd', 'vf', 90, 'yghj', '2023-03-11', 'ERP', 3, 2, '5', 2, '  3333333333333'),
(3, 2, '2023/2024', 'PERFORMANCE INSTRUMENT', 'Information Technology', 'zzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz dzxfycgvuhbijonipk ycvubihnjomk vubinoim', 'dtfcvgbhnkjmlkvubnijm', 10, 'tryfguhijoigf hbnv hg', '2023-03-10', 'ITS', 1, 3, '3', NULL, ' cc'),
(4, 2, '2023/2024', 'PERFORMANCE INSTRUMENT', 'fycgvuhbijno cguvhrbijovnkmt uyhyhibuonrip,obs buhiunoitmh hibnjg', 'guhbnkjml;', 'guhbinjlkm', 10, ' jhknjlkm,l', '2023-03-05', 'tf7yg8hu9joi', 1, 1, '3', NULL, ' gfjvhv ');

-- --------------------------------------------------------

--
-- Table structure for table `personaldevelopmentplans`
--

CREATE TABLE `personaldevelopmentplans` (
  `PersonalDevelopmentPlanId` int(11) NOT NULL,
  `DevelopmentRequired` longtext DEFAULT NULL,
  `TrainingType` longtext DEFAULT NULL,
  `reason` longtext DEFAULT NULL,
  `ImprovePerformance` longtext DEFAULT NULL,
  `JobHolderCompetency` longtext DEFAULT NULL,
  `CareerDev` longtext DEFAULT NULL,
  `Timeframe` longtext DEFAULT NULL,
  `Progress` longtext DEFAULT NULL,
  `Employee` int(10) NOT NULL,
  `SupervisorId` int(20) NOT NULL,
  `Status` varchar(100) NOT NULL,
  `Period` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `personal_developmental_plan`
--

CREATE TABLE `personal_developmental_plan` (
  `id` int(11) NOT NULL,
  `developmental_areas` varchar(1000) NOT NULL,
  `types_of_interventions` varchar(1000) NOT NULL,
  `target_date` date NOT NULL,
  `template_name` varchar(1000) NOT NULL,
  `employee` int(11) NOT NULL,
  `period` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personal_developmental_plan`
--

INSERT INTO `personal_developmental_plan` (`id`, `developmental_areas`, `types_of_interventions`, `target_date`, `template_name`, `employee`, `period`) VALUES
(1, 'x', 'd', '2023-03-04', 'PERFORMANCE INSTRUMENT', 2, '2023/2024'),
(2, 'r', 'w', '2023-03-10', 'PERFORMANCE INSTRUMENT', 2, '2023/2024'),
(3, 'x', 'd', '2023-03-16', 'PERFORMANCE INSTRUMENT', 2, '2023/2024'),
(9, 'x', 'r', '2023-04-05', 'PERFORMANCE INSTRUMENT', 1, '2023/2024'),
(10, 'x', 'CC', '2023-04-19', 'PERFORMANCE INSTRUMENT', 10, '2023/2024');

-- --------------------------------------------------------

--
-- Table structure for table `personal_developmental_training`
--

CREATE TABLE `personal_developmental_training` (
  `id` int(11) NOT NULL,
  `employee` int(11) NOT NULL,
  `period` varchar(200) NOT NULL,
  `template_name` varchar(200) NOT NULL,
  `development_required` varchar(200) NOT NULL,
  `training_type` varchar(200) NOT NULL,
  `time_frame` varchar(200) NOT NULL,
  `progress` varchar(200) NOT NULL,
  `reason` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personal_developmental_training`
--

INSERT INTO `personal_developmental_training` (`id`, `employee`, `period`, `template_name`, `development_required`, `training_type`, `time_frame`, `progress`, `reason`) VALUES
(1, 2, '2023/2024', 'PERFORMANCE INSTRUMENT', 'g', 'q', '2023-03-07', 'f', 'IMPROVE PERFORMANCE');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `PositionId` int(11) NOT NULL,
  `PositionName` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`PositionId`, `PositionName`) VALUES
(1, 'ADMIN OFFICERS2'),
(2, 'ADMIN'),
(5, 'SENIOR PROJECT MANAGER'),
(6, 'PROJECT MANAGER '),
(8, 'hvgh');

-- --------------------------------------------------------

--
-- Table structure for table `post_summary`
--

CREATE TABLE `post_summary` (
  `id` int(100) NOT NULL,
  `period` int(11) NOT NULL,
  `employee` int(11) NOT NULL,
  `key_responsibility_a` varchar(1000) NOT NULL,
  `key_responsibility_b` varchar(1000) NOT NULL,
  `key_responsibility_c` varchar(1000) NOT NULL,
  `expected_duties` varchar(1000) NOT NULL,
  `reason_for_duties_a` varchar(1000) NOT NULL,
  `reason_for_duties_b` varchar(1000) NOT NULL,
  `reason_for_duties_c` varchar(1000) NOT NULL,
  `reason_for_duties_d` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pt_submission`
--

CREATE TABLE `pt_submission` (
  `id` int(100) NOT NULL,
  `employee` int(11) NOT NULL,
  `supervisor` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `comment` mediumtext DEFAULT NULL,
  `period` varchar(20) NOT NULL,
  `date_captured` date NOT NULL,
  `Status_Final` varchar(10) DEFAULT NULL,
  `Comment_Final` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pt_submission`
--

INSERT INTO `pt_submission` (`id`, `employee`, `supervisor`, `status`, `comment`, `period`, `date_captured`, `Status_Final`, `Comment_Final`) VALUES
(9, 2, 2, 'APPROVED', '', '2023-2024', '2023-01-27', 'PENDING', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `RoleId` int(11) NOT NULL,
  `RoleName` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`RoleId`, `RoleName`) VALUES
(1, 'User'),
(2, 'System Administrator'),
(3, 'PERMIS OFFICIAL');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` int(11) NOT NULL,
  `semester_name` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `financial_year` varchar(20) NOT NULL,
  `grace_period` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `semester_name`, `start_date`, `end_date`, `financial_year`, `grace_period`) VALUES
(14, 'SEMESTER ONE', '2023-03-12', '2023-04-28', '2023/2024 ', '2023-04-14'),
(15, 'SEMESTER TWO', '2023-10-01', '2023-10-15', '2023/2024 ', '2023-10-30');

-- --------------------------------------------------------

--
-- Table structure for table `semestertypes`
--

CREATE TABLE `semestertypes` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semestertypes`
--

INSERT INTO `semestertypes` (`id`, `name`) VALUES
(1, 'SEMESTER ONE'),
(2, 'SEMESTER TWO');

-- --------------------------------------------------------

--
-- Table structure for table `sub_directorate`
--

CREATE TABLE `sub_directorate` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `directorate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_directorate`
--

INSERT INTO `sub_directorate` (`id`, `name`, `directorate`) VALUES
(1, 'kjlknvda', 1),
(2, 'the new one', 3),
(3, 'xxx', 1),
(4, 'yyy', 2),
(5, 'zzz', 3),
(6, 'IT SUPPORT', 4);

-- --------------------------------------------------------

--
-- Table structure for table `template_types`
--

CREATE TABLE `template_types` (
  `id` int(11) NOT NULL,
  `template_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `template_types`
--

INSERT INTO `template_types` (`id`, `template_name`) VALUES
(1, 'ANNUAL PERFORMANCE ASSESSMENT'),
(2, 'MID YEAR ASSESSMENT'),
(3, 'PERFORMANCE INSTRUMENTS');

-- --------------------------------------------------------

--
-- Table structure for table `typeoftraining`
--

CREATE TABLE `typeoftraining` (
  `TrainingTypeId` int(11) NOT NULL,
  `TrainingName` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `workplan`
--

CREATE TABLE `workplan` (
  `WorkplanId` int(11) NOT NULL,
  `keyResultArea` varchar(255) NOT NULL,
  `KeyActivities` varchar(255) NOT NULL,
  `Weight` varchar(50) NOT NULL,
  `TargetDate` date NOT NULL,
  `Indicator` varchar(255) NOT NULL,
  `ResourceReq` varchar(255) NOT NULL,
  `EnablingCondition` varchar(255) NOT NULL,
  `TotalKra` int(255) NOT NULL,
  `Employee` int(11) NOT NULL,
  `SupervisorId` int(11) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Period` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `work_plan`
--

CREATE TABLE `work_plan` (
  `id` int(11) NOT NULL,
  `employee` int(11) NOT NULL,
  `key_result_areas` varchar(1000) DEFAULT NULL,
  `key_activities` varchar(1000) NOT NULL,
  `weight` int(11) NOT NULL,
  `target_date` date NOT NULL,
  `indicator_target` varchar(1000) NOT NULL,
  `resource_required` varchar(1000) NOT NULL,
  `enabling_condition` varchar(1000) NOT NULL,
  `template_name` varchar(200) NOT NULL,
  `period` varchar(20) NOT NULL,
  `kra_id` int(11) NOT NULL,
  `sms_rating` int(11) DEFAULT NULL,
  `supervisor_rating` int(11) DEFAULT NULL,
  `agreed_rating` int(11) DEFAULT NULL,
  `actual_achievement` varchar(500) DEFAULT NULL,
  `target` varchar(100) NOT NULL,
  `evaluated_score` int(11) DEFAULT NULL,
  `moderated_rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `work_plan`
--

INSERT INTO `work_plan` (`id`, `employee`, `key_result_areas`, `key_activities`, `weight`, `target_date`, `indicator_target`, `resource_required`, `enabling_condition`, `template_name`, `period`, `kra_id`, `sms_rating`, `supervisor_rating`, `agreed_rating`, `actual_achievement`, `target`, `evaluated_score`, `moderated_rating`) VALUES
(2, 2, NULL, 'add_work_plan', 30, '2023-03-08', 'add_work_plan', 'add_work_plan', 'add_work_plan', 'PERFORMANCE INSTRUMENT', '2023/2024', 1, 0, 4, 4, 'x', '', 3, 4),
(3, 2, NULL, 'add_work_plan', 10, '2023-03-09', 'add_work_plan', 'add_work_plan', 'add_work_plan', 'PERFORMANCE INSTRUMENT', '2023/2024', 2, 4, 3, 3, 'x', '', NULL, 4),
(4, 2, NULL, 'add_work_plan', 10, '2023-03-15', 'add_work_plan', 'add_work_plan', 'add_work_plan', 'PERFORMANCE INSTRUMENT', '2023/2024', 2, 3, NULL, NULL, 'cc', '', NULL, 1),
(5, 2, NULL, 'x', 30, '2023-03-16', 'add_work_plan', 'gfhj', 'add_work_plan', 'PERFORMANCE INSTRUMENT', '2023/2024', 3, NULL, NULL, NULL, NULL, '', NULL, NULL),
(6, 4, NULL, 'x', 10, '2023-04-04', 'dd', 'dd', 'dddd', 'PERFORMANCE INSTRUMENT', '2023/2024', 5, NULL, NULL, NULL, NULL, '', NULL, NULL),
(17, 1, NULL, 'zz', 60, '2023-04-18', 'x', 'x', 'z', 'PERFORMANCE INSTRUMENT', '2023/2024', 7, NULL, NULL, NULL, NULL, '', NULL, NULL),
(20, 1, NULL, 'add_work_plan', 10, '2023-04-07', 'xx', 'xx', 'xx', 'PERFORMANCE INSTRUMENT', '2023/2024', 6, 0, NULL, NULL, 'X', '', NULL, NULL),
(21, 1, NULL, 'xxx', 100, '2023-04-29', 'd', 'gfhj', 'add_work_plan', 'PERFORMANCE INSTRUMENT', '2023/2024', 7, NULL, NULL, NULL, NULL, '', NULL, NULL),
(22, 1, NULL, 'add_work_plan', 10, '2023-04-05', 'add_work_plan', 'add_work_plan', 'add_work_plan', 'PERFORMANCE INSTRUMENT', '2023/2024', 6, 2, NULL, NULL, 'X', '', NULL, NULL),
(23, 1, NULL, 'x', 10, '2023-04-05', 'z', 'f', 'g', 'PERFORMANCE INSTRUMENT', '2023/2024', 7, NULL, NULL, NULL, NULL, '', NULL, NULL),
(25, 10, NULL, 'z', 50, '2023-04-21', 'WORK PLAN', 'PC', 'CONDITION', 'PERFORMANCE INSTRUMENT', '2023/2024', 8, NULL, NULL, NULL, NULL, '', NULL, NULL),
(26, 10, NULL, 'BKHBK BJ BJ BKJB JB B BJ B HBH H', 10, '2023-04-27', 'CC', 'CC', 'CC', 'PERFORMANCE INSTRUMENT', '2023/2024', 8, NULL, NULL, NULL, NULL, '', NULL, NULL),
(27, 10, NULL, 'x', 10, '2023-04-21', 'd', 'e', 'e', 'PERFORMANCE INSTRUMENT', '2023/2024', 9, NULL, NULL, NULL, NULL, '', NULL, NULL),
(29, 10, NULL, 'z', 50, '2023-04-20', 'w', 'a', 'd', 'PERFORMANCE INSTRUMENT', '2023/2024', 10, NULL, NULL, NULL, NULL, '', NULL, NULL),
(30, 10, NULL, 'x', 10, '2023-04-20', 'a', 'x', 'x', 'PERFORMANCE INSTRUMENT', '2023/2024', 10, NULL, NULL, NULL, NULL, '', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_logs`
--
ALTER TABLE `app_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `auditorgeneralfocusarea`
--
ALTER TABLE `auditorgeneralfocusarea`
  ADD PRIMARY KEY (`AudGenPlanId`);

--
-- Indexes for table `auditor_general_opinion_and_findings`
--
ALTER TABLE `auditor_general_opinion_and_findings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_unit`
--
ALTER TABLE `business_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `competencies_personal_development_plan`
--
ALTER TABLE `competencies_personal_development_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `contracttypes`
--
ALTER TABLE `contracttypes`
  ADD PRIMARY KEY (`TypeId`);

--
-- Indexes for table `directorate`
--
ALTER TABLE `directorate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`DistrictId`);

--
-- Indexes for table `duties`
--
ALTER TABLE `duties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `duty_reason`
--
ALTER TABLE `duty_reason`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `factor`
--
ALTER TABLE `factor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generic_management_competencies`
--
ALTER TABLE `generic_management_competencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generic_management_competencies_personal_development_plan`
--
ALTER TABLE `generic_management_competencies_personal_development_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `individual_performance`
--
ALTER TABLE `individual_performance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `initializations`
--
ALTER TABLE `initializations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `key_government_focus_areas`
--
ALTER TABLE `key_government_focus_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `key_responsibility`
--
ALTER TABLE `key_responsibility`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `key_result_area`
--
ALTER TABLE `key_result_area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kgfa`
--
ALTER TABLE `kgfa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kra`
--
ALTER TABLE `kra`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leavestatuses`
--
ALTER TABLE `leavestatuses`
  ADD PRIMARY KEY (`StatusId`);

--
-- Indexes for table `link_directorate`
--
ALTER TABLE `link_directorate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operational_memorandum`
--
ALTER TABLE `operational_memorandum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organisational_performance`
--
ALTER TABLE `organisational_performance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `performanceagreements`
--
ALTER TABLE `performanceagreements`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `performanceplans`
--
ALTER TABLE `performanceplans`
  ADD PRIMARY KEY (`PerformancePlanId`);

--
-- Indexes for table `performance_assessment`
--
ALTER TABLE `performance_assessment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `performance_plan`
--
ALTER TABLE `performance_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personaldevelopmentplans`
--
ALTER TABLE `personaldevelopmentplans`
  ADD PRIMARY KEY (`PersonalDevelopmentPlanId`);

--
-- Indexes for table `personal_developmental_plan`
--
ALTER TABLE `personal_developmental_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_developmental_training`
--
ALTER TABLE `personal_developmental_training`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`PositionId`);

--
-- Indexes for table `post_summary`
--
ALTER TABLE `post_summary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pt_submission`
--
ALTER TABLE `pt_submission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`RoleId`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semestertypes`
--
ALTER TABLE `semestertypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_directorate`
--
ALTER TABLE `sub_directorate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `template_types`
--
ALTER TABLE `template_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `typeoftraining`
--
ALTER TABLE `typeoftraining`
  ADD PRIMARY KEY (`TrainingTypeId`);

--
-- Indexes for table `workplan`
--
ALTER TABLE `workplan`
  ADD PRIMARY KEY (`WorkplanId`);

--
-- Indexes for table `work_plan`
--
ALTER TABLE `work_plan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_logs`
--
ALTER TABLE `app_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auditorgeneralfocusarea`
--
ALTER TABLE `auditorgeneralfocusarea`
  MODIFY `AudGenPlanId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auditor_general_opinion_and_findings`
--
ALTER TABLE `auditor_general_opinion_and_findings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `business_unit`
--
ALTER TABLE `business_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `competencies_personal_development_plan`
--
ALTER TABLE `competencies_personal_development_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contracttypes`
--
ALTER TABLE `contracttypes`
  MODIFY `TypeId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `directorate`
--
ALTER TABLE `directorate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `DistrictId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `duties`
--
ALTER TABLE `duties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `duty_reason`
--
ALTER TABLE `duty_reason`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `factor`
--
ALTER TABLE `factor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `generic_management_competencies`
--
ALTER TABLE `generic_management_competencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `generic_management_competencies_personal_development_plan`
--
ALTER TABLE `generic_management_competencies_personal_development_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `individual_performance`
--
ALTER TABLE `individual_performance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `initializations`
--
ALTER TABLE `initializations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `key_government_focus_areas`
--
ALTER TABLE `key_government_focus_areas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `key_responsibility`
--
ALTER TABLE `key_responsibility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `key_result_area`
--
ALTER TABLE `key_result_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kgfa`
--
ALTER TABLE `kgfa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kra`
--
ALTER TABLE `kra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `leavestatuses`
--
ALTER TABLE `leavestatuses`
  MODIFY `StatusId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `link_directorate`
--
ALTER TABLE `link_directorate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `operational_memorandum`
--
ALTER TABLE `operational_memorandum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `organisational_performance`
--
ALTER TABLE `organisational_performance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `performanceagreements`
--
ALTER TABLE `performanceagreements`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `performanceplans`
--
ALTER TABLE `performanceplans`
  MODIFY `PerformancePlanId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `performance_assessment`
--
ALTER TABLE `performance_assessment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `performance_plan`
--
ALTER TABLE `performance_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personaldevelopmentplans`
--
ALTER TABLE `personaldevelopmentplans`
  MODIFY `PersonalDevelopmentPlanId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_developmental_plan`
--
ALTER TABLE `personal_developmental_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_developmental_training`
--
ALTER TABLE `personal_developmental_training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `PositionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `post_summary`
--
ALTER TABLE `post_summary`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pt_submission`
--
ALTER TABLE `pt_submission`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `RoleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `semestertypes`
--
ALTER TABLE `semestertypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_directorate`
--
ALTER TABLE `sub_directorate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `template_types`
--
ALTER TABLE `template_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `typeoftraining`
--
ALTER TABLE `typeoftraining`
  MODIFY `TrainingTypeId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `workplan`
--
ALTER TABLE `workplan`
  MODIFY `WorkplanId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `work_plan`
--
ALTER TABLE `work_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
