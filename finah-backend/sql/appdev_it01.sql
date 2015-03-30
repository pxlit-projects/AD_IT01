-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 31 mrt 2015 om 00:36
-- Serverversie: 5.6.21
-- PHP-versie: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `appdev_it01`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `action`
--

CREATE TABLE IF NOT EXISTS `action` (
`actionid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `action`
--

INSERT INTO `action` (`actionid`, `name`) VALUES
(1, 'login');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `antwoorden`
--

CREATE TABLE IF NOT EXISTS `antwoorden` (
`antwoordid` int(11) NOT NULL,
  `vraagid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `antwoord` int(11) NOT NULL,
  `werk` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `apikey`
--

CREATE TABLE IF NOT EXISTS `apikey` (
`apikeyid` int(11) NOT NULL,
  `key` varchar(50) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `apikey`
--

INSERT INTO `apikey` (`apikeyid`, `key`) VALUES
(1, 'SBPgKUiusC5N6H6gorl64D68h357k713');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `surveyusers`
--

CREATE TABLE IF NOT EXISTS `surveyusers` (
`surveyUserid` int(11) NOT NULL,
  `authkey` varchar(50) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `surveyusers`
--

INSERT INTO `surveyusers` (`surveyUserid`, `authkey`) VALUES
(1, 'abc');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `thema`
--

CREATE TABLE IF NOT EXISTS `thema` (
`themaid` int(11) NOT NULL,
  `themanaam` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `thema`
--

INSERT INTO `thema` (`themaid`, `themanaam`) VALUES
(1, 'Leren en toepassen van kennis'),
(2, 'Algemene taken en activiteiten'),
(3, 'Communicatie'),
(4, 'Mobiliteit'),
(5, 'Zelfverzorging'),
(6, 'Huishouden'),
(7, 'Omgaan met andere mensen'),
(8, 'Belangrijke levensgebieden (opleiding, werk of financiële zaken)'),
(9, 'Maatschappelijk, sociaal en burgerlijk leven'),
(10, 'Emoties en gedrag');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `rank` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `firstName`, `lastName`, `email`, `rank`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Kevin', 'Coenegrachts', 'kevin.coenegrachts@student.pxl.be', 10);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `vragen`
--

CREATE TABLE IF NOT EXISTS `vragen` (
`vraagid` int(11) NOT NULL,
  `vraag` text NOT NULL,
  `themaid` int(11) NOT NULL,
  `logo` varchar(200) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `vragen`
--

INSERT INTO `vragen` (`vraagid`, `vraag`, `themaid`, `logo`) VALUES
(1, 'Iets nieuws leren (zoals het leren omgaan met bijvoorbeeld een nieuwe GSM, vaatwasmachine of afstandsbediening', 1, 'images/illustraties/d155.jpg'),
(2, 'Zich kunnen concentreren zonder te worden afgeleid (zoals het volgen van een gesprek in een drukke omgeving, of het volgen van een Tv-programma)', 1, 'images/illustraties/d160.jpg'),
(3, 'Denken (zoals fantaseren, een mening vormen, met ideeën spelen, of nadenken)', 1, 'images/illustraties/d163.jpg'),
(4, 'Lezen (zoals boeken, instructies, kranten, in tekst of in braille)', 1, 'images/illustraties/d166.jpg'),
(5, 'Rekenen (zoals gepast betalen bij een winkel)', 1, 'images/illustraties/d172.jpg'),
(6, 'Oplossen van problemen (zoals een afspraak bij de dokter verzetten, of weten wat je moet doen als er iets stuk gaat in huis)', 1, 'images/illustraties/d175.jpg'),
(7, 'Keuzes maken (zoals kiezen wat je wil eten, welk TV-programma je wil zien)', 1, 'images/illustraties/d177.jpg'),
(8, 'Uitvoeren van dagelijkse routinehandelingen (zoals zich wassen, ontbijten)', 2, 'images/illustraties/d230.jpg'),
(9, 'Ondernemen van een eenvoudige taak op eigen initiatief (zoals een boodschappenlijstje opmaken, de vuilzak buitenzetten, de tafel dekken)', 2, 'images/illustraties/d210.jpg'),
(10, 'Ondernemen van complexe taken op eigen initiatief (zoals autorijden, boodschappen doen, uitgebreid koken)', 2, 'images/illustraties/d220.jpg'),
(11, 'Omgaan met stressvolle situaties(zoals het autorijden in druk verkeer of het verzorgen van meerdere kinderen)', 2, 'images/illustraties/d240.jpg'),
(12, 'Begrijpen wat iemand vertelt of vraagt', 3, 'images/illustraties/d310.jpg'),
(13, 'Begrijpen van non-verbale (niet gesproken) boodschappen (zoals pictogrammen, afbeeldingen, symbolen, lichaamstaal en gezichtsuitdrukkingen)', 3, 'images/illustraties/d315.jpg'),
(14, 'Begrijpen van geschreven boodschappen (zoals het lezen van de krant)', 3, 'images/illustraties/d325.jpg'),
(15, 'Spreken', 3, 'images/illustraties/d330.jpg'),
(16, 'Zich uiten dmv lichaamstaal, handgebaren en gezichtsuitdrukkingen)', 3, 'images/illustraties/d335.jpg'),
(17, 'Schrijven van berichten (bijv. een boodschappenlijstje maken, een e-mail schrijven)', 3, 'images/illustraties/d345.jpg'),
(18, 'Het voeren van een gesprek', 3, 'images/illustraties/d350.jpg'),
(19, 'Gebruiken van communicatieapparatuur en -technieken (zoals gebruik van telefoon, GSM, computer, hoorapparaat, etc)', 3, 'images/illustraties/d360.jpg'),
(20, 'Zich kunnen bewegen en verplaatsen, met of zonder gebruik van hulpmiddelen zoals rolstoel, wandelstok of rollator (bijv. uit bed komen, wandelen, opstaan uit stoel)', 4, 'images/illustraties/d450.jpg'),
(21, 'Gebruiken van hand en arm (grote bewegingen, zoals voorwerpen optillen en meenemen)', 4, 'images/illustraties/d445.jpg'),
(22, 'Nauwkeurig gebruiken van handen (kleine bewegingen zoals grijpen en loslaten, schrijven, gebruik van sleutels of GSM, iets snijden met een mes)', 4, 'images/illustraties/d440.jpg'),
(23, 'Gebruiken van openbaar vervoer (zoals de bus of de trein nemen)', 4, 'images/illustraties/d470.jpg'),
(24, 'Besturen van vervoermiddel (zoals de auto of de fiets)', 4, 'images/illustraties/d475.jpg'),
(25, 'Zich wassen', 5, 'images/illustraties/d510.jpg'),
(26, 'Verzorgen van lichaamsdelen (bijv. tanden poetsen, nagels knippen, make-up gebruiken)', 5, 'images/illustraties/d520.jpg'),
(27, 'Zelfstandig naar het toilet kunnen gaan', 5, 'images/illustraties/d530.jpg'),
(28, 'Zich aankleden', 5, 'images/illustraties/d540.jpg'),
(29, 'Eten', 5, 'images/illustraties/d550.jpg'),
(30, 'Drinken', 5, 'images/illustraties/d560.jpg'),
(31, 'Letten op de gezondheid (gevarieerd eten, voldoende lichaamsbeweging, gezondheidsrisico’s vermijden)', 5, 'images/illustraties/d570.jpg'),
(32, 'Gaan winkelen', 6, 'images/illustraties/d620.jpg'),
(33, 'Bereiden van maaltijden', 6, 'images/illustraties/d630.jpg'),
(34, 'Huishouden doen (onderhoud van huis en tuin, schoonmaken, kleren wassen)', 6, 'images/illustraties/d640.jpg'),
(35, 'Op sociaal gepaste wijze contact maken met bekende en onbekende mensen (respectvol, rekening houden met de situatie, etc.)', 7, 'images/illustraties/d710.jpg'),
(36, 'Intieme relaties en seksualiteit', 7, 'images/illustraties/d770.jpg'),
(37, 'Omgaan met familieleden', 7, 'images/illustraties/d760.jpg'),
(38, 'Omgaan met vrienden en kennissen', 7, 'images/illustraties/d750.jpg'),
(39, 'Formele relaties (zoals omgang met collega’s, werkgever, dokters en verzorgenden)', 7, 'images/illustraties/d730.jpg'),
(40, 'Het volgen van een vorming, training en/of opleiding', 8, 'images/illustraties/d810.jpg'),
(41, 'Werken of andere zinvolle dagbesteding (zoals vrijwilligerswerk, het huishouden)', 8, 'images/illustraties/d850.jpg'),
(42, 'Financiële mogelijkheden voor jezelf en je gezin', 8, 'images/illustraties/d870.jpg'),
(43, 'Deelnemen aan het maatschappelijk leven (zoals gaan stemmen, een huwelijk of begrafenis bijwonen, lid zijn van een vereniging', 9, 'images/illustraties/d910.jpg'),
(44, 'Ontspanning en vrije tijd (activiteiten gericht op amusement)', 9, 'images/illustraties/d920.jpg'),
(45, 'Religie en spiritualiteit', 9, 'images/illustraties/d930.jpg'),
(46, 'Somber, neerslachtig, depressief', 10, ''),
(47, 'Angstgevoelens', 10, ''),
(48, 'Onrealistische verwachtingen', 10, ''),
(49, 'Sneller emotioneel (bijv. huilen)', 10, ''),
(50, 'Sneller geïrriteerd en prikkelbaar', 10, ''),
(51, 'Onverschilligheid', 10, ''),
(52, 'Ontremming en problemen met controle van gedrag (zoals het maken van ongepaste opmerkingen, overmatig eten, ...)', 10, ''),
(53, 'Sneller en vaker moe', 10, '');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `action`
--
ALTER TABLE `action`
 ADD PRIMARY KEY (`actionid`);

--
-- Indexen voor tabel `antwoorden`
--
ALTER TABLE `antwoorden`
 ADD PRIMARY KEY (`antwoordid`);

--
-- Indexen voor tabel `apikey`
--
ALTER TABLE `apikey`
 ADD PRIMARY KEY (`apikeyid`);

--
-- Indexen voor tabel `surveyusers`
--
ALTER TABLE `surveyusers`
 ADD PRIMARY KEY (`surveyUserid`);

--
-- Indexen voor tabel `thema`
--
ALTER TABLE `thema`
 ADD PRIMARY KEY (`themaid`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`userid`);

--
-- Indexen voor tabel `vragen`
--
ALTER TABLE `vragen`
 ADD PRIMARY KEY (`vraagid`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `action`
--
ALTER TABLE `action`
MODIFY `actionid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `antwoorden`
--
ALTER TABLE `antwoorden`
MODIFY `antwoordid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `apikey`
--
ALTER TABLE `apikey`
MODIFY `apikeyid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `surveyusers`
--
ALTER TABLE `surveyusers`
MODIFY `surveyUserid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `thema`
--
ALTER TABLE `thema`
MODIFY `themaid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `vragen`
--
ALTER TABLE `vragen`
MODIFY `vraagid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
