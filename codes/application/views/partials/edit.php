<!-- EDIT product -->
                <form action="/products/edit_product" method="post">
                    <div class="modal fade" id="edit-modal" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Edit product</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!------Upadte/add input field-------->
                                    <input type="hidden" name="id" value="1" />
                                    <div class="mb-1">
                                        <label for="name" class="form-label">Product Name</label>
                                        <input type="text" required class="form-control" id="name" name="name" value="product name" />
                                    </div>

                                    <div class="mb-2">
                                        <label for="Description" class="form-label">Description</label>
                                        <textarea class="form-control" required id="Description" name="description" rows="3">111</textarea>
                                    </div>

                                    <div class="row">
                                        <div class="mb-1 col-6">
                                            <label for="stocks" class="form-label">Inventory</label>
                                            <input type="number" required class="form-control" id="stocks" name="stocks" value="10" />
                                        </div>

                                        <div class="mb-1 col-6">
                                            <label for="price" class="form-label">Price</label>
                                            <input type="number" required class="form-control" id="price" name="price" value="10" />
                                        </div>
                                        <!------Category Dropdown-------->
                                        <div class="mb-1 col-12 dropdown">
                                            <button class="btn btn-success dropdown-toggle w-100" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Category</button>
                                            <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton1">
                                                <li class="position-relative">
                                                    <a class="dropdown-item" href="#"><input class="w-75" type="text" /></a> <i class="bi bi-pencil-square"></i><i class="bi bi-trash3-fill"></i>
                                                </li>
                                                <li class="position-relative">
                                                    <a class="dropdown-item" href="#"><input class="w-75" type="text" /></a> <i class="bi bi-pencil-square"></i><i class="bi bi-trash3-fill"></i>
                                                </li>
                                                <li class="position-relative">
                                                    <a class="dropdown-item" href="#"><input class="w-75" type="text" /></a> <i class="bi bi-pencil-square"></i><i class="bi bi-trash3-fill"></i>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="mb-1 col-12">
                                            <label for="add_new_categ" class="form-label">Add new category</label>
                                            <input type="number" required class="form-control" id="add_new_categ" name="add_new_categ" value="10" />
                                        </div>
                                        <!------Images-------->
                                        <div class="mb-4 col-12">
                                            <label for="add_new_categ" class="form-label">images</label>
                                            <input type="button" value="upload Image" class="btn btn-success" />
                                        </div>
            
                                        <div class="row align-items-center">
                                            <i class="bi bi-list"></i>
                                            <div class="col-4">
                                                <div class="img_container">
                                                    <img src="<?= base_url("assets/images/s1.jpg") ?>" class="w-25" alt="mouse" />
                                                </div>
                                            </div>
                                            <p class="col-3">img.png</p>
                                            <i class="fas fa-trash col-1"></i>
                                            <input class="col-1" type="checkbox" />
                                            <p class="col-1 m-0 p-0">main</p>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <input type="button" class="btn btn-success" value="preview" />
                                    <input type="submit" class="btn btn-primary" value="update" />
                                </div>

                            </div>
                        </div>
                    </div>
                </form>