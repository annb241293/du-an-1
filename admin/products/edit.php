<?php
require_once('../../helpers/db.php');
require_once('../../helpers/const.php');
$id_gao=$_GET['id_gao'];
$sql="SELECT*FROM gao WHERE id_gao='$id_gao'";
$row=executeQuery($sql);
 if (isset($_POST['btn_them'])) {
        extract($_REQUEST);
        $id_gao=$_POST['id_gao'];
        $name_gao=$_POST['name_gao'];
        $price_gao=$_POST['price_gao'];
        $anh=$_POST['anh'];
        $content_gao=$_POST['content_gao'];
        $tieude_gao=$_POST['tieude_gao'];
        $nha_cung_cap=$_POST['nha_cung_cap'];
        $thuonghieu=$_POST['thuonghieu'];

        //Validate giá
        if ( $price_gao=="" || $price_gao < 0 ) {
            $alert .= "Giá phải là số dương<br>";
        }
        if(isset($_FILES['anh']['name']) && ($_FILES['anh']['name'])!=""){
            $size=$_FILES['anh']['size'];
            $temp=$_FILES['anh']['tmp_name'];
            $anh=$_FILES['anh']['name'];
            unlink("anh_image/$old_image");
            move_uploaded_file($temp, "anh_image/$old_image");
        }
        //Làm việc thêm mới
          executeQuery("UPDATE gao SET name_gao='$name_gao', price_gao='$price_gao', anh='$anh', content_gao='$content_gao', tieude_gao='$tieude_gao', nha_cung_cap='$nha_cung_cap',thuonghieu='$thuonghieu' WHERE id_gao='$id_gao'",false);
             header("location:http://localhost/du-an-1-master/admin/products");
             $conn=getConnect();
          $stmt = $conn->prepare($sql);
          $stmt->execute();
          if($stmt->rowCount()>0){
             header("location:http://localhost/du-an-1-master/admin/products");
          }
          else{
            echo "không thể cập nhật";
        }
        }
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
        <div>
           <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_gao" value="<?=$row['id_gao']?>" id="">
        <table>
            <tr>
                <td>Tên gạo</td>
                <td><input type="text" name="name_gao" value="<?=$row['name_gao']?>" id=""></td>
            </tr>
            <tr>
                <td>Giá</td>
                <td><input type="number" name="price_gao" value="<?=$row['price_gao']?>" id=""></td>
            </tr>
            <tr>
                <td>Hình</td>
                <td>
                    <input type="hidden" name="anh" value="<?=$row['anh']?>">
                    <img src="image/<?=$row['anh']?>" width="120" alt="">
                    <input type="file" name="anh" id="">
                </td>
            </tr>
            <tr>
                <td>Mô tả</td>
                <td><textarea name="content_gao" id="" cols="50" rows="5"><?=$row['content_gao']?></textarea></td>
            </tr>
            <tr>
                <td>tiêu đề gạo</td>
                <td><textarea name="tieude_gao" id="" cols="50" rows="5"><?=$row['tieude_gao']?></textarea></td>
            </tr>
            <tr>
                <td>Nhà cung cấp</td>
                <td><textarea name="nha_cung_cap" id="" cols="50" rows="5"><?=$row['nha_cung_cap']?></textarea></td>
            </tr>
            <tr>
                <td>Thương hiệu</td>
                <td><textarea name="thuonghieu" id="" cols="50" rows="5"><?=$row['thuonghieu']?></textarea></td>
            </tr>
            <tr>
                <td>Loại gạo</td>
                <td>
                    <select name="id_loai" id="">
                        <?php
                        foreach ($loai as $l) {
                            if ($l['id_loai'] == $row['id_loai']) {
                            ?>
                            <option selected value="<?=$l['id_loai']?>"><?=$l['ten_loai']?></option>

                            <?php
                            }else {
                            ?>
                            <option value="<?=$l['id_loai']?>"><?=$l['ten_loai']?></option>
                            <?php
                            
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="sửa" name="btn_them">
                </td>
                
            </tr>
        </table>
    </form>
        </div>
        <?php require_once('../layouts/footer.php'); ?>
    </div>
    <?php require_once('../layouts/script.php'); ?>
</body>


</html>