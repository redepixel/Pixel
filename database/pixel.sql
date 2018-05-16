-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16-Maio-2018 às 19:22
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pixel`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pixel_amizades`
--

CREATE TABLE `pixel_amizades` (
  `id` int(11) NOT NULL,
  `iduser` varchar(255) NOT NULL,
  `idquem` varchar(255) NOT NULL,
  `aceite` int(11) NOT NULL,
  `view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pixel_amizades`
--

INSERT INTO `pixel_amizades` (`id`, `iduser`, `idquem`, `aceite`, `view`) VALUES
(31, '1', '7', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pixel_desenhos`
--

CREATE TABLE `pixel_desenhos` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `photo` text NOT NULL,
  `destaque` int(11) NOT NULL,
  `sobre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pixel_desenhos`
--

INSERT INTO `pixel_desenhos` (`id`, `iduser`, `photo`, `destaque`, `sobre`) VALUES
(27, 1, 'pixel_photo.8580fe0f175bb2b2fedb67ba8b8d0227a1e13348.png', 0, ''),
(28, 1, 'pixel_photo.84b706c2c0aa67deb96d172ff2a5eae0a2f58dac.png', 0, ''),
(29, 1, 'pixel_photo.72543c05e36fc45fea8af21c95311f373122fa26.png', 0, ''),
(30, 1, 'pixel_photo.8a676a78da8c5215e6d6a4d2cccc2f4b1b2cbd5b.png', 0, 'cool'),
(31, 1, 'pixel_photo.eaedc356372c2bd7d71b46f42f012c58541ffb73.png', 0, 'lol\r\n');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pixel_like`
--

CREATE TABLE `pixel_like` (
  `id` int(11) NOT NULL,
  `idpost` varchar(255) NOT NULL,
  `iduser` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pixel_user`
--

CREATE TABLE `pixel_user` (
  `id` int(11) NOT NULL,
  `thecry` varchar(512) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `sobrenome` varchar(255) NOT NULL,
  `photo` text NOT NULL,
  `capa` text NOT NULL,
  `background` text NOT NULL,
  `coins` varchar(255) NOT NULL,
  `inisession` datetime NOT NULL,
  `datec` datetime NOT NULL,
  `priv` int(11) NOT NULL,
  `lastlogin` datetime NOT NULL,
  `configurado` varchar(11) NOT NULL,
  `pin` varchar(5) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pixel_user`
--

INSERT INTO `pixel_user` (`id`, `thecry`, `email`, `senha`, `nome`, `sobrenome`, `photo`, `capa`, `background`, `coins`, `inisession`, `datec`, `priv`, `lastlogin`, `configurado`, `pin`, `ip`, `admin`) VALUES
(1, '85d9235d10cf197950d843e56b47021ff02b0cee', 'kaway@hotmail.com', 'a0b48bf6735b085374fa984535372a8025210e45', 'Alexandre', 'Silva', 'pixel_photo.9c105b339b4771f6141cc3043fecc4794f0af266.png', '4.jpg', '2.jpg', '0', '2018-05-14 20:51:32', '2018-05-14 20:51:32', 0, '2018-05-16 12:05:09', '0', '5151', '179.252.243.88', 1),
(3, '70909c345cd056c3d4dcd0f5a056fb33e88aaa23', 'anelise@hotmail.com', 'a0b48bf6735b085374fa984535372a8025210e45', 'Anelise', 'Silva', 'pixel_photo.deb0ef9af37a16754a57698a2bf236b85f253eec.png', '4.jpg', 'pixel_photo.8a676a78da8c5215e6d6a4d2cccc2f4b1b2cbd5b.png', '0', '2018-05-14 20:57:32', '2018-05-14 20:57:32', 0, '2018-05-14 20:57:32', '0', '5151', '::1', 0),
(4, '5ee4fb6037a0acfce9dbc9c5e78d47f70eb79002', 'lolyou@hotmail.com', 'a0b48bf6735b085374fa984535372a8025210e45', 'CS', 'GO', 'pixel_photo.717e6aff43188ac3c22bb3c9cd1414fc8a2cb678.png', '4.jpg', 'pixel_photo.57f648ad85af89c48e2093c0e2a9d33773ba22d1.png', '0', '2018-05-14 21:12:06', '2018-05-14 21:12:06', 0, '2018-05-14 21:12:06', '0', '5151', '::1', 0),
(5, 'f35c4d630f7ecae0e90c701ee57bd5c7863f81c3', 'anelise001@homail.com', '15efb077c89b25fcb80289273e3d100d66eeb615', 'Anelise ', 'Naiara', 'pixel_photo.deb0ef9af37a16754a57698a2bf236b85f253eec.png', 'pixel_photo.14a0e1c0494b49bcc6e62a99abadbf032b3c3381.png', 'pixel_photo.36d15558ecb13a0af8b647145faa6357e44fdd50.png', '0', '2018-05-14 21:17:15', '2018-05-14 21:17:15', 0, '2018-05-14 21:23:59', '0', '777', '::1', 0),
(6, '9a863f159e7e406d7cde8437a1ccd28663829a3d', 'evertonaugustoo@gmail.com', 'e5d02517b5ad6b3cacdb0ceb6c05f62abe44fe67', 'Éverton', 'Augusto', 'pixel_photo.db714ef886cb9b8dd34bb84c0294238fc1d81e7d.png', '4.jpg', '2.jpg', '0', '2018-05-15 12:27:08', '2018-05-15 12:27:08', 0, '2018-05-16 12:31:25', '0', '11234', '179.199.45.56', 0),
(7, 'ff9358742103ddc441d6fad617497413480957f1', 'mateusheckertg@gmail.com', '1cb09364452f9a307f94c045215ba7bb84c1b967', 'Mateus', 'Heckert Gonçalves', 'pixel_photo.060faf44a528c3222dbf5670d9d7a8250b7eeed3.png', '4.jpg', '2.jpg', '0', '2018-05-15 17:58:01', '2018-05-15 17:58:01', 0, '2018-05-15 18:10:23', '0', '13467', '177.2.35.108', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pixel_amizades`
--
ALTER TABLE `pixel_amizades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pixel_desenhos`
--
ALTER TABLE `pixel_desenhos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pixel_like`
--
ALTER TABLE `pixel_like`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pixel_user`
--
ALTER TABLE `pixel_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pixel_amizades`
--
ALTER TABLE `pixel_amizades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `pixel_desenhos`
--
ALTER TABLE `pixel_desenhos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `pixel_like`
--
ALTER TABLE `pixel_like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pixel_user`
--
ALTER TABLE `pixel_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
