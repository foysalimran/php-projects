<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD with OOP PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>

  <div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-md-7">
            <div class="card shadow">
                <div class="card-header">
                    <h2>Student Registration Form</h2>
                </div>
                <div class="card-body">
                    <form action="">
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
                        <textarea name="address" class="form-control" ></textarea>
                        </div>

                        <input type="submit" value="Submit" class="btn btn-primary form-control">

                    </form>
                </div>
            </div>
        </div>

    </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>