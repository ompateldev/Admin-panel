<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include 'Database/_dbConnect.php';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['Phone'];
    $password = $_POST['password'];

    $sql = "INSERT INTO `user data` (`name`, `email`, `phone number`, `password`)
                             VALUES ('$name','$email', '$phone', '$password')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "User Add Success fully";
        header("location:registerd.php");
        exit();

    } else {
        $_SESSION['status'] = "User Add Not Success fully";
        header("location:registerd.php");
    }
}