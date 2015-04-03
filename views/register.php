<?php

$registration->showLogs();

?>
<link rel="stylesheet" type="text/css" href="css/login.css">
<!-- register form -->
<form class="panel" method="post" action="register.php" name="registerform" class="Out">

    <!-- the user name input field uses a HTML5 pattern check -->
    <label for="login_input_username">Username (only letters and numbers, minimum 2 characters, upto 64)</label>
    <input id="login_input_username" class="input" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" required />

    <!-- the email input field uses a HTML5 email type check -->
    <label for="login_input_email">User's email</label>
    <input id="login_input_email" class="input" type="email" name="user_email" required />

    <label for="login_input_password_new">Password (min. 6 characters)</label>
    <input id="login_input_password_new" class="input" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" />

    <label for="login_input_password_repeat">Repeat password</label>
    <input id="login_input_password_repeat" class="input" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" />
	
    <input type="submit" class="action" name="register" value="Register"/>

</form>
<a class="go_back" href="index.php">Back to Login Page</a>
