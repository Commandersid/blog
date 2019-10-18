-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 18 okt 2019 om 09:18
-- Serverversie: 10.1.36-MariaDB
-- PHP-versie: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `account`
--

CREATE TABLE `account` (
  `ID` int(4) NOT NULL,
  `Naam` varchar(40) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Wachtwoord` varchar(12) NOT NULL,
  `foto` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `account`
--

INSERT INTO `account` (`ID`, `Naam`, `Email`, `Wachtwoord`, `foto`) VALUES
(1, 'John', 'johnbaker@hotmail.com', 'john456', 'smiling_man.jpg'),
(2, 'Mark', 'marknietzche@gmail.com', 'Mark@506', 'Mark.jpg');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `blogtekst`
--

CREATE TABLE `blogtekst` (
  `ID` int(6) NOT NULL,
  `titel` varchar(50) NOT NULL,
  `tekst` varchar(1000) NOT NULL,
  `account_ID` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `blogtekst`
--

INSERT INTO `blogtekst` (`ID`, `titel`, `tekst`, `account_ID`) VALUES
(1, 'Mijn Vakantie', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum at mauris ante. Nunc dignissim urna arcu, ac pellentesque arcu varius nec. Integer rhoncus enim sit amet leo tristique, fermentum malesuada nisi pulvinar. Cras vitae nunc eget lectus sagittis ultricies sit amet sit amet lacus. Mauris commodo nisl ac pellentesque iaculis. Etiam ultricies lacinia urna at ultricies. Suspendisse iaculis nibh id odio mollis maximus. Donec porta sit amet nibh at dictum. Mauris id felis et arcu faucibus consectetur non non lorem. Aenean eget libero eu massa scelerisque lacinia nec eu erat. Morbi et gravida mauris. Donec a placerat diam. Suspendisse potenti. Aliquam massa orci, tristique vel convallis nec, vulputate non nunc. Duis id accumsan neque.', 2),
(2, 'Curabitur vitae sapien mi', 'Duis sem elit, finibus non placerat ut, facilisis eget quam. Praesent pulvinar egestas massa, id pharetra dui ultrices pharetra. Vivamus mi mauris, eleifend nec sollicitudin ac, congue sit amet tortor. Quisque tincidunt massa magna, nec placerat ipsum luctus fringilla. Duis iaculis urna commodo, interdum neque non, interdum nisi. In mi lacus, consequat nec turpis in, dictum aliquet odio. Vestibulum mattis urna eget augue sollicitudin ultricies. Suspendisse mi sem, consectetur sed sollicitudin vel, efficitur vel arcu.', 1),
(3, 'Mauris iaculis', 'quam a condimentum placerat, ligula enim sollicitudin leo, a fermentum arcu ligula eu magna. Morbi posuere, ex et accumsan blandit, erat libero vehicula lectus, et aliquam elit est vel neque. Praesent et nulla mollis, tincidunt tellus vel, mattis lacus. Integer dapibus ex in quam sagittis, ut iaculis justo eleifend. Praesent condimentum ut nibh semper eleifend. Nam ligula erat, consequat et urna at, euismod laoreet mi. Sed finibus nisl ut enim sodales porttitor. Proin pulvinar, augue sed sagittis cursus, risus nunc imperdiet turpis, laoreet pellentesque dui augue eget massa. Sed quam dui, scelerisque sit amet finibus vel, vehicula ut dui. Pellentesque odio ipsum, interdum nec neque nec, sollicitudin congue elit. Aenean molestie nulla in ipsum pretium, vitae aliquam ante porttitor. Aliquam erat volutpat. Sed dictum magna in erat pretium, eget porttitor purus efficitur. Maecenas nec lacus quis sem luctus aliquet.', 2);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `blogtekst`
--
ALTER TABLE `blogtekst`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `account`
--
ALTER TABLE `account`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `blogtekst`
--
ALTER TABLE `blogtekst`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
