<?php
require_once('../../helpers/db.php');
require_once('../../helpers/const.php');
$sql="SELECT* FROM slide";
$slide=executeQuery($sql, true);
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
            <th>ID slide</th>
            <th>Ảnh slide</th>
            <th>Link slide</th>
            <th>Action</th>
        </tr>
         <?php
            foreach ($slide as $sl) {
            ?>                
            <tr>
                    <td><?=$sl['id_slide']?></td>
                    <td><img src="images/<?=$sl['anh_slide']?>" width="120" alt=""></td>
                    <td><?=$sl['link_slide']?></td>

                    <td><a href="<?=BASE_URL.'admin/slide/edit.php?id_slide'?>=<?=$sl['id_slide']?>">Sửa slide</a>
                        ||
                     <a onclick="return confirm('Bạn có chắc chắn xóa không');" href="<?=BASE_URL.'admin/slide/xoa.php?id_slide'?>=<?=$sl['id_slide']?>">Xóa</a>
                    </td>
                </tr>
               
            <?php
            }
        ?>
         <tr>
                <a href="<?=BASE_URL.'admin/slide/add.php'?>">thêm slide</a>
                </tr>
    </table>
  </div>
          <?php require_once('../layouts/footer.php'); ?>
    <?php require_once('../layouts/script.php'); ?>
</body>
</html>