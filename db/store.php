<?php
require_once __DIR__ . '/../config.php';

interface DataStore {
    public function insert(string $table, array $row): int;
    public function select(string $table, callable $filter): array;
    public function delete(string $table, callable $filter): void;
}

class LocalStore implements DataStore {
    private $dir;
    public function __construct(string $dir) {
        $this->dir = $dir;
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
    }
    private function path(string $table): string {
        return $this->dir . '/' . $table . '.json';
    }
    private function read(string $table): array {
        $path = $this->path($table);
        if (!file_exists($path)) {
            return [];
        }
        $json = file_get_contents($path);
        return $json ? json_decode($json, true) : [];
    }
    private function write(string $table, array $rows): void {
        file_put_contents($this->path($table), json_encode($rows));
    }
    public function insert(string $table, array $row): int {
        $rows = $this->read($table);
        $ids = array_column($rows, 'id');
        $row['id'] = $ids ? max($ids) + 1 : 1;
        $rows[] = $row;
        $this->write($table, $rows);
        return $row['id'];
    }
    public function select(string $table, callable $filter): array {
        $rows = $this->read($table);
        return array_values(array_filter($rows, $filter));
    }
    public function delete(string $table, callable $filter): void {
        $rows = $this->read($table);
        $rows = array_values(array_filter($rows, fn($r) => !$filter($r)));
        $this->write($table, $rows);
    }
}

class MemcacheStore implements DataStore {
    private $memcache;
    public function __construct(Memcached $memcache) {
        $this->memcache = $memcache;
    }
    private function key(string $table): string {
        return 'table:' . $table;
    }
    private function read(string $table): array {
        $json = $this->memcache->get($this->key($table));
        return $json ? json_decode($json, true) : [];
    }
    private function write(string $table, array $rows): void {
        $this->memcache->set($this->key($table), json_encode($rows));
    }
    public function insert(string $table, array $row): int {
        $rows = $this->read($table);
        $ids = array_column($rows, 'id');
        $row['id'] = $ids ? max($ids) + 1 : 1;
        $rows[] = $row;
        $this->write($table, $rows);
        return $row['id'];
    }
    public function select(string $table, callable $filter): array {
        $rows = $this->read($table);
        return array_values(array_filter($rows, $filter));
    }
    public function delete(string $table, callable $filter): void {
        $rows = $this->read($table);
        $rows = array_values(array_filter($rows, fn($r) => !$filter($r)));
        $this->write($table, $rows);
    }
}

function getDataStore(): DataStore {
    $driver = envVar('DB_DRIVER', 'memcache');
    if ($driver === 'local') {
        return new LocalStore(__DIR__ . '/data');
    }
    return new MemcacheStore(getMemcacheClient());
}
