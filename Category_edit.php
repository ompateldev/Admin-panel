<?php include 'includes/topbar.php' ?>
<?php include 'includes/header.php' ?>
<?php include 'includes/siderbar.php' ?>
<?php include 'Database/_dbConnect.php' ?>




<div class="content-wrapper">
    <section class="content">
        <div class="conatiner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-hearder d-flex justify-content-between py-3 m-0">
                            <h3 class="text-h ml-4 ">Edit - Category</h3>

                            <a href="Category.php" class="btn btn-danger mr-4">Back</a>
                        </div>
                    </div>
                    <div class="card-body">

                        <?php

                        if (isset($_GET['id'])) {

                            $cat_id = $_GET['id'];
                            $sqlCat = "SELECT * FROM `categories` WHERE `id` ='$cat_id'";
                            $resultCat = mysqli_query($conn, $sqlCat);

                            // while ($row = mysqli_fetch_assoc($resultCat)) {
                            //     //echo $row['name'];
                            // }
                            foreach ($resultCat as $row ) {
                                //echo $row['name'];
                                //echo $row['statue'];
                        ?>

                                <form class="form w-75  ml-5" action="Code_editCat.php" method="post">

                                    <input type="hidden" name="cat_id" value="<?= $row['id']; ?>">

                                    <div class="form-group">
                                        <label for="name">Category Name </label>
                                        <input type="text" class="form-control" value="<?= $row['name']; ?>" id="name" name="name" aria-describedby="emailHelp" require>
                                    </div>
                                    <div class="form-group">
                                        <label for="desc">Description </label>
                                        <textarea name="desc" id="desc" class="form-control" require rows="3"><?= $row['description']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="trending">Trending</label>
                                        <input type="checkbox" name="trending" id="trending" <?= $row['trending'] == '1' ? 'checked' : ''; ?> /> Trending
                                    </div>
                                    <div class="form-group">
                                        <label for="stutas">Stutas</label>
                                        <input type="checkbox" name="stutas" id="stutas" <?= $row['statue'] == '1' ? 'checked' : ''; ?> />Stutas
                                    </div>
                                    <div>
                                        <a href="Category.php" class="btn btn-danger">Close</a>
                                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                                    </div>

                                </form>
                        <?php
                            }
                        } else {
                            echo "Record was not";
                        }
                        ?>

                    </div>
                </div>
            </div>
    </section>
</div>