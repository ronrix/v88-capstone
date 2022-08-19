<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Shopah</title>
     <!--Jquery library-->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- bootstrap library-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- font awesome library-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- main style -->
    <link rel="stylesheet/less" type="text/css" href="<?= base_url("assets/css/index.less") ?>">
    <link rel="stylesheet/less" type="text/css" href="<?= base_url("assets/css/pages/homepage.less")?>" >
    <!-- less library -->
    <script src="https://cdn.jsdelivr.net/npm/less@4" ></script>
</head>
<body>
    <div class="container-fluid">
        <!-- header -->
        <?php $this->load->view("partials/header") ?>
        <!-- payment modal -->
        <?php $this->load->view("partials/payment") ?>

        <!---------------------Main Container-------------------->
        <div class="row mb-4">
            <!-------------------Carousel------------------->
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                <div class="carousel-inner d-xs-none d-sm-block">
                    <div class="carousel-item active">
                         <div>
                            <img src="assets/images/s1.jpg" alt="...">
                            <section>
                                <h2 class="display-6 fw-bold">Sample 2</h2>
                                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <p>Price: $1000</p>
                                <a href="" class="btn" data-bs-toggle="modal" data-bs-target="#billout">
                                    Buy
                                </a>
                            </section>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div>
                            <img src="assets/images/s1.jpg" alt="...">
                            <section>
                                <h2 class="display-6 fw-bold">Sample 2</h2>
                                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <p>Price: $1000</p>
                                <a href="" class="btn" data-bs-toggle="modal" data-bs-target="#billout">
                                    Buy
                                </a>
                            </section>
                        </div>
                    </div>
                    <div class="carousel-item">
                         <div>
                            <img src="assets/images/s1.jpg" alt="...">
                            <section>
                                <h2 class="display-6 fw-bold">Sample 2</h2>
                                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <p>Price: $1000</p>
                                <a href="" class="btn" data-bs-toggle="modal" data-bs-target="#billout">
                                    Buy
                                </a>
                            </section>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="row m-auto">
            <h3>Featured Products</h3>

<?php 
    foreach($products as $product) {
        $img = json_decode($product["images_path"], true); ?>
            <div class="card m-2 overflow-hidden" style="width: 18rem;">
                <a href="/product/show/<?= $product["id"] ?>" class="border w-100" id="thumbnail">
                    <img src="<?= base_url("{$img[0]}")?>" class="card-img-top" alt="...">
                </a>
                <div class="card-body">
                    <p class="card-text"><?= $product["description"] ?></p>                                
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <p>Price: $<?= $product["price"] ?></p>
                </div>
            </div>
<?php } ?>

        </div>
   </div>
</body>
</html>