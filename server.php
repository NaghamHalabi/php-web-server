<?php

$address = '127.0.0.1';
$port = '9080';
$socket = socket_create(AF_INET, SOCK_STREAM, 0);
socket_bind($socket, $address, $port);
socket_listen($socket, 10);
while (true) {
    $client = socket_accept($socket);
    $response = "HTTP/1.1 200 OK\r\nContent-Type: text/plain\r\nContent-Length: 12\r\n\r\nHello World!";
    socket_write($client, $response);
    socket_close($client);
}
