<?php

session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include 'Database/_dbConnect.php';
    $id = $_POST['registerd_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['pass'];

    $sql = "UPDATE `user data` SET `name` = 'om ',`email`='$name',`phone number`='$phone',`password`='$password' WHERE `user data`.`sno` = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['registerd'] = "User Update Success Fully";
        header("location:registerd.php");
    } else {
        $_SESSION['registerd'] = "User Update NOT Success Fully";
        header("location:registerd.php");
    }
}
