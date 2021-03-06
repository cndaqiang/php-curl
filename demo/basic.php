<?php
require_once '_inc.php';
use Ares333\Curl\Toolkit;
$curl = (new Toolkit())->getCurl();
$curl->onInfo = null;
$curl->add(
    array(
        'opt' => array(
            CURLOPT_URL => 'http://baidu.com'
        ),
        'args' => 'This is user arg for ' . $v
    ),
    function ($r, $args) {
        echo "Request success for " . $r['info']['url'] . "\n";
        echo "\nHeader info:\n";
        print_r($r['info']);
        echo "\nRaw header:\n";
        print_r($r['header']);
        echo "\nArgs:\n";
        print_r($args);
        echo "\n\nBody size:\n";
        echo strlen($r['body']) . ' bytes';
        echo "\n";
    });
$curl->start();