-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018-12-08 07:46:07
-- 服务器版本： 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `text`
--

-- --------------------------------------------------------

--
-- 表的结构 `gw_country`
--

CREATE TABLE `gw_country` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `gw_country`
--

INSERT INTO `gw_country` (`id`, `name`) VALUES
(2, 'Afghanistan'),
(3, 'Aland'),
(4, 'Islands'),
(5, 'Albania'),
(6, 'Algeria'),
(7, 'American Samoa'),
(8, 'Andorra'),
(9, 'Angola'),
(10, 'Anguilla'),
(11, 'Antarctica'),
(12, 'Antigua And Barbuda'),
(13, 'Argentina'),
(14, 'Armenia'),
(15, 'Aruba'),
(16, 'Australia'),
(17, 'Austria'),
(18, 'Azerbaijan'),
(19, 'Bahamas'),
(20, 'Bahrain'),
(21, 'Bangladesh'),
(22, 'Barbados'),
(23, 'Belarus'),
(24, 'Belgium'),
(25, 'Belize'),
(26, 'Benin'),
(27, 'Bermuda'),
(28, 'Bhutan'),
(29, 'Bolivia'),
(30, 'Bosnia And Herzegovina'),
(31, 'Botswana'),
(32, 'Bouvet Island'),
(33, 'Brazil'),
(34, 'British Indian Ocean Territory'),
(35, 'Brunei Darussalam'),
(36, 'Bulgaria'),
(37, 'Burkina Faso'),
(38, 'Burundi'),
(39, 'Cambodia'),
(40, 'Cameroon'),
(41, 'Canada'),
(42, 'Cape Verde'),
(43, 'Cayman Islands'),
(44, 'Central'),
(45, 'African'),
(46, 'Republic'),
(47, 'Chad'),
(48, 'Chile'),
(49, 'China'),
(50, 'Christmas Island'),
(51, 'Cocos (Keeling) Islands'),
(52, 'Colombia'),
(53, 'Comoros'),
(54, 'Congo'),
(55, 'Congo Democratic Republic'),
(56, 'Cook Islands'),
(57, 'Costa Rica'),
(58, 'Cote DIvoire'),
(59, 'Croatia'),
(60, 'Cuba'),
(61, 'Curacao'),
(62, 'Cyprus'),
(63, 'Czech Republic'),
(64, 'Denmark'),
(65, 'Djibouti'),
(66, 'Dominica'),
(67, 'Dominican Republic'),
(68, 'Ecuador'),
(69, 'Egypt'),
(70, 'El Salvador'),
(71, 'Equatorial Guinea'),
(72, 'Eritrea'),
(73, 'Estonia'),
(74, 'Ethiopia'),
(75, 'Falkland Islands (Malvinas)'),
(76, 'Faroe Islands'),
(77, 'Fiji'),
(78, 'Finland'),
(79, 'France'),
(80, 'French Guiana'),
(81, 'French Polynesia'),
(82, 'French Southern Territories'),
(83, 'Gabon'),
(84, 'Gambia'),
(85, 'Georgia'),
(86, 'Germany'),
(87, 'Ghana'),
(88, 'Gibraltar'),
(89, 'Greece'),
(90, 'Greenland'),
(91, 'Grenada'),
(92, 'Guadeloupe'),
(93, 'Guam'),
(94, 'Guatemala'),
(95, 'Guernsey'),
(96, 'Guinea'),
(97, 'Guinea-Bissau'),
(98, 'Guyana'),
(99, 'Haiti'),
(100, 'Heard Island &amp; Mcdonald Islands'),
(101, 'Holy See (Vatican City State)'),
(102, 'Honduras'),
(103, 'Hong Kong'),
(104, 'Hungary'),
(105, 'Iceland'),
(106, 'India'),
(107, 'Indonesia'),
(108, 'Iran  Islamic Republic Of'),
(109, 'Iraq'),
(110, 'Ireland'),
(111, 'Isle Of Man'),
(112, 'Israel'),
(113, 'Italy'),
(114, 'Jamaica'),
(115, 'Japan'),
(116, 'Jersey'),
(117, 'Jordan'),
(118, 'Kazakhstan'),
(119, 'Kenya'),
(120, 'Kiribati'),
(121, 'Korea'),
(122, 'Kuwait'),
(123, 'Kyrgyzstan'),
(124, 'Lao Peoples Democratic Republic'),
(125, 'Latvia'),
(126, 'Lebanon'),
(127, 'Lesotho'),
(128, 'Liberia'),
(129, 'Libyan Arab Jamahiriya'),
(130, 'Liechtenstein'),
(131, 'Lithuania'),
(132, 'Luxembourg'),
(133, 'Macao'),
(134, 'Macedonia'),
(135, 'Madagascar'),
(136, 'Malawi'),
(137, 'Malaysia'),
(138, 'Maldives'),
(139, 'Mali'),
(140, 'Malta'),
(141, 'Marshall'),
(142, 'Islands'),
(143, 'Martinique'),
(144, 'Mauritania'),
(145, 'Mauritius'),
(146, 'Mayotte'),
(147, 'Mexico'),
(148, 'Micronesia'),
(150, 'Federated'),
(151, 'States'),
(152, 'Of'),
(153, 'Moldova'),
(154, 'Monaco'),
(155, 'Mongolia'),
(156, 'Montenegro'),
(157, 'Montserrat'),
(158, 'Morocco'),
(159, 'Mozambique'),
(160, 'Myanmar'),
(161, 'Namibia'),
(162, 'Nauru'),
(163, 'Nepal'),
(164, 'Netherlands'),
(165, 'Netherlands Antilles'),
(166, 'New Caledonia'),
(167, 'New Zealand'),
(168, 'Nicaragua'),
(169, 'Niger'),
(170, 'Nigeria'),
(171, 'Niue'),
(172, 'Norfolk Island'),
(173, 'Northern Mariana Islands'),
(174, 'Norway'),
(175, 'Oman'),
(176, 'Pakistan'),
(177, 'Palau'),
(178, 'Palestine State of'),
(179, 'Panama'),
(180, 'Papua New Guinea'),
(181, 'Paraguay'),
(182, 'Peru'),
(183, 'Philippines'),
(184, 'Pitcairn'),
(185, 'Poland'),
(186, 'Portugal'),
(187, 'Puerto'),
(188, 'Rico'),
(189, 'Qatar'),
(190, 'Reunion'),
(191, 'Romania'),
(192, 'Russian Federation'),
(193, 'Rwanda'),
(194, 'Saint Barthelemy'),
(195, 'Saint Helena'),
(196, 'Saint Kitts And Nevis'),
(197, 'Saint Lucia'),
(198, 'Saint Martin'),
(199, 'Saint Pierre And Miquelon'),
(200, 'Saint Vincent And Grenadines'),
(201, 'Samoa'),
(202, 'San Marino'),
(203, 'Sao Tome And Principe'),
(204, 'Saudi Arabia'),
(205, 'Senegal'),
(206, 'Serbia'),
(207, 'Seychelles'),
(208, 'Sierra Leone'),
(209, 'Singapore'),
(210, 'Slovakia'),
(211, 'Slovenia'),
(212, 'Solomon Islands'),
(213, 'Somalia'),
(214, 'South Africa'),
(215, 'South Georgia And Sandwich Isl.'),
(216, 'Spain'),
(217, 'Sri Lanka'),
(218, 'Sudan'),
(219, 'Suriname'),
(220, 'Svalbard And Jan Mayen'),
(221, 'Swaziland'),
(222, 'Sweden'),
(223, 'Switzerland'),
(224, 'Syrian Arab Republic'),
(225, 'Taiwan'),
(226, 'Tajikistan'),
(227, 'Tanzania'),
(228, 'Thailand'),
(229, 'Timor-Leste'),
(230, 'Togo'),
(231, 'Tokelau'),
(232, 'Tonga'),
(233, 'Trinidad And Tobago'),
(234, 'Tunisia'),
(235, 'Turkey'),
(236, 'Turkmenistan'),
(237, 'Turks And Caicos Islands'),
(238, 'Tuvalu'),
(239, 'Uganda'),
(240, 'Ukraine'),
(241, 'United Arab Emirates'),
(242, 'United Kingdom'),
(243, 'United States'),
(244, 'United States Outlying Islands'),
(245, 'Uruguay'),
(246, 'Uzbekistan'),
(247, 'Vanuatu'),
(248, 'Venezuela'),
(249, 'Viet Nam'),
(250, 'Virgin Islands  British'),
(251, 'Virgin Islands  U.S.'),
(252, 'Wallis And Futuna'),
(253, 'Western Sahara'),
(254, 'Yemen'),
(255, 'Zambia'),
(256, 'Zimbabwe\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gw_country`
--
ALTER TABLE `gw_country`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `gw_country`
--
ALTER TABLE `gw_country`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=257;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
