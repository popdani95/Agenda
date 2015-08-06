-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 06 Aug 2015 la 15:00
-- Versiune server: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `phonebook`
--

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL,
  `first_name` varchar(66) NOT NULL,
  `last_name` varchar(66) NOT NULL,
  `number` varchar(17) NOT NULL,
  `photos_json` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `contacts`
--

INSERT INTO `contacts` (`id`, `first_name`, `last_name`, `number`, `photos_json`, `timestamp`) VALUES
(20, 'Pop', 'Daniel', '0745634563', '[{"name":"4b001f24fb9a3c73e22225ba93cd2bd9.jpg"},{"name":"6a60b8303ab1f29855736ff5563f6b81.jpg"},{"name":"e970003755074a5685b52b6764fc057f.jpg"},{"name":"7da2de58f59df7acc04a6e38efeca9c1.jpg"}]', '2015-08-05 21:57:07'),
(21, 'Popescu', 'Daniela', '0745634563', '[{"name":"default.jpg"}]', '2015-08-05 21:57:35'),
(22, 'Bogdan', 'Nicorici', '0745634563', '[{"name":"7f49f4e1ac4f81f444d43a7f7d6188b5.jpg"}]', '2015-08-05 21:57:57'),
(23, 'Pop', 'Andrei', '0756475645', '[{"name":"2fe09635183e007f36b9d82d24c8dd62.jpg"}]', '2015-08-05 21:58:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
