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

function getMemcached() {
    $host = envVar('MEMCACHED_HOST', '127.0.0.1');
    $port = envVar('MEMCACHED_PORT', 11211);
    $mem = new Memcached();
    $mem->addServer($host, $port);
    return $mem;
}

function getDbConnection() {
    $driver = envVar('DB_DRIVER', 'mysql');
    if ($driver === 'redis') {
        return getRedisClient();
    }
    $host = envVar('DB_HOST', '127.0.0.1');
    $name = envVar('DB_NAME', 'shop');
    $user = envVar('DB_USER', 'root');
    $pass = envVar('DB_PASS', '');
    $con = new mysqli($host, $user, $pass, $name);
    if ($con->connect_error) {
        throw new RuntimeException('Database connection failed: ' . $con->connect_error);
    }
    $con->set_charset('utf8mb4');
    return $con;
}
