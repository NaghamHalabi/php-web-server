<?php

require "src/Server.php";

$address = '127.0.0.1';
$port = '9080';

$server = new Server($address, $port);
$server->listen();

while (true) {
    $client = socket_accept($socket);
    $response = "HTTP/1.1 200 OK\r\nContent-Type: text/plain\r\nContent-Length: 12\r\n\r\nHello World!";
    socket_write($client, $response);
    socket_close($client);
}
