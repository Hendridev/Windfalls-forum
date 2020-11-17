-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2020 at 12:42 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sosial_media`
--

-- --------------------------------------------------------

--
-- Table structure for table `gambar_user`
--

CREATE TABLE `gambar_user` (
  `id_gambar` int(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `gambar_avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `komen_user`
--

CREATE TABLE `komen_user` (
  `id_komentar` int(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `username_user` varchar(50) NOT NULL,
  `id_postingan` int(50) NOT NULL,
  `jumlah_like` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `postingan_user`
--

CREATE TABLE `postingan_user` (
  `id_postingan` int(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `username_user` varchar(50) NOT NULL,
  `status_user` varchar(255) NOT NULL,
  `gambar_postingan` varchar(255) NOT NULL,
  `tipe_gambar` varchar(255) NOT NULL,
  `ukuran_gambar` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `postingan_user`
--

INSERT INTO `postingan_user` (`id_postingan`, `nama_user`, `username_user`, `status_user`, `gambar_postingan`, `tipe_gambar`, `ukuran_gambar`) VALUES
(71, 'dombadev', 'Hendridev', 'hi', '', '', 0),
(72, 'dombadev', 'Hendridev', '', '8192testlahbos.png', 'image/png', 42765),
(73, 'dombadev', 'Hendridev', 'hi', '', '', 0),
(74, 'dombadev', 'Hendridev', '', '4187testlahbos.png', 'image/png', 42765),
(75, 'dombadev', 'Hendridev', 'ngoding malam, merasa senang xiixixi', '6181Screenshot (5).png', 'image/png', 231513),
(76, 'guru123', 'guru_domba', 'Ga bagus nih project, butuh mekanik tinggi', '', '', 0),
(77, 'tanjidor', 'demon_slayer', 'Dummy data, langsung dari database', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_manage`
--

CREATE TABLE `user_manage` (
  `id` int(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `username_user` varchar(50) NOT NULL,
  `password_user` varchar(255) NOT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_manage`
--

INSERT INTO `user_manage` (`id`, `nama_user`, `username_user`, `password_user`, `tanggal_dibuat`) VALUES
(15, 'dombadev', 'Hendridev', '$2y$10$.pfQqqetPqE5/xskO0Q86uzqKjHtf7hwNgEKrLs6YyBXRwSS0PFbu', '2020-10-30 04:42:50'),
(16, 'pudidi', 'pudidi', '$2y$10$Ck4rbYPaQ9wLjnJ.3wA0yOWTOoMsrXLC6bjzyOun4SD8fEltKNePS', '2020-10-30 05:13:18'),
(17, 'guru123', 'guru_domba', '$2y$10$pDZFGQ2mgS/jsrdsM8KxduqUlowPDM/F981q1tIyNaE95.x9AOetO', '2020-10-31 06:26:33'),
(18, 'darui_sun', 'last_post', '$2y$10$7O/eq2hPmJWfqFmHlkM3DeOC10dWJZwJTPis1FfD0Oy3RK17HXQma', '2020-10-31 07:36:17'),
(19, 'yanto', 'admin', '$2y$10$8KA85NlMG0GjHRGvrr7rY.g36xjyfA2ze1wSu6eOboKKxT0SdAY/K', '2020-10-31 07:57:37'),
(20, 'tanjidor', 'demon_slayer', '$2y$10$dM20RtiL2xy/SDryNL3LrO6MM/hPs5pJxIHNU.n6WHLEzv5E64gA.', '2020-10-31 15:18:41'),
(21, 'hen', 'hendri', '$2y$10$YT3ANIcuJV/CPrMyKkbBIuUxJta.JslJweojitP2HT8aseDH8X6pC', '2020-10-31 15:19:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gambar_user`
--
ALTER TABLE `gambar_user`
  ADD PRIMARY KEY (`id_gambar`),
  ADD KEY `nama_user` (`nama_user`) USING BTREE;

--
-- Indexes for table `komen_user`
--
ALTER TABLE `komen_user`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_postingan` (`id_postingan`) USING BTREE,
  ADD KEY `nama_user` (`nama_user`) USING BTREE,
  ADD KEY `username_user` (`username_user`);

--
-- Indexes for table `postingan_user`
--
ALTER TABLE `postingan_user`
  ADD PRIMARY KEY (`id_postingan`),
  ADD KEY `nama_user` (`nama_user`) USING BTREE,
  ADD KEY `username_user` (`username_user`);

--
-- Indexes for table `user_manage`
--
ALTER TABLE `user_manage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama_user` (`nama_user`),
  ADD KEY `username_user` (`username_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gambar_user`
--
ALTER TABLE `gambar_user`
  MODIFY `id_gambar` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `komen_user`
--
ALTER TABLE `komen_user`
  MODIFY `id_komentar` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `postingan_user`
--
ALTER TABLE `postingan_user`
  MODIFY `id_postingan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `user_manage`
--
ALTER TABLE `user_manage`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gambar_user`
--
ALTER TABLE `gambar_user`
  ADD CONSTRAINT `gambar_user_ibfk_1` FOREIGN KEY (`nama_user`) REFERENCES `user_manage` (`nama_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komen_user`
--
ALTER TABLE `komen_user`
  ADD CONSTRAINT `komen_user_ibfk_1` FOREIGN KEY (`nama_user`) REFERENCES `postingan_user` (`nama_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komen_user_ibfk_2` FOREIGN KEY (`id_postingan`) REFERENCES `postingan_user` (`id_postingan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komen_user_ibfk_3` FOREIGN KEY (`username_user`) REFERENCES `postingan_user` (`username_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `postingan_user`
--
ALTER TABLE `postingan_user`
  ADD CONSTRAINT `postingan_user_ibfk_1` FOREIGN KEY (`nama_user`) REFERENCES `user_manage` (`nama_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `postingan_user_ibfk_2` FOREIGN KEY (`username_user`) REFERENCES `user_manage` (`username_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
