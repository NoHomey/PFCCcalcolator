<?php

class Calcolation
{
	private $db_connection = null;

    	public $errors = array();
    
    	public $massages = array();

	public function __construct()
	{
		session_start();
		$this->openFile();
		if ($_SESSION['load_file']) {
			$this->loadFile();
		}
		if (isset($_POST["file_save"])) {
			$this->save_state();
		}
		if (isset($_POST["file_remove"])) {
			$this->remove_it();
		}
	}


	private function openFile() 
	{
	
	
	
	}
	
	private function loadFile() 
	{
	
	
	
	}

	private function save_state() 
	{
	
	
	
	}
	
	
	private function remove_it() 
	{
		$file = $_SESSION['file_name'] . ".json";
		if (!unlink($file)) {
			$this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

			if (!$this->db_connection->set_charset("utf8")) {
				$this->errors[] = $this->db_connection->error;
			}
			    
			if (!$this->db_connection->connect_errno) {    
				$sql = "DELETE FROM files WHERE file_name = '" . $_SESSION['file_name'] . "';";
				if ($this->db_connection->query($sql)) {
				
				} else {
				
				
				}
			}
		} else {
		
		
		}
	
		
	
	
	}



}
