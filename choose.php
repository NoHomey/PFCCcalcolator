
<?php
 session_start();

require_once("config/db.php");
require_once("classes/Choose_Calcolation.php");

$choose_calc = new Choose_Calcolation();

include("views/choose_name.php");

?>

