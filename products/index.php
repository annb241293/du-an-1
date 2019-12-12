<?php
require_once('../helpers/db.php');
require_once('../helpers/const.php');
$productId = isset($_GET['id']) ?  $_GET['id'] : '';
// dd($productId);
$product = "SELECT * FROM gao WHERE id_gao= $productId";
$product = executeQuery($product);
$product_cate = $product['id_loai'];
$category = "SELECT ten_loai FROM loai WHERE id_loai=$product_cate";
$category = executeQuery($category);
// dd($category);
$sameProducts = "SELECT * FROM gao WHERE id_loai=$product_cate";
$sameProducts = executeQuery($sameProducts, true);
// dd($sameProducts);
$comments = "SELECT * FROM comment WHERE id_gao=$productId";
$comments = executeQuery($comments, true);

?>
<!doctype html>
<html class="no-js" lang="zxx">

<!-- single-product31:30-->

<head>
    <base href="<?= ASSET_URL ?>">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Single Product || limupa - Digital Products Store eCommerce Bootstrap 4 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
    <?php require_once('../layouts/style.php'); ?>
</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!-- Begin Body Wrapper -->
    <div class="body-wrapper">
        <!-- Begin Header Area -->
        <?php require_once('../layouts/header.php'); ?>

        <!-- Header Area End Here -->
        <!-- Begin Li's Breadcrumb Area -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li class="active"><?= $category['ten_loai'] ?></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Li's Breadcrumb Area End Here -->
        <!-- content-wraper start -->
        <div class="content-wraper">
            <div class="container">
                <div class="row single-product-area">
                    <div class="col-lg-5 col-md-6">
                        <!-- Product Details Left -->
                        <div class="product-details-left">
                            <div class="product-details-images slider-navigation-1">
                                <div class="lg-image">
                                    <a class="popup-img venobox vbox-item" href="images/<?= $product['anh'] ?>" data-gall="myGallery">
                                        <img src="images/<?= $product['anh'] ?>" alt="product image">
                                    </a>
                                </div>

                            </div>

                        </div>
                        <!--// Product Details Left -->
                    </div>

                    <div class="col-lg-7 col-md-6">
                        <div class="product-details-view-content pt-60">
                            <div class="product-info">
                                <h2><?= $product['name_gao'] ?></h2>

                                <div class="price-box pt-20">
                                    <span class="new-price new-price-2"><?= number_format($product['price_gao'], 0, '', '.') ?> VND</span>
                                </div>
                                <div class="product-desc">
                                    <p>
                                        <span>100% cotton double printed dress. Black and white striped top and orange high waisted skater skirt bottom. Lorem ipsum dolor sit amet, consectetur adipisicing elit. quibusdam corporis, earum facilis et nostrum dolorum accusamus similique eveniet quia pariatur.
                                        </span>
                                    </p>
                                </div>

                                <div class="single-add-to-cart">
                                    <form action="<?= BASE_URL . 'add-to-cart' ?>" class="cart-quantity" method="get">
                                        <div class="quantity">
                                            <label>Quantity</label>
                                            <div class="cart-plus-minus">
                                                <input value="1" type="text" name="quantity">
                                            </div>
                                            <input type="hidden" name="id" value="<?= $product['id_gao'] ?>">
                                        </div>
                                        <button class="add-to-cart" type="submit">Add to cart</button>
                                    </form>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wraper end -->
        <!-- Begin Product Area -->
        <div class="product-area pt-35">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="li-product-tab">
                            <ul class="nav li-product-menu">
                                <li><a class="active" data-toggle="tab" href="#description"><span>Description</span></a></li>
                                <li><a data-toggle="tab" href="#reviews"><span>Reviews(<?= count($comments) ?>)</span></a></li>
                            </ul>
                        </div>
                        <!-- Begin Li's Tab Menu Content Area -->
                    </div>
                </div>
                <div class="tab-content">
                    <div id="description" class="tab-pane active show" role="tabpanel">
                        <div class="product-description">
                            <span>The best is yet to come! Give your walls a voice with a framed poster. This aesthethic, optimistic poster will look great in your desk or in an open-space office. Painted wooden frame with passe-partout for more depth.</span>
                        </div>
                    </div>
                   
                    <div id="reviews" class="tab-pane" role="tabpanel">
                        <div class="product-reviews">
                            <div class="product-details-comment-block">
                                <?php foreach ($comments as $c) : ?>
                                    <div class="comment-details">
                                        <h4 class="title-block"><?= $c['username'] ?></h4>
                                        <p><?= $c['noidung_comment'] ?></p>
                                    </div>
                                <?php endforeach ?>
                                <div class="review-btn">
                                    <a class="review-links" href="#" data-toggle="modal" data-target="#mymodal">Write Your Review!</a>
                                </div>
                                <!-- Begin Quick View | Modal Area -->
                                <div class="modal fade modal-wrapper" id="mymodal">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <h3 class="review-page-title">Write Your Review</h3>
                                                <div class="modal-inner-area row">
                                                    <div class="col-lg-6">
                                                        <div class="li-review-product">
                                                            <img src="images/<?= $product['anh'] ?>" alt="Li's Product">
                                                            <div class="li-review-product-desc">
                                                                <p class="li-product-name"><?= $product['name_gao'] ?></p>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="li-review-content">
                                                            <!-- Begin Feedback Area -->
                                                            <div class="feedback-area">
                                                                <div class="feedback">
                                                                    <h3 class="feedback-title">Our Feedback</h3>
                                                                    <form action="<?= BASE_URL . 'comments/add-comment.php' ?>" method="POST">
                                                                        <input type="hidden" name="id_gao" value="<?= $product['id_gao'] ?>">
                                                                        <p class="feedback-form">
                                                                            <label for="feedback">Your Review</label>
                                                                            <textarea id="feedback" name="noidung_comment" cols="45" rows="8" aria-required="true"></textarea>
                                                                        </p>
                                                                        <div class="feedback-input">
                                                                            <p class="feedback-form-author">
                                                                                <label for="author">Name<span class="required">*</span>
                                                                                </label>
                                                                                <input id="author" name="username" value="" size="30" aria-required="true" type="text">
                                                                            </p>

                                                                            <div class="feedback-btn pb-15">
                                                                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">Close</a>
                                                                                <button type="submit">submit</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <!-- Feedback Area End Here -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Quick View | Modal Area End Here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Area End Here -->
        <!-- Begin Li's Laptop Product Area -->
        <section class="product-area li-laptop-product pt-30 pb-50">
            <div class="container">
                <div class="row">
                    <!-- Begin Li's Section Area -->
                    <div class="col-lg-12">
                        <div class="li-section-title">
                            <h2>
                                <span> Other products in the same category:</span>
                            </h2>
                        </div>
                        <div class="row">
                            <div class="product-active owl-carousel">
                                <?php foreach ($sameProducts as $sp) : ?>
                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a href="<?= BASE_URL . 'products?id=' . $sp['id_gao'] ?>">
                                                    <img src="images/<?= $sp['anh'] ?>" alt="Li's Product Image" style="height: 200px">
                                                </a>
                                                <span class="sticker">New</span>
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">

                                                    <h4><a class="product_name" href="single-product.html"><?= $sp['name_gao'] ?></a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price"><?= number_format($sp['price_gao'], 0, '', '.') ?> VND</span>
                                                    </div>
                                                </div>
                                                <div class="add-actions">
                                                    <ul class="add-actions-link">
                                                        <li class="add-cart active"><a href="<?= BASE_URL . 'add-to-cart?id=' . $sp['id_gao'] ?>">Add to cart</a></li>
                                                        <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                                        <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
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
        <!-- Begin Footer Area -->
        <?php require_once('../layouts/footer.php'); ?>
    </div>
    <!-- Body Wrapper End Here -->
    <?php require_once('../layouts/script.php'); ?>
</body>

<!-- single-product31:32-->

</html>