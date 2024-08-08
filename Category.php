<?php include 'includes/topbar.php' ?>
<?php include 'includes/header.php' ?>
<?php include 'includes/siderbar.php' ?>
<?php include 'Database/_dbConnect.php' ?>

<!-- Modal -->
<div class="modal fade" id="CategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="code_category.php" method="post">

                    <div class="form-group">
                        <label for="name">Category Name </label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" require>
                    </div>
                    <div class="form-group">
                        <label for="desc">Description </label>
                        <textarea name="desc" id="desc" class="form-control" require rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="trending">Trending</label>
                        <input type="checkbox" name="trending" id="trending"> Trending
                    </div>
                    <div class="form-group">
                        <label for="stutas">Stutas</label>
                        <input type="checkbox" name="stutas" id="stutas">Stutas
                    </div>
                    <div>
                        <button type="submit" class="btn btn-denger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- ======================================================================================================= -->
<div class="content-wrapper">
    <section class="content">
        <div class="conatiner">
            <?php
            if (isset($_SESSION['category'])) {
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Success!</strong> ' . $_SESSION['category'] . '
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>';

                unset($_SESSION['category']);
            }
            ?>
            <?php


            if (isset($_SESSION['update'])) {
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Success!</strong> ' . $_SESSION['update'] . '
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>';

                unset($_SESSION['update']);
            }
            ?>

            <?php


            if (isset($_SESSION['delete'])) {
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
<strong>Success!</strong> ' . $_SESSION['delete'] . '
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>';

                unset($_SESSION['delete']);
            }
            ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-hearder d-flex justify-content-between py-3 m-0">
                            <h3 class="text-h ml-4 ">Gift - Category</h3>
                            <a href="#" class="btn btn-primary mr-4" data-toggle="modal" data-target="#CategoryModal">Add</a>
                        </div>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Trending</th>
                                    <th>Statue</th>
                                    <th>Create at</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                $catSql = "SELECT * FROM `categories`";
                                $catResult = mysqli_query($conn, $catSql);
                                $number = mysqli_num_rows($catResult);
                                if ($number > 0) {

                                    while ($row = mysqli_fetch_assoc($catResult)) {
                                        //echo $row['name'];
                                ?>
                                        <tr>
                                            <td> <?= $row['id'] ?> </td>
                                            <td> <?= $row['name'] ?> </td>
                                            <td>
                                                <input type="checkbox" <?= $row['trending'] == '1' ? 'checked' : '' ?> readonly />
                                            </td>
                                            <td>
                                                <input type="checkbox" <?= $row['statue'] == '1' ? 'checked' : '' ?> readonly />
                                            </td>
                                            <td> <?= $row['create at'] ?> </td>
                                            <td>
                                                <a class="btn btn-primary" href="Category_edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                                            </td>
                                            <td>
                                                <form action="Cat_delete.php" method="post">
                                                    <input type="hidden" name="cat" value="<?= $row['id']; ?>" />
                                                    <button class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>

                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo "Record was not Found";
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