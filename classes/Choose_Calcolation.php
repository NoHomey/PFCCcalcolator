<?php

require ("Log.php");

class ChooseCalcolation extends Log {
    private $db_connection = null;


    public
    function __construct() {
        session_start();
        $this->getFile_names();
        if (isset($_POST["choose"])) {
            $this->chooseFile();
        }
    }

    private
    function chooseFile() {

        if (empty($_POST['choose_file_name'])) {
            $text = "Please Choose Calclation";
            $this->addError($text);
        }
        elseif($_POST['choose_file_name'] != 'Select Calcolation') {
            $_SESSION['file_name'] = $_POST['choose_file_name'];
            $text = 'Selected Calcolation : '.$_SESSION['file_name'].
            '. You can now Proceed.';
            $this->addMessage($text);
        } else {
            $text = "An unknown error occurred. Please Go Back and try again.";
            $this->addError($text);
        }
    }


    private
    function getFile_names() {
        session_start();
        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if (!$this->db_connection->set_charset("utf8")) {
            $text = $this->db_connection->error;
            $this->addError($text);
        }

        if (!$this->db_connection->connect_errno) {
            $sql = "SELECT file_name FROM files WHERE user_name = '".$_SESSION['user_name'].
            "';";
            $result = $this->db_connection->query($sql);
        }
        if ($result->num_rows > 0) {
            $this->file_names($result);
            $_SESSION['file_found'] = true;
        } else {
            $text = "No Calcolation to choose from please Go Back and create new one first!";
            $this->addError($text);
            $_SESSION['file_found'] = false;
        }
    }

    private
    function file_names($result) {
        $_SESSION['file_names'] = array();
        foreach($result as $value) {
            foreach($value as $real) {
                array_push($_SESSION['file_names'], $real);
            }
        }

    }

    public
    function buildForm() {
        echo '<form id="choose_name" class="panel" method="post">Choose a Calcolation';
        echo '<select class="input" name="choose_file_name" form="choose_name">';
        echo "<option></option>";
        foreach($_SESSION['file_names'] as $value) {
            echo "<option>$value</option>";
        }
        echo "</select>";
        echo '<input id="" class="action" type="submit" name="choose" value="Choose"/>';
        echo "</form>";
    }

}

?>
