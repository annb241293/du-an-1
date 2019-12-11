<?php
require_once '../../helpers/db.php';
$id_loai = $_GET['id_loai'];
$sqlQuery = "select * from loai where id_loai = $id_loai";
$loai = executeQuery($sqlQuery, false);

if ($loai) {
    $sqlRemoveProducts = "delete from loai where id_loai = $id_loai";
    executeQuery($sqlRemoveProducts, false);
}

header("location: ../classes");
