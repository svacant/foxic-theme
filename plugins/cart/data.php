<?php
include "../../data.php";

$sess = session_id();



$cart_cache = $cache->get("cart_".$sess);


echo json_encode($cart_cache);






