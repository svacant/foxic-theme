<?php
require_once __DIR__ . '/app/controllers/PageController.php';
$clear_title = $_GET['clear_title'] ?? '';
$controller = new PageController();
$controller->show($clear_title);
