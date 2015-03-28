<?php
session_start();

if (isset($add_calc)) {
    if ($add_calc->errors) {
        foreach ($add_calc->errors as $error) {
            echo $error;
        }
    }
    if ($add_calc->messages) {
        foreach ($add_calc->messages as $message) {
            echo $message;
        }
    }
}
?>

<form id="new_name" class="panel" method="post" action="name.php">Enter name of the new Calcolation
	<input id="" class="input" name="file_name" type="text" pattern="[a-zA-Z0-9]{2,64}" required/>
	<input id="" class="action" type="submit" name="save" value="Save"/>

</form>

<a class="action" href="calcolator.php">Proceed</a>
 Or 
<a class="go_back" href="index.php?">Go Back</a>
