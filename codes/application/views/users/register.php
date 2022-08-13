<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Shopah | Register</title>
        <!-- -----------Google Fonts------------>
		<link rel="preconnect" href="https://fonts.googleapis.com" />
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;500;900&display=swap" rel="stylesheet" />
        <!-- -----------Fonts Awesome----------->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
        <!-- -----------Jquery--------->
		<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <!-- -----------Bootstrap--------------->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<!-- -----------Stylesheet-------------->
		<link rel="stylesheet/less" type="text/css" href="<?= base_url("assets/css/index.less") ?>" />
		<link rel="stylesheet/less" type="text/css" href="<?= base_url("assets/css/pages/authentication.less") ?>" />
        <!-- -----------LESS-------------------->
		<script src="https://cdn.jsdelivr.net/npm/less@4"></script>
		<!-- scripts -->
		<script type="text/javascript" src="<?= base_url("assets/js/users/index.js") ?>"></script>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row overflow-hidden">
				<section class="col-xs-12 col-sm-5 col-md-4 form">

			        <!-- ---------------------------Login Form-------------------------------->
					<form action="/process_register" method="post" class="register">
						<h1>SHOPAH</h1>
				        <!-- ------------------Error Indicator-------->
<?php if($this->session->flashdata("errors")) { ?>
						<div class="alert alert-danger"><?= $this->session->flashdata("errors") ?></div>
<?php } ?>
						<h2>Register</h2>
						<div class="form-floating mb-3">
							<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash("hash") ?>">
							<input type="text" class="form-control" name="first_name" id="floatingInput" placeholder="first name" required>
							<label for="floatingInput">First name</label>
						</div>
						<div class="form-floating mb-3">
							<input type="text" class="form-control" name="last_name" id="floatingInput" placeholder="last name" required>
							<label for="floatingInput">Last name</label>
						</div>
						<div class="form-floating mb-3">
							<input type="email" class="form-control" name="email_address" id="floatingInput" placeholder="email address" required>
							<label for="floatingInput">Email address</label>
						</div>
						<div class="form-floating mb-3">
							<input type="text" class="form-control" name="contact_number" id="floatingInput" placeholder="contact number" required>
							<label for="floatingInput">Contact number</label>
						</div>
						<div class="form-floating mb-3">
							<select name="role" class="form-select" id="floatingSelectGrid" aria-label="Floating label select example">
								<option selected value="0">Buyer</option>
								<option value="1">Seller</option>
							</select>
							<label for="floatingSelectGrid">Role</label>
						</div>
						<div class="form-floating mb-3">
							<input type="password" name="password" class="form-control" id="floatingPassword" placeholder="password" required>
							<label for="floatingPassword">Password</label>
						</div>
						<div class="form-floating mb-3">
							<input type="password" class="form-control" name="confirm_password" id="floatingPassword" placeholder="confirm password" required>
							<label for="floatingPassword">Confirmm Password</label>
						</div>
						<input type="submit" class="btn w-100" value="Register">
						<p class="lead text-center mt-2">Already have an account? <a href="/">Login</a></p>
					</form>
				</section>
				<!----------------------- Design Here ------------------------>
				<section class="col-xs-0 col-sm-7 col-md-8 landpage overflow-hidden">
					<h3>Get items fast with shopah.</h3>
					<p>Buy amazing and authentic products from best sellers.</p>
					<img src="<?= base_url("assets/images/img1.png") ?>" alt="icon 1" class="img-1" >
					<img src="<?= base_url("assets/images/img2.png") ?>" alt="icon 2" class="img-2">
					<div class="box"></div>
					<div class="circle circle-1"></div>
					<div class="circle circle-2"></div>
					<div class="circle circle-3"></div>
				</section>
        </div>
	</body>
</html>
