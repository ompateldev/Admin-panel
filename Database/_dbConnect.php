<?php
// connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "admin-panel";
//connection chack

$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn){
    header("location:... /errors/db.php");
    die();
}
