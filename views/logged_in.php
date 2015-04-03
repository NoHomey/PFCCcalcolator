
<?php
session_start();
require("log_panel.php");
?>

<div class="panel">
<form  id="new_name" method="post" action="name.php" name="new_name">
<input class="input" id="option" type="submit" name="new" value="New Calcolation"/>
</form>
<form id="choose_name" method="post" action="choose.php" name="choose_name">
<input class="input" id="option" type="submit" name="old" value="Choose Calcolation"/>
</form>
</div>
	
