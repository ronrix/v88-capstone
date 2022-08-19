<!-- ADD NEW -->
				<form action="/products/add" method="POST" enctype='multipart/form-data' id="add">
                    <input type="hidden" id="csrf" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash('hash') ?>">
                    <div class="modal fade" id="add-new-modal" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Add new product</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!------Upadte/add input field-------->
                                    <div class="mb-1">
                                        <label for="name" class="form-label">Product Name</label>
                                        <input type="text" required class="form-control" id="name" name="product_name" />
                                    </div>

                                    <div class="mb-2">
                                        <label for="Description" class="form-label">Description</label>
                                        <textarea class="form-control" required id="Description" name="description" rows="3"></textarea>
                                    </div>

                                    <div class="row">
                                        <div class="mb-1 col-6">
                                            <label for="stocks" class="form-label">Inventory</label>
                                            <input type="number" required class="form-control" id="stocks" name="inventory_count" />
                                        </div>

                                        <div class="mb-1 col-6">
                                            <label for="price" class="form-label">Price</label>
                                            <input type="number" required class="form-control" id="price" name="price" />
                                        </div>
                                        <!------Category Dropdown-------->
                                        <div class="col my-2">
                                            <label for="category-btn">Category</label>
                                            <input type="hidden" name="category">
                                            <input type="text" readonly id="category-btn" class="text-left btn w-100" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" >
                                        </div>
                                        <div class="collapse" id="collapseExample">
                                            <div class="card card-body">
<?php 
    foreach($categories as $category) { ?>
                                                <div class="d-flex justify-content-between align-items-center category-lists cursor-pointer">
                                                    <input type="text" id="category" name="" value="<?= $category["category"] ?>" class="w-100 border-0" readonly>
                                                    <input type="hidden" name="category_id" value="<?= $category["id"] ?>" id="category_id">
                                                    <div class="d-flex d-none">
                                                        <i class="bi bi-pencil-square mx-2"></i><i class="bi bi-trash3-fill"></i>
                                                    </div>
                                                </div>
<?php } ?>          
                                            </div>
                                        </div>
                                        
                                        <div class="my-2 col-12">
                                            <label for="add_new_categ" class="form-label">Add new category</label>
                                            <input type="text" class="form-control" id="add_new_categ" name="new_category" />
                                        </div>
                                        <!------Images-------->
                                        <div class="mb-4 col-12" id="imgs">
                                            <label for="add_new_categ" class="form-label">images</label>
                                            <input type="button" value="Upload image" class="btn" id="upload-btn">
                                            <input type="file" class="btn btn-success d-none" name="images[]" multiple />
                                        </div>
            
                                        <!-- upload image -->
                                        <div id="sortable"></div>
                                        
                                    </div>
                                </div>
                                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <input type="button" class="btn btn-primary" value="preview" id="preview"/>
                                    <input type="submit" class="btn" value="save" />
                                </div>

                            </div>
                        </div>
                    </div>
                </form>