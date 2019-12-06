<?php
require_once('../helpers/db.php');
require_once('../helpers/const.php');
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
                        <li class="active">Register</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Li's Breadcrumb Area End Here -->
        <!-- Begin Login Content Area -->
        <div class="page-section mb-60">
            <div class="container">
                <div class="row">

                    <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                        <form action="<?= BASE_URL . 'register/post-register.php' ?>" method="POST">
                            <div class="login-form">
                                <h4 class="login-title">Register</h4>
                                <div class="row">
                                    <div class="col-md-12 mb-20">
                                        <?php if (isset($_GET['alert'])) : ?>
                                            <span class="text-danger"><?= $_GET['alert'] ?></span>
                                        <?php endif ?>
                                    </div>
                                    <div class="col-md-12 mb-20">
                                        <label>Name*</label>
                                        <input class="mb-0" type="text" placeholder="Name" name="name">
                                    </div>
                                    <div class="col-md-12 mb-20">
                                        <label>Email Address*</label>
                                        <input class="mb-0" type="email" placeholder="Email Address" name="email">
                                    </div>
                                    <div class="col-md-6 mb-20">
                                        <label>Password*</label>
                                        <input class="mb-0" type="password" placeholder="Password" name="password">
                                    </div>
                                    <div class="col-md-6 mb-20">
                                        <label>Confirm Password*</label>
                                        <input class="mb-0" type="password" placeholder="Confirm Password" name="passwordConfirm">
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="register-button mt-0">Register</button>
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