        <!---------------------Navigation-------------------->
        <header class="row py-2">
            <a class="col-xs-12 col-md-3 d-flex justify-content-center align-items-center text-decoration-none" href="/">
                <h1>DO<span>JO</span></h1> eCommerce
            </a>
            <form class="col-xs-12 d-flex align-items-center col-md-5 p-0 px-2 search" action="" method="POST">
                <i class="bi bi-search"></i>
                <input class="col-11 ms-2" type="search" name="search_input" placeholder="search">
            </form>
            <div class="col-xs-12 col-md-3 align-self-center d-flex justify-content-between align-items-center">
                <div class="col d-flex justify-content-around align-items-center">
                    <a href="/home">Home</a>
                    <a href="/catalog">Catalog</a>
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $name ?>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item text-dark" href="/profile">
                                    <i class="bi bi-person"></i>
                                    Profile
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item text-dark" href="/logout">
                                    <i class="bi bi-box-arrow-right"></i>
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="text-center cart col-2">
                    <a href="/cart" class="text-light w-100">
                        <i class="bi bi-cart-fill"></i>
                        <div class="cart-count "><?= $cart_count ?></div>
                    </a>
                </div>
                  <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Shopah eCommerce</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <a href="/register" class="btn d-block mb-3">
                                    <i class="bi bi-person-plus-fill"></i>
                                    Create an account
                                </a>
                                <a href="/login" class="btn d-block">
                                    <i class="bi bi-person"></i>
                                    Sign in
                                </a>
                            </div>
                            <div class="modal-footer">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
