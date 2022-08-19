<?php
    if($orders) { 
        foreach($orders as $data) {
            $data["product_lists"] = json_decode($data["product_lists"], true);
            $data["billing_info"] = json_decode($data["billing_info"], true); ?>
                        <tr>
                            <td><a href="/products/orders/show/<?= $data["id"] ?>" class="nav-link"><?= $data["id"] ?></a></td>
                            <td><?= $data["billing_info"]["first_name"] ?></td>
                            <td><?= $data["date"] ?></td>
                            <td><?= $data["billing_info"]["address"] . " " . $data["billing_info"]["address_1"]?></td>
                            <td>$<?= $data["product_lists"]["total"] ?></td>
                            <td>
                                <form action="/update_order" method="POST">
                                    <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash("hash") ?>">
                                    <input type="hidden" name="order_id" value="<?= $data["id"] ?>">
                                    <select name="order_status" class="form-select form-select-lg mb-3 fs-6" aria-label=".form-select-lg example">
                                        <option <?= $data["order_status"] == "Order on process" ? "selected" : "" ?> value="1">Order in process</option>
                                        <option <?= $data["order_status"] == "Shipped" ? "selected" : "" ?> value="2">Shipped</option>
                                        <option  <?= $data["order_status"] == "Cancelled" ? "selected" : "" ?> value="3">Cancelled</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
<?php 
        }
    }
 ?>