-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2021 at 12:52 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agencijazanekretnine`
--

-- --------------------------------------------------------

--
-- Table structure for table `fotografije`
--

CREATE TABLE `fotografije` (
  `id` int(11) NOT NULL,
  `fotografija` varchar(255) COLLATE utf8_bin NOT NULL,
  `nekretnina_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `grad`
--

CREATE TABLE `grad` (
  `id` int(11) NOT NULL,
  `ime` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `grad`
--

INSERT INTO `grad` (`id`, `ime`) VALUES
(1, 'Podgorica'),
(2, 'Plav'),
(3, 'Berane'),
(4, 'Cetinje'),
(5, 'Bar'),
(6, 'Budva'),
(7, 'Kotor'),
(8, 'Mojkovac'),
(17, 'Rozaje'),
(20, 'Kolašin'),
(21, 'Bijelo Polje'),
(22, 'Petnjica'),
(23, 'Tuzi');

-- --------------------------------------------------------

--
-- Table structure for table `nekretnina`
--

CREATE TABLE `nekretnina` (
  `id` int(11) NOT NULL,
  `povrsina` double NOT NULL,
  `cijena` double NOT NULL,
  `godina_izgradnje` int(11) NOT NULL,
  `opis` varchar(255) COLLATE utf8_bin NOT NULL,
  `grad_id` int(11) DEFAULT NULL,
  `tip_nekretnine_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `tip_oglasa_id` int(11) DEFAULT NULL,
  `fotografija` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `nekretnina`
--

INSERT INTO `nekretnina` (`id`, `povrsina`, `cijena`, `godina_izgradnje`, `opis`, `grad_id`, `tip_nekretnine_id`, `status_id`, `tip_oglasa_id`, `fotografija`) VALUES
(21, 90, 90, 2020, 'nova', 21, 3, 3, 2, ''),
(23, 0, 58, 58, 'gyuhj', 5, 1, 1, 2, ''),
(24, 90, 90, 2019, 'nova', 3, 3, 1, 2, ''),
(25, 90, 90, 2019, 'nova', 5, 3, 3, 2, NULL),
(26, 25, 50000, 2011, 'za renoviranje', 6, 3, 1, 2, './fotografije/60443a3db5982.jpg'),
(27, 90, 50000, 2020, 'za', 21, 1, 1, 2, './fotografije/60443a6800651.jpg'),
(28, 90, 90, 2019, 'nova', 21, 3, 1, 3, './fotografije/60443bc8eb142.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status` varchar(11) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(1, 'Dostupno'),
(2, 'Prodato'),
(3, 'Iznajmljeno');

-- --------------------------------------------------------

--
-- Table structure for table `tip_nekretnine`
--

CREATE TABLE `tip_nekretnine` (
  `id` int(11) NOT NULL,
  `tip` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tip_nekretnine`
--

INSERT INTO `tip_nekretnine` (`id`, `tip`) VALUES
(1, 'Kuća'),
(2, 'Stan'),
(3, 'Poslovni prostor'),
(5, 'plac');

-- --------------------------------------------------------

--
-- Table structure for table `tip_oglasa`
--

CREATE TABLE `tip_oglasa` (
  `id` int(11) NOT NULL,
  `tip_oglasa` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tip_oglasa`
--

INSERT INTO `tip_oglasa` (`id`, `tip_oglasa`) VALUES
(1, 'Prodaja'),
(2, 'Iznajmljivanje'),
(3, 'Kompenzacija');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fotografije`
--
ALTER TABLE `fotografije`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fotografija_nekretnine_id` (`nekretnina_id`);

--
-- Indexes for table `grad`
--
ALTER TABLE `grad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nekretnina`
--
ALTER TABLE `nekretnina`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nekretnina_grad_id` (`grad_id`),
  ADD KEY `nekretnina_tip_id` (`tip_nekretnine_id`),
  ADD KEY `nekretnina_status` (`status_id`),
  ADD KEY `nekretnina_oglas` (`tip_oglasa_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tip_nekretnine`
--
ALTER TABLE `tip_nekretnine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tip_oglasa`
--
ALTER TABLE `tip_oglasa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fotografije`
--
ALTER TABLE `fotografije`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `grad`
--
ALTER TABLE `grad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `nekretnina`
--
ALTER TABLE `nekretnina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tip_nekretnine`
--
ALTER TABLE `tip_nekretnine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tip_oglasa`
--
ALTER TABLE `tip_oglasa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fotografije`
--
ALTER TABLE `fotografije`
  ADD CONSTRAINT `fotografija_nekretnine_id` FOREIGN KEY (`nekretnina_id`) REFERENCES `nekretnina` (`id`);

--
-- Constraints for table `nekretnina`
--
ALTER TABLE `nekretnina`
  ADD CONSTRAINT `nekretnina_grad_id` FOREIGN KEY (`grad_id`) REFERENCES `grad` (`id`),
  ADD CONSTRAINT `nekretnina_oglas` FOREIGN KEY (`tip_oglasa_id`) REFERENCES `tip_oglasa` (`id`),
  ADD CONSTRAINT `nekretnina_status` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `nekretnina_tip_id` FOREIGN KEY (`tip_nekretnine_id`) REFERENCES `tip_nekretnine` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
