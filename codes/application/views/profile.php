<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products | Shopah</title>
     <!--Jquery library-->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- bootstrap library-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- font awesome library-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- main style -->
    <link rel="stylesheet/less" type="text/css" href="<?= base_url("assets/css/index.less") ?>">
    <link rel="stylesheet/less" type="text/css" href="<?= base_url("assets/css/pages/homepage.less") ?>">
    <!-- less library -->
    <script src="https://cdn.jsdelivr.net/npm/less@4" ></script>
    <!-- main script -->
    <script type="text/javascript" src="<?= base_url("assets/js/profile.js") ?>"></script>
</head>
<body>
    <div class="container-fluid">
		<!-- header -->
        <?php $this->load->view("partials/header") ?>

        <!-- Changing Password -->
        <div class="row mt-5">
            <ul class="col-3 p-5 nav-link" id="side-nav">
                <li><a href="" class="text-dark" data-id="ch-p">Change password</a></li>
                <li><a href="" class="text-dark" data-id="ch-u">User Information</a></li>
                <li><a href="" class="text-dark" data-id="ch-s">Shipping Information</a></li>
                <li><a href="" class="text-dark" data-id="ch-b">Billing Information</a></li>
            </ul>
            <form class="col-7" id="ch-p">
                <h3>Change password</h3>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingInput" placeholder="Password">
                    <label for="floatingInput">Old Password</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                  <label for="floatingPassword">New password</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                  <label for="floatingPassword">Comfirm password</label>
                </div>
                <input type="submit" value="Submit" class="btn btn-primary">
            </form>

            <!-- User information -->
            <form class="col d-none" id="ch-u">
                <h3>User Information</h3>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" placeholder="Email">
                    <label for="floatingInput">Email Address</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="floatingInput1" placeholder="First Name">
                  <label for="floatingPassword">First Name</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="floatingInput2" placeholder="First Name">
                  <label for="floatingPassword">Last Name</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="floatingInput3" placeholder="First Name">
                  <label for="floatingPassword">Contact Number</label>
                </div>
                <input type="submit" value="Submit" class="btn btn-primary">
            </form>

            <!-- Shipping Information -->
            <form class="col d-none" id="ch-s">
                <h3>Change Shipping Information</h3>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" placeholder="Email">
                    <label for="floatingInput">Email Address</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="floatingPassword" placeholder="First Name">
                  <label for="floatingPassword">First Name</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="floatingPassword" placeholder="First Name">
                  <label for="floatingPassword">Last Name</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="floatingPassword" placeholder="First Name">
                  <label for="floatingPassword">Contact Number</label>
                </div>
                <input type="submit" value="Submit" class="btn btn-primary">
            </form>

            <!-- Billing Information -->
            <form class="col d-none" id="ch-b">
                <h3>Change Billing Information</h3>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" placeholder="Email">
                    <label for="floatingInput">Email Address</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="floatingPassword" placeholder="First Name">
                  <label for="floatingPassword">First Name</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="floatingPassword" placeholder="First Name">
                  <label for="floatingPassword">Last Name</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="floatingPassword" placeholder="First Name">
                  <label for="floatingPassword">Contact Number</label>
                </div>
                <input type="submit" value="Submit" class="btn btn-primary">
            </form>

        </div>

    </div>
</body>
</html>