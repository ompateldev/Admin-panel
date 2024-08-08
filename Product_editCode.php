<?php

session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include 'Database/_dbConnect.php';

    $pro_id = $_POST['pro_id'];
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
    $old_img = $_POST['old_img'];


    if ($image != '') {
        $update_filename = $_FILES['image']['name'];

        $allowed_extension = array('png', 'jpg', 'jpeg');
        $file_extension = pathinfo($image, PATHINFO_EXTENSION);
        $filename = time() . ' .' . $file_extension;
        if (!in_array($file_extension, $allowed_extension)) {
            $_SESSION['status'] = "You are alowed with only.........";
            header("location:Product.php");
            exit();
        }
        $update_filename = $filename;
    } else {
        $update_filename = $old_img;
    }


    $query = "UPDATE `products` SET 
            `categories_id`='$cat_id',
            `categories_name`='$product_name',
            `small_description`='$product_sdesc',
            `long_description`='$product_ldesc',
            `price`='$product_price',
            `offer_price`='$product_oprice',
            `tax`='$product_tax',
            `quantity`='$quantity',
            `image`='$image',
            `status`='$product_status'
            WHERE `products`.`id` ='$pro_id'";


    $result = mysqli_query($conn, $query);

    if ($result) {

        if ($image != '') {
            move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/product/' . $filename);

            if (file_exists('uploads/product/' . $old_img)) {
                unlink("uploads/product/" . $old_img);
            }
        }
        $_SESSION['status'] = "Product Update Successfully";
        header('location:Product.php');
        exit(0);
    } else {
        $_SESSION['status'] = "ProductUpdate NOT  Successfully";
        header('location:Product.php');
        exit(0);
    }
}
