-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 22. Jan 2018 um 04:18
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
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `comments`
--

INSERT INTO `comments` (`commentID`, `imageID`, `userID`, `comment`) VALUES
(10, 12, 67, 'fd'),
(11, 12, 67, 'dsa'),
(12, 12, 67, 'fff'),
(13, 6, 67, 'a'),
(14, 8, 67, 'a'),
(15, 12, 67, 'fds'),
(16, 12, 67, 'fds'),
(17, 12, 67, 'fsd'),
(18, 12, 67, 'fdsf'),
(19, 12, 67, 'dfsd'),
(20, 12, 67, 'fds'),
(21, 14, 67, 'Wieeee es gibt noch keine Kommentare? Zu so einem sÃ¼ÃŸem Hund? oO unglaublich'),
(22, 14, 67, 'jaaa ich finde es auch richtig krass!!! '),
(23, 14, 67, 'Dann lass uns mal noch die anderen Bilder anschauen!!');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `images`
--

CREATE TABLE `images` (
  `imageId` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `userImagenumber` int(255) NOT NULL,
  `datatype` varchar(10) NOT NULL,
  `boringCounter` int(255) NOT NULL,
  `comments` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `images`
--

INSERT INTO `images` (`imageId`, `userName`, `userImagenumber`, `datatype`, `boringCounter`, `comments`) VALUES
(2, 'fatHobbit', 1, 'jpg', 3, 0x41),
(3, 'fatHobbit', 2, 'jpg', 3, 0x41),
(4, 'fat', 1, 'png', 5, 0x41),
(5, 'fat', 2, 'png', 1, 0x41),
(6, 'dick', 1, 'jpg', 8, 0x41),
(7, 'dick', 2, 'png', 1, 0x41),
(8, 'Admin', 1, 'png', 7, 0x41),
(9, 'Admin', 2, 'jpg', 7, 0x41),
(10, 'Admin', 3, 'jpg', 8, 0x41),
(11, 'Admin', 4, 'jpg', 5, 0x41),
(12, 'Admin', 5, 'jpg', -16, 0x41),
(13, 'Admin', 6, 'jpg', 5, 0x41),
(14, 'Admin', 7, 'jpg', -1, 0x41),
(15, 'Nicky', 1, 'jpg', 1, 0x41);

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
(67, 'fatHobbit', 'bjoern.ammon@gmx.de', '$2y$10$L2amn1nb/jYTFTzKqLL8yuImptRaywlbeOP5ty9cGb4hO.6IGtuCq');

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
  MODIFY `commentID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT für Tabelle `images`
--
ALTER TABLE `images`
  MODIFY `imageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
