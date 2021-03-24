<?php
require "./vendor/JSONReader.php";
require "./class/Task.php";

$taskList = JSONReader('./dataset/TaskList.json');


// imperativo
$taskListObj = [];

foreach ($taskList as $taskArray) {

        $taskObj = new Task();
        $taskObj->id = $taskArray['id'];
        $taskObj->taskName = $taskArray['taskName'];
        $taskObj->status = $taskArray['status'];
        $taskObj->expirationDate = $taskArray['expirationDate'];
        $taskListObj[] = $taskObj;
}

// dichiarativo --> programmazione funzionale
// somma(4,5) --> 9 funzione pura
// ->isExpired() // il metodo che abbiamo implementato non darà sempre lo stesso risultato

$taskListObj  = array_map(function($taskArray){

    $taskObj = new Task();
    $taskObj->id = $taskArray['id'];
    $taskObj->taskName = $taskArray['taskName'];
    $taskObj->status = $taskArray['status'];
    $taskObj->expirationDate = $taskArray['expirationDate'];
    return $taskObj;
                
}, $taskList);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasklist a oggetti</title>
</head>
<body>

<table>
    <tr>
        <th>nome attività</th>
        <th>scaduta ?</th>
    </tr>
    <?php foreach ($taskListObj as $task) { ?>
        <!-- HTML  -->
            <tr>
                <td><?php echo $task->taskName ?></td>
                <td><?= $task->isExpired() ? "si" : "no" ?></td>
            </tr> 
    <?php } ?>
   
</table>


</body>
</html>