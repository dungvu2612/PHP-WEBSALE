<?php
session_start();
if(!empty($_POST)) {
	require_once('./db/dbconfig.php');
	require_once('./utility.php');
	$action = getPost('action');
	$id = getPost('id');

	switch ($action) {
		case 'add':
			addToCart($id);
			break;
		case 'delete':
			deleteItem($id);
			break;
		case 'update':
			$newQuantity = getPost('newQuantity');
			updateToCart($id,$newQuantity);
			break;
		case 'order':
			order();
			break;
	}
}
function deleteItem($id) {
	$cart = [];
	if(isset($_SESSION['cart'])) {
		$cart = $_SESSION['cart'];
	}
	for ($i=0; $i < count($cart); $i++) {
		if($cart[$i]['id'] == $id) {
			array_splice($cart, $i, 1);
			break;
		}
	}
	$_SESSION['cart'] = $cart;
}
function addToCart($id) {
	$cart = [];
	if(isset($_SESSION['cart'])) {
		$cart = $_SESSION['cart'];
	}
	$isFind = false;
	for ($i=0; $i < count($cart); $i++) {
		if($cart[$i]['id'] == $id) {
			$cart[$i]['num']++;
			$isFind = true;
			break;
		}
	}
	if(!$isFind) {
		$product = executeResult('select * from product where id = '.$id, true);
		$product['num'] = 1;
		$cart[] = $product;
	}
	$_SESSION['cart'] = $cart;
}
function updateToCart($id,$newQuantity) {
	$cart = [];
	if(isset($_SESSION['cart'])) {
		$cart = $_SESSION['cart'];
	}
	for ($i=0; $i < count($cart); $i++) {
		if($cart[$i]['id'] == $id) {
			$cart[$i]['num'] = $newQuantity;
			break;
		}
	}
	$_SESSION['cart'] = $cart;
}
function order(){
	$cart = [];
	if(isset($_SESSION['cart'])) {
		$cart = $_SESSION['cart'];
	}

	$email = $_SESSION['user'];

	$user = executeResult("SELECT * FROM user_db WHERE email = '$email'",true);
	$id_user = $user['id'];
	$date_time = date('Y-m-d H:i:s');


	$insert_order = "INSERT INTO `order`(`id_user`,`date_time`) VALUES ('$id_user','$date_time')";
	execute($insert_order);

	
	$selectOrder = "SELECT * FROM `order` WHERE `id_user` = '$id_user' AND `date_time` = '$date_time'";
	$order= executeResult($selectOrder,true);
	$id_order = $order['id'];
	for ($i=0; $i < count($cart); $i++) {
		$id_product = $cart[$i]['id'];
		$num = $cart[$i]['num'];
		$insert_product = "INSERT INTO `order_detail`(`id_order`,`id_product`,`num`) VALUES ($id_order,$id_product,$num)";
		execute($insert_product);
	}
	unset($_SESSION['cart']); 

}

