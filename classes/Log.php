<?php
class Log {

	public $errors = array();
    
    	public $messages = array();
    	
	public function __construct() {
	
	}

	public function addLog(&$log, &$value) {
		array_push($log, $value);
	}
	
	public function addError(&$value) {
		$this->addLog($this->errors, $value);
	}
	
	public function addMessage(&$value) {
		$this->addLog($this->messages, $value);
	}
	
	public function showLog(&$logs) {
		foreach ($logs as $log) {
			echo $log;
		}
	}
	
	public function showLogs() {
		$this->showLog($this->errors);
		$this->showLog($this->messages);
	}
}
?>
