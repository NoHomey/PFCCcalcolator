<?php
session_start();

$add_calcolation->showLogs();

?>

<form id="new_name" class="panel" method="post" action="name.php">Enter name of the new Calcolation: (only letters and numbers, minimum 2 characters, upto 64)
	<input id="" class="input" name="file_name" type="text" pattern="[a-zA-Z0-9]{2,64}" required/>
	<input id="" class="action" type="submit" name="create_new" value="Save"/>

</form>

<a class="action" href="main.php">Proceed</a>
 Or 
<a class="go_back" href="index.php?">Go Back</a>
