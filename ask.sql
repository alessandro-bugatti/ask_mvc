-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mar 05, 2020 alle 15:58
-- Versione del server: 10.4.11-MariaDB
-- Versione PHP: 7.4.3

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
CREATE DATABASE IF NOT EXISTS `ask` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ask`;

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

--
-- Dump dei dati per la tabella `answer`
--

INSERT INTO `answer` (`id`, `answer_text`, `author`, `publication_date`, `id_question`) VALUES
(1, 'No. Per nulla.', 'GhostyJade', '2020-03-04 13:30:25', 2),
(2, 'Ciao, sono un testo megalungo solo per rompere e far in modo che le cose diventino brutte brutte, in modo che la formattazione della card si rompa malissimo e spero che si decida di tagliare ste stringhe, in modo che noi utenti siamo più invogliati ad aprire e curiosare le risposte degli altri', 'Io.', '2020-03-05 13:29:48', 2),
(3, 'Si, è bellissimo.', 'Utente anonimo', '2020-03-05 12:55:37', 2),
(4, 'Si, anche se è usato da tutti per fare esempi.', 'Mario Rossi', '2020-03-05 13:18:17', 3),
(5, 'Ungaretti direbbe la mattina, io sono d\'accordo con lui', 'Utente anonimo', '2020-03-05 13:18:49', 4),
(6, 'Mattina', 'Pippo', '2020-03-05 13:19:07', 8),
(7, 'Preferisco programmare. Forse perchè posso esprimere la mia creatività creando piccoli giochini, forse perchè vedere tecnicismi e capire come funzionino e cosa ci sia dietro a grandi sistemi, vedendoli nel mio piccolo me li fa apprezzare maggiormente. Penso sia anche (e soprattutto) perchè creare giochi dia la possibilità a chiunque di narrare una storia e far capire il proprio pensiero o la propria esperienza in merito a un qualcosa e, al tempo stesso, penso possa insegnare agli altri cose nuove, giuste o sbagliate esse siano. La programmazione rispetto a una partita di calcio ha un vantaggio: ti costringe a pensare ed essere creativo seppur scrivendo linee e linee di codice in un certo linguaggio...', 'GhostyJade', '2020-03-05 13:22:48', 1),
(8, 'La sera, la mattina non ho tempo', 'Ninja01n', '2020-03-05 13:27:12', 5),
(9, 'A calcio. Perchè mi piace', 'Football_Official_Channel', '2020-03-05 13:28:28', 1),
(10, 'Sera', 'Andre', '2020-03-05 13:30:58', 4),
(11, 'Mattina', 'NonSoCheUsernameMettere', '2020-03-05 13:31:09', 4),
(12, 'Sera, ho più tempo.', 'SadQuotesGoodLife', '2020-03-05 13:31:40', 4),
(13, 'Calcio. Penso per fama e soldi.', 'RonaldD02', '2020-03-05 13:35:06', 1),
(14, 'No. Per nulla.', 'GhostyJade', '2020-03-05 13:35:44', 3),
(15, 'Ciao, sono un testo megalungo solo per rompere e far in modo che le cose diventino brutte brutte, in modo che la formattazione della card si rompa malissimo e spero che si decida di tagliare ste stringhe, in modo che noi utenti siamo più invogliati ad aprire e curiosare le risposte degli altri', 'Io.', '2020-03-05 13:36:05', 3),
(16, 'Mattina', 'Nessuno', '2020-03-05 13:36:27', 8),
(17, 'Sera', 'Idk', '2020-03-05 13:36:54', 18),
(18, 'Io la faccio il pomeriggio', 'Mr6060', '2020-03-05 13:37:14', 10),
(19, 'A Natale non ho tempo, solitamente la mattina.', 'Babbo Natale', '2020-03-05 13:37:49', 5);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT per la tabella `question`
--
ALTER TABLE `question`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
