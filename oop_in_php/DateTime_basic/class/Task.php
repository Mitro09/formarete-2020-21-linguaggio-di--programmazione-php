<?php

class Task {
    
    public $id;
    public $taskName;
    public $status;
    public $expirationDate;

    public function isExpired():bool
    {
        // istanza della classe DateTime
        $today = new DateTime('today');
        //$today = date_format($today,'d/m/Y');
        $task = new DateTime($this->getExpirationDate());
        //$task = date_format($task,'d/m/Y');
        //var_dump($today);
        //var_dump($task);        
        //return $today;
        return $task->getTimestamp() < $today->getTimestamp(); 
    }

    public function getExpirationDate()
    {
        return $this->expirationDate;
    }
}