<?php
require_once('../../helpers/db.php');
require_once('../../helpers/const.php');
$id_hoadon=$_GET['id_hoadon'];
$sql="SELECT * FROM gao INNER JOIN chitiet_don ON gao.id_gao = chitiet_don.id_gao";
$chitiet=executeQuery($sql,true);
// dd($chitiet);
?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <base href="<?php echo ASSET_URL ?>">
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
         <table class="table table-bordered cart_summary">
        <tr id="tr1">
            <th>tên sản phẩm</th>
            <th>ảnh sản phẩm</th>
            <th>số lượng</th>
            <th>giá tiền sản phẩm</th>


        </tr>
         <?php
            foreach ($chitiet as $ct) {
            ?>                
            <tr>
                    <td><?=$ct['name_gao']?></td>
                    <td><img src="images/<?=$ct['anh']?>"></td>
                    <td><?=$ct['quantity']?></td>
                    <td><?=$ct['quantity']*$ct['price_gao']?></td>
                    
                </tr>
               
            <?php
            }
        ?>
         <tr>
                <a href="<?=BASE_URL.'admin/classes/add.php'?>">thêm loại sản phẩm</a>

                </tr>
    </table>
        <?php require_once('../layouts/footer.php'); ?>
    </div>
    <?php require_once('../layouts/script.php'); ?>
</body>
</html>