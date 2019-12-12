<?php
require_once "../helpers/db.php";
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$sqlQuery = "select * from users where email = '$email'";
$user = executeQuery($sqlQuery, false);

if(!$user || !(password_verify($password,$user['password']))){
    header('Location: ' . $_SERVER['HTTP_REFERER'].'?alert=Sai thông tin tài khoản');
    die;
}

$_SESSION['auth'] = $user;
if($user['role'] == 0){
    header('location: ../admin');
    die;
}

header('Location: ' . $_SERVER['HTTP_REFERER']);

