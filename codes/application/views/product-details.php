<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>(Product Details) | Dojo </title>
     <!--Jquery library-->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- bootstrap library-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- font awesome library-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- main style -->
    <link rel="stylesheet/less" type="text/css" href="<?= base_url("assets/css/index.less") ?>">
    <link rel="stylesheet/less" type="text/css" href="<?= base_url("assets/css/pages/homepage.less") ?> ">
    <link rel="stylesheet/less" type="text/css" href="<?= base_url("assets/css/pages/show.less") ?> ">
    <!-- less library -->
    <script src="https://cdn.jsdelivr.net/npm/less@4" ></script>
    <!-- main script -->
    <script src="<?= base_url("assets/js/show.js") ?>" ></script>
</head>
<body>
    <div class="container-fluid">
        <!-- header -->
        <?php $this->load->view("partials/header") ?>

        <div class="container">
            <div class="row">
                <a href="index.html" class="my-3">Go back</a>
            </div>

            <!-- Show product -->
            <div class="row">
                <div class="col-4">
                    <h2><?= $product["product_name"] ?></h2>
                    <img class="w-75" id="default-thumbnail" data-alt="<?= base_url("{$imgs[0]}") ?>" src="<?= base_url("{$imgs[0]}") ?>" alt="sample img">
                    <div class="d-flex" id="other-thumbnails">
                        <img class="w-25 border img-thumbnail border-success" src="<?= base_url("assets/images/s1.jpg") ?>" alt="sample img">
                        <img class="w-25 border img-thumbnail" src="<?= base_url("assets/images/i1.jpeg") ?>" alt="sample img">
                        <img class="w-25 border img-thumbnail" src="<?= base_url("assets/images/i1.jpeg") ?>" alt="sample img">
                        <img class="w-25 border img-thumbnail" src="<?= base_url("assets/images/i1.jpeg") ?>" alt="sample img">
                    </div>
                </div>
                <div class="col align-self-center">
                    <p><?= $product["description"] ?></p>
                    <form action="/add_to_cart" method="POST">
                        <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash("hash") ?>">
                        <input type="hidden" name="product_id" value="<?= $product["id"] ?>">
                        <input type="hidden" name="user_id" value="<?= $product["user_id"] ?>">
                        <a id="add-to-cart" href="" class="btn me-3 d-inline-block">
                            <i class="bi bi-cart-fill"></i>
                            Buy
                        </a>
                        <select name="quantity" class="form-select w-auto d-inline-block" class="" aria-label="Default select example">
                            <option selected value="1">1 : $<?= $product["price"] * 1 ?></option>
                            <option value="2">2 : $<?= $product["price"] * 2 ?></option>
                            <option value="3">3 : $<?= $product["price"] * 3 ?></option>
                        </select>
                    </form>
                    <p id="msg"></p>
                </div>
            </div>

            <!-- Reviews -->
            <div class="row mt-5">
                <h3>Product Reviews</h3>
                <div class="ms-4 mt-2 review">
                    <h4>Ronrix Lante</h4>
                    <h5 class="fs-6 text-dark">March 20, 2021</h5>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <p>Hi this is really good!</p>
                    <a href="" id="reply">reply</a>

                    <div class="replies mt-2 ms-4 border-top">
                        <h4>Ronrix Lante</h4>
                        <p>Thank you!</p>
                    </div>

                    <form action="" id="reply-form">
                        <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash("hash") ?>">
                        <textarea name="" class="form-control"></textarea>
                        <input type="submit" value="Reply" class="btn btn-secondary my-2">
                    </form>
                </div>
                <form action="" class="mt-3">
                    <h3>Leava a review</h3>
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash("hash") ?>">
                    <textarea name="review" class="form-control"></textarea>
                    <input type="submit" class="btn btn-success mt-2" value="Post">
                </form>
            </div>

            <!-- Similar products -->
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
    </div>
</body>
</html>