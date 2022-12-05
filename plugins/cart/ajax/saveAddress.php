<?php

session_start();
require('../../db/db.php');

$userId = $_SESSION['uid'];

$firstName  = stripslashes($_POST['firstName']);
$lastName   = stripslashes($_POST['lastName']);
$country    = stripslashes($_POST['country']);
$zipCode    = stripslashes($_POST['zipCode']);
$state      = stripslashes($_POST['state']);
$address    = stripslashes($_POST['address']);

$firstName  = mysqli_real_escape_string($con, $firstName);
$lastName   = mysqli_real_escape_string($con, $lastName);
$country    = mysqli_real_escape_string($con, $country);
$zipCode    = mysqli_real_escape_string($con, $zipCode);
$state      = mysqli_real_escape_string($con, $state);
$address    = mysqli_real_escape_string($con, $address);

if (!$userId) {
    $email = stripslashes($_POST['email']);
    $email = mysqli_real_escape_string($con, $email);
    $userId = (int)createGuestUser($email, $firstName, $lastName, $con);
}

if (isset($_POST['isBillingAddress'])) {
    $isBillingAddress = $_POST['isBillingAddress'] === "true" ? 1 : 0;
} else {
    $isBillingAddress = 0;
}

if ($userId) {
    try {
        $deleteExistingAddresses = "DELETE FROM `addresses` 
            WHERE `user_id` = $userId 
            AND `is_billing_address` = $isBillingAddress";
        mysqli_query($con, $deleteExistingAddresses);
    } catch (\Exception $exception) {
        echo json_encode(['error' => 'Could not remove existing address']);
        return;
    }
}

try {
    $query = "INSERT INTO `addresses` (
                `first_name`, 
                `last_name`,
                `country`,
                `zip_code`,
                `state`,
                `user_id`,
                `address`,
                `is_billing_address`
         ) VALUES (
                '$firstName',
                '$lastName',
                '$country',
                '$zipCode',
                '$state',
                $userId,
                '$address',
                $isBillingAddress
         )";
    $result = mysqli_query($con, $query);
} catch (\Exception $exception) {
    echo json_encode(['error' => 'Could not save new address.']);
    return;
}

if (!$result) {
    echo json_encode(['error' => 'Could not save new address.']);
    return;
}

if (mysqli_errno($con)) {
    echo json_encode(['error' => 'Could not save new address.']);
    return;
}

echo json_encode(['message' => 'Success.']);
return;

function createGuestUser($email, $name, $surname, $con)
{
    $create_datetime = date("Y-m-d H:i:s");
    $query = "INSERT into `users` (name, surname, username, password, email, create_datetime)
                     VALUES ('$name', '$surname', 'Guest', '" . md5(rand(512)) . "', '$email', '$create_datetime')";
    mysqli_query($con, $query);

    $newUserQuery = "SELECT * FROM `users` WHERE email='$email'";
    $result = mysqli_query($con, $newUserQuery) or die(mysql_error());
    $rows = mysqli_num_rows($result);

    while ($row = $result->fetch_assoc()) {
        return $row['id'];
    }

    return "";
}
