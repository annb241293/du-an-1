<?php
require_once '../helpers/const.php';
require_once '../helpers/db.php';
if($_SESSION['auth'] == null){
    header('location: ../');
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <base href="<?= ADM_ASSET_URL ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Blank Page</title>
  <?php include_once "./layouts/style.php" ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Header -->
    <?php include_once "./layouts/header.php" ?>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <!-- Sidebar -->
  <?php include_once "./layouts/sidebar.php" ?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                    <h3></h3>
                    <p>Sản phẩm</p>
                    </div>
                    <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="<?=ADMIN_URL.'products'?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
          <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3></h3>
                    <p>Thành viên</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                    </div>
                    <a href="<?=ADMIN_URL.'users'?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Footer -->
  <?php include_once "./layouts/footer.php" ?>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php include_once "./layouts/script.php" ?>
</body>
</html>
