<?php

namespace dnj\FTP\Contracts;

interface ICommand
{
    public function getConnection(): IConnection;

    public function getOutput(): ?string;

    public function isError(): bool;

    public function getError(): ?string;
}
