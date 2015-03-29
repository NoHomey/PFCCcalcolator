<?php 

session_start();
echo $choose_calc->errors[0];
echo $choose_calc->massages[0];
include("log_panel.php");

if($_SESSION['file_found']) {

	$choose_calc->form_it();	
}

?>

<a class="action" href="main.php">Proceed</a>
 Or 
<a class="go_back" href="index.php?">Go Back</a>
