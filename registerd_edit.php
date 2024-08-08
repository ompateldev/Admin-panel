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
                            <h3 class="text-h ml-4 ">Edit - Registerd</h3>

                            <a href="registerd.php" class="btn btn-danger mr-4">Back</a>
                        </div>
                    </div>
                    <div class="card-body">


                        <?php


                        if (isset($_GET['user_id'])) {

                            $cat_id = $_GET['user_id'];

                            $sqlRegisterd = "SELECT * FROM `user data` WHERE `sno`=' $cat_id'";
                            $resultRegisterd = mysqli_query($conn, $sqlRegisterd);

                            foreach ($resultRegisterd as $row) {
                                echo $row['name'];
                        ?>
                                <form class="form w-75  ml-5" action="registerd_Code.php" method="post">
                                    <input type="text" name="registerd_id" value="<?= $row['sno']; ?>">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name" value="<?= $row['name']; ?>" aria-describedby="emailHelp">
                                    </div>
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" class="form-control" name="email" value="<?= $row['email']; ?>" aria-describedby="emailHelp">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" class="form-control" name="phone" value="<?= $row['phone number']; ?>" aria-describedby="emailHelp">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="text" class="form-control" name="pass" value="<?= $row['password'] ?>">
                                    </div>

                                    <div>
                                        <a class="btn btn-danger" href="registerd.php">Close</a>
                                        <button type="update" name="" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                        <?php
                            }
                        } else {
                            echo '<h1> Record Was Not Found</h1>';
                        }

                        ?>

                    </div>
                </div>
            </div>
    </section>
</div>