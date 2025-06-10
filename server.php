<?php

require "src/Server.php";

$address = '127.0.0.1';
$port = '9080';

$server = new Server($address, $port);
$server->listen();
