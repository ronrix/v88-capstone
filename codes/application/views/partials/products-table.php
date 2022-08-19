<?php 
    foreach($products as $product) {  
        $img_path = json_decode($product["images_path"], true); ?>
                        <tr>
                            <td scope="row"><img class="w-100" src="<?= base_url("{$img_path["1"]}") ?>"></dh>
                            <td><?= $product["id"] ?></td>
                            <td><?= $product["product_name"] ?></td>
                            <td><?= $product["inventory_count"] ?></td>
                            <td><?= $product["quantity_sold"] ?></td>
                            <td>
                                <a href="" data-bs-toggle="modal" data-href="/update_product/<?= $product["id"] ?>" data-bs-target="#edit-modal" class="nav-link d-inline-block" id="update">Edit</a>
                                <a href="" data-bs-toggle="modal" data-href="/delete_product/<?= $product["id"] ?>" data-bs-target="#delete-modal" class="nav-link d-inline-block" id="delete">Remove</a>
                            </td>
                        </tr>
<?php } ?>