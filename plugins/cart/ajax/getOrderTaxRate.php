<?php

include "../../../data.php";

$country = $_REQUEST['country'];

// Cache tax rate per country so the API is not called too often.
$cacheKey = 'tax_rate_' . md5($country);
$cached = $cache->get($cacheKey);
if ($cached) {
    echo $cached;
    return;
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://www.shoppiapp.com/api/orders/tax/json");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
    'country' => $country
]));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

curl_close ($ch);

if ($response) {
    $cache->set($cacheKey, $response, 3600);
}

echo $response;
return;
