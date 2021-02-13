-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2020 at 08:13 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `best_organization`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_comment`
--

CREATE TABLE `blog_comment` (
  `Comment_id` int(11) NOT NULL,
  `Blog_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `User_name` text NOT NULL,
  `Comment_text` text NOT NULL,
  `Hr_id` int(11) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_comment`
--

INSERT INTO `blog_comment` (`Comment_id`, `Blog_id`, `User_id`, `User_name`, `Comment_text`, `Hr_id`, `Date`) VALUES
(2, 8, 6, '', 'good post', 0, '2020-11-29 11:47:30'),
(3, 8, 6, ' arif', 'It is my second comment', 0, '2020-11-29 12:05:07');

-- --------------------------------------------------------

--
-- Table structure for table `blog_pending_post`
--

CREATE TABLE `blog_pending_post` (
  `Blog_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `HR_name` text NOT NULL,
  `HR_Org_name` text NOT NULL,
  `Blog_category` varchar(255) NOT NULL,
  `Blog_title` text NOT NULL,
  `Blog_text` longtext NOT NULL,
  `Blog_img` text DEFAULT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_pending_post`
--

INSERT INTO `blog_pending_post` (`Blog_id`, `User_id`, `HR_name`, `HR_Org_name`, `Blog_category`, `Blog_title`, `Blog_text`, `Blog_img`, `Date`) VALUES
(2, 0, 'ruhul', 'square', 'Medical/Pharma', 'Bosundhora company', '<p>afgasjmbvdnbfkjghFB&nbsp;</p>\r\n', 'blog_img/Poster by (170103020046).pptx', '2020-11-17 14:56:51'),
(3, 7, 'ruhul', 'square', 'Education', 'Bosundhora company', '<p>In academic terms, a text is anything that conveys a set of meanings to the person who examines it. You might have thought that texts were limited to written materials, such as books, magazines, newspapers, and &#39;zines (an informal term for magazine that refers especially to fanzines and webzines).</p>\r\n', 'blog_img/download.jpg', '2020-11-24 07:00:43');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Category_id` int(11) NOT NULL,
  `Category_name` text NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Category_id`, `Category_name`, `Date`) VALUES
(8, '    Accounting/Finance', '2020-12-14 15:37:09');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Employee_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Org_id` int(11) NOT NULL,
  `Employee_description` text NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hr`
--

CREATE TABLE `hr` (
  `Hr_id` int(11) NOT NULL,
  `HR_name` varchar(255) NOT NULL,
  `Hr_email` varchar(255) NOT NULL,
  `Hr_password` varchar(255) NOT NULL,
  `Hr_organization_name` int(11) NOT NULL,
  `Hr_designation` text NOT NULL,
  `working_period` text DEFAULT NULL,
  `Hr_image` text DEFAULT NULL,
  `Edited_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hr_blog_post`
--

CREATE TABLE `hr_blog_post` (
  `Blog_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `HR_name` text NOT NULL,
  `HR_Org_name` text NOT NULL,
  `Blog_category` varchar(255) NOT NULL,
  `Blog_title` text NOT NULL,
  `Blog_text` longtext NOT NULL,
  `Blog_img` text NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hr_blog_post`
--

INSERT INTO `hr_blog_post` (`Blog_id`, `User_id`, `HR_name`, `HR_Org_name`, `Blog_category`, `Blog_title`, `Blog_text`, `Blog_img`, `Date`) VALUES
(8, 0, 'ruhul', 'square', 'Commercial', 'Bosundhora company', ' Bashundhara Group[1] (Bengali: বসুন্ধরা গ্রুপ) is one of the largest industrial conglomerates of Bangladesh.[2] It began in 1987[3] as a real estate company venture under the name East West Property Development Ltd (EWPD). The first project of EWPD turned out to be very successful. After then, the company grew very quickly. It presently owns more than 20 major concerns located throughout Bangladesh.', 'blog_img/bosundara.jpg', '2020-10-31 13:15:05'),
(10, 0, 'ruhul', 'square', 'faltu1', 'faltu', 'faltu2', 'blog_img/bosundara.jpg', '2020-12-15 04:29:35'),
(11, 0, 'sadath parv', 'square', 'Accounting', 'arif', '<p>abcds</p>\r\n', 'blog_img/bosundara.jpg', '2020-12-15 17:17:25'),
(12, 0, 'sadath parv', 'square', 'Accounting', 'abcd', '<p>abcds</p>\r\n', 'blog_img/pran.jpg', '2020-10-31 16:14:29'),
(13, 0, 'sadath parv', 'square', 'Accounting', 'abcd', '<p>abcd</p>\r\n', 'blog_img/sunaly bank.jpg', '2020-10-31 16:17:06'),
(14, 0, 'sadath parv', 'square', 'Accounting', 'abcd', '<p>abcd</p>\r\n', 'blog_img/sunaly bank.jpg', '2020-10-31 16:18:43'),
(15, 0, 'sadath parv', 'square', 'Commercial', 'amar last post', '<p>abcdersss</p>\r\n', 'blog_img/square .jpg', '2020-10-31 16:21:06'),
(16, 0, 'sadath parv', 'square', 'Media', 'addsghBDDFB', '<p>ADFAABSDBN VSJDNJKHWERBFNRBWG</p>\r\n', 'blog_img/walton.jpg', '2020-10-31 16:44:40');

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `Org_id` int(11) NOT NULL,
  `Org_name` text NOT NULL,
  `Org_category` text NOT NULL,
  `Org_description` longtext NOT NULL,
  `Org_image` text NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`Org_id`, `Org_name`, `Org_category`, `Org_description`, `Org_image`, `Date`) VALUES
(1, 'Bashundhara Group', 'Accounting/Finance', ' ashundhara Group[1] (Bengali: বসুন্ধরা গ্রুপ) is one of the largest industrial conglomerates of Bangladesh.[2] It began in 1987[3] as a real estate company venture under the name East West Property Development Ltd (EWPD). The first project of EWPD turned out to be very successful. After then, the company grew very quickly. It presently owns more than 20 major concerns located throughout Bangladesh. Bashundhara Group (founded by Ahmed Akbar Sobhan and present Chairman[4]) began in 1987 as real estate venture. Shafiat Sobhan Sanvir is the Vice Chairman of Bashundhara Group.[5] After its first successful project, Bashundhara invested in new fields, including manufacturing, industry and trading. More enterprises were established in the early 1990s; these included cement, paper, pulp, tissue paper and steel production, as well as LP Gas bottling and distribution. On 4 February 2014, The Bangladesh Supreme Court ordered Bashundhara Group officials to surrender before', 'blog_img/bosundara.jpg', '2020-11-26'),
(2, 'Pran RFL Group', 'Education', '<p> ashundhara Group[1] (Bengali: বসুন্ধরা গ্রুপ) is one of the largest industrial conglomerates of Bangladesh.[2] It began in 1987[3] as a real estate company venture under the name East West Property Development Ltd (EWPD). The first project of EWPD turned out to be very successful. After then, the company grew very quickly. It presently owns more than 20 major concerns located throughout Bangladesh. Bashundhara Group (founded by Ahmed Akbar Sobhan and present Chairman[4]) began in 1987 as real estate venture. Shafiat Sobhan Sanvir is the Vice Chairman of Bashundhara Group.[5] After its first successful project, Bashundhara invested in new fields, including manufacturing, industry and trading. More enterprises were established in the early 1990s; these included cement, paper, pulp, tissue paper and steel production, as well as LP Gas bottling and distribution. On 4 February 2014, The Bangladesh Supreme Court ordered Bashundhara Group officials to surrender before</p>\r\n', 'blog_img/bosundara.jpg', '2020-12-13'),
(3, 'Pran RFL Group', '    Accounting/Finance', '<p>PRAN (Programme for Rural Advancement Nationally)<a href=\"https://en.wikipedia.org/wiki/PRAN-RFL_Group#cite_note-4\">[4]</a>&nbsp;was established in 1981 by retired Major General&nbsp;<a href=\"https://en.wikipedia.org/wiki/Amjad_Khan_Chowdhury\">Amjad Khan Chowdhury</a>&nbsp;and has become one of the largest food and beverage brands in Bangladesh.<a href=\"https://en.wikipedia.org/wiki/PRAN-RFL_Group#cite_note-5\">[5]</a><a href=\"https://en.wikipedia.org/wiki/PRAN-RFL_Group#cite_note-6\">[6]</a>&nbsp;PRAN pioneered agribusiness in Bangladesh by providing farmers with guaranteed prices.<a href=\"https://en.wikipedia.org/wiki/PRAN-RFL_Group#cite_note-:3-7\">[7]</a>&nbsp;PRAN Foods, a subsidiary of the PRAN-RFL Group,<a href=\"https://en.wikipedia.org/wiki/PRAN-RFL_Group#cite_note-8\">[8]</a>&nbsp;produces a number of agricultural products under the PRAN banner. PRAN established a subsidiary company in&nbsp;<a href=\"https://en.wikipedia.org/wiki/United_Arab_Emirates\">UAE</a>&nbsp;in 2003.<a href=\"https://en.wikipedia.org/wiki/PRAN-RFL_Group#cite_note-9\">[9]</a>&nbsp;In 2008, the company announced plans to open a production facility in&nbsp;<a href=\"https://en.wikipedia.org/wiki/Tripura\">Tripura</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/India\">India</a>, after the Indian government lifted the ban on direct investment from Bangladesh in 2007.<a href=\"https://en.wikipedia.org/wiki/PRAN-RFL_Group#cite_note-:0-1\">[1]</a>&nbsp;The PRAN group&#39;s exports had reached 10&nbsp;billion&nbsp;<a href=\"https://en.wikipedia.org/wiki/Taka\">taka</a>&nbsp;by 2016, with the biggest markets for the company in India,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Saudi_Arabia\">Saudi Arabia</a>, the UAE,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Malaysia\">Malaysia</a>, and&nbsp;<a href=\"https://en.wikipedia.org/wiki/Oman\">Oman</a>.<a href=\"https://en.wikipedia.org/wiki/PRAN-RFL_Group#cite_note-:2-10\">[10]</a>&nbsp;The same year the revenue for PRAN exceeded US$500 million.<a href=\"https://en.wikipedia.org/wiki/PRAN-RFL_Group#cite_note-11\">[11]</a>&nbsp;PRAN started exporting potatoes in March 2016.<a href=\"https://en.wikipedia.org/wiki/PRAN-RFL_Group#cite_note-12\">[12]</a>&nbsp;In April 2016, PRAN started to export&nbsp;<a href=\"https://en.wikipedia.org/wiki/Cassava\">cassava</a>&nbsp;and the first shipment, worth US$3 million, was sent to New Zealand.<a href=\"https://en.wikipedia.org/wiki/PRAN-RFL_Group#cite_note-:4-13\">[13]</a>&nbsp;PRAN has 80 thousand direct employees and 200 thousand indirect employees.<a href=\"https://en.wikipedia.org/wiki/PRAN-RFL_Group#cite_note-14\">[14]</a>&nbsp;PRAN exports to over 118 different countries.<a href=\"https://en.wikipedia.org/wiki/PRAN-RFL_Group#cite_note-15\">[15]</a></p>\r\n', 'blog_img/PRAN-RFL_GROUP.png', '2020-12-16'),
(4, 'Pran RFL Group', '    Accounting/Finance', '<p>PRAN (Programme for Rural Advancement Nationally)<a href=\"https://en.wikipedia.org/wiki/PRAN-RFL_Group#cite_note-4\">[4]</a>&nbsp;was established in 1981 by retired Major General&nbsp;<a href=\"https://en.wikipedia.org/wiki/Amjad_Khan_Chowdhury\">Amjad Khan Chowdhury</a>&nbsp;and has become one of the largest food and beverage brands in Bangladesh.<a href=\"https://en.wikipedia.org/wiki/PRAN-RFL_Group#cite_note-5\">[5]</a><a href=\"https://en.wikipedia.org/wiki/PRAN-RFL_Group#cite_note-6\">[6]</a>&nbsp;PRAN pioneered agribusiness in Bangladesh by providing farmers with guaranteed prices.<a href=\"https://en.wikipedia.org/wiki/PRAN-RFL_Group#cite_note-:3-7\">[7]</a>&nbsp;PRAN Foods, a subsidiary of the PRAN-RFL Group,<a href=\"https://en.wikipedia.org/wiki/PRAN-RFL_Group#cite_note-8\">[8]</a>&nbsp;produces a number of agricultural products under the PRAN banner. PRAN established a subsidiary company in&nbsp;<a href=\"https://en.wikipedia.org/wiki/United_Arab_Emirates\">UAE</a>&nbsp;in 2003.<a href=\"https://en.wikipedia.org/wiki/PRAN-RFL_Group#cite_note-9\">[9]</a>&nbsp;In 2008, the company announced plans to open a production facility in&nbsp;<a href=\"https://en.wikipedia.org/wiki/Tripura\">Tripura</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/India\">India</a>, after the Indian government lifted the ban on direct investment from Bangladesh in 2007.<a href=\"https://en.wikipedia.org/wiki/PRAN-RFL_Group#cite_note-:0-1\">[1]</a>&nbsp;The PRAN group&#39;s exports had reached 10&nbsp;billion&nbsp;<a href=\"https://en.wikipedia.org/wiki/Taka\">taka</a>&nbsp;by 2016, with the biggest markets for the company in India,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Saudi_Arabia\">Saudi Arabia</a>, the UAE,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Malaysia\">Malaysia</a>, and&nbsp;<a href=\"https://en.wikipedia.org/wiki/Oman\">Oman</a>.<a href=\"https://en.wikipedia.org/wiki/PRAN-RFL_Group#cite_note-:2-10\">[10]</a>&nbsp;The same year the revenue for PRAN exceeded US$500 million.<a href=\"https://en.wikipedia.org/wiki/PRAN-RFL_Group#cite_note-11\">[11]</a>&nbsp;PRAN started exporting potatoes in March 2016.<a href=\"https://en.wikipedia.org/wiki/PRAN-RFL_Group#cite_note-12\">[12]</a>&nbsp;In April 2016, PRAN started to export&nbsp;<a href=\"https://en.wikipedia.org/wiki/Cassava\">cassava</a>&nbsp;and the first shipment, worth US$3 million, was sent to New Zealand.<a href=\"https://en.wikipedia.org/wiki/PRAN-RFL_Group#cite_note-:4-13\">[13]</a>&nbsp;PRAN has 80 thousand direct employees and 200 thousand indirect employees.<a href=\"https://en.wikipedia.org/wiki/PRAN-RFL_Group#cite_note-14\">[14]</a>&nbsp;PRAN exports to over 118 different countries.<a href=\"https://en.wikipedia.org/wiki/PRAN-RFL_Group#cite_note-15\">[15]</a></p>\r\n', 'blog_img/download.jpg', '2020-12-16'),
(5, 'Pran RFL Group', '    Accounting/Finance', '<p>PRAN (Programme for Rural Advancement Nationally)<a href=\"https://en.wikipedia.org/wiki/PRAN-RFL_Group#cite_note-4\">[4]</a>&nbsp;was established in 1981 by retired Major General&nbsp;<a href=\"https://en.wikipedia.org/wiki/Amjad_Khan_Chowdhury\">Amjad Khan Chowdhury</a>&nbsp;and has become one of the largest food and beverage brands in Bangladesh.<a href=\"https://en.wikipedia.org/wiki/PRAN-RFL_Group#cite_note-5\">[5]</a><a href=\"https://en.wikipedia.org/wiki/PRAN-RFL_Group#cite_note-6\">[6]</a>&nbsp;PRAN pioneered agribusiness in Bangladesh by providing farmers with guaranteed prices.<a href=\"https://en.wikipedia.org/wiki/PRAN-RFL_Group#cite_note-:3-7\">[7]</a>&nbsp;PRAN Foods, a subsidiary of the PRAN-RFL Group,<a href=\"https://en.wikipedia.org/wiki/PRAN-RFL_Group#cite_note-8\">[8]</a>&nbsp;produces a number of agricultural products under the PRAN banner. PRAN established a subsidiary company in&nbsp;<a href=\"https://en.wikipedia.org/wiki/United_Arab_Emirates\">UAE</a>&nbsp;in 2003.<a href=\"https://en.wikipedia.org/wiki/PRAN-RFL_Group#cite_note-9\">[9]</a>&nbsp;In 2008, the company announced plans to open a production facility in&nbsp;<a href=\"https://en.wikipedia.org/wiki/Tripura\">Tripura</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/India\">India</a>, after the Indian government lifted the ban on direct investment from Bangladesh in 2007.<a href=\"https://en.wikipedia.org/wiki/PRAN-RFL_Group#cite_note-:0-1\">[1]</a>&nbsp;The PRAN group&#39;s exports had reached 10&nbsp;billion&nbsp;<a href=\"https://en.wikipedia.org/wiki/Taka\">taka</a>&nbsp;by 2016, with the biggest markets for the company in India,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Saudi_Arabia\">Saudi Arabia</a>, the UAE,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Malaysia\">Malaysia</a>, and&nbsp;<a href=\"https://en.wikipedia.org/wiki/Oman\">Oman</a>.<a href=\"https://en.wikipedia.org/wiki/PRAN-RFL_Group#cite_note-:2-10\">[10]</a>&nbsp;The same year the revenue for PRAN exceeded US$500 million.<a href=\"https://en.wikipedia.org/wiki/PRAN-RFL_Group#cite_note-11\">[11]</a>&nbsp;PRAN started exporting potatoes in March 2016.<a href=\"https://en.wikipedia.org/wiki/PRAN-RFL_Group#cite_note-12\">[12]</a>&nbsp;In April 2016, PRAN started to export&nbsp;<a href=\"https://en.wikipedia.org/wiki/Cassava\">cassava</a>&nbsp;and the first shipment, worth US$3 million, was sent to New Zealand.<a href=\"https://en.wikipedia.org/wiki/PRAN-RFL_Group#cite_note-:4-13\">[13]</a>&nbsp;PRAN has 80 thousand direct employees and 200 thousand indirect employees.<a href=\"https://en.wikipedia.org/wiki/PRAN-RFL_Group#cite_note-14\">[14]</a>&nbsp;PRAN exports to over 118 different countries.<a href=\"https://en.wikipedia.org/wiki/PRAN-RFL_Group#cite_note-15\">[15]</a></p>\r\n', 'blog_img/download1.jpg', '2020-12-16');

-- --------------------------------------------------------

--
-- Table structure for table `organization_comment`
--

CREATE TABLE `organization_comment` (
  `Comment_id` int(11) NOT NULL,
  `Org_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `User_name` text NOT NULL,
  `Comment_text` varchar(255) NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `organization_request`
