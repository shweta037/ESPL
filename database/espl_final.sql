-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2018 at 12:36 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `espl`
--

-- --------------------------------------------------------

--
-- Table structure for table `authassignment`
--

CREATE TABLE `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `authitem`
--

CREATE TABLE `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authitem`
--

INSERT INTO `authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('Admin', 1, 'Super admin', '', ''),
('author', 2, '', NULL, 'N;'),
('createPost', 0, 'create a post', NULL, 'N;'),
('deletePost', 0, 'delete a post', NULL, 'N;'),
('reader', 2, '', NULL, 'N;'),
('readPost', 0, 'read a post', NULL, 'N;'),
('updateOwnPost', 1, 'update a post by author himself', 'return Yii::app()->user->id==$params[\"post\"]->authID;', 'N;'),
('updatePost', 0, 'update a post', NULL, 'N;'),
('Users', 2, 'Users', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `authitemchild`
--

CREATE TABLE `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authitemchild`
--

INSERT INTO `authitemchild` (`parent`, `child`) VALUES
('author', 'reader'),
('reader', 'readPost'),
('updateOwnPost', 'updatePost');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name` varchar(128) DEFAULT '',
  `is_deleted` tinyint(4) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`, `is_deleted`, `created_date`, `modified_date`) VALUES
