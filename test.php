<?php
session_start();

	
	$_SESSION['calc'] = $GLOBALS['HTTP_RAW_POST_DATA'];
	
	echo $_SESSION['calc'];
?>
