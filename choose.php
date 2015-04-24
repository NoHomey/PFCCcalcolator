<?php
session_start();
require("config/db.php");
require("classes/php/ChooseCalcolation.php");
$choose_calcolation = new ChooseCalcolation();
require("views/choose_name.php");
?>

