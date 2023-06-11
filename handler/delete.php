<?php
require "../dbBroker.php";
require  "../model/destination.php";
require  "../model/destination2.php";

if(isset($_POST['id'])){
    
    $status = Destination::deleteById($_POST['id'], $conn);
    if($status){
        echo 'Successfully deleted a destination';
    }else{
        echo 'Failed to delete a destination';
    }
}