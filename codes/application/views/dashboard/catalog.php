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
    <link rel="stylesheet/less" type="text/css" href="assets/css/index.less">
    <link rel="stylesheet/less" type="text/css" href="assets/css/pages/homepage.less">
    <!-- less library -->
    <script src="https://cdn.jsdelivr.net/npm/less@4" ></script>
</head>
<body>
    <div class="container-fluid">
        <?php $this->load->view("partials/header", $user) ?>
        <!---------------------Main Container-------------------->
        <div class="row">
            <!---------------------Side Nav-------------------->
            <div class="col col-3 filter p-5">
                <form action="/search" method="post" class="row gy-1 mt-5 ">
                    <input class="col-12 mt-3 form-control" type="text" placeholder="Search" name="search">
                    <p class="fw-bold m-0 mb-2 mt-3">Categories</p>
                    <a href="#" class="col-12 text-decoration-none">Keyboards</a>
                    <a href="#" class="col-12 text-decoration-none">Mouse</a>
                    <a href="#" class="col-12 text-decoration-none">Monitor</a>
                    <a href="#" class="col-12 text-decoration-none">Keyboards</a>
                    <a href="#" class="col-12 text-decoration-none">Show more</a>
                </form>
            </div>
            <div class="col mt-5">
                <h2 class="fw-bold">Products</h2>
                <div class="d-flex">
                    <div class="card m-2" style="width: 18rem;">
                        <a href="/products/show/6">
                            <img src="assets/images/s1.jpg" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>                                
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
                            <img src="assets/images/s1.jpg" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>                                
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <p>Price: $1000</p>
                        </div>
                    </div>
                </div>
                <!---------------------Pagination-------------------->
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            </div>

        </div>
    </div>
</body>
</html>