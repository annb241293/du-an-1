<?php
require_once '../helpers/const.php';
require_once '../helpers/db.php';

$id = $_GET['id'];
foreach ($_SESSION['cart'] as $index => $i) {
    if ($i['id'] == $id) {
        unset($_SESSION['cart'][$index]);
        break;
    }
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
