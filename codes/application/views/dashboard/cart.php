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
    <link rel="stylesheet/less" type="text/css" href="<?= base_url("assets/css/pages/cart.less") ?>">
    <!-- less library -->
    <script src="https://cdn.jsdelivr.net/npm/less@4" ></script>
    <!-- main script -->
</head>
<body>
    <div class="container-fluid">
        <?php $this->load->view("partials/header", $user) ?>

		<div class="container">
			<table class="table table-striped mt-5 overflow-scroll h">
				<thead>
					<tr>
						<th scope="col">Item</th>
						<th scope="col">Price</th>
						<th scope="col">Quantity</th>
						<th scope="col">Total</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row">product 1</th>
						<td>$20</td>
						<td>20</td>
						<td>400</td>
					</tr>
					<tr>
						<th scope="row">product 1</th>
						<td>$20</td>
						<td>20</td>
						<td>400</td>
					</tr>
					<tr>
						<th scope="row">product 1</th>
						<td>$20</td>
						<td>20</td>
						<td>400</td>
					</tr>
				</tbody>
			</table>
			<p class="muted fw-bold">Total: $49.50</p>
			<a href="" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#billout">
				<i class="bi bi-wallet2"></i>
				Bill out
			</a>
			<a href="/products" class="d-block mt-2">
				<i class="bi bi-caret-right-fill"></i>
				Continue Shopping
			</a>

			<!-- Bill out modal -->
			<?php $this->load->view("partials/payment-form.php") ?>
			
		</div>
    </div>
</body>
</html>