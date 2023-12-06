<?php

include_once 'classes/Register.php';
$re = new Register();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $register = $re->addRegister($_POST, $_FILES);
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>OOP CRUD</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-md-7">
                <div class="card shadow">
                    <?php
                    if (isset($register)) {
                    ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong><?=$register;?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                    }
                    ?>

                    <div class="card-header d-flex">
                        <div class="col-md-6">
                        <h3>Add stduent</h3>
                        </div>
                        <div class="col-md-6 text-end">
                            <a class="btn btn-info" href="index.php">Show stduents</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group mb-3">
                                <label for="">Name</label>
                                <input type="text" name="name" placeholder="Enter your name" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Email</label>
                                <input type="email" name="email" placeholder="Enter your email" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Phone</label>
                                <input type="number" name="phone" placeholder="Enter your phone number" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Photo</label>
                                <input type="file" name="photo" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Address</label>
                                <textarea name="address" class="form-control"></textarea>
                            </div>

                            <input type="submit" value="Submit" class="btn btn-primary form-control">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>