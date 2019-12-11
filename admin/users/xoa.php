<?php
require_once '../../helpers/db.php';
$userId = $_GET['id_user'];
$sqlQuery = "select * from users where id_user = $userId";
$user = executeQuery($sqlQuery, false);

if ($user) {
    $sqlRemoveProducts = "delete from users where id_user = $userId";
    executeQuery($sqlRemoveProducts, false);
}

header("location: ../users");
