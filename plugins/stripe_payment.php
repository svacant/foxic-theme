<?php

require '../vendor/autoload.php';

// retrieve JSON from POST body
$jsonStr = file_get_contents('php://input');
$jsonObj = json_decode($jsonStr);

//restricted key for marketplace option
$key = "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";

//$key = "sk_test_51HPDt8JcAjHkQyk3mdutIE5dljNgzn85yNpbkJe8mXGvS3Om4Ral9S85F2L2wxWPtH3tDlvulTbYej3N8rj6bo9A00H0Y5MD4H"; //test

// This is a public sample test API key.
// Don’t submit any personally identifiable information in requests made with this key.
// Sign in to see your own test API key embedded in code samples.
\Stripe\Stripe::setApiKey($key); //TODO: add secret key

header('Content-Type: application/json');

try {
    // Create a PaymentIntent with amount and currency
    $paymentIntent = \Stripe\PaymentIntent::create([
        'amount' => $jsonObj->stripe_total,
        'statement_descriptor' => $_SERVER['SERVER_NAME'],
        'currency' => strtolower($jsonObj->currency_code),
        'automatic_payment_methods' => [
            'enabled' => true,
        ],
        'transfer_data' => [ 'destination' => "acct_1Ll8y7IheIvUoqxO" ],
        'metadata' => ["order_id" => $jsonObj->id]
    ]);

    $output = [
        'clientSecret' => $paymentIntent->client_secret,
    ];

    echo json_encode($output);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
