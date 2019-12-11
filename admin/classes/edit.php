<?php
require_once('../../helpers/db.php');
require_once('../../helpers/const.php');
$id_loai=$_GET['id_loai'];
$sql="SELECT*FROM loai WHERE id_loai='$id_loai'";
$row=executeQuery($sql);
if (isset($_POST['btn_them'])) {
        extract($_REQUEST);
        $id_loai=$_POST['id_loai'];
        $ten_loai=$_POST['ten_loai'];
        if($ten_loai==''){
            echo "mời bạn nhập đúng thông tin";
        }
        else{
        $sql="UPDATE loai SET ten_loai='$ten_loai' WHERE id_loai='$id_loai'";
        $conn=getConnect();
          $stmt = $conn->prepare($sql);
          $stmt->execute();
          if($stmt->rowCount()>0){
             header("location:http://localhost/du-an-1-master/admin/classes");
          }
          else{
            echo "không thể cập nhật";
          }
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
        <input type="hidden" name="id_loai" value="<?=$row['id_loai']?>" id="">
        <table>
            <tr>
                <td>Thay đổi tên</td>
                <td><input type="pass" name="ten_loai" value="<?=$row['ten_loai']?>" id=""></td>
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