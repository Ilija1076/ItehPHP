<?php
require "../dbBroker.php";
require  "../model/destination.php";
require  "../model/destination2.php";

if(isset($_POST['id'])){
    if (strpos($_SERVER['HTTP_REFERER'], 'earth.php') !== false) {
    require "../model/destination2.php";
    $status = Destination1::deleteById($_POST['id'], $conn);}
    if($status){
        echo 'Successfully deleted a destination';
    }else{
        echo 'Failed to delete a destination';
    }
}

if(isset($_POST['id'])){
    if (strpos($_SERVER['HTTP_REFERER'], 'universe.php') !== false) {
    require "../model/destination.php";
    $status = Destination1::deleteById($_POST['id'], $conn);}
    if($status){
        echo 'Successfully deleted a destination';
    }else{
        echo 'Failed to delete a destination';
    }
}