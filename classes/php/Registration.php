<?php
require("Log.php");
class Registration extends Log
{
    private $db_connection = null;
    public function __construct()
    {
        if (isset($_POST["register"])) {
            $this->registerNewUser();
        }
    }
    private function registerNewUser()
    {
        if (empty($_POST['user_name'])) {
            $text = "Empty Username";
            $this->addError($text);
        } elseif (empty($_POST['user_password_new']) || empty($_POST['user_password_repeat'])) {
            $text = "Empty Password";
            $this->addError($text);
        } elseif ($_POST['user_password_new'] !== $_POST['user_password_repeat']) {
            $text = "Password and password repeat are not the same";
            $this->addError($text);
        } elseif (strlen($_POST['user_password_new']) < 6) {
            $text = "Password has a minimum length of 6 characters";
            $this->addError($text);
        } elseif (strlen($_POST['user_name']) > 64 || strlen($_POST['user_name']) < 2) {
            $text = "Username cannot be shorter than 2 or longer than 64 characters";
            $this->addError($text);
        } elseif (!preg_match('/^[a-z\d]{2,64}$/i', $_POST['user_name'])) {
            $text = "Username does not fit the name scheme: only a-Z and numbers are allowed, 2 to 64 characters";
            $this->addError($text);
        } elseif (empty($_POST['user_email'])) {
            $text = "Email cannot be empty";
            $this->addError($text);
        } elseif (strlen($_POST['user_email']) > 64) {
            $text = "Email cannot be longer than 64 characters";
            $this->addError($text);
        } elseif (!filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)) {
            $text = "Your email address is not in a valid email format";
            $this->addError($text);
        } elseif (!empty($_POST['user_name']) && strlen($_POST['user_name']) <= 64 && strlen($_POST['user_name']) >= 2 && preg_match('/^[a-z\d]{2,64}$/i', $_POST['user_name']) && !empty($_POST['user_email']) && strlen($_POST['user_email']) <= 64 && filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL) && !empty($_POST['user_password_new']) && !empty($_POST['user_password_repeat']) && ($_POST['user_password_new'] === $_POST['user_password_repeat'])) {
            $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            if (!$this->db_connection->set_charset("utf8")) {
                $text = $this->db_connection->error;
                $this->addError($text);
            }
            if (!$this->db_connection->connect_errno) {
                $user_name             = $this->db_connection->real_escape_string(strip_tags($_POST['user_name'], ENT_QUOTES));
                $user_email            = $this->db_connection->real_escape_string(strip_tags($_POST['user_email'], ENT_QUOTES));
                $user_password         = $_POST['user_password_new'];
                $user_password_hash    = password_hash($user_password, PASSWORD_DEFAULT);
                $sql                   = "SELECT * FROM users WHERE user_name = '" . $user_name . "' OR user_email = '" . $user_email . "';";
                $query_check_user_name = $this->db_connection->query($sql);
                if ($query_check_user_name->num_rows == 1) {
                    $text = "Sorry, that username / email address is already taken.";
                    $this->addError($text);
                } else {
                    $sql                   = "INSERT INTO users (user_name, user_password_hash, user_email)
                    VALUES('" . $user_name . "', '" . $user_password_hash . "', '" . $user_email . "');
                    ";
                    $query_new_user_insert = $this->db_connection->query($sql);
                    if ($query_new_user_insert) {
                        $text = "Your account : " . $user_name . "has been created successfully. You can now log in.";
                        $this->addMessage($text);
                    } else {
                        $text = "Sorry, your registration failed. Please go back and try again.";
                        $this->addError($text);
                    }
                }
            } else {
                $text = "Sorry, no database connection.";
                $this->addError($text);
            }
        } else {
            $text = "An unknown error occurred. Please Go Back and try again.";
            $this->addError($text);
        }
    }
    public function __destruct()
    {
        $this->db_connection->close();
    }
}
?>
