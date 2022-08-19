			<!-- Catalog Product -->
<?php
	foreach($products as $product) { 
        $img = json_decode($product["images_path"], true); ?>
					<div class="card m-2" style="width: 18rem;">
                        <a href="/product/show/<?= $product["id"] ?>" class="border" id="thumbnail">
                            <img src="<?= base_url("{$img[0]}")?>" class="card-img-top" alt="<?= base_url("{$img[0]}")?>">
                        </a>
                        <div class="card-body">
                            <p class="card-text"><?= $product["product_name"] ?></p>                                
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <p>Price: $<?= $product["price"] ?></p>
                        </div>
                    </div>
<?php } ?>