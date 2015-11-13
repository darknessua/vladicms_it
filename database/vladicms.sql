-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2015 alle 16:15
-- Versione del server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vladicms`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `xyz_articles`
--

CREATE TABLE IF NOT EXISTS `xyz_articles` (
`id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT 'Senza titolo',
  `category` varchar(32) NOT NULL DEFAULT '1',
  `users` varchar(255) NOT NULL,
  `date` int(32) NOT NULL,
  `short_story` mediumtext NOT NULL,
  `full_story` longtext NOT NULL,
  `meta_key` varchar(255) NOT NULL DEFAULT '',
  `meta_desc` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `xyz_articles`
--

INSERT INTO `xyz_articles` (`id`, `title`, `category`, `users`, `date`, `short_story`, `full_story`, `meta_key`, `meta_desc`) VALUES
(1, 'Titolo 1', '1', 'admin', 1424457750, 'shortfsae shortfsae shortfsae shortfsae shortfsae \r\nshortfsae shortfsae shortfsae shortfsae shortfsae \r\nshortfsae shortfsae shortfsae shortfsae \r\nshortfsae shortfsae shortfsae ', 'shortfsae shortfsae shortfsae ,shortfsae shortfsae shortfsae shortfsae shortfsae ,shortfsae shortfsae shortfsae shortfsae shortfsae shortfsae ,shortfsae shortfsae shortfsae shortfsae ,shortfsae shortfsae shortfsae .', 'key,words', 'DEscrizione titolo 1'),
(2, 'PHP 5.7 non ci sarà, largo a PHP 7', '1', 'admin', 1424457679, 'Recentemente la comunità degli sviluppatori di PHP ha dovuto votare una proposta nella quale si prevedeva che PHP 5.7 avrebbe dovuto contenere alcune novità (si pensi per esempio alla possibile integrazione con PHPNG basato sul refactoring del Zend Engine) da consolidare successivamente con l’implementazione di PHP 7. Tale progetto sarebbe stato però bocciato, per cui è possibile che la versione 5.7 non sia destinata a vedere la luce.', 'Dato che in passato gli sviluppatori del noto linguaggio Server Side sono stati protagonisti di improvvisi ripensamenti, non è detto che tale votazione non possa essere ridiscussa in futuro dando vita ad una nuova consultazione in merito; ma stando alle notizie attualmente disponibili, la community non avrebbe alcuna intenzione di investire risorse nel mantenimento di un’ulteriore versione intermedia, quale sarebbe PHP 5.7, durante la realizzazione della release numero 7.\r\nIn un quadro del genere i core developers potrebbero continuare a mantenere PHP 5.4, 5.5 e 5.6 in particolare per quanto riguarda i necessari aggiornamenti di sicurezza; PHP 5.7 risulterebbe essere invece un passaggio non necessario, dettato unicamente dalla necessità di proporre una Minor Release in attesa del rilascio della prossima Major Version che non dovrebbe raggiungere lo stato di stabile prima di ottobre 2015.\r\nIn realtà quest’ultima potrebbe presentare alcune problematiche dal punto di vista della retrocompatibilità (si pensi alla possibilità di rimuovere la keyword function per i metodi di classe), motivo per il quale PHP 5.7 avrebbe potuto rivelarsi utile per annunciare come deprecate alcune features destinate alla rimozione nel ramo successivo, evidentemente però avrebbero prevalso le ragioni legate alla produttività.\r\nQuanto accaduto a PHP 5.7 potrebbe essere il risultato di un nuovo corso iniziato con la dismissione del progetto PHP 6, ramo di sviluppo che (ormai quasi sicuramente) non verrà mai implementato per ragioni legate all’impossibilità di dotare PHP di un supporto nativo accettabile ad Unicode senza ripercussioni sul livello generale delle prestazioni.', '', ''),
(3, 'Senza titolo', '2', 'admin', 1424457679, 'daaaaaaaaaaaaaaaawwwwwwwwwwwwwwwwwwwwwww', 'fweqgre4gherghfweqgre4gherghfweqgre4gherghfweqgre4gherghfweqgre4gherghfweqgre4gherghfweqgre4gherghfweqgre4gherghfweqgre4gherghfweqgre4gherghdwfqgfgegwegewg\r\nhtreh rkyu yu', '', ''),
(4, 'La programmazione a oggetti e PHP', '3', 'admin', 1424457679, 'Prima della nascita della versione 5, PHP, era un linguaggio sostanzialmente procedurale, ovvero fortemente basato sulle funzioni, interne (e quindi "native") o definite dall’utente. Nonostante fosse dotato di un singolare modello ad oggetti, questo non poteva assolutamente essere considerato completo e non permetteva di mettere in pratica i veri concetti della OOP (Object Oriented Programming), cioè della Programmazione Orientata agli Oggetti. Di conseguenza, il vecchio modello non consentiva di usufruire di tutti i vantaggi di questo paradigma.', 'OOP e PHP\r\nPrima della nascita della versione 5, PHP, era un linguaggio sostanzialmente procedurale, ovvero fortemente basato sulle funzioni, interne (e quindi "native") o definite dall’utente. Nonostante fosse dotato di un singolare modello ad oggetti, questo non poteva assolutamente essere considerato completo e non permetteva di mettere in pratica i veri concetti della OOP (Object Oriented Programming), cioè della Programmazione Orientata agli Oggetti. Di conseguenza, il vecchio modello non consentiva di usufruire di tutti i vantaggi di questo paradigma.\r\n\r\nNella versione 4 di PHP furono introdotte le prime funzionalità OOP, ma con il rilascio della versione 5 le cose sono decisamente cambiate. Ora PHP dispone di un solido modello OOP, completo di tutti i più importanti strumenti che questo è in grado di offrire, anche se con alcuni limiti di carattere strutturale.\r\n\r\nPrima di introdurre le nozioni basilari per muovere i primi passi verso lo stile della OOP , è bene precisare alcuni vantaggi nonché svantaggi della programmazione ad oggetti di PHP. I vantaggi di PHP rispetto ad altri linguaggi che supportano il paradigma della OOP, risultando spesso più strutturati e organizzati come ad esempio Java, sono:\r\n\r\nla semplicità;\r\nla facilità di apprendimento;\r\nla velocità nello sviluppo;\r\ni bassi costi di implementazione.\r\nOltre ad essere facile da imparare, PHP, è un linguaggio di sviluppo Open Source supportato da una vasta comunità di sviluppatori.\r\n\r\nEntrambi i linguaggi precedentemente citati, PHP e Java, presentano soluzioni scalabili e flessibili ma, per contro, PHP è un linguaggio di tipo Web oriented e presenta dei limiti sia nell’architettura che nella sintassi. Questo è il motivo per il quale, quando si tratta di PHP, sarebbe meglio non parlare di "Programmazione Orientata agli Oggetti" ma di "programmazione in stile OOP".\r\n\r\nCosa è la programmazione ad oggetti?\r\nLa Programmazione Orientata agli Oggetti, è un paradigma di programmazione che deriva da quello classico procedurale. Nella OOP, il flusso del programma non è gestito tramite chiamate a procedura sequenziale (come nell’approccio procedurale), bensì il flusso del programma è gestito tramite gli oggetti che interagiscono tra di loro.\r\n\r\nQuesto stile di programmazione, utilizza le classi per organizzare le strutture dei dati e le procedure che operano su di esse. Questo permette di creare un “oggetto” composto da due entità:\r\n\r\nmetodi (le procedure);\r\nattributi (i dati).\r\nIl paradigma OOP, risulta molto utile nella strutturazione di programmi di grandi dimensioni, permettendo la separazione tra i dati e la logica applicativa e utilizzando il principio di progettazione DRY (Do not Repeat Yourself), criterio secondo il quale andrebbe evitata ogni forma di ripetizione e ridondanza logica nell’implementazione del sorgente. Alcune peculiarità della OOP, come l’architettura, la maggiore chiarezza e linearità del codice ad oggetti rispetto a quello procedurale, permettono di ottenere un sorgente modulare e facile da modificare. Inoltre la OOP consente di gestire meglio gli errori e semplifica il debugging.', 'oop, programmazione ad oggetti', 'guida 1. programmazione ad oggetti'),
(5, 'Introduzione alla OOP', '3', 'admin', 1424457679, 'La programmazione orientata agli oggetti (Object Oriented Programming, da cui l’acronimo OOP) è uno stile fondamentale di programmazione (o paradigma) che si basa principalmente sul raggruppamento all’interno di un’unica entità (la classe) delle strutture dati e delle procedure che operano su di esse.\r\n\r\nIstanziando la classe, che rappresenta fondamentalmente una struttura astratta, è possibile creare “oggetti” concreti (le cosiddette istanze) dotati di proprietà (dati/variabili) e metodi (procedure/funzioni) che operano sui dati dell’oggetto stesso.\r\n\r\nPer quanto complessa possa essere questa definizione, potete rassicurarvi sapendo che quest’ultima racchiude la maggior parte dei concetti fondamentali della OOP.', 'La programmazione orientata agli oggetti (Object Oriented Programming, da cui l’acronimo OOP) è uno stile fondamentale di programmazione (o paradigma) che si basa principalmente sul raggruppamento all’interno di un’unica entità (la classe) delle strutture dati e delle procedure che operano su di esse.\r\n\r\nIstanziando la classe, che rappresenta fondamentalmente una struttura astratta, è possibile creare “oggetti” concreti (le cosiddette istanze) dotati di proprietà (dati/variabili) e metodi (procedure/funzioni) che operano sui dati dell’oggetto stesso.\r\n\r\nPer quanto complessa possa essere questa definizione, potete rassicurarvi sapendo che quest’ultima racchiude la maggior parte dei concetti fondamentali della OOP.\r\n\r\nOOP e PHP\r\nPrima della nascita della versione 5, PHP era un linguaggio sostanzialmente procedurale, ovvero fortemente basato sulle funzioni, interne o user-defined. Nonostante fosse dotato di un singolare modello ad oggetti, questo non poteva assolutamente essere considerato completo e non permetteva di mettere in pratica i veri concetti della programmazione OOP. Di conseguenza, il vecchio modello non consentiva di usufruire di tutti i vantaggi di questo paradigma.\r\n\r\nCon il rilascio della versione 5, le cose sono decisamente cambiate. Ora PHP dispone di un solido modello OOP completo di tutti i più importanti strumenti che questo offre. Dunque, anche se PHP continua a non essere un linguaggio nativamente orientato agli oggetti (come ad esempio Java o altri), permette ora di realizzare solide applicazioni OOP.\r\n\r\nI vantaggi del modello ad oggetti\r\nNel mio precedente articolo denominato Codice procedurale vs OOP sono ben elencati tutti i vantaggi derivanti dall’utilizzo e dalla padronanza del modello ad oggetti (compresi, ovviamente, gli eventuali svantaggi) con tanto di dettagliate descrizioni e confronti con il modello procedurale. Riporto qui solo i principali benefici che lo sviluppatore PHP trae adottando una struttura OOP:\r\n\r\npresenza di regole precise da seguire\r\nmigliore qualità dello sviluppo di applicazioni realizzate in team\r\nmodularità dell’applicazione\r\nmanutenibilità del progetto\r\nestensibilità dell’applicazione\r\npossibilità di usufruire dei design patterns\r\npossibilità di usufruire dei principali web services\r\npresenza di nuovi costrutti', 'introduzione, oop', 'guida 2. introduzione ad oop'),
(6, 'OOP vs Codice procedurale', '3', 'admin', 1424457679, 'Prima di addentrarci nello studio vero e proprio dei concetti e delle teorie della programmazione ad oggetti, è bene avere le idee chiare sulle differenze che questo modello di programmazione pone rispetto al più semplice modello procedurale.\r\n\r\nQuesto perché molti sviluppatori PHP che giungono a leggere questa guida, hanno molto probabilmente a disposizione un solido bagaglio di conoscenze sul codice procedurale, che è ancora il metodo preferito per la realizzazione di script ed applicazioni in PHP, soprattutto da chi ha amato e ama la versione 4. Ovviamente vi ricordo che, per una completa analisi delle differenze teoriche, dei vantaggi e degli svantaggi tra modello ad oggetti e modello procedurale, l’articolo Codice procedurale vs OOP è un ottimo punto di riferimento.', 'Prima di addentrarci nello studio vero e proprio dei concetti e delle teorie della programmazione ad oggetti, è bene avere le idee chiare sulle differenze che questo modello di programmazione pone rispetto al più semplice modello procedurale.\r\n\r\nQuesto perché molti sviluppatori PHP che giungono a leggere questa guida, hanno molto probabilmente a disposizione un solido bagaglio di conoscenze sul codice procedurale, che è ancora il metodo preferito per la realizzazione di script ed applicazioni in PHP, soprattutto da chi ha amato e ama la versione 4. Ovviamente vi ricordo che, per una completa analisi delle differenze teoriche, dei vantaggi e degli svantaggi tra modello ad oggetti e modello procedurale, l’articolo Codice procedurale vs OOP è un ottimo punto di riferimento.\r\n\r\nWrapper per stampare\r\nPartiamo subito con un esempio pratico che ci permetterà di cogliere le rispettive differenze concettuali dei due modelli: un wrapper per stampare un paragrafo HTML contente del testo.\r\n\r\nCodice procedurale:\r\n\r\nfunction ph($txt) {\r\n        echo "<p>" . $txt . "</p>";\r\n}\r\n \r\n// stampa il seguente HTML: "<p>This is a paraghrap</p>"\r\nph("This is a paraghrap");\r\nCodice OOP:\r\n\r\nclass HTML {\r\n \r\n        public function ph($txt) {\r\n                echo "<p>" . $txt . "</p>";\r\n        }\r\n \r\n}\r\n \r\n$html = new HTML();\r\n \r\n// stampa il seguente HTML: "<p>This is a paraghrap</p>"\r\n$html->ph("This is a paraghrap");\r\nLa prima, lampante differenza che emerge dal confronto tra questi due snippet è la diversa quantità di codice necessaria per giungere allo stesso fine: il modello OOP ne richiede una quantità maggiore. La seconda differenza è che, mentre nel primo caso si può usare direttamente la funzione e quindi stampare il codice, nel secondo si deve prima istanziare un oggetto della classe HTML (il cui nome, come quello delle semplici variabili, è scelto a nostro piacimento) e successivamente richiamare il metodo denominato ph.\r\n\r\nMa vediamo cosa accade se successivamente decidiamo di aggiornare le funzionalità volendo creare un ulteriore wrapper al paragrafo risultante, ovvero un elemento div, ed ottenere il seguente markup: <div><p>This is a paraghrap</p></div>:\r\n\r\nCodice procedurale:\r\n\r\nfunction div($txt) {\r\n        echo "<div>";\r\n        ph($txt);\r\n        echo "</div>";\r\n}\r\n \r\n// stampa il seguente HTML: "<div><p>This is a paraghrap</p></div>"\r\ndiv("This is a paraghrap");\r\nCodice OOP:\r\n\r\nclass HTML {\r\n \r\n        public function ph($txt) {\r\n                echo "<p>" . $txt . "</p>";\r\n        }\r\n         \r\n        public function div($txt) {\r\n                echo "<div>";\r\n                $this->ph($txt);\r\n                echo "</div>";\r\n        }\r\n \r\n}\r\n \r\n$html = new HTML();\r\n \r\n// stampa il seguente HTML: "<div><p>This is a paraghrap</p></div>"\r\n$html->div("This is a paraghrap");\r\nCome è possibile notare, nel caso del modello procedurale si deve procedere alla creazione di una nuova funzione che richiama la precedente, mentre nel modello OOP tutta l’implementazione è centralizzata in un unico oggetto: la classe HTML. Le istanze di questa classe (nel nostro caso l’oggetto $html) possono usufruire di tutte le funzioni pubbliche dichiarate nella stessa.\r\n\r\nConclusione\r\nDalla realizzazione di un compito assai banale come la visualizzazione di testo, abbiamo potuto prendere visione delle grandi differenze concettuali e pratiche che esistono tra i due modelli. Essere consci del fatto che tramite la OOP è possibile progettare codice concettualmente più elevato è basilare per affrontare le prossime lezioni.\r\n\r\nNella prossima lezione passeremo ad analizzare (teoricamente e praticamente) quelle che sono le componenti fondamentali della programmazione ad oggetti: le classi.', 'codice, oop, procedurale', 'GUIDA 3. OOP vs Codice procedurale');

