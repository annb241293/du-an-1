<?php
require_once('../helpers/db.php');
require_once('../helpers/const.php');
extract($_REQUEST);
$sql = "INSERT INTO hoadon(name, dia_chi, email, phone_number) 
Values('$name','$dia_chi','$email','$phone_number')";

executeQuery($sql);
$lastID = "SELECT MAX(id_hoadon) AS LastID FROM hoadon";
$lastID = executeQuery($lastID, false);
// dd($lastID);
// dd($id_gao);
$insert = "insert into chitiet_don (id_gao,id_hoadon,quantity) values";
foreach ($id_gao as $index => $id) {
    $insert .= "('$id_gao[$index]','$lastID[0]','$quantity[$index]'),";
}

$insert = substr($insert, 0, strlen($insert) - 1);
executeQuery($insert);

header('Location: ' .BASE_URL.'?alert=dat hang thanh cong');
