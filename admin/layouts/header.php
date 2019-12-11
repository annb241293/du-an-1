<header>
    <?php
    $loai = 'SELECT * FROM loai';
    $loai = executeQuery($loai, true);
    ?>

    <!-- Begin Header Middle Area -->
    <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="logo pb-sm-30 pb-xs-30">
                        <a href="index.html">
                            <img src="images/menu/logo/1.jpg" alt="">
                        </a>
                    </div>
                </div>
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
                                <li><a href="<?= BASE_URL.'admin/users/index.php' ?>">Users</a></li>
                                <li><a href="<?= BASE_URL.'admin/classes/index.php' ?>">Classes</a></li>
                                <li><a href="<?= BASE_URL.'admin/products/index.php' ?>">Products</a></li>
                                <li><a href="<?= BASE_URL.'admin/bills/index.php' ?>">Bills</a></li>
                                <li><a href="<?= BASE_URL.'admin/slide/index.php' ?>">slide</a></li>
                                <li><a href="<?= BASE_URL.'admin/dangxuat/index.php' ?>">đăng xuất</a></li>

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