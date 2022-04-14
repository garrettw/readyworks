<?php

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();
$dotenv->required(['DB_HOST', 'DB_NAME', 'DB_USER', 'DB_PASS',])->notEmpty();

defined('YII_ENV') or define('YII_ENV', $_ENV['YII_ENV'] ?? 'prod');
defined('YII_DEBUG') or define('YII_DEBUG', YII_ENV !== 'prod');

error_reporting(0);
ini_set('display_errors', 0);

if (YII_ENV !== 'prod') {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}
