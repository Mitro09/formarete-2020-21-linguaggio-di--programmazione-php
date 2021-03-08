<?php
// Carico le dipendenze
require "./lib/JSONReader.php";
// Model(parte che gestisce i dati)
$taskList = JSONReader('./dataset/TaskList.json');

// Controller()



?>


<!-- VIEW/ intercetta azioni utente -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/style.css">
    <title>Task List</title>
</head>
<body>
    <form action="">
        <input type="text" name="searchText">
        <button type="submit">CERCA</button>
    </form>
    <ul>

        <?php
        foreach ($taskList as $key => $task){
            $status = $task['status'];
            $taskName = $task['taskName'];
        ?>
        
        <li class="tasklist-item tasklist-item-<?= $status ?>">
            <?= $taskName ?>
            <b> <?= $status ?> </b>
        </li>
        <?php } ?>
        <!--
        <li class="tasklist-item tasklist-item-done">uova <b>done</b></li>
        <li class="tasklist-item tasklist-item-todo">farina <b>todo</b></li>
        -->
    </ul>
</html>


