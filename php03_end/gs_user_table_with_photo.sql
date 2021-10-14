-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2021 年 10 月 14 日 14:58
-- サーバのバージョン： 5.7.34
-- PHP のバージョン: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_db4`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_user_table_with_photo`
--

CREATE TABLE `gs_user_table_with_photo` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `lid` varchar(64) NOT NULL,
  `lpw` varchar(64) NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `gs_user_table_with_photo`
--

INSERT INTO `gs_user_table_with_photo` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `img`) VALUES
(1, 'やまさと', 'supersaiyajin', '99911111', 1, '20211011083110'),
(2, 'やまさと', 'supersaiyajin', '99911111', 1, '20211011083144'),
(4, '山中', 'saisaisaisaisai', '9999', 1, '20211011083433'),
(5, '山中', 'saisaisaisaisai', '9999111', 1, '20211011083825'),
(6, '機械学習スタートアップシリーズ', 'supersaiyajin', '9999', 1, '20211012084338写真.jpg'),
(9, 'ヤマナカサトシ', '0909', '909', 0, '20211014132716'),
(10, 'ヤマナカサトシ', '222', '222', 0, '20211014142312');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_user_table_with_photo`
--
ALTER TABLE `gs_user_table_with_photo`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_user_table_with_photo`
--
ALTER TABLE `gs_user_table_with_photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
