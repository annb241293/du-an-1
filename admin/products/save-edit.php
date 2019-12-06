<?php
require_once '../../helpers/common.php';
require_once '../../helpers/db.php';
session_start();

if($_SESSION['auth'] == null){
    header('location: ../login/');
}

$id = $_POST['id'];
$name = $_POST['name'];
$short_desc = $_POST['short_desc'];
$image = $_FILES['image'];

$sqlQuery = "select * from products where id = $id";
$product = executeQuery($sqlQuery, false);

$filename = $product['image'];

$err = false;
if(strlen($name) == 0){
    $err = true;
    $nameerr = "Vui lòng nhập giá trị cho tên danh mục";
} else if(strlen($name) > 255){
    $err = true;
    $nameerr = "Số lượng ký tự không vượt quá 255";
}

if(strlen($short_desc) == 0){
    $err = true;
    $short_descerr = "Vui lòng nhập giá trị";
} else if(strlen($name) > 255){
    $err = true;
    $nameerr = "Số lượng ký tự không vượt quá 255";
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
        $filename = "uploads/products/" . uniqid() . "-" . $image['name'];
        move_uploaded_file($image['tmp_name'], '../../public/'. $filename);
    }

    // sinh ra cau sql tu du lieu da xu ly
    $sqlQuery = "update products 
                    set name = '$name', 
                    short_desc = '$short_desc', 
                    image = '$filename'
                where id = $id";
    executeQuery($sqlQuery, false);

    header("location: ../products");
    die;
}

header("location: ./edit.php?id=$id&nameerr=$nameerr&imgerr=$imgerr&short_desc=$short_desc");






?>