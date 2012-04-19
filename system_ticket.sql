
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `uzytkownik` (
  `ID` int(4) NOT NULL AUTO_INCREMENT,
  `imie` varchar(15) COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` varchar(25) COLLATE utf8_polish_ci NOT NULL,
  `login` varchar(15) COLLATE utf8_polish_ci NOT NULL,
  `haslo` varchar(15) COLLATE utf8_polish_ci NOT NULL,
  `mail` varchar(25) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=3 ;

