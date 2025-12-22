<?php
    // Block direct access
    if (basename($_SERVER['PHP_SELF']) === 'config.php') {
        http_response_code(403);
        exit('Forbidden');
    }

    define('ROOT_PATH', realpath(__DIR__));
    require_once __DIR__ . '/vendor/autoload.php';
    use Symfony\Component\Yaml\Yaml;
    $config = Yaml::parseFile(__DIR__ . '/data/config.yml');
?>