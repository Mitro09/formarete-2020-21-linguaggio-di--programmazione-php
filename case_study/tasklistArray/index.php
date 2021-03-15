<?php

//print_r($_GET);

// Carico le dipendenze
require "./lib/searchFunctions.php";
require "./lib/JSONReader.php";

// Model(parte che gestisce i dati)

$taskList = JSONReader('./dataset/TaskList.json');

// Controller()

if(isset($_GET['searchText']) && trim($_GET['searchText']) !== ''){
    $searchText = trim(filter_var($_GET['searchText'], FILTER_SANITIZE_STRING)); 
    $taskList = array_filter($taskList,_searchText($searchText));
}
else{
    $searchText = '';
}

if (isset($_GET['status'])){
    $status = ($_GET['status']);
    $taskList = array_filter($taskList,searchStatus($status));
    if ($status==('all')){
        $taskList = JSONReader('./dataset/TaskList.json');
    }
}
else{
    $status='all';
}
//var_dump($searchText);

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
    <form action="index.php">
        <input type="text" name="searchText" value="<?= $searchText ?>">
        <button type="submit">CERCA</button>
        <div id="status">
            <input type="radio" name="status" value="progress" id="progress" <?php if ($status == "progress") echo "checked";?>>
            <label for="progress">Progress</label>
            <input type="radio" name ="status" value="done" id="done"<?php if ($status == "done") echo "checked";?> >
            <label for="done">Done</label>
            <input type="radio" name="status" value="todo" id="todo" <?php if ($status == "todo") echo "checked";?>>
            <label for="todo">To Do</label>
            <input type="radio" name="status" value="all" id="all" <?php if ($status == "all") echo "checked";?>>
            <label for="all">All Tasks</label>
        </div>
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

</body>

</html>


