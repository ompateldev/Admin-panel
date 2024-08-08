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
                            <h3 class="text-h ml-4 ">Gift - Category</h3>
                            <a href="Add_Product.php" class="btn btn-primary mr-4">Add</a>
                        </div>
                    </div>
                    <?php
                    if (isset($_SESSION['status'])) {
                        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
<strong>Holy guacamole!</strong> ' . $_SESSION['status'] . ' .
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>';
unset($_SESSION['status']);
                    }
                    ?>
                    <div class="card-body">

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Statue</th>
                                    <th>Create at</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $sql = "SELECT * FROM `products`";
                                $result = mysqli_query($conn, $sql);
                                $number = mysqli_num_rows($result);

                                if ($number) {

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        // echo $row['long_description'];

                                ?>
                                        <tr>
                                            <td><?= $row['id']; ?></td>
                                            <td><?= $row['categories_name']; ?></td>
                                            <td><?= $row['price']; ?></td>
                                            <td><?= $row['status']; ?></td>
                                            <td><?= $row['created_at']; ?></td>
                                            <td>
                                                <a href="product_edit.php?pro_id=<?= $row['id']; ?>" class="btn btn-primary">Edit</a>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                <?php

                                    }
                                } else {
                                    echo "Record Was Not Found";
                                }

                                ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
    </section>
</div>


<?php include 'includes/script.php' ?>