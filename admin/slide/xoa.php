<?php
require_once '../../helpers/db.php';
$id_slide = $_GET['id_slide'];
$sqlQuery = "select * from slide where id_slide = $id_slide";
$products = executeQuery($sqlQuery, false);

if ($products) {
    $sqlRemoveProducts = "delete from slide where id_slide = $id_slide";
    executeQuery($sqlRemoveProducts, false);
}

header("location: ../slide");
