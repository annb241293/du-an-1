<?php
require_once('../../helpers/db.php');
require_once('../../helpers/const.php');
$id_slide=$_GET['id_slide'];
$sql="SELECT*FROM slide WHERE id_slide='$id_slide'";
$row=executeQuery($sql);
if(isset($_POST['btn_them'])){
        $link_slide=$_POST['link_slide'];
        $id_slide=$_POST['id_slide'];
        $anh_slide=$_POST['anh_slide'];
        if($link_slide==""){
            $message.="bạn không được để trống thông tin";
        }
       if(isset($_FILES['anh_slide']['name']) && ($_FILES['anh_slide']['name'])!=""){
            $size=$_FILES['anh_slide']['size'];
            $temp=$_FILES['anh_slide']['tmp_name'];
            $anh_slide=$_FILES['anh_slide']['name'];
            unlink("anh_slide_image/$old_image");
            move_uploaded_file($temp, "anh_slide_image/$old_image");
        }
         $sql="UPDATE slide SET link_slide='$link_slide', anh_slide='$anh_slide' WHERE id_slide='$id_slide'";
         $conn=getConnect();
          $stmt = $conn->prepare($sql);
          $stmt->execute();
          if($stmt->rowCount()>0){
             header("location:http://localhost/du-an-1-master/admin/slide");
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
        <?php require_once('../layouts/header.php'); ?>

   
    <div class="body-wrapper">
         <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_slide" value="<?=$row['id_slide']?>" id="">
        <table>
            <tr>
                <td>Link slide</td>
                <td><input type="text" name="link_slide" value="<?=$row['link_slide']?>" id=""></td>
            </tr>
            <tr>
                <td>Hình slide</td>
                <td>
                    <input type="hidden" name="anh_slide" value="<?=$row['anh_slide']?>">
                    <img src="images/<?=$row['anh_slide']?>" width="120" alt="">
                    <input type="file" name="anh_slide" id="">
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