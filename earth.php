<?php
require "dbBroker.php";
require "model/destination2.php";
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
    <title>Destinations on the Earth</title>
</head>

<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <div class="jumbotron text-center" style="background-color: rgba(255, 182, 193, 0);">
        <div class="container">
            <h1 style="color: darkred">Destinations on the Earth</h1>
        </div>
    </div>   
    <div class="col-md-8" style="text-align: center; width:66.6%;float:left">
        <div id="pregled">
            <table id="tabela" class="table sortable table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Place</th>
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
                            <td><?php echo $red["place"] ?></td>
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
    <div class="row" style="background-color: rgba(225, 225, 208, 0.5);">
    <div class="col-md-4">
        <button id="btn" class="btn btn-info btn-block" 
        style="background-color: teal !important; border: 1px solid white; "> See desired  destination</button>
    </div>
    <div class="col-md-4">
        <button id="btn-dodaj" type="button" class="btn btn-success btn-block"
        style="background-color: teal; border: 1px solid white;" data-toggle="modal" data-target="#addModal"> Add Destination</button>
<div class="modal fade" id="addModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Destination</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="#" method="post" id="addForm">
                    <div class="form-group">
                        <label for="place">Place:</label>
                        <input type="text" class="form-control" id="place" name="place" placeholder="Enter place">
                    </div>
                    <div class="form-group">
                        <label for="distance">Distance:</label>
                        <input type="text" class="form-control" id="distance" name="distance" placeholder="Enter distance">
                    </div>
                    <div class="form-group">
                        <label for="time">Time:</label>
                        <input type="text" class="form-control" id="time" name="time" placeholder="Enter time">
                    </div>
                    <div class="form-group">
                        <label for="departure">Departure:</label>
                        <input type="text" class="form-control" id="departure" name="departure" placeholder="Enter departure">
                    </div>
                    <button type="submit" id="btnAdd"  class="btn btn-primary">Add Destination</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/js.js"></script>
</body>
</html>
   