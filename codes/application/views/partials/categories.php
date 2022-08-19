<!-- Categories -->
<?php 
	foreach($categories as $category) { ?>
                    <a href="" data-href="/category/<?= $category["id"]?>" class="d-block text-decoration-none category"><?= $category["category"] ?></a>
<?php 
	} ?>