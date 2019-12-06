<?php
require_once '../../helpers/common.php';
require_once '../../helpers/db.php';

if($_SESSION['auth'] == null){
    header('location: ../login/');
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <base href="<?= ADM_ASSET_URL ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Thêm mới danh mục</title>
  <?php include_once "../layouts/style.php" ?>
  <style>
  
    .box{
        padding-bottom: 20px;
    }
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Header -->
    <?php include_once "../layouts/header.php" ?>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <!-- Sidebar -->
  <?php include_once "../layouts/sidebar.php" ?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
        
        <div class="box row">
            <div class="col-md-6">
                <form action="<?= ADMIN_URL . 'users/save-add.php'?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control">
                                <?php if (isset($_GET['nameerr'])) : ?>
                                    <span class="text-danger"><?= $_GET['nameerr'] ?></span>
                                <?php endif ?>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="email"  class="form-control">
                                <?php if (isset($_GET['emailerr'])) : ?>
                                    <span class="text-danger"><?= $_GET['emailerr'] ?></span>
                                <?php endif ?>
                            </div>
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" name="address"  class="form-control">
                                <?php if (isset($_GET['addresserr'])) : ?>
                                    <span class="text-danger"><?= $_GET['addresserr'] ?></span>
                                <?php endif ?>
                            </div>
                            <div class="form-group">
                                <label for="">Ảnh</label>
                                <input type="file" name="avatar" class="form-control">
                                <?php if (isset($_GET['imgerr'])) : ?>
                                    <span class="text-danger"><?= $_GET['imgerr'] ?></span>
                                <?php endif ?>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-sm btn-primary" >Lưu</button>
                                <a href="<?= ADMIN_URL . "users" ?>" class="btn btn-sm btn-danger">Hủy</a>
                            </div>
                </form>
            </div>
        </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Footer -->
  <?php include_once "../layouts/footer.php" ?>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php include_once "../layouts/script.php" ?>
<script>
    

</script>
</body>
</html>
