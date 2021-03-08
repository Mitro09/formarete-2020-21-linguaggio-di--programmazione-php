<?php

function searchText($searchText){

    return function ($taskItem) use ($searchText){
        //echo "sto cercando $searchText";
        $result = strpos($taskItem['taskName'], $searchText);
        return $result;
        //print_r($searchText);
        //print_r($taskItem);
    };
}

?>