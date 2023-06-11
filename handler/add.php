<?php
require "../dbBroker.php";
require "../model/destination.php";
require "../model/destination2.php";

if (
    isset($_POST['place']) && isset($_POST['distance'])
    && isset($_POST['time']) && isset($_POST['departure'])
) {
    $status = Destination::add($_POST['place'], $_POST['distance'], $_POST['time'], $_POST['departure'], $conn);
    if ($status) {
        echo 'Successfully added destination';
    } else {
        echo $status;
        echo 'Failed to add destination';
    }
}