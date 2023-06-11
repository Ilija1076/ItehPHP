<?php
$host = "localhost";
$db = "universe";
$user = "root";
$pass = "";

$conn = new mysqli($host,$user,$pass,$db);

if ($conn->connect_errno){
    exit("Failed connection:error> ".$conn->connect_error.", code>".$conn->connect_errno);
}
?>