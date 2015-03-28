<?php 

session_start();
echo $choose_calc->errors[0];
include("log_panel.php");


if($_SESSION['file_found']) {

	$choose_calc->print_it();	
}

?>


<a class="go_back" href="index.php">Go Back</a>
