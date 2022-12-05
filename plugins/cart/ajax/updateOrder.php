<?php

include "../../../data.php";

$orderId = $_POST['orderId'];
$itemId = $_POST['itemId'];
$pcs = $_POST['pcs'];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://www.shoppiapp.com/api/orders/update/json");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
    'id' => $orderId,
    'item_id' => $itemId,
    'pcs' => $pcs
]));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

curl_close ($ch);

echo $response;
return;