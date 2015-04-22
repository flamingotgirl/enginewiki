-- --------------------------------------------------------
-- Host:                         192.168.0.68
-- Server version:               5.1.41-3ubuntu12.10-log - (Ubuntu)
-- Server OS:                    debian-linux-gnu
-- HeidiSQL version:             6.0.0.4021
-- Date/time:                    2012-01-25 16:51:59
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping structure for table engine_wiki.entries
CREATE TABLE IF NOT EXISTS `entries` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pid` int(10) DEFAULT '0',
  `proj_id` int(10) DEFAULT NULL,
  `type` varchar(1) DEFAULT NULL COMMENT 'a=article, m=method, c=class, etc',
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `contents` text,
  `added_at` int(10) DEFAULT NULL,
  `modified_at` int(10) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `proj_id` (`proj_id`),
  KEY `deleted` (`deleted`),
  KEY `type` (`type`)
) ENGINE=MyISAM AUTO_INCREMENT=88 DEFAULT CHARSET=latin1;

-- Dumping data for table engine_wiki.entries: 10 rows
/*!40000 ALTER TABLE `entries` DISABLE KEYS */;
INSERT INTO `entries` (`id`, `pid`, `proj_id`, `type`, `name`, `description`, `contents`, `added_at`, `modified_at`, `deleted`) VALUES
	(1, 0, 0, NULL, 'in_array', '54645645', '<p>\r\n	45645645656464</p>\r\n', NULL, NULL, 0),
	(3, 1, 0, NULL, 'Zscasdc', 'Parameters 3', '<dl>\r\n	<dt>\r\n		<strong><span class="term"><em><tt class="parameter"><span style="font-family: Arial,Verdana,sans-serif;">ccccccccccccccccccccc</span></tt></em></span></strong></dt>\r\n	<dt>\r\n		Â </dt>\r\n	<dt>\r\n		<span class="term"><em><span style="background-color:#ffff00;">34324</span><span style="background-color:#ee82ee;">32432423</span></em></span></dt>\r\n	<dd>\r\n		<p class="para">\r\n			<span style="background-color:#ee82ee;">T</span><strong><span style="background-color:#ee82ee;">he searched value.</span></strong></p>\r\n		<blockquote class="note">\r\n			<p>\r\n				<strong class="note"><span style="background-color:#ee82ee;">Note</span></strong><span style="background-color:#ee82ee;">:</span></p>\r\n			<p class="para">\r\n				<span style="background-color:#ee82ee;">If </span><em><tt class="parameter"><span style="background-color:#ee82ee;">ne</span><span style="color:#b22222;"><span style="background-color:#ee82ee;">edle</span></span></tt></em><span style="color:#b22222;"><span style="background-color:#ee82ee;"> is a </span><strong><span style="background-color:#ee82ee;">string, </span><span style="background-color: rgb(255, 255, 0);">the comparison</span></strong><span style="background-color:#ffff00;"> is done in a case-sensiti</span></span><span style="color: rgb(0, 0, 255);"><span style="color: rgb(255, 102, 0);"><span style="background-color:#ffff00;">ve</span></span></span><span style="color: #ff6600;"><span style="background-color:#ffff00;"> manner.</span></span></p>\r\n		</blockquote>\r\n	</dd>\r\n	<dt>\r\n		<span class="term"><em><tt class="parameter"><span style="background-color:#00ff00;">hasdfdsfds</span></tt></em></span></dt>\r\n	<dd>\r\n		<p class="para">\r\n			<span style="background-color:#ffa07a;">The array.</span></p>\r\n	</dd>\r\n	<dt>\r\n		<span class="term"><em><tt class="parameter"><span style="background-color:#008000;">strict</span></tt></em></span></dt>\r\n	<dd>\r\n		<p class="para">\r\n			<span style="color: #808000;">If the third</span> pa<span style="background-color:#00ff00;">ra</span><strong><em><span style="background-color:#00ff00;">meter </span><tt class="parameter"><span style="background-color:#00ff00;">strict</span></tt><span style="background-color:#00ff00;"> is se</span></em></strong><span style="background-color:#00ff00;">t to </span><strong><tt><span style="background-color:#00ff00;">TRUE</span></tt></strong><span style="background-color:#00ff00;"> then the </span><span class="function"><strong><span style="background-color:#00ff00;">i</span>n_array()</strong></span> function will also check the <a class="link" href="http://www.php.net/manual/en/language.types.php">types</a> of the <em><tt class="parameter">needle</tt></em> in the <em><tt class="parameter">haystack</tt></em>.</p>\r\n	</dd>\r\n</dl>\r\n', NULL, NULL, 0),
	(7, 1, NULL, NULL, NULL, 'Return Values', '<p>\r\n	<span style="color: #339966;">Returns <tt>TRUE</tt> if <em><tt class="parameter">needle</tt></em> is fo<strong>und in<span style="color: #3366ff;"> the array, <tt>FALSE</tt> otherwise.</span></strong></span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<span style="color: #339966;"><strong><span style="color: #3366ff;">3432423432</span></strong></span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	35435435</p>\r\n', NULL, NULL, 0),
	(6, 1, NULL, NULL, 'ghgfg', 'Example #1 in_array() example', '<div class="example-contents">\r\n<div class="phpcode"><span style="font-size: medium;"><code><span style="color: #000000;"> <span style="color: #0000bb;">&lt;?php<br />$os&nbsp;</span><span style="color: #007700;">=&nbsp;array(</span><span style="color: #dd0000;">"Mac"</span><span style="color: #007700;">,&nbsp;</span><span style="color: #dd0000;">"NT"</span><span style="color: #007700;">,&nbsp;</span><span style="color: #dd0000;">"Irix"</span><span style="color: #007700;">,&nbsp;</span><span style="color: #dd0000;">"Linux"</span><span style="color: #007700;">);<br />if&nbsp;(</span><span style="color: #0000bb;">in_array</span><span style="color: #007700;">(</span><span style="color: #dd0000;">"Irix"</span><span style="color: #007700;">,&nbsp;</span><span style="color: #0000bb;">$os</span><span style="color: #007700;">))&nbsp;{<br />&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #dd0000;">"Got&nbsp;Irix"</span><span style="color: #007700;">;<br />}<br />if&nbsp;(</span><span style="color: #0000bb;">in_array</span><span style="color: #007700;">(</span><span style="color: #dd0000;">"mac"</span><span style="color: #007700;">,&nbsp;</span><span style="color: #0000bb;">$os</span><span style="color: #007700;">))&nbsp;{<br />&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #dd0000;">"Got&nbsp;mac"</span><span style="color: #007700;">;<br />}<br /></span><span style="color: #0000bb;">?&gt;</span> </span> </code></span></div>\r\n</div>', NULL, NULL, 0),
	(74, 0, NULL, NULL, NULL, '33', '<p>\r\n	33</p>\r\n', NULL, NULL, 0),
	(75, 0, NULL, NULL, NULL, '325325', '<p>\r\n	435435345</p>\r\n', NULL, NULL, 0),
	(76, 0, NULL, NULL, NULL, '234123', '<p>&nbsp;</p>', NULL, NULL, 0),
	(77, 0, NULL, NULL, NULL, '676575', '<p>\r\n	76576576567</p>\r\n', NULL, NULL, 0),
	(85, 0, NULL, NULL, '45456456', '46456', '<p>\r\n	45645656</p>\r\n', NULL, NULL, 0),
	(87, 1, NULL, NULL, NULL, '4e6543', '<p>\r\n	65464565</p>\r\n', NULL, NULL, 0);
/*!40000 ALTER TABLE `entries` ENABLE KEYS */;


-- Dumping structure for table engine_wiki.notes
CREATE TABLE IF NOT EXISTS `notes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `entry_id` int(10) DEFAULT NULL,
  `content` text,
  `added_at` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `entry_id` (`entry_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table engine_wiki.notes: 0 rows
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;
/*!40000 ALTER TABLE `notes` ENABLE KEYS */;


-- Dumping structure for table engine_wiki.sections
CREATE TABLE IF NOT EXISTS `sections` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pid` int(10) DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `orderby` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table engine_wiki.sections: 8 rows
/*!40000 ALTER TABLE `sections` DISABLE KEYS */;
INSERT INTO `sections` (`id`, `pid`, `name`, `orderby`) VALUES
	(1, 0, 'functii', 0),
	(2, 1, 'metode', 0),
	(3, 0, 'tutoriale', 0),
	(4, 0, 'howto', 0),
	(5, 0, '234324', 0),
	(6, 3, '436456456', 0),
	(7, 0, '12', 0),
	(8, 7, '234', 0);
/*!40000 ALTER TABLE `sections` ENABLE KEYS */;


-- Dumping structure for table engine_wiki.sections_rel
CREATE TABLE IF NOT EXISTS `sections_rel` (
  `section_id` int(10) DEFAULT NULL,
  `entry_id` int(10) DEFAULT NULL,
  KEY `section_id` (`section_id`),
  KEY `entry_id` (`entry_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table engine_wiki.sections_rel: 9 rows
/*!40000 ALTER TABLE `sections_rel` DISABLE KEYS */;
INSERT INTO `sections_rel` (`section_id`, `entry_id`) VALUES
	(1, 1),
	(1, 7),
	(1, 8),
	(1, 6),
	(8, 74),
	(8, 75),
	(8, 76),
	(2, 77),
	(1, 85);
/*!40000 ALTER TABLE `sections_rel` ENABLE KEYS */;


-- Dumping structure for table engine_wiki.tags
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `entry_id` int(10) DEFAULT NULL,
  `tag` varchar(128) DEFAULT NULL,
  `added_at` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `entry_id` (`entry_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table engine_wiki.tags: 0 rows
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
