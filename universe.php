<?php
require "dbBroker.php";
require "model/destination.php";
session_start();

$result = Destination::getAll($conn);
if (!$result) {
 echo "Error executing query: " . $conn->error;

    die();
}
if ($result->num_rows == 0) {
    echo "No destinations";
    die();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/final.css">
    <title>Destinacije na Zemlji</title>
</head>

<body>
    <div class="jumbotron text-center" style="background-color: rgba(255, 182, 193, 0);">
        <div class="container">
            <h1 style="color: darkred">Destinations in the Universe</h1>
        </div>
    </div>

    <div class="col-md-8" style="text-align: center; width:66.6%;float:left">
        <div id="pregled">
            <table id="tabela" class="table sortable table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Planet</th>
                        <th scope="col">Distance</th>
                        <th scope="col">Time</th>
                        <th scope="col">Departure</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($red = $result->fetch_array()) {
                    ?>
                        <tr id="tr-<?php echo $red["id"] ?>">
                            <td><?php echo $red["id"] ?></td>
                            <td><?php echo $red["planet"] ?></td>
                            <td><?php echo $red["distance"] ?></td>
                            <td><?php echo $red["time"] ?></td>
                            <td><?php echo $red["departure"] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>