<?php
require_once('../../helpers/db.php');
require_once('../../helpers/const.php');
 if (isset($_POST['them'])) {
        extract($_REQUEST);
        //Validate giá
        if ( $username=="" || $password == "" || $email== "" || $role== "" ) {
            $message="bạn phải nhập đủ thông tin";
        }
        else{
            $sql ="INSERT INTO users(name, password, email, role) 
                              Values('$username','$password','$email','$role')";

          $conn=getConnect();
          $stmt = $conn->prepare($sql);
          $stmt->execute();
          if($stmt->rowCount()>0){
             header("location:../");
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
                <td>Tên đăng nhập</td>
                <td><input type="text" name="username" id=""></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="Password" name="password"  id=""></td>
            </tr>
            <tr>
                <td>email</td>
                <td>
                    <input type="email" name="email" id="">
                </td>
            </tr>
            <tr>
                <td>Phân quyền</td>
                <td><input type="number" name="role"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" value="them" name="them">Thêm tài khoản</button>
                </td>                
            </tr>
        </table>
    </form>
        <?php require_once('../layouts/footer.php'); ?>
    </div>
    <?php require_once('../layouts/script.php'); ?>
</body>


</html>