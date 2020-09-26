<?php

require __DIR__ . '/../vendor/autoload.php';

$driver = new \Parakeet\Adapter\ConsoleDriver();
$logger = new \Parakeet\Logger($driver);

$logger
    ->emergency()
    ->message('Structured logging is awesome')
    ->string('foo', 'bar')
    ->bool('boolean', false)
    ->float('answerFloat', 42.0)
    ->int('answerInt', 42)
    ->log();
