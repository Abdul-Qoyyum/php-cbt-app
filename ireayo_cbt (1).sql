-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2019 at 12:50 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ireayo_cbt`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `profile_pix` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `profile_pix`, `email`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Michael', 'uploads/images/profile_pictures/IMG-20180517-WA0000_7.jpg', 'mike@gmail.com', 'devugo', '$2y$10$fhnbPqOBWZS1GoqyJby/8eeaesQYTLniPv1ZJAiEgmgnSDKkx8Toi', '2019-04-09 04:24:44', '2019-04-24 16:59:19');

-- --------------------------------------------------------

--
-- Table structure for table `admin_sessions`
--

CREATE TABLE `admin_sessions` (
  `id` int(50) NOT NULL,
  `admin_id` int(50) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_sessions`
--

INSERT INTO `admin_sessions` (`id`, `admin_id`, `hash`, `created_at`, `updated_at`) VALUES
(1, 1, '$2y$10$jt1MCFw2ij/pcEB2mxxNQOOxEd7HVUU8US/PB9KBOJNjqsq0/gUPm', '2019-04-10 17:32:33', '2019-04-10 17:32:33');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `blocked_on` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `description`, `image`, `blocked_on`, `created_at`, `updated_at`) VALUES
(1, 'Post one', '<p>This is the description of blog post one</p>', 'uploads/images/blog/gig2.jpg', NULL, '2019-04-14 11:22:14', '2019-04-14 12:16:34'),
(2, 'Post Two', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>', 'uploads/images/blog/blog3.jpg', NULL, '0000-00-00 00:00:00', '2019-05-01 22:03:29'),
(3, 'Post Three', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>', 'uploads/images/blog/blog2.jpg', NULL, '0000-00-00 00:00:00', '2019-05-01 22:08:24'),
(4, 'Post Four', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p><p>&nbsp;</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elitLorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>', 'uploads/images/blog/comp_1.jpg', NULL, '2019-05-01 22:10:07', '2019-05-01 22:10:07'),
(5, 'Post Five', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>', 'uploads/images/blog/schoolbills_bg.jpg', NULL, '2019-05-01 22:16:58', '2019-05-01 22:16:58');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` int(50) NOT NULL,
  `level` varchar(255) NOT NULL,
  `blocked_on` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `level`, `blocked_on`, `created_at`, `updated_at`) VALUES
(3, 'jss 3', NULL, '2019-04-12 19:00:29', '2019-05-01 23:01:21'),
(4, 'jss1 ', NULL, '2019-04-12 21:57:12', '2019-04-16 14:48:10'),
(5, 'ss 2', NULL, '2019-04-15 07:19:25', '2019-04-15 07:19:25');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`, `updated_at`) VALUES
(1, 'info@devugo.com', 'ik)tHYBDaPs5<Jr', '2019-05-05 11:02:01', '2019-05-05 11:16:37'),
(2, 'ugonnaezenwankwo@gmail.com', 'xPWAl4tEGTeCwhS', '2019-05-05 11:40:17', '2019-05-05 11:40:17'),
(3, 'ugoezenwankwo@gmail.com', '3EJhsnZbdYCTHqe', '2019-05-05 12:27:04', '2019-05-05 12:27:04');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(50) NOT NULL,
  `level_id` int(50) NOT NULL,
  `subject_id` int(50) NOT NULL,
  `no` int(50) NOT NULL,
  `text` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `a` varchar(255) NOT NULL,
  `b` varchar(255) NOT NULL,
  `c` varchar(255) NOT NULL,
  `d` varchar(255) NOT NULL,
  `correct_answer` varchar(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `level_id`, `subject_id`, `no`, `text`, `image`, `a`, `b`, `c`, `d`, `correct_answer`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 1, '0', '', 'ekefk', 'dffg', 'tyr', 'jdf', 'a', '2019-04-14 21:14:24', '2019-04-14 21:14:24'),
(2, 3, 2, 2, '0', '', 'reghe', 'etrg', 'rgger', 'dfet', 'd', '2019-04-14 21:14:24', '2019-04-14 21:14:24'),
(3, 3, 2, 3, '0', '', 'tryry', 'htju', 'ersvhj', 'utyr', 'd', '2019-04-14 21:14:24', '2019-04-14 21:14:24'),
(4, 3, 2, 4, '0', '', 'grtu', 'es', 'eehe', 'verw', 'c', '2019-04-14 21:14:24', '2019-04-14 21:14:24'),
(7, 3, 2, 5, '<p>tknsll kfa;m</p>', '', 'nkdksaN', 'mlsalm', 'klsllsll', 'oappap', 'C', '2019-04-14 22:39:56', '2019-04-14 22:39:56'),
(8, 3, 2, 7, '<p>knlm lslldlolo</p>', '', 'ckanknk', 'nsllaslmlm', 'llsallfdls', 'mlsdlslml', 'A', '2019-04-14 22:43:00', '2019-04-14 22:43:00'),
(9, 3, 2, 10, '<p>ksdkllldsl</p>', '', 'nknckll', 'cnxknkdvll', 'ldlldmlsmdl', 'lldlmlmal', 'A', '2019-04-14 22:44:43', '2019-04-14 22:44:43'),
(10, 3, 2, 19, '<p>sdklslslmlsls</p>', '', 'bdskj o', 'klsafl lflllm', 'llsalfl ll', 'lsldlasllmsl', 'B', '2019-04-14 22:46:49', '2019-04-14 22:46:49'),
(11, 3, 2, 20, '<p>hfksk mflwlslwellwml</p>', NULL, 'js asflasml', 'lslsallm', 'lldlsldlsl', 'lmdllslld', 'A', '2019-04-14 22:47:56', '2019-04-14 22:47:56'),
(12, 3, 2, 23, '<p>fnsojskalasml</p>', 'uploads/images/questions/cbt3.jpg', 'csasg', 'gsadga', 'gawewh', 'gawewh', 'A', '2019-04-14 22:48:50', '2019-04-15 13:01:21'),
(13, 4, 2, 1, '<p>What is a noun?</p>', NULL, 'name', 'big', 'small', 'retard', 'B', '2019-04-16 18:39:05', '2019-04-16 18:39:05'),
(14, 4, 2, 2, '<p>thios kasol</p>', 'uploads/images/questions/cbt3.jpg', 'jsll', ';s;\'[s[mkp', 'lsdosp', 'x owppp', 'D', '2019-04-16 18:40:15', '2019-04-16 18:40:15'),
(15, 4, 3, 1, '<p>1+1</p>', NULL, '4', '2', '3', '5', 'B', '2019-04-16 19:05:04', '2019-04-16 19:05:04'),
(16, 4, 7, 1, '<p>jesus was born on what day?</p>', NULL, '25 december', '26 december', '27 december', '28 december', 'A', '2019-04-16 19:06:07', '2019-04-16 19:06:07'),
(17, 4, 2, 3, '<p>jkldsklkl jljmlfsl&nbsp; ojllslllsml</p>\r\n', 'uploads/images/questions/cbt3_1.jpg', 'rtc', 'no', 'yes', 'she looks reetajl.s \'das\'', 'B', '2019-05-03 06:37:44', '2019-05-03 06:37:44'),
(18, 4, 3, 2, '<p><span style=\"font-size:24px\">this is it kid</span></p>\r\n', NULL, '5', '4', '3', '2', 'D', '2019-05-03 06:40:36', '2019-05-03 06:40:36'),
(19, 4, 3, 3, '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>ssss</td>\r\n			<td>yeah</td>\r\n		</tr>\r\n		<tr>\r\n			<td>3</td>\r\n			<td>4</td>\r\n		</tr>\r\n		<tr>\r\n			<td>21</td>\r\n			<td>10</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>What is the median?</p>\r\n', NULL, '5', '6', '7', '8', 'A', '2019-05-03 06:41:29', '2019-05-03 06:41:29'),
(20, 4, 3, 4, '<p>The mode of the distribution: 2, 3, 4,6,9?</p>\r\n', NULL, '4', '2', '9', '6', 'C', '2019-05-03 06:42:46', '2019-05-03 06:42:46'),
(21, 4, 3, 7, '<p>multiply the following 6, 5</p>\r\n', NULL, '30', '20', '25', '15', 'A', '2019-05-03 06:44:51', '2019-05-03 06:44:51'),
(22, 4, 7, 2, '<p>yeah, we go</p>\r\n', NULL, 'dsds', 'ash6', 'try', 'good', 'B', '2019-05-03 06:46:24', '2019-05-03 06:46:24'),
(23, 4, 7, 4, '<p>msity fall</p>\r\n', 'uploads/images/questions/ays1.jpg', 'jgtd', 'ytataa', 'bgea', 'yuik', 'C', '2019-05-03 06:46:57', '2019-05-03 06:46:58');

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `logo` varchar(255) NOT NULL,
  `feature1_title` varchar(255) NOT NULL,
  `feature2_title` varchar(255) NOT NULL,
  `feature3_title` varchar(255) NOT NULL,
  `feature4_title` varchar(255) NOT NULL,
  `feature1_description` text NOT NULL,
  `feature2_description` text NOT NULL,
  `feature3_description` text NOT NULL,
  `feature4_description` text NOT NULL,
  `home` text NOT NULL,
  `background` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `phone` text NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `timer` int(255) NOT NULL,
  `blog_background` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `title`, `description`, `logo`, `feature1_title`, `feature2_title`, `feature3_title`, `feature4_title`, `feature1_description`, `feature2_description`, `feature3_description`, `feature4_description`, `home`, `background`, `about`, `phone`, `address`, `email`, `timer`, `blog_background`, `created_at`, `updated_at`) VALUES
(1, 'Ireayo CBT', '<p>Lorem ipsum dolor sit amet, conseg sed do eiusmod temput laborelaborus ed sed do eiusmod tempo. Lorem ipsum dolor sit amet, conseg sed do eiusmod temput laborelaborus ed sed do eiusmod tempo.</p>', 'uploads/images/logos/dca.jpg', 'feature 1', 'feature 2', 'feature 3', 'feature 4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '<p>Lorem ipsum dolor sit amet, conseg sed do eiusmod temput laborelaborus ed sed do eiusmod tempo. Lorem ipsum dolor sit amet, conseg sed do eiusmod temput laborelaborus ed sed do eiusmod tempo. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>', 'uploads/images/background/cbr2.jpeg', '<p>Lorem ipsum dolor sit amet, conseg sed do eiusmod temput laborelaborus ed sed do eiusmod tempo. Lorem ipsum dolor sit amet, conseg sed do eiusmod temput laborelaborus ed sed do eiusmod tempo. Lorem ipsum dolor sit amet, conseg sed do eiusmod temput laborelaborus ed sed do eiusmod tempo. Lorem ipsum dolor sit amet, conseg sed do eiusmod temput laborelaborus ed sed do eiusmod tempo. Lorem ipsum dolor sit amet, conseg sed do eiusmod temput laborelaborus ed sed do eiusmod tempo. Lorem ipsum dolor sit amet, conseg sed do eiusmod temput laborelaborus ed sed do eiusmod tempo. Lorem ipsum dolor sit amet, conseg sed do eiusmod temput laborelaborus ed sed do eiusmod tempo. Lorem ipsum dolor sit amet, conseg sed do eiusmod temput laborelaborus ed sed do eiusmod tempo. Lorem ipsum dolor sit amet, conseg sed do eiusmod temput laborelaborus ed sed do eiusmod tempo. Lorem ipsum dolor sit amet, conseg sed do eiusmod temput laborelaborus ed sed do eiusmod tempo. Lorem ipsum dolor sit amet, conseg sed do eiusmod temput laborelaborus ed sed do eiusmod tempo. Lorem ipsum dolor sit amet, conseg sed do eiusmod temput laborelaborus ed sed do eiusmod tempo.</p>', '3455673556657534', 'isiklau lame ols', 'info@devugo.com', 50, 'uploads/images/background/blog1_1.jpg', '2019-04-09 04:56:43', '2019-05-01 21:50:30');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(50) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_pix` varchar(255) NOT NULL,
  `verified` datetime DEFAULT NULL,
  `token` varchar(255) NOT NULL,
  `blocked_on` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `firstname`, `middlename`, `lastname`, `email`, `password`, `profile_pix`, `verified`, `token`, `blocked_on`, `created_at`, `updated_at`) VALUES
(1, 'Ugochukwu', 'Thankgod', 'Ezenwankwo', 'ugonnaezenwankwo@gmail.com', '$2y$10$rsi2iIPcqWgjc2EcHkcUkum.InleaYVZMIEF9hXcnYMqOuio/Q9Bu', 'uploads/images/profile_pictures/IMG-20180517-WA0000_6.jpg', '2019-05-01 03:18:00', '', NULL, '2019-04-12 14:34:37', '2019-04-17 08:36:38'),
(2, 'mike', 'sdfsd', 'ugo', 'ugoeze@gmail.com', 'knalll', '', NULL, '', NULL, '2019-04-16 03:34:34', '2019-04-16 03:34:34'),
(3, 'Ugo', 'thankgod', 'Eze', 'info@devugo.com', '$2y$10$h8Vrd03Crz.hviNm3M6r6ew0W/6vrgdo76HkYHvPMiHaTnI8eE0Um', '', '2019-05-05 08:05:31', 'e08Nswou.5AZkxC', NULL, '2019-05-05 00:30:19', '2019-05-05 11:38:27'),
(9, 'ugo', 'Charlse', 'Opara', 'ugoezenwankwo@gmail.com', '$2y$10$vaetVqhxmdC/xtKg63oHFe.aFVRFix9wKSEUZO4MXnvmP1wMoYCFm', 'uploads/images/profile_pictures/IMG-20180517-WA0000_8.jpg', '2019-05-05 12:16:51', 'DqbCEnM6gSFOVB7', NULL, '2019-05-05 12:16:41', '2019-05-05 12:28:49');

-- --------------------------------------------------------

--
-- Table structure for table `students_sessions`
--

CREATE TABLE `students_sessions` (
  `id` int(50) NOT NULL,
  `student_id` int(50) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(50) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `level_id` int(50) NOT NULL,
  `blocked_on` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject`, `level_id`, `blocked_on`, `created_at`, `updated_at`) VALUES
(2, 'English Language', 0, NULL, '2019-04-12 22:11:25', '2019-04-16 18:45:51'),
(3, 'Mathematics', 0, NULL, '2019-04-16 14:39:31', '2019-04-16 14:39:31'),
(4, 'Physics', 0, NULL, '2019-04-16 15:10:02', '2019-04-16 15:10:02'),
(5, 'Chemistry', 0, NULL, '2019-04-16 15:10:07', '2019-04-16 15:10:07'),
(6, 'History', 0, NULL, '2019-04-16 15:10:12', '2019-04-16 15:10:12'),
(7, 'CRK', 0, NULL, '2019-04-16 18:22:30', '2019-04-16 18:22:30'),
(8, 'IRK', 0, NULL, '2019-04-16 18:22:34', '2019-04-16 18:22:34'),
(9, 'Business Studies', 0, NULL, '2019-04-16 18:22:47', '2019-04-16 18:22:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_sessions`
--
ALTER TABLE `admin_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level_id` (`level_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students_sessions`
--
ALTER TABLE `students_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_sessions`
--
ALTER TABLE `admin_sessions`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `students_sessions`
--
ALTER TABLE `students_sessions`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `questions_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
