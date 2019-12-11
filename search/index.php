<?php
require_once('../helpers/db.php');
require_once('../helpers/const.php');
$keyword = $_GET['keyword'];
    $search = "SELECT * FROM gao WHERE gao.name_gao  LIKE '%$keyword%'";
    $search = executeQuery($search,true);
?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <base href="<?= ASSET_URL ?>">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login Register || limupa - Digital Products Store eCommerce Bootstrap 4 Template</title>
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
                            <li><a href="index.html">Home</a></li>
                            <li class="active">Search List</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->
            <!-- Begin Li's Content Wraper Area -->
            <div class="content-wraper pt-60 pb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 order-1 order-lg-2">
                           
                            <!-- shop-top-bar start -->
                            <div class="shop-top-bar mt-30">
                                <div class="shop-bar-inner">
                                    <div class="product-view-mode">
                                        <!-- shop-item-filter-list start -->
                                        <ul class="nav shop-item-filter-list" role="tablist">
                                            <li class="active" role="presentation"><a aria-selected="true" class="active show" data-toggle="tab" role="tab" aria-controls="list-view" href="#list-view"><i class="fa fa-th-list"></i></a></li>
                                        </ul>
                                        <!-- shop-item-filter-list end -->
                                    </div>
                                    <div class="toolbar-amount">
                                        <span><?=count($search)?> result</span>
                                    </div>
                                </div>
                                <!-- product-select-box start -->
                               
                                <!-- product-select-box end -->
                            </div>
                            <!-- shop-top-bar end -->
                            <!-- shop-products-wrapper start -->
                            <div class="shop-products-wrapper">
                                <div class="tab-content">
                                  
                                    <div id="list-view" class="tab-pane fade product-list-view active show" role="tabpanel">
                                        <div class="row">
                                            <div class="col">
                                                <?php foreach($search as $s):?>
                                                <div class="row product-layout-list">
                                                    <div class="col-lg-3 col-md-5 ">
                                                        <div class="product-image">
                                                            <a href="single-product.html">
                                                                <img src="images/<?=$s['anh']?>" alt="Li's Product Image">
                                                            </a>
                                                            <span class="sticker">New</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5 col-md-7">
                                                        <div class="product_desc">
                                                            <div class="product_desc_info">
                                                            
                                                                <h4><a class="product_name" href="<?=BASE_URL.'products?id='.$s['id_gao']?>"><?=$s['name_gao']?></a></h4>
                                                                <div class="price-box">
                                                                    <span class="new-price"><?=$s['price_gao']?></span>
                                                                </div>
                                                                <p><?=$s['content_gao']?></p>
                                                            </div>
                                                            <div class="shop-add-action mb-xs-30">
                                                            <ul class="add-actions-link">
                                                                <li class="add-cart"><a href="<?=BASE_URL.'add-to-cart?id='.$s['id_gao']?>">Add to cart</a></li>
                                                            </ul>
                                                        </div>
                                                        </div>
                                                    </div>
                                                  
                                                </div>
                                                <?php endforeach?>
                                            </div>
                                        </div>
                                    </div>
                                  
                                </div>
                            </div>
                            <!-- shop-products-wrapper end -->
                        </div>
                      
                    </div>
                </div>
            </div>

        <!-- Login Content Area End Here -->
        <!-- Begin Footer Area -->
        <?php require_once('../layouts/footer.php'); ?>
        <!-- Footer Area End Here -->
    </div>
    <?php require_once('../layouts/script.php'); ?>
</body>

<!-- login-register31:27-->

</html>
