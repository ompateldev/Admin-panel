<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include 'Database/_dbConnect.php';

    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $loginSql = "SELECT * FROM `user data` WHERE `email`='$email' AND `password`='$pass'";
    $result = mysqli_query($conn, $loginSql);

    $number = mysqli_num_rows($result);
    if ($number > 0) {
        foreach ($result as $row) {
            $user_sno = $row['sno'];
            $user_name = $row['name'];  
            $user_email = $row['email'];
            $user_phone = $row['phone number'];
        }

        $_SESSION['auth'] = true;
        $_SESSION['name'] = $user_name;
        // $_SESSION['auth_user'] = [
        //     'user_sno' => $user_sno,
        //     'user_name' => $user_name,
        //     'user_email' => $user_email,
        //     'user_phone' => $user_phone,
        // ];

        $_SESSION['status'] = "Logged in Successfully";
        header("location:index.php");
        exit();
    } else {
        $_SESSION['status'] = "Invalid Email or Password";
        header("location:login.php");
    }
}
