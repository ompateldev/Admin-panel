
<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    include 'Database/_dbConnect.php';

    $id = $_POST['cat_id'];
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $trend = $_POST['trending'] == true ? '1' : '0';
    $ste = $_POST['stutas'] == true ? '1' : '0';

    $updateSql = "UPDATE `categories` SET `name` = '$name',`description`='$desc', `trending`='$trend', `statue`='$ste' WHERE `categories`.`id` = '$id'";

    $updateResut = mysqli_query($conn, $updateSql);

    if ($updateSql) {
        $_SESSION['update'] = "Category Update Successfully";
        header("location:Category.php");
        exit();
    } else {
        $_SESSION['update'] = "Category Update Not  Successfully";
        header("location:Category.php");
        exit();
    }
}

?>