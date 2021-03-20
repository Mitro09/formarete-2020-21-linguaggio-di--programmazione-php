<?php

class Task {
    
    public $id;
    public $taskName;
    public $status;
    public $expirationDate;

    public function isExpired():bool
    {
        // istanza della classe DateTime
        $today = new DateTime();
        $task = new DateTime($this->expirationDate); 
        
        return $task > $today; 
    }

    public function getExpirationDate()
    {
        return $this->expirationDate;
    }
}