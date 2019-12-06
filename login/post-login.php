<?php
require_once "../helpers/db.php";
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$sqlQuery = "select * from users where email = '$email'";
$user = executeQuery($sqlQuery, false);

if(!$user || !(password_verify($password,$user['password']))){
    header('location: ./index.php?alert=Sai thông tin tài khoản');
    die;
}

$_SESSION['auth'] = $user;
if($user['role'] == 1){
    header('location: ../');
    die;
}

header('location: ../admin');
