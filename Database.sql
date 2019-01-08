-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 08, 2019 at 02:53 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bongah`
--

-- --------------------------------------------------------

--
-- Table structure for table `mtbladvertise`
--

CREATE TABLE IF NOT EXISTS `mtbladvertise` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titr` text COLLATE utf8_persian_ci NOT NULL,
  `image` text COLLATE utf8_persian_ci NOT NULL,
  `link` text COLLATE utf8_persian_ci NOT NULL,
  `enabled` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `mtbladvertise`
--

INSERT INTO `mtbladvertise` (`id`, `titr`, `image`, `link`, `enabled`) VALUES
(1, 'تبلیغ 1', 'images/advertise/1843_940200.gif', '', 1),
(2, 'تبلیغ 2', 'images/advertise/2843_940200.gif', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mtblaudio`
--

CREATE TABLE IF NOT EXISTS `mtblaudio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titr` text COLLATE utf8_persian_ci NOT NULL,
  `shorttext` text COLLATE utf8_persian_ci NOT NULL,
  `longtext` text COLLATE utf8_persian_ci NOT NULL,
  `image` text COLLATE utf8_persian_ci NOT NULL,
  `type` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL,
  `writerid` int(11) NOT NULL,
  `writedate` text COLLATE utf8_persian_ci NOT NULL,
  `writetime` text COLLATE utf8_persian_ci NOT NULL,
  `like` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `star` int(11) NOT NULL,
  `published` tinyint(4) NOT NULL,
  `keywords` text COLLATE utf8_persian_ci NOT NULL,
  `description` text COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=74 ;

--
-- Dumping data for table `mtblaudio`
--

INSERT INTO `mtblaudio` (`id`, `titr`, `shorttext`, `longtext`, `image`, `type`, `subjectid`, `writerid`, `writedate`, `writetime`, `like`, `view`, `star`, `published`, `keywords`, `description`) VALUES
(73, 'تیتر خبر اول برای نویان', '', '<p>ثقفث</p>\r\n\r\n<p>ثقف</p>\r\n\r\n<p>ثقف</p>\r\n\r\n<p>ثقف</p>\r\n\r\n<p>ثقف</p>\r\n\r\n<p>ثف</p>\r\n', 'images/post/2images (1).jpg', 1, 0, 1, '۱۳۹۴/۰۲/۰۷', '۱۲:۵۷:۰۸', 0, 4, 0, 1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `mtblcomment`
--

CREATE TABLE IF NOT EXISTS `mtblcomment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postid` int(11) NOT NULL,
  `name` text COLLATE utf8_persian_ci NOT NULL,
  `email` text COLLATE utf8_persian_ci NOT NULL,
  `comment` text COLLATE utf8_persian_ci NOT NULL,
  `date_time` text COLLATE utf8_persian_ci NOT NULL,
  `pagename` text COLLATE utf8_persian_ci NOT NULL,
  `readed` tinyint(4) NOT NULL DEFAULT '0',
  `ip` text COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=92 ;

--
-- Dumping data for table `mtblcomment`
--


-- --------------------------------------------------------

--
-- Table structure for table `mtbldownload`
--

CREATE TABLE IF NOT EXISTS `mtbldownload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_persian_ci NOT NULL,
  `titr` text COLLATE utf8_persian_ci NOT NULL,
  `shorttext` text COLLATE utf8_persian_ci NOT NULL,
  `longtext` text COLLATE utf8_persian_ci NOT NULL,
  `image` text COLLATE utf8_persian_ci NOT NULL,
  `type` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL,
  `writerid` int(11) NOT NULL,
  `writedate` text COLLATE utf8_persian_ci NOT NULL,
  `writetime` text COLLATE utf8_persian_ci NOT NULL,
  `publisheddate` text COLLATE utf8_persian_ci NOT NULL,
  `publishedtime` text COLLATE utf8_persian_ci NOT NULL,
  `expirationdate` text COLLATE utf8_persian_ci NOT NULL,
  `expirationtime` text COLLATE utf8_persian_ci NOT NULL,
  `like` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `star` int(11) NOT NULL,
  `link1` text COLLATE utf8_persian_ci NOT NULL,
  `linktitle1` text COLLATE utf8_persian_ci NOT NULL,
  `linkpass1` text COLLATE utf8_persian_ci NOT NULL,
  `link2` text COLLATE utf8_persian_ci NOT NULL,
  `linktitle2` text COLLATE utf8_persian_ci NOT NULL,
  `linkpass2` text COLLATE utf8_persian_ci NOT NULL,
  `link3` text COLLATE utf8_persian_ci NOT NULL,
  `linktitle3` text COLLATE utf8_persian_ci NOT NULL,
  `linkpass3` text COLLATE utf8_persian_ci NOT NULL,
  `published` tinyint(4) NOT NULL,
  `price` bigint(20) NOT NULL DEFAULT '0',
  `keywords` text COLLATE utf8_persian_ci NOT NULL,
  `description` text COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=144 ;

--
-- Dumping data for table `mtbldownload`
--

INSERT INTO `mtbldownload` (`id`, `name`, `titr`, `shorttext`, `longtext`, `image`, `type`, `subjectid`, `writerid`, `writedate`, `writetime`, `publisheddate`, `publishedtime`, `expirationdate`, `expirationtime`, `like`, `view`, `star`, `link1`, `linktitle1`, `linkpass1`, `link2`, `linktitle2`, `linkpass2`, `link3`, `linktitle3`, `linkpass3`, `published`, `price`, `keywords`, `description`) VALUES
(137, '', 'اپارتمان 1 فروشی', '', '<div>&nbsp;</div>\r\n\r\n<div>\r\n<table class="normaltablelist_Ttable" style="background-color:rgb(227, 236, 212); font-family:times new roman; width:100%">\r\n	<tbody>\r\n		<tr>\r\n			<td>تاريخ</td>\r\n			<td>1393/05/22</td>\r\n			<td>کد</td>\r\n			<td>1048329</td>\r\n		</tr>\r\n		<tr>\r\n			<td>کد شهرداری</td>\r\n			<td>6&nbsp;</td>\r\n			<td>شهر</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>منطقه</td>\r\n			<td>&nbsp;</td>\r\n			<td>محله</td>\r\n			<td>فاطمی</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="4">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="4">مشخصات مالک</td>\r\n		</tr>\r\n		<tr>\r\n			<td>نام</td>\r\n			<td>&nbsp;</td>\r\n			<td>تلفن</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>آدرس</td>\r\n			<td colspan="3">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="4">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="4">مشخصات ملک</td>\r\n		</tr>\r\n		<tr>\r\n			<td>نوع</td>\r\n			<td>مغازه</td>\r\n			<td>طبقات</td>\r\n			<td>0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>جهت</td>\r\n			<td>شرقی</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>تعداد کل واحد ها</td>\r\n			<td>&nbsp;</td>\r\n			<td>تعداد واحد در هر طبقه</td>\r\n			<td>0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>سن بنا</td>\r\n			<td>30</td>\r\n			<td>نما</td>\r\n			<td>شيشه</td>\r\n		</tr>\r\n		<tr>\r\n			<td>استخر</td>\r\n			<td>خیر</td>\r\n			<td>سکونت مالک</td>\r\n			<td>خیر</td>\r\n		</tr>\r\n		<tr>\r\n			<td>مساحت زمین</td>\r\n			<td>0</td>\r\n			<td>تراکم</td>\r\n			<td>0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>طول بر</td>\r\n			<td>8</td>\r\n			<td>اصلاحی</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>توضیحات</td>\r\n			<td colspan="3">ارتفاع 2متر - برق-ملك وسرقفلي</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n', 'images/post/1Barcelona-Point-appartment-2.jpg', 1, 88, 1, '۱۳۹۳/۰۵/۲۳', '۰۹:۳۳:۵۹', '', '', '', '', 0, 6, 0, '', '', '', '', '', '', '', '', '', 1, 250000000, '', ''),
(138, '', 'ویلا 2 فروشی', '', '<div style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; color: rgb(0, 0, 0); font-family: Tahoma, Geneva, sans-serif; line-height: 21px; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">&nbsp;</div>\r\n\r\n<div style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; color: rgb(0, 0, 0); font-family: Tahoma, Geneva, sans-serif; line-height: 21px; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">\r\n<table class="normaltablelist_Ttable" style="background-color:rgb(227, 236, 212); font-family:times new roman; width:839px">\r\n	<tbody>\r\n		<tr>\r\n			<td>تاريخ</td>\r\n			<td>1393/05/22</td>\r\n			<td>کد</td>\r\n			<td>1048329</td>\r\n		</tr>\r\n		<tr>\r\n			<td>کد شهرداری</td>\r\n			<td>6&nbsp;</td>\r\n			<td>شهر</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>منطقه</td>\r\n			<td>&nbsp;</td>\r\n			<td>محله</td>\r\n			<td>فاطمی</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="4">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="4">مشخصات مالک</td>\r\n		</tr>\r\n		<tr>\r\n			<td>نام</td>\r\n			<td>&nbsp;</td>\r\n			<td>تلفن</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>آدرس</td>\r\n			<td colspan="3">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="4">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="4">مشخصات ملک</td>\r\n		</tr>\r\n		<tr>\r\n			<td>نوع</td>\r\n			<td>مغازه</td>\r\n			<td>طبقات</td>\r\n			<td>0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>جهت</td>\r\n			<td>شرقی</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>تعداد کل واحد ها</td>\r\n			<td>&nbsp;</td>\r\n			<td>تعداد واحد در هر طبقه</td>\r\n			<td>0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>سن بنا</td>\r\n			<td>30</td>\r\n			<td>نما</td>\r\n			<td>شيشه</td>\r\n		</tr>\r\n		<tr>\r\n			<td>استخر</td>\r\n			<td>خیر</td>\r\n			<td>سکونت مالک</td>\r\n			<td>خیر</td>\r\n		</tr>\r\n		<tr>\r\n			<td>مساحت زمین</td>\r\n			<td>0</td>\r\n			<td>تراکم</td>\r\n			<td>0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>طول بر</td>\r\n			<td>8</td>\r\n			<td>اصلاحی</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>توضیحات</td>\r\n			<td colspan="3">ارتفاع 2متر - برق-ملك وسرقفلي</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n', 'images/post/1Villa-Canberra-lifestylehouse.jpg', 1, 89, 1, '۱۳۹۳/۰۵/۲۳', '۰۹:۳۴:۲۱', '', '', '', '', 0, 3, 0, '', '', '', '', '', '', '', '', '', 1, 0, '', ''),
(139, '', 'ویلا', '', '<div style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; color: rgb(0, 0, 0); font-family: Tahoma, Geneva, sans-serif; line-height: 21px; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">&nbsp;</div>\r\n\r\n<div style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; color: rgb(0, 0, 0); font-family: Tahoma, Geneva, sans-serif; line-height: 21px; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">\r\n<table class="normaltablelist_Ttable" style="background-color:rgb(227, 236, 212); font-family:times new roman; width:839px">\r\n	<tbody>\r\n		<tr>\r\n			<td>تاريخ</td>\r\n			<td>1393/05/22</td>\r\n			<td>کد</td>\r\n			<td>1048329</td>\r\n		</tr>\r\n		<tr>\r\n			<td>کد شهرداری</td>\r\n			<td>6&nbsp;</td>\r\n			<td>شهر</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>منطقه</td>\r\n			<td>&nbsp;</td>\r\n			<td>محله</td>\r\n			<td>فاطمی</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="4">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="4">مشخصات مالک</td>\r\n		</tr>\r\n		<tr>\r\n			<td>نام</td>\r\n			<td>&nbsp;</td>\r\n			<td>تلفن</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>آدرس</td>\r\n			<td colspan="3">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="4">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan="4">مشخصات ملک</td>\r\n		</tr>\r\n		<tr>\r\n			<td>نوع</td>\r\n			<td>مغازه</td>\r\n			<td>طبقات</td>\r\n			<td>0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>جهت</td>\r\n			<td>شرقی</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>تعداد کل واحد ها</td>\r\n			<td>&nbsp;</td>\r\n			<td>تعداد واحد در هر طبقه</td>\r\n			<td>0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>سن بنا</td>\r\n			<td>30</td>\r\n			<td>نما</td>\r\n			<td>شيشه</td>\r\n		</tr>\r\n		<tr>\r\n			<td>استخر</td>\r\n			<td>خیر</td>\r\n			<td>سکونت مالک</td>\r\n			<td>خیر</td>\r\n		</tr>\r\n		<tr>\r\n			<td>مساحت زمین</td>\r\n			<td>0</td>\r\n			<td>تراکم</td>\r\n			<td>0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>طول بر</td>\r\n			<td>8</td>\r\n			<td>اصلاحی</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>توضیحات</td>\r\n			<td colspan="3">ارتفاع 2متر - برق-ملك وسرقفلي</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n', 'images/post/1modern-contemporary-villa.jpg', 1, 89, 1, '۱۳۹۳/۰۵/۲۳', '۰۹:۳۴:۵۵', '', '', '', '', 0, 8, 0, '', '', '', '', '', '', '', '', '', 1, 1560000000, '', ''),
(141, 'vizhe', 'آپارتمان مسکونی', '', '<p>توضیحات تکمیلی برای این آپارتمان</p>\r\n\r\n<p>توضیحات تکمیلی برای این آپارتمان</p>\r\n\r\n<p>توضیحات تکمیلی برای این آپارتمان</p>\r\n\r\n<p>توضیحات تکمیلی برای این آپارتمان</p>\r\n\r\n<p>توضیحات تکمیلی برای این آپارتمان</p>\r\n\r\n<p>توضیحات تکمیلی برای این آپارتمان</p>\r\n\r\n<p>توضیحات تکمیلی برای این آپارتمان</p>\r\n\r\n<p>توضیحات تکمیلی برای این آپارتمان</p>\r\n\r\n<p>توضیحات تکمیلی برای این آپارتمان</p>\r\n', 'images/post/1images (1).jpg', 1, 88, 1, '۱۳۹۴/۰۲/۰۷', '۱۱:۳۷:۳۹', '', '', '', '', 0, 11, 0, '', '', '', '', '', '', '', '', '', 1, 500000, '', ''),
(142, '', 'ویلای مسکونی نیاوران', '', '', 'images/post/1images (2).jpg', 1, 89, 1, '۱۳۹۴/۰۲/۰۷', '۱۲:۵۵:۰۱', '', '', '', '', 0, 2, 0, '', '', '', '', '', '', '', '', '', 1, 0, '', ''),
(143, '', 'منزل مسکونی قدیمی', '', '', 'images/post/2images (2).jpg', 1, 86, 1, '۱۳۹۴/۰۲/۰۷', '۱۲:۵۵:۵۰', '', '', '', '', 0, 1, 0, '', '', '', '', '', '', '', '', '', 1, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `mtblip`
--

CREATE TABLE IF NOT EXISTS `mtblip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` text CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `date` text CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `mtblip`
--


-- --------------------------------------------------------

--
-- Table structure for table `mtblmenu`
--

CREATE TABLE IF NOT EXISTS `mtblmenu` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_persian_ci NOT NULL,
  `link` text COLLATE utf8_persian_ci NOT NULL,
  `enabled` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `mtblmenu`
--

INSERT INTO `mtblmenu` (`id`, `title`, `link`, `enabled`) VALUES
(2, 'مقالات', '', 1),
(3, 'کالاها', '', 1),
(4, 'ویدیو ها', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mtblmessage`
--

CREATE TABLE IF NOT EXISTS `mtblmessage` (
  `ID` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `Sender` int(11) NOT NULL,
  `Reciver` int(11) NOT NULL,
  `Title` text COLLATE utf8_persian_ci NOT NULL,
  `Text` mediumtext COLLATE utf8_persian_ci NOT NULL,
  `SendDate` text COLLATE utf8_persian_ci NOT NULL,
  `SendTime` text COLLATE utf8_persian_ci NOT NULL,
  `Readed` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mtblmessage`
--

INSERT INTO `mtblmessage` (`ID`, `Sender`, `Reciver`, `Title`, `Text`, `SendDate`, `SendTime`, `Readed`) VALUES
(1, -1, 0, 'طاهر شالی', 'daneshjoo_babol@yahoo.com<hr/>ضصثضصثض', '۱۳۹۳/۰۵/۲۶', '۱۷:۲۸:۳۱', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mtblslider`
--

CREATE TABLE IF NOT EXISTS `mtblslider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titr` text COLLATE utf8_persian_ci NOT NULL,
  `shorttext` text COLLATE utf8_persian_ci NOT NULL,
  `image` text COLLATE utf8_persian_ci NOT NULL,
  `link` text COLLATE utf8_persian_ci NOT NULL,
  `enabled` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `mtblslider`
--

INSERT INTO `mtblslider` (`id`, `titr`, `shorttext`, `image`, `link`, `enabled`) VALUES
(18, 'slider1', '', 'images/slider/1french-villa-exterior-8.jpg', '', 1),
(20, 'آپارتمان', '', 'images/slider/1Barcelona-Point-appartment-2.jpg', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mtblsubmenu`
--

CREATE TABLE IF NOT EXISTS `mtblsubmenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parentid` int(11) NOT NULL,
  `title` text COLLATE utf8_persian_ci NOT NULL,
  `link` text COLLATE utf8_persian_ci NOT NULL,
  `keywords` text COLLATE utf8_persian_ci NOT NULL,
  `description` text COLLATE utf8_persian_ci NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=95 ;

--
-- Dumping data for table `mtblsubmenu`
--

INSERT INTO `mtblsubmenu` (`id`, `parentid`, `title`, `link`, `keywords`, `description`, `parent`) VALUES
(86, 3, 'املاک مسکونی', '', '', '', 0),
(87, 3, 'املاک تجاری', '', '', '', 0),
(88, 3, 'آپارتمان', '', '', '', 86),
(89, 3, 'ویلا', '', '', '', 86),
(90, 3, 'کلنگی', '', '', '', 86),
(91, 3, 'مبله', '', '', '', 86),
(92, 3, 'دفتر کار', '', '', '', 87),
(93, 3, 'مغازه', '', '', '', 87);

-- --------------------------------------------------------

--
-- Table structure for table `mtbluser`
--

CREATE TABLE IF NOT EXISTS `mtbluser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_persian_ci NOT NULL,
  `username` text COLLATE utf8_persian_ci NOT NULL,
  `password` text COLLATE utf8_persian_ci NOT NULL,
  `city` text COLLATE utf8_persian_ci NOT NULL,
  `address` text COLLATE utf8_persian_ci NOT NULL,
  `tel` text COLLATE utf8_persian_ci NOT NULL,
  `mobil` text COLLATE utf8_persian_ci NOT NULL,
  `type` text COLLATE utf8_persian_ci NOT NULL,
  `confirm` tinyint(4) NOT NULL DEFAULT '0',
  `enabled` tinyint(4) NOT NULL DEFAULT '0',
  `mail` text COLLATE utf8_persian_ci NOT NULL,
  `ad_code` text COLLATE utf8_persian_ci NOT NULL,
  `sh_hesab` text COLLATE utf8_persian_ci NOT NULL,
  `price` double NOT NULL DEFAULT '0',
  `start_date` text COLLATE utf8_persian_ci NOT NULL,
  `almasi_date` text COLLATE utf8_persian_ci NOT NULL,
  `moaref` text COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=44 ;

--
-- Dumping data for table `mtbluser`
--

INSERT INTO `mtbluser` (`id`, `name`, `username`, `password`, `city`, `address`, `tel`, `mobil`, `type`, `confirm`, `enabled`, `mail`, `ad_code`, `sh_hesab`, `price`, `start_date`, `almasi_date`, `moaref`) VALUES
(43, 'کامران هادی زاده', 'kamran', 'kamran', '', '', '', '', '', 1, 1, 'kamran@yahoo.com', '', '', 0, '۱۳۹۳/۰۳/۱۰', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `sbtblstores`
--

CREATE TABLE IF NOT EXISTS `sbtblstores` (
  `ID` int(11) NOT NULL,
  `Title` text CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `Enabled` int(11) NOT NULL,
  `UserName` text CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `Password` text CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `ManagerName` text CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `ManagerMail` text CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `Tel` text CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `Mobile1` text CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `LastUpdate` text CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `Logo` text CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `Status` text CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `Address` text CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `VisitEnabled` int(11) NOT NULL,
  `Tags` text CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `WebAddress` text CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `AboutUs` longtext CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `daramad` longtext CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `almasi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `bardasht` longtext CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `charge` longtext CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `price_almasi` bigint(20) NOT NULL DEFAULT '0',
  `price_first` bigint(20) NOT NULL DEFAULT '0',
  `ContactUs` longtext CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sbtblstores`
--

INSERT INTO `sbtblstores` (`ID`, `Title`, `Enabled`, `UserName`, `Password`, `ManagerName`, `ManagerMail`, `Tel`, `Mobile1`, `LastUpdate`, `Logo`, `Status`, `Address`, `VisitEnabled`, `Tags`, `WebAddress`, `AboutUs`, `daramad`, `almasi`, `bardasht`, `charge`, `price_almasi`, `price_first`, `ContactUs`, `description`) VALUES
(1, 'بنگاه املاک نویان', 1, 'admin', 'admin', '', 'info@noyaan.ir', '', '', '', 'images/logo/1home.png', '', 'اشنویه ', 1, 'کلمات کلیدی', 'http://www.noyaan.ir', '<h5 dir="rtl" style="text-align:justify"><span style="font-family:verdana; font-size:12pt">اين سامانه با بكار گيري به روز ترين فناوري ها و تكنولوژي هاي حال حاضر و گرد اوري متخصصين و مشاورين حرفه اي مسكن در خود توانسته خدمات شايان و بي نظيري را به كاربران محترم خود اريه نمايد.</span></h5>\r\n\r\n<h5 dir="rtl" style="text-align:justify"><span style="font-family:verdana; font-size:12pt; line-height:1.2">.</span></h5>\r\n', '', '', '', '', 0, 0, '<p style="text-align:center"><span style="color:#006400"><span style="font-family:tahoma,geneva,sans-serif"><span style="font-size:14px">شما می توانید از طریق این فرم با ما در تماس باشید</span></span></span></p>\r\n', 'توضیحات چند جمله ای در مورد سایت');

-- --------------------------------------------------------

--
-- Table structure for table `viewsite`
--

CREATE TABLE IF NOT EXISTS `viewsite` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `All` bigint(20) NOT NULL,
  `Day` int(11) NOT NULL,
  `LastDay` int(11) NOT NULL,
  `LastDate` text COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=32 ;

--
-- Dumping data for table `viewsite`
--

INSERT INTO `viewsite` (`ID`, `All`, `Day`, `LastDay`, `LastDate`) VALUES
(0, 1987, 75, 2, '۱۳۹۴/۰۲/۰۷');
