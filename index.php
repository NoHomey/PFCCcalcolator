<?php
$db_servername = "pfcccalcolator.com";
$db_username = "user";
$db_password = "ivo123";

// Create connection
$conn = new mysqli($db_servername, $db_username, $db_password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    echo "Connected unsuccessfully";
} 
echo "Connected successfully";
?>

<!DOCTYPE HTML> 
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 

<?php
// define variables and set to empty values
$usernameErr = $passwordErr = "";
$username = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["username"])) {
     $usernameErr = "UserName is required";
   } else {
     $username = test_input($_POST["username"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
       $usernameErr = "Only letters and numbers allowed"; 
     }
   }
   
   if (empty($_POST["password"])) {
     $passwordErr = "Password is required";
   } else {
     $password = test_input($_POST["password"]);
     if (!preg_match("/^[a-zA-Z0-9]*$/",$password)) {
       $passwordErr = "Only letters and numbers allowed"; 
     }
   }
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

function add_user_to_db($user, $pass,$userErr, $passErr) {

	if($passErr == $userErr) {
		echo $user;
		echo "<br>";
		echo $pass;
		echo "<br>";
	}

}
?>

<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
   UserName: <input type="text" name="username" value="<?php echo $username;?>">
   <span class="error">* <?php echo $usernameErr;?></span>
   <br><br>
   Password: <input type="text" name="password" value="<?php echo $password;?>">
   <span class="error">* <?php echo $passwordErr;?></span>
   <br><br>
   
   <input type="submit" name="submit" value="Submit"> 
</form>

<?php
echo "<h2>Your Input:</h2>";
add_user_to_db($username, $password, $usernameErr, $passwordErr);
?>

</body>
</html>