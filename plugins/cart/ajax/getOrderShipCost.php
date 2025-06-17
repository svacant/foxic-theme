<?php

include "../../../data.php";

$country = $_REQUEST['country'];

// Use a cache to avoid requesting the remote API every time.
$cacheKey = 'ship_cost_' . md5($country);
$cached = $mem_var->get($cacheKey);
if ($cached) {
    echo $cached;
    return;
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://www.shoppi.app/api/orders/ship_cost/json");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch,CURLOPT_HTTPHEADER,array('lkey:$lkey','uid:$uid'));
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(['country' => $country]));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $server_output = curl_exec($ch);
  curl_close ($ch);
  if ($server_output) {
      $mem_var->set($cacheKey, $server_output, 3600);
  }
  echo $server_output;
