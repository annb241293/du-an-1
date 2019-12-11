<?php
require_once '../../helpers/db.php';
$id_gao = $_GET['id_gao'];
$sqlQuery = "select * from gao where id_gao = $id_gao";
$products = executeQuery($sqlQuery, false);

if ($products) {
    $sqlRemoveProducts = "delete from gao where id_gao = $id_gao";
    executeQuery($sqlRemoveProducts, false);
}

header("location: ../products");
