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
    <link rel="stylesheet/less" type="text/css" href="<?= base_url("assets/css/pages/cart.less")?>">
    <!-- less library -->
    <script src="https://cdn.jsdelivr.net/npm/less@4" ></script>
    <!-- main script -->
	<script src="<?= base_url("assets/js/stripe.js") ?>"></script>
	<script src="<?= base_url("assets/js/cart.js") ?>"></script>
</head>
<body>
    <div class="container-fluid">  
    	<!-- header -->
		<?php $this->load->view("partials/header") ?>

		<!-- toast -->
		<button type="button" class="btn btn-primary d-none" id="liveToastBtn"></button>

		<div class="toast-container position-fixed bottom-0 end-0 p-3">
			<div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
				<div class="toast-header">
					<img src="..." class="rounded me-2" alt="...">
					<strong class="me-auto">SUCCESS</strong>
					<small>checkout</small>
					<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
				</div>
				<div class="toast-body">
					Thank you for purchasing.
				</div>
			</div>
		</div>
		
		<div class="container">
			<div class="alert"></div>
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
<?php
	if($carts) {
		foreach($carts as $cart) { 
			$new = json_decode($cart["product"])?>
					<tr>
						<td scope="row"><?= $new->item ?></td>
						<td>$<?= $new->price ?></td>
						<td class="col-3">
							<div class="d-flex">
								<form action="/update_cart" method="POST" id="update-cart">
									<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash("hash") ?>">
									<input type="hidden" name="cart_id" value="<?= $cart["id"] ?>">
									<input type="hidden" name="admin_id" value="<?= $new->admin_id ?>">
									<input type="number" min="1" name="quantity" id="cart-quantity" class="border-0" value="<?= $new->quantity ?>" />
								</form>
								<form action="/delete_cart" method="POST" id="delete-cart">
									<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash("hash") ?>">
									<input type="hidden" name="admin_id" value="<?= $new->admin_id ?>">
									<input type="hidden" name="cart_id" value="<?= $cart["id"] ?>">
									<i class="ms-3 text-danger bi bi-trash3-fill" data-bs-toggle="modal" data-bs-target="#delete-modal" class="nav-link d-inline-block"></i>
								</form>
							</div>
						</td>
						<td>$<?= $new->price * $new->quantity ?></td>
					</tr>
<?php 
		}?>
<?php
	} 
	else { ?>
			<div class="alert alert-danger">No carts!</div>
<?php }?>
				</tbody>
			</table>

			<div class="row text-end">
				<p class="muted fw-bold">Sub Total: $<span id="total"><?= $total ?></span></p>
				<p class="muted fw-bold">Total: $<span id="total"><?= $total + 100 ?></span></p>
				<a href="/catalog" class="d-block w-auto mt-2 mb-4">
					<i class="bi bi-caret-right-fill"></i>
					Continue Shopping
				</a>
			</div>

			<!-- ------------------------------------------Delete modal------------------------------------------------------------- -->
			<?php $this->load->view("partials/delete") ?>
			
		   <!-- checkout -->
		   <form action="/checkout" method="POST" class="w-50 mb-5">
				<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash("hash") ?>">
				<div class="col">
					<h2 class="fs-5">Shipping Information</h2>
					<div class="form-floating mb-3">
						<input type="text" name="fname" class="form-control" id="fname" placeholder="name@example.com" required>
						<label for="fname">First Name</label>
					</div>
					<div class="form-floating mb-3">
						<input type="text" name="lname" class="form-control" id="lname" placeholder="name@example.com" required>
						<label for="lname">Last Name</label>
					</div>
					<div class="form-floating mb-3">
						<input type="text" name="addr_1" class="form-control" id="addr_1" placeholder="name@example.com">
						<label for="addr_1">Address</label>
					</div>
					<div class="form-floating mb-3">
						<input type="text" name="addr_2" class="form-control" id="addr_2" placeholder="name@example.com" required>
						<label for="addr_2">Address 2</label>
					</div>
					<div class="row">
						<div class="form-floating mb-3 col-3 ps-2">
							<input type="text" name="city" class="form-control" id="city" placeholder="name@example.com" required>
							<label for="city">City</label>
						</div>
						<div class="form-floating mb-3 col-3 ps-2">
							<input type="text" name="state" class="form-control" id="state" placeholder="name@example.com" required>
							<label for="state">State</label>
						</div>
						<div class="form-floating mb-3 col-3 ps-2">
							<input type="text" name="zipcode" class="form-control" id="zipcode" placeholder="name@example.com" required>
							<label for="zipcode">Zipcode</label>
						</div>
					</div>
				</div>

				<div class="col">
					<h2 class="fs-5">Billing Information</h2>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" id="same-as-shipping">
						<label class="form-check-label" for="same-as-shipping">
						Same as Shipping
						</label>
					</div>
					<div class="form-floating mb-3">
						<input type="text" name="fname_b" class="form-control" id="fname_b" placeholder="name@example.com" required>
						<label for="fname_b">First Name</label>
					</div>
					<div class="form-floating mb-3">
						<input type="text" name="lname_b" class="form-control" id="lname_b" placeholder="name@example.com" required>
						<label for="lname_b">Last Name</label>
					</div>
					<div class="form-floating mb-3">
						<input type="text" name="addr_1_b" class="form-control" id="addr_1_b" placeholder="name@example.com" required>
						<label for="addr_1_b">Address</label>
					</div>
					<div class="form-floating mb-3">
						<input type="text" name="addr_2_b" class="form-control" id="addr_2_b" placeholder="name@example.com" required>
						<label for="addr_2_b">Address 2</label>
					</div>
					<div class="row">
						<div class="form-floating mb-3 col-3 ps-2">
							<input type="text" name="city_b" class="form-control" id="city_b" placeholder="name@example.com" required>
							<label for="city_b">City</label>
						</div>
						<div class="form-floating mb-3 col-3 ps-2">
							<input type="text" name="state_b" class="form-control" id="state_b" placeholder="name@example.com" required>
							<label for="state_b">State</label>
						</div>
						<div class="form-floating mb-3 col-3 ps-2">
							<input type="text" name="zipcode_b" class="form-control" id="zipcode_b" placeholder="name@example.com" required>
							<label for="zipcode_b">Zipcode</label>
						</div>
					</div>
					<div class="form-floating mb-3">
						<input type="text" name="card" class="form-control" id="card" placeholder="name@example.com" required>
						<label for="card">Card</label>
					</div>
					<div class="form-floating mb-3">
						<input type="text" name="security_code" class="form-control" id="scode" placeholder="name@example.com" required>
						<label for="scode">Security Code</label>
					</div>
					<div class="row">
						<h3 class="fs-5">Expiration: </h3>
						<div class="form-floating mb-3 col-3 ps-2">
							<input type="text" name="month" class="form-control" id="month" placeholder="name@example.com" required>
							<label for="month">(MM)</label>
						</div>
						<div class="form-floating mb-3 col-3 ps-2">
							<input type="text" name="year" class="form-control" id="year" placeholder="name@example.com" required>
							<label for="year">(YYYY)</label>
						</div>
					</div>
				</div>
				<input type="submit" class="btn" value="Checkout" >
			</form>
	        
		</div>
    </div>

	<!-- Stripe JavaScript library -->
	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

</body>
</html>