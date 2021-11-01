#!/usr/local/bin/php
<?php

require_once __DIR__ . '/vendor/autoload.php';

$wpCliConfig = getcwd() . '/wp-cli.yml';

// This folder contains a wp-cli.yml configuration
if(file_exists($wpCliConfig)) {
    $value = Symfony\Component\Yaml\Yaml::parseFile($wpCliConfig);

    // Did the current wpconfig contains dedicated server configuration
    $server = $value['server'] ?? ['host' => '127.0.0.1', 'port' => '8080'];
    $serverHost = $server['host'] ?? '127.0.0.1';
    $serverHost = explode('.',  $serverHost)[0];
    $serverPort = $server['port'] ?? '8080';

    exit("$serverHost:$serverPort");
}