(1, 'Andorra', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(2, 'Afghanistan', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(3, 'Albania', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(4, 'Algeria', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(5, 'American Samoa', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(6, 'Angola', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(7, 'Anguilla', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(8, 'Antartica', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(9, 'Antigua and Barbuda', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(10, 'Argentina', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(11, 'Armenia', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(12, 'Aruba', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(13, 'Australia', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(14, 'Austria', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(15, 'Azerbaijan', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(16, 'Bahamas', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(17, 'Bahrain', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(18, 'Bangladesh', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(19, 'Barbados', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(20, 'Belarus', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(21, 'Belgium', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(22, 'Belize', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(23, 'BENIN', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(24, 'Benin', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(25, 'Bermuda', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(26, 'Bhutan', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(27, 'Bolivia', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(28, 'Bosnia and Herzegovina', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(29, 'Botswana', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(30, 'Bouvet Island', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(31, 'Brazil', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(32, 'Brunei Darussalam', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(33, 'Bulgaria', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(34, 'Burkina Faso', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(35, 'Burundi', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(36, 'Cambodia', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(37, 'Cameroon', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(38, 'Canada', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(39, 'Canton and Enderbury Islands', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(40, 'Cape Verde', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(41, 'Cayman Islands', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(42, 'Central African Republic', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(43, 'Chad', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(44, 'Chile', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(45, 'China', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(46, 'Christmas Island', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(47, 'Cocos(Keeling) Islands', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(48, 'Colombia', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(49, 'Comoros', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(50, 'Congo', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(51, 'Cook Islands', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(52, 'Costa Rica', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(53, 'C?te d`Ivoire', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(54, 'Croatia', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(55, 'Cuba', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(56, 'Cyprus', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(57, 'Czech Republic', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(58, 'Democratic People\'s Republic of', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(59, 'Democratic Republic of the Cong', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(60, 'Denmark', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(61, 'Djibouti', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(62, 'Dominica ', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(63, 'Dominican Republic', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(64, 'Ecuador', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(65, 'Egypt', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(66, 'El Salvador', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(67, 'Equatorial Guinea', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(68, 'Eritrea', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(69, 'Estonia', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(70, 'Ethiopia', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(71, 'Falkland Islands(Malvinas)', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(72, 'Faroe Islands', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(73, 'Federal States of Micronesia', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(74, 'FIJI', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(75, 'Finland', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(76, 'France', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(77, 'French Guiana', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(78, 'French Polynesia', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(79, 'Gabon', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(80, 'Gambia', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(81, 'Georgia', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(82, 'Germany', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(83, 'Ghana', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(84, 'Greece', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(85, 'Greenland', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(86, 'Grenada', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(87, 'Guadeloupe', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(88, 'Guam', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(89, 'Guatemala', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(90, 'Guinea', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(91, 'Guinea-Bissau', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(92, 'Guyana', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(93, 'Haiti', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(94, 'Heard and McDonald Islands', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(95, 'Holy See', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(96, 'Honduras', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(97, 'Hong Kong', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(98, 'Hungary', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(99, 'Iceland', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(100, 'India', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(101, 'Indonesia', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(102, 'Iran (Islamic Republic of)', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(103, 'Iraq', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(104, 'Ireland', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(105, 'Israel', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(106, 'Italy', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(107, 'Jamaica', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(108, 'Japan', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(109, 'Johnston Island', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(110, 'Jordan', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(111, 'Kazakhstan', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(112, 'Kenya', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(113, 'Kiribati', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(114, 'Kuwait', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(115, 'Kyrgyzstan', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(116, 'Lao People\'s Democratic Republi', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(117, 'Latvia', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(118, 'Lebanon', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(119, 'Lesotho', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(120, 'Liberia', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(121, 'Libya', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(122, 'Liechtenstein', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(123, 'Lithuania', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(124, 'Luxembourg', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(125, 'Macau', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(126, 'Madagascar', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(127, 'Malawi', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(128, 'Malaysia', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(129, 'Maldives', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(130, 'Mali', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(131, 'Malta', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(132, 'Marshall Islands', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(133, 'Martinique', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(134, 'Mauritania', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(135, 'Mauritius', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(136, 'Mayotte', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(137, 'Mexico', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(138, 'Midway islands', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(139, 'Monaco', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(140, 'Mongolia', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(141, 'Montenegro', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(142, 'Montserrat', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(143, 'Morocco', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(144, 'Mozambique', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(145, 'Myanmar', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(146, 'Namibia', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(147, 'Nauru', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(148, 'Nepal', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(149, 'Netherlands', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(150, 'Netherlands Antilles', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(151, 'New Caledonia', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(152, 'New Zealand', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(153, 'Nicaragua', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(154, 'Niger', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(155, 'Nigeria', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(156, 'Niue', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(157, 'Norfolk Island', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(158, 'Northern Mariana Islands', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(159, 'Norway', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(160, 'Oman', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(161, 'Pakistan', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(162, 'Palau', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(163, 'Panama', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(164, 'Papua New Guinea', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(165, 'Paraguay', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(166, 'Peru', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(167, 'Philippines', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(168, 'Pitcairn', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(169, 'Poland', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(170, 'Portugal', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(171, 'Puerto Rico', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(172, 'Qatar', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(173, 'Republic of Korea', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(174, 'Republic of Moldova', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(175, 'Republic of South Sudan', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(176, 'Reunion', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(177, 'Romania', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(178, 'Russian Federation', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(179, 'Rwanda', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(180, 'Saint Helena', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(181, 'Saint Kitts and Nevis', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(182, 'Saint Lucia', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(183, 'Saint Vincent and the Grenadine', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(184, 'Samoa', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(185, 'San Marino', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(186, 'Sao Tome and Principe', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(187, 'Saudi Arabia', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(188, 'Senegal', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(189, 'Serbia', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(190, 'Serbia and Montenegro', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(191, 'Seychelles', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(192, 'Sierra Leone', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(193, 'Singapore', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(194, 'Slovakia', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(195, 'Slovenia', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(196, 'Solomon Islands', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(197, 'Somalia', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(198, 'South Africa', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(199, 'South Georgia and the South San', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(200, 'Spain', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(201, 'Sri Lanka', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(202, 'St. Pierre and Miquelon', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(203, 'Sudan', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(204, 'Suriname', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(205, 'Svalbard and Jan Mayen Islands', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(206, 'Swaziland', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(207, 'Sweden', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(208, 'Switzerland', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(209, 'Syrian Arab Republic', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(210, 'Tajikistan', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(211, 'Thailand', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(212, 'The former Yugoslav Republic of', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(213, 'Timor-Leste', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(214, 'Togo', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(215, 'Tokelau', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(216, 'Tonga', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(217, 'Trinidad and Tobago', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(218, 'Tunisia', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(219, 'Turkey', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(220, 'Turkmenistan', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(221, 'Turks and Caicos Islands', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(222, 'Tuvalu', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(223, 'Uganda', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(224, 'Ukraine', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(225, 'United Arab Emirates', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(226, 'United Kingdom of Great Britain', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(227, 'United Republic of Tanzania', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(228, 'United States Minor Outlying Is', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(229, 'United States of America', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(230, 'Uruguay', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(231, 'Uzbekistan', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(232, 'Vanuatu', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(233, 'Venezuela', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(234, 'Viet Nam', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(235, 'Virgin Islands (British)', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(236, 'Virgin Islands (U.S.)', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(237, 'Wake Island', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(238, 'Wallis and Futuna Islands', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(239, 'Yemen', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(240, 'Zambia', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40'),
(241, 'Zimbabwe', 0, '0000-00-00 00:00:00', '2018-10-22 05:17:40');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `currency_name` varchar(256) NOT NULL,
  `currency_code` varchar(64) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `currency_name`, `currency_code`, `is_deleted`, `created_date`, `modified_date`) VALUES
(1, 'Rupees', 'Inr', 0, '2018-10-03 08:41:42', '2018-10-03 06:41:42');

-- --------------------------------------------------------

--
-- Table structure for table `espl_client`
--

CREATE TABLE `espl_client` (
  `id` int(11) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_email` varchar(255) NOT NULL,
  `client_address` varchar(255) NOT NULL,
  `client_phone_number` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `espl_client`
--

INSERT INTO `espl_client` (`id`, `client_name`, `client_email`, `client_address`, `client_phone_number`, `created_date`, `modified_date`) VALUES
(1, 'Client 1', 'client@gmail.com', 'Gurgaon', '9876545566', '0000-00-00 00:00:00', '2018-10-10 12:18:46');

-- --------------------------------------------------------

--
-- Table structure for table `espl_employee_details`
--

CREATE TABLE `espl_employee_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_role` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `whatsapp_number` varchar(255) NOT NULL,
  `health_benifits` text,
  `active_status` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(255) DEFAULT NULL,
  `comobo_off` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `espl_employee_details`
--

INSERT INTO `espl_employee_details` (`id`, `user_id`, `user_role`, `name`, `address`, `father_name`, `title`, `profile_image`, `date_of_birth`, `mobile_number`, `whatsapp_number`, `health_benifits`, `active_status`, `created_date`, `modified_date`, `created_by`, `comobo_off`) VALUES
(1, 1, 1, 'sdfsf', '', '', '', '', '0000-00-00', '', '', NULL, '0', '0000-00-00 00:00:00', '2018-10-05 11:44:12', NULL, ''),
(2, 3, 1, 'wgfh', '', '', '', '', '0000-00-00', '', '', NULL, '0', '0000-00-00 00:00:00', '2018-10-05 11:44:12', NULL, ''),
(3, 5, 1, 'asd', '', '', '', '', '0000-00-00', '', '', NULL, '0', '0000-00-00 00:00:00', '2018-10-05 11:44:12', NULL, ''),
(4, 6, 1, 'asdffd', '', '', '', '', '0000-00-00', '', '', NULL, '0', '0000-00-00 00:00:00', '2018-10-05 11:44:12', NULL, ''),
(100, 105, 1, 'test', '', '', '', '/opt/lampp/htdocs/Dropbox/espl/protected/upload/', '0000-00-00', '', '', NULL, '0', '2018-10-09 07:56:30', '2018-10-09 12:00:17', NULL, ''),
(101, 107, 1, 'shweta', 'test address', 'test', 'test', '/opt/lampp/htdocs/Dropbox/espl/protected/upload/6574254681640689489.jpg', '2018-10-26', '444444444443', '344444444444', NULL, '0', '2018-10-10 07:26:51', '2018-10-10 05:26:51', NULL, ''),
(102, 27, 0, 'xxxxxxx', 'xxxxxxxxxxxxx', 'xxxxxxxx', 'xxxxxxxx', '1540036374Screenshot from 2018-10-15 14-27-01.png', '0000-00-00', 'xxxxxxxxxxx', '', NULL, '0', '2018-10-20 13:52:54', '2018-10-20 11:52:54', NULL, ''),
(103, 28, 0, 'xxxxxxx', 'xxxxxxxxxxxxx', 'xxxxxxxx', 'xxxxxxxx', '1540036387Screenshot from 2018-10-15 14-27-01.png', '0000-00-00', 'xxxxxxxxxxx', '', NULL, '0', '2018-10-20 13:53:07', '2018-10-20 11:53:07', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `espl_leaves`
--

CREATE TABLE `espl_leaves` (
  `id` int(11) NOT NULL,
  `leave_name` varchar(255) NOT NULL,
  `total_leaves` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `espl_leaves`
--

INSERT INTO `espl_leaves` (`id`, `leave_name`, `total_leaves`, `created_date`, `modified_date`) VALUES
(1, 'CL', '20', '2018-10-11 11:57:04', '2018-10-16 05:16:28'),
(2, 'SL', '10', '2018-10-11 08:39:50', '2018-10-11 06:39:50'),
(3, 'EL', '5', '2018-10-11 08:40:06', '2018-10-11 06:40:06'),
(4, 'ML', '5', '2018-10-11 08:40:17', '2018-10-11 06:40:17'),
(5, 'PL', '2', '2018-10-11 08:41:05', '2018-10-11 06:41:05'),
(6, 'Combo Leave', '30', '2018-10-15 08:50:44', '2018-10-15 06:50:44');

-- --------------------------------------------------------

--
-- Table structure for table `espl_leave_management`
--

CREATE TABLE `espl_leave_management` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `leave_type` int(2) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `to_date` date NOT NULL,
  `from_date` date NOT NULL,
  `message` varchar(255) NOT NULL,
  `leave_request_days` int(11) NOT NULL,
  `approved_by` varchar(255) NOT NULL,
  `leave_status` bigint(11) NOT NULL DEFAULT '16',
  `approved_from` date NOT NULL,
  `approved_to` date NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `espl_leave_management`
--

INSERT INTO `espl_leave_management` (`id`, `user_id`, `leave_type`, `subject`, `to_date`, `from_date`, `message`, `leave_request_days`, `approved_by`, `leave_status`, `approved_from`, `approved_to`, `created_date`, `modified_date`) VALUES
(1, 1, 1, 'ffffffffffffffff', '2018-10-09', '2018-10-01', 'ffffffffffff', 8, '0', 16, '0000-00-00', '0000-00-00', '2018-10-16 07:48:32', '2018-10-16 05:48:32'),
(2, 1, 2, 'de', '2018-10-02', '2018-10-01', 'aaaaaaaaaaaa', 1, '0', 16, '0000-00-00', '0000-00-00', '2018-10-16 07:52:40', '2018-10-16 05:52:40');

-- --------------------------------------------------------

--
-- Table structure for table `espl_project`
--

CREATE TABLE `espl_project` (
  `id` int(11) NOT NULL,
  `proposal_id` int(11) NOT NULL,
  `project_region_id` varchar(255) DEFAULT NULL,
  `project_country_id` varchar(255) DEFAULT NULL,
  `methodolgy_category_id` varchar(255) DEFAULT NULL,
  `methodolgy_subcategory_id` varchar(255) DEFAULT NULL,
  `mandatory_sector` varchar(255) DEFAULT NULL,
  `conditional_sector` varchar(255) DEFAULT NULL,
  `technical_area` varchar(64) DEFAULT NULL,
  `technical_expert_id` varchar(255) DEFAULT NULL,
  `methodological_expert_id` varchar(255) DEFAULT NULL,
  `financial_expert_id` varchar(255) DEFAULT NULL,
  `local_expert_id` varchar(255) DEFAULT NULL,
  `submission_date` date DEFAULT NULL,
  `completeness_check_date` date DEFAULT NULL,
  `ir_check_date` date DEFAULT NULL,
  `registered_Issued_date` date DEFAULT NULL,
  `finance_bill_number` varchar(255) DEFAULT NULL,
  `travel_invoice_date` date DEFAULT NULL,
  `travel_invoice_type` varchar(255) DEFAULT NULL,
  `travel_invoice_amount` varchar(255) DEFAULT NULL,
  `travel_invoice_currency` varchar(255) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `espl_project`
--

INSERT INTO `espl_project` (`id`, `proposal_id`, `project_region_id`, `project_country_id`, `methodolgy_category_id`, `methodolgy_subcategory_id`, `mandatory_sector`, `conditional_sector`, `technical_area`, `technical_expert_id`, `methodological_expert_id`, `financial_expert_id`, `local_expert_id`, `submission_date`, `completeness_check_date`, `ir_check_date`, `registered_Issued_date`, `finance_bill_number`, `travel_invoice_date`, `travel_invoice_type`, `travel_invoice_amount`, `travel_invoice_currency`, `created_date`, `modified_date`) VALUES
(1, 1, '2,5', '6,9', '1,2,3', '5,7,131,133,162,164', '1,2', '5,8', '2.0', '1,3,5,27', '5', '3', '3,5', '2018-10-17', '2018-10-10', '2018-10-24', '2018-10-03', '123', '2018-10-09', '', NULL, '', '0000-00-00 00:00:00', '2018-10-23 08:55:50');

-- --------------------------------------------------------

--
-- Table structure for table `espl_project_finance_stage`
--

CREATE TABLE `espl_project_finance_stage` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `stage_name` varchar(255) DEFAULT NULL,
  `project_stage_date` date DEFAULT NULL,
  `project_stage_submit_by` varchar(255) NOT NULL,
  `finance_stage_date` date DEFAULT NULL,
  `finance_stage_amount` varchar(255) DEFAULT NULL,
  `finance_stage_amount_currency` varchar(255) DEFAULT NULL,
  `finance_stage_submit_by` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `espl_project_finance_stage`
--

INSERT INTO `espl_project_finance_stage` (`id`, `project_id`, `stage_name`, `project_stage_date`, `project_stage_submit_by`, `finance_stage_date`, `finance_stage_amount`, `finance_stage_amount_currency`, `finance_stage_submit_by`, `created_date`, `modified_date`) VALUES
(1, 1, 'Contract Signed', '2018-10-01', 'rama', '2018-10-03', '150000', 'Inr', 'wgfh', '2018-10-23 09:59:10', '2018-10-24 06:09:32'),
(2, 1, 'Publication', '2018-10-24', 'rama', '0000-00-00', '10000', 'Inr', 'wgfh', '2018-10-23 09:59:10', '2018-10-24 06:09:32'),
(3, 1, 'Findings Issued', '2018-10-10', 'rama', '0000-00-00', '7000', 'Inr', 'wgfh', '2018-10-23 09:59:10', '2018-10-24 06:09:32');

-- --------------------------------------------------------

--
-- Table structure for table `espl_proposal`
--

CREATE TABLE `espl_proposal` (
  `id` int(11) NOT NULL,
  `service_type` varchar(255) DEFAULT NULL,
  `service_category` varchar(255) DEFAULT NULL,
  `service_sub_category` varchar(255) DEFAULT NULL,
  `project_scale` varchar(255) DEFAULT NULL,
  `project_type` varchar(255) DEFAULT NULL,
  `proposal_number` varchar(255) DEFAULT NULL,
  `proposal_issue_date` date DEFAULT NULL,
  `proposa_revision_number` varchar(255) NOT NULL,
  `client_name` varchar(255) DEFAULT NULL,
  `client_country` varchar(255) DEFAULT NULL,
  `proposal_status` int(11) NOT NULL,
  `contract_signed` date DEFAULT NULL,
  `contract_value` int(11) NOT NULL,
  `contract_value_currency` varchar(120) DEFAULT NULL,
  `client_representative_name` varchar(255) DEFAULT NULL,
  `client_representative_email` varchar(255) DEFAULT NULL,
  `client_representative_phone` varchar(255) DEFAULT NULL,
  `client_address` varchar(255) DEFAULT NULL,
  `project_title` varchar(255) DEFAULT NULL,
  `project_external_number` varchar(255) DEFAULT NULL,
  `team_lead` varchar(255) DEFAULT NULL,
  `invoice_status_ids` varchar(255) DEFAULT NULL,
  `attachment_image` text,
  `created_date` datetime NOT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `espl_proposal`
--

INSERT INTO `espl_proposal` (`id`, `service_type`, `service_category`, `service_sub_category`, `project_scale`, `project_type`, `proposal_number`, `proposal_issue_date`, `proposa_revision_number`, `client_name`, `client_country`, `proposal_status`, `contract_signed`, `contract_value`, `contract_value_currency`, `client_representative_name`, `client_representative_email`, `client_representative_phone`, `client_address`, `project_title`, `project_external_number`, `team_lead`, `invoice_status_ids`, `attachment_image`, `created_date`, `created_by`, `modified_date`) VALUES
(1, '2', '7', '1,2', 'Large Scale', 'PoA', '4565', '2018-10-03', '1132', '1', 'Andorra', 3, '2018-10-25', 50000, 'Inr', '27', 'xxxxxxxxx', 'xxxxxxxxxxx', 'address1', 'Project 1', '12345', '1', '1,2,4', '1540281550', '2018-10-23 09:59:10', 'ankit', '2018-10-23 10:54:07');

-- --------------------------------------------------------

--
-- Table structure for table `espl_proposal_milestone`
--

CREATE TABLE `espl_proposal_milestone` (
  `id` int(11) NOT NULL,
  `proposal_id` int(11) NOT NULL,
  `stage_id` int(11) DEFAULT NULL,
  `milestone_name` varchar(255) DEFAULT NULL,
  `milestone_value` varchar(128) DEFAULT NULL,
  `milestone_description` text,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `espl_proposal_milestone`
--

INSERT INTO `espl_proposal_milestone` (`id`, `proposal_id`, `stage_id`, `milestone_name`, `milestone_value`, `milestone_description`, `created_date`, `modified_date`) VALUES
(1, 1, 1, 'Contract Signed', '10', 'test', '2018-10-23 06:11:15', '2018-10-23 04:11:15'),
(2, 1, 2, 'Publication', '20', 'test1', '2018-10-23 06:11:15', '2018-10-23 04:11:15'),
(3, 1, 4, 'Findings Issued', '30', 'test2', '2018-10-23 06:11:15', '2018-10-23 04:11:15');

-- --------------------------------------------------------

--
-- Table structure for table `espl_role`
--

CREATE TABLE `espl_role` (
  `id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `permission` varchar(200) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `espl_role`
--

INSERT INTO `espl_role` (`id`, `role_name`, `permission`, `created_date`, `modified_date`) VALUES
(1, 'Admin', '3,4,5,6', '2018-10-05 09:48:13', '2018-10-05 07:48:13'),
(2, 'Finance', '4,6', '2018-10-05 10:53:04', '2018-10-05 08:53:04'),
(3, 'Proposal', '3,4,5,6', '2018-10-05 11:25:01', '2018-10-05 09:25:01'),
(4, 'Project', '3,4,5', '2018-10-05 11:25:17', '2018-10-23 12:58:31');

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` int(11) NOT NULL,
  `holiday_name` varchar(512) DEFAULT NULL,
  `holiday_date` date DEFAULT NULL,
  `is_deleted` tinyint(4) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`id`, `holiday_name`, `holiday_date`, `is_deleted`, `created_date`, `modified_date`) VALUES
(1, 'Leave1', '2018-10-30', NULL, '2018-10-03 09:35:56', '2018-10-03 07:38:02'),
(2, 'Leave', '2018-10-24', NULL, '2018-10-03 12:52:38', '2018-10-03 10:52:38');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_stage`
--

CREATE TABLE `invoice_stage` (
  `id` int(11) NOT NULL,
  `stage_name` varchar(128) NOT NULL,
  `is_deleted` tinyint(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_stage`
--

INSERT INTO `invoice_stage` (`id`, `stage_name`, `is_deleted`, `created_date`, `modified_date`) VALUES
(1, 'Contract Signed', 0, '2018-10-03 12:46:03', '2018-10-17 07:32:33'),
(2, 'Publication', 0, '2018-10-03 12:48:21', '2018-10-17 07:32:41'),
(3, 'Site Visit Completed', 0, '2018-10-03 12:48:21', '2018-10-17 07:32:41'),
(4, 'Findings Issued', 0, '2018-10-03 12:46:03', '2018-10-17 07:32:33'),
(5, 'Draft Report Issued', 0, '2018-10-03 12:48:21', '2018-10-17 07:32:41'),
(6, 'Final Report Issued', 0, '2018-10-03 12:48:21', '2018-10-17 07:32:41');

-- --------------------------------------------------------

--
-- Table structure for table `methodologies`
--

CREATE TABLE `methodologies` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `methodologies`
--

INSERT INTO `methodologies` (`id`, `category_id`, `name`, `is_deleted`, `created_date`, `modified_date`) VALUES
(1, 1, 'AM0001', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(2, 1, 'AM0007', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(3, 1, 'AM0009', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(4, 1, 'AM0017', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(5, 1, 'AM0018', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(6, 1, 'AM0019', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(7, 1, 'AM0020', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(8, 1, 'AM0021', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(9, 1, 'AM0023', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(10, 1, 'AM0026', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(11, 1, 'AM0027', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(12, 1, 'AM0028', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(13, 1, 'AM0030', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(14, 1, 'AM0031', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(15, 1, 'AM0035', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(16, 1, 'AM0036', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(17, 1, 'AM0037', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(18, 1, 'AM0038', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(19, 1, 'AM0043', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(20, 1, 'AM0044', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(21, 1, 'AM0045', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(22, 1, 'AM0046', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(23, 1, 'AM0048', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(24, 1, 'AM0049', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(25, 1, 'AM0050', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(26, 1, 'AM0052', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(27, 1, 'AM0053', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(28, 1, 'AM0055', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(29, 1, 'AM0056', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(30, 1, 'AM0057', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(31, 1, 'AM0058', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(32, 1, 'AM0059', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(33, 1, 'AM0060', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(34, 1, 'AM0061', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(35, 1, 'AM0062', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(36, 1, 'AM0063', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(37, 1, 'AM0064', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(38, 1, 'AM0065', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(39, 1, 'AM0066', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(40, 1, 'AM0067', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(41, 1, 'AM0068', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(42, 1, 'AM0069', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(43, 1, 'AM0070', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(44, 1, 'AM0071', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(45, 1, 'AM0072', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(46, 1, 'AM0073', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(47, 1, 'AM0074', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(48, 1, 'AM0075', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(49, 1, 'AM0076', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(50, 1, 'AM0077', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(51, 1, 'AM0078', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(52, 1, 'AM0079', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(53, 1, 'AM0080', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(54, 1, 'AM0081', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(55, 1, 'AM0082', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(56, 1, 'AM0083', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(57, 1, 'AM0084', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(58, 1, 'AM0086', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(59, 1, 'AM0088', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(60, 1, 'AM0089', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(61, 1, 'AM0090', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(62, 1, 'AM0091', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(63, 1, 'AM0092', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(64, 1, 'AM0093', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(65, 1, 'AM0094', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(66, 1, 'AM0095', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(67, 1, 'AM0096', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(68, 1, 'AM0097', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(69, 1, 'AM0098', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(70, 1, 'AM0099', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(71, 1, 'AM0100', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(72, 1, 'AM0101', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(73, 1, 'AM0103', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(74, 1, 'AM0104', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(75, 1, 'AM0105', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(76, 1, 'AM0106', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(77, 1, 'AM0107', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(78, 1, 'AM0108', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(79, 1, 'AM0109', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(80, 1, 'AM0110', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(81, 1, 'AM0111', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(82, 1, 'AM0112', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(83, 1, 'AM0113', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(84, 1, 'AM0114', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(85, 1, 'AM0115', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(86, 1, 'AM0116', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(87, 1, 'AM0117', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(88, 1, 'AM0118', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(89, 1, 'AM0119', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(90, 1, 'AM0120', 0, '0000-00-00 00:00:00', '2018-10-22 04:59:09'),
(128, 2, 'ACM0001', 0, '0000-00-00 00:00:00', '2018-10-22 05:00:31'),
(129, 2, 'ACM0002', 0, '0000-00-00 00:00:00', '2018-10-22 05:00:31'),
(130, 2, 'ACM0003', 0, '0000-00-00 00:00:00', '2018-10-22 05:00:31'),
(131, 2, 'ACM0005', 0, '0000-00-00 00:00:00', '2018-10-22 05:00:31'),
(132, 2, 'ACM0006', 0, '0000-00-00 00:00:00', '2018-10-22 05:00:31'),
(133, 2, 'ACM0007', 0, '0000-00-00 00:00:00', '2018-10-22 05:00:31'),
(134, 2, 'ACM0008', 0, '0000-00-00 00:00:00', '2018-10-22 05:00:31'),
(135, 2, 'ACM0009', 0, '0000-00-00 00:00:00', '2018-10-22 05:00:31'),
(136, 2, 'ACM0010', 0, '0000-00-00 00:00:00', '2018-10-22 05:00:31'),
(137, 2, 'ACM0011', 0, '0000-00-00 00:00:00', '2018-10-22 05:00:31'),
(138, 2, 'ACM0012', 0, '0000-00-00 00:00:00', '2018-10-22 05:00:31'),
(139, 2, 'ACM0013', 0, '0000-00-00 00:00:00', '2018-10-22 05:00:31'),
(140, 2, 'ACM0014', 0, '0000-00-00 00:00:00', '2018-10-22 05:00:31'),
(141, 2, 'ACM0015', 0, '0000-00-00 00:00:00', '2018-10-22 05:00:31'),
(142, 2, 'ACM0016', 0, '0000-00-00 00:00:00', '2018-10-22 05:00:31'),
(143, 2, 'ACM0017', 0, '0000-00-00 00:00:00', '2018-10-22 05:00:31'),
(144, 2, 'ACM0018', 0, '0000-00-00 00:00:00', '2018-10-22 05:00:31'),
(145, 2, 'ACM0019', 0, '0000-00-00 00:00:00', '2018-10-22 05:00:31'),
(146, 2, 'ACM0020', 0, '0000-00-00 00:00:00', '2018-10-22 05:00:31'),
(147, 2, 'ACM0021', 0, '0000-00-00 00:00:00', '2018-10-22 05:00:31'),
(148, 2, 'ACM0022', 0, '0000-00-00 00:00:00', '2018-10-22 05:00:31'),
(149, 2, 'ACM0023', 0, '0000-00-00 00:00:00', '2018-10-22 05:00:31'),
(150, 2, 'ACM0024', 0, '0000-00-00 00:00:00', '2018-10-22 05:00:31'),
(151, 2, 'ACM0025', 0, '0000-00-00 00:00:00', '2018-10-22 05:00:31'),
(152, 2, 'ACM0026', 0, '0000-00-00 00:00:00', '2018-10-22 05:00:31'),
(159, 3, 'AMS-I.A.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(160, 3, 'AMS-I.B.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(161, 3, 'AMS-I.C.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(162, 3, 'AMS-I.D.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(163, 3, 'AMS-I.E.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(164, 3, 'AMS-I.F.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(165, 3, 'AMS-I.G.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(166, 3, 'AMS-I.H.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(167, 3, 'AMS-I.I.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(168, 3, 'AMS-I.J.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(169, 3, 'AMS-I.K.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(170, 3, 'AMS-I.L.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(171, 3, 'AMS-I.M.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(172, 3, 'AMS-II.A.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(173, 3, 'AMS-II.B.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(174, 3, 'AMS-II.C.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(175, 3, 'AMS-II.D.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(176, 3, 'AMS-II.E.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(177, 3, 'AMS-II.F.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(178, 3, 'AMS-II.G.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(179, 3, 'AMS-II.H.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(180, 3, 'AMS-II.I.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(181, 3, 'AMS-II.J.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(182, 3, 'AMS-II.K.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(183, 3, 'AMS-II.L.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(184, 3, 'AMS-II.M.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(185, 3, 'AMS-II.N.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(186, 3, 'AMS-II.O.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(187, 3, 'AMS-II.P.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(188, 3, 'AMS-II.Q.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(189, 3, 'AMS-II.R', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(190, 3, 'AMS-II.S.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(191, 3, 'AMS-II.T.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(192, 3, 'AMS-III.A.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(193, 3, 'AMS-III.B.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(194, 3, 'AMS-III.C.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(195, 3, 'AMS-III.D.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(196, 3, 'AMS-III.E.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(197, 3, 'AMS-III.F.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(198, 3, 'AMS-III.G.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(199, 3, 'AMS-III.H.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(200, 3, 'AMS-III.I.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(201, 3, 'AMS-III.J.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(202, 3, 'AMS-III.K.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(203, 3, 'AMS-III.L.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(204, 3, 'AMS-III.M.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(205, 3, 'AMS-III.N.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(206, 3, 'AMS-III.O.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(207, 3, 'AMS-III.P.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(208, 3, 'AMS-III.Q.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(209, 3, 'AMS-III.R.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(210, 3, 'AMS-III.S.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(211, 3, 'AMS-III.T.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(212, 3, 'AMS-III.U.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(213, 3, 'AMS-III.V.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(214, 3, 'AMS-III.W.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(215, 3, 'AMS-III.X.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(216, 3, 'AMS-III.Y.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(217, 3, 'AMS-III.Z.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(218, 3, 'AMS-III.AA.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(219, 3, 'AMS-III.AB.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(220, 3, 'AMS-III.AC.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(221, 3, 'AMS-III.AD.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(222, 3, 'AMS-III.AE.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(223, 3, 'AMS-III.AF.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(224, 3, 'AMS-III.AG.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(225, 3, 'AMS-III.AH.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(226, 3, 'AMS-III.AI.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(227, 3, 'AMS-III.AJ.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(228, 3, 'AMS-III.AK.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(229, 3, 'AMS-III.AL.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(230, 3, 'AMS-III.AM.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(231, 3, 'AMS-III.AN.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(232, 3, 'AMS-III.AO.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(233, 3, 'AMS-III.AP.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(234, 3, 'AMS-III.AQ.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(235, 3, 'AMS-III.AR.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(236, 3, 'AMS-III.AS.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(237, 3, 'AMS-III.AT.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(238, 3, 'AMS-III.AU.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(239, 3, 'AMS-III.AV.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(240, 3, 'AMS-III.AW.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(241, 3, 'AMS-III.AX.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(242, 3, 'AMS-III.AY.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(243, 3, 'AMS-III.BA.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(244, 3, 'AMS-III.BB.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(245, 3, 'AMS-III.BC.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(246, 3, 'AMS-III.BD.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(247, 3, 'AMS-III.BE.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(248, 3, 'AMS-III.BF.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(249, 3, 'AMS-III.BG.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(250, 3, 'AMS-III.BH.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(251, 3, 'AMS-III.BI.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(252, 3, 'AMS-III.BJ.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(253, 3, 'AMS-III.BK', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(254, 3, 'AMS-III.BL.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32'),
(255, 3, 'AMS-III.BM.', 0, '0000-00-00 00:00:00', '2018-10-22 05:01:32');

-- --------------------------------------------------------

--
-- Table structure for table `methodologies_category`
--

CREATE TABLE `methodologies_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `methodologies_category`
--

INSERT INTO `methodologies_category` (`id`, `category_name`, `is_deleted`, `created_date`, `modified_date`) VALUES
(1, 'Approved Methodologies', 0, '2018-10-03 13:42:02', '2018-10-22 04:52:08'),
(2, 'Approved Consolidated Methodologies', 0, '2018-10-03 13:59:01', '2018-10-22 04:52:13'),
(3, 'Small Scale Methodogies', 0, '2018-10-03 13:59:01', '2018-10-22 04:52:13');

-- --------------------------------------------------------

--
-- Table structure for table `product_assign`
--

CREATE TABLE `product_assign` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `employe_id` int(11) NOT NULL,
  `assign_date` date NOT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_date` date NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_assign`
--

INSERT INTO `product_assign` (`id`, `product_id`, `employe_id`, `assign_date`, `created_by`, `created_date`, `modified_date`) VALUES
(1, 3, 27, '2018-10-10', 'sdfsf', '2018-10-24', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_master`
--

CREATE TABLE `product_master` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_date` date NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_master`
--

INSERT INTO `product_master` (`id`, `product_name`, `created_by`, `created_date`, `modified_date`) VALUES
(3, 'lenovo', NULL, '2018-10-24', '2018-10-24 10:51:06'),
(5, 'fghgfh', NULL, '2018-10-24', '2018-10-24 10:51:21'),
(6, 'fghgfh', NULL, '2018-10-24', '2018-10-24 10:51:23');

-- --------------------------------------------------------

--
-- Table structure for table `project_region`
--

CREATE TABLE `project_region` (
  `id` int(11) NOT NULL,
  `region_name` varchar(255) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_region`
--

INSERT INTO `project_region` (`id`, `region_name`, `is_deleted`, `created_date`, `modified_date`) VALUES
(1, 'Africa', 0, '2018-10-04 13:04:12', '2018-10-22 05:19:01'),
(2, 'China', 0, '2018-10-04 13:04:12', '2018-10-22 05:19:01'),
(3, 'Europe', 0, '2018-10-04 13:04:12', '2018-10-22 05:19:01'),
(4, 'Indian Sub-Continent', 0, '2018-10-04 13:04:12', '2018-10-22 05:19:01'),
(5, 'Latin America', 0, '2018-10-04 13:04:12', '2018-10-22 05:19:01'),
(6, 'Middle East', 0, '2018-10-04 13:04:12', '2018-10-22 05:19:01'),
(7, 'North America', 0, '2018-10-04 13:04:12', '2018-10-22 05:19:01'),
(8, 'South East Asia', 0, '2018-10-04 13:04:12', '2018-10-22 05:19:01');

-- --------------------------------------------------------

--
-- Table structure for table `project_time_sheet`
--

CREATE TABLE `project_time_sheet` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time_hrs` varchar(255) DEFAULT NULL,
  `time_mins` varchar(255) DEFAULT NULL,
  `timesheet_date` date NOT NULL,
  `created_date` date NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_time_sheet`
--

INSERT INTO `project_time_sheet` (`id`, `project_id`, `user_id`, `time_hrs`, `time_mins`, `timesheet_date`, `created_date`, `modified_date`) VALUES
(1, 1, 3, '39', '55', '2018-10-10', '2018-10-25', '2018-10-25 07:03:49'),
(2, 1, 3, '2', '0', '2018-10-10', '2018-10-25', '2018-10-25 09:12:55'),
(3, 1, 3, '4', '', '2018-10-03', '2018-10-25', '2018-10-25 07:26:27');

-- --------------------------------------------------------

--
-- Table structure for table `proposal_status`
--

CREATE TABLE `proposal_status` (
  `id` int(11) NOT NULL,
  `status_name` varchar(255) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proposal_status`
--

INSERT INTO `proposal_status` (`id`, `status_name`, `is_deleted`, `created_date`, `modified_date`) VALUES
(1, 'Issued', 0, '2018-10-04 13:23:23', '2018-10-22 05:20:31'),
(2, 'Revision Requested', 0, '2018-10-04 13:23:29', '2018-10-22 05:20:36'),
(3, 'Contract Signed', 0, '2018-10-10 13:00:31', '2018-10-10 11:00:31'),
(4, 'Postponed', 0, '2018-10-04 13:23:23', '2018-10-22 05:20:31'),
(5, 'Rejected (by Client)', 0, '2018-10-04 13:23:29', '2018-10-22 05:20:36'),
(6, 'Denied (by ESPL)', 0, '2018-10-10 13:00:31', '2018-10-10 11:00:31');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `DateCreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `LastUpdated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `description`, `DateCreated`, `LastUpdated`) VALUES
(1, 'Admin', '2018-10-20 11:58:35', '2018-10-20 02:57:43'),
(2, 'Project', '2018-10-20 11:58:41', '2018-10-20 02:57:51'),
(3, 'Proposal', '2018-10-20 11:58:35', '2018-10-20 02:57:43'),
(4, 'Finance', '2018-10-24 09:38:59', '2018-10-20 02:57:51');

-- --------------------------------------------------------

--
-- Table structure for table `service_category`
--

CREATE TABLE `service_category` (
  `id` int(11) NOT NULL,
  `service_type_id` int(11) DEFAULT NULL,
  `service_cat_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_category`
--

INSERT INTO `service_category` (`id`, `service_type_id`, `service_cat_name`, `status`, `created_date`, `modified_date`) VALUES
(1, 1, 'CDM', 1, '0000-00-00 00:00:00', '2018-10-22 05:26:58'),
(2, 1, 'CI', 1, '0000-00-00 00:00:00', '2018-10-22 05:26:58'),
(3, 1, 'GS', 1, '0000-00-00 00:00:00', '2018-10-22 05:26:58'),
(4, 1, 'PAF', 1, '0000-00-00 00:00:00', '2018-10-22 05:26:58'),
(5, 1, 'SCS', 1, '0000-00-00 00:00:00', '2018-10-22 05:26:58'),
(6, 1, 'VCS', 1, '0000-00-00 00:00:00', '2018-10-22 05:26:58'),
(7, 2, 'CS', 1, '0000-00-00 00:00:00', '2018-10-22 05:26:58'),
(8, 2, 'ECA', 1, '0000-00-00 00:00:00', '2018-10-22 05:26:58'),
(9, 2, 'EIA', 1, '0000-00-00 00:00:00', '2018-10-22 05:26:58'),
(10, 2, 'ES', 1, '0000-00-00 00:00:00', '2018-10-22 05:26:58'),
(11, 2, 'IHM', 1, '0000-00-00 00:00:00', '2018-10-22 05:26:58'),
(12, 2, 'WRM', 1, '0000-00-00 00:00:00', '2018-10-22 05:26:58'),
(13, 3, 'EA', 1, '0000-00-00 00:00:00', '2018-10-22 05:26:58'),
(14, 3, 'GBC', 1, '0000-00-00 00:00:00', '2018-10-22 05:26:58'),
(15, 3, 'IAQ', 1, '0000-00-00 00:00:00', '2018-10-22 05:26:58'),
(16, 3, 'REC', 1, '0000-00-00 00:00:00', '2018-10-22 05:26:58');

-- --------------------------------------------------------

--
-- Table structure for table `service_sub_category`
--

CREATE TABLE `service_sub_category` (
  `id` int(11) NOT NULL,
  `serviceId` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_sub_category`
--

INSERT INTO `service_sub_category` (`id`, `serviceId`, `service_name`, `is_deleted`, `created_date`, `modified_date`) VALUES
(1, 1, 'VAL', 0, '2018-10-09 08:15:38', '2018-10-22 05:29:35'),
(2, 1, 'INC', 0, '2018-10-09 08:17:38', '2018-10-22 05:29:39'),
(3, 1, 'VER', 0, '2018-10-09 08:17:50', '2018-10-22 05:50:35'),
(4, 1, 'PRC', 0, '2018-10-10 08:59:51', '2018-10-22 05:29:47'),
(5, 1, 'RCP', 0, '2018-10-10 08:59:51', '2018-10-22 05:29:47');

-- --------------------------------------------------------

--
-- Table structure for table `service_type`
--

CREATE TABLE `service_type` (
  `id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_type`
--

INSERT INTO `service_type` (`id`, `service_name`, `status`, `created_date`, `modified_date`) VALUES
(1, 'Carbon Mitigation Services', 1, '2018-10-01 10:52:37', '2018-10-01 05:47:43'),
(2, 'Industrial Services', 1, '2018-10-01 10:52:37', '2018-10-01 05:47:46'),
(3, 'Sustainability Services', 1, '2018-10-01 10:52:37', '2018-10-01 05:47:49');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status_name` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status_name`, `created_date`, `modified_date`) VALUES
(1, 'active', '2018-10-01 09:20:29', '2018-10-01 07:36:52'),
(2, 'Inactive', '2018-10-01 09:37:23', '2018-10-01 07:37:23'),
(3, 'Add', '2018-10-05 08:28:23', '2018-10-05 06:28:23'),
(4, 'Edit', '2018-10-05 08:28:37', '2018-10-05 06:28:37'),
(5, 'View', '2018-10-05 08:28:41', '2018-10-05 06:28:41'),
(6, 'Delete', '2018-10-05 08:28:48', '2018-10-05 06:28:48'),
(7, 'Issued', '2018-10-05 08:29:07', '2018-10-05 06:29:07'),
(8, 'Revision Requested', '2018-10-05 08:29:19', '2018-10-05 06:29:19'),
(9, 'Postponed', '2018-10-05 08:29:30', '2018-10-05 06:29:30'),
(10, 'Rejected (by Client)', '2018-10-05 08:29:43', '2018-10-05 06:29:43'),
(11, 'Denied (by ESPL)', '2018-10-05 08:29:57', '2018-10-05 06:29:57'),
(12, 'Agreed', '2018-10-05 08:30:09', '2018-10-05 06:30:09'),
(13, 'approved', '2018-10-12 13:31:13', '2018-10-12 11:31:13'),
(14, 'cancelled', '2018-10-12 13:31:51', '2018-10-12 11:31:51'),
(15, 'partially_approved', '2018-10-12 13:32:09', '2018-10-12 11:32:09'),
(16, 'pending', '2018-10-12 13:34:04', '2018-10-12 11:34:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role_id`, `created_date`, `modified_date`) VALUES
(1, 'ankit', 'shweta@vmail.in', '21232f297a57a5a743894a0e4a801fc3', 1, '2018-10-20 08:22:22', '2018-10-22 04:32:26'),
(2, 'rama', 'rama@vmail.in', '21232f297a57a5a743894a0e4a801fc3', 2, '2018-10-20 08:22:47', '2018-10-23 13:06:20'),
(3, 'ajay', 'ss@gg.com', '21232f297a57a5a743894a0e4a801fc3', 4, '2018-10-20 09:28:07', '2018-10-24 04:21:11'),
(4, 'admin', 'vxc', '0192023a7bbd73250516f069df18b500', 0, '2018-10-20 09:30:38', '2018-10-20 07:30:38'),
(5, 'admin', 'vxc', '0192023a7bbd73250516f069df18b500', 2, '2018-10-20 09:32:03', '2018-10-20 07:35:24'),
(6, 'sssssssssssss', 'sad@fgfg.cn', '0192023a7bbd73250516f069df18b500', 1, '2018-10-20 13:14:47', '2018-10-20 11:14:47'),
(7, 'sssssssssssss', 'sad@fgfg.cn', '0192023a7bbd73250516f069df18b500', 1, '2018-10-20 13:15:00', '2018-10-20 11:15:00'),
(8, 'admin', 'sssssssss', '0192023a7bbd73250516f069df18b500', 2, '2018-10-20 13:17:18', '2018-10-20 11:17:18'),
(9, 'admin', 'xxxxxxxxxx', '0192023a7bbd73250516f069df18b500', 2, '2018-10-20 13:22:07', '2018-10-20 11:22:07'),
(10, 'admin', 'xxxxxxxxxx', '0192023a7bbd73250516f069df18b500', 2, '2018-10-20 13:41:05', '2018-10-20 11:41:05'),
(11, 'admin', 'xxxxxxxx', '0192023a7bbd73250516f069df18b500', 2, '2018-10-20 13:41:37', '2018-10-20 11:41:37'),
(12, 'admin', 'xxxxxxxx', '0192023a7bbd73250516f069df18b500', 2, '2018-10-20 13:42:05', '2018-10-20 11:42:05'),
(13, 'admin', 'xxxxxxxx', '0192023a7bbd73250516f069df18b500', 2, '2018-10-20 13:44:52', '2018-10-20 11:44:52'),
(14, 'admin', 'xxxxxxxx', '0192023a7bbd73250516f069df18b500', 2, '2018-10-20 13:45:01', '2018-10-20 11:45:01'),
(15, 'admin', 'xxxxxxxx', '0192023a7bbd73250516f069df18b500', 2, '2018-10-20 13:45:24', '2018-10-20 11:45:24'),
(16, 'admin', 'xxxxxxxx', '0192023a7bbd73250516f069df18b500', 2, '2018-10-20 13:46:05', '2018-10-20 11:46:05'),
(17, 'admin', 'xxxxxxxx', '0192023a7bbd73250516f069df18b500', 2, '2018-10-20 13:47:19', '2018-10-20 11:47:20'),
(18, 'admin', 'xxxxxxxx', '0192023a7bbd73250516f069df18b500', 2, '2018-10-20 13:49:37', '2018-10-20 11:49:37'),
(19, 'admin', 'xxxxxxxx', '0192023a7bbd73250516f069df18b500', 2, '2018-10-20 13:49:38', '2018-10-20 11:49:38'),
(20, 'admin', 'xxxxxxxxx', '0192023a7bbd73250516f069df18b500', 2, '2018-10-20 13:50:05', '2018-10-20 11:50:05'),
(21, 'admin', 'xxxxxxxxx', '0192023a7bbd73250516f069df18b500', 2, '2018-10-20 13:50:24', '2018-10-20 11:50:24'),
(22, 'admin', 'xxxxxxxxx', '0192023a7bbd73250516f069df18b500', 2, '2018-10-20 13:50:26', '2018-10-20 11:50:26'),
(23, 'admin', 'ssssssssssss', '0192023a7bbd73250516f069df18b500', 2, '2018-10-20 13:51:20', '2018-10-20 11:51:20'),
(24, 'admin', 'ssssssssssss', '0192023a7bbd73250516f069df18b500', 2, '2018-10-20 13:52:13', '2018-10-20 11:52:13'),
(25, 'admin', 'ssssssssssss', '0192023a7bbd73250516f069df18b500', 2, '2018-10-20 13:52:15', '2018-10-20 11:52:15'),
(26, 'admin', 'xxxxxxxxx', '0192023a7bbd73250516f069df18b500', 2, '2018-10-20 13:52:42', '2018-10-20 11:52:42'),
(27, 'admin', 'xxxxxxxxx', '0192023a7bbd73250516f069df18b500', 2, '2018-10-20 13:52:54', '2018-10-20 11:52:54'),
(28, 'admin', 'xxxxxxxxx', '0192023a7bbd73250516f069df18b500', 2, '2018-10-20 13:53:07', '2018-10-20 11:53:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authassignment`
--
ALTER TABLE `authassignment`
  ADD PRIMARY KEY (`itemname`);

--
-- Indexes for table `authitem`
--
ALTER TABLE `authitem`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `authitemchild`
--
ALTER TABLE `authitemchild`
  ADD PRIMARY KEY (`parent`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `espl_client`
--
ALTER TABLE `espl_client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `espl_employee_details`
--
ALTER TABLE `espl_employee_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `espl_leaves`
--
ALTER TABLE `espl_leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `espl_leave_management`
--
ALTER TABLE `espl_leave_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `espl_project`
--
ALTER TABLE `espl_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `espl_project_finance_stage`
--
ALTER TABLE `espl_project_finance_stage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `espl_proposal`
--
ALTER TABLE `espl_proposal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `espl_proposal_milestone`
--
ALTER TABLE `espl_proposal_milestone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `espl_role`
--
ALTER TABLE `espl_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_stage`
--
ALTER TABLE `invoice_stage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `methodologies`
--
ALTER TABLE `methodologies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `methodologies_category`
--
ALTER TABLE `methodologies_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_assign`
--
ALTER TABLE `product_assign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_master`
--
ALTER TABLE `product_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_region`
--
ALTER TABLE `project_region`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_time_sheet`
--
ALTER TABLE `project_time_sheet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proposal_status`
--
ALTER TABLE `proposal_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_category`
--
ALTER TABLE `service_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_sub_category`
--
ALTER TABLE `service_sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_type`
--
ALTER TABLE `service_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `espl_client`
--
ALTER TABLE `espl_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `espl_employee_details`
--
ALTER TABLE `espl_employee_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `espl_leaves`
--
ALTER TABLE `espl_leaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `espl_leave_management`
--
ALTER TABLE `espl_leave_management`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `espl_project`
--
ALTER TABLE `espl_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `espl_project_finance_stage`
--
ALTER TABLE `espl_project_finance_stage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `espl_proposal`
--
ALTER TABLE `espl_proposal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `espl_proposal_milestone`
--
ALTER TABLE `espl_proposal_milestone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `espl_role`
--
ALTER TABLE `espl_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoice_stage`
--
ALTER TABLE `invoice_stage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `methodologies`
--
ALTER TABLE `methodologies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;

--
-- AUTO_INCREMENT for table `methodologies_category`
--
ALTER TABLE `methodologies_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_assign`
--
ALTER TABLE `product_assign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_master`
--
ALTER TABLE `product_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `project_region`
--
ALTER TABLE `project_region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `project_time_sheet`
--
ALTER TABLE `project_time_sheet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `proposal_status`
--
ALTER TABLE `proposal_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `service_category`
--
ALTER TABLE `service_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `service_sub_category`
--
ALTER TABLE `service_sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `service_type`
--
ALTER TABLE `service_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `authassignment`
--
ALTER TABLE `authassignment`
  ADD CONSTRAINT `AuthAssignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `authitemchild`
--
ALTER TABLE `authitemchild`
  ADD CONSTRAINT `AuthItemChild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `AuthItemChild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
