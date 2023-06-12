<?php
require "../dbBroker.php";
require "../model/destination.php";
require "../model/destination2.php";

if(isset($_POST['id'])) { 
    if (strpos($_SERVER['HTTP_REFERER'], 'earth.php') !== false) {
    require "../model/destination2.php";
    $array = Destination1::getById($_POST['id'], $conn);}
    
    echo json_encode($array);
}

if(isset($_POST['id'])) {
    if (strpos($_SERVER['HTTP_REFERER'], 'universe.php') !== false) {
        require "../model/destination.php";
    $array = Destination2::getById($_POST['id'], $conn);}
    
    echo json_encode($array);
}

