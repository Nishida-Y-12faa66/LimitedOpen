-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 
-- サーバのバージョン： 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ph23`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `m_user`
--

CREATE TABLE `m_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `login_id` varchar(12) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hash_login_id` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `stretch` int(11) DEFAULT NULL,
  `user_state` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `m_user`
--

INSERT INTO `m_user` (`id`, `name`, `mail`, `login_id`, `password`, `hash_login_id`, `salt`, `stretch`, `user_state`, `file_name`) VALUES
(69, 'aaa', 'aaa@', 'aaa', 'e65c5e70643461765260a3d18a8c4ef7', '47bce5c74f589f4867dbd57e9ca9f808', '50c1a6dd92883549b03fcad27b604c8b', 5839, 1, ''),
(71, 'sss', 'sss@', 'sss', '95b6211c5e6bba4fcca2171a8e6b670d', '9f6e6800cfae7749eb6c486619254b9c', '2eef3cbe5cf55c895d9f10760f73f809', 4545, 0, ''),
(72, 'ddd', 'ddd@', 'ddd', '797130f763be1da673fb45bad3bde104', '77963b7a931377ad4ab5ad6a9cd718aa', 'cfd71d614446eb7157e1d22776910c3c', 1144, 1, ''),
(73, '平尾健太', 'kenta@gmail.com', 'kenta', 'c32d821f4498d77569fe044d80b5a5ef', '8f624058f3763350c306fb684b0ee365', 'ff0e7ff036ee4266a3b821899cf052e9', 3839, 1, ''),
(74, 'けみお', 'kemio@', 'kemio', '3f13cb2a4c0881b55a9c41ad18c5648a', '4a4a39a13a8e0939af258c3b13d498bb', 'f4732017315a0023a11d5b72842b89d1', 4950, 1, ''),
(75, 'stdio', 'stdio@', 'stdio', 'f303d896d80f67127b80315122bf2576', '4435f0f89633053c96204ebf23d6ea4e', 'b6a073cc51f15a284521ed6ea07ed837', 4972, 1, 'i2.jpg'),
(76, 'kkkk', 'kkkkk@', 'kkkk', '57455a64dec862abe589de1b8a4480d1', 'fa7f08233358e9b466effa1328168527', '11f818dfcb528828f7054205bb5ac2ce', 9243, 1, 'i4.jpg'),
(77, 'ggg', 'ggg@', 'ggg', '8083f02eb367ec8250333e7a0b442fda', 'ba248c985ace94863880921d8900c53f', 'd0f6be9c9c28b059e71ea7de773e8942', 8887, 1, 'i4.jpg'),
(78, 'dddd', 'dddd@', 'dddd', 'd35ae66c0814be05bf82e6c52277f695', '11ddbaf3386aea1f2974eee984542152', '1476afd3fb2605f3b5f81cf27c2b33fc', 7067, 0, ''),
(79, 'lll', 'lll@', 'lll', '43e4a7bf9753a58449f95bc3e7295024', 'bf083d4ab960620b645557217dd59a49', '8bea391bff940e247d10dea42b53dbb9', 7203, 1, 'i2.jpg'),
(80, '革', 'kawa@', 'kawa', 'fb9f88e568cb2e2328e00d9468280733', 'a7e1d23834d620db534025585a19fce1', '786c29448abef06be84cb48f345a61a8', 7169, 1, 'i1.jpg'),
(81, 'ｋｋｋ', 'fff@', 'fff', '6c11d385451bba9149670b80f9483fd0', '343d9040a671c45832ee5381860e2996', '3c910bf6709c4ef6e67598c2c3d9dfb0', 4622, 0, ''),
(82, 'ooo', 'ooo@', 'ooo', 'aebefd44a80a85ef35ca9d839b034c17', '7f94dd413148ff9ac9e9e4b6ff2b6ca9', '19f700c4f801462278369fe3f8429b98', 6887, 0, ''),
(83, 'p', 'p@', 'p', '47aff6fb11f7e78392da54b62f0c4be9', '83878c91171338902e0fe0fb97a8c47a', '8ae6a2bb27b021e4498fb07284d28acf', 4703, 0, ''),
(84, 'jjj', 'jjj@', 'jjj', '7b910ac9db7b204b1ba357408afbdf9f', '2af54305f183778d87de0c70c591fae4', '14e26e4e8661f5ef4f28831167907b08', 5115, 0, ''),
(85, '1', '1@', '1', 'fa3d2bb7305bf9b331fa19305ecdd945', 'c4ca4238a0b923820dcc509a6f75849b', '8ae6a2bb27b021e4498fb07284d28acf', 6953, 0, ''),
(86, 'aaa', 'aaa@', 'aoa', '82305e7eacd54b6225edd202877cd878', '0eca4c01b672b215d24286d8e4fdcb32', '19f700c4f801462278369fe3f8429b98', 1442, 0, ''),
(87, 'aaa', 'sdhiraken0817@gmail.com', 'koko', '7e28a1bcd6b612614b345667669384a3', '37f525e2b6fc3cb4abd882f708ab80eb', 'a02d4d8461043127947bba2863061a85', 9640, 0, ''),
(88, 'aaa', 'sdhiraken0817@gmail.com', 'popo', '0de1d1f22f1ced0e206c3d22494136ea', '3b2285b348e95774cb556cb36e583106', 'ad253dc458056fdfdeb201f4d5326bb6', 1984, 0, ''),
(89, 'kakak', 'sdhiraken0817@gmail.com', 'kakaka', '968f4d1cda564862a578f60a915380fc', '978f9c8fa30137baf3b46e82f1e91e08', 'a84bbe4d8b2873c2b0c4b5cf8a8ef860', 9053, 0, ''),
(90, 'ooo', 'ooo@', 'ppppp', '91ea4d3a8d762a4af8f6a4f32f34e3aa', 'a7c471cfd3c42dc6d6a8552ac2c0a22c', 'bec13c1607b6c3c05a58aa205274e944', 9927, 0, ''),
(91, 'nnn', 'nnn@', 'nnn', '1b4d5108734e590cb71a8745ed5bf068', 'a1931ec126bbad3fa7a3fc64209fd921', '3cc7aa4aae2b1652ee3252f3cf816dbc', 3196, 1, 'Suzie_7690_1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_user`
--
ALTER TABLE `m_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
