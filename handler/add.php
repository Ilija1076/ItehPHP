<?php
require "../dbBroker.php";

require "../dbBroker.php";

if (
    isset($_POST['place']) && isset($_POST['distance'])
    && isset($_POST['time']) && isset($_POST['departure'])
) {
    $place = $_POST['place'];
    $distance = $_POST['distance'];
    $time = $_POST['time'];
    $departure = $_POST['departure'];

    if (strpos($_SERVER['HTTP_REFERER'], 'earth.php') !== false) {
        require "../model/destination2.php";
        $status = Destination::add($place, $distance, $time, $departure, $conn);
    } else {
        // Handle the case when the referring page is unknown or doesn't match any expected pages
        $status = 'Unknown referring page';
    }

    if ($status) {
        echo 'Successfully added destination';
    } else {
        echo $status;
        echo 'Failed to add destination';
    }
}
elseif (
    isset($_POST['planet']) && isset($_POST['distance'])
    && isset($_POST['time']) && isset($_POST['departure'])
) {
    $place = $_POST['planet'];
    $distance = $_POST['distance'];
    $time = $_POST['time'];
    $departure = $_POST['departure'];

    if (strpos($_SERVER['HTTP_REFERER'], 'universe.php') !== false) {
        require "../model/destination.php";
        $status = Destination2::add($planet, $distance, $time, $departure, $conn);
    } else {
        $status = 'Unknown referring page';
    }

    if ($status) {
        echo 'Successfully added destination';
    } else {
        echo $status;
        echo 'Failed to add destination';
    }
}

?>