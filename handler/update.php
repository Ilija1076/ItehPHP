<?php
require "../dbBroker.php";
if (isset($_POST['id']) && isset($_POST['place']) && isset($_POST['distance'])
    && isset($_POST['time']) && isset($_POST['departure']) && strpos($_SERVER['HTTP_REFERER'], 'earth.php') !== false) {
        require "../model/destination2.php";
        $status = Destination2::update($_POST['id'], $_POST['place'], $_POST['distance'], $_POST['time'], $_POST['departure'], $conn);
    if ($status) {
        echo 'Successfully updated a destination';
    } else {
        echo 'Failed to update a destination';
    }
}

elseif (isset($_POST['id']) && isset($_POST['planet']) && isset($_POST['distance'])
    && isset($_POST['time']) && isset($_POST['departure']) && strpos($_SERVER['HTTP_REFERER'], 'universe.php') !== false) {
        require "../model/destination.php";
        $status = Destination::update($_POST['id'], $_POST['planet'], $_POST['distance'], $_POST['time'], $_POST['departure'], $conn);
    if ($status) {
        echo 'Successfully updated a destination';
    } else {
        echo 'Failed to update a destination';
    }
}
?>
