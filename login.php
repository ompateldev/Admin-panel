<?php session_start() ?>
<?php include 'includes/header.php' ?>
<?php include 'Database/_dbConnect.php' ?>

<?php
if (isset($_SESSION['auth'])) {

    $_SESSION['status'] = "You are already loggedin";
    header("location:index.php");
    exit();
}
?>

<section class="section mt-5  w-75 mx-auto">
    <div class="container">
        <div class="card-width  w-50 mt-5 pt-5 mx-auto">
            <div class="card d-flex justify-content-center ">
                <div class="card-header text-center">
                    <h1> <strong>Login Form</strong></h1>
                </div>


                <?php

                if (isset($_SESSION['om'])) {
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> ' . $_SESSION['om'] . '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
                   
                    unset($_SESSION['om']);
                }

                ?>
                <?php

                if (isset($_SESSION['status'])) {
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> ' . $_SESSION['status'] . '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';

                    unset($_SESSION['status']);
                }

                ?>
                <form class="form " action="loginCode.php" method="post">
                    <div class="form-group px-4">
                        <label class="text  pt-2" for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                    </div>

                    <div class="form-group px-4">
                        <label class="text  " for="pass">Password</label>
                        <input type="password" class="form-control" id="pass" name="pass">
                    </div>

                    <hr>
                    <button type="submit" name="loginCode" class="btn btn-primary pt-1 ml-4 mb-3">Submit</button>
                </form>

            </div>

        </div>

    </div>

</section>




<?php include 'includes/footer.php' ?>