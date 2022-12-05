<?php
include "../../data.php";

$sess = session_id();



$cart_cache = $mem_var->get("cart_".$sess);


echo json_encode($cart_cache);






