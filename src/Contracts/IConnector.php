<?php

namespace dnj\FTP\Contracts;

interface IConnector
{
    public function connect(string $hostname, int $port = 21, bool $isSSL = false, ?int $timeout = 90): IConnection;
}
