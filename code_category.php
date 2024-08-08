
<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include 'Database/_dbConnect.php';

    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $trending = $_POST['trending'] = true ? '1' : '0';
    $stutas = $_POST['stutas'] = true ? '1' : '0';

    $categorySql = "INSERT INTO `categories` (`name`, `description`, `trending`, `statue`,`create at`) 
                                      VALUES (' $name', '$desc', '$trending', '$stutas', current_timestamp());";

    $cat_result = mysqli_query($conn, $categorySql);

    if ($cat_result) {
        $_SESSION['category'] = "Categiry Inserted Successfully";
        header("location:Category.php");
        exit();
        
    } else {
        $_SESSION['category'] = "Categiry Inserted not Successfully";
        header('Locateion:Category.php');
    }
}
?>
