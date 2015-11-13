<?php

/*
 * barabash97@gmail.com
 */

$dir_name = str_replace("\\", "/", dirname(__FILE__));
define('ROOT', $dir_name);
require_once ROOT . '/lib/bootstrap.class.php'; //Inizializzazione script
require_once ROOT . '/lib/config.class.php'; // Config
require_once ROOT . '/lib/database.class.php'; // Collegamento con la database
require_once ROOT . '/lib/core.class.php'; // La classe principale "Core"
require_once ROOT . '/lib/check.class.php'; //Verificare i dati "Check"
$app = new Bootstrap();

/* Check comment 17:21 12 nov 2015*/

?>
