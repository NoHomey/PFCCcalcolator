<?php 
session_start();
echo "Here";
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
echo $_SESSION['file_name']; 
echo "There";
include("log_panel.php");
?>

