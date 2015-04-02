<?php

require("Log.php");

class Calcolation
{
	private $db_connection = null;

	public $file = "";
	
	public $opened = null;
	
	public $log = null;
	
	public $status = null;
	
	public function __construct()
	{
		session_start();
		$this->log = new Log();
		$this->file = "calcolations/" . $_SESSION['file_name'] . ".json";
		if (file_exists($this->file)) {
			$this->status = 1;
			$this->opened = fopen($this->file, "r+");
			$text = "File exists, Please wait while procesing it!";
			$this->log->addMessage($text);
		} else {
			$this->status = 0;
			$this->opened = fopen($this->file, "w+");
			$text = "File empty";
			$this->log->addMessage($text);
		}
		if ($this->opened != false) {
			 $this->log->addMessage($text);
		} else {
			$text = "File Can't be Created";
			$this->log->addError($text);
		}
		/*if ($_SESSION['load_file']) {
			$this->loadFile();
		}*/
		
		if (isset($_POST["file_delete"])) {
			$this->removeFile();
		}
	}


	
	public function loadFile() 
	{
		$res = [$this->file, $this->opened];
		return $res;
	}
	
	public function saveFile($content) {
		fwrite($this->opened, $content);
		$text = "Successfuly Saved";
		$this->log->addMessage($text);
	}
		
	private function removeFile() 
	{
		if(fclose($this->opened)) {
			if (unlink($this->file)) {
				$this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

				if (!$this->db_connection->set_charset("utf8")) {
					$this->log->addError($this->db_connection->error);
				}
				    
				if (!$this->db_connection->connect_errno) {    
					$sql = "DELETE FROM files WHERE file_name = '" . $_SESSION['file_name'] . "';";
					if ($this->db_connection->query($sql)) {
						$text = "Calcolation : " . $_SESSION['file_name'] . " Removed Successfully.";
						$this->log->addMessage($text);
					} else {
						$text = "Error Deleting Calcolation : " . $conn->error;
						$this->log->addError($text);
					}
				}
			} else {
				$text = "Error Deleting Calcolation : " . $this->file;
				$this->log->addError($text);
			}
		} else {
			$text = "Error Deleting Calcolation : " . $this->file;
			$this->log->addError($text);
		}
	}
}
