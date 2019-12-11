<?php
require_once "../helpers/db.php";

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$passConfirm = $_POST['passwordConfirm'];
if ($email == '' || $name == '' || $password == '' || $passConfirm == '') {
    header("location: ./index.php?alert=không được trống các trường");
    die;
}
$sqlQuery = "select * from users where email = '$email'";
$user = executeQuery($sqlQuery, false);

if (!$user && $passConfirm == $password) {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $saveQuery = "insert into users (name, email, password, role) 
    values ('$name', '$email', '$password',1)";
    executeQuery($saveQuery, false);
    header("location: ./index.php?alert=Đăng ký thành công");
} else {
    header("location: ./index.php?alert=Mật khẩu không đúng");
}
