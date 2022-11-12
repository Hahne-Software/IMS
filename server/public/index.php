<?php
declare(strict_types=1);

require_once dirname(__DIR__) . '/vendor/autoload.php';

$server = new HahneSoftware\IMS\Server\Server();
$server->start();