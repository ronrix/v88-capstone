			<!-- Payment form -->
			<div class="modal fade" id="billout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title fw-bold" id="exampleModalLabel">Billing Out</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<form action="row" action="" method="POST">
								<div class="col">
									<h2 class="fs-5">Shipping Information</h2>
									<div class="form-floating mb-3">
										<input type="text" name="fname" class="form-control" id="floatingInput" placeholder="name@example.com">
										<label for="floatingInput">First Name</label>
									</div>
									<div class="form-floating mb-3">
										<input type="text" name="lname" class="form-control" id="floatingInput" placeholder="name@example.com">
										<label for="floatingInput">Las Name</label>
									</div>
									<div class="form-floating mb-3">
										<input type="text" name="addr_1" class="form-control" id="floatingInput" placeholder="name@example.com">
										<label for="floatingInput">Address</label>
									</div>
									<div class="form-floating mb-3">
										<input type="text" name="addr_2" class="form-control" id="floatingInput" placeholder="name@example.com">
										<label for="floatingInput">Address 2</label>
									</div>
									<div class="row">
										<div class="form-floating mb-3 col-3 ps-2">
											<input type="text" name="city" class="form-control" id="floatingInput" placeholder="name@example.com">
											<label for="floatingInput">City</label>
										</div>
										<div class="form-floating mb-3 col-3 ps-2">
											<input type="text" name="state" class="form-control" id="floatingInput" placeholder="name@example.com">
											<label for="floatingInput">State</label>
										</div>
										<div class="form-floating mb-3 col-3 ps-2">
											<input type="text" name="zipcode" class="form-control" id="floatingInput" placeholder="name@example.com">
											<label for="floatingInput">Zipcode</label>
										</div>
									</div>
								</div>

								<div class="col">
									<h2 class="fs-5">Billing Information</h2>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" value="" id="billing">
										<label class="form-check-label" for="billing">
										Same as Shipping
										</label>
									</div>
									<div class="form-floating mb-3">
										<input type="text" name="fname_b" class="form-control" id="floatingInput" placeholder="name@example.com">
										<label for="floatingInput">First Name</label>
									</div>
									<div class="form-floating mb-3">
										<input type="text" name="lname_b" class="form-control" id="floatingInput" placeholder="name@example.com">
										<label for="floatingInput">Las Name</label>
									</div>
									<div class="form-floating mb-3">
										<input type="text" name="addr_1_b" class="form-control" id="floatingInput" placeholder="name@example.com">
										<label for="floatingInput">Address</label>
									</div>
									<div class="form-floating mb-3">
										<input type="text" name="addr_2_b" class="form-control" id="floatingInput" placeholder="name@example.com">
										<label for="floatingInput">Address 2</label>
									</div>
									<div class="row">
										<div class="form-floating mb-3 col-3 ps-2">
											<input type="text" name="city" class="form-control" id="floatingInput" placeholder="name@example.com">
											<label for="floatingInput">City</label>
										</div>
										<div class="form-floating mb-3 col-3 ps-2">
											<input type="text" name="state" class="form-control" id="floatingInput" placeholder="name@example.com">
											<label for="floatingInput">State</label>
										</div>
										<div class="form-floating mb-3 col-3 ps-2">
											<input type="text" name="zipcode" class="form-control" id="floatingInput" placeholder="name@example.com">
											<label for="floatingInput">Zipcode</label>
										</div>
									</div>
									<div class="form-floating mb-3">
										<input type="text" name="card" class="form-control" id="floatingInput" placeholder="name@example.com">
										<label for="floatingInput">Card</label>
									</div>
									<div class="form-floating mb-3">
										<input type="text" name="card" class="form-control" id="floatingInput" placeholder="name@example.com">
										<label for="floatingInput">Security Code</label>
									</div>
									<div class="row">
										<h3 class="fs-5">Expiration: </h3>
										<div class="form-floating mb-3 col-3 ps-2">
											<input type="text" name="month" class="form-control" id="floatingInput" placeholder="name@example.com">
											<label for="floatingInput">(MM)</label>
										</div>
										<div class="form-floating mb-3 col-3 ps-2">
											<input type="text" name="year" class="form-control" id="floatingInput" placeholder="name@example.com">
											<label for="floatingInput">(YYYY)</label>
										</div>
									</div>
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn" data-bs-dismiss="modal">Cancel</button>
							<button type="button" class="btn">Pay</button>
						</div>
					</div>
				</div>
			</div>