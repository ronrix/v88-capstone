	
		   <!-- payment modal -->
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
	                        </form>
	                    </div>
	                    <div class="modal-footer">
	                        <button type="button" class="btn" data-bs-dismiss="modal">Cancel</button>
	                        <button type="button" class="btn">Pay</button>
	                    </div>
	                </div>
	            </div>
	        </div>