<?php
 session_start();
?>

<link rel="stylesheet" type="text/css" href="css/login.css">
<form class="panel">
<span><?php echo $_SESSION['user_name']; ?></span>
<a class="go_back" href="index.php?logout">Logout</a>
</form>

<?php

require_once("config/db.php");

require_once("classes/Add_Calcolation.php");

$calcadder = new Add_Calcolation();

include("views/new_name.php");

?>



