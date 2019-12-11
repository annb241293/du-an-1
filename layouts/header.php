<header>
    <?php
    $loai = 'SELECT * FROM loai';
    $loai = executeQuery($loai, true);

    $totalItemOnCart = 0;
    $totalPrice = 0;

    if (isset($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];
        foreach ($cart as $item) {
            $totalItemOnCart += $item['quantity'];
            $totalPrice += $item['price'] * $item['quantity'];
        }
    }

    ?>

    <!-- Begin Header Middle Area -->
    <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
        <div class="container">
            <div class="row">
                <!-- Begin Header Logo Area -->
                <div class="col-lg-3">
                    <div class="logo pb-sm-30 pb-xs-30">
                        <a href="index.html">
                            <img src="images/menu/logo/1.jpg" alt="">
                        </a>
                    </div>
                </div>
                <!-- Header Logo Area End Here -->
                <!-- Begin Header Middle Right Area -->
                <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15">
                    <!-- Begin Header Middle Searchbox Area -->
                    <form action="<?=BASE_URL.'search'?>" class="hm-searchbox" method="get">
                        <input type="text" placeholder="Enter your search key ..." name="keyword">
                        <button class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                    </form>
                    <!-- Header Middle Searchbox Area End Here -->
                    <!-- Begin Header Middle Right Area -->
                    <div class="header-middle-right">
                        <ul class="hm-menu">
                            <!-- Begin Header Middle Wishlist Area -->
                            <li class="hm-wishlist">
                                <a href="wishlist.html">
                                    <span class="cart-item-count wishlist-item-count">0</span>
                                    <i class="fa fa-heart-o"></i>
                                </a>
                            </li>
                            <!-- Header Middle Wishlist Area End Here -->
                            <!-- Begin Header Mini Cart Area -->
                            <li class="hm-minicart">
                                <div class="hm-minicart-trigger">
                                    <span class="item-icon"></span>
                                    <span class="item-text"><?=number_format($totalPrice, 0, '', '.')?> VND
                                        <span class="cart-item-count"><?= $totalItemOnCart ?></span>
                                    </span>
                                </div>
                                <span></span>
                                <div class="minicart">
                                    <ul class="minicart-product-list">
                                        <?php foreach ($_SESSION['cart'] as $i) : ?>
                                            <li>
                                                <a href="single-product.html" class="minicart-product-image">
                                                    <img src="images/<?= $i['feature_image'] ?>" alt="cart products">
                                                </a>
                                                <div class="minicart-product-details">
                                                    <h6><a href="single-product.html"><?= $i['name'] ?></a></h6>
                                                    <span><?= $i['quantity'] . ' x ' . $i['price'] ?></span>
                                                </div>
                                                <button class="close" title="Remove">
                                                   <a href="<?=BASE_URL.'add-to-cart/remove.php?id='.$i['id']?>"> <i class="fa fa-close"></i></a>
                                                </button>
                                            </li>
                                        <?php endforeach ?>

                                    </ul>
                                    <p class="minicart-total">SUBTOTAL: <span><?=number_format($totalPrice, 0, '', '.')?> VND</span></p>
                                    <div class="minicart-button">
                                        <a href="<?= BASE_URL . 'shopping-cart' ?>" class="li-button li-button-fullwidth li-button-dark">
                                            <span>View Full Cart</span>
                                        </a>
                                        <a href="<?=BASE_URL.'checkout'?>" class="li-button li-button-fullwidth">
                                            <span>Checkout</span>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <!-- Header Mini Cart Area End Here -->
                        </ul>
                    </div>
                    <!-- Header Middle Right Area End Here -->
                </div>
                <!-- Header Middle Right Area End Here -->
            </div>
        </div>
    </div>
    <!-- Header Middle Area End Here -->
    <!-- Begin Header Bottom Area -->
    <div class="header-bottom header-sticky d-none d-lg-block d-xl-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Begin Header Bottom Menu Area -->
                    <div class="hb-menu">
                        <nav>
                            <ul>
                                <li><a href="<?= BASE_URL ?>">Home</a></li>
                                <?php foreach ($loai as $l) : ?>
                                    <li><a href="<?= BASE_URL . 'categories?id=' . $l['id_loai'] ?>"><?= $l['ten_loai'] ?></a></li>
                                <?php endforeach ?>
                                <li><a href="<?= BASE_URL . 'contact' ?>">Liên Hệ</a></li>
                                <?php if (!isset($_SESSION['auth'])) : ?>
                                    <li><a href="<?= BASE_URL . 'register' ?>">Đăng Ký</a></li>
                                    <li><a href="<?= BASE_URL . 'login' ?>">Đăng Nhập</a></li>
                                <?php else : ?>
                                    <li class="dropdown-holder"><a href="" style="pointer-events: none"><?= $_SESSION['auth']['name'] ?></a>
                                        <ul class="hb-dropdown">
                                            <li><a href="index.html">Profile</a></li>
                                            <li><a href="<?= BASE_URL . 'logout' ?>">Logout</a></li>

                                        </ul>
                                    </li>
                                <?php endif ?>
                            </ul>
                        </nav>
                    </div>
                    <!-- Header Bottom Menu Area End Here -->
                </div>
            </div>
        </div>
    </div>
    <!-- Header Bottom Area End Here -->
    <!-- Begin Mobile Menu Area -->
    <div class="mobile-menu-area d-lg-none d-xl-none col-12">
        <div class="container">
            <div class="row">
                <div class="mobile-menu">
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu Area End Here -->
</header>