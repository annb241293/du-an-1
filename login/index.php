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
                        <li class="active">Login</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Li's Breadcrumb Area End Here -->
        <!-- Begin Login Content Area -->
        <div class="page-section mb-60">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                        <!-- Login Form s-->
                        <form action="<?= BASE_URL . 'login/post-login.php' ?>" method="POST">
                            <div class="login-form">
                                <h4 class="login-title">Login</h4>
                                <div class="row">
                                    <div class="col-md-12 mb-20">
                                        <?php if (isset($_GET['alert'])) : ?>
                                            <span class="text-danger"><?= $_GET['alert'] ?></span>
                                        <?php endif ?>
                                    </div>
                                    <div class="col-md-12 col-12 mb-20">
                                        <label>Email Address*</label>
                                        <input class="mb-0" type="email" placeholder="Email Address" name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : ''; ?>" />
                                    </div>
                                    <div class="col-12 mb-20">
                                        <label>Password</label>
                                        <input class="mb-0" type="password" placeholder="Password" name="password">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                                            <input type="checkbox" id="remember_me">
                                            <label for="remember_me">Remember me</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-10 mb-20 text-left text-md-right">
                                        <a href="#"> Forgotten pasward?</a>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="register-button mt-0">Login</button>
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