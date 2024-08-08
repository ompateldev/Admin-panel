<?php include 'includes/topbar.php' ?>
<?php include 'includes/header.php' ?>
<?php include 'includes/siderbar.php' ?>
<?php include 'Database/_dbConnect.php' ?>

<!-- ======================================================================================================= -->
<div class="content-wrapper">
    <section class="content">
        <div class="conatiner">
            <?php if (isset($_SESSION['status'])) {
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Success!</strong> ' . $_SESSION['status'] . '
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';

                unset($_SESSION['status']);
            }    ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-hearder d-flex justify-content-between py-3 m-0">
                            <h3 class="text-h ml-4 ">Gift - Category</h3>
                            <a href="Product.php" class="btn btn-Danger mr-4">Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="Product_Code.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label class="p-3" for="category">Select Category</label>
                                    <?php
                                    $sql = "SELECT * FROM `categories`";
                                    $Catresult = mysqli_query($conn, $sql);

                                    $num = mysqli_num_rows($Catresult);
                                    if ($num > 0) {
                                    ?>
                                        <select name="category_id" id="">
                                            <?php foreach ($Catresult as $row) { ?>
                                                <option value="<?= $row['id']; ?>"><?= $row['name']; ?></option>

                                            <?php }
                                            ?>
                                        </select>
                                    <?php
                                    } else {
                                        echo "Record Was Not found";
                                    }

                                    ?>

                                </div>

                                <div class="col-md-12">
                                    <div class="form-group mt-3">
                                        <label for="name">Product Name</label>
                                        <input type="text" name="name" class="form-control" id="name" require placeholder="Name" aria-describedby="emailHelp">
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group mt-3">
                                        <label for="sdesc">Small Description</label>
                                        <textarea type="text" name="sdesc" class="form-control" id="sdesc" require placeholder="Small Description" aria-describedby="emailHelp" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-3">
                                        <label for="ldesc">Long Description</label>
                                        <textarea type="text" name="ldesc" class="form-control" id="ldesc" require placeholder="Long Description" aria-describedby="emailHelp" rows="3"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group mt-3">
                                        <label for="price">Price</label>
                                        <input type="text" name="price" class="form-control" id="price" require placeholder="Price" aria-describedby="emailHelp">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mt-3">
                                        <label for="oprice">Offer Price</label>
                                        <input type="text" name="oprice" class="form-control" id="oprice" require placeholder="Offer price" aria-describedby="emailHelp">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mt-3">
                                        <label for="tax">Tax</label>
                                        <input type="text" name="tax" class="form-control" id="tax" placeholder="Tax" require aria-describedby="emailHelp">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group mt-3 ">
                                        <label for="Quantity">Product Quantity</label>
                                        <input type="text" name="quantity" class="form-control" placeholder="quantity">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mt-3 ">
                                        <label for="status">Status (checked = Show | Hide</label>
                                        <input type="checkbox" name="status" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group mt-3">
                                        <label for="image">Upload Image</label>
                                        <input type="file" name="image" require class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mt-3">
                                        <label>Click to Save</label>
                                        <button type="submit" class="btn btn-primary btn-block">Save</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
</div>


<?php include 'includes/script.php' ?>