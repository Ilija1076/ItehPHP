<?php
require "../dbBroker.php";

if (isset($_POST['ids'])) {
    if (strpos($_SERVER['HTTP_REFERER'], 'earth.php') !== false) {
        require "../model/destination2.php";
        $status = Destination2::deleteByIds($_POST['ids'], $conn);
    } elseif (strpos($_SERVER['HTTP_REFERER'], 'universe.php') !== false) {
        require "../model/destination.php";
        $status = Destination::deleteByIds($_POST['ids'], $conn);
    }
    if ($status) {
        echo 'Successfully deleted a destination';
    } else {
        echo 'Failed to delete a destination';
    }
} else {
    echo 'No destination IDs provided';
}
?>
