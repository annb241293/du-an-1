<?php
require_once '../../helpers/common.php';
require_once '../../helpers/db.php';

if($_SESSION['auth'] == null){
    header('location: ../login/');
}

$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$image = $_FILES['avatar'];
$filename ='uploads/default-img.png';
// validate du lieu
$err = false;
$emailRegex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
if(strlen($name) == 0){
    $err = true;
    $nameerr = "Vui lòng nhập giá trị ";
} else if(strlen($name) > 255){
    $err = true;
    $nameerr = "Số lượng ký tự không vượt quá 255";
}
if(strlen($email) == 0){
    $err = true;
    $emailerr = "Vui lòng nhập giá trị ";
} else if(!preg_match($emailRegex,$email)){
    $err = true;
    $emailerr = "không phải là email";
}
if(strlen($address) == 0){
    $err = true;
    $addresserr = "Vui lòng nhập giá trị ";
} else if(strlen($name) > 255){
    $err = true;
    $addresserr = "Số lượng ký tự không vượt quá 255";
}


$allowed =  ['gif','png' ,'jpg', 'jpeg','PNG','JPG','JPEG'];
$oriName = $image['name'];
$ext = pathinfo($oriName, PATHINFO_EXTENSION);
if($image['size'] > 0 && !in_array($ext,$allowed) ) {
    $err = true;
    $imgerr = "Vui lòng chọn đúng định dạng file (gif, png, jpg, jpeg)";
}

// khong bi loi
if($err == false){

    // Luu anh
    if($image['size'] > 0){
        $filename = "uploads/users/" . uniqid() . "-" . $image['name'];
        move_uploaded_file($image['tmp_name'], '../../public/'. $filename);
    }
    // sinh ra cau sql tu du lieu da xu ly
    $sqlQuery = "insert into users (name, email, address,avatar) 
    values ('$name', '$email','$address','$filename')";
    executeQuery($sqlQuery, false);

    header("location: ../users?msg=thêm thành công");
    die;
}

header("location: ./add.php?nameerr=$nameerr&imgerr=$imgerr&emailerr=$emailerr&addresserr=$addresserr");






?>