<?php

require "../vendor/testTools/testTool.php";
require "./vendor/JSONReader.php";
require "./class/Task.php";

$tasklist = JSONReader("./dataset/TaskList.json");


$testCases = [
    [
        'date' => '11/11/2000',
        'description' => 'deve essere scaduta',
        'expired' => TRUE
    ],
    [
        'date' => '12/30/2022',
        'description' => 'non e scaduta',
        'expired' => FALSE
    ],
    [
        'date' => '24-11-2000',
        'description' => 'data scaduta altro formato',
        'expired' => TRUE
    ],
    [
        'date' => '30-12-2022',
        'description' => 'data non scaduta altro formato',
        'expired' => FALSE
    ],
    [
        'date' => '03/30/2021',
        'description' => 'in scadenza oggi',
        'expired' => FALSE
    ],

];
    foreach ($testCases as $testCase){
        $task = new Task();
        $task -> expirationDate = $testCase['date'];
        //$task -> expirationDate = 
        assertEquals($testCase['expired'],$task->isExpired(),$testCase['description']);
        //var_dump($task->expirationDate);
    }
   


