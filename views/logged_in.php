<!-- if you need user information, just put them into the $_SESSION variable and output them here -->
<!-- because people were asking: "index.php?logout" is just my simplified form of "index.php?logout=true" -->
<?php
session_start();
include("log_panel.php");
?>

<div class="panel">
<form  id="new_name" method="post" action="name.php" name="new_name">
<input class="input" id="option" type="submit" name="new" value="New Calcolation"/>
</form>
<form id="choose_name" method="post" action="choose.php" name="choose_name">
<input class="input" id="option" type="submit" name="old" value="Choose Calcolation"/>
</form>
</div>
	
