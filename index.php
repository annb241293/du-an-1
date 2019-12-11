<?php
require_once('./helpers/db.php');
require_once('./helpers/const.php');

$slide = 'SELECT * FROM slide';
$slide = executeQuery($slide, true);

$gao_nam_dinh = 'SELECT * FROM gao WHERE id_loai=3';
$gao_nam_dinh = executeQuery($gao_nam_dinh, true);
// dd($gao_nam_dinh);

$gao_ban_chay = 'SELECT * FROM gao';
$gao_ban_chay = executeQuery($gao_ban_chay, true);

$gao_moi = 'SELECT * FROM gao LIMIT 0,5';
$gao_moi = executeQuery($gao_moi, true);
// dd($gao_ban_chay);
?>
<!doctype html>
<html class="no-js" lang="zxx">

<!-- index28:48-->

<head>
    <base href="<?php echo ASSET_URL ?>">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home Version One || limupa - Digital Products Store eCommerce Bootstrap 4 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">

    <?php require_once('./layouts/style.php'); ?>
</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!-- Begin Body Wrapper -->
    <div class="body-wrapper">
        <!-- Begin Header Area -->
        <?php require_once('./layouts/header.php'); ?>
        <!-- Header Area End Here -->
        <!-- Begin Slider With Banner Area -->
        <div class="slider-with-banner">
            <div class="container">
                <div class="row">
                    <!-- Begin Slider Area -->
                    <div class="col-lg-8 col-md-8">
                        <div class="slider-area">
                            <div class="slider-active owl-carousel">
                                <!-- Begin Single Slide Area -->
                                <?php foreach ($slide as $sl) : ?>
                                    <div class="single-slide align-center-left  animation-style-01">
                                        <img src="images/<?= $sl['anh_slide'] ?>" alt="" srcset="">
                                    </div>
                                <?php endforeach ?>
                                <!-- Single Slide Area End Here -->

                            </div>
                        </div>
                    </div>
                    <!-- Slider Area End Here -->
                    <!-- Begin Li Banner Area -->
                    <div class="col-lg-4 col-md-4 text-center pt-xs-30">
                        <div class="li-banner">
                            <a href="#">
                                <img src="images/banner/1_1.jpg" alt="">
                            </a>
                        </div>
                        <div class="li-banner mt-15 mt-sm-30 mt-xs-30">
                            <a href="#">
                                <img src="images/banner/1_2.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <!-- Li Banner Area End Here -->
                </div>
            </div>
        </div>
        <!-- Slider With Banner Area End Here -->


        <!-- Begin Li's Laptop Product Area -->
        <section class="product-area li-laptop-product pt-60 pb-45">
            <div class="container">
                <div class="row">
                    <!-- Begin Li's Section Area -->
                    <div class="col-lg-12">
                        <div class="li-section-title">
                            <h2>
                                <span>Gạo Nam Định</span>
                            </h2>

                        </div>
                        <div class="row">

                            <div class="product-active owl-carousel">
                                <?php foreach ($gao_nam_dinh as $gnd) : ?>
                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->

                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a href="<?= BASE_URL . 'products?id=' . $gnd['id_gao'] ?>">
                                                    <img src="images/<?= $gnd['anh'] ?>" style="height: 200px">
                                                </a>
                                                <span class="sticker">New</span>
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                 
                                                    <h4><a class="product_name" href="single-product.html"><?= $gnd['name_gao'] ?></a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price"><?=number_format($gnd['price_gao'], 0, '', '.')?> VND</span>
                                                    </div>
                                                </div>
                                                <div class="add-actions">
                                                    <ul class="add-actions-link">
                                                        <li class="add-cart active"><a href="<?= BASE_URL . 'add-to-cart?id=' . $gnd['id_gao'] ?>">Add to cart</a></li>
                                                       
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- single-product-wrap end -->
                                    </div>
                                <?php endforeach ?>
                            </div>

                        </div>
                    </div>
                    <!-- Li's Section Area End Here -->
                </div>
            </div>
        </section>
        <!-- Li's Laptop Product Area End Here -->
        <!-- Begin Li's TV & Audio Product Area -->
        <section class="product-area li-laptop-product li-tv-audio-product pb-45">
            <div class="container">
                <div class="row">
                    <!-- Begin Li's Section Area -->
                    <div class="col-lg-12">
                        <div class="li-section-title">
                            <h2>
                                <span>Sản phẩm bán chạy</span>
                            </h2>

                        </div>
                        <div class="row">
                            <div class="product-active owl-carousel">
                                <?php foreach ($gao_ban_chay as $gbc) : ?>
                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a href="single-product.html">
                                                    <img src="images/<?= $gbc['anh'] ?>" alt="Li's Product Image" style="height: 200px">
                                                </a>
                                                <span class="sticker">New</span>
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                 
                                                    <h4><a class="product_name" href="single-product.html"><?= $gbc['name_gao'] ?></a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price"><?=number_format($gbc['price_gao'], 0, '', '.')?> VND</span>
                                                    </div>
                                                </div>
                                                <div class="add-actions">
                                                    <ul class="add-actions-link">
                                                        <li class="add-cart active"><a href="<?= BASE_URL . 'add-to-cart?id=' . $gbc['id_gao'] ?>">Add to cart</a></li>
                                                       
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single-product-wrap end -->
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                    <!-- Li's Section Area End Here -->
                </div>
            </div>
        </section>
        <!-- Li's TV & Audio Product Area End Here -->
        <!-- Begin Li's Static Home Area -->
        
        <!-- Li's Static Home Area End Here -->
        <!-- Begin Li's Trending Product Area -->
        <section class="product-area li-trending-product pt-60 pb-45">
            <div class="container">
                <div class="row">
                    <!-- Begin Li's Tab Menu Area -->
                    <div class="col-lg-12">
                        <div class="li-product-tab li-trending-product-tab">
                            <h2>
                                <span>Sản phẩm mới </span>
                            </h2>

                        </div>
                        <!-- Begin Li's Tab Menu Content Area -->
                        <div class="tab-content li-tab-content li-trending-product-content">
                            <div id="home1" class="tab-pane show fade in active">
                                <div class="row">
                                    <div class="product-active owl-carousel">
                                    <?php foreach ($gao_moi as $gm) : ?>
                                        <div class="col-lg-12">
                                            <!-- single-product-wrap start -->
                                            <div class="single-product-wrap">
                                                <div class="product-image">
                                                    <a href="single-product.html">
                                                        <img src="images/<?=$gm['anh']?>" alt="Li's Product Image" style="height: 200px">
                                                    </a>
                                                    <span class="sticker">New</span>
                                                </div>
                                                <div class="product_desc">
                                                    <div class="product_desc_info">
                                                        
                                                        <h4><a class="product_name" href="single-product.html"><?=$gm['name_gao']?></a></h4>
                                                        <div class="price-box">
                                                            <span class="new-price"><?=number_format($gm['price_gao'], 0, '', '.')?> VND</span>
                                                        </div>
                                                    </div>
                                                    <div class="add-actions">
                                                        <ul class="add-actions-link">
                                                            <li class="add-cart active"><a href="<?= BASE_URL . 'add-to-cart?id=' . $gm['id_gao'] ?>">Add to cart</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- single-product-wrap end -->
                                        </div>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                        <!-- Tab Menu Content Area End Here -->
                    </div>
                    <!-- Tab Menu Area End Here -->
                </div>
            </div>
        </section>
        <!-- Li's Trending Product Area End Here -->
        <!-- Begin Footer Area -->
        <?php require_once('./layouts/footer.php'); ?>
        <!-- Footer Area End Here -->

    </div>
    <!-- Body Wrapper End Here -->

    <?php require_once('./layouts/script.php'); ?>
</body>


</html>