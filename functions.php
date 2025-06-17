<?php
function config_page($data)
{
    // Extract the first HTML comment block
    if (!preg_match('/<!--(.*?)-->/s', $data, $matches)) {
        return [];
    }

    $configBlock = trim($matches[1]);
    $result = [];

    foreach (preg_split('/\r?\n/', $configBlock) as $line) {
        $line = trim($line);
        if (preg_match('/^\$([A-Za-z_][A-Za-z0-9_]*)\s*=\s*(.+);$/', $line, $m)) {
            $key = $m[1];
            $value = trim($m[2]);

            if ((substr($value, 0, 1) === '"' && substr($value, -1) === '"') ||
                (substr($value, 0, 1) === "'" && substr($value, -1) === "'")) {
                $value = substr($value, 1, -1);
            }

            $result[$key] = $value;
        }
    }

    return $result;
}
?>
