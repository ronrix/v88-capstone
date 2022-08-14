<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>(Product Page) | Sample Product | Shopah </title>
     <!--Jquery library-->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- bootstrap library-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- font awesome library-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- main style -->
    <link rel="stylesheet/less" type="text/css" href="<?= base_url("assets/css/index.less") ?>" >
    <link rel="stylesheet/less" type="text/css" href="<?= base_url("assets/css/pages/homepage.less") ?>">
    <link rel="stylesheet/less" type="text/css" href="<?= base_url("assets/css/pages/show.less") ?>">
    <!-- less library -->
    <script src="https://cdn.jsdelivr.net/npm/less@4" ></script>
    <!-- main script -->
    <script src="<?= base_url("assets/js/show.js") ?>" ></script>
</head>
<body>
    <div class="container-fluid">
        <?php $this->load->view("partials/header", $user) ?>

        <div class="row">
            <a href="">Go back</a>
        </div>

        <div class="row">
            <div class="col-4">
                <h2>Black Belt for Staff</h2>
                <img class="w-50" id="default-thumbnail" data-alt="<?= base_url("assets/images/s1.jpg") ?>" src="<?= base_url("assets/images/s1.jpg") ?>" alt="sample img">
                <div class="d-flex" id="other-thumbnails">
                    <img class="w-25 border border-success" src="<?= base_url("assets/images/s1.jpg") ?>" alt="sample img">
                    <img class="w-25 border" src="<?= base_url("assets/images/i1.jpeg") ?>" alt="sample img">
                </div>
            </div>
            <div class="col">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <form class="d-flex">
                    <input type="submit" class="btn me-3" value="Buy">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>$1</option>
                        <option value="1">$2</option>
                        <option value="2">$3</option>
                        <option value="3">$6</option>
                    </select>
                </form>
            </div>
        </div>

        <div class="row mt-5">
            <h3>Similar Items</h3>
            <div class="card m-2" style="width: 18rem;">
                <a href="/products/show/6">
                    <img src="<?= base_url("assets/images/s1.jpg") ?>" class="card-img-top" alt="...">
                </a>
                <div class="card-body">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <p>Price: $1000</p>
                </div>
            </div>
            <div class="card m-2" style="width: 18rem;">
                <a href="/products/show/6">
                    <img src="<?= base_url("assets/images/s1.jpg") ?>" class="card-img-top" alt="...">
                </a>
                <div class="card-body">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <p>Price: $1000</p>
                </div>
            </div>
            <div class="card m-2" style="width: 18rem;">
                <a href="/products/show/6">
                    <img src="<?= base_url("assets/images/s1.jpg") ?>" class="card-img-top" alt="...">
                </a>
                <div class="card-body">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <p>Price: $1000</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>