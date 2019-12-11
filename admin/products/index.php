<?php
require_once('../../helpers/db.php');
require_once('../../helpers/const.php');
$sql="SELECT* FROM gao";
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
            <th>id_product</th>
            <th>name_product</th>
            <th>image</th>
            <th>content_product</th>
            <th>price_product</th>
            <th>tieude_product</th>
            <th>thuong_hieu</th>
            <th>nha_cung_cap</th>
            <th>id_loai</th>
            <th>action</th>
        </tr>
         <?php
            foreach ($products as $r) {
            ?>                
            <tr>
                    <td><?=$r['id_gao']?></td>
                    <td><?=$r['name_gao']?></td>
                    <td><img src="images/<?=$r['anh']?>" width="120" alt=""></td>
                    <td><?=$r['content_gao']?></td>
                    <td><?=$r['price_gao']?></td>
                    <td><?=$r['tieude_gao']?></td>
                    <td><?=$r['nha_cung_cap']?></td>
                    <td><?=$r['thuonghieu']?></td>
                    <td><?=$r['id_loai']?></td>
                    <td><a href="<?=BASE_URL.'admin/products/edit.php?id_gao'?>=<?=$r['id_gao']?>">Sửa sản phẩm</a>
                        ||
                     <a onclick="return confirm('Bạn có chắc chắn xóa không');" href="<?=BASE_URL.'admin/products/xoa.php?id_gao'?>=<?=$r['id_gao']?>">Xóa</a>
                    </td>
                </tr>
               
            <?php
            }
        ?>
         <tr>
                <a href="<?=BASE_URL.'admin/products/add.php'?>">thêm sản phẩm</a>

                </tr>
    </table>
  </div>
          <?php require_once('../layouts/footer.php'); ?>

    <?php require_once('../layouts/script.php'); ?>
</body>


</html>