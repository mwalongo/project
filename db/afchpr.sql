-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 09, 2019 at 07:38 AM
-- Server version: 5.6.30-1
-- PHP Version: 5.6.26-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `afchpr`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `birthdate` date NOT NULL,
  `nationality` varchar(200) NOT NULL,
  `placeOfBirth` varchar(200) NOT NULL,
  `district` varchar(200) NOT NULL,
  `dialing` varchar(10) NOT NULL,
  `pdone` varchar(50) NOT NULL,
  `cdone` varchar(50) NOT NULL,
  `cadone` varchar(50) NOT NULL,
  `vdone` varchar(50) NOT NULL,
  `ddone` varchar(50) NOT NULL,
  `telephone_no` varchar(200) NOT NULL,
  `fax_no` varchar(200) NOT NULL,
  `other_email` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `ladone` varchar(200) NOT NULL,
  `decname` varchar(200) NOT NULL,
  `international_law` varchar(200) NOT NULL,
  `international_human_law` varchar(200) NOT NULL,
  `other_law` varchar(200) NOT NULL,
  `cases` varchar(200) NOT NULL,
  `caseDetails` varchar(200) NOT NULL,
  `arabic` varchar(200) NOT NULL,
  `arabic_working_language` varchar(200) NOT NULL,
  `french` varchar(200) NOT NULL,
  `french_working_language` varchar(200) NOT NULL,
  `english` varchar(200) NOT NULL,
  `english_working_language` varchar(200) NOT NULL,
  `portuguese` varchar(200) NOT NULL,
  `portuguese_working_language` varchar(200) NOT NULL,
  `common_law_system` varchar(200) NOT NULL,
  `civil_law_system` varchar(200) NOT NULL,
  `any_other_system` varchar(200) NOT NULL,
  `commonsystemDetails` varchar(200) NOT NULL,
  `civilsystemDetails` varchar(200) NOT NULL,
  `anyothersystemDetails` varchar(200) NOT NULL,
  `declaration` varchar(200) NOT NULL,
  `experience` varchar(20) NOT NULL,
  `approve` varchar(20) NOT NULL,
  `attachedcertificatelaw` varchar(20) NOT NULL,
  `attachedcertificateawarded` varchar(20) NOT NULL,
  `attachedcertificateprofessional` varchar(20) NOT NULL,
  `attachedothercertificate` varchar(20) NOT NULL,
  `letterfilename` varchar(200) NOT NULL,
  `barfilename` varchar(200) NOT NULL,
  `lawfilename` varchar(200) NOT NULL,
  `awardedfilename` varchar(200) NOT NULL,
  `professionalfilename` varchar(200) NOT NULL,
  `otherfilename` varchar(200) NOT NULL,
  `Bar_Association_Details` varchar(200) NOT NULL,
  `defaults` varchar(50) NOT NULL,
  `created` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `email`, `full_name`, `title`, `birthdate`, `nationality`, `placeOfBirth`, `district`, `dialing`, `pdone`, `cdone`, `cadone`, `vdone`, `ddone`, `telephone_no`, `fax_no`, `other_email`, `address`, `ladone`, `decname`, `international_law`, `international_human_law`, `other_law`, `cases`, `caseDetails`, `arabic`, `arabic_working_language`, `french`, `french_working_language`, `english`, `english_working_language`, `portuguese`, `portuguese_working_language`, `common_law_system`, `civil_law_system`, `any_other_system`, `commonsystemDetails`, `civilsystemDetails`, `anyothersystemDetails`, `declaration`, `experience`, `approve`, `attachedcertificatelaw`, `attachedcertificateawarded`, `attachedcertificateprofessional`, `attachedothercertificate`, `letterfilename`, `barfilename`, `lawfilename`, `awardedfilename`, `professionalfilename`, `otherfilename`, `Bar_Association_Details`, `defaults`, `created`, `updated_at`) VALUES
(1, 'nolascomwalongo@gmail.com', 'Nolasco Mwalongo B', 'IT intern', '1992-08-28', 'Tanzania', 'Njombe', 'non', '255', '1', '1', '1', '1', '1', '+255763999898', '255745782136', 'alex2@mwalongo.com', 'P.O.BOX 9834 Makambako', '1', 'Nolasco Mwalongo', '', '', '', 'Yes', '  try me', 'Mother Tongue /Excellent', 'No', 'Mother Tongue /Excellent', 'Yes', 'Mother Tongue /Excellent', 'No', 'Very Good', 'No', 'YES', 'No', 'YES', ' My Details 1  weeww ', '', '   fgfgfgfgfgdiuuiyiyo', '1', '8', 'Notapproved', '', '', '', '', '', '', '', '', '', '', '', '', '2018-10-01', '2019-02-08'),
(2, 'petromwalongo@gmail.com', 'Petro Mwalongo', 'Lemons Farmer', '2018-10-09', ' Tanzania ', 'Njombe', 'Njombe', '', '1', '1', '', '', '', '255789087984', '255789087984', '', '255789087984\r\nnjombe', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2018-10-06 19:48:08', '2018-10-06 19:48:08', '', '0000-00-00', '2019-01-22'),
(4, 'maiko@gmail.com', 'maiko peter', 'farmer', '2002-07-08', 'Albania ', 'arusha', 'karatu', '+355', '', '', '', '', '', '763999898', '636363636', '', 'urywio;r uisdfjsdo', '', '', '', '', '', 'YES', 'AfCHPR on june 24', 'Mother Tongue /Excellent', 'No', 'Very Good', 'Yes', 'Mother Tongue /Excellent', 'No', 'Very Good', 'Yes', 'No', 'No', 'Theory Only', '', '', '', '1', '15', 'Notapproved', '', '', '', '', '', '', '', '', '', '2018-10-11 18:09:25', '2018-10-11 18:09:25', '', '0000-00-00', '2019-01-09'),
(6, 'nolasco.mwalongo@yahoo.com', 'petro mwalongo', 'Farmer', '2019-01-09', ' Algeria', 'wew', 'qqqqhjhj', '213', '1', '1', '1', '1', '', '4444444444444', '', '', '2222223333', '', '', '', '', '', 'No', '', 'Mother Tongue /Excellent', 'No', 'Mother Tongue /Excellent', 'No', 'Mother Tongue /Excellent', 'No', 'Very Good', 'Yes', 'YES', 'No', 'No', ' wwewewewew', '', '', '', '05', '', '', '', '', '', '', '', '', '', '', '', '', '', '2019-01-15', '2019-01-15');

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` int(11) NOT NULL,
  `letterfilename` varchar(200) NOT NULL,
  `barfilename` varchar(200) NOT NULL,
  `lawfilename` varchar(200) NOT NULL,
  `awardedfilename` varchar(200) NOT NULL,
  `professionalfilename` varchar(200) NOT NULL,
  `otherfilename` varchar(200) NOT NULL,
  `Bar_Association_Details` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`id`, `letterfilename`, `barfilename`, `lawfilename`, `awardedfilename`, `professionalfilename`, `otherfilename`, `Bar_Association_Details`, `email`, `created_at`, `updated_at`) VALUES
(1, '5bbf410e941e48.24313205.pdf', '5bbf410e946192.12072292.pdf', '5bbf410e9491e5.28900821.pdf', '5bbf410e94bc92.19679924.pdf', '5bbf410e94e914.72523901.pdf', '5bbf410e9515d2.58241855.pdf', '', 'hajisasa@gmail.com', '2018-10-11', '2018-10-11'),
(2, '5bbf68bfa801a9.86044627.pdf', '5bbf68bfa844d5.82364696.pdf', '5bbf68bfa876b4.01310281.pdf', '5bbf68bfa8aba0.85791636.pdf', '5bbf68bfa8db01.05810397.pdf', '5bbf68bfa907d4.09927427.pdf', '', 'maiko@gmail.com', '2018-10-11', '2018-10-11'),
(3, '5bc5e04d6fc7d3.04760086.pdf', '5bc5e04d850a67.83522191.pdf', '5bc5e04d8d0e83.76162850.pdf', '5bc5e04d8d69a3.71065393.pdf', '5bc5e04d8dcfd7.33801686.pdf', '5bc5e04d8e6517.06625154.pdf', '', 'nolascomwalongo@gmail.com', '2018-10-16', '2018-10-16'),
(4, '5c3dd7b982d3a7.27416380.pdf', '5c3dd7b989cf18.28189029.pdf', '5c3dd7b989f836.40766927.pdf', '5c3dd7b98cffe8.35260399.pdf', '5c3dd7b98d37c3.21284518.pdf', '5c3dd7b98d6404.87465900.pdf', '', 'nolasco.mwalongo@yahoo.com', '2019-01-15', '2019-01-15');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `Counry_Name` varchar(33) DEFAULT NULL,
  `Capital_city` varchar(12) DEFAULT NULL,
  `Calling_Code` varchar(3) DEFAULT NULL,
  `Currency_name` varchar(23) DEFAULT NULL,
  `currency_cone` varchar(8) DEFAULT NULL,
  `Independence _Day` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `Counry_Name`, `Capital_city`, `Calling_Code`, `Currency_name`, `currency_cone`, `Independence _Day`) VALUES
(2, ' Algeria', 'Algiers', '213', 'Algerian Dinar ', '    DZD', '5-Jul-62'),
(3, ' Angola', 'Luanda', '244', 'Kwanza ', 'AOA', '11-Nov-75'),
(4, ' Benin', 'Porto-Novo', '229', 'CFA franc ', 'XOF', 'Aug 01, 960'),
(5, ' Botswana', 'Gaborone', '267', 'Pula ', 'BWP', 'Sept 30,1966'),
(6, ' Burundi', 'Bujumbura', '257', 'Burundi franc ', '  BIF', 'July 01,1962'),
(7, ' Cameroon', 'Yaounde', '237', 'CFA franc ', 'XAF', '1-Jan-60'),
(8, ' Cape Verde', 'Praia', '238', 'Cape verdean escudo ', 'CVE', '5-Jul-75'),
(9, 'Central African Republic ', 'Bangui', '236', 'CFA franc  ', 'XAF', '13-Aug-60'),
(10, ' Chad', 'N\'Djamena', '235', 'CFA franc ', 'XAF', 'Aug 11,1960'),
(11, ' Comoros', 'Moroni', '269', 'franc ', 'KMF', '6-Jul-75'),
(12, ' Congo', 'Brazzaville', '242', 'franc', 'CFA', '15-Aug-60'),
(13, ' Cote d\'Ivoire', 'Yamoussoukro', '225', 'franc ', 'XOF', ' Aug07, 1960'),
(14, ' Republic of Congo', 'Kinshasa', '243', 'Congolese franc ', 'CDF', '30-Jun-60'),
(16, ' Djibouti', 'Djibouti', '253', 'Franc ', 'DJF', ''),
(18, '  Egypt', 'Cairo', '20', 'Egyptian pound ', 'EGP', '28-Feb-22'),
(19, ' Equatorial Guinea', 'Malabo', '240', 'franc', 'CFA', '12-Oct-68'),
(20, ' Eritrea', 'Asmara', '291', 'Nakfa ', 'ERN', '24-May-93'),
(22, ' Eswatini', 'Lobamba', '268', 'Lilangeni', 'SZL', 'Sept 06,1968 '),
(23, ' Ethiopia', 'Addis Ababa', '251', 'Birr', 'Birr', ''),
(24, 'Gabonese Republic', 'Libreville', '241', 'franc', 'CFA', '17-Aug-60'),
(25, ' Gambia', 'Banjul', '220', 'Dalasi ', 'GMD', '18-Feb-65'),
(26, ' Ghana', 'Accra', '233', 'Ghanaian cedi', 'GHC', '6-Mar-57'),
(27, ' Guinea', 'Conakry', '224', 'Guinean franc ', 'GNF', '2-Oct-58'),
(28, ' Guinea-Bissau', 'Bissau', '245', 'CFA franc ', 'XOF', 'Sept 24,1973'),
(30, ' Kenya', 'Nairobi', '254', 'Kenyan shilling     ', 'KES', '12-Dec-63'),
(31, ' Lesotho', 'Maseru', '266', 'Loti ', 'LSL', '4-Oct-66'),
(33, ' Liberia', 'Monrovia', '231', 'Liberian Dollar', 'LRD', 'July 26, 1847'),
(34, 'Libya', 'Tripoli', '218', 'Lybian Dinar', 'LYD', '24-Dec-51'),
(35, ' Madagascar', 'Antananarivo', '261', 'Malagasy ariay', 'MGA', '26-Jun-60'),
(36, ' Malawi', 'Lilongwe', '265', 'Kwacha(D)', 'MWK', '6-Jul-64'),
(37, ' Mali', 'Bamako', '223', 'CFA franc ', 'XOF', 'Sept 22,1960'),
(38, ' Mauritania', 'Nouakchott', '222', 'Mauritanian Ouguiya  ', 'MRO', '28-Nov-60'),
(39, ' Mauritius', 'Port Louis', '230', 'Mauritian rupee ', 'MUR', '12-Mar-68'),
(40, ' Morocco', 'Rabat', '212', 'Moroccan Dirham', 'Dirham', '7-Apr-56'),
(41, 'Mozambique ', 'Maputo', '258', 'Mozambican metical  ', 'Mtn/ MZN', '25-Jun-75'),
(42, ' Namibia', 'Windhoek', '264', 'Namibian dollar', 'NAD', '21-Mar-90'),
(43, ' Niger ', 'Niamey', '227', 'CFA franc ', 'XOF', '3-Aug-60'),
(44, ' Nigeria', 'Abuja', '234', 'Nigerian naira and Kobo', 'NGN', '1-Oct-60'),
(45, ' Rwanda', 'Kigali', '250', 'Rwandan franc', 'RWF', '1-Jul-62'),
(46, 'Saharawi Arab Democratic Republic', 'Aauin', '', 'saharawi?', 'pesetas', '27-Feb-76'),
(47, ' sao Tome and Principe', 'Sao Tome', '239', 'Dobra', 'STD', '12-Jul-75'),
(48, ' Senegal', 'Dakar', '221', 'CFA franc', 'XOF', '20-Jun-60'),
(49, ' Seychelles', 'Victoria', '248', 'Seychellois rupee', 'SCR', '29-Jun-76'),
(50, ' Sierra Leone', 'Freetown', '232', 'Leone ', 'SLL', '27-Apr-61'),
(51, 'Somali  ', 'Mogadishu', '252', 'Somali shilling ', 'SOS', '1-Jul-60'),
(52, ' South AfricaPretoria ', 'CapeTown ', '27', 'South African rand ', 'ZAR', '27-Apr-94'),
(53, ' South Sudan', 'Juba', '211', 'South Sudanese Pound', 'Pound', '9-Jul-11'),
(54, ' Sudan', 'Khartoum', '249', 'Sudanese pound (,)', 'SDG/ SDD', '1-Jan-56'),
(55, 'Tanzania', 'Dodoma', '255', 'Tanzanian shilling ', 'TZS', '9-Dec-61'),
(56, 'Togolese ', 'Lome`', '228', 'franc ', 'CFA/ XOF', '27-Apr-60'),
(57, ' Uganda', 'Kampala', '256', 'Ugandan shilling ', 'UGX', '9-Oct-62'),
(58, ' Zambia', 'Lusaka', '260', 'Zambian Kwacha', 'ZMK', '24-Oct-64'),
(59, 'Zimbabwe', 'Harare', '263', 'Zimbabwe Dollars', 'ZWD', '18-Apr-80');

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `law` varchar(200) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `summary` varchar(200) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`id`, `email`, `law`, `from_date`, `to_date`, `summary`, `created_at`, `updated_at`) VALUES
(4, 'nolascomwalongo@gmail.com', 'Human Right Law', '2001-01-09', '2002-01-15', 'Regional Court ', '2018-10-01', '2018-10-01'),
(5, 'nolascomwalongo@gmail.com', 'Criminal Law', '2003-01-14', '2004-01-05', 'East African court', '2018-10-01', '2018-10-01'),
(7, 'nolascomwalongo@gmail.com', 'Other Law', '2016-06-15', '2017-07-20', 'East African court ', '2018-10-03', '2018-10-03'),
(8, 'trudysanin@gmail.com', 'Criminal Law', '2008-01-08', '2010-02-02', 'tytytyty', '2018-10-05', '2018-10-05'),
(9, 'trudysanin@gmail.com', 'Internation Human Law', '2015-01-16', '2018-10-05', 'hkhkhkhkhjkgtj', '2018-10-05', '2018-10-05'),
(10, 'hajisasa@gmail.com', 'Internation Law', '2008-01-30', '2018-01-17', 'Kisutu Referral Court', '2018-10-11', '2018-10-11'),
(11, 'maiko@gmail.com', 'Criminal Law', '2003-10-11', '2018-10-11', 'retrwetertyyr', '2018-10-11', '2018-10-11'),
(12, 'nolasco.mwalongo@yahoo.com', 'Criminal Law', '2013-10-29', '2019-01-12', 'weewewewewe', '2019-01-15', '2019-01-15'),
(16, 'nolascomwalongo@gmail.com', 'Internation Human Law', '2009-01-05', '2014-01-13', 'Tries your best', '2019-02-07', '2019-02-07');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `status_admin` varchar(50) NOT NULL,
  `profile` varchar(200) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`id`, `email`, `password`, `type`, `status`, `status_admin`, `profile`, `created_at`, `updated_at`) VALUES
