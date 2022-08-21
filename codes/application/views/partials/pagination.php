  <!---------------------Pagination-------------------->
				<nav aria-label="Page navigation example">
                    <ul class="pagination">
<?php 
    if(abs($pagination_count) > 1) { ?>
                        <li class="page-item"><a class="page-link" href="">Previous</a></li>

<?php 
        for($i=1; $i <= abs($pagination_count); $i++) {?>
                        <li class="page-item" data-id="<?= $i ?>"><a class="page-link" href="#"><?= $i ?></a></li>
<?php   } ?>
                        
                        <li class="page-item"><a class="page-link" href="">Next</a></li>
<?php } ?>
                    </ul>
                </nav>