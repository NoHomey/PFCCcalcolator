<?php

require("Log.php");

class Add_Calcolation extends Log
{

    private $db_connection = null;
     
    public function __construct()
    {
    	session_start();
        if (isset($_POST["save"])) {
            $this->addNewFile();
        }
    }

    private function addNewFile()
    {
    	session_start();
     	 if (empty($_POST['file_name'])) {
            $text = "Empty File name";
            $this->addError($text);
        } elseif (strlen($_POST['file_name']) > 64 || strlen($_POST['file_name']) < 2) {
            $text = "File name cannot be shorter than 2 or longer than 64 characters";
            $this->addError($text);
        } elseif (!preg_match('/^[a-z\d]{2,64}$/i', $_POST['file_name'])) {
            $text = "File name does not fit the name scheme: only a-Z and numbers are allowed, 2 to 64 characters";
            $this->addError($text);
        } elseif (!empty($_POST['file_name'])
            && strlen($_POST['file_name']) <= 64
            && strlen($_POST['file_name']) >= 2
            && preg_match('/^[a-z\d]{2,64}$/i', $_POST['file_name'])
        ) {
            $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            if (!$this->db_connection->set_charset("utf8")) {
                $text = $this->db_connection->error;
                $this->addError($text);
            }

            if (!$this->db_connection->connect_errno) {

                $_SESSION['file_name'] = $this->db_connection->real_escape_string(strip_tags($_POST['file_name'], ENT_QUOTES));
               
                $sql = "SELECT * FROM files WHERE file_name = '" . $_SESSION['file_name'] . "';";
                $query_check_file_name = $this->db_connection->query($sql);

                if ($query_check_file_name->num_rows == 1) {
                    $text = "Sorry, that File name is already taken.";
                    $this->addError($text);
                } else {
                
                    $sql = "INSERT INTO files (file_name, user_name)
                            VALUES('" . $_SESSION['file_name'] . "', '" . $_SESSION['user_name'] . "');";
                    $query_new_file_insert = $this->db_connection->query($sql);

                    if ($query_new_file_insert) {
                        $text = "Calcolation " . $_SESSION['file_name'] . " has been created successfully. You can now Proceed.";
                        $this->addMessage($text);
                    } else {
                        $text = "Sorry, your File creation failed. Please Go Back and try again.";
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
}

?>
