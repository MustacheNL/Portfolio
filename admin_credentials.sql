-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 08 nov 2017 om 13:52
-- Serverversie: 10.1.21-MariaDB
-- PHP-versie: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `admin_credentials`
--

CREATE TABLE `admin_credentials` (
  `id` int(11) NOT NULL DEFAULT '1',
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `country` varchar(25) DEFAULT NULL,
  `region` varchar(25) DEFAULT NULL,
  `city` varchar(25) DEFAULT NULL,
  `street` varchar(25) DEFAULT NULL,
  `postalcode` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `admin_credentials`
--

INSERT INTO `admin_credentials` (`id`, `fullname`, `username`, `mail`, `password`, `country`, `region`, `city`, `street`, `postalcode`) VALUES
(1, 'Administrator SmoothStyler', 'Admin', 'admin@smoothstyler.com', '$2y$10$muzvDziCON9/Ao7p/SCBeekK0UL8XcCZFhkn4s2klwHHg4fcb.G0S', 'Nederland', 'Gelderland', 'Bennekom', 'Acacialaan 10', '6721CP');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `admin_credentials`
--
ALTER TABLE `admin_credentials`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
