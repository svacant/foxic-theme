<?php
// Loads environment variables from .env if present.
$envPath = __DIR__ . '/.env';
if (file_exists($envPath)) {
    $vars = parse_ini_file($envPath, false, INI_SCANNER_TYPED);
    foreach ($vars as $k => $v) {
        if (getenv($k) === false) {
            putenv("$k=$v");
        }
    }
}

function envVar($key, $default = null) {
    $val = getenv($key);
    return $val !== false ? $val : $default;
}

function getRedisClient() {
    $host = envVar('REDIS_HOST', '127.0.0.1');
    $port = envVar('REDIS_PORT', 6379);
    $redis = new Redis();
    $redis->connect($host, $port);
    return $redis;
}


function getDbConnection() {
    $driver = envVar('DB_DRIVER', 'redis');
    if ($driver === 'redis') {
        return getRedisClient();
    }
    // local driver returns null as connection is file based
    return null;
}
