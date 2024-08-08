<?php
session_start();
session_destroy();
session_start();

$_SESSION['om']  = "Logged out Successfully";

header('location:login.php');
exit();

?>
