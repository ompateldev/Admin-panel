<?php
if (!isset($_SESSION['auth'])) {

    $_SESSION['status'] = "Login to Access Dashbord";
    header("location:login.php");
    exit();
}
