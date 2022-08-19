<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Orders</title>
        <!--Google fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;500;900&display=swap" rel="stylesheet" />
        <!--Jquery library-->
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <!-- bootstrap library-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <!-- font awesome library-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <!-- main style -->
        <link rel="stylesheet/less" type="text/css" href="<?= base_url("assets/css/index.less") ?>" />
        <link rel="stylesheet/less" type="text/css" href="<?= base_url("assets/css/pages/dashboard.less") ?>" />
        <link rel="stylesheet/less" type="text/css" href="<?= base_url("assets/css/components/tables.less") ?>" />
        <!-- less library -->
        <script src="https://cdn.jsdelivr.net/npm/less@4"></script>
        <!-- main script -->
        <script src="<?= base_url("assets/js/order.js") ?>"></script>
    </head>
    <body>
        <div class="container-fluid p-0">
             <nav class="navbar navbar-expand-lg bg-light px-4 justify-content-between">
                <div class="d-flex align-items-center">
                    <h1>Dashboard</h1>
                    <a href="/dashboard/orders" class="nav-link">Orders</a>
                    <a href="/dashboard/products" class="nav-link">Products</a>
                </div>
                <a href="/logout" class="nav-link">logout</a>
            </nav>
            <div class="container">
                <form action="/filter_orders" class="d-flex justify-content-between my-3" id="filter">
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash("hash") ?>">
                    <div class="align-items-center border-bottom">
                        <i class="bi bi-search fs-3"></i>
                        <input type="search" name="search" class="m-0 ms-2 border-0 p-3" placeholder="search">
                    </div>
                    <select name="order_status" class="form-select form-select-lg mb-3 w-25 fs-6" aria-label=".form-select-lg example">
                        <option selected value="0">Show All</option>
                        <option value="1">Order in process</option>
                        <option value="2">Shipped</option>
                        <option value="3">Cancelled</option>
                    </select>
                </form>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Order ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Date</th>
                            <th scope="col">Billing Address</th>
                            <th scope="col">Total</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <!---------------------Pagination-------------------->
				<?php $this->load->view("partials/pagination") ?>

            </div>
        </div>
    </body>
</html>
