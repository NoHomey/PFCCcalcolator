<?php

$login->showLogs();

?>
<link rel="stylesheet" type="text/css" href="css/login.css">
<form class="panel" method="post" action="index.php" name="loginform">

    <label for="login_input_username">Username or Email address:</label>
    <input id="login_input_username" class="input" type="text" name="user_name" required />

    <label for="login_input_password">Password:</label>
    <input id="login_input_password" class="input" type="password" name="user_password" autocomplete="off" required />

    <input type="submit" class="action" name="login" value="Log in" />

</form>

<a class="go_back" href="register.php">Register new account</a>
