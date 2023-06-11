<?php
require "../dbBroker.php";
require "../model/destination.php";
require "../model/destination2.php";

if(isset($_POST['id'])) {
    $array = Destination::getById($_POST['id'], $conn);
    
    echo json_encode($array);
}
