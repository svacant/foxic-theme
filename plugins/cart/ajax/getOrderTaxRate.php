<?php

include "../../../data.php";

$orderId = $_POST['orderId'];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://www.shoppiapp.com/api/orders/tax/json");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
    'id' => $orderId
]));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

curl_close ($ch);

echo $response;
return;