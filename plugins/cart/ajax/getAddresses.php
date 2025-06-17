<?php
session_start();
require('../../db/functions.php');

$userId = $_SESSION['uid'];

if (!$userId) {
    echo json_encode(['error' => 'Unauthenticated.']);
    return;
}

try {
    $data = db_get_addresses($userId);
} catch (Exception $e) {
    echo json_encode(['error' => 'Could not retrieve addresses.']);
    return;
}

echo json_encode($data);
return;
