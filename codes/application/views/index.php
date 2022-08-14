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
    <link rel="stylesheet/less" type="text/css" href="assets/css/index.less">
    <link rel="stylesheet/less" type="text/css" href="assets/css/pages/homepage.less">
    <!-- less library -->
    <script src="https://cdn.jsdelivr.net/npm/less@4" ></script>
</head>
<body>
    <div class="container-fluid">
        <?php $this->load->view("partials/header", $user) ?>
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
                                <form>
                                    <input type="submit" value="Buy" class="btn btn-success">
                                </form>
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
                                <form>
                                    <input type="submit" value="Buy" class="btn btn-success">
                                </form>
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
                                <form>
                                    <input type="submit" value="Buy" class="btn btn-success">
                                </form>
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
            <div class="card mx-auto m-md-2" style="width: 18rem;">
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
            <div class="card mx-auto m-md-2" style="width: 18rem;">
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
            <div class="card mx-auto m-md-2" style="width: 18rem;">
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
            <div class="card mx-auto m-md-2" style="width: 18rem;">
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
            <div class="card mx-auto m-md-2" style="width: 18rem;">
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
            <div class="card mx-auto m-md-2" style="width: 18rem;">
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
            <div class="card mx-auto m-md-2" style="width: 18rem;">
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
   </div>
</body>
</html>