<?php

namespace dnj\FTP\Contracts;

interface IConnector
{
    public function connect(string $hostname, int $port, bool $isSSL, ?int $timeout = 90): IConnection;
}
