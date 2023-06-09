<?php
if (isset($_POST['btn1'])) {
    header('Location: earth.php');
    exit();
} elseif (isset($_POST['btn2'])) {
    header('Location: universe.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <title>Home</title>
</head>
<body>
    <div class="container">
        <div class="left-side">
            <img src="img/earth.jpg" alt="Earth Image">
            <div class="text-wrapper">
                <form class="form form1" action="#" method="POST">
                    <h1><span class="title">Explore Earth</span></h1>
                    <button class="btn1" name="btn1">Choose</button>
                </form>
            </div>
        </div>
        <div class="right-side">
            <img src="img/universe.jpg" alt="Universe Image">
            <div class="text-wrapper">
                <form class="form form2" action="#" method="POST">
                    <h1><span class="title">Explore Universe</span></h1>
                    <button class="btn2" name="btn2">Choose Universe</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
