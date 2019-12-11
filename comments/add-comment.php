<?php
require_once('../helpers/db.php');
require_once('../helpers/const.php');
$username = isset($_POST['username']) ? $_POST['username'] : '';
$noidung_comment = isset($_POST['noidung_comment']) ? $_POST['noidung_comment'] : '';
$id_gao = isset($_POST['id_gao']) ? $_POST['id_gao'] : '';

$insertQuery = "insert into comment (username, noidung_comment,id_gao) 
values ('$username','$noidung_comment','$id_gao')";
executeQuery($insertQuery);
 header('Location: ' . $_SERVER['HTTP_REFERER']);
