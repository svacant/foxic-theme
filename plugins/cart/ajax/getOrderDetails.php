<?php
include "../../../data.php";

$orderId = isset($_GET['id']) ? $_GET['id'] : $_GET['orderId'];

$cacheKey = 'order_details_' . md5($orderId);
if ($orderId && ($cached = $cache->get($cacheKey))) {
    echo $cached;
    return;
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.shoppiapp.com/api/orders/view/json?id=".$orderId);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

if ($response) {
    $cache->set($cacheKey, $response, 3600);
}

echo $response;
return;

