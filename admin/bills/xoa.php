<?php
require_once '../../helpers/db.php';
$id_hoadon = $_GET['id_hoadon'];
$sqlQuery = "select * from hoadon where id_hoadon = $id_hoadon";
$hoadon = executeQuery($sqlQuery, false);

if ($hoadon) {
    $sqlRemoveProducts = "delete from hoadon where id_hoadon = $id_hoadon";
    executeQuery($sqlRemoveProducts, false);
}

header("location: ../bills");
