<?php 
session_start();
include 'config/connect.php';

$id = isset($_GET['id']) ? $_GET['id'] : 0;
$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : 1;
$action = isset($_GET['action']) ? $_GET['action'] : 'add';
$pro = $conn->query("SELECT * FROM product WHERE id = $id")->fetch();
$price = ($pro['sale_price'] > 0 ) ? $pro['sale_price'] : $pro['price'];

// hành đông thêm vào
if ($action =='add' && $pro) {
	if (isset($_SESSION['cart'][$id])) {
		$_SESSION['cart'][$id]['quantity'] += $quantity;
	}else{
		$cart_item = [
			'id' => $pro['id'],
			'name' => $pro['name'],
			'image' => $pro['image'],
			'price' => $price,
			'quantity' => $quantity,
			'sub_tottal' => $quantity*$price,
		];

		$_SESSION['cart'][$id] = $cart_item;
	}
	
}

// hành động xóa một sản phẩm khỏi giỏ hàng
if ($action =='remove') {
	if (isset($_SESSION['cart'][$id])) {
		unset($_SESSION['cart'][$id]);
	}
}
// hành động cập nhật số lượng
if ($action =='update') {
	$qtt_up = $_GET['qtt_update'];
	$id_up = $_GET['id_update'];

	for ($i=0; $i < count($qtt_up); $i++) { 
		if (isset($_SESSION['cart'][$id_up[$i]])) {
			$qtt = $qtt_up[$i] > 0 ? $qtt_up[$i] : 1;
			$_SESSION['cart'][$id_up[$i]]['quantity'] = $qtt;
		}
	}
}

// hành động xóa hết giỏ hàng
if ($action =='clear') {
	unset($_SESSION['cart']);
}
header('location: cart.php');
echo '<pre>';
print_r($_SESSION['cart']);
echo '</pre>';
?>