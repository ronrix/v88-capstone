<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Order</title>
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
    </head>
    <body>
        <div class="container-fluid p-0">
             <nav class="navbar navbar-expand-lg bg-light px-4 justify-content-between">
                <div class="d-flex align-items-center">
                    <h1>Dashboard</h1>
                    <a href="/dashboard/orders" class="nav-link">Orders</a>
                    <a href="/dashboard/products" class="nav-link">Products</a>
                </div>
                <a href="logout" class="nav-link">logout</a>
            </nav>
            <div class="container">
                <div class="row">
                    <div class="col-5">
                        <h2 class="fw-bold">ORDER ID: <?= $order["id"] ?></h2>
                        <h3 class="mt-2">Customer shipping info:</h3>
                        <p>name: <?= $order["shipping_info"]["first_name"] ?></p>
                        <p>address: <?= $order["shipping_info"]["address"] . " " . $order["shipping_info"]["address_1"] ?></p>
                        <p>city: <?= $order["shipping_info"]["city"] ?></p>
                        <p>state: <?= $order["shipping_info"]["state"] ?></p>
                        <p>zip: <?= $order["shipping_info"]["zipcode"] ?></p>

                        <h3 class="mt-2">Customer shipping info:</h3>
                        <p>name: <?= $order["billing_info"]["first_name"] ?></p>
                        <p>address: <?= $order["billing_info"]["address"] . " " . $order["billing_info"]["address_1"] ?></p>
                        <p>city: <?= $order["billing_info"]["city"] ?></p>
                        <p>state: <?= $order["billing_info"]["state"] ?></p>
                        <p>zip: <?= $order["billing_info"]["zipcode"] ?></p>
                        
                    </div>
                    <div class="col">
                        <table class="col h-25 table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Order ID</th>
                                    <th scope="col">Item</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
<?php 
    foreach(array($order["product_lists"]) as $product) { ?>
                                <tr>
                                    <td><?= $order["id"] ?></td>
                                    <td><?= $product["item"] ?></td>
                                    <td><?= $product["price"] ?></td>
                                    <td><?= $product["quantity"] ?></td>
                                    <td><?= $product["total"] ?></td>
                                </tr>
<?php } ?>
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-around align-items-center">
                            <p class="lead p-2 bg-success text-light">Status: <?= $order["order_status"] ?></p>
                            <div class="border p-5 fw-bold">
                                <p>Sub total: $0 ?></p>
                                <p>Shipping Fee: $10</p>
                                <p>Sub total: $50</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
