<?php

function _searchText($searchText){
//$searchText = variabile locale 
//con 'use' diciamo alla funzioni interna di prendersi $searchText e usarla come variabile locale sua
//programmazione funzionale - dichiarativo
    return function ($taskItem) use ($searchText){
        //echo "sto cercando $searchText";
        $result = strpos($taskItem['taskName'], $searchText) !== false;
        return $result;
        //print_r($searchText);
        //print_r($taskItem);
    };
}



//array filter (la callback passa 1 valore e deve restituire un booleano)
// imperativo
/**
 * @var string $searchText testo da cercare nella chiave taskName
 * @var array $taskList elenco delle task dove cercare
 * @return array $result un nuovo array con le task che rispettano il criterio
 */
function searchText(string $searchText, array $taskList){
    $result=[];
    foreach ($taskList as $taskItem){
        if (strpos($taskItem['taskName'],$searchText) !== false){
            $result[] = $taskItem;
        }
    }
}


/**
 * @var string $status stringa corrispondente allo status da cercare
 * (progress|done|todo)
 * @return callback la funzione che verra utilizzata da array filter
 */
function searchStatus(string $status){
    return function($taskItem) use ($status){
        $result = strpos($taskItem['status'],$status) !== false;
        return $result;
    };
}