-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2015 at 03:48 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `engine_wiki`
--

-- --------------------------------------------------------

--
-- Table structure for table `entries`
--

CREATE TABLE IF NOT EXISTS `entries` (
`id` int(10) NOT NULL,
  `pid` int(10) DEFAULT '0',
  `proj_id` int(10) DEFAULT NULL,
  `type` varchar(1) DEFAULT NULL COMMENT 'a=article, m=method, c=class, etc',
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `contents` text,
  `added_at` int(10) DEFAULT NULL,
  `modified_at` int(10) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `entries`
--

INSERT INTO `entries` (`id`, `pid`, `proj_id`, `type`, `name`, `description`, `contents`, `added_at`, `modified_at`, `deleted`) VALUES
(7, 6, NULL, '', '', 'Return Values', '<p>\r\n	Returns <tt>TRUE</tt> if <em><tt class="parameter">needle</tt></em> is fo<strong>und in the array, <tt>FALSE</tt> otherwise.</strong></p>\r\n<p>\r\n', NULL, 1429709910, 0),
(6, 0, NULL, NULL, 'in_array()', 'Example #1 in_array() example', '<div class="example-contents">\r\n<div class="phpcode"><span style="font-size: medium;"><code><span style="color: #000000;"> <span style="color: #0000bb;">&lt;?php<br />$os&nbsp;</span><span style="color: #007700;">=&nbsp;array(</span><span style="color: #dd0000;">"Mac"</span><span style="color: #007700;">,&nbsp;</span><span style="color: #dd0000;">"NT"</span><span style="color: #007700;">,&nbsp;</span><span style="color: #dd0000;">"Irix"</span><span style="color: #007700;">,&nbsp;</span><span style="color: #dd0000;">"Linux"</span><span style="color: #007700;">);<br />if&nbsp;(</span><span style="color: #0000bb;">in_array</span><span style="color: #007700;">(</span><span style="color: #dd0000;">"Irix"</span><span style="color: #007700;">,&nbsp;</span><span style="color: #0000bb;">$os</span><span style="color: #007700;">))&nbsp;{<br />&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #dd0000;">"Got&nbsp;Irix"</span><span style="color: #007700;">;<br />}<br />if&nbsp;(</span><span style="color: #0000bb;">in_array</span><span style="color: #007700;">(</span><span style="color: #dd0000;">"mac"</span><span style="color: #007700;">,&nbsp;</span><span style="color: #0000bb;">$os</span><span style="color: #007700;">))&nbsp;{<br />&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #dd0000;">"Got&nbsp;mac"</span><span style="color: #007700;">;<br />}<br /></span><span style="color: #0000bb;">?&gt;</span> </span> </code></span></div>\r\n</div>', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
`id` int(10) NOT NULL,
  `entry_id` int(10) DEFAULT NULL,
  `content` text,
  `added_at` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE IF NOT EXISTS `sections` (
`id` int(10) NOT NULL,
  `pid` int(10) DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `orderby` int(11) DEFAULT '0',
  `deleted` tinyint(4) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `pid`, `name`, `orderby`, `deleted`) VALUES
(1, 0, 'functii', 0, 0),
(2, 1, 'metode', 0, 0),
(3, 0, 'tutoriale', 0, 0),
(4, 0, 'howto', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sections_rel`
--

CREATE TABLE IF NOT EXISTS `sections_rel` (
  `section_id` int(10) DEFAULT NULL,
  `entry_id` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sections_rel`
--

INSERT INTO `sections_rel` (`section_id`, `entry_id`) VALUES
(1, 7),
(1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
`id` int(10) NOT NULL,
  `entry_id` int(10) DEFAULT NULL,
  `tag` varchar(128) DEFAULT NULL,
  `added_at` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `entries`
--
ALTER TABLE `entries`
 ADD PRIMARY KEY (`id`), ADD KEY `pid` (`pid`), ADD KEY `proj_id` (`proj_id`), ADD KEY `deleted` (`deleted`), ADD KEY `type` (`type`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
 ADD PRIMARY KEY (`id`), ADD KEY `entry_id` (`entry_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
 ADD PRIMARY KEY (`id`), ADD KEY `pid` (`pid`);

--
-- Indexes for table `sections_rel`
--
ALTER TABLE `sections_rel`
 ADD KEY `section_id` (`section_id`), ADD KEY `entry_id` (`entry_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
 ADD PRIMARY KEY (`id`), ADD KEY `entry_id` (`entry_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `entries`
--
ALTER TABLE `entries`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
