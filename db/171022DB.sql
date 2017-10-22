-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017 年 10 朁E22 日 19:56
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
(1, 'kjfjfdskjflkdjflkdjflksdjf', 'あ', 'a', 'piaNvJjeR2bVQ'),
(2, 'i', 'i', 'i', 'piE4/1mNprS2I'),
(3, 'u', 'u', 'u', 'pikjeU.MCSThg'),
(4, 'e', 'e', 'e', 'piGGCALpntO3I'),
(5, 'dsa', 'ｓ', 'r', 'pi1aqyk99WzsI'),
(6, 'hage', 'hage', 'root', 'pi2NkIVhrkB/w'),
(7, '''', '<script>', 'contena2', 'piv5mBcRZwAfw'),
(8, 'q', 'r', 'o', 'pidyRt.vS2RlQ');

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
  `m_tag` varchar(100) NOT NULL,
  `m_title` varchar(50) NOT NULL,
  `m_content` varchar(500) NOT NULL,
  `m_complete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `matching`
--

INSERT INTO `matching` (`m_id`, `a_host_id`, `m_date`, `m_count`, `m_tag`, `m_title`, `m_content`, `m_complete`) VALUES
(1, 2, '2017-07-24 00:55:55', 0, '', 'test', 'test', 0),
(2, 1, '2017-08-24 05:02:46', 0, '', 'sdadadad', 'dsadadda', 0),
(3, 2, '2017-08-29 07:08:44', 0, '', 'ddddddd', 'ddddddddddddddddddddddddddddd', 0),
(4, 2, '2017-08-29 07:08:58', 0, '', 'ffffffffffffffffffffffffffff', 'fffffffffffffffffffffffffffffffffffff', 0),
(5, 1, '2017-09-12 11:00:36', 0, 'Array', 'tagggg', '', 0),
(6, 1, '2017-09-12 11:07:37', 0, 'Array', 'aaa', '', 0),
(7, 1, '2017-09-12 11:14:07', 0, 'Array', 'aaaadwadwad', '', 0),
(8, 1, '2017-09-12 11:15:02', 0, 'Array', 'aaaadwadwad', '', 0),
(9, 1, '2017-09-12 11:16:51', 0, 'Array', 'aaaadwadwad', '', 0),
(10, 1, '2017-09-12 11:21:00', 0, 'Array', 'tasukete', '', 0),
(11, 1, '2017-09-12 11:29:06', 0, 'Array', 'tasukete', '', 0),
(12, 1, '2017-09-12 11:33:52', 0, 'Array', 'tasukete', '', 0),
(13, 1, '2017-09-12 11:43:20', 0, 'Array', 'dasa', '', 0),
(14, 1, '2017-09-12 11:44:07', 0, 'Array', 'dsada', '', 0),
(15, 1, '2017-09-12 11:48:44', 0, 'Array', 'aaa', 'wwwwww', 0),
(16, 4, '2017-09-14 06:17:26', 0, 'Array', 'qqqqqqaa', 'aa', 0),
(17, 4, '2017-09-14 06:17:32', 0, 'Array', 'qqqqqqaa', 'aa', 0),
(18, 1, '2017-10-02 01:04:38', 0, '', 'あああ', 'ああああああ', 0),
(19, 2, '2017-10-09 05:55:41', 0, 'Array', 'dada', 'dada', 0),
(20, 2, '2017-10-09 05:55:42', 0, 'Array', 'dada', 'dada', 0),
(21, 2, '2017-10-09 05:55:42', 0, 'Array', 'dada', 'dada', 0),
(22, 2, '2017-10-09 05:55:42', 0, 'Array', 'dada', 'dada', 0),
(23, 2, '2017-10-09 05:55:42', 0, 'Array', 'dada', 'dada', 0),
(24, 2, '2017-10-09 05:55:42', 0, 'Array', 'dada', 'dada', 0),
(25, 2, '2017-10-09 05:55:42', 0, 'Array', 'dada', 'dada', 0),
(26, 2, '2017-10-09 05:55:42', 0, 'Array', 'dada', 'dada', 0),
(27, 2, '2017-10-09 05:56:05', 0, 'Array', 'dada', 'dada', 0),
(28, 2, '2017-10-09 05:56:05', 0, 'Array', 'dada', 'dada', 0),
(29, 2, '2017-10-09 05:56:05', 0, 'Array', 'dada', 'dada', 0),
(30, 2, '2017-10-09 05:56:05', 0, 'Array', 'dada', 'dada', 0),
(31, 2, '2017-10-09 05:56:05', 0, 'Array', 'dada', 'dada', 0),
(32, 2, '2017-10-09 05:56:06', 0, 'Array', 'dada', 'dada', 0),
(33, 2, '2017-10-09 05:56:06', 0, 'Array', 'dada', 'dada', 0),
(34, 2, '2017-10-09 05:56:06', 0, 'Array', 'dada', 'dada', 0),
(35, 2, '2017-10-09 05:56:06', 0, 'Array', 'dada', 'dada', 0),
(36, 2, '2017-10-09 05:56:06', 0, 'Array', 'dada', 'dada', 0),
(37, 2, '2017-10-16 06:57:47', 0, 'Array', 'un', 'qqq', 0),
(38, 2, '2017-10-16 06:57:48', 0, 'Array', 'un', 'qqq', 0),
(39, 2, '2017-10-16 06:57:48', 0, 'Array', 'un', 'qqq', 0),
(40, 2, '2017-10-16 06:57:56', 0, 'Array', 'un', 'qqq', 0),
(41, 2, '2017-10-16 06:57:56', 0, 'Array', 'un', 'qqq', 0),
(42, 2, '2017-10-16 06:57:57', 0, 'Array', 'un', 'qqq', 0),
(43, 2, '2017-10-16 06:57:57', 0, 'Array', 'un', 'qqq', 0),
(44, 2, '2017-10-16 06:57:57', 0, 'Array', 'un', 'qqq', 0),
(45, 2, '2017-10-16 06:57:58', 0, 'Array', 'un', 'qqq', 0),
(46, 2, '2017-10-16 06:57:58', 0, 'Array', 'un', 'qqq', 0),
(47, 2, '2017-10-16 06:57:58', 0, 'Array', 'un', 'qqq', 0),
(48, 2, '2017-10-16 06:57:58', 0, 'Array', 'un', 'qqq', 0),
(49, 2, '2017-10-16 06:57:58', 0, 'Array', 'un', 'qqq', 0),
(50, 2, '2017-10-16 06:57:58', 0, 'Array', 'un', 'qqq', 0),
(51, 2, '2017-10-16 06:57:58', 0, 'Array', 'un', 'qqq', 0),
(52, 2, '2017-10-16 06:57:59', 0, 'Array', 'un', 'qqq', 0),
(53, 2, '2017-10-16 06:57:59', 0, 'Array', 'un', 'qqq', 0),
(54, 2, '2017-10-16 06:57:59', 0, 'Array', 'un', 'qqq', 0),
(55, 2, '2017-10-16 06:57:59', 0, 'Array', 'un', 'qqq', 0),
(56, 2, '2017-10-16 06:57:59', 0, 'Array', 'un', 'qqq', 0),
(57, 2, '2017-10-16 06:57:59', 0, 'Array', 'un', 'qqq', 0),
(58, 2, '2017-10-16 06:58:18', 0, 'Array', 'un', 'qqq', 0),
(59, 2, '2017-10-16 06:58:19', 0, 'Array', 'un', 'qqq', 0),
(60, 2, '2017-10-16 06:58:19', 0, 'Array', 'un', 'qqq', 0),
(61, 2, '2017-10-16 06:58:19', 0, 'Array', 'un', 'qqq', 0),
(62, 2, '2017-10-16 06:58:20', 0, 'Array', 'un', 'qqq', 0),
(63, 2, '2017-10-16 06:58:20', 0, 'Array', 'un', 'qqq', 0),
(64, 2, '2017-10-16 06:58:20', 0, 'Array', 'un', 'qqq', 0),
(65, 2, '2017-10-16 06:58:20', 0, 'Array', 'un', 'qqq', 0),
(66, 2, '2017-10-16 06:58:21', 0, 'Array', 'un', 'qqq', 0),
(67, 2, '2017-10-16 06:58:21', 0, 'Array', 'un', 'qqq', 0),
(68, 2, '2017-10-16 06:58:21', 0, 'Array', 'un', 'qqq', 0),
(69, 2, '2017-10-16 06:58:21', 0, 'Array', 'un', 'qqq', 0),
(70, 2, '2017-10-16 06:58:21', 0, 'Array', 'un', 'qqq', 0),
(71, 2, '2017-10-16 06:58:22', 0, 'Array', 'un', 'qqq', 0),
(72, 2, '2017-10-16 06:58:22', 0, 'Array', 'un', 'qqq', 0),
(73, 2, '2017-10-16 06:58:22', 0, 'Array', 'un', 'qqq', 0),
(74, 2, '2017-10-16 06:58:22', 0, 'Array', 'un', 'qqq', 0),
(75, 2, '2017-10-16 06:58:22', 0, 'Array', 'un', 'qqq', 0),
(76, 2, '2017-10-16 06:58:22', 0, 'Array', 'un', 'qqq', 0),
(77, 2, '2017-10-16 06:58:22', 0, 'Array', 'un', 'qqq', 0),
(78, 2, '2017-10-16 06:58:23', 0, 'Array', 'un', 'qqq', 0),
(79, 2, '2017-10-16 06:58:23', 0, 'Array', 'un', 'qqq', 0),
(80, 2, '2017-10-16 06:58:23', 0, 'Array', 'un', 'qqq', 0),
(81, 2, '2017-10-16 06:58:23', 0, 'Array', 'un', 'qqq', 0),
(82, 2, '2017-10-16 06:58:23', 0, 'Array', 'un', 'qqq', 0),
(83, 2, '2017-10-16 06:58:23', 0, 'Array', 'un', 'qqq', 0),
(84, 2, '2017-10-16 06:58:24', 0, 'Array', 'un', 'qqq', 0),
(85, 2, '2017-10-16 06:58:24', 0, 'Array', 'un', 'qqq', 0),
(86, 2, '2017-10-16 06:58:24', 0, 'Array', 'un', 'qqq', 0),
(87, 2, '2017-10-16 06:58:24', 0, 'Array', 'un', 'qqq', 0),
(88, 2, '2017-10-16 06:58:24', 0, 'Array', 'un', 'qqq', 0),
(89, 2, '2017-10-16 06:58:24', 0, 'Array', 'un', 'qqq', 0);

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
  `m_tag` varchar(100) NOT NULL,
  `m_title` varchar(50) NOT NULL,
  `m_content` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='完了したマッチングを保存するテーブル';

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
  `s_id` varchar(500) NOT NULL,
  `p_icon` varchar(30) NOT NULL,
  `p_address` varchar(10) DEFAULT NULL,
  `p_goodcount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(9, 'ddddaaa'),
(10, 'abc'),
(11, 'qqq'),
(12, 'wqqqqq'),
(12, 'aw'),
(12, 'qqq'),
(13, 'cccc'),
(13, 'bbb'),
(13, 'aaa'),
(14, 'aaawdasda'),
(14, 'aaasda'),
(15, 'wqq'),
(15, 'sa'),
(15, 'wada'),
(16, 'aaa'),
(16, 'php'),
(17, 'aaa'),
(17, 'php'),
(18, ''),
(19, 'php'),
(20, 'php'),
(21, 'php'),
(22, 'php'),
(23, 'php'),
(24, 'php'),
(25, 'php'),
(26, 'php'),
(27, 'php'),
(28, 'php'),
(29, 'php'),
(30, 'php'),
(31, 'php'),
(32, 'php'),
(33, 'php'),
(34, 'php'),
(35, 'php'),
(36, 'php'),
(37, 'php'),
(38, 'php'),
(39, 'php'),
(40, 'php'),
(41, 'php'),
(42, 'php'),
(43, 'php'),
(44, 'php'),
(45, 'php'),
(46, 'php'),
(47, 'php'),
(48, 'php'),
(49, 'php'),
(50, 'php'),
(51, 'php'),
(52, 'php'),
(53, 'php'),
(54, 'php'),
(55, 'php'),
(56, 'php'),
(57, 'php'),
(58, 'php'),
(59, 'php'),
(60, 'php'),
(61, 'php'),
(62, 'php'),
(63, 'php'),
(64, 'php'),
(65, 'php'),
(66, 'php'),
(67, 'php'),
(68, 'php'),
(69, 'php'),
(70, 'php'),
(71, 'php'),
(72, 'php'),
(73, 'php'),
(74, 'php'),
(75, 'php'),
(76, 'php'),
(77, 'php'),
(78, 'php'),
(79, 'php'),
(80, 'php'),
(81, 'php'),
(82, 'php'),
(83, 'php'),
(84, 'php'),
(85, 'php'),
(86, 'php'),
(87, 'php'),
(88, 'php'),
(89, 'php');

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
(1, 1, 3, 'おはよう', '0000-00-00 00:00:00'),
(1, 2, 2, 'こんにちは', '0000-00-00 00:00:00'),
(2, 3, 1, 'dada', '0000-00-00 00:00:00');

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
(1, 1, 2, 3),
(2, 16, 4, 1);

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
-- Indexes for table `app_users_list`
--
ALTER TABLE `app_users_list`
  ADD PRIMARY KEY (`m_id`);

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
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `matching`
--
ALTER TABLE `matching`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT for table `matching_complete`
--
ALTER TABLE `matching_complete`
  MODIFY `m_complete_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `talk`
--
ALTER TABLE `talk`
  MODIFY `t_content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `talkroom`
--
ALTER TABLE `talkroom`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
