<?php
require_once '../helpers/const.php';
require_once '../helpers/db.php';

$id = $_GET['id'];
$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : '1';
// $quantity= intval($quantity);
$sqlQuery = "select * from gao where id_gao = $id";
$product = executeQuery($sqlQuery);

if (!isset($_SESSION['cart']) || $_SESSION['cart'] == null) {
	$_SESSION['cart'] = [];
	$_SESSION['cart'][] = [
		'id' => $product['id_gao'],
		'name' => $product['name_gao'],
		'price' => $product['price_gao'],
		'feature_image' => $product['anh'],
		'quantity' => $quantity
	];
} else {
	$cart = $_SESSION['cart'];
	$existed = -1;
	foreach ($cart as $index => $item) {
		if ($item['id'] == $product['id_gao']) {
			$existed = $index;
			break;
		}
	}

	if ($existed == -1) {
		$cart[] = [
			'id' => $product['id_gao'],
			'name' => $product['name_gao'],
			'price' => $product['price_gao'],
			'feature_image' => $product['anh'],
			'quantity' => $quantity
		];
	} else {
		$cart[$existed]['quantity'] += $quantity;
	}
	$_SESSION['cart'] = $cart;
}

header('Location: ' . $_SERVER['HTTP_REFERER']);

