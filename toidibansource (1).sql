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
(22, 'hipcute', 'You have successfully purchased the game 【千古传说】整理一键 教程 后台', '2019-12-16 18:07:00', 'Store', 1),
(23, 'hipcute', 'You have successfully purchased the game 【千古传说】整理一键 教程 后台', '2019-12-16 18:08:06', 'Store', 1),
(24, 'hipcute', 'You have successfully purchased the game 【西游伏妖篇】整理一键端 教程 双端 后台', '2019-12-16 18:08:49', 'Store', 1),
(25, 'hipcute', 'You have successfully purchased the game 【传奇世界】骑战先行版 视频教程 后台 双端', '2019-12-16 18:24:14', 'Store', 1),
(26, 'hipcute', 'You have successfully purchased the game Game 2【完美西游】暗黑西游互通版 充值后台 18角色', '2019-12-16 18:24:57', 'Store', 1),
(27, 'hipcute', 'You have successfully purchased the game 【极无双】整理手工 教程 后台', '2019-12-18 03:46:13', 'Store', 1),
(28, 'hipcute', 'You have successfully purchased the game 【御剑情缘】200级端 视频教程 授权后台', '2019-12-18 04:14:38', 'Store', 1),
(29, 'hipcute', 'You have successfully purchased the game 【极无双】整理手工 教程 后台22', '2019-12-18 04:26:21', 'Store', 1),
(30, 'hipcute', 'You have successfully purchased the game 【白日门】999单职业 光柱 特戒 教程 后台', '2019-12-18 04:50:16', 'Store', 1),
(31, 'hipcute', 'You have successfully purchased the game 【魔域H5】一键神话端 教程 多区 后台', '2019-12-18 04:51:35', 'Store', 1),
(32, 'hipcute', 'You have successfully purchased the game 【剑灵修真】美化版授权后台', '2019-12-18 06:18:17', 'Store', 1),
(33, 'hipcute', 'You have successfully purchased the Premium package', '2019-12-18 06:31:25', 'Store', 1),
(34, 'hipcute', 'You have successfully purchased the Premium package', '2019-12-19 11:05:30', 'Store', 1),
(35, 'hipcute', 'You have successfully purchased the Premium package', '2019-12-19 11:05:36', 'Store', 1),
(36, 'hipcute', 'You have successfully purchased the Premium package', '2019-12-19 11:05:55', 'Store', 1),
(37, 'minhtieptvc', 'You have successfully purchased the Premium package', '2019-12-20 03:17:26', 'Store', 1),
(38, '', 'You have successfully purchased 100 Scoin', '2019-12-20 13:08:40', 'Systems', 1),
(39, 'hipcute', 'You have successfully purchased 100 Scoin', '2019-12-20 13:26:10', 'Systems', 1),
(40, 'minhtieptvc1', 'You have successfully purchased 100 Scoin', '2019-12-20 13:45:48', 'Systems', 1),
(41, 'hipcute', 'You have successfully purchased the game H&agrave;nh Tr&igrave;nh Phương T&acirc;y', '2019-12-25 13:55:27', 'Store', 1),
(42, 'hipcute', 'You have successfully purchased the game H&agrave;nh Tr&igrave;nh Phương T&acirc;y', '2020-01-06 15:12:33', 'Store', 1),
(43, 'tungtung111r', 'You have successfully purchased the game H&agrave;nh Tr&igrave;nh Phương T&acirc;y', '2021-04-04 13:33:33', 'Store', 1),
(44, 'tungtung111r', 'You have successfully purchased the game Phi Ti&ecirc;n Mobile', '2021-04-04 13:33:51', 'Store', 1),
(45, 'tungtung111r', 'You have successfully purchased the Premium package', '2021-04-04 13:34:35', 'Store', 1),
(46, 'tungtung111r', 'You have successfully purchased the Premium package', '2021-04-04 13:35:19', 'Store', 1),
(47, 'tungtung111r', 'You have successfully purchased the Premium package', '2021-04-04 13:49:44', 'Store', 1),
(48, 'tungtung111r', 'You have successfully purchased the Premium package', '2021-04-04 13:50:26', 'Store', 1),
(49, '1711061471', 'You have successfully purchased the game H&agrave;nh Tr&igrave;nh Phương T&acirc;y', '2021-04-04 13:59:33', 'Store', 1),
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
(14, 'Phi Ti&ecirc;n Mobile', '<p style=\"text-align:center\"><span style=\"font-size:18px\">PHI TI&Ecirc;N MOBILE</span></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:18px\">-Nền Linux Centos 6.5<br />\r\n-Cấu h&igrave;nh đề nghị :&nbsp;2core -4Gb - 50Gb&nbsp;Hard Drive&nbsp;</span></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:18px\">-Soft Cần : Xshell 6 , WinScp , Navicat , Notepad ++&nbsp; , APK&nbsp; easy tools , Pass Giải n&eacute;n mặc định toidibansource.com</span></p>\r\n', '2019-11-22 12:43:10', '2019-12-20 12:08:57', 'https://i0.wp.com/uphinh.org/images/2019/12/24/123.png', 'LoUisBin', 'https://drive.google.com/file/d/1HxBQjAzDGn46vIH9ypxNVEPznMnzxZNN/view?usp=sharing', 'https://www.facebook.com/Javhd2160pixelkhongche', 'https://www.youtube.com/watch?v=qaFnqmfVz4M', 1, '<p>Bước 1 : C&agrave;i Đặt&nbsp;yum install -y wget &amp;&amp; wget -O install.sh http://download.bt.cn/install/install.sh &amp;&amp; sh install.sh sau khi c&agrave;i xong truy cập v&agrave;o panel quản l&iacute; tiến h&agrave;nh c&agrave;i đặt [Nginx+MySQL5.5+php5.4]</p>\r\n\r\n<p>Bước 2 : Sử dụng WinScp kết nối với server V&agrave;o thư mục Root , Coppy tệp tin&nbsp;jlxz.tar.gz v&agrave;o thư mục <span style=\"color:#e67e22\"><em><strong>Root .</strong></em></span><em><strong> </strong></em><strong>Sau khi Coppy&nbsp; xong g&otilde; lệnh&nbsp;tar zxvf jlxz.tar.gz tr&ecirc;n xshell để giải n&eacute;n tập tin</strong></p>\r\n\r\n<p>Bước 3 : Thực hiện c&aacute;c biến&nbsp;với lệnh sau g&otilde; tr&ecirc;n xshell&nbsp;&nbsp;:&nbsp;echo &#39;export LD_LIBRARY_PATH=$LD_LIBRARY_PATH:/root/data/lib/&#39; &gt;&gt; ~/.bashrc<br />\r\nsource ~/.bashrc</p>\r\n\r\n<p>Bước 4 : Sửa đổi IP ở Tệp Tin cấu h&igrave;nh trong foder source :&nbsp;T&igrave;m D&ograve;ng&nbsp;c_telecom_ip=&quot;<span style=\"color:#e67e22\">106.13.169.18</span>&quot; V&agrave; đổi ip th&agrave;nh ip của bạn . Sửa Đổi Mật Khẩu Panel tr&ecirc;n d&ograve;ng&nbsp;GAME_DB_PWD_DEVEL=&quot;<span style=\"color:#e67e22\">2be17c08a5c693c5</span>&quot; th&agrave;nh mật khẩu bạn muốn đặt , Sau đ&oacute; coppy 3 file<span style=\"background-color:#e74c3c\"> &quot; init.sh , start.sh , stop.sh &quot;&nbsp;</span>&nbsp;theo đường dẫn&nbsp;/root/data_yy/init.sh ( Tr&ecirc;n Winscp )</p>\r\n\r\n<p>Bước 5 : Truy cập v&agrave;o Pannel Tạo Đường dẫn Trang web&nbsp; sau đ&oacute; d&ugrave;ng winscp v&agrave;o đường dẫn www/wwwrot/ IP của bạn/ coppy to&agrave;n bộ nội dung api trong source bạn đ&atilde; tải về v&agrave;o đ&oacute; . Sau khi coppy xong bạn v&agrave;o đường dẫn&nbsp;www/wwwrot/ IP của bạn/11111gameapi/ để sửa IP của Tệp tin&nbsp;and_query.php ,&nbsp; ios_query.php v&agrave;&nbsp;loginapi.php ( sửa cả mật khẩu db của bạn ở tệp tin&nbsp; loginapi&nbsp; th&agrave;nh mật khẩu bạn đ&atilde; đặt ở Bước 4 &quot; d&ograve;ng $db_password=&#39;mk&#39; &quot;&nbsp;)</p>\r\n\r\n<p>Bước 6 : Sau Khi L&agrave;m C&aacute;c Bước Tr&ecirc;n xong Quay trở lại xshell g&otilde; lệnh&nbsp;cd /root/data_yy<br />\r\nls<br />\r\n./init.sh 1</p>\r\n\r\n<p>Bước 7 : Chạy Lệnh ở Bước 6&nbsp;Xong g&otilde; tiếp :&nbsp;cd /root/data_yy/mg1/data/publish_release<br />\r\n./stop.sh</p>\r\n\r\n<p>Bước 8:&nbsp;Chạy Lệnh ở Bước 7&nbsp;Xong g&otilde; tiếp : mysql -uroot -p123456 (đổi 123456 th&agrave;nh mật khẩu bạn đ&atilde; đặt)</p>\r\n\r\n<p>Bước 9:&nbsp;Chạy Lệnh ở Bước 8&nbsp;Xong g&otilde; tiếp :&nbsp;grant all privileges on *.* to &#39;root&#39;@&#39;%&#39; identified by &#39;123456&#39;;&nbsp;(đổi 123456 th&agrave;nh mật khẩu bạn đ&atilde; đặt)</p>\r\n\r\n<p>Bước 10 : Chạy Lệnh ở Bước 9&nbsp;Xong g&otilde; tiếp : flush privileges ấn enter sau đ&oacute; g&otilde; quit</p>\r\n\r\n<p>Bước 11 :&nbsp;Mở Web&nbsp;Pannel quản l&iacute; v&agrave; mở port cho server&nbsp; (port 1:65535&nbsp; . 1 )&nbsp;Bật&nbsp;Navicat kết nối với m&aacute;y chủ của bạn tạo 1 table mới c&oacute; t&ecirc;n login rồi nhập tập tin&nbsp;login.sql v&agrave;o.</p>\r\n\r\n<p>Bước 12: d&ugrave;ng phần mềm APK EASY TOOLS&nbsp; DECOMPILE file phi tien mobile.apk ra sửa ip ở tệp tin &quot;AndroidManifest.xml&nbsp;&quot; v&agrave; &quot;agent_login_view.lua theo đường dẫn assetsdatascriptsagentdev&quot; sau khi sửa xong&nbsp;COMPILE n&oacute; lại</p>\r\n\r\n<p>Bước 13 : D&ugrave;ng Lệnh&nbsp;cd /root/data_yy/mg1/data/publish_release<br />\r\n./start.sh để chạy&nbsp;server</p>\r\n', 'Mobile', 100000, 2, 107, 4, 5, 2, 5, 1, 268, 'LPN45', NULL),
(17, 'H&agrave;nh Tr&igrave;nh Phương T&acirc;y', '<p style=\"text-align:center\"><span style=\"font-size:28px\">H&Agrave;NH TR&Igrave;NH PHƯƠNG T&Acirc;Y</span></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:28px\">Y&Ecirc;U CẦU : CENTOS 7.2</span></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:28px\">PHẦN MỀM : XSHELL 6 , WINSCP , NOTEPAD++ , APKIDE3.3 , UNCODE</span></p>\r\n', '2019-12-24 04:31:24', '2019-12-24 05:18:17', 'https://i0.wp.com/uphinh.org/images/2019/12/24/123.png', 'LoUisBin', '', '', 'https://www.youtube.com/watch?v=TuA41xPhJwM', 1, '<p style=\"text-align:center\"><span style=\"color:#d35400\">HƯỚNG DẪN CHI TIẾT</span></p>\r\n\r\n<p>Bước 1 : D&ugrave;ng lệnh :&nbsp;yum install -y wget &amp;&amp; wget -O install.sh http://download.bt.cn/install/install.sh &amp;&amp; sh install.sh . Tr&ecirc;n xshell 6 .&nbsp;&nbsp;Để c&agrave;i đặt tr&igrave;nh quản l&iacute;.</p>\r\n\r\n<p>Bước 2 : Sau khi c&agrave;i đặt bước 1 xong , Truy cập v&agrave;o trang quản l&iacute;&nbsp;thực hiện c&agrave;i đặt soft sau : ngx1.14 , mysql 5.6 . php 5.6&nbsp;</p>\r\n\r\n<p>Bước 3 : Mở port cho server 1:65535</p>\r\n\r\n<p>Bước 4 : Coppy Tệp tin&nbsp;toidibansource v&agrave;o WinScp&nbsp; ( <span style=\"color:#c0392b\">/*.* </span>)</p>\r\n\r\n<p>Bước 5 : V&agrave;o Tr&igrave;nh quản l&iacute; t&igrave;m đến tập tin bạn vừa coppy l&ecirc;n v&agrave;&nbsp;&nbsp;giải n&eacute;n tập tin . ( hoặc bạn c&oacute; thể thực hiện theo c&aacute;ch n&agrave;y&nbsp;: bạn giải n&eacute;n lu&ocirc;n tệp&nbsp;toidibansource tr&ecirc;n m&aacute;y bạn rồi coppy l&ecirc;n winscp th&igrave; kh&ocirc;ng cần phải l&agrave;m th&ecirc;m bước 5 &quot; nhưng m&igrave;nh kh&ocirc;ng khuyến kh&iacute;ch l&agrave;m theo c&aacute;ch n&agrave;y v&igrave; khi bạn giải n&eacute;n ra m&aacute;y bạn rồi coppy l&ecirc;n th&igrave; tệp tin kh&aacute; nặng việc upload l&ecirc;n kh&aacute; l&acirc;u v&agrave; c&oacute; thể xảy ra lỗi kh&ocirc;ng mong muốn )<br />\r\nBước 6 : D&ugrave;ng 3 lệnh sau để loại bỏ firewall<br />\r\n-1:&nbsp;systemctl status firewalld<br />\r\n-2:&nbsp;systemctl stop firewalld<br />\r\n-3:&nbsp;systemctl disable firewalld</p>\r\n\r\n<p>Bước 7 : C&agrave;i đặt Soft :&nbsp;yum -y install gcc gcc-c++</p>\r\n\r\n<p>Bước 8 : D&ugrave;ng Những Lệnh Sau<br />\r\n-1 :&nbsp;yum install make -y<br />\r\n-2 :&nbsp;yum install readline-devel.x86_64 -y<br />\r\n-3 :&nbsp;cd /home/lua-5.2.3<br />\r\n-4 :&nbsp;make linux<br />\r\n-5 :&nbsp;make install<br />\r\nBước 9 : tạo t&agrave;i khoản mysql bằng lệnh&nbsp; :<br />\r\n&nbsp;mysql -uroot -p123456 ( thay 123456 = Mk của bạn )<br />\r\n-&nbsp;grant all privileges on *.* to &#39;root&#39;@&#39;%&#39; identified by &#39;123456&#39;;&nbsp; &nbsp;( 123456 ở tr&ecirc;n bạn đặt l&agrave; g&igrave; th&igrave; với lệnh n&agrave;y bạn thay giống hệt như vậy )<br />\r\n-&nbsp;quit<br />\r\nBước 10 : Mở navicat kết nối với Centos của bạn Tạo một table t&ecirc;n&nbsp;<span style=\"color:#c0392b\">sdktest</span>&nbsp;sau đ&oacute; nhập file&nbsp;sdktest.sql v&agrave;o<br />\r\nBước 11 : D&ugrave;ng 3 lệnh sau để cấp quyền&nbsp; chmod<br />\r\n1 :&nbsp;chmod -R 777 /home<br />\r\n2 :&nbsp;chmod -R 777 /usr/local<br />\r\n3 :&nbsp;chmod -R 777 /root</p>\r\n\r\n<p>Bước 11 : D&ugrave;ng Winscp v&agrave;o đường dẫn&nbsp;/home/nomogaserver/accountcenter/src/gamelogic/config/serverlists Sửa IP ở tệp tin c&oacute; t&ecirc;n&nbsp;serverlistxiyou_final_md.lua ( Thay Th&agrave;nh IP Centos của bạn ) V&agrave; tập tin&nbsp;ver_test.txt ở đường dẫn&nbsp;/www/wwwroot/xiyou&nbsp; ( Cũng&nbsp;&nbsp;Sửa IP )</p>\r\n\r\n<p>Bước 12 : D&ugrave;ng Lệnh&nbsp;<br />\r\n1 : Start :&nbsp;cd /root<br />\r\n./qd<br />\r\n2 : Stop :&nbsp;cd /root<br />\r\n./gb</p>\r\n\r\n<p style=\"text-align:center\"><span style=\"color:#d35400\">SỬA IP APK</span></p>\r\n\r\n<p>Bước 1 : D&ugrave;ng Phần Mềm APKIDE 3.3 Để Giải n&eacute;n tập tin APK ra<br />\r\nBước 2 : Sửa IP ở tệp tin&nbsp;AndroidManifest.xml , Theo đường dẫn&nbsp;com.mh.dfxyAndroidManifest.xml ( L&agrave; Foder bạn vừa giải n&eacute;n apk ) ( Sửa Ở d&ograve;ng &quot;&nbsp;<br />\r\nBước 3 : V&agrave;o đường dẫn&nbsp;com.mh.dfxyassets es Bạn sẽ thấy 1 tệp .zip bạn mở n&oacute; với Winrar K&eacute;o xuống dưới c&oacute; tệp t&ecirc;n&nbsp;Update.GameUpdate Bạn k&eacute;o file n&agrave;y ra 1 thư mục hoặc Deskop của bạn d&ugrave;ng phần mềm uncode để giải m&atilde; n&oacute; v&agrave; chỉnh sửa ip của bạn trong đ&oacute; , khi sửa xong bạn thả lại n&oacute; v&agrave;o tệp zip&nbsp; ( Phần n&agrave;y bạn n&agrave;o kh&ocirc;ng hiểu li&ecirc;n hệ trực tiếp Admin để nc r&otilde; hơn ) Sau khi xong c&aacute;c bạn n&eacute;n tệp APk lại v&agrave; chạy.</p>\r\n', 'Mobile,Webgame,Client,Linux,Centos', 120000, 4, 1, 1, 0, 0, 0, 0, 196, 'wristWear03', NULL),
(19, 'TOOLS APK', '<p style=\"text-align:center\"><span style=\"color:#d35400\">APKIDE V3.3</span></p>\r\n', '2019-12-24 06:29:26', '2019-12-24 06:29:26', 'https://i0.wp.com/uphinh.org/images/2019/12/24/80850440_1367872433390470_7251888250199998464_n.png', 'LoUisBin', 'https://drive.google.com/file/d/1Mkk7bGVfaQF-k9338GEWQOY4QhOXv11s/view?usp=sharing', '', '', 1, '<p style=\"text-align:center\"><span style=\"color:#d35400\">HƯỚNG DẪN</span></p>\r\n\r\n<p style=\"text-align:center\">Chọn đường dẫn tới&nbsp;ApkIDE3.3ApkIDEjdk1.7.0_45</p>\r\n\r\n<p style=\"text-align:center\">K&eacute;o thả file APK v&agrave;o phần mềm để giải n&eacute;n</p>\r\n\r\n<p style=\"text-align:center\">Nhấn V&agrave;o chữ B v&agrave; chọn d&ograve;ng đầu ti&ecirc;n để n&eacute;n lại</p>\r\n', 'Mobile,Webgame,Client,Linux,Centos', 120000, 0, 0, 3, 0, 0, 0, 0, 316, 'USB02', NULL);

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
(17, 'H&agrave;nh Tr&igrave;nh Phương T&acirc;y', 'hipcute', '2020-01-06 15:12:33', 120000),
(17, 'H&agrave;nh Tr&igrave;nh Phương T&acirc;y', '1711061471', '2021-04-04 13:59:33', 120000),
(17, 'H&agrave;nh Tr&igrave;nh Phương T&acirc;y', 'tester', '2021-04-09 08:39:16', 120000),
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
(5, 'hipcute', 'UEVvbHQ0QlkwSGxUdE9PQkFaK0x6dz09', 'Hypers Đẹp Trai Nhất S&agrave;i G&ograve;n', 'tnk.h1k9@gmail.com', 1, 755042, 22, 'https://i.imgur.com/YTrinkV.jpg', 'standard'),
(6, 'minhtieptvc', 'Y1pkUHA1SElYRkpxcDlRNFZybWExVzdlOCt4S0tyUUtYZ2xJWEwvZk0yWT0=', 'Minh Tiệp', 'binn.single1994@gmail.com', 1, 0, 0, '', 'premium'),
(7, 'cuduy3000', 'VURsUWR0N1dtTzRDem1LbFlUTVpvMS9xcTQ5dFUxbW1hU2V0RkorZ2QzZz0=', 'duy tran', 'cuduy3000@gmail.com', 0, 0, 0, '', 'basic'),
(8, 'minhtiep12', 'UEVvbHQ0QlkwSGxUdE9PQkFaK0x6dz09', 'ksssssssssssss', 'tnk.h1k912@gmail.com', 0, 0, 0, '', 'basic'),
(9, 'minhtieptvc1', 'Y1pkUHA1SElYRkpxcDlRNFZybWExZExaSUxka3piaTE3RVk0ejBhS09GUT0=', 'minhtieptvc1', 'nhungpham0391@gmail.com', 0, 100, 0, '', 'standard'),
(10, 'tungtung', 'T2lCWDY0ak9hZkw0dkg0NXF0US9zdz09', 'Vũ Xuân Tùng', 'tinhla0co@gmail.com', 0, 0, 0, '', 'basic'),
(11, 'bebotsiungu', 'aXI5SUd2WitEM09PV0JVMUFGY2hNOHVlckFVMGErbEhKTGJLN3lBNnkyND0=', 'minhthom0000', 'minhducqng17902@gmail.com', 0, 0, 0, '', 'basic'),
(12, 'quangoc631', 'Y0lKeEVJL3hhQVVuTllBM085cGJkUT09', 'Ngọc Quang', 'quangoc631@gmail.com', 0, 0, 0, '', 'basic'),
(13, 'phucvu93vn', 'WnhFY0hESDlKN1FXcldCK0FPNFlDQ1JxRktpRnNocW9kSnZLYXNnWnpjZz0=', 'Testing3', 'phucvu93vn@gmail.com', 0, 0, 0, '', 'basic'),
(14, 'always186', 'eFRUTXNrL1lSYlZEeTlqSXU4SUYrZz09', 'Hoàng Văn Tới', 'always186@gmail.com', 0, 0, 0, '', 'basic'),
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
('ToiDiBanSource', 'https://i.imgur.com/v1S5eHl.gif', 'SOURCE GAME', 'Hypers', 'https://www.facebook.com/javhd2160pixelkhongche', 'http://toidibansource.com', 'Sign In - We arouse passion from you', 'Sign Up - Share all game source code', 0, 'share code, share source, source game, code game, game source, source code, sciprt code, tool decode, tool encode, game android, gamemobile, game pc, game linux, server game, source server game, source code game', 1, 2, 'https://t.me/joinchat/AAAAAE9EB-P1c0GreWphrQ', 'https://t.me/joinchat/AAAAAE9EB-P1c0GreWphrQ', 'https://t.me/joinchat/AAAAAE9EB-P1c0GreWphrQ', 'https://t.me/joinchat/AAAAAE9EB-P1c0GreWphrQ', 'https://t.me/joinchat/AAAAAE9EB-P1c0GreWphrQ', 'https://t.me/joinchat/AAAAAE9EB-P1c0GreWphrQ', 'Website Đang Trong Giai Đoạn Thử Nghiệm                                     ', '474909426562710', '1905393333011873', 0, 0, 'https://i.imgur.com/5nPjAIh.png', 'https://i.imgur.com/80vdABk.png', NULL, NULL, 1686);

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