--

CREATE TABLE `organization_request` (
  `Org_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Org_link` text NOT NULL,
  `Org_name` text NOT NULL,
  `Org_description` text NOT NULL,
  `Org_category` text NOT NULL,
  `Org_logo` text NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `Rating_id` int(11) NOT NULL,
  `Org_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `User_name` text NOT NULL,
  `Rating_no` int(11) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`Rating_id`, `Org_id`, `User_id`, `User_name`, `Rating_no`, `Date`) VALUES
(21, 0, 0, '', 3, '2020-12-13 19:05:26'),
(22, 0, 0, '', 0, '2020-12-13 19:06:52'),
(23, 0, 0, '', 2, '2020-12-13 19:07:46'),
(24, 0, 0, '', 3, '2020-12-13 19:08:31'),
(25, 0, 0, '', 3, '2020-12-13 19:09:27'),
(26, 0, 0, '', 2, '2020-12-13 19:10:31'),
(28, 0, 0, '', 2, '2020-12-13 19:13:03'),
(29, 0, 0, '', 3, '2020-12-13 19:14:27'),
(30, 0, 0, '', 2, '2020-12-13 19:17:22'),
(31, 0, 0, '', 2, '2020-12-13 19:21:37'),
(32, 0, 0, '', 2, '2020-12-15 16:22:04'),
(33, 0, 0, '', 3, '2020-12-15 16:22:26'),
(34, 0, 0, '', 2, '2020-12-15 16:26:00'),
(35, 0, 0, '', 3, '2020-12-15 16:28:04'),
(36, 0, 0, '', 3, '2020-12-15 16:28:23'),
(37, 0, 0, '', 1, '2020-12-15 16:35:49'),
(38, 0, 0, '', 2, '2020-12-15 16:35:55'),
(39, 0, 0, '', 3, '2020-12-15 16:35:57'),
(40, 1000, 0, '', 2, '2020-12-15 16:43:51'),
(41, 1, 0, '', 1, '2020-12-15 16:46:21'),
(42, 1, 0, '', 2, '2020-12-15 16:46:23'),
(43, 1, 0, '', 4, '2020-12-15 16:50:00'),
(44, 1, 6, '', 3, '2020-12-15 16:52:51');

-- --------------------------------------------------------

--
-- Table structure for table `rating1`
--

CREATE TABLE `rating1` (
  `id` int(11) NOT NULL,
  `php` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating1`
--

INSERT INTO `rating1` (`id`, `php`) VALUES
(5, 5),
(6, 5),
(9, 0),
(8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sign_up`
--

CREATE TABLE `sign_up` (
  `User_id` int(11) NOT NULL,
  `User_name` varchar(11) NOT NULL,
  `User_email` varchar(255) NOT NULL,
  `User_password` varchar(255) NOT NULL,
  `Rule` text NOT NULL,
  `User_information` text DEFAULT NULL,
  `Current_organization_name` text DEFAULT NULL,
  `user_designation` text NOT NULL,
  `Previous_organization_name` text DEFAULT NULL,
  `User_image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sign_up`
--

INSERT INTO `sign_up` (`User_id`, `User_name`, `User_email`, `User_password`, `Rule`, `User_information`, `Current_organization_name`, `user_designation`, `Previous_organization_name`, `User_image`) VALUES
(6, 'arif', 'arifmd630@yahoo.com', '123456', 'General User', NULL, '', '', '', NULL),
(7, 'ruhul', 'ruhul@gmail.com', '123456', 'HumanResourses', NULL, 'dwd', '', '', NULL),
(8, 'asif', 'asif@gmail.com', '12345', 'HumanResourses', NULL, NULL, '', NULL, NULL),
(9, 'asif', 'asif@gmail.com', '123456', 'HumanResourses', NULL, NULL, '', NULL, NULL),
(10, 'sadath', 'sasath@gmail.com', '12345', 'HumanResourses', NULL, NULL, '', NULL, NULL),
(11, 'sadath parv', 'sadatparvez@gmail.com', '12345', 'HumanResourses', NULL, NULL, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_application`
--

CREATE TABLE `user_application` (
  `User_id` int(11) NOT NULL,
  `User_name` varchar(255) NOT NULL,
  `User_email` varchar(255) NOT NULL,
  `User_password` varchar(255) NOT NULL,
  `Rule` text NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_comment`
--
ALTER TABLE `blog_comment`
  ADD PRIMARY KEY (`Comment_id`);

--
-- Indexes for table `blog_pending_post`
--
ALTER TABLE `blog_pending_post`
  ADD PRIMARY KEY (`Blog_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Category_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Employee_id`);

--
-- Indexes for table `hr`
--
ALTER TABLE `hr`
  ADD PRIMARY KEY (`Hr_id`),
  ADD UNIQUE KEY `Hr_id` (`Hr_id`);

--
-- Indexes for table `hr_blog_post`
--
ALTER TABLE `hr_blog_post`
  ADD PRIMARY KEY (`Blog_id`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`Org_id`);

--
-- Indexes for table `organization_comment`
--
ALTER TABLE `organization_comment`
  ADD PRIMARY KEY (`Comment_id`);

--
-- Indexes for table `organization_request`
--
ALTER TABLE `organization_request`
  ADD PRIMARY KEY (`Org_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`Rating_id`);

--
-- Indexes for table `rating1`
--
ALTER TABLE `rating1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sign_up`
--
ALTER TABLE `sign_up`
  ADD PRIMARY KEY (`User_id`);

--
-- Indexes for table `user_application`
--
ALTER TABLE `user_application`
  ADD PRIMARY KEY (`User_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_comment`
--
ALTER TABLE `blog_comment`
  MODIFY `Comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog_pending_post`
--
ALTER TABLE `blog_pending_post`
  MODIFY `Blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `Employee_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hr`
--
ALTER TABLE `hr`
  MODIFY `Hr_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hr_blog_post`
--
ALTER TABLE `hr_blog_post`
  MODIFY `Blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `Org_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `organization_comment`
--
ALTER TABLE `organization_comment`
  MODIFY `Comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `organization_request`
--
ALTER TABLE `organization_request`
  MODIFY `Org_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `Rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `rating1`
--
ALTER TABLE `rating1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sign_up`
--
ALTER TABLE `sign_up`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_application`
--
ALTER TABLE `user_application`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
