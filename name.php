<?php
 session_start();

include("log_panel.php");
require_once("config/db.php");
require_once("classes/php/AddCalcolation.php");

$add_calcolation = new AddCalcolation();

include("views/new_name.php");

?>



