<?php
require_once('../../helpers/db.php');
require_once('../../helpers/const.php');
$sql="SELECT* FROM users";
$products=executeQuery($sql, true);
?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <base href="<?php echo ASSET_URL ?>">
    <link rel="stylesheet" type="text/css" href="../css/table.css">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>admin1</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">

    <?php require_once('../layouts/style.php'); ?>
</head>

<body>
   
    <div class="body-wrapper">
        <?php require_once('../layouts/header.php'); ?>
  </div>
  <div id="divcc">
    <table class="table table-bordered cart_summary">
        <tr id="tr1">
            <th>user_id</th>
            <th>User Name</th>
            <th>Email</th>
            <th>role</th>
            <th>acction</th>
        </tr>
         <?php
            foreach ($products as $pr) {
            ?>                <tr>
                    <td><?=$pr['id_user']?></td>
                    <td><?=$pr['name']?></td>
                    <td><?=$pr['email']?></td>
                    <td><?=$pr['role']?></td>
                    <td><a href="<?=BASE_URL.'admin/users/edit.php?id_user'?>=<?=$pr['id_user']?>">Sửa mật khẩu</a>
                      ||
                    <a onclick="return confirm('Bạn có chắc chắn xóa không');" href="<?=BASE_URL.'admin/users/xoa.php?id_user'?>=<?=$pr['id_user']?>">Xóa</a>
                    </td>
                </tr>
               
            <?php
            }
        ?>
         <tr>
                <a href="<?=BASE_URL.'admin/users/add.php'?>">thêm tài khoản</a>

                </tr>
    </table>
  </div>
          <?php require_once('../layouts/footer.php'); ?>

    <?php require_once('../layouts/script.php'); ?>
</body>


</html>