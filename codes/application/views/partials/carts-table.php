<?php
	if($carts) {
		foreach($carts as $cart) { 
			$new = json_decode($cart["product"])?>
					<tr>
						<td scope="row"><?= $new->item ?></td>
						<td><?= $new->price ?></td>
						<td class="col-3">
							<div class="d-flex">
								<form action="/update_cart" method="POST" id="update-cart">
									<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash("hash") ?>">
									<input type="hidden" name="cart_id" value="<?= $cart["id"] ?>">
									<input type="hidden" name="admin_id" value="<?= $new->admin_id ?>">
									<input type="number" name="quantity" id="cart-quantity" class="border-0" value="<?= $new->quantity ?>" />
								</form>
								<form action="/delete_cart" method="POST" id="delete-cart">
									<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash("hash") ?>">
									<input type="hidden" name="admin_id" value="<?= $new->admin_id ?>">
									<input type="hidden" name="cart_id" value="<?= $cart["id"] ?>">
									<i class="ms-3 text-danger bi bi-trash3-fill" data-bs-toggle="modal" data-bs-target="#delete-modal" class="nav-link d-inline-block"></i>
								</form>
							</div>
						</td>
						<td><?= $new->price * $new->quantity ?></td>
					</tr>
<?php 
		}?>
<?php
	} 
	else { ?>
			<div class="alert alert-danger">No carts!</div>
<?php }?>