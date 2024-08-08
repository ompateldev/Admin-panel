<?php include 'includes/topbar.php' ?>
<?php include 'includes/header.php' ?>
<?php include 'includes/siderbar.php' ?>
<?php include 'Database/_dbConnect.php' ?>

<!-- ======================================================================================================= -->
<div class="content-wrapper">
    <section class="content">
        <div class="conatiner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-hearder d-flex justify-content-between py-3 m-0">
                            <h3 class="text-h ml-4 ">
                                Product-Edit
                            </h3>
                            <a href="Product.php" class="btn btn-Danger mr-4">Back</a>
                        </div>
                    </div>
                    <?php

                    if (isset($_GET['pro_id'])) {
                        $pro_id = $_GET['pro_id'];

                        $SqlPro = "SELECT * FROM `products` WHERE `id`='$pro_id'";

                        $resultPro = mysqli_query($conn, $SqlPro);

                        if ($num = mysqli_num_rows($resultPro) > 0) {

                            $proItem = mysqli_fetch_array($resultPro);
                            //echo $proItem['categories_name'];
                    ?>
                            <div class="card-body">



                                <form action="Product_editCode.php" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-12">

                                            <?php
                                            $sql = "SELECT * FROM `categories`";
                                            $Catresult = mysqli_query($conn, $sql);

                                            $num = mysqli_num_rows($Catresult);
                                            if ($num > 0) {
                                            ?>
                                                <label class="lebal font-weight-bold p-2" for="category">Select Category</label>
                                                <select name="category_id" require id="">
                                                    <option value="">Select Category</option>
                                                    <?php foreach ($Catresult as $row) { ?>
                                                        <option value="<?= $row['id']; ?>" <?= $proItem['categories_id'] == $row['id'] ? 'selected' : '' ?>>
                                                            <?= $row['name']; ?>
                                                        </option>

                                                    <?php }
                                                    ?>
                                                </select>
                                            <?php
                                            } else {
                                                echo "Record Was Not found";
                                            }

                                            ?>

                                        </div>

                                        <input type="text" name="pro_id" value="<?= $proItem['id'] ?>">

                                        <div class="col-md-12">
                                            <div class="form-group mt-3">
                                                <label for="name">Product Name</label>
                                                <input type="text" name="name" value="<?= $proItem['categories_name'] ?>" class="form-control" id="name" require placeholder="Name" aria-describedby="emailHelp">
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group mt-3">
                                                <label for="sdesc">Small Description</label>
                                                <textarea type="text" name="sdesc" class="form-control" id="sdesc" require placeholder="Small Description" aria-describedby="emailHelp" rows="3"><?= $proItem['small_description'] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mt-3">
                                                <label for="ldesc">Long Description</label>
                                                <textarea type="text" name="ldesc" class="form-control" id="ldesc" require placeholder="Long Description" aria-describedby="emailHelp" rows="3"><?= $proItem['long_description'] ?></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group mt-3">
                                                <label for="price">Price</label>
                                                <input type="text" name="price" value="<?= $proItem['price']; ?>" class="form-control" id="price" require placeholder="Price" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mt-3">
                                                <label for="oprice">Offer Price</label>
                                                <input type="text" name="oprice" value="<?= $proItem['offer_price']; ?>" class="form-control" id="oprice" require placeholder="Offer price" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mt-3">
                                                <label for="tax">Tax</label>
                                                <input type="text" name="tax" class="form-control" value="<?= $proItem['tax']; ?>" id="tax" placeholder="Tax" require aria-describedby="emailHelp">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group mt-3 ">
                                                <label for="Quantity">Product Quantity</label>
                                                <input type="text" name="quantity" value="<?= $proItem['quantity']; ?>" class="form-control" placeholder="quantity">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mt-3 ">
                                                <label for="status">Status (checked = Show | Hide</label>
                                                <input type="checkbox" name="status" value="<?= $proItem['status'] == '1' ? 'checked' : '' ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group mt-3 ">
                                                <label for="image">Upload Image</label>
                                                <input type="file" name="image" require class="form-control">
                                                <input type="text" name="old_img" value="<?= $proItem['image'] ?>">
                                            </div>
                                            <img src="uploads/product/<?= $proItem['image'] ?>" width="200px" height="150px" alt="">
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group ">
                                                <label>Click to Update</label>
                                                <button type="submit" name="update" class="btn btn-primary btn-block">Update</button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                    <?php
                        } else {
                            echo "NO Such Product";
                        }
                    }
                    ?>
                </div>
            </div>
    </section>
</div>


<?php include 'includes/script.php' ?>