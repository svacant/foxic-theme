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

function getMemcacheClient() {
    $host = envVar('MEMCACHE_HOST', '127.0.0.1');
    $port = envVar('MEMCACHE_PORT', 11211);
    $memcache = new Memcached();
    $memcache->addServer($host, $port);
    return $memcache;
}


function getDbConnection() {
    $driver = envVar('DB_DRIVER', 'memcache');
    if ($driver === 'memcache') {
        return getMemcacheClient();
    }
    // local driver returns null as connection is file based
    return null;
}
