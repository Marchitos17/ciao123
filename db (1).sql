-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 12, 2024 alle 11:34
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `negozio`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `categorie`
--

CREATE TABLE `categorie` (
  `id_cat` int(11) NOT NULL,
  `nome_cat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `categorie`
--

INSERT INTO `categorie` (`id_cat`, `nome_cat`) VALUES
(1, 'Fantascienza'),
(2, 'Gialli'),
(3, 'Commedia'),
(4, 'Biografia');

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotti`
--

CREATE TABLE `prodotti` (
  `id_prodotto` int(11) NOT NULL,
  `nome_prodotto` varchar(255) NOT NULL,
  `descr_prodotto` varchar(255) NOT NULL,
  `prezzo` float NOT NULL,
  `cat_prodotto` int(11) NOT NULL,
  `immagine` text NOT NULL,
  `info_dettagliate` varchar(600) NOT NULL,
  `quantita_pdt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `prodotti`
--

INSERT INTO `prodotti` (`id_prodotto`, `nome_prodotto`, `descr_prodotto`, `prezzo`, `cat_prodotto`, `immagine`, `info_dettagliate`, `quantita_pdt`) VALUES
(1, 'Star Trek', 'sadadfdfasdfavccafvafdacedsafcedcaseascesacesaa', 2.99, 1, 'germania.jpg', '“Come leggono gli utenti sul web?” si domandava Jakob Nielsen agli albori di internet. “Non leggono!” si rispondeva da solo e tra i consigli che dava ai novelli web writer – alcuni ancora validi, altri un po’ meno – c’era il pressante invito a essere brevi. Anzi brevissimi: tagliate la metà di un testo tradizionale, raccomandava. Quell’invito alla brevità è stato ripetuto come un mantra in migliaia di siti e centinaia di libri.\r\n\r\nChe quello della brevità o della lunghezza di un testo web fosse un falso problema lo si era capito da subito, come anche che sulla rete c’era posto per tutto, il br', 3),
(2, 'Io sono il leggendario', 'Cosa vuol dire? Che ci stiamo finalmente abituando a leggere sullo schermo anche i testi lunghi e che comunque gli abbiamo trovato un posto nei nuovi ritmi della nostra giornata, fatta di letture sia protese e veloci, sia lente e abbandonate. Vuol dire ch', 10003, 1, '', 'dasfsfafgciao sono marco asdjaoioifsasdafedfgawgfewfsafdsafafyfgjhgfdasddasda', 74),
(5, 'Thor', 'Secondo la mitologia è figlio di Odino, padre degli dèi, e di Jǫrð;[3] appartenendo alla stirpe divina degli Aesir, egli dimora ad Ásgarðr, nel regno di Þrúðvangar e più precisamente nella sala detta Bilskirnir: essa ha più di cinquecentoquaranta stanze e', 2000, 4, 'thor.jpg', 'Le fragorose e terribili tempeste che si mostrano nel cielo, accompagnate dal violento rombo di tuoni e fulmini, sono segno evidente del suo passaggio e della sua potenza divina. La stessa terminologia islandese manifesta l\'influenza del dio e della sua figura nel lessico quotidiano, oltre che nell\'immaginario collettivo scandinavo: infatti fino al XVII secolo, in Svezia, la parola corrispondente a «tuono» (oggi åska, di genere femminile) era åsekia, letteralmente «il procedere del dio (ase) su un veicolo».[16]\r\n\r\nRimasugli del suo culto si trovano anche nel parlato delle terre orientali della', 0),
(38, 'Ciao', 'aksnjdaidAfasdnsad', 3, 2, 'UC-740e06ff-e879-459f-afb0-e2690700cfcc.jpg', 'asdafdasgafhabfgv', 3),
(47, 'dsf', 'dfssf', 0.03, 3, 'Curriculum Vitae Luca Spinazzola.png', 'sdfsf', 4),
(48, 'dsfs', 'frdsfsd', 0, 0, 'CV1.jpg', 'fsdf', 0),
(53, 'said', 'dadsa', 102, 1, 'Foto Curriculum.jpg', 'dasdasdsad', 5);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indici per le tabelle `prodotti`
--
ALTER TABLE `prodotti`
  ADD PRIMARY KEY (`id_prodotto`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `prodotti`
--
ALTER TABLE `prodotti`
  MODIFY `id_prodotto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
