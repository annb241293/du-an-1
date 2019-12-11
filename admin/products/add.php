<?php
require_once('../../helpers/db.php');
require_once('../../helpers/const.php');
     if (isset($_POST['btn_them'])) {
        $name_gao=$_POST['name_gao'];
        $price_gao=$_POST['price_gao'];
        $content_gao=$_POST['content_gao'];
        $tieude_gao=$_POST['tieude_gao'];
        $nha_cung_cap=$_POST['nha_cung_cap'];
        $thuonghieu=$_POST['thuonghieu'];
        extract($_REQUEST);
        //Validate giá
        if($name_gao=="" || $price_gao=="" || $content_gao==""|| $content_gao=="" || $tieude_gao=="" || $nha_cung_cap=="" || $thuonghieu==""){
            echo "bạn cần phải nhập đủ thông tin";
        }

        elseif ( $price_gao=="" || $price_gao < 0 ) {
            echo  "Giá phải là số dương<br>";
        }
        //Validate ảnh
       $img = ["image/jpeg", "image/jpg", "image/png"];
        elseif ( $_FILES['anh']['size'] >= 2000000 || in_array($_FILES['anh']['type'], $img) == false ) {
            echo "File phải là ảnh nhỏ hơn 2MB";
        }else {
            $image = $_FILES['anh']['name'];
            move_uploaded_file($_FILES['anh']['tmp_name']. $image);
        }
        //Làm việc thêm mới
            $sql="INSERT INTO gao(name_gao, price_gao, anh, content_gao, tieude_gao, nha_cung_cap,thuonghieu,id_loai) Values('$name_gao', '$price_gao', '$image', '$content_gao', '$tieude_gao', '$nha_cung_cap','$thuonghieu','$id_loai')";
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
         <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_gao" id="">
        <table>
            <tr>
                <td>Tên Gạo</td>
                <td><input type="text" name="name_gao" id=""></td>
            </tr>
            <tr>
                <td>Giá</td>
                <td><input type="number" name="price_gao"  id=""></td>
            </tr>
            <tr>
                <td>Hình</td>
                <td>
                    <input type="file" name="anh" id="">
                </td>
            </tr>
            <tr>
                <td>Mô tả</td>
                <td><textarea name="content_gao" id="" cols="50" rows="5"></textarea></td>
            </tr>
            <tr>
                <td>Tiêu đề gạo</td>
                <td><textarea name="tieude_gao" id="" cols="50" rows="5"></textarea></td>
            </tr>
            <tr>
                <td>Thương hiệu</td>
                <td><input type="text" name="thuonghieu" ></input></td>
            </tr>
             <tr>
                <td>Nhà cung cấp</td>
                <td><input type="text" name="nha_cung_cap" ></input></td>
            </tr>
            <tr>
                <td>Loại gạo</td>
                <td><input type="text" name="id_loai"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="Thêm gạo" name="btn_them">
                </td>
                
            </tr>
        </table>
    </form>
        <?php require_once('../layouts/footer.php'); ?>
    </div>
    <?php require_once('../layouts/script.php'); ?>
</body>


</html>