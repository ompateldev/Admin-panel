<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include 'Database/_dbConnect.php';

    $cat_id = $_POST['cat'];

    $deleteSql = "DELETE FROM `categories` WHERE `categories`.`id` ='$cat_id'";
    $deleteResult = mysqli_query($conn, $deleteSql);


    if ($deleteResult) {
        $_SESSION['delete'] = "Category Was Deleted success fully";
        header("location:Category.php");
        exit();
    } else {
        $_SESSION['delete'] = "Category Was Deleted Not Success fully";
        header("location:Category.php");
        exit();
    }
}
