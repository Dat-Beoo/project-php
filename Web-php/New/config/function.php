<?php 

function cart_items(){
	$carts = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

	return $carts;
}

function totalQtt(){
	$t = 0;

	foreach (cart_items() as $key => $item) {
		$t += $item['quantity'];
	}

	return $t;
}


function totalPrice(){
	$t = 0;

	foreach (cart_items() as $key => $item) {
		$t += $item['quantity']*$item['price'];
	}

	return $t;
}

?>

