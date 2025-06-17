<?php
require_once __DIR__ . '/app/controllers/ProductController.php';
$clear_title = $_GET['clear_title'] ?? '';
$controller = new ProductController();
$controller->show($clear_title);
