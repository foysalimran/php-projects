<?php

include_once 'classes/Register.php';
$re = new Register();


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
            <div class="col-md-12">
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

                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>All students</h3>
                            </div>
                            <div class="col-md-6 text-end">
                                <a class="btn btn-info" href="addstd.php">Add stduent</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
<table class="table table-striped table-bordered table-responsive">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Photo</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        
                            $allStd = $re->allStudent();
                            if($allStd) {
                                while($row = mysqli_fetch_assoc($allStd)){
                                    ?>
                                    <tr>
                                        <td><?=$row['name']?></td>
                                        <td><?=$row['email']?></td>
                                        <td><?=$row['phone']?></td>
                                        <td><img style="width:80px;height:80px;border-radius: 100;object-fit:cover" src="<?=$row['photo']?>" alt="<?=$row['name']?>" class="img-thumbnail"></td>
                                        <td>
                                            <?=$row['address']?> 
                                        </td>
                                        <td>
                                            <a class="btn m-2 btn-sm btn-warning" href="edit.php?id=<?=base64_encode($row['id'])?>"><i>Edit</i></a>
                                            <a class="btn m-2 btn-sm btn-danger" href="<?=$row['id']?>"><i>Delete</i></a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                        ?>


                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>