<?php

/**
 * Defined useful constant
 */
date_default_timezone_set('Asia/Bangkok');
define('FLAG_DEBUG', true);
define('ROOT_PATH', realpath('..')); // not have end slash
define('DS', DIRECTORY_SEPARATOR);

// Using require once because I want to get the specific
// bootloader class here. The loader will be initialized
// in my bootstrap class
require_once ROOT_PATH . '/libs/Fly/Bootstrap.php';

$di = new \Phalcon\DI\FactoryDefault();
$app = new \Fly\Bootstrap($di);

echo $app->run([]);