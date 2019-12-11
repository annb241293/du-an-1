<?php
require_once '../../helpers/common.php';
require_once '../../helpers/db.php';

if($_SESSION['auth'] == null){
    header('location: ../login/');
}

$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : null;

// lay ra danh sách danh mục
$sqlQuery = "select * from products ";

if ($keyword != null){
    $sqlQuery .= " where name like '%$keyword%'";
}
$products = executeQuery($sqlQuery, true);

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <base href="<?= ADM_ASSET_URL ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Blank Page</title>
  <?php include_once "../layouts/style.php" ?>
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
        
        <div class="box">
            <div class="box-header">
                <h4>Danh sách danh mục</h4>
                <div class="row">
                    <div class="col-md-4">
                        <form method="get">
                            <div class="form-group">
                                <div class="input-group input-group-sm">
                                    <input type="text" 
                                        value="<?= $keyword ?>"    
                                        name="keyword" class="form-control">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-info btn-flat">Search!</button>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th>Image </th>
                        <th>Description </th>
                    
                        <th>
                            <a href="<?= ADMIN_URL . 'products/add.php' ?>" class="btn btn-xs btn-primary">Thêm</a>
                        </th>
                    </tr>
                    <?php foreach($products as $key => $c):?>
                    <tr>
                        <td><?= $key+1 ?></td>
                        <td><?= $c['name']?></td>
                        <td>
                            <img src="<?= ASSET_URL . $c['image'] ?>" width="50">
                        </td>
                        <td><?= $c['short_desc']?></td>
                     
                        <td>
                            <a href="<?= ADMIN_URL . 'products/edit.php?id=' . $c['id']?>" class="btn btn-xs btn-info">Sửa</a>
                            <a href="javascript:;" url="<?= ADMIN_URL . 'products/xoa.php?id=' . $c['id'] ?>" class="btn btn-remove btn-xs btn-danger">Xóa</a>
                        </td>
                    </tr>
                    <?php endforeach?>
                </tbody>
            </table>
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
    $('.btn-remove').click(function(){
        var hrefUrl = $(this).attr('url');
        swal({
            title: "Thông báo!",
            text: "Bạn có chắc chắn muốn xóa danh mục này?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then(function(willDelete){
            if(willDelete === true){
                window.location.href = hrefUrl;
            }
        });
    });

</script>
</body>
</html>
