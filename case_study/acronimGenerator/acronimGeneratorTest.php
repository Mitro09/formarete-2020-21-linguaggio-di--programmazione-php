<?php

//require 'case_study/sanitizeName/acronimGenerator.php';
require './acronimGenerator.php';
$dataset = array(
    ['gioco molto difficile','G.M.D.',__LINE__],
    ['General Motors','G.M.',__LINE__],
    ['Federal Bureau Investigation','F.B.I.',__LINE__]
);

foreach ($dataset as $row) {
    $text = $row[0];
    $atteso = $row[1];
    $linea = $row[2];
    

    $result = AcronimGenerator($text);

    if($result == $atteso){
        echo "$result:  è tutto ok\n";
    }
    else {
        echo "$result  test fallito in linea: $linea\n";
    }
}