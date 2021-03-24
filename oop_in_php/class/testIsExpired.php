<?php

require "../vendor/testTools/testTool.php";
require "./vendor/JSONReader.php";
require "./class/Task.php";

$tasklist = JSONReader("./dataset/TaskList.json");


$testCases = [
    [
        'date' => '12/24/2000',
        'description' => 'deve essere scaduta',
        'expired' => TRUE
    ],
    [
        'date' => '12/24/2022',
        'description' => 'non e scaduta',
        'expired' => FALSE
    ],
    /*[
        'date' => '03/24/2021',
        'description' => 'in scadenza',
        'expired' => FALSE
    ],*/

];
    foreach ($testCases as $testCase){
        $task = new Task();
        $task -> $expirationDate = $testCase['date'];
        assertEquals($testCase['expired'],$task->isExpired());
    }


