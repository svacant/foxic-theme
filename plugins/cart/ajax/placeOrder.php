<?php

include "../../../data.php";
include '../../db/db.php';

$sess = session_id();
$cart_cache = $mem_var->get("cart_" . $sess);

$cart = $cart_cache['cart'];

$email = getUserEmail($con);
$pageId = 52;

$items = [];
foreach ($cart as $itemId => $item) {
    $items['products.'.$itemId] = $item['qty'];
}

if (!$email) {
    echo json_encode(['error' => 'Could not retrieve user email.']);
    return;
}

$shippingAddress = getShippingAddress($con);

if (!$shippingAddress) {
    echo json_encode(['error' => 'Could not retrieve shipping address.']);
    return;
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.shoppiapp.com/api/checkout/placeAll/json");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
    'pageId' => $pageId,
    'items' => $items,
    'email' => $email,
    'name' => $shippingAddress['first_name'],
    'surname' => $shippingAddress['last_name'],
    'address' => $shippingAddress['address'],
    'address2' => $shippingAddress['address']
]));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

curl_close($ch);

echo $response;
return;

function getUserEmail($con)
{
    $userId = (int)$_SESSION['uid'];
    $query = "SELECT `email` from `users` where `id` = $userId";

    $result = mysqli_query($con, $query);
    $rows = mysqli_num_rows($result);

    if ($rows >= 1) {
        while ($row = $result->fetch_assoc()) {
            return $row['email'];
        }
    }

    return "";
}

function getShippingAddress($con)
{
    $userId = (int)$_SESSION['uid'];
    $query = "SELECT * from `addresses` where `user_id` = $userId and `is_billing_address` = 0";

    $result = mysqli_query($con, $query);
    $rows = mysqli_num_rows($result);

    while ($row = $result->fetch_assoc()) {
        return $row;
    }

    return [];
}
