-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 25. Feb 2018 um 12:29
-- Server-Version: 10.1.30-MariaDB
-- PHP-Version: 7.2.2

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
  `comment` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `comments`
--

INSERT INTO `comments` (`commentID`, `imageID`, `comment`, `nickname`) VALUES
(60, 34, 'Mir auch!', 'Nicky'),
(61, 46, 'Die sind zu schÃ¶n, um Boring zu sein!', 'nadine2810'),
(62, 42, 'Das ist eine wirklich langweilige StraÃŸe', 'nadine2810'),
(63, 44, 'Wow, eine wunderschÃ¶ne Stadt!', 'nadine2810'),
(64, 43, 'Ihhhh eine MÃ¼cke', 'nadine2810'),
(65, 45, 'Wow, hat er etwa Superman gezeichnet? ', 'nadine2810'),
(66, 45, 'Jaaa, gell? Richtig krass! Der Typ is sowas von nicht boring!', 'KinkouKisame'),
(67, 50, 'GÃ¤Ã¤Ã¤Ã¤Ã¤Ã¤Ã¤Ã¤Ã¤Ã¤Ã¤Ã¤Ã¤Ã¤Ã¤hn! Aber der Hund is viel zu cool  :D ', 'KinkouKisame'),
(68, 50, 'Spam', 'KinkouKisame'),
(69, 50, 'Spam', 'KinkouKisame'),
(70, 42, 'Da hast du recht. So etwas langweiliges hab ich schon lange nicht mehr gesehen!', 'KinkouKisame'),
(71, 49, 'Wow, das sieht wirklich langweilig aus! :D ', 'KinkouKisame'),
(72, 48, 'Oha. Wusste nicht, dass es etwas noch langweiligeres als die StraÃŸe gibt. Top Boring Pic 2k18!', 'KinkouKisame'),
(73, 47, 'Ihhhh. Ich hasse Pilze!', 'KinkouKisame'),
(74, 44, 'Ja finde ich auch. Die Lichter sind geil! ', 'KinkouKisame'),
(75, 51, 'Noch ein gÃ¤hnendes Tier! Aber viel zu sÃ¼ÃŸ, vorallem weil sie wie meine Katze aussieht!', 'KinkouKisame'),
(76, 50, 'HÃ¶r bitte auf zu spamen!', 'fatHobbit'),
(77, 51, 'Jaaa wirklich sÃ¼ÃŸ *.* \r\nmeine Katze ist schwarz', 'fatHobbit'),
(78, 48, 'Das hier ist wirklich Top-Boring! :D', 'fatHobbit'),
(79, 49, 'Ehrlich gesagt finde ich es spannend, wie knapp das am Rande ist! ', 'fatHobbit'),
(80, 47, 'Ich auch :/ ', 'fatHobbit'),
(81, 56, 'Echt langweilig dieser Tunnel!', 'fatHobbit'),
(82, 55, 'Wow ein viel zu schÃ¶nes Bild!', 'fatHobbit'),
(83, 54, 'Ihhh was is denn das? ', 'fatHobbit'),
(84, 52, 'Wow echt schÃ¶ne Licher *.*', 'fatHobbit'),
(85, 53, 'Sieht wie Chemie aus. Ich liebe zwar Chemie, aber das Bild is boring! ', 'fatHobbit'),
(86, 53, 'Uurrgh... ich hasse Chemie :/', 'nadine2810'),
(87, 56, 'Ja finde ich auch. But: i Like trains!', 'nadine2810'),
(88, 54, 'Sieht wie ne Koralle aus :/ ', 'nadine2810'),
(89, 55, 'Ja finde ich auch *.*', 'nadine2810'),
(90, 52, 'Gell *.* Wir haben den gleichen Geschmack! ', 'nadine2810');

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
(42, 'fatHobbit', 1, 'jpg', 4),
(43, 'fatHobbit', 2, 'jpg', -1),
(44, 'fatHobbit', 3, 'jpg', -4),
(45, 'fatHobbit', 4, 'jpg', -7),
(46, 'fatHobbit', 5, 'jpg', -2),
(47, 'nadine2810', 1, 'jpg', -1),
(48, 'nadine2810', 2, 'jpg', 12),
(49, 'nadine2810', 3, 'jpg', 2),
(50, 'nadine2810', 4, 'jpg', -1),
(51, 'nadine2810', 5, 'jpg', -4),
(52, 'KinkouKisame', 1, 'jpg', -10),
(53, 'KinkouKisame', 2, 'png', 4),
(54, 'KinkouKisame', 3, 'jpg', -1),
(55, 'KinkouKisame', 4, 'jpg', -2),
(56, 'KinkouKisame', 5, 'jpg', 1);

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
(73, 'fatHobbit', 'bjoern.ammon@gmx.de', '$2y$10$W7nh9HNVYVFDGntdZQ0d/eg/8JO/gIQ4sEBMBGQiO4RfGVyNdv/Py', 'fatHobbit_0.jpg', 'Ammon', 'Bjoern', 26),
(74, 'nadine2810', 'n.rachau@gmx.de', '$2y$10$kCHxkUL5rnpUM3Xn.XKPUu7Wkci67WPVXY.vCPo2RW9HKOYMXhEza', 'nadine2810_0.jpg', 'Rachau', 'Nadine', 24),
(75, 'KinkouKisame', 'kinkou@gmx.de', '$2y$10$WfFcILe0LUguK.V59iyRQeiu5xBfp9PLA7mGpr6ZdbcEDVXVBmTQO', 'KinkouKisame_0.jpg', '', '', 0);

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
  MODIFY `commentID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT für Tabelle `images`
--
ALTER TABLE `images`
  MODIFY `imageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
