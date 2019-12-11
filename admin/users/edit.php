<?php
require_once('../../helpers/db.php');
require_once('../../helpers/const.php');
$id_user=$_GET['id_user'];
$user=executeQuery("SELECT*FROM users WHERE id_user='$id_user'");
if (isset($_POST['btn_them'])) {
        extract($_REQUEST);
        $id_user=$_POST['id_user'];
        $password=$_POST['password'];
        $email=$_POST['email'];
        $username=$_POST['username'];
        if($password==""|| $email=="" || $username==""){
            echo "bạn phải nhập đầy đủ thông tin";
        }
        else{
        $sql="UPDATE users SET password='$password',name='$username',email='$email' WHERE id_user='$id_user'";
            $conn=getConnect();
          $stmt = $conn->prepare($sql);
          $stmt->execute();
          if($stmt->rowCount()>0){
             header('Location: ../' );
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
        <input type="hidden" name="id_user" value="<?=$user['id_user']?>" id="">
        <table>
            <tr>
                <td>Tên Tài khoản</td>
                <td><input type="text" name="username" value="<?=$user['name']?>" id=""></td>
            </tr>
            <tr>
                <td>Mật khẩu</td>
                <td><input type="pass" name="password" value="<?=$user['password']?>" id=""></td>
            </tr>
             <tr>
                <td>email</td>
                <td><input type="email" name="email" value="<?=$user['email']?>" id=""></td>
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