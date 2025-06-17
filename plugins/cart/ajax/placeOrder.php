<?php
include "../../../data.php";
include '../../db/functions.php';

$sess = session_id();
$cart_cache = $cache->get("cart_" . $sess);

$cart = $cart_cache['cart'];

$email = db_get_user_email((int)$_SESSION['uid']);

$items = [];
foreach ($cart as $itemId => $item) {
    $items['products.' . $itemId] = $item['qty'];
}

if (!$email) {
    echo json_encode(['error' => 'Could not retrieve user email.']);
    return;
}

$shippingAddress = db_get_shipping_address((int)$_SESSION['uid']);

// Shipping cost might be provided by the client. Default to 0 when missing.
$ship_cost = isset($_POST['ship_cost']) ? $_POST['ship_cost'] : 0;

if (!$shippingAddress) {
    echo json_encode(['error' => 'Could not retrieve shipping address.']);
    return;
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.shoppiapp.com/api/checkout/placeAll/json");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
    'items' => $items,
    'email' => $email,
    'name' => $shippingAddress['first_name'],
    'surname' => $shippingAddress['last_name'],
    'address' => $shippingAddress['address'],
    'address2' => $shippingAddress['address'],
    'ship_cost' => $ship_cost,
    'city' => $shippingAddress['city'],
    'country' => $shippingAddress['country'],
]));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

curl_close($ch);

echo $response;
return;
