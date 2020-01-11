<?php
setlocale(LC_ALL, 'ru_RU.UTF8');

session_start();

require __DIR__ . 'vendor/autoload.php';

define('ROOT', __DIR__);

(new Custodian\Kernel\Application)->run();