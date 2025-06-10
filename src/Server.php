<?php

class Server
{

    private $port;
    private $address;
    private $socket;

    public function __construct($address, $port)
    {
        $this->port = $port;
        $this->address = $address;
        $this->createSocket();
        $this->bind();
    }

    function bind()
    {
        socket_bind($this->socket, $this->address, $this->port);
    }
    function createSocket()
    {
        $this->socket = socket_create(AF_INET, SOCK_STREAM, 0);
    }
    function listen()
    {
        socket_listen($this->socket, 10);
        while (true) {
            $client = socket_accept($this->socket);
            $response = "HTTP/1.1 200 OK\r\nContent-Type: text/plain\r\nContent-Length: 12\r\n\r\nHello World!";
            socket_write($client, $response);
            socket_close($client);
        }
    }
}
