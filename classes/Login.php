<?php

require ("Log.php");

class Login extends Log {

    private $db_connection = null;



    public
    function __construct() {

        session_start();


        if (isset($_GET["logout"])) {
            $this->doLogout();
        }

        elseif(isset($_POST["login"])) {
            $this->dologinWithPostData();
        }
    }


    private
    function dologinWithPostData() {

        if (empty($_POST['user_name'])) {
            $text = "Username field was empty.";
            $this->addError($text);
        }
        elseif(empty($_POST['user_password'])) {
            $text = "Password field was empty.";
            $this->addError($text);
        }
        elseif(!empty($_POST['user_name']) && !empty($_POST['user_password'])) {


            $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);


            if (!$this->db_connection->set_charset("utf8")) {
                $text = $this->db_connection->error;
                $this->addError($text);
            }


            if (!$this->db_connection->connect_errno) {


                $user_name = $this->db_connection->real_escape_string($_POST['user_name']);


                $sql = "SELECT user_name, user_email, user_password_hash
                FROM users
                WHERE user_name = '" . $user_name . "'
                OR user_email = '" . $user_name . "';
                ";
                $result_of_login_check = $this->db_connection->query($sql);


                if ($result_of_login_check->num_rows == 1) {


                    $result_row = $result_of_login_check->fetch_object();


                    if (password_verify($_POST['user_password'], $result_row->user_password_hash)) {


                        $_SESSION['user_name'] = $result_row->user_name;
                        $_SESSION['user_email'] = $result_row->user_email;
                        $_SESSION['user_login_status'] = 1;

                    } else {
                        $text = "Wrong password. Try again.";
                        $this->addError($text);
                    }
                } else {
                    $text = "This user does not exist.";
                    $this->addError($text);
                }
            } else {
                $text = "Database connection problem.";
                $this->addError($text);
            }
        }
    }


    public
    function doLogout() {

        $_SESSION = array();
        session_destroy();

        $text = "You have been logged out.";
        $this->addMessage($text);

    }


    public
    function isUserLoggedIn() {
        if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1) {
            return true;
        }

        return false;
    }
}

?>
