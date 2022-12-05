<?php

include "../../../data.php";

$orderId = $_POST['orderId'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$city = $_POST['city'];
$address = $_POST['address'];
$address2 = $_POST['address2'];
$zip = $_POST['zip'];
$telephone = $_POST['telephone'];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://www.shoppiapp.com/api/orders/delivery/json");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
    'id' => $orderId,
    'name' => $name,
    'surname' => $surname,
    'city' => $city,
    'address' => $address,
    'address2' => $address2,
    'zip' => $zip,
    'telephone' => $telephone
]));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

curl_close ($ch);

echo $response;
return;