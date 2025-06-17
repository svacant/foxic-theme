<?php
session_start();
require('../../db/functions.php');

$userId = $_SESSION['uid'];

$firstName  = stripslashes($_POST['firstName']);
$lastName   = stripslashes($_POST['lastName']);
$country    = stripslashes($_POST['country']);
$zipCode    = stripslashes($_POST['zipCode']);
$state      = stripslashes($_POST['state']);
$address    = stripslashes($_POST['address']);

if (!$userId) {
    $email = stripslashes($_POST['email']);
    $userId = (int)db_create_guest_user($email, $firstName, $lastName);
}

$isBillingAddress = isset($_POST['isBillingAddress']) && $_POST['isBillingAddress'] === "true" ? 1 : 0;

if ($userId) {
    try {
        db_delete_addresses($userId, $isBillingAddress);
    } catch (Exception $e) {
        echo json_encode(['error' => 'Could not remove existing address']);
        return;
    }
}

try {
    db_insert_address([
        'first_name' => $firstName,
        'last_name' => $lastName,
        'country' => $country,
        'zip_code' => $zipCode,
        'state' => $state,
        'user_id' => $userId,
        'address' => $address,
        'is_billing_address' => $isBillingAddress,
    ]);
} catch (Exception $e) {
    echo json_encode(['error' => 'Could not save new address.']);
    return;
}

echo json_encode(['message' => 'Success.']);
return;
