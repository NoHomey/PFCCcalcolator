<?php
 session_start();

require("config/db.php");
require("classes/Choose_Calcolation.php");

$choose_calcolation = new ChooseCalcolation();

require("views/choose_name.php");

?>

