<?php
require "dbBroker.php";
require "model/user.php";

session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $name = $_POST['username'];
    $password = $_POST['password'];
    $user = new User(1, $name, $password);
    $rs = User::logIn($user, $conn);

    if($rs->num_rows==1){
        echo  `
        <script>
        console.log( "Uspešno ste se prijavili");
        </script>
        `;
        $_SESSION['user_id'] = $korisnik->id;
        header('Location: home.php');
        exit();
    }else{
        echo `
        <script>
        console.log( "Neuspešna prijava!");
        </script>
        `;
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Choice</title>
</head>

<body>
    <div class="login-form">
        <div class="main-div">
            <form method="POST" action="#">
                <h1>Are you ready?</h1>
                <div class="container">
                    <input type="text" placeholder="Username" name="username" class="form-control" required>
                    <br>
                    <input type="password" placeholder="Password" name="password" class="form-control" required>
                    <br>
                    <button class="btn" type="sumbit">Yes I am</button>
                </div>
            </form>
        </div>
</body>

</html>