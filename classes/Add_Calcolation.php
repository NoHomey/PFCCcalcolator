<?php

/**
 * Class registration
 * handles the user registration
 */
class Add_Calcolation
{
    /**
     * @var object $db_connection The database connection
     */
    private $db_connection = null;
    /**
     * @var array $errors Collection of error messages
     */
    public $errors = array();
    /**
     * @var array $messages Collection of success / neutral messages
     */
    public $messages = array();

    /**
     * the function "__construct()" automatically starts whenever an object of this class is created,
     * you know, when you do "$registration = new Registration();"
     */
    public function __construct()
    {
    	session_start();
        if (isset($_POST["save"])) {
            $this->addNewCalcolation();
        }
    }

    /**
     * handles the entire registration process. checks all error possibilities
     * and creates a new user in the database if everything is fine
     */
    private function addNewCalcolation()
    {
        if (empty($_POST['file_name'])) {
            $this->errors[] = "Empty Calcolation Name";
        } elseif (strlen($_POST['file_name']) > 64 || strlen($_POST['user_name']) < 2) {
            $this->errors[] = "Calcolation Name cannot be shorter than 2 or longer than 64 characters";
        } elseif (!preg_match('/^[a-z\d]{2,64}$/i', $_POST['file_name'])) {
            $this->errors[] = "Calcolation Name does not fit the name scheme: only a-Z and numbers are allowed, 2 to 64 characters";
     
        } elseif (!empty($_POST['file_name'])
            && strlen($_POST['file_name']) <= 64
            && strlen($_POST['file_name']) >= 2
            && preg_match('/^[a-z\d]{2,64}$/i', $_POST['file_name'])
            
        ) {
            // create a database connection
            $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            // change character set to utf8 and check it
            if (!$this->db_connection->set_charset("utf8")) {
                $this->errors[] = $this->db_connection->error;
            }

            // if no connection errors (= working database connection)
            if (!$this->db_connection->connect_errno) {

                // escaping, additionally removing everything that could be (html/javascript-) code
                $file_name = $this->db_connection->real_escape_string(strip_tags($_POST['file_name'], ENT_QUOTES));
        
                // check if user or email address already exists
                $sql = "SELECT * FROM calcolations WHERE file_name = '" . $file_name . "';";
                $query_check_file_name = $this->db_connection->query($sql);

                if ($query_check_file_name->num_rows == 1) {
                    $this->errors[] = "Sorry, that Calcolation Name is already taken. Please choose different name";
                } else {
               
                    // write new user's data into database
                    $sql = "INSERT INTO calcolations (file_name, user_name)
                            VALUES('" . $file_name . "', '" . $_SESSION['user_name'] . ");";
                    $query_new_file_insert = $this->db_connection->query($sql);

                    // if user has been added successfully
                    if ($query_new_file_insert) {
                        $this->messages[] = "Your calcolation has been created successfully";
                    } else {
                        $this->errors[] = "Sorry, your calcolation creation failed. Please go back and try again.";
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
