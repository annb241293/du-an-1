<?php
require_once('../../helpers/db.php');
require_once('../../helpers/const.php');
 if (isset($_POST['them'])) {
        extract($_REQUEST);
           if ($_POST['ten_loai']=="") {
               alert "bạn không được để trống";
           }
           else{
            $sql ="INSERT INTO loai(ten_loai) Values('$ten_loai')";
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
         <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_user" id="">
        <table>
            <tr>
                <td>Tên loại</td>
                <td><input type="text" name="ten_loai" id=""></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" value="them" name="them">Thêm loại</button>
                </td>                
            </tr>
        </table>
    </form>
        <?php require_once('../layouts/footer.php'); ?>
    </div>
    <?php require_once('../layouts/script.php'); ?>
</body>


</html>