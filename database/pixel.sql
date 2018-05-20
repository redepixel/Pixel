-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21-Maio-2018 às 01:44
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
(3, '11', '1', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pixel_comment`
--

CREATE TABLE `pixel_comment` (
  `id` int(11) NOT NULL,
  `iduser` varchar(255) NOT NULL,
  `idpost` varchar(255) NOT NULL,
  `texto` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pixel_comment`
--

INSERT INTO `pixel_comment` (`id`, `iduser`, `idpost`, `texto`, `date`) VALUES
(9, '1', '9', 'Beleuza', '2018-05-20 20:44:08'),
(10, '1', '8', 'testando', '2018-05-20 20:44:14');

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
(1, 3, 'pixel_photo.640615ece74bac942d277254f74251781dfb3389.png', 0, ''),
(2, 1, 'pixel_photo.46cf5a1aab332543dd6eadf48410fef4238cc592.png', 0, 'Nice'),
(3, 11, 'pixel_photo.35b1937f63eba06a1d705fabd98557759238f627.png', 0, 'ajuda'),
(4, 1, 'pixel_photo.a7f863aca3b8ebaedcabab8b996edc548ac01598.png', 0, ''),
(5, 1, 'pixel_photo.278fb1c5eb8857602393e63bbc5365df5fdb090b.png', 0, ''),
(6, 1, 'pixel_photo.d09d81cb4821076496ddfdd6d4c440f2714ed220.png', 0, ''),
(7, 1, 'pixel_photo.4ff705f829485dd04b5a660d492df3fc1c11983b.png', 0, 'Doctor Who'),
(8, 8, '', 0, 'Teste'),
(9, 8, 'pixel_photo.1f8e5773e5598b8dc29076b06c2f5bff3d66fe53.png', 0, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pixel_like`
--

CREATE TABLE `pixel_like` (
  `id` int(11) NOT NULL,
  `idpost` varchar(255) NOT NULL,
  `iduser` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pixel_like`
--

INSERT INTO `pixel_like` (`id`, `idpost`, `iduser`) VALUES
(1, '3', '11'),
(3, '2', '8');

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
(1, '85d9235d10cf197950d843e56b47021ff02b0cee', 'kaway@hotmail.com', 'a0b48bf6735b085374fa984535372a8025210e45', 'Alexandre', 'Silva', 'pixel_photo.deb0ef9af37a16754a57698a2bf236b85f253eec.png', 'pixel_photo.4ff705f829485dd04b5a660d492df3fc1c11983b.png', 'pixel_photo.8a676a78da8c5215e6d6a4d2cccc2f4b1b2cbd5b.png', '100', '2018-05-14 20:51:32', '2018-05-14 20:51:32', 0, '2018-05-20 18:19:32', '3', '5151', '200.193.102.57', 1),
(3, '70909c345cd056c3d4dcd0f5a056fb33e88aaa23', 'anelise@hotmail.com', 'a0b48bf6735b085374fa984535372a8025210e45', 'Anelise', 'Silva', 'pixel_photo.8819cd398a749a117c12cc838a5b3e9fca59d90c.png', '4.jpg', 'pixel_photo.8a676a78da8c5215e6d6a4d2cccc2f4b1b2cbd5b.png', '0', '2018-05-14 20:57:32', '2018-05-14 20:57:32', 0, '2018-05-18 12:24:24', '0', '5151', '::1', 0),
(4, '5ee4fb6037a0acfce9dbc9c5e78d47f70eb79002', 'lolyou@hotmail.com', 'a0b48bf6735b085374fa984535372a8025210e45', 'CS', 'GO', 'default.png', '4.jpg', 'pixel_photo.57f648ad85af89c48e2093c0e2a9d33773ba22d1.png', '0', '2018-05-14 21:12:06', '2018-05-14 21:12:06', 0, '2018-05-14 21:12:06', '0', '5151', '::1', 0),
(5, 'f35c4d630f7ecae0e90c701ee57bd5c7863f81c3', 'anelise001@homail.com', '15efb077c89b25fcb80289273e3d100d66eeb615', 'Anelise ', 'Naiara', 'default.png', 'pixel_photo.14a0e1c0494b49bcc6e62a99abadbf032b3c3381.png', 'pixel_photo.36d15558ecb13a0af8b647145faa6357e44fdd50.png', '0', '2018-05-14 21:17:15', '2018-05-14 21:17:15', 0, '2018-05-14 21:23:59', '0', '777', '::1', 0),
(6, '9a863f159e7e406d7cde8437a1ccd28663829a3d', 'evertonaugustoo@gmail.com', 'e5d02517b5ad6b3cacdb0ceb6c05f62abe44fe67', 'Éverton', 'Augusto', 'default.png', '4.jpg', '2.jpg', '0', '2018-05-15 12:27:08', '2018-05-15 12:27:08', 0, '2018-05-16 12:31:25', '0', '11234', '179.199.45.56', 0),
(7, 'ff9358742103ddc441d6fad617497413480957f1', 'mateusheckertg@gmail.com', '1cb09364452f9a307f94c045215ba7bb84c1b967', 'Mateus', 'Heckert Gonçalves', 'default.png', '4.jpg', '2.jpg', '0', '2018-05-15 17:58:01', '2018-05-15 17:58:01', 0, '2018-05-15 18:10:23', '0', '13467', '177.2.35.108', 0),
(8, '8d79f497ebc60742f4fa0eae67b68f768deaa969', 'pauloricardoprogramador@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Paulo', 'Ricardo', 'default.png', '4.jpg', '2.jpg', '0', '2018-05-16 15:32:22', '2018-05-16 15:32:22', 0, '2018-05-20 17:40:25', '3', '09920', '179.212.90.129', 0),
(9, '8278ddab8a9d02c7eae9535b055aeb99edaec791', 'pixel123@gmail.com', '87e511338f6a623a4a99bfba55efa7b2ae86dcdf', 'pixel', 'lexip', 'default.png', 'pixel_photo.05d19f641cbcf5547fd5bc3abb774523454fdf23.png', 'pixel_photo.92d1d9aae4f2d53592d441ec22eae81158797f09.png', '0', '2018-05-16 18:14:25', '2018-05-16 18:14:25', 0, '2018-05-18 09:28:10', '0', '1234', '179.225.196.250', 0),
(10, '839dde6fe1fc067e0a4ac08e36a5d259660049b6', 'anelise2@hotmail.com', 'd44ed8f8fa908a7f1a9956e93e63ac735d8fb15e', 'Anelise', 'Silva', 'default.png', '4.jpg', '2.jpg', '0', '2018-05-16 19:36:54', '2018-05-16 19:36:54', 0, '2018-05-16 19:36:54', '0', '2006', '::1', 0),
(11, '4878185a84171c3fd37677f1c1028f49da20621a', 'adson.tanajura@gmail.com', '807d2caa060654981e05b2120c428ba16034f559', 'Adson', 'Nunes', 'pixel_photo.98f1d868ca03ec1811e5aae9137e5cf0833ffbdb.png', '4.jpg', '2.jpg', '0', '2018-05-20 11:38:14', '2018-05-20 11:38:14', 0, '2018-05-20 11:38:14', '3', '3232', '45.4.36.149', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pixel_amizades`
--
ALTER TABLE `pixel_amizades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pixel_comment`
--
ALTER TABLE `pixel_comment`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pixel_comment`
--
ALTER TABLE `pixel_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pixel_desenhos`
--
ALTER TABLE `pixel_desenhos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pixel_like`
--
ALTER TABLE `pixel_like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pixel_user`
--
ALTER TABLE `pixel_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
