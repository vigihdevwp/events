<?php


error_reporting(-1);

define('HOME', getenv('HOME') ?? '');

require __DIR__ . '/../vendor/autoload.php';

echo "Server " . __FILE__ . "</br>";

$HOME = getenv('HOME') ?? '';
