<?php
 session_start();

include("log_panel.php");
require_once("config/db.php");
require_once("classes/Add_Calcolation.php");

$add_calc = new Add_Calcolation();

include("views/new_name.php");

?>



