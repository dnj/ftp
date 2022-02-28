<?php

namespace dnj\FTP\Contracts;

interface IAuthentication extends \Serializable, \JsonSerializable
{
    public function getUsername(): string;

    public function getPassword(): string;

    /**
     * @return static
     */
    public function authenticate(IConnection $connection): self;
}
