<?php

include "../../../data.php";

$country = $_POST['country'];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://www.shoppi.app/api/orders/ship_cost/json");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch,CURLOPT_HTTPHEADER,array('lkey:$lkey','uid:$uid'));
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(['country' => $country]));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$server_output = curl_exec($ch);
curl_close ($ch);
echo $server_output;