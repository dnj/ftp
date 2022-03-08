<?php

namespace dnj\FTP\Contracts;

interface IConnection extends \Serializable, \JsonSerializable
{
    public function getHost(): string;

    public function getPort(): int;

    public function isPassive(): bool;

    public function setPassive(bool $isPassive): void;

    public function isSSL(): bool;

    /**
     * @return static
     *
     * @throws IException
     */
    public function login(IAuthentication $authentication): self;

    /**
     * @param array<string|number> $commandLine
     */
    public function execute(array $commandLine): ICommand;

    public function close(): void;

    /**
     * Append the contents of a file to another file on the FTP server.
     *
     * @return static
     *
     * @throws IException
     */
    public function append(string $remoteFileName, string $localFileName, ModeType $mode): self;

    /**
     * Changes to the parent directory.
     *
     * @return static
     *
     * @throws IException
     */
    public function cdup(): self;

    /**
     * Changes the current directory on a FTP server.
     *
     * @return static
     *
     * @throws IException
     */
    public function chdir(string $directory): self;

    /**
     * Set permissions on a file via FTP.
     *
     * @return static
     *
     * @throws IException
     */
    public function chmod(string $filename, int $permission): self;

    /**
     * Deletes a file on the FTP server.
     *
     * @return static
     *
     * @throws IException
     */
    public function delete(string $filename): self;

    /**
     * @return static
     *
     * @throws IException
     */
    public function put(string $remoteFileName, string $data, bool $append, ModeType $mode): self;

    /**
     * @throws IException
     */
    public function get(string $remoteFileName, ModeType $mode, ?int $length): string;

    /**
     * @return static
     *
     * @throws IException
     */
    public function mkdir(string $directory, bool $recursive): self;

    /**
     * Returns a list of files in the given directory.
     *
     * @return array<string>|null array of name of files on success or null on failure
     */
    public function nlist(string $dirname): ?array;

    /**
     * Returns a list of files in the given directory.
     *
     * @return array<array{name:string,modify_time:int,size:int,mode:string,type:'dir'|'file'}>|null array of name of files on success or null on failure
     */
    public function ls(string $dirname): ?array;

    /**
     * @throws IException
     */
    public function pwd(): string;

    /**
     * @return static
     *
     * @throws IException
     */
    public function rename(string $from, string $to): self;

    /**
     * @return static
     *
     * @throws IException
     */
    public function rmdir(string $dirname): self;

    /**
     * @throws IException
     */
    public function size(string $path): int;

    /**
     * @return array<int|string,int> see the documentation for stat() for details on the values which may be returned
     *
     * @throws IException
     */
    public function stat(string $path): array;

    public function isFile(string $path): bool;

    public function isDir(string $path): bool;

    public function fileExists(string $path): bool;

    /**
     * @return static
     *
     * @throws IException
     */
    public function upload(string $localFileName, string $remote): self;

    /**
     * @return static
     *
     * @throws IException
     */
    public function download(string $remote, string $localFileName): self;
}
