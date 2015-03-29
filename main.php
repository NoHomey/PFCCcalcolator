<?php
session_start();

require_once("config/db.php");
require_once("classes/Calcolation.php");

$calc = new Calcolation();

$calc->log->showLogs();

include("calcolator.php");

?>



