<?php

function AcronimGenerator($name){
    $upperName = strtoupper($name);
    $explodedName = explode(" ",$upperName);
    $firstLetter = array_map("GetFirstLetter",$explodedName);
    //$addedPoint = array_map("AddPoint",$firstLetter);
    return implode(".",$firstLetter).".";
    //return $point.".";
    
    

}

function GetFirstLetter($name){
    $getFirstLetter = substr($name,0,1);
    return $getFirstLetter;
}

function AddPoint($name){
    $pointName = $name.".";
    return $pointName;
}