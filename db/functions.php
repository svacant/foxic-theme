<?php
require_once __DIR__ . '/db.php';

function db_get_addresses($userId) {
    global $store;
    return $store->select('addresses', fn($r) => $r['user_id'] == $userId);
}

function db_delete_addresses($userId, $isBilling) {
    global $store;
    $store->delete('addresses', function($r) use ($userId, $isBilling) {
        return $r['user_id'] == $userId && $r['is_billing_address'] == $isBilling;
    });
}

function db_insert_address(array $data) {
    global $store;
    $store->insert('addresses', $data);
}

function db_create_guest_user($email, $name, $surname) {
    global $store;
    $id = $store->insert('users', [
        'name' => $name,
        'surname' => $surname,
        'username' => 'Guest',
        'password' => md5(rand(512)),
        'email' => $email,
        'create_datetime' => date('Y-m-d H:i:s'),
    ]);
    return $id;
}

function db_get_user_email($userId) {
    global $store;
    $res = $store->select('users', fn($r) => $r['id'] == $userId);
    return $res ? $res[0]['email'] : '';
}

function db_get_shipping_address($userId) {
    global $store;
    $res = $store->select('addresses', function($r) use ($userId) {
        return $r['user_id'] == $userId && $r['is_billing_address'] == 0;
    });
    return $res ? $res[0] : [];
}

function db_save_order($userId, $shoppiOrderId, $totalValue) {
    global $store;
    $store->insert('orders', [
        'user_id' => $userId,
        'shoppi_order_id' => $shoppiOrderId,
        'total_value' => $totalValue,
    ]);
}
