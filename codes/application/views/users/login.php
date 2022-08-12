<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Shopah | Login</title>
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
		<link rel="stylesheet/less" type="text/css" href="<?= base_url("assets/css/pages/login.less") ?>" />
        <!-- -----------LESS-------------------->
		<script src="https://cdn.jsdelivr.net/npm/less@4"></script>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<section class="col-xs-12 col-sm-5 col-md-4 form">
			        <!-- ------------------Error Indicator-------->
					<div class="alert alert-danger">
						<p>Error1</p>
						<p>Error1</p>
						<p>Error1</p>
					</div>
			        <!-- ---------------------------Login Form-------------------------------->
					<form action="../Products/home.html" method="post" class="login">
						<h1>Shopah</h1>
						<div class="form-floating mb-3">
							<input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
							<label for="floatingInput">Email address</label>
						</div>
						<div class="form-floating">
							<input type="password" class="form-control" id="floatingPassword" placeholder="Password">
							<label for="floatingPassword">Password</label>
						</div>
						<input type="submit" class="btn mt-3 w-100" value="login">
						<p class="lead text-center mt-2">Don't have account yet? <a href="register">Register</a></p>
					</form>
				</section>
				<!----------------------- Design Here ------------------------>
				<section class="col-sm-0 col-md-auto"></section>
			</div>
        </div>
	</body>
</html>