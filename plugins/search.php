<?php
require '../data.php';

header('Content-Type: application/json');

$q = isset($_GET['q']) ? $_GET['q'] : '';
$min = isset($_GET['min']) ? $_GET['min'] : '';
$max = isset($_GET['max']) ? $_GET['max'] : '';

$cacheKey = 'search_' . md5($shoppiPageId . '_' . $data->lang . '_' . $q . '_' . $min . '_' . $max);
if ($cached = $cache->get($cacheKey)) {
    echo $cached;
    return;
}

$url = "https://www.shoppiapp.com/api/website/products/json?pageId=$shoppiPageId&search=" . urlencode($q);
if ($min !== '') {
    $url .= "&min=$min";
}
if ($max !== '') {
    $url .= "&max=$max";
}

$opts = [
    'http' => [
        'method' => 'GET',
        'header' => "Accept-language: {$data->lang}\r\n" .
                    "Referer: https://{$_SERVER['SERVER_NAME']}\r\n"
    ]
];
$context = stream_context_create($opts);
$response = file_get_contents($url, false, $context);

if ($response) {
    $cache->set($cacheKey, $response, 3600);
}

echo $response;

