-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 03. Jan 2018 um 17:41
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
  `commentID` int(10) UNSIGNED NOT NULL,
  `imageID` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `comments`
--

INSERT INTO `comments` (`commentID`, `imageID`, `comment`) VALUES
(1, 2, 'test'),
(2, 2, 'awrfafwa'),
(11, 5, 'teste'),
(12, 5, 'testestestsetset'),
(13, 4, 'Kommentar'),
(14, 8, 'KOmmenaraiiwa'),
(15, 15, 'awfseg'),
(16, 15, 'efefxxxxxxxxxxxxxx'),
(17, 15, 'dddddddddddd'),
(18, 15, 'Panda'),
(19, 5, 'facebook'),
(20, 13, 'schafshund'),
(21, 13, 'schafshund'),
(22, 12, 'LAAAAAAAAMMEEEEE');

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
(62, 'fatHobbit', 'bjoern.ammon@gmx.de', '$2y$10$1RYqKwTwakhFLnmkFnz4aeM4UAbmysmwJVFVTM4fOJm/Dkja1UMoa'),
(63, 'fat', 'fat@fat.fat', '$2y$10$0LFDiNrtcpfA7HDQKdh13.3QdrdwCo0ELskSbFQ1z9sf76dPfov3.'),
(64, 'dick', 'dick@dick.dick', '$2y$10$oyvTNpdphuhjGuSXzkB9F.erS2IisbYLpgOQbSKYeXSw5F/WeBqg6'),
(65, 'Admin', 'ad@mi.n', '$2y$10$jUl2LJzFR46qplbcsl27MOhV1OG2xPTdhI74hPNq/PvYT7n2HfDCi'),
(66, 'Nicky', 'n@s.de', '$2y$10$KhD66NrzWIsZaKsleWwF1.ab/qWGixuqlynzatZovl16wDWcsz4Qy');

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
  MODIFY `commentID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT für Tabelle `images`
--
ALTER TABLE `images`
  MODIFY `imageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
