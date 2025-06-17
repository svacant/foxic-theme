<?php
session_start();
require('../../db/functions.php');

$userId = (int)$_SESSION['uid'];

$shoppiOrderId = stripslashes($_POST['shoppiOrderId']);
$totalValue = (float)$_POST['totalValue'];

try {
    db_save_order($userId, $shoppiOrderId, $totalValue);
} catch (Exception $e) {
    echo json_encode(['error' => 'Could not save new order.']);
    return;
}

echo json_encode(['message' => 'Success.']);
return;
