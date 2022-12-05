<?php
include "../../../data.php";

$sess = session_id();

$id = $_POST['data']['id'];
$url = $_POST['data']['url'];
$name = $_POST['data']['name'];
$price = $_POST['data']['price'];
$path = $_POST['data']['path'];

if (!isset($_POST['qty'])) {
    $qty = $_POST['data']['qty'];
} else {
    $qty = $_POST['qty'];
}

$cart['cart'][$id] = array('name'=>$name, 'image' => $path, 'price' => $price, 'qty'=>$qty, 'url'=> $url);

foreach($cart['cart'] as $productId => $product) {
    if ($product['qty'] == 0) {
        unset($cart['cart'][$productId]);
    }
}

$cart_cache = $mem_var->get("cart_".$sess);

unset($cart_cache['cart'][$id]);


$cart_data =  array_replace_recursive((array)$cart, (array)$cart_cache);


$mem_var->set('cart_'.$sess, $cart_data);

print_r($cart_data);