(30, 'petromwalongo@gmail.com', 'c3310e0c82d4b16cf4a34d87afd38210', 'admin', 'Active', 'Active', '5bf644d902d071.83951712.png', '2018-09-13', '2018-11-22'),
(33, 'trudysanin@gmail.com', '2bacccf1d1135e2411610009cb5e6d9b', 'customer', 'Active', 'Active', 'profile.png', '2018-10-05', '2018-10-05'),
(36, 'maiko@gmail.com', '202cb962ac59075b964b07152d234b70', 'customer', 'Inactive', 'Active', 'profile.png', '2018-10-11', '2018-10-11'),
(46, 'uniquependo1@gmail.com', '1bbd886460827015e5d605ed44252251', 'customer', 'Inactive', 'Active', 'profile.png', '2018-12-05', '2018-12-05'),
(49, 'nolascomwalongo@gmail.com', 'c3310e0c82d4b16cf4a34d87afd38210', 'customer', 'Active', 'Active', '5c5a8cf75d84f5.21183348.jpg', '2019-01-15', '2019-02-06'),
(52, 'nolasco.mwalongo@yahoo.com', '1bbd886460827015e5d605ed44252251', 'customer', 'Active', 'Active', 'profile.png', '2019-02-05', '2019-02-05'),
(53, 'legalc2019@gmail.com', '94b8cea57c49a3007225a0c70c475450', 'customer', 'Active', 'Active', 'profile.png', '2019-02-06', '2019-02-06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `userlogin`
--
ALTER TABLE `userlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
