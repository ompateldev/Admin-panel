<?php session_start() ?>
<?php include 'includes/auth.php' ?>
<?php include 'includes/topbar.php' ?>
<?php include 'includes/header.php' ?>
<?php include 'includes/siderbar.php' ?>
<?php include 'Database/_dbConnect.php' ?>

<!-- Content Wrapper. Contains page content -->


<!-- Modal -->
<div class="modal fade" id="AddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!-- form -->
                <form action="code.php" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" require>
                    </div>

                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" require>
                    </div>

                    <div class="form-group">
                        <label for="Phone">Phone Number</label>
                        <input type="text" class="form-control" id="Phone" name="Phone" aria-describedby="emailHelp" require>
                    </div>


                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1" require>
                    </div>

                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>

                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>

            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
</div>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


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
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header  ">
                            <h1 class="card-title py-2 "> <strong>Registerd User</strong></h1>
                            <a class="btn btn-primary btn-sm float-right" href="" data-toggle="modal" data-target="#AddModal"> Add User </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `user data`";
                $result = mysqli_query($conn, $sql);

                $number = mysqli_num_rows($result);
                if ($number > 0) {
                    foreach ($result as $row) {
                        // echo $row['name'];
                ?>
                        <tr>
                            <td> <?php echo $row['sno'] ?> </td>
                            <td> <?php echo $row['name'] ?> </td>
                            <td> <?php echo $row['email'] ?> </td>
                            <td> <?php echo $row['phone number'] ?>
                            <td>
                                <a class="btn btn-primary btn-sm " href="registerd_edit.php?user_id=<?php echo $row['sno'];?>">Edit</a>
                                <a class="btn btn-danger  btn-sm " href="#">Datale</a>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                    echo "record was not found";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'includes/script.php' ?>

<?php //include 'includes/footer.php' 
?>