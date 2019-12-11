<?php
require_once('../../helpers/db.php');
require_once('../../helpers/const.php');
$sql="SELECT* FROM loai";
$classes=executeQuery($sql, true);
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
            <th>id loại</th>
            <th>tên loại</th>

        </tr>
         <?php
            foreach ($classes as $cl) {
            ?>                
            <tr>
                    <td><?=$cl['id_loai']?></td>
                    <td><?=$cl['ten_loai']?></td>
                    <td><a href="<?=BASE_URL.'admin/classes/edit.php?id_loai'?>=<?=$cl['id_loai']?>">Sửa loại hàng</a>
                        ||
                     <a onclick="return confirm('Bạn có chắc chắn xóa không');" href="<?=BASE_URL.'admin/classes/xoa.php?id_loai'?>=<?=$cl['id_loai']?>">Xóa</a>
                    </td>
                </tr>
               
            <?php
            }
        ?>
         <tr>
                <a href="<?=BASE_URL.'admin/classes/add.php'?>">thêm loại sản phẩm</a>

                </tr>
    </table>
  </div>
          <?php require_once('../layouts/footer.php'); ?>

    <?php require_once('../layouts/script.php'); ?>
</body>


</html>