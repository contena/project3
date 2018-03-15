-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017 年 11 朁E27 日 12:15
-- サーバのバージョン： 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pitalinkdb`
--
CREATE DATABASE IF NOT EXISTS `pitalinkdb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `pitalinkdb`;

-- --------------------------------------------------------

--
-- テーブルの構造 `account`
--

CREATE TABLE `account` (
  `a_id` int(11) NOT NULL,
  `a_mail` varchar(50) NOT NULL,
  `a_name` varchar(20) NOT NULL,
  `a_login` varchar(20) NOT NULL,
  `a_pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='アカウント情報を記録';

--
-- テーブルのデータのダンプ `account`
--

INSERT INTO `account` (`a_id`, `a_mail`, `a_name`, `a_login`, `a_pass`) VALUES
(14, 'tes', 'てす', 'a', 'piaNvJjeR2bVQ'),
(15, 'ho', 'ほげ', 'b', 'pinVW3Tvx9tVc'),
(16, 'c', 'c', 'c', 'piMUe3cQRQbOs'),
(17, 'd', 'd', 'd', 'piLbgLXQnX/RI');

-- --------------------------------------------------------

--
-- テーブルの構造 `age`
--

CREATE TABLE `age` (
  `age_id` int(11) NOT NULL,
  `age_name` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `app_users_list`
--

CREATE TABLE `app_users_list` (
  `m_id` int(11) NOT NULL,
  `a_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='プロジェクトに参加しているユーザーIDを記録';

--
-- テーブルのデータのダンプ `app_users_list`
--

INSERT INTO `app_users_list` (`m_id`, `a_id`) VALUES
(98, 15),
(99, 17),
(96, 16);

-- --------------------------------------------------------

--
-- テーブルの構造 `app_waiting`
--

CREATE TABLE `app_waiting` (
  `m_id` int(11) NOT NULL,
  `a_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `app_waiting`
--

INSERT INTO `app_waiting` (`m_id`, `a_id`) VALUES
(3, 3);

-- --------------------------------------------------------

--
-- テーブルの構造 `block_users_list`
--

CREATE TABLE `block_users_list` (
  `a_id` int(11) NOT NULL,
  `a_block_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `follow_users_list`
--

CREATE TABLE `follow_users_list` (
  `a_id` int(11) NOT NULL,
  `follow_a_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='フォロー機能';

-- --------------------------------------------------------

--
-- テーブルの構造 `good_list`
--

CREATE TABLE `good_list` (
  `a_id` int(11) NOT NULL,
  `a_rate_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `matching`
--

CREATE TABLE `matching` (
  `m_id` int(11) NOT NULL,
  `a_host_id` int(11) NOT NULL,
  `m_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `m_count` int(11) NOT NULL,
  `m_tag` varchar(100) DEFAULT NULL,
  `m_title` varchar(50) NOT NULL,
  `m_content` varchar(500) NOT NULL,
  `m_complete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `matching`
--

INSERT INTO `matching` (`m_id`, `a_host_id`, `m_date`, `m_count`, `m_tag`, `m_title`, `m_content`, `m_complete`) VALUES
(93, 14, '2017-11-06 00:54:52', 0, 'Array', 'てすと', 'てすと', 0),
(94, 14, '2017-11-06 00:57:35', 0, 'Array', 'test', 'test', 0),
(95, 14, '2017-11-06 00:59:17', 0, 'Array', 'test', 'testtt', 0),
(96, 14, '2017-11-06 01:03:19', 1, 'Array', 'qqqq', 'qqqq', 0),
(98, 14, '2017-11-06 05:20:03', 1, 'Array', '募集てすと', 'テスト', 0),
(99, 14, '2017-11-20 06:44:14', 0, 'Array', 'りっち', '&lt;div&gt;&lt;b&gt;ボールド&lt;/b&gt;&lt;/div&gt;&lt;div&gt;&lt;ul&gt;&lt;li&gt;&lt;b&gt;dadad&lt;/b&gt;&lt;/li&gt;&lt;li&gt;&lt;b&gt;das&lt;/b&gt;&lt;/li&gt;&lt;li&gt;&lt;b&gt;da&lt;/b&gt;&lt;/li&gt;&lt;/ul&gt;&lt;a href=&quot;https://www.google.co.jp/&quot; target=&quot;_self&quot;&gt;test&lt;/a&gt;&lt;div&gt;&lt;b&gt;&lt;/b&gt;&lt;/div&gt;&lt;/div&gt;', 0),
(100, 14, '2017-11-20 06:47:53', 0, 'Array', 'test', '&lt;div&gt;aaa&lt;/div&gt;', 0),
(101, 14, '2017-11-20 06:48:50', 0, 'Array', 'aaaaaa', '&lt;div&gt;aaaaa&lt;/div&gt;', 0),
(102, 14, '2017-11-20 06:50:33', 0, 'Array', 'etw', '&lt;div&gt;a&lt;/div&gt;', 0),
(103, 14, '2017-11-20 06:54:55', 0, NULL, 'タグ無し', '&lt;div&gt;タグ無し&lt;/div&gt;', 0),
(104, 14, '2017-11-20 06:55:27', 0, NULL, 'タグ無し', 'タグ無し', 0),
(105, 14, '2017-11-20 07:08:43', 0, NULL, 'script', '&lt;div&gt;&amp;lt;script&amp;gt;alert(&quot;lol&quot;)&amp;lt;/script&amp;gt;&lt;/div&gt;', 0),
(106, 14, '2017-11-20 07:10:59', 0, 'Array', 'script', '&lt;b&gt;&amp;lt;script&amp;gt;alert(&quot;lol&quot;);&amp;lt;/script&amp;gt;&lt;/b&gt;&lt;br&gt;', 0),
(107, 14, '2017-11-20 07:24:56', 0, 'Array', 'script', '&lt;div&gt;&amp;lt;script&amp;gt;alert(&#039;lol&#039;);&amp;lt;/script&amp;gt;&lt;/div&gt;&lt;div&gt;aaaaa&lt;/div&gt;', 0),
(108, 14, '2017-11-20 07:26:59', 0, NULL, 'sc', '&lt;div&gt;&amp;lt;script&amp;gt;alert(&quot;aa&quot;)&amp;lt;/script&amp;gt;&lt;/div&gt;&lt;div&gt;eee&lt;/div&gt;', 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `matching_comp_app_list`
--

CREATE TABLE `matching_comp_app_list` (
  `m_complete_id` int(11) NOT NULL,
  `a_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='完了したマッチングに参加していたIDのリスト';

--
-- テーブルのデータのダンプ `matching_comp_app_list`
--

INSERT INTO `matching_comp_app_list` (`m_complete_id`, `a_id`) VALUES
(0, 17),
(0, 17),
(5, 17),
(6, 17),
(6, 14),
(7, 15);

-- --------------------------------------------------------

--
-- テーブルの構造 `matching_complete`
--

CREATE TABLE `matching_complete` (
  `m_complete_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL,
  `a_host_id` int(11) NOT NULL,
  `m_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `m_count` int(11) NOT NULL,
  `m_title` varchar(50) NOT NULL,
  `m_content` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='完了したマッチングを保存するテーブル';

--
-- テーブルのデータのダンプ `matching_complete`
--

INSERT INTO `matching_complete` (`m_complete_id`, `m_id`, `a_host_id`, `m_date`, `m_count`, `m_title`, `m_content`) VALUES
(1, 97, 16, '2017-11-06 04:47:57', 1, 'ttt', 'tesss'),
(2, 99, 16, '2017-11-13 05:33:09', 1, 'qqqqqqqqqqqq', 'aaaaaaaaaaaaaaaaaaaaa'),
(3, 100, 16, '2017-11-13 05:36:04', 1, 'wqrwqr', 'rfsd'),
(4, 101, 16, '2017-11-13 05:41:31', 1, 'njnibj', 'fctgycy'),
(5, 102, 16, '2017-11-13 05:46:26', 1, 'rrr', 'wr'),
(6, 103, 16, '2017-11-13 05:47:22', 2, 'qqqew', 'dadaddad'),
(7, 109, 14, '2017-11-20 07:30:26', 1, 'a', '&lt;div&gt;&amp;lt;script&amp;gt;alert(&quot;aaa&quot;)&amp;lt;/script&amp;gt;&lt;/div&gt;&lt;div&gt;eeeqq&lt;/div&gt;');

-- --------------------------------------------------------

--
-- テーブルの構造 `profile`
--

CREATE TABLE `profile` (
  `a_id` int(11) NOT NULL,
  `p_nickname` varchar(30) NOT NULL DEFAULT '名無しさん',
  `p_selfproduce` varchar(300) NOT NULL,
  `p_sex` varchar(10) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `p_skill` varchar(300) NOT NULL,
  `p_icon` varchar(30) NOT NULL,
  `p_address` varchar(10) DEFAULT NULL,
  `p_goodcount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `profile`
--

INSERT INTO `profile` (`a_id`, `p_nickname`, `p_selfproduce`, `p_sex`, `age`, `p_skill`, `p_icon`, `p_address`, `p_goodcount`) VALUES
(11, 'うん', 'よろしくお願いします。', '0', NULL, '', 'user_icon_default.jpg', NULL, 0),
(12, 'gfsfafadg', 'よろしくお願いします。', '0', NULL, '', 'user_icon_default.jpg', NULL, 0),
(13, 't', 'よろしくお願いします。', '0', NULL, '', 'user_icon_default.jpg', NULL, 0),
(14, 'てす', 'よろしくお願いします。', '0', NULL, '', 'user_icon_default.jpg', NULL, 0),
(15, 'ほげ', 'よろしくお願いします。', '0', NULL, '', 'user_icon_default.jpg', NULL, 0),
(16, 'c', 'よろしくお願いします。', '0', NULL, '', 'user_icon_default.jpg', NULL, 0),
(17, 'd', 'よろしくお願いします。', '0', NULL, '', 'user_icon_default.jpg', NULL, 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `review`
--

CREATE TABLE `review` (
  `r_id` int(11) NOT NULL,
  `m_complete_id` int(11) NOT NULL,
  `a_id` int(11) NOT NULL,
  `rate` float NOT NULL,
  `comment` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='マッチングへのレビューを保存するテーブル';

-- --------------------------------------------------------

--
-- テーブルの構造 `sex`
--

CREATE TABLE `sex` (
  `sex_id` int(1) NOT NULL,
  `sex` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `sex`
--

INSERT INTO `sex` (`sex_id`, `sex`) VALUES
(0, '未設定'),
(1, '男'),
(2, '女'),
(3, 'その他');

-- --------------------------------------------------------

--
-- テーブルの構造 `skill`
--

CREATE TABLE `skill` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `skill_tag`
--

CREATE TABLE `skill_tag` (
  `m_id` int(11) NOT NULL,
  `skill` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='マッチングの技能タグを保存';

--
-- テーブルのデータのダンプ `skill_tag`
--

INSERT INTO `skill_tag` (`m_id`, `skill`) VALUES
(93, 'test'),
(94, 'aaa'),
(95, 'test'),
(96, 'qqq'),
(97, 'aaa'),
(98, 'test'),
(99, 'dsad'),
(100, 'tes'),
(101, 'fcf'),
(102, 'etw'),
(103, 'dawqa'),
(99, 'rich'),
(100, 'aaa'),
(101, 'aaa'),
(102, 'q'),
(106, 'qqq'),
(107, 'qq');

-- --------------------------------------------------------

--
-- テーブルの構造 `talk`
--

CREATE TABLE `talk` (
  `t_id` int(11) NOT NULL,
  `t_content_id` int(11) NOT NULL,
  `t_host_id` int(11) NOT NULL,
  `t_content` varchar(500) NOT NULL,
  `t_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `talk`
--

INSERT INTO `talk` (`t_id`, `t_content_id`, `t_host_id`, `t_content`, `t_date`) VALUES
(40, 7, 15, 'こんにちは', '2017-11-06 05:20:56'),
(40, 8, 14, 't', '2017-11-06 05:21:15');

-- --------------------------------------------------------

--
-- テーブルの構造 `talkroom`
--

CREATE TABLE `talkroom` (
  `t_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL,
  `a_host_id` int(11) NOT NULL,
  `a_app_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `talkroom`
--

INSERT INTO `talkroom` (`t_id`, `m_id`, `a_host_id`, `a_app_id`) VALUES
(40, 98, 14, 15),
(41, 99, 16, 17),
(42, 100, 16, 17),
(43, 101, 16, 17),
(44, 102, 16, 17),
(45, 103, 16, 17),
(46, 103, 16, 14),
(47, 96, 14, 16),
(48, 109, 14, 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `age`
--
ALTER TABLE `age`
  ADD PRIMARY KEY (`age_id`);

--
-- Indexes for table `app_waiting`
--
ALTER TABLE `app_waiting`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `block_users_list`
--
ALTER TABLE `block_users_list`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `follow_users_list`
--
ALTER TABLE `follow_users_list`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `good_list`
--
ALTER TABLE `good_list`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `matching`
--
ALTER TABLE `matching`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `matching_complete`
--
ALTER TABLE `matching_complete`
  ADD PRIMARY KEY (`m_complete_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `sex`
--
ALTER TABLE `sex`
  ADD PRIMARY KEY (`sex_id`);

--
-- Indexes for table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `talk`
--
ALTER TABLE `talk`
  ADD PRIMARY KEY (`t_content_id`);

--
-- Indexes for table `talkroom`
--
ALTER TABLE `talkroom`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `matching`
--
ALTER TABLE `matching`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT for table `matching_complete`
--
ALTER TABLE `matching_complete`
  MODIFY `m_complete_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `talk`
--
ALTER TABLE `talk`
  MODIFY `t_content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `talkroom`
--
ALTER TABLE `talkroom`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