-- --------------------------------------------------------

--
-- Struttura della tabella `xyz_banners`
--

CREATE TABLE IF NOT EXISTS `xyz_banners` (
`id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `xyz_banners`
--

INSERT INTO `xyz_banners` (`id`, `image`, `link`) VALUES
(1, 'http://vladicms.it/image/ads.jpg', 'http://google.it/'),
(2, 'http://vladicms.it/image/ads.jpg', 'http://facebook.it/');

-- --------------------------------------------------------

--
-- Struttura della tabella `xyz_categories`
--

CREATE TABLE IF NOT EXISTS `xyz_categories` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `xyz_categories`
--

INSERT INTO `xyz_categories` (`id`, `name`, `description`) VALUES
(1, 'News', 'Notizie Sito '),
(2, 'Tutorial PHP', 'tutorial PHP, php'),
(3, 'Programmazione ad oggetti', 'OOP, programmazione ad oggetti, Object, Programming'),
(4, 'Video', 'Video');

-- --------------------------------------------------------

--
-- Struttura della tabella `xyz_comments`
--

CREATE TABLE IF NOT EXISTS `xyz_comments` (
`id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `date` int(32) NOT NULL,
  `text_comment` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `xyz_comments`
--

INSERT INTO `xyz_comments` (`id`, `article_id`, `user`, `date`, `text_comment`) VALUES
(1, 2, 'fan97tastic', 20150218, 'bellodwqdqwddqwbellodwqdqwddqwbellodwqdqwddqwbellodwqdqwddqwbellodwqdqwddqwbellodwqdqwddqwbellodwqdqwddqwbellodwqdqwddqwbellodwqdqwddqw'),
(2, 5, 'admin', 20150219, 'hahahhah 19022015'),
(3, 5, 'adwaqwd', 20150219, 'wdqdfqfwq'),
(4, 5, 'faewqfq', 20150220, 'fwq3'),
(5, 5, 'admin', 20150220, 'dwqdqdqdqd4'),
(6, 5, 'admin', 0, 'dqwadwqdqdqwdqdq'),
(7, 5, 'admin', 4235255, 'adqwfgggw'),
(8, 6, 'admin123456', 1424456714, 'ciaociaociao'),
(9, 6, 'admin123456', 1424456721, 'ciaociaociao'),
(10, 6, 'admin123456', 1424456760, 'ciaociaociao'),
(11, 6, 'admin123456', 1424456842, 'lol'),
(12, 2, 'admin123456', 1424457951, 'carino'),
(13, 1, 'admin123456', 1424458411, 'commento1\r\n'),
(14, 1, 'admin123456', 1424458415, 'commento1\r\n'),
(15, 1, 'admin123456', 1425215619, 'commento2\r\n'),
(16, 1, 'admin123456', 1425215624, 'commento3'),
(17, 1, 'admin123456', 1425215631, ''),
(18, 1, 'admin123456', 1425215798, 'fdwqdqwqdw'),
(19, 1, 'admin123456', 1425215802, 'dddddd');

-- --------------------------------------------------------

--
-- Struttura della tabella `xyz_users`
--

CREATE TABLE IF NOT EXISTS `xyz_users` (
`id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `group` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `xyz_users`
--

INSERT INTO `xyz_users` (`id`, `login`, `password`, `email`, `group`) VALUES
(1, 'caweqcqwfqgfqgfgq', '982c17915b77f5559cc57f68dc4d079c', 'gewgwegweg@gwegwe.com', 1),
(2, 'dwqqwdwdqd', '8787a5a8fafd34ce05f050ffe0e7050e', 'dqdwqdq@mail.ru', 1),
(3, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'fasttracker.altervista.org@gmail.com', 1),
(4, 'barabash97', 'e10adc3949ba59abbe56e057f20f883e', 'barabash97@gmail.com', 1),
(5, 'bara', 'df10ef8509dc176d733d59549e7dbfaf', 'barabash97@gmail.com', 1),
(6, 'colaos', 'a89cca447d8303eeb6974ee0d7ecd472', 'colaos@mail.ru', 1),
(7, 'colaos123', '', 'colaos221@mail.ru', 1),
(8, 'admin123456', 'a66abb5684c45962d887564f08346e8d', 'admin123456@admin.it', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `xyz_articles`
--
ALTER TABLE `xyz_articles`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xyz_banners`
--
ALTER TABLE `xyz_banners`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xyz_categories`
--
ALTER TABLE `xyz_categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xyz_comments`
--
ALTER TABLE `xyz_comments`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xyz_users`
--
ALTER TABLE `xyz_users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `xyz_articles`
--
ALTER TABLE `xyz_articles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `xyz_banners`
--
ALTER TABLE `xyz_banners`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `xyz_categories`
--
ALTER TABLE `xyz_categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `xyz_comments`
--
ALTER TABLE `xyz_comments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `xyz_users`
--
ALTER TABLE `xyz_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
