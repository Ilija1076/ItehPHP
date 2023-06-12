<?php
require "dbBroker.php";
require "model/destination2.php";
session_start();

$result = Destination2::getAll($conn);
if (!$result) {
    die("Error executing query: " . $conn->error);
}
if ($result->num_rows == 0) {
    die("No destinations");
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
    <div class="jumbotron text-center">
        <div class="container">
            <h1>Destinations on the Earth</h1>
        </div>
    </div>

<div class="row row-desired-destination">
    <div class="col-md-4">
        <h4>See desired destination</h4>
        <input type="text" id="myInput" class="input" placeholder="Lookup a destination" onkeyup="lookup()">
    </div>
</div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2 center-table" style="text-align: center; width:66.6%;float:left">
            <div id="tblcols">
                <table id="table" class="table sortable table-bordered table-hover" style="background-color: aquamarine;">
                    <thead>
                        <tr>
                            <th scope="col">Select</th>
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
                            $rowId = "row-" . $red["id"]; 
                        ?>
                            <tr id="<?php echo $rowId ?>">
                                <td><input type="checkbox" name="select" value="<?php echo $red["id"] ?>"></td>
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
    </div>

    <div class="row">
        <button id="btn-add" type="button" class="btn" data-toggle="modal" data-target="#addModal"> Add Destination</button>
        <button id="btn-delete" type="button" class="btn2">Delete a destination</button>
        <button id="btn-edit" type="button" class="btn2">Edit Destination</button>
        <button id="btn-finish" type="button" class="btn2" style="display: none;">Finish</button>
    </div>
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
                                <button type="submit" id="btnAdd" class="btn btn-primary">Add Destination</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/js.js"></script>
</body>
</html>
