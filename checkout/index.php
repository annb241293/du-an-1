<?php
require_once('../helpers/db.php');
require_once('../helpers/const.php');
$totalPrice = 0;
$user = isset($_SESSION['auth']) ? $_SESSION['auth'] : [];
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
                        <li class="active">Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Li's Breadcrumb Area End Here -->
        <!--Checkout Area Strat-->
        <div class="checkout-area pt-60 pb-30">
            <div class="container">
                <div class="row">
                    <?php if (!isset($_SESSION['auth'])) : ?>
                        <div class="col-12">
                            <div class="coupon-accordion">
                                <!--Accordion Start-->
                                <h3>Returning customer? <span id="showlogin">Click here to login</span></h3>
                                <div id="checkout-login" class="coupon-content">
                                    <div class="coupon-info">
                                        <p class="coupon-text">Quisque gravida turpis sit amet nulla posuere lacinia. Cras sed est sit amet ipsum luctus.</p>
                                        <form action="<?= BASE_URL . 'login/post-login.php' ?>" method="post">
                                            <p class="form-row-first">
                                                <label>email <span class="required">*</span></label>
                                                <input type="text" name="email">
                                            </p>
                                            <p class="form-row-last">
                                                <label>Password <span class="required">*</span></label>
                                                <input type="password" name="password">
                                            </p>
                                            <p class="form-row">
                                                <input value="Login" type="submit">
                                            </p>
                                        </form>
                                    </div>
                                </div>
                                <!--Accordion End-->

                            </div>
                        </div>
                    <?php endif ?>
                </div>
                <form action="<?= BASE_URL . 'checkout/post-checkout.php' ?>" method="post">
                    <div class="row">
                        <div class="col-lg-6 col-12">

                            <div class="checkbox-form">
                                <h3>Billing Details</h3>
                                <div class="row">


                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label> Name <span class="required">*</span></label>
                                            <input placeholder="" type="text" name="name" value="<?php if (isset($_SESSION['auth'])) echo $_SESSION['auth']['name'] ?> ">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Address <span class="required">*</span></label>
                                            <input placeholder="Street address" type="text" name="dia_chi" value="<?php if (isset($_SESSION['auth'])) echo $_SESSION['auth']['dia_chi'] ?> ">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Email Address <span class="required">*</span></label>
                                            <input placeholder="" type="email" name="email" value="<?php if (isset($_SESSION['auth'])) echo $_SESSION['auth']['email'] ?> ">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Phone <span class="required">*</span></label>
                                            <input type="text" name="phone_number" value="<?php if (isset($_SESSION['auth'])) echo $_SESSION['auth']['phone_number'] ?> ">
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="your-order">
                                <h3>Your order</h3>
                                <div class="your-order-table table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="cart-product-name">Product</th>
                                                <th class="cart-product-total">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($_SESSION['cart'] as $i) : ?>
                                                <input type="hidden" name="id_gao[]" value="<?= $i['id'] ?>">
                                                <input type="hidden" name="quantity[]" value="<?= $i['quantity'] ?>">
                                                <tr class="cart_item">
                                                    <td class="cart-product-name"><?= $i['name'] ?><strong class="product-quantity"> × <?= $i['quantity'] ?></strong></td>
                                                    <td class="cart-product-total"><span class="amount"><?= number_format($i['price'] * $i['quantity'], 0, '', '.') ?></span></td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                        <tfoot>

                                            <tr class="order-total">
                                                <th>Order Total</th>
                                                <td><strong><span class="amount"><?= number_format($totalPrice, 0, '', '.') ?></span></strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="payment-method">
                                    <div class="payment-accordion">

                                        <div class="order-button-payment">
                                            <input value="Pay" type="submit">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
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