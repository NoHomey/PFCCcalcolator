<?php 

session_start();

$choose_calcolation->showLogs();

require("log_panel.php");

if($_SESSION['file_found']) {

	$choose_calcolation->buildForm();	
}

?>

<a class="action" href="main.php">Proceed</a>
 Or 
<a class="go_back" href="index.php?">Go Back</a>
