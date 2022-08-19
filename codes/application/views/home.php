<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Dojo</title>
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
    <!-- main script, getting the add to cart function -->
    <script src="<?= base_url("assets/js/show.js") ?>" ></script>
</head>
<body>
    <div class="container-fluid">
        <!-- header -->
        <?php $this->load->view("partials/header") ?>

        <!---------------------Main Container-------------------->
        <div class="row mb-4">
            <!-------------------Carousel------------------->
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                <div class="carousel-inner d-xs-none d-sm-block">
                    <div class="carousel-item active">
                            <div>
<?php $img = json_decode($featured_products[0]["images_path"], true); ?>
                                <div class="w-50 overflow-hidden">
                                    <img src="<?= $img[0] ?>" alt="<?= $img[0] ?>" >
                                </div>
                                <section>
                                    <h2 class="display-6 fw-bold"><?= $featured_products[0]["product_name"] ?></h2>
                                    <p class="lead"><?= $featured_products[0]["description"] ?>.</p>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <p>Price: $<?= $featured_products[0]["price"] ?></p>
                                    <form action="/add_to_cart" method="POST">
                                        <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash("hash") ?>">
                                        <input type="hidden" name="product_id" value="<?= $featured_products[0]["id"] ?>">
                                        <input type="hidden" name="user_id" value="<?= $featured_products[0]["user_id"] ?>">
                                        <a id="add-to-cart" href="" class="btn me-3 d-inline-block">
                                            <i class="bi bi-cart-fill"></i>
                                            Buy
                                        </a>
                                        <select name="quantity" class="form-select w-auto d-inline-block" class="" aria-label="Default select example">
                                            <option selected value="1">1 : $<?= $featured_products[0]["price"] * 1 ?></option>
                                            <option value="2">2 : $<?= $featured_products[0]["price"] * 2 ?></option>
                                            <option value="3">3 : $<?= $featured_products[0]["price"] * 3 ?></option>
                                        </select>
                                    </form>
                                    <p id="msg"></p>
                                </section>
                            </div>
                        </div>
<?php 
    foreach(array_splice($featured_products, 1) as $featured) {
        $img = json_decode($featured["images_path"], true); ?>
                        <div class="carousel-item">
                            <div>
                                <div class="w-50 overflow-hidden">
                                    <img src="<?= $img[0] ?>" alt="<?= $img[0] ?>">
                                </div>
                                <section>
                                    <h2 class="display-6 fw-bold"><?= $featured["product_name"] ?></h2>
                                    <p class="lead"><?= $featured["description"] ?>.</p>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <p>Price: $<?= $featured["price"] ?></p>
                                    <form action="/add_to_cart" method="POST">
                                        <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash("hash") ?>">
                                        <input type="hidden" name="product_id" value="<?= $featured["id"] ?>">
                                        <input type="hidden" name="user_id" value="<?= $featured["user_id"] ?>">
                                        <a id="add-to-cart" href="" class="btn me-3 d-inline-block">
                                            <i class="bi bi-cart-fill"></i>
                                            Buy
                                        </a>
                                        <select name="quantity" class="form-select w-auto d-inline-block" class="" aria-label="Default select example">
                                            <option selected value="1">1 : $<?= $featured["price"] * 1 ?></option>
                                            <option value="2">2 : $<?= $featured["price"] * 2 ?></option>
                                            <option value="3">3 : $<?= $featured["price"] * 3 ?></option>
                                        </select>
                                    </form>
                                    <p id="msg"></p>
                                </section>
                            </div>
                        </div>
<?php } ?>

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
                    <img src="<?= base_url("{$img[0]}")?>" class="card-img-top" alt="<?= $img[0] ?>">
                </a>
                <div class="card-body">
                    <p class="card-text"><?= $product["product_name"] ?></p>                                
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