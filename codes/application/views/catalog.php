<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalog Page | Dojo</title>
     <!--Jquery library-->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- bootstrap library-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- font awesome library-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- main style -->
    <link rel="stylesheet/less" type="text/css" href="<?= base_url("assets/css/index.less")?>" >
    <link rel="stylesheet/less" type="text/css" href="<?= base_url("assets/css/pages/homepage.less") ?>" >
    <!-- less library -->
    <script src="https://cdn.jsdelivr.net/npm/less@4" ></script>
    <!-- main script -->
    <script src="<?= base_url("assets/js/catalog.js") ?>"></script>
</head>
<body>
    <div class="container-fluid">
        <!-- header -->
        <?php $this->load->view("partials/header") ?>
        
        <!---------------------Main Container-------------------->
        <div class="row">
            <!---------------------Side Nav-------------------->
            <div class="col-sm-12 col-md-3 filter p-5">
                <form action="/search" method="post" class="gy-1 mt-5 d-none d-md-block">
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash("hash") ?>">
                    <div class="d-flex align-items-center justify-content-between">
                        <input class="form-control" type="search" placeholder="Search" name="search">
                        <button type="submit" class="btn">
                            <i class="bi bi-search fw-bold"></i>
                        </button>
                    </div>
                    <p class="fw-bold m-0 mb-2 mt-3">Categories</p>
                    <div id="categories">
<?php 
	foreach($categories as $category) { ?>
                        <a href="" data-href="/category/<?= $category["id"]?>" class="text-capitalize d-block text-decoration-none category"><?= $category["category"] ?>(<?= $category["products_count"] ?>)</a>
<?php 
	} ?>
                    </div>
                    <a href="" id="show-all" class="d-block text-decoration-none fw-bold mt-2 fst-italic">Show All</a>
                </form>
                <form action="" class="d-block d-md-none col-12 d-flex">
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash("hash") ?>">
                    <div class="col">
                        <input type="text" name="min_price" class="form-control" placeholder="$min">
                    </div>-
                    <div class="col">
                        <input type="text" name="max_price" class="form-control" placeholder="$max">
                    </div>
                    <div class="col">
                        <select class="form-select" name="order_by_price" aria-label="Default select example">
                            <option value="1">Low to High Price</option>
                            <option value="2">High to Low Price</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="col mt-5 pe-5">
                <div class="row">
                    <h2 class="col fw-bold text-capitalize" id="category-title">All Products </h2>
                    <div class="col text-end">
                        <a href="">first</a>| <a href="">prev</a>|<a href="">2</a>| <a href="">next</a>
                    </div>
                </div>
                <form action="/sort_by_price" method="POST" class="row d-flex justify-content-end">
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash("hash") ?>">
                    <select id="sort-by" name="sort_by_price" class="form-select w-auto" aria-label="Default select example">
                        <option selected value="0">Low Price</option>
                        <option value="1">High Price</option>
                    </select>
                </form>
                <div class="d-flex flex-wrap" id="products">
<?php
	foreach($products as $product) { 
        $img = json_decode($product["images_path"], true); ?>
					<div class="card m-2" style="width: 18rem;">
                        <a href="/product/show/<?= $product["id"] ?>" class="border" id="thumbnail">
                            <img src="<?= base_url("{$img[0]}")?>" class="card-img-top" alt="...">
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
                
                <!---------------------Pagination-------------------->
                <?php $this->load->view("partials/pagination") ?>
              
            </div>

        </div>
    </div>
</body>
</html>