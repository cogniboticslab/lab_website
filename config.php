<?php
define('ROOT_PATH', realpath(__DIR__));
require_once __DIR__ . '/vendor/autoload.php';
use Symfony\Component\Yaml\Yaml;
$config = Yaml::parseFile(__DIR__ . '/data/config.yml');

?>