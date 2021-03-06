-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 09, 2021 at 04:19 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toidibansource`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `a336x280` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `a728x90` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `a468x60` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `a300x250` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `a250x250` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `a160x600` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `qc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cateid` int(11) NOT NULL,
  `catename` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cateid`, `catename`) VALUES
(1, 1, 'Mobile'),
(2, 2, 'Webgame'),
(3, 3, 'Client'),
(4, 4, 'Linux'),
(5, 5, 'Centos');

-- --------------------------------------------------------

--
-- Table structure for table `counter_ips`
--

CREATE TABLE `counter_ips` (
  `ip` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `visit` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `counter_ips`
--

INSERT INTO `counter_ips` (`ip`, `visit`) VALUES
('127.0.0.1', '2021-04-09 23:10:17');

-- --------------------------------------------------------

--
-- Table structure for table `counter_values`
--

CREATE TABLE `counter_values` (
  `id` bigint(11) NOT NULL,
  `day_id` bigint(11) NOT NULL,
  `day_value` bigint(11) NOT NULL,
  `yesterday_id` bigint(11) NOT NULL,
  `yesterday_value` bigint(11) NOT NULL,
  `week_id` bigint(11) NOT NULL,
  `week_value` bigint(11) NOT NULL,
  `month_id` bigint(11) NOT NULL,
  `month_value` bigint(11) NOT NULL,
  `year_id` bigint(11) NOT NULL,
  `year_value` bigint(11) NOT NULL,
  `all_value` bigint(11) NOT NULL,
  `record_date` datetime NOT NULL,
  `record_value` bigint(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

--
-- Dumping data for table `counter_values`
--

INSERT INTO `counter_values` (`id`, `day_id`, `day_value`, `yesterday_id`, `yesterday_value`, `week_id`, `week_value`, `month_id`, `month_value`, `year_id`, `year_value`, `all_value`, `record_date`, `record_value`) VALUES
(1, 98, 241, 97, 0, 14, 349, 4, 654, 2021, 654, 2245, '2019-12-20 23:16:32', 405);

-- --------------------------------------------------------

--
-- Table structure for table `noti_log`
--

CREATE TABLE `noti_log` (
  `id` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `type` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `noti_status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `noti_log`
--

INSERT INTO `noti_log` (`id`, `username`, `content`, `time`, `type`, `noti_status`) VALUES
(22, 'hipcute', 'You have successfully purchased the game ?????????????????????????????? ?????? ??????', '2019-12-16 18:07:00', 'Store', 1),
(23, 'hipcute', 'You have successfully purchased the game ?????????????????????????????? ?????? ??????', '2019-12-16 18:08:06', 'Store', 1),
(24, 'hipcute', 'You have successfully purchased the game ???????????????????????????????????? ?????? ?????? ??????', '2019-12-16 18:08:49', 'Store', 1),
(25, 'hipcute', 'You have successfully purchased the game ????????????????????????????????? ???????????? ?????? ??????', '2019-12-16 18:24:14', 'Store', 1),
(26, 'hipcute', 'You have successfully purchased the game Game 2??????????????????????????????????????? ???????????? 18??????', '2019-12-16 18:24:57', 'Store', 1),
(27, 'hipcute', 'You have successfully purchased the game ??????????????????????????? ?????? ??????', '2019-12-18 03:46:13', 'Store', 1),
(28, 'hipcute', 'You have successfully purchased the game ??????????????????200?????? ???????????? ????????????', '2019-12-18 04:14:38', 'Store', 1),
(29, 'hipcute', 'You have successfully purchased the game ??????????????????????????? ?????? ??????22', '2019-12-18 04:26:21', 'Store', 1),
(30, 'hipcute', 'You have successfully purchased the game ???????????????999????????? ?????? ?????? ?????? ??????', '2019-12-18 04:50:16', 'Store', 1),
(31, 'hipcute', 'You have successfully purchased the game ?????????H5?????????????????? ?????? ?????? ??????', '2019-12-18 04:51:35', 'Store', 1),
(32, 'hipcute', 'You have successfully purchased the game ???????????????????????????????????????', '2019-12-18 06:18:17', 'Store', 1),
(33, 'hipcute', 'You have successfully purchased the Premium package', '2019-12-18 06:31:25', 'Store', 1),
(34, 'hipcute', 'You have successfully purchased the Premium package', '2019-12-19 11:05:30', 'Store', 1),
(35, 'hipcute', 'You have successfully purchased the Premium package', '2019-12-19 11:05:36', 'Store', 1),
(36, 'hipcute', 'You have successfully purchased the Premium package', '2019-12-19 11:05:55', 'Store', 1),
(37, 'minhtieptvc', 'You have successfully purchased the Premium package', '2019-12-20 03:17:26', 'Store', 1),
(38, '', 'You have successfully purchased 100 Scoin', '2019-12-20 13:08:40', 'Systems', 1),
(39, 'hipcute', 'You have successfully purchased 100 Scoin', '2019-12-20 13:26:10', 'Systems', 1),
(40, 'minhtieptvc1', 'You have successfully purchased 100 Scoin', '2019-12-20 13:45:48', 'Systems', 1),
(41, 'hipcute', 'You have successfully purchased the game H&agrave;nh Tr&igrave;nh Ph????ng T&acirc;y', '2019-12-25 13:55:27', 'Store', 1),
(42, 'hipcute', 'You have successfully purchased the game H&agrave;nh Tr&igrave;nh Ph????ng T&acirc;y', '2020-01-06 15:12:33', 'Store', 1),
(43, 'tungtung111r', 'You have successfully purchased the game H&agrave;nh Tr&igrave;nh Ph????ng T&acirc;y', '2021-04-04 13:33:33', 'Store', 1),
(44, 'tungtung111r', 'You have successfully purchased the game Phi Ti&ecirc;n Mobile', '2021-04-04 13:33:51', 'Store', 1),
(45, 'tungtung111r', 'You have successfully purchased the Premium package', '2021-04-04 13:34:35', 'Store', 1),
(46, 'tungtung111r', 'You have successfully purchased the Premium package', '2021-04-04 13:35:19', 'Store', 1),
(47, 'tungtung111r', 'You have successfully purchased the Premium package', '2021-04-04 13:49:44', 'Store', 1),
(48, 'tungtung111r', 'You have successfully purchased the Premium package', '2021-04-04 13:50:26', 'Store', 1),
(49, '1711061471', 'You have successfully purchased the game H&agrave;nh Tr&igrave;nh Ph????ng T&acirc;y', '2021-04-04 13:59:33', 'Store', 1),
(50, '1711061471', 'You have successfully purchased the Premium package', '2021-04-04 14:07:43', 'Store', 1),
(51, '1711061471', '<p>CHafo em anh dung day tu chieu</p>\r\n', '2021-04-06 11:33:39', 'Systems', 1);

-- --------------------------------------------------------

--
-- Table structure for table `paypal_history`
--

CREATE TABLE `paypal_history` (
  `id` int(11) NOT NULL,
  `paymentid` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `payerid` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pid` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `gameid` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `paydate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paypal_history`
--

INSERT INTO `paypal_history` (`id`, `paymentid`, `payerid`, `pid`, `gameid`, `paydate`) VALUES
(31, 'PAYID-MBYGBPA5CG54205UV663453E', '3T6NPR96EGLTG', 'LPN45', '14', '2021-04-09 14:12:48');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `createdate` datetime NOT NULL,
  `updatedate` datetime NOT NULL,
  `img` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `linkdown` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `linkdemo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `videoreviews` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tag` int(11) NOT NULL,
  `tutorials` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `keyword` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prices` int(11) NOT NULL,
  `soldnum` int(11) NOT NULL,
  `reactnum` int(11) NOT NULL,
  `lovenum` int(11) NOT NULL,
  `hahanum` int(11) NOT NULL,
  `wownum` int(11) NOT NULL,
  `sadnum` int(11) NOT NULL,
  `angrynum` int(11) NOT NULL,
  `viewsnum` int(11) NOT NULL,
  `sku` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `createdate`, `updatedate`, `img`, `author`, `linkdown`, `linkdemo`, `videoreviews`, `tag`, `tutorials`, `keyword`, `prices`, `soldnum`, `reactnum`, `lovenum`, `hahanum`, `wownum`, `sadnum`, `angrynum`, `viewsnum`, `sku`, `quantity`) VALUES
(14, 'Phi Ti&ecirc;n Mobile', '<p style=\"text-align:center\"><span style=\"font-size:18px\">PHI TI&Ecirc;N MOBILE</span></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:18px\">-N???n Linux Centos 6.5<br />\r\n-C???u h&igrave;nh ????? ngh??? :&nbsp;2core -4Gb - 50Gb&nbsp;Hard Drive&nbsp;</span></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:18px\">-Soft C???n : Xshell 6 , WinScp , Navicat , Notepad ++&nbsp; , APK&nbsp; easy tools , Pass Gi???i n&eacute;n m???c ?????nh toidibansource.com</span></p>\r\n', '2019-11-22 12:43:10', '2019-12-20 12:08:57', 'https://i0.wp.com/uphinh.org/images/2019/12/24/123.png', 'LoUisBin', 'https://drive.google.com/file/d/1HxBQjAzDGn46vIH9ypxNVEPznMnzxZNN/view?usp=sharing', 'https://www.facebook.com/Javhd2160pixelkhongche', 'https://www.youtube.com/watch?v=qaFnqmfVz4M', 1, '<p>B?????c 1 : C&agrave;i ?????t&nbsp;yum install -y wget &amp;&amp; wget -O install.sh http://download.bt.cn/install/install.sh &amp;&amp; sh install.sh sau khi c&agrave;i xong truy c???p v&agrave;o panel qu???n l&iacute; ti???n h&agrave;nh c&agrave;i ?????t [Nginx+MySQL5.5+php5.4]</p>\r\n\r\n<p>B?????c 2 : S??? d???ng WinScp k???t n???i v???i server V&agrave;o th?? m???c Root , Coppy t???p tin&nbsp;jlxz.tar.gz v&agrave;o th?? m???c <span style=\"color:#e67e22\"><em><strong>Root .</strong></em></span><em><strong> </strong></em><strong>Sau khi Coppy&nbsp; xong g&otilde; l???nh&nbsp;tar zxvf jlxz.tar.gz tr&ecirc;n xshell ????? gi???i n&eacute;n t???p tin</strong></p>\r\n\r\n<p>B?????c 3 : Th???c hi???n c&aacute;c bi???n&nbsp;v???i l???nh sau g&otilde; tr&ecirc;n xshell&nbsp;&nbsp;:&nbsp;echo &#39;export LD_LIBRARY_PATH=$LD_LIBRARY_PATH:/root/data/lib/&#39; &gt;&gt; ~/.bashrc<br />\r\nsource ~/.bashrc</p>\r\n\r\n<p>B?????c 4 : S???a ?????i IP ??? T???p Tin c???u h&igrave;nh trong foder source :&nbsp;T&igrave;m D&ograve;ng&nbsp;c_telecom_ip=&quot;<span style=\"color:#e67e22\">106.13.169.18</span>&quot; V&agrave; ?????i ip th&agrave;nh ip c???a b???n . S???a ?????i M???t Kh???u Panel tr&ecirc;n d&ograve;ng&nbsp;GAME_DB_PWD_DEVEL=&quot;<span style=\"color:#e67e22\">2be17c08a5c693c5</span>&quot; th&agrave;nh m???t kh???u b???n mu???n ?????t , Sau ??&oacute; coppy 3 file<span style=\"background-color:#e74c3c\"> &quot; init.sh , start.sh , stop.sh &quot;&nbsp;</span>&nbsp;theo ???????ng d???n&nbsp;/root/data_yy/init.sh ( Tr&ecirc;n Winscp )</p>\r\n\r\n<p>B?????c 5 : Truy c???p v&agrave;o Pannel T???o ???????ng d???n Trang web&nbsp; sau ??&oacute; d&ugrave;ng winscp v&agrave;o ???????ng d???n www/wwwrot/ IP c???a b???n/ coppy to&agrave;n b??? n???i dung api trong source b???n ??&atilde; t???i v??? v&agrave;o ??&oacute; . Sau khi coppy xong b???n v&agrave;o ???????ng d???n&nbsp;www/wwwrot/ IP c???a b???n/11111gameapi/ ????? s???a IP c???a T???p tin&nbsp;and_query.php ,&nbsp; ios_query.php v&agrave;&nbsp;loginapi.php ( s???a c??? m???t kh???u db c???a b???n ??? t???p tin&nbsp; loginapi&nbsp; th&agrave;nh m???t kh???u b???n ??&atilde; ?????t ??? B?????c 4 &quot; d&ograve;ng $db_password=&#39;mk&#39; &quot;&nbsp;)</p>\r\n\r\n<p>B?????c 6 : Sau Khi L&agrave;m C&aacute;c B?????c Tr&ecirc;n xong Quay tr??? l???i xshell g&otilde; l???nh&nbsp;cd /root/data_yy<br />\r\nls<br />\r\n./init.sh 1</p>\r\n\r\n<p>B?????c 7 : Ch???y L???nh ??? B?????c 6&nbsp;Xong g&otilde; ti???p :&nbsp;cd /root/data_yy/mg1/data/publish_release<br />\r\n./stop.sh</p>\r\n\r\n<p>B?????c 8:&nbsp;Ch???y L???nh ??? B?????c 7&nbsp;Xong g&otilde; ti???p : mysql -uroot -p123456 (?????i 123456 th&agrave;nh m???t kh???u b???n ??&atilde; ?????t)</p>\r\n\r\n<p>B?????c 9:&nbsp;Ch???y L???nh ??? B?????c 8&nbsp;Xong g&otilde; ti???p :&nbsp;grant all privileges on *.* to &#39;root&#39;@&#39;%&#39; identified by &#39;123456&#39;;&nbsp;(?????i 123456 th&agrave;nh m???t kh???u b???n ??&atilde; ?????t)</p>\r\n\r\n<p>B?????c 10 : Ch???y L???nh ??? B?????c 9&nbsp;Xong g&otilde; ti???p : flush privileges ???n enter sau ??&oacute; g&otilde; quit</p>\r\n\r\n<p>B?????c 11 :&nbsp;M??? Web&nbsp;Pannel qu???n l&iacute; v&agrave; m??? port cho server&nbsp; (port 1:65535&nbsp; . 1 )&nbsp;B???t&nbsp;Navicat k???t n???i v???i m&aacute;y ch??? c???a b???n t???o 1 table m???i c&oacute; t&ecirc;n login r???i nh???p t???p tin&nbsp;login.sql v&agrave;o.</p>\r\n\r\n<p>B?????c 12: d&ugrave;ng ph???n m???m APK EASY TOOLS&nbsp; DECOMPILE file phi tien mobile.apk ra s???a ip ??? t???p tin &quot;AndroidManifest.xml&nbsp;&quot; v&agrave; &quot;agent_login_view.lua theo ???????ng d???n assetsdatascriptsagentdev&quot; sau khi s???a xong&nbsp;COMPILE n&oacute; l???i</p>\r\n\r\n<p>B?????c 13 : D&ugrave;ng L???nh&nbsp;cd /root/data_yy/mg1/data/publish_release<br />\r\n./start.sh ????? ch???y&nbsp;server</p>\r\n', 'Mobile', 100000, 2, 107, 4, 5, 2, 5, 1, 268, 'LPN45', NULL),
(17, 'H&agrave;nh Tr&igrave;nh Ph????ng T&acirc;y', '<p style=\"text-align:center\"><span style=\"font-size:28px\">H&Agrave;NH TR&Igrave;NH PH????NG T&Acirc;Y</span></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:28px\">Y&Ecirc;U C???U : CENTOS 7.2</span></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:28px\">PH???N M???M : XSHELL 6 , WINSCP , NOTEPAD++ , APKIDE3.3 , UNCODE</span></p>\r\n', '2019-12-24 04:31:24', '2019-12-24 05:18:17', 'https://i0.wp.com/uphinh.org/images/2019/12/24/123.png', 'LoUisBin', '', '', 'https://www.youtube.com/watch?v=TuA41xPhJwM', 1, '<p style=\"text-align:center\"><span style=\"color:#d35400\">H?????NG D???N CHI TI???T</span></p>\r\n\r\n<p>B?????c 1 : D&ugrave;ng l???nh :&nbsp;yum install -y wget &amp;&amp; wget -O install.sh http://download.bt.cn/install/install.sh &amp;&amp; sh install.sh . Tr&ecirc;n xshell 6 .&nbsp;&nbsp;????? c&agrave;i ?????t tr&igrave;nh qu???n l&iacute;.</p>\r\n\r\n<p>B?????c 2 : Sau khi c&agrave;i ?????t b?????c 1 xong , Truy c???p v&agrave;o trang qu???n l&iacute;&nbsp;th???c hi???n c&agrave;i ?????t soft sau : ngx1.14 , mysql 5.6 . php 5.6&nbsp;</p>\r\n\r\n<p>B?????c 3 : M??? port cho server 1:65535</p>\r\n\r\n<p>B?????c 4 : Coppy T???p tin&nbsp;toidibansource v&agrave;o WinScp&nbsp; ( <span style=\"color:#c0392b\">/*.* </span>)</p>\r\n\r\n<p>B?????c 5 : V&agrave;o Tr&igrave;nh qu???n l&iacute; t&igrave;m ?????n t???p tin b???n v???a coppy l&ecirc;n v&agrave;&nbsp;&nbsp;gi???i n&eacute;n t???p tin . ( ho???c b???n c&oacute; th??? th???c hi???n theo c&aacute;ch n&agrave;y&nbsp;: b???n gi???i n&eacute;n lu&ocirc;n t???p&nbsp;toidibansource tr&ecirc;n m&aacute;y b???n r???i coppy l&ecirc;n winscp th&igrave; kh&ocirc;ng c???n ph???i l&agrave;m th&ecirc;m b?????c 5 &quot; nh??ng m&igrave;nh kh&ocirc;ng khuy???n kh&iacute;ch l&agrave;m theo c&aacute;ch n&agrave;y v&igrave; khi b???n gi???i n&eacute;n ra m&aacute;y b???n r???i coppy l&ecirc;n th&igrave; t???p tin kh&aacute; n???ng vi???c upload l&ecirc;n kh&aacute; l&acirc;u v&agrave; c&oacute; th??? x???y ra l???i kh&ocirc;ng mong mu???n )<br />\r\nB?????c 6 : D&ugrave;ng 3 l???nh sau ????? lo???i b??? firewall<br />\r\n-1:&nbsp;systemctl status firewalld<br />\r\n-2:&nbsp;systemctl stop firewalld<br />\r\n-3:&nbsp;systemctl disable firewalld</p>\r\n\r\n<p>B?????c 7 : C&agrave;i ?????t Soft :&nbsp;yum -y install gcc gcc-c++</p>\r\n\r\n<p>B?????c 8 : D&ugrave;ng Nh???ng L???nh Sau<br />\r\n-1 :&nbsp;yum install make -y<br />\r\n-2 :&nbsp;yum install readline-devel.x86_64 -y<br />\r\n-3 :&nbsp;cd /home/lua-5.2.3<br />\r\n-4 :&nbsp;make linux<br />\r\n-5 :&nbsp;make install<br />\r\nB?????c 9 : t???o t&agrave;i kho???n mysql b???ng l???nh&nbsp; :<br />\r\n&nbsp;mysql -uroot -p123456 ( thay 123456 = Mk c???a b???n )<br />\r\n-&nbsp;grant all privileges on *.* to &#39;root&#39;@&#39;%&#39; identified by &#39;123456&#39;;&nbsp; &nbsp;( 123456 ??? tr&ecirc;n b???n ?????t l&agrave; g&igrave; th&igrave; v???i l???nh n&agrave;y b???n thay gi???ng h???t nh?? v???y )<br />\r\n-&nbsp;quit<br />\r\nB?????c 10 : M??? navicat k???t n???i v???i Centos c???a b???n T???o m???t table t&ecirc;n&nbsp;<span style=\"color:#c0392b\">sdktest</span>&nbsp;sau ??&oacute; nh???p file&nbsp;sdktest.sql v&agrave;o<br />\r\nB?????c 11 : D&ugrave;ng 3 l???nh sau ????? c???p quy???n&nbsp; chmod<br />\r\n1 :&nbsp;chmod -R 777 /home<br />\r\n2 :&nbsp;chmod -R 777 /usr/local<br />\r\n3 :&nbsp;chmod -R 777 /root</p>\r\n\r\n<p>B?????c 11 : D&ugrave;ng Winscp v&agrave;o ???????ng d???n&nbsp;/home/nomogaserver/accountcenter/src/gamelogic/config/serverlists S???a IP ??? t???p tin c&oacute; t&ecirc;n&nbsp;serverlistxiyou_final_md.lua ( Thay Th&agrave;nh IP Centos c???a b???n ) V&agrave; t???p tin&nbsp;ver_test.txt ??? ???????ng d???n&nbsp;/www/wwwroot/xiyou&nbsp; ( C??ng&nbsp;&nbsp;S???a IP )</p>\r\n\r\n<p>B?????c 12 : D&ugrave;ng L???nh&nbsp;<br />\r\n1 : Start :&nbsp;cd /root<br />\r\n./qd<br />\r\n2 : Stop :&nbsp;cd /root<br />\r\n./gb</p>\r\n\r\n<p style=\"text-align:center\"><span style=\"color:#d35400\">S???A IP APK</span></p>\r\n\r\n<p>B?????c 1 : D&ugrave;ng Ph???n M???m APKIDE 3.3 ????? Gi???i n&eacute;n t???p tin APK ra<br />\r\nB?????c 2 : S???a IP ??? t???p tin&nbsp;AndroidManifest.xml , Theo ???????ng d???n&nbsp;com.mh.dfxyAndroidManifest.xml ( L&agrave; Foder b???n v???a gi???i n&eacute;n apk ) ( S???a ??? d&ograve;ng &quot;&nbsp;<br />\r\nB?????c 3 : V&agrave;o ???????ng d???n&nbsp;com.mh.dfxyassets es B???n s??? th???y 1 t???p .zip b???n m??? n&oacute; v???i Winrar K&eacute;o xu???ng d?????i c&oacute; t???p t&ecirc;n&nbsp;Update.GameUpdate B???n k&eacute;o file n&agrave;y ra 1 th?? m???c ho???c Deskop c???a b???n d&ugrave;ng ph???n m???m uncode ????? gi???i m&atilde; n&oacute; v&agrave; ch???nh s???a ip c???a b???n trong ??&oacute; , khi s???a xong b???n th??? l???i n&oacute; v&agrave;o t???p zip&nbsp; ( Ph???n n&agrave;y b???n n&agrave;o kh&ocirc;ng hi???u li&ecirc;n h??? tr???c ti???p Admin ????? nc r&otilde; h??n ) Sau khi xong c&aacute;c b???n n&eacute;n t???p APk l???i v&agrave; ch???y.</p>\r\n', 'Mobile,Webgame,Client,Linux,Centos', 120000, 4, 1, 1, 0, 0, 0, 0, 196, 'wristWear03', NULL),
(19, 'TOOLS APK', '<p style=\"text-align:center\"><span style=\"color:#d35400\">APKIDE V3.3</span></p>\r\n', '2019-12-24 06:29:26', '2019-12-24 06:29:26', 'https://i0.wp.com/uphinh.org/images/2019/12/24/80850440_1367872433390470_7251888250199998464_n.png', 'LoUisBin', 'https://drive.google.com/file/d/1Mkk7bGVfaQF-k9338GEWQOY4QhOXv11s/view?usp=sharing', '', '', 1, '<p style=\"text-align:center\"><span style=\"color:#d35400\">H?????NG D???N</span></p>\r\n\r\n<p style=\"text-align:center\">Ch???n ???????ng d???n t???i&nbsp;ApkIDE3.3ApkIDEjdk1.7.0_45</p>\r\n\r\n<p style=\"text-align:center\">K&eacute;o th??? file APK v&agrave;o ph???n m???m ????? gi???i n&eacute;n</p>\r\n\r\n<p style=\"text-align:center\">Nh???n V&agrave;o ch??? B v&agrave; ch???n d&ograve;ng ?????u ti&ecirc;n ????? n&eacute;n l???i</p>\r\n', 'Mobile,Webgame,Client,Linux,Centos', 120000, 0, 0, 3, 0, 0, 0, 0, 316, 'USB02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `premium_history`
--

CREATE TABLE `premium_history` (
  `id` int(11) NOT NULL,
  `buyer` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `paydate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `premium_history`
--

INSERT INTO `premium_history` (`id`, `buyer`, `paydate`) VALUES
(0, 'hipcute', '2019-12-18 06:31:25');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_history`
--

CREATE TABLE `purchase_history` (
  `idgame` int(11) NOT NULL,
  `namegame` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `buyer` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `paydate` datetime DEFAULT NULL,
  `prices` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `purchase_history`
--

INSERT INTO `purchase_history` (`idgame`, `namegame`, `buyer`, `paydate`, `prices`) VALUES
(17, 'H&agrave;nh Tr&igrave;nh Ph????ng T&acirc;y', 'hipcute', '2020-01-06 15:12:33', 120000),
(17, 'H&agrave;nh Tr&igrave;nh Ph????ng T&acirc;y', '1711061471', '2021-04-04 13:59:33', 120000),
(17, 'H&agrave;nh Tr&igrave;nh Ph????ng T&acirc;y', 'tester', '2021-04-09 08:39:16', 120000),
(14, 'Phi Ti&ecirc;n Mobile', 'tester', '2021-04-09 08:39:16', 100000),
(14, 'Phi Ti&ecirc;n Mobile', 'tungtung111r', '2021-04-09 14:12:48', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE `themes` (
  `imghead` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `imgheadlight` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `imgheadlogin` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`imghead`, `imgheadlight`, `imgheadlogin`) VALUES
('https://i.imgur.com/DCfHyXL.png', 'https://i.imgur.com/ok1Y2yw.png', 'https://i.imgur.com/DCfHyXL.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `level` tinyint(4) NOT NULL DEFAULT '0',
  `money` int(11) NOT NULL DEFAULT '0',
  `point` int(11) NOT NULL DEFAULT '0',
  `img` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `package` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`, `level`, `money`, `point`, `img`, `package`) VALUES
(5, 'hipcute', 'UEVvbHQ0QlkwSGxUdE9PQkFaK0x6dz09', 'Hypers ?????p Trai Nh???t S&agrave;i G&ograve;n', 'tnk.h1k9@gmail.com', 1, 755042, 22, 'https://i.imgur.com/YTrinkV.jpg', 'standard'),
(6, 'minhtieptvc', 'Y1pkUHA1SElYRkpxcDlRNFZybWExVzdlOCt4S0tyUUtYZ2xJWEwvZk0yWT0=', 'Minh Ti???p', 'binn.single1994@gmail.com', 1, 0, 0, '', 'premium'),
(7, 'cuduy3000', 'VURsUWR0N1dtTzRDem1LbFlUTVpvMS9xcTQ5dFUxbW1hU2V0RkorZ2QzZz0=', 'duy tran', 'cuduy3000@gmail.com', 0, 0, 0, '', 'basic'),
(8, 'minhtiep12', 'UEVvbHQ0QlkwSGxUdE9PQkFaK0x6dz09', 'ksssssssssssss', 'tnk.h1k912@gmail.com', 0, 0, 0, '', 'basic'),
(9, 'minhtieptvc1', 'Y1pkUHA1SElYRkpxcDlRNFZybWExZExaSUxka3piaTE3RVk0ejBhS09GUT0=', 'minhtieptvc1', 'nhungpham0391@gmail.com', 0, 100, 0, '', 'standard'),
(10, 'tungtung', 'T2lCWDY0ak9hZkw0dkg0NXF0US9zdz09', 'V?? Xu??n T??ng', 'tinhla0co@gmail.com', 0, 0, 0, '', 'basic'),
(11, 'bebotsiungu', 'aXI5SUd2WitEM09PV0JVMUFGY2hNOHVlckFVMGErbEhKTGJLN3lBNnkyND0=', 'minhthom0000', 'minhducqng17902@gmail.com', 0, 0, 0, '', 'basic'),
(12, 'quangoc631', 'Y0lKeEVJL3hhQVVuTllBM085cGJkUT09', 'Ng???c Quang', 'quangoc631@gmail.com', 0, 0, 0, '', 'basic'),
(13, 'phucvu93vn', 'WnhFY0hESDlKN1FXcldCK0FPNFlDQ1JxRktpRnNocW9kSnZLYXNnWnpjZz0=', 'Testing3', 'phucvu93vn@gmail.com', 0, 0, 0, '', 'basic'),
(14, 'always186', 'eFRUTXNrL1lSYlZEeTlqSXU4SUYrZz09', 'Ho??ng V??n T???i', 'always186@gmail.com', 0, 0, 0, '', 'basic'),
(15, '1711061471', 'WGl2dXZKbkVhSjZnRVN6QlJhaWg2UT09', 'Xuan tung', 'tinhla0co99@gmail.com', 0, 22100536, 0, NULL, 'basic'),
(16, 'tungtung111r', 'UEVvbHQ0QlkwSGxUdE9PQkFaK0x6dz09', 'Xuan tung', 'tinhla0co6699@gmail.com', 0, 99773255, 0, 'https://i.imgur.com/LlP9ROo.png', 'basic');

-- --------------------------------------------------------

--
-- Table structure for table `website`
--

CREATE TABLE `website` (
  `webname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `admin` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `contact` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `alertlogin` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `alertreg` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `accessreg` tinyint(4) NOT NULL,
  `keyword` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `flood` tinyint(4) NOT NULL,
  `timeflood` int(4) NOT NULL,
  `linkfb` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `linktw` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `linktele` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `linkytb` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `linksky` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `linkin` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mess` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `apifb` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `apipage` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `weboff` tinyint(4) NOT NULL,
  `accesslogin` tinyint(4) NOT NULL,
  `icon` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `avatardefault` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `community` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `fanpage` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `premium_price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `website`
--

INSERT INTO `website` (`webname`, `logo`, `meta`, `admin`, `contact`, `url`, `alertlogin`, `alertreg`, `accessreg`, `keyword`, `flood`, `timeflood`, `linkfb`, `linktw`, `linktele`, `linkytb`, `linksky`, `linkin`, `mess`, `apifb`, `apipage`, `weboff`, `accesslogin`, `icon`, `avatardefault`, `community`, `fanpage`, `premium_price`) VALUES
('ToiDiBanSource', 'https://i.imgur.com/v1S5eHl.gif', 'SOURCE GAME', 'Hypers', 'https://www.facebook.com/javhd2160pixelkhongche', 'http://toidibansource.com', 'Sign In - We arouse passion from you', 'Sign Up - Share all game source code', 0, 'share code, share source, source game, code game, game source, source code, sciprt code, tool decode, tool encode, game android, gamemobile, game pc, game linux, server game, source server game, source code game', 1, 2, 'https://t.me/joinchat/AAAAAE9EB-P1c0GreWphrQ', 'https://t.me/joinchat/AAAAAE9EB-P1c0GreWphrQ', 'https://t.me/joinchat/AAAAAE9EB-P1c0GreWphrQ', 'https://t.me/joinchat/AAAAAE9EB-P1c0GreWphrQ', 'https://t.me/joinchat/AAAAAE9EB-P1c0GreWphrQ', 'https://t.me/joinchat/AAAAAE9EB-P1c0GreWphrQ', 'Website ??ang Trong Giai ??o???n Th??? Nghi???m                                     ', '474909426562710', '1905393333011873', 0, 0, 'https://i.imgur.com/5nPjAIh.png', 'https://i.imgur.com/80vdABk.png', NULL, NULL, 1686);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `counter_ips`
--
ALTER TABLE `counter_ips`
  ADD UNIQUE KEY `ip` (`ip`) USING BTREE;

--
-- Indexes for table `counter_values`
--
ALTER TABLE `counter_values`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `noti_log`
--
ALTER TABLE `noti_log`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `paypal_history`
--
ALTER TABLE `paypal_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `premium_history`
--
ALTER TABLE `premium_history`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `noti_log`
--
ALTER TABLE `noti_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `paypal_history`
--
ALTER TABLE `paypal_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
