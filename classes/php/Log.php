<?php
class Log
{
    public $error = "";
    public $message = "";
    public function __construct()
    {
    }
    public function addLog(&$log, &$value)
    {
        $log = $value;
    }
    public function addError(&$value)
    {
        $this->addLog($this->error, $value);
    }
    public function addMessage(&$value)
    {
        $this->addLog($this->message, $value);
    }
    public function showLog(&$log)
    {
        echo $log;
    }
    public function showLogs()
    {
        $this->showLog($this->error);
        $this->showLog($this->message);
    }
}
?>
