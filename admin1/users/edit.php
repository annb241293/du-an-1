<?php
require_once '../../helpers/common.php';
require_once '../../helpers/db.php';

if($_SESSION['auth'] == null){
    header('location: ../login/');
}
$userId = $_GET['id'];

$sqlQuery = "select * from users where id = $userId";
$user = executeQuery($sqlQuery, false);
if (!$user) {
    header('location: ./');
    die;
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <base href="<?= ADM_ASSET_URL ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PT14111 | Thêm mới danh mục</title>
    <?php include_once "../layouts/style.php" ?>
    <style>
        .box {
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
                        <form action="<?= ADMIN_URL . 'users/save-edit.php' ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $user['id'] ?>">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" value="<?= $user['name'] ?>" class="form-control">
                                <?php if (isset($_GET['nameerr'])) : ?>
                                    <span class="text-danger"><?= $_GET['nameerr'] ?></span>
                                <?php endif ?>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" value="<?= $user['email'] ?>" class="form-control">
                                <?php if (isset($_GET['nameerr'])) : ?>
                                    <span class="text-danger"><?= $_GET['nameerr'] ?></span>
                                <?php endif ?>
                            </div>
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" name="address" value="<?= $user['address'] ?>" class="form-control">
                                <?php if (isset($_GET['nameerr'])) : ?>
                                    <span class="text-danger"><?= $_GET['nameerr'] ?></span>
                                <?php endif ?>
                            </div>
                            <div class="form-group">
                                <label for="">Ảnh</label>
                                <input type="file" name="avatar" class="form-control">
                                <?php if (isset($_GET['imgerr'])) : ?>
                                    <span class="text-danger"><?= $_GET['imgerr'] ?></span>
                                <?php endif ?>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <img src="<?= ASSET_URL . $user['avatar'] ?>" alt="" class="img-responsive">
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-sm btn-primary">Lưu</button>
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