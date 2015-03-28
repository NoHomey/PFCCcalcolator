<?php

class Add_Calcolation
{

    private $db_connection = null;
  
    public $errors = array();
    
    public $messages = array();
     
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
            $this->errors[] = "Empty File name";
 
        } elseif (strlen($_POST['file_name']) > 64 || strlen($_POST['file_name']) < 2) {
            $this->errors[] = "File name cannot be shorter than 2 or longer than 64 characters";
        } elseif (!preg_match('/^[a-z\d]{2,64}$/i', $_POST['file_name'])) {
            $this->errors[] = "File name does not fit the name scheme: only a-Z and numbers are allowed, 2 to 64 characters";
        } elseif (!empty($_POST['file_name'])
            && strlen($_POST['file_name']) <= 64
            && strlen($_POST['file_name']) >= 2
            && preg_match('/^[a-z\d]{2,64}$/i', $_POST['file_name'])
        ) {
            $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            if (!$this->db_connection->set_charset("utf8")) {
                $this->errors[] = $this->db_connection->error;
            }

            if (!$this->db_connection->connect_errno) {

                $_SESSION['file_name'] = $this->db_connection->real_escape_string(strip_tags($_POST['file_name'], ENT_QUOTES));
               
                $sql = "SELECT * FROM files WHERE file_name = '" . $_SESSION['file_name'] . "';";
                $query_check_file_name = $this->db_connection->query($sql);

                if ($query_check_file_name->num_rows == 1) {
                    $this->errors[] = "Sorry, that File name is already taken.";
                } else {
                
                    $sql = "INSERT INTO files (file_name, user_name)
                            VALUES('" . $_SESSION['file_name'] . "', '" . $_SESSION['user_name'] . "');";
                    $query_new_file_insert = $this->db_connection->query($sql);

                    if ($query_new_file_insert) {
                        $this->messages[] = "Your File has been created successfully. You can now Proceed.";
                    } else {
                        $this->errors[] = "Sorry, your File creation failed. Please Go Back and try again.";
                    }
                }
            } else {
                $this->errors[] = "Sorry, no database connection.";
            }
        } else {
            $this->errors[] = "An unknown error occurred.";
        }
    }
}
