-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Feb 22, 2020 alle 10:19
-- Versione del server: 10.4.11-MariaDB
-- Versione PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ask`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `answer`
--

CREATE TABLE `answer` (
  `id` int(10) UNSIGNED NOT NULL,
  `answer_text` text COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publication_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_question` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `question`
--

CREATE TABLE `question` (
  `id` int(10) UNSIGNED NOT NULL,
  `question_text` text COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publication_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `question`
--

INSERT INTO `question` (`id`, `question_text`, `author`, `publication_date`) VALUES
(1, 'Preferisci programmare o giocare a pallone? Perchè?', 'Il Ninja', '2020-01-31 18:21:09'),
(2, 'Ti piace il tuo nome?', 'Fillis', '0000-00-00 00:00:00'),
(3, 'Ti piace il tuo nome?', 'Fillis', '0000-00-00 00:00:00'),
(4, 'Ti fai la doccia la mattina o la sera?', 'Geppo', '2020-01-31 22:50:16'),
(5, 'Ti fai la doccia la mattina o la sera?', 'Geppo', '2020-01-31 22:50:54'),
(6, 'Ti piace il tuo nome?', 'Fillis', '2020-01-31 22:53:41'),
(7, 'Ti fai la doccia la mattina o la sera?', 'Geppo', '2020-01-31 22:52:16'),
(8, 'Ti fai la doccia la mattina o la sera?', 'Geppo', '2020-01-31 22:52:46'),
(9, 'Ti fai la doccia la mattina o la sera?', 'Geppo', '2020-01-31 22:53:41'),
(10, 'Ti fai la doccia la mattina o la sera?', 'Geppo', '2020-01-31 23:22:58'),
(11, 'Ti fai la doccia la mattina o la sera?', 'Geppo', '2020-02-03 07:30:05'),
(12, 'Ti fai la doccia la mattina o la sera?', 'Geppo', '2020-02-04 10:21:34'),
(13, 'Ti fai la doccia la mattina o la sera?', 'Geppo', '2020-02-05 15:05:50'),
(14, 'Ti fai la doccia la mattina o la sera?', 'Geppo', '2020-02-05 15:07:54'),
(15, 'Ti fai la doccia la mattina o la sera?', 'Geppo', '2020-02-05 15:07:57'),
(16, 'Ti fai la doccia la mattina o la sera?', 'Geppo', '2020-02-07 16:35:20'),
(17, 'Ti fai la doccia la mattina o la sera?', 'Geppo', '2020-02-07 16:35:25'),
(18, 'Ti fai la doccia la mattina o la sera?', 'Geppo', '2020-02-07 16:35:31');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_question` (`id_question`);

--
-- Indici per le tabelle `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `question`
--
ALTER TABLE `question`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`id_question`) REFERENCES `question` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
