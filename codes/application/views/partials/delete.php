 <!-- ------------------------------------------Delete modal------------------------------------------------------------- -->
				<!-- <form action="/products/delete_product" method="post"> -->
                    <div class="modal fade" id="delete-modal" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Delete product</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="id" value="1" />
                                    <p>Are you sure you want to delete this product?</p>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="close">Close</button>
                                    <input type="button" class="btn btn-danger" value="delete" id="delete" />
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- </form> -->