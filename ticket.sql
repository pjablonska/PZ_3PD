-- phpMyAdmin SQL Dump
-- version 3.4.5deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 28 May 2012, 11:30
-- Wersja serwera: 5.1.58
-- Wersja PHP: 5.3.6-13ubuntu3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `system_ticket`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `ticket`
--

CREATE TABLE IF NOT EXISTS `ticket` (
  `ID_ticketu` int(11) NOT NULL AUTO_INCREMENT,
  `Osoba` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `Budynek` varchar(1) COLLATE utf8_polish_ci NOT NULL,
  `Pietro` int(11) NOT NULL,
  `Nr_sali` int(11) NOT NULL,
  `Rodzaj` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `Opis` longtext COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`ID_ticketu`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=6 ;

--
-- Zrzut danych tabeli `ticket`
--

INSERT INTO `ticket` (`ID_ticketu`, `Osoba`, `Budynek`, `Pietro`, `Nr_sali`, `Rodzaj`, `Opis`) VALUES
(1, '', 'B', 2, 1, 'drgd', 'fdfs'),
(2, '', 'C', 2, 0, 'hu', 'ht'),
(3, 'dwsd', 'D', 2, 0, 'hu', 'ht'),
(4, 'dwsd', 'D', 2, 0, 'hu', 'ht'),
(5, 'twsrw', 'B', 1, 2, 'gdg', 'gdgdf');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
