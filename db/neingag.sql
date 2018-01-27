-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 27. Jan 2018 um 19:47
-- Server-Version: 10.1.21-MariaDB
-- PHP-Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `neingag`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `comments`
--

CREATE TABLE `comments` (
  `commentID` int(10) NOT NULL,
  `imageID` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `comments`
--

INSERT INTO `comments` (`commentID`, `imageID`, `comment`, `nickname`) VALUES
(34, 15, 'Panda', 'Mo'),
(35, 15, 'Test', 'Mo'),
(36, 15, 'Hallo', 'Admin'),
(37, 7, 'Pfeil', 'Admin'),
(38, 7, 'Test', 'Nicky'),
(39, 14, 'Test', 'Nicky'),
(40, 14, 'Hallo ich bin Mo', 'Mo'),
(41, 14, 'voll der schÃ¶ne Hund, commie by Mo xoxo', 'Mo'),
(42, 13, 'Scha(r)f', 'Nicky'),
(43, 3, 'Test', 'Admin'),
(44, 5, 'Test', 'Admin'),
(45, 5, 'Hallo\r\n', 'Admin'),
(57, 15, 'Ha', 'Admin'),
(58, 22, 'Mr X', 'Mo');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `images`
--

CREATE TABLE `images` (
  `imageId` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `userImagenumber` int(255) NOT NULL,
  `datatype` varchar(10) NOT NULL,
  `boringCounter` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `images`
--

INSERT INTO `images` (`imageId`, `userName`, `userImagenumber`, `datatype`, `boringCounter`) VALUES
(2, 'fatHobbit', 1, 'jpg', 3),
(3, 'fatHobbit', 2, 'jpg', 1),
(4, 'fat', 1, 'png', 5),
(5, 'fat', 2, 'png', 1),
(6, 'dick', 1, 'jpg', 8),
(7, 'dick', 2, 'png', 0),
(8, 'Admin', 1, 'png', 7),
(9, 'Admin', 2, 'jpg', 7),
(10, 'Admin', 3, 'jpg', 8),
(11, 'Admin', 4, 'jpg', 5),
(12, 'Admin', 5, 'jpg', -16),
(13, 'Admin', 6, 'jpg', 5),
(14, 'Admin', 7, 'jpg', -1),
(15, 'Nicky', 1, 'jpg', 1),
(19, 'Admin', 8, 'jpg', 1),
(20, 'Admin', 9, 'jpg', 1),
(21, 'Nicky', 2, 'jpg', 1),
(22, 'Admin', 10, 'jpg', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profilePic` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `nickname`, `email`, `password`, `profilePic`, `lastName`, `firstName`, `age`) VALUES
(63, 'fat', 'fat@fat.fat', '$2y$10$0LFDiNrtcpfA7HDQKdh13.3QdrdwCo0ELskSbFQ1z9sf76dPfov3.', '', '', '', 0),
(64, 'dick', 'dick@dick.dick', '$2y$10$oyvTNpdphuhjGuSXzkB9F.erS2IisbYLpgOQbSKYeXSw5F/WeBqg6', '', '', '', 0),
(65, 'Admin', 'ad@mi.n', '$2y$10$jUl2LJzFR46qplbcsl27MOhV1OG2xPTdhI74hPNq/PvYT7n2HfDCi', 'Admin_0.png', '', '', 0),
(66, 'Nicky', 'n@s.de', '$2y$10$KhD66NrzWIsZaKsleWwF1.ab/qWGixuqlynzatZovl16wDWcsz4Qy', 'Nicky_0.png', '', '', 0),
(67, 'fatHobbit', 'bjoern.ammon@gmx.de', '$2y$10$L2amn1nb/jYTFTzKqLL8yuImptRaywlbeOP5ty9cGb4hO.6IGtuCq', '', '', '', 0),
(68, 'Mo', 'mo@v.de', '$2y$10$uxL5krBFQgx.RNjs349OKeTzUzr3BUdR8dtyHMEX9OCo1dC3hCxyq', '', 'Muster ', 'Max', 12);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentID`);

--
-- Indizes für die Tabelle `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imageId`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `comments`
--
ALTER TABLE `comments`
  MODIFY `commentID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT für Tabelle `images`
--
ALTER TABLE `images`
  MODIFY `imageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
