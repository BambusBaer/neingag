-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 25. Jan 2018 um 03:55
-- Server-Version: 10.1.22-MariaDB
-- PHP-Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
  `userID` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `comments`
--

INSERT INTO `comments` (`commentID`, `imageID`, `userID`, `comment`, `nickname`) VALUES
(34, 15, 68, 'Panda', 'Mo'),
(35, 15, 68, 'Test', 'Mo'),
(36, 15, 65, 'Hallo', 'Admin'),
(37, 7, 65, 'Pfeil', 'Admin'),
(38, 7, 66, 'Test', 'Nicky'),
(39, 14, 66, 'Test', 'Nicky'),
(40, 14, 68, 'Hallo ich bin Mo', 'Mo'),
(41, 14, 68, 'voll der schÃ¶ne Hund, commie by Mo xoxo', 'Mo'),
(42, 13, 66, 'Scha(r)f', 'Nicky'),
(43, 3, 65, 'Test', 'Admin'),
(44, 5, 65, 'Test', 'Admin'),
(45, 5, 65, 'Hallo\r\n', 'Admin'),
(57, 15, 65, 'Ha', 'Admin'),
(0, 14, 67, 'grgrg', 'fatHobbit');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `images`
--

CREATE TABLE `images` (
  `imageId` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `userImagenumber` int(100) NOT NULL,
  `datatype` varchar(10) NOT NULL,
  `boringCounter` int(100) NOT NULL,
  `profilPic` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `images`
--

INSERT INTO `images` (`imageId`, `userName`, `userImagenumber`, `datatype`, `boringCounter`, `profilPic`) VALUES
(2, 'fatHobbit', 1, 'jpg', 3, 0),
(3, 'fatHobbit', 2, 'jpg', 3, 0),
(4, 'fat', 1, 'png', 5, 0),
(5, 'fat', 2, 'png', 1, 0),
(6, 'dick', 1, 'jpg', 8, 0),
(7, 'dick', 2, 'png', 1, 0),
(8, 'Admin', 1, 'png', 7, 0),
(9, 'Admin', 2, 'jpg', 7, 0),
(10, 'Admin', 3, 'jpg', 9, 0),
(11, 'Admin', 4, 'jpg', 5, 0),
(12, 'Admin', 5, 'jpg', -15, 0),
(13, 'Admin', 6, 'jpg', 5, 0),
(14, 'Admin', 7, 'jpg', 1, 0),
(15, 'Nicky', 1, 'jpg', 1, 0),
(44, 'fatHobbit', 3, 'png', 1, 0),
(45, 'fatHobbit', 4, 'png', 1, 0),
(46, 'fatHobbit', 5, 'png', 1, 0),
(47, 'fatHobbit', 6, 'png', 1, 0),
(48, 'fatHobbit', 7, 'png', 1, 0),
(49, 'fatHobbit', 8, 'png', 1, 0),
(50, 'fatHobbit', 9, 'png', 1, 0),
(51, 'fatHobbit', 10, 'png', 1, 0),
(52, 'fatHobbit', 11, 'png', 1, 0),
(53, 'fatHobbit', 12, 'jpg', 1, 0),
(54, 'fatHobbit', 13, 'jpg', 1, 0),
(55, 'fatHobbit', 14, 'jpg', 1, 0),
(56, 'fatHobbit', 15, 'png', 1, 0),
(57, 'fatHobbit', 16, 'jpg', 1, 0),
(58, 'fatHobbit', 17, 'jpg', 1, 0),
(59, 'fatHobbit', 18, 'png', 1, 0),
(60, 'fatHobbit', 19, 'png', 1, 0),
(61, 'fatHobbit', 20, 'jpg', 1, 0),
(62, 'fatHobbit', 21, 'png', 1, 0),
(63, 'fatHobbit', 22, 'jpg', 1, 0),
(64, 'fatHobbit', 23, 'jpg', 1, 0),
(65, 'fatHobbit', 24, 'jpg', 1, 1),
(66, 'fatHobbit', 25, 'jpg', 1, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `nickname`, `email`, `password`) VALUES
(63, 'fat', 'fat@fat.fat', '$2y$10$0LFDiNrtcpfA7HDQKdh13.3QdrdwCo0ELskSbFQ1z9sf76dPfov3.'),
(64, 'dick', 'dick@dick.dick', '$2y$10$oyvTNpdphuhjGuSXzkB9F.erS2IisbYLpgOQbSKYeXSw5F/WeBqg6'),
(65, 'Admin', 'ad@mi.n', '$2y$10$jUl2LJzFR46qplbcsl27MOhV1OG2xPTdhI74hPNq/PvYT7n2HfDCi'),
(66, 'Nicky', 'n@s.de', '$2y$10$KhD66NrzWIsZaKsleWwF1.ab/qWGixuqlynzatZovl16wDWcsz4Qy'),
(67, 'fatHobbit', 'bjoern.ammon@gmx.de', '$2y$10$L2amn1nb/jYTFTzKqLL8yuImptRaywlbeOP5ty9cGb4hO.6IGtuCq'),
(68, 'kaka', 'kaka@ka.ka', '$2y$10$Seh9IXHuQ98.Zy2xePrh2uJLdvsK0eHYy0ySXqhTcp3nrMDkj5sAS');

--
-- Indizes der exportierten Tabellen
--

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
-- AUTO_INCREMENT für Tabelle `images`
--
ALTER TABLE `images`
  MODIFY `imageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
