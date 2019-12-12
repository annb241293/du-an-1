<?php
require_once('../helpers/db.php');
require_once('../helpers/const.php');
$totalPrice = 0;
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
    foreach ($cart as $item) {
        // $totalItemOnCart += $item['quantity'];
        $totalPrice += $item['price'] * $item['quantity'];
    }
}
?>
<!doctype html>
<html class="no-js" lang="zxx">

<!-- login-register31:27-->

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
                        <li class="active">Shopping Cart</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Li's Breadcrumb Area End Here -->
        <!--Shopping Cart Area Strat-->
        <div class="Shopping-cart-area pt-60 pb-60">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form action="#">
                            <div class="table-content table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="li-product-remove">remove</th>
                                            <th class="li-product-thumbnail">images</th>
                                            <th class="cart-product-name">Product</th>
                                            <th class="li-product-price">Unit Price</th>
                                            <th class="li-product-quantity">Quantity</th>
                                            <th class="li-product-subtotal">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($_SESSION['cart'] as $i) : ?>
                                            <tr>
                                                <td class="li-product-remove"><a href="<?=BASE_URL.'add-to-cart/remove.php?id='.$i['id']?>"><i class="fa fa-times"></i></a></td>
                                                <td class="li-product-thumbnail"><a href="#"><img src="images/<?= $i['feature_image'] ?>" alt="Li's Product Image"></a></td>
                                                <td class="li-product-name"><a href="#"><?= $i['name'] ?></a></td>
                                                <td class="li-product-price"><span class="amount"><?=number_format( $i['price'] , 0, '', '.')?></span></td>
                                                <td class="quantity">
                                                    <label><?= $i['quantity'] ?></label>
                                                    <!-- <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" value="1" type="text">
                                            <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                            <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                        </div> -->
                                                </td>
                                                <td class="product-subtotal"><span class="amount"><?=number_format( $i['price']*$i['quantity'] , 0, '', '.')?> </span></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                           
                            <div class="row">
                                <div class="col-md-5 ml-auto">
                                    <div class="cart-page-total">
                                        <h2>Cart totals</h2>
                                        <ul>
                                            <li>Total <span><?=number_format($totalPrice, 0, '', '.')?> VND</span></li>
                                        </ul>
                                        <a href="<?= BASE_URL . 'checkout' ?>">Proceed to checkout</a>
                                    </div>
                                </div>
                            </div>
                        </form>
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