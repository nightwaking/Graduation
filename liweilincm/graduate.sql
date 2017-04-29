-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2017-04-25 12:56:30
-- 服务器版本： 5.7.17-0ubuntu0.16.04.2
-- PHP Version: 5.6.30-10+deb.sury.org~xenial+2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `graduate`
--

-- --------------------------------------------------------

--
-- 表的结构 `gra_basket`
--

CREATE TABLE `gra_basket` (
  `bid` int(11) UNSIGNED NOT NULL,
  `user_uid` int(11) UNSIGNED NOT NULL,
  `store_sid` int(11) UNSIGNED NOT NULL,
  `store_status` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '0:未结算 1:已结算'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='购物车表';

--
-- 转存表中的数据 `gra_basket`
--

INSERT INTO `gra_basket` (`bid`, `user_uid`, `store_sid`, `store_status`) VALUES
(3, 1, 1, 0),
(4, 1, 2, 0),
(7, 9, 1, 0),
(8, 9, 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `gra_exchange`
--

CREATE TABLE `gra_exchange` (
  `e_id` int(11) UNSIGNED NOT NULL,
  `e_order` int(20) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `e_time` datetime(6) NOT NULL,
  `e_address` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `e_notice` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `e_price` int(22) UNSIGNED NOT NULL,
  `status` int(8) DEFAULT '0',
  `e_mobile` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'xxxxxxxxxxx'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `gra_exchange`
--

INSERT INTO `gra_exchange` (`e_id`, `e_order`, `user_id`, `e_time`, `e_address`, `e_notice`, `e_price`, `status`, `e_mobile`) VALUES
(1, 1233445566, 1, '2017-04-11 11:28:00.000000', '辽宁省大连市', '颜色要求', 120, 0, 'xxxxxxxxxxx'),
(2, 1492853613, 1, '2017-04-22 17:33:33.000000', '', '', 720, 0, '18511884152'),
(3, 1492853690, 1, '2017-04-22 17:34:50.000000', '', '', 720, 0, '18511884152'),
(4, 1492930743, 1, '2017-04-23 14:59:03.000000', '大连市', '快点儿送', 720, 0, '18511884152'),
(5, 1492931179, 9, '2017-04-23 15:06:19.000000', '江苏省', '颜色要求', 240, 1, '15840930543'),
(6, 1492932845, 9, '2017-04-23 15:34:05.000000', '江苏省', '颜色要求', 240, 1, '15840930543'),
(7, 1492933208, 9, '2017-04-23 15:40:08.000000', '阿斯顿', '', 240, 1, ''),
(8, 1493015573, 9, '2017-04-24 14:32:53.000000', '大连', '', 240, 0, '15840930543');

-- --------------------------------------------------------

--
-- 表的结构 `gra_kind`
--

CREATE TABLE `gra_kind` (
  `kid` int(11) UNSIGNED NOT NULL,
  `kname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `kdescription` varchar(35) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `gra_kind`
--

INSERT INTO `gra_kind` (`kid`, `kname`, `kdescription`) VALUES
(1, '衬衫', '衬衫种类多样'),
(2, '运动用品', '运动有益身体健康');

-- --------------------------------------------------------

--
-- 表的结构 `gra_store`
--

CREATE TABLE `gra_store` (
  `sid` int(11) UNSIGNED NOT NULL,
  `storename` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品名称',
  `kdid` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品种类在创建一个kind表',
  `storestatus` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '商品状态0:正常 1:下架 2:处理',
  `storeamount` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '商品数量',
  `storeprice` int(15) UNSIGNED NOT NULL DEFAULT '0' COMMENT '商品价格',
  `storedescription` varchar(35) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品描述'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='商品表';

--
-- 转存表中的数据 `gra_store`
--

INSERT INTO `gra_store` (`sid`, `storename`, `kdid`, `storestatus`, `storeamount`, `storeprice`, `storedescription`) VALUES
(1, '短衬衣', '1', 0, 21, 120, '短衬衫适合夏天穿着'),
(2, '足球', '2', 0, 12, 300, '足球运动');

-- --------------------------------------------------------

--
-- 表的结构 `gra_user`
--

CREATE TABLE `gra_user` (
  `uid` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pwd` varchar(64) NOT NULL,
  `email` varchar(50) NOT NULL,
  `lasttime` datetime NOT NULL,
  `regtime` date NOT NULL,
  `type` int(5) DEFAULT '0',
  `mobile` varchar(12) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `gra_user`
--

INSERT INTO `gra_user` (`uid`, `username`, `pwd`, `email`, `lasttime`, `regtime`, `type`, `mobile`) VALUES
(1, 'nightwaking', 'a9986595098961f0eb08958b06bcbe62', '1105468795@qq.com', '2017-04-23 14:58:26', '2017-04-06', 1, '18511884152'),
(11, 'cuimeng1', 'a9986595098961f0eb08958b06bcbe62', 'xxxxxxxxx@xx.com', '2017-04-19 16:13:00', '2017-04-19', 0, NULL),
(10, 'test01', 'a9986595098961f0eb08958b06bcbe62', 'xxxxxxxxx@xx.com', '2017-04-18 20:11:17', '2017-04-18', 0, NULL),
(9, 'admin', 'a9986595098961f0eb08958b06bcbe62', '1105468795@qq.com', '2017-04-24 14:38:59', '2017-04-18', 0, '15840930543'),
(8, 'asdasd', 'e00cf25ad42683b3df678c61f42c6bda', 'xxxxxxxxx@xx.com', '2017-04-18 19:20:54', '2017-04-18', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gra_basket`
--
ALTER TABLE `gra_basket`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `gra_exchange`
--
ALTER TABLE `gra_exchange`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `gra_kind`
--
ALTER TABLE `gra_kind`
  ADD PRIMARY KEY (`kid`);

--
-- Indexes for table `gra_store`
--
ALTER TABLE `gra_store`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `gra_user`
--
ALTER TABLE `gra_user`
  ADD PRIMARY KEY (`uid`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `gra_basket`
--
ALTER TABLE `gra_basket`
  MODIFY `bid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用表AUTO_INCREMENT `gra_exchange`
--
ALTER TABLE `gra_exchange`
  MODIFY `e_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用表AUTO_INCREMENT `gra_kind`
--
ALTER TABLE `gra_kind`
  MODIFY `kid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `gra_store`
--
ALTER TABLE `gra_store`
  MODIFY `sid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `gra_user`
--
ALTER TABLE `gra_user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
