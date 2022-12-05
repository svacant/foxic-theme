<?php

session_start();
require('../../db/db.php');

$userId = (int)$_SESSION['uid'];

$shoppiOrderId = stripslashes($_POST['shoppiOrderId']);
$shoppiOrderId = mysqli_real_escape_string($con, $shoppiOrderId);
$totalValue = (float)$_POST['totalValue'];

try {
    $query = "INSERT INTO `orders` (
                `user_id`, 
                `shoppi_order_id`,
                `total_value`
         ) VALUES (
                $userId,
                '$shoppiOrderId',
                $totalValue
         )";
    $result = mysqli_query($con, $query);
} catch (\Exception $exception) {
    echo json_encode(['error' => 'Could not save new order.']);
    return;
}

if (!$result) {
    echo json_encode(['error' => 'Could not save new order.']);
    return;
}

if (mysqli_errno($con)) {
    echo json_encode(['error' => 'Could not save new order.']);
    return;
}

echo json_encode(['message' => 'Success.']);
return;