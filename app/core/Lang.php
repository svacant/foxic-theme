<?php
function loadTranslations(string $lang): array {
    $file = __DIR__ . '/../lang/' . $lang . '.php';
    if (file_exists($file)) {
        return include $file;
    }
    return include __DIR__ . '/../lang/en.php';
}
