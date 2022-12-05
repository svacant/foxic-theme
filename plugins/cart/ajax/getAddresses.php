<?php

session_start();
require('../../db/db.php');

$userId = $_SESSION['uid'];

if (!$userId) {
    echo json_encode(['error' => 'Unauthenticated.']);
    return;
}

$query = "select * from `addresses` where `user_id` = $userId";

try {
    $result = mysqli_query($con, $query);
    $rows = mysqli_num_rows($result);
} catch (\Exception $exception) {
    echo json_encode(['error' => 'Could not retrieve addresses.']);
    return;
}

$data = [];
if ($rows >= 1) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

echo json_encode($data);
return;