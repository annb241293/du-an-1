<?php
require_once('../../helpers/db.php');
require_once('../../helpers/const.php');
$sql="SELECT*FROM hoadon";
$hoadon=executeQuery($sql,true);
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
        <div id="divtong">
            <table class="table table-bordered cart_summary">
        <tr id="tr1">
            <th>ID hóa đơn</th>
            <th>Tên</th>
            <th>Địa chỉ</th>
            <th>Số Điện Thoại</th>
            <th>Email</th>
            <th>Chi tiết đơn hàng</th>
            <th>Action</th>
            <th>Trạng thái</th>

        </tr>
         <?php
            foreach ($hoadon as $hd) {
            ?>                
            <tr>
                    <td><?=$hd['id_hoadon']?></td>
                    <td><?=$hd['name']?></td>
                    <td><?=$hd['dia_chi']?></td>
                    <td><?=$hd['phone_number']?></td>
                    <td><?=$hd['email']?></td>

                    <td><a href="<?=BASE_URL.'admin/bills/chitiethoadon.php?id_hoadon'?>=<?=$hd['id_hoadon']?>">Chi tiết đơn hàng</a>
                        </td>
                     <td><a onclick="return confirm('Bạn có chắc chắn xóa không');" href="<?=BASE_URL.'admin/bills/xoa.php?id_hoadon'?>=<?=$hd['id_hoadon']?>">Xóa đơn hàng</a>
                    </td>
                    <td><?=$hd['trang_thai']?></td> 
                </tr>
            <?php
            }
        ?>
         <tr>
                </tr>
            </table>
        </div>
    </div>
    <?php require_once('../layouts/script.php'); ?>
                <?php require_once('../layouts/footer.php'); ?>

</body>



</html>