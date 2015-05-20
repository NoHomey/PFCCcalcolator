<?php
require("Log.php");
class Calcolation extends Log
{
    private $db_connection = null;
    public $file = "";
    public $opened = null;
    public $status = null;
    public $size = null;
    public function __construct()
    {
        session_start();
        $_SESSION['clean'] = false;
        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if (!$this->db_connection->set_charset("utf8")) {
               $this->addError($this->db_connection->error);
        }
        $this->file = "calcolations/" . $_SESSION['file_name'] . ".json";
        $this->size = filesize($this->file);
        if ((file_exists($this->file)) && ($this->size > 0)) {
            $this->status = 1;
            $this->opened = fopen($this->file, "r+");
        } else {
            $this->status = 0;
            $this->opened = fopen($this->file, "w+");
            $text         = "This Calcolation is Empty!";
            $this->addMessage($text);
        }
        if ($this->opened === false) {
            $text = "Error creating/opening this File!";
            $this->addError($text);
        }
        if (isset($_POST["file_delete"])) {
            $this->removeFile();
        }
    }
    public function loadFile()
    {
        $res = [$this->size,  $this->opened];
        return $res;
    }
    public function saveFile($content)
    {
    	$this->opened = fopen($this->file, "w+");
        if (fwrite($this->opened, $content) !== false) {
            $text = "Successfuly Saved!";
            $this->addMessage($text);
        }
    }
    private function removeFile()
    {
        if (fclose($this->opened)) {
            if (unlink($this->file)) {
                if (!$this->db_connection->connect_errno) {
                    $sql = "DELETE FROM files WHERE file_name = '" . $_SESSION['file_name'] . "';";
                    if ($this->db_connection->query($sql)) {
                        $text = "Calcolation : " . $_SESSION['file_name'] . " Removed Successfully.\n Please Go Back.";
                        $this->addMessage($text);
                    } else {
                        $text = "Error Deleting Calcolation : " . $conn->error;
                        $this->addError($text);
                    }
                }
            } else {
                $text = "Error Deleting Calcolation : " . $this->file;
                $this->addError($text);
            }
        } else {
            $text = "Error Deleting Calcolation : " . $this->file;
            $this->addError($text);
        }
        $_SESSION['clean'] = true;
    }
    public function __destruct()
    {
    	fclose($this->opened);
        $this->db_connection->close();
    }
}
?>
