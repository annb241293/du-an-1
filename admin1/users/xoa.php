<?php
require_once '../../helpers/common.php';
require_once '../../helpers/db.php';

if ($_SESSION['auth'] == null) {
    header('location: ../../login');
}

$userId = $_GET['id'];
if ($userId == $_SESSION['auth']['id']) {
    header("location: ./index.php?msg=khong the xoa");
    die;
}

$sqlQuery = "select * from users where id = $userId";
$user = executeQuery($sqlQuery, false);

if ($user) {
    $sqlRemoveProducts = "delete from users where id = $userId";
    executeQuery($sqlRemoveProducts, false);
}

header("location: ../users");
