<?php
require_once '../../helpers/common.php';
require_once '../../helpers/db.php';
session_start();

if($_SESSION['auth'] == null){
    header('location: ../../login/cp-login.php');
}

$productId = $_GET['id'];

// kiem tra xem id san pham co ton tai that hay khong
$sqlQuery = "select * from products where id = $productId";
$product = executeQuery($sqlQuery, false);

if($product){
    $sqlRemoveProducts = "delete from products where id = $productId";
    executeQuery($sqlRemoveProducts, false);
}

header("location: ../products");



?>