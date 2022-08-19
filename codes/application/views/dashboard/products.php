<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Products | Dojo</title>
        <!--Google fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;500;900&display=swap" rel="stylesheet" />
        <!--Jquery library-->
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
        <!-- bootstrap library-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <!-- font awesome library-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <!-- main style -->
        <link rel="stylesheet/less" type="text/css" href="<?= base_url("assets/css/index.less") ?>" />
        <link rel="stylesheet/less" type="text/css" href="<?= base_url("assets/css/pages/dashboard.less") ?>" />
        <link rel="stylesheet/less" type="text/css" href="<?= base_url("assets/css/components/tables.less" ) ?>" />
        <!-- less library -->
        <script src="https://cdn.jsdelivr.net/npm/less@4"></script>
        <!-- main scripts -->
        <script type="text/javascript" src="<?= base_url("assets/js/add-modal.js") ?>"></script>
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
                <form action="" class="d-flex justify-content-between my-3">
                    <div class="align-items-center border-bottom">
                        <i class="bi bi-search fs-3"></i>
                        <input type="search" name="search" class="m-0 ms-2 border-0 p-3" placeholder="search">
                    </div>
                    <a class="btn align-self-center" href="" data-bs-toggle="modal" data-bs-target="#add-new-modal">Add new product</a>
                </form>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Picture</th>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Inventory Count</th>
                            <th scope="col">Quantity Sold</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
<?php 
    foreach($products as  $product) {  
        $img_path = json_decode($product["images_path"], true); ?>
                        <tr>
                            <td scope="row"><img class="w-100" src="<?= base_url("{$img_path[0]}") ?>"></dh>
                            <td><?= $product["id"] ?></td>
                            <td><?= $product["product_name"] ?></td>
                            <td><?= $product["inventory_count"] ?></td>
                            <td><?= $product["quantity_sold"] ?></td>
                            <td>
                                <a href="" data-bs-toggle="modal" data-id="<?= $product["id"] ?>" data-bs-target="#edit-modal" class="nav-link d-inline-block" id="update">Edit</a>
                                <form action="/delete_product" id="delete-form" method="POST">
                                    <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash("hash") ?>">
                                    <input type="hidden" name="product_id" value="<?= $product["id"] ?>">
                                    <a href="" data-bs-toggle="modal" data-bs-target="#delete-modal" class="nav-link d-inline-block" id="delete">Remove</a>
                                </form>
                            </td>
                        </tr>
<?php } ?>
                    </tbody>
                </table>
                <!---------------------Pagination-------------------->
                <?php $this->load->view("partials/pagination") ?>

                <!-- ------------------------------------------Delete modal------------------------------------------------------------- -->
				<?php $this->load->view("partials/delete") ?>

                 <!------ ADD new MODAL--- -->
                <?php $this->load->view("partials/add") ?>

                 <!------ EDIT MODAL--- -->
				 <?php $this->load->view("partials/edit") ?>

            </div>
        </div>
    </body>
</html>
