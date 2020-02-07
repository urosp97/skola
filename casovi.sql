-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2019 at 05:00 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `casovi`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `eventID` int(11) NOT NULL,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cena` double NOT NULL,
  `slika` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`eventID`, `naziv`, `cena`, `slika`) VALUES
(1, 'Osnovna škola', 0, '1.png'),
(2, 'Srednja škola', 0, '2.png'),
(3, 'Dodatna literatura', 0, '3.png'),
(4, 'Zbirka za malu maturu', 500, '4.png'),
(5, 'Udžbenik za 3.razred', 600, '5.png'),
(6, 'Zbirka zadataka za 5.razred', 350, '6.png'),
(7, 'Radna sveska za 4.razred', 650, '7.png'),
(8, 'Zbirka za 4.razred srednje škole', 1250, '8.png'),
(9, 'Udžbenik za 1.razred srednje škole', 950, '9.jpg'),
(10, 'Zbirka za 2.razred gimnazije', 1500, '10.jpg'),
(11, 'Zbirka za pripremu prijemnog', 480, '11.png'),
(12, 'Matiš, baš svuda!', 2200, '12.jpg'),
(13, 'Matiš za pametnu decu!', 750, '13.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategorija`
--

CREATE TABLE `kategorija` (
  `idKategorije` int(20) NOT NULL,
  `naziv` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kategorija`
--

INSERT INTO `kategorija` (`idKategorije`, `naziv`) VALUES
(1, 'Profesor'),
(2, 'Asistent'),
(3, 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `idVesti` int(20) NOT NULL,
  `idKomentara` int(20) NOT NULL,
  `ime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `komentar` varchar(1500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`idVesti`, `idKomentara`, `ime`, `komentar`) VALUES
(1, 1, 'Rea', 'Tamarica je najbolja'),
(8, 2, 'Olivera', 'dsds');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `korisnikID` int(20) NOT NULL,
  `imeIPrezime` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `korisnickoIme` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lozinka` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `rola` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'korisnik'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`korisnikID`, `imeIPrezime`, `korisnickoIme`, `lozinka`, `rola`) VALUES
(1, 'admin', 'admin', 'admin', 'admin'),
(2, 'rea', 'rea', 'rea', 'korisnik'),
(3, 'moj deda', 'mojDeda', 'mojDeda', 'korisnik'),
(4, 'rea rea', 'ma', 'majce', 'korisnik');

-- --------------------------------------------------------

--
-- Table structure for table `narudzbina`
--

CREATE TABLE `narudzbina` (
  `naruzbinaID` int(11) NOT NULL,
  `eventID` int(11) NOT NULL,
  `korisnikID` int(11) NOT NULL,
  `datumNarudzbine` date NOT NULL,
  `kolicina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `narudzbina`
--

INSERT INTO `narudzbina` (`naruzbinaID`, `eventID`, `korisnikID`, `datumNarudzbine`, `kolicina`) VALUES
(10, 4, 1, '2019-01-29', 4),
(11, 9, 1, '2019-01-29', 7),
(12, 13, 1, '2019-01-29', 2),
(13, 4, 2, '2019-01-30', 5),
(14, 4, 2, '2019-01-30', 4);

-- --------------------------------------------------------

--
-- Table structure for table `newfiles`
--

CREATE TABLE `newfiles` (
  `id` int(11) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `type` varchar(40) NOT NULL DEFAULT 'application/octet-stream',
  `description` varchar(100) NOT NULL DEFAULT 'File Transfer',
  `disposition` varchar(20) NOT NULL DEFAULT 'attachment',
  `expires` varchar(10) NOT NULL DEFAULT '0',
  `cache` varchar(20) NOT NULL DEFAULT 'must-revalidate',
  `pragma` varchar(10) NOT NULL DEFAULT 'public'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newfiles`
--

INSERT INTO `newfiles` (`id`, `filename`, `type`, `description`, `disposition`, `expires`, `cache`, `pragma`) VALUES
(1, 'KosijevaTeorema.pdf', 'application/octet-stream', 'File Transfer', 'attachment', '0', 'must-revalidate', 'public'),
(2, 'PitagorinaTeorema.pdf', 'application/octet-stream', 'File Transfer', 'attachment', '0', 'must-revalidate', 'public'),
(3, 'TalesovaTeorema.pdf', 'application/octet-stream', 'File Transfer', 'attachment', '0', 'must-revalidate', 'public'),
(4, 'SinusnaTeorema.pdf', 'application/octet-stream', 'File Transfer', 'attachment', '0', 'must-revalidate', 'public');

-- --------------------------------------------------------

--
-- Table structure for table `profesor`
--

CREATE TABLE `profesor` (
  `profesorID` int(20) NOT NULL,
  `imePrezime` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `biografija` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `brojUcenika` int(20) NOT NULL,
  `idKategorije` int(20) NOT NULL,
  `lead` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vest`
--

CREATE TABLE `vest` (
  `idVesti` int(20) NOT NULL,
  `naslov` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lead` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `celaVest` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `datum` date NOT NULL,
  `idKategorije` int(20) NOT NULL,
  `slika` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vest`
--

INSERT INTO `vest` (`idVesti`, `naslov`, `lead`, `celaVest`, `datum`, `idKategorije`, `slika`) VALUES
(1, 'Miloš Matić', 'IZBOR I ZVANJE: Redovni profesor, Fakultet za primenjeni menadžment, ekonomiju i finansije', 'IZBOR I ZVANJE: Redovni profesor, Fakultet za primenjeni menadžment, ekonomiju i finansije, Univerzitet Privredna akademija u Novom Sadu (2018)\r\nDOKTORAT: Fakultet bezbednosti, Beograd (2009)\r\nMAGISTRATURA: Elektrotehnički fakultet, Beograd (1988)\r\nFAKULTET: Vojno-tehnička akademija, Zagreb (1977)\r\nSREDNJA ŠKOLA: Kraljevo\r\nOSNOVNA ŠKOLA: Kraljevo', '2019-01-29', 1, 'prof1.jpg'),
(2, 'Nikola Nikolić', 'IZBOR I ZVANJE: Asistent, Fakultet organizacionih nauka', 'IZBOR I ZVANJE: Asistent, Fakultet organizacionih nauka, Univerzitet u Beogradu (2018)\r\nMAGISTRATURA: Fakultet organizacionih nauka, Beograd (2017)\r\nFAKULTET: Fakultet organizacionih nauka, Beograd (2012)\r\nSREDNJA ŠKOLA: Topola\r\nOSNOVNA ŠKOLA: Topola', '2019-01-02', 2, 'prof2.jpg'),
(3, 'Ana Anić', 'IZBOR I ZVANJE: Student, Fakultet organizacionih nauka', 'IZBOR U ZVANJE: Student, Fakultet organizacionih nauka, Univerzitet u Beogradu (2018)\r\nFAKULTET: Fakultet organizacionih nauka, Beograd (2012)\r\nSREDNJA ŠKOLA: Valjevo\r\nOSNOVNA ŠKOLA: Valjevo', '2019-01-05', 3, 'prof3.jpg'),
(4, 'Petra Pavlović', 'IZBOR I ZVANJE: Redovni profesor', 'IZBOR I ZVANJE: Redovni profesor, Prirodno matematicki fakultet, Univerzitet u Beogradu (2002)\r\nDOKTORAT: Fakultet bezbednosti, Beograd (2009)\r\nMAGISTRATURA: Elektrotehnički fakultet, Beograd (2006)\r\nFAKULTET: Prirodno matematicki fakultet, Beograd (2000)\r\nSREDNJA ŠKOLA: Gornji Milanovac\r\nOSNOVNA ŠKOLA: Gornji Milanovac', '2018-12-04', 1, 'prof4.jpg'),
(6, 'Milena', 'ms', 'sjsj', '2019-01-30', 1, ''),
(7, 'asda', 'sad', 'sad', '2019-01-30', 1, ''),
(8, 'dcd', 'sdds', 'sdd', '2019-01-30', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `zakazi`
--

CREATE TABLE `zakazi` (
  `imePrezime` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `datumRodjenja` date NOT NULL,
  `skola` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `razredID` int(20) NOT NULL,
  `profesorID` int(20) NOT NULL,
  `termin` datetime(6) NOT NULL,
  `zakaziID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`eventID`);

--
-- Indexes for table `kategorija`
--
ALTER TABLE `kategorija`
  ADD PRIMARY KEY (`idKategorije`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`idKomentara`,`idVesti`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`korisnikID`);

--
-- Indexes for table `narudzbina`
--
ALTER TABLE `narudzbina`
  ADD PRIMARY KEY (`naruzbinaID`);

--
-- Indexes for table `newfiles`
--
ALTER TABLE `newfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`profesorID`),
  ADD KEY `idKategorije` (`idKategorije`);

--
-- Indexes for table `vest`
--
ALTER TABLE `vest`
  ADD PRIMARY KEY (`idVesti`),
  ADD KEY `idKategorije` (`idKategorije`);

--
-- Indexes for table `zakazi`
--
ALTER TABLE `zakazi`
  ADD PRIMARY KEY (`zakaziID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kategorija`
--
ALTER TABLE `kategorija`
  MODIFY `idKategorije` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `idKomentara` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `korisnikID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `narudzbina`
--
ALTER TABLE `narudzbina`
  MODIFY `naruzbinaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `newfiles`
--
ALTER TABLE `newfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `profesor`
--
ALTER TABLE `profesor`
  MODIFY `profesorID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vest`
--
ALTER TABLE `vest`
  MODIFY `idVesti` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `zakazi`
--
ALTER TABLE `zakazi`
  MODIFY `zakaziID` int(20) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profesor`
--
ALTER TABLE `profesor`
  ADD CONSTRAINT `profesor_ibfk_1` FOREIGN KEY (`idKategorije`) REFERENCES `kategorija` (`idKategorije`);

--
-- Constraints for table `vest`
--
ALTER TABLE `vest`
  ADD CONSTRAINT `vest_ibfk_1` FOREIGN KEY (`idKategorije`) REFERENCES `kategorija` (`idKategorije`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
