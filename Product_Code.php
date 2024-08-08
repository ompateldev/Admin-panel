<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include  'Database/_dbConnect.php';

    $cat_id = $_POST['category_id'];
    $product_name = $_POST['name'];
    $product_sdesc = $_POST['sdesc'];
    $product_ldesc = $_POST['ldesc'];
    $product_price = $_POST['price'];
    $product_oprice = $_POST['oprice'];
    $product_tax = $_POST['tax'];
    $quantity = $_POST['quantity'];
    $product_status = $_POST['status'] = true ? '1' : '0';

    $image = $_FILES['image']['name'];
    $allowed_extension = array('png', 'jpg', 'jpeg');
    $file_extenion = pathinfo($image, PATHINFO_EXTENSION);

    $filename = time() .'.'. $file_extenion;

    if (!in_array($file_extenion, $allowed_extension)) {
        $_SESSION['stutas'] = "You are allowed with only jpg , png , jpeg";
        header("location:Add_Product.php");
        exit();
    } else {

        $pro_Sql = "INSERT INTO `products` (`categories_id`, `categories_name`, `small_description`, `long_description`, `price`, `offer_price`, `tax`, `quantity`, `image`, `status`, `created_at`) VALUES 
        ('$cat_id', '$product_name', '$product_sdesc', '$product_ldesc', '$product_price', '$product_oprice', '$product_tax', '$quantity', '$filename', '$product_status', current_timestamp())";

        $result = mysqli_query($conn, $pro_Sql);

        if ($result) {
            move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/product/'. $filename);
            $_SESSION['status'] = "Product Addes Successfully";
            header('location:Product.php');
            exit(0);
        } else {
            $_SESSION['status'] = "Somthing wrong";
            header('location:Product.php');
            exit(0);
        }
    }
}
