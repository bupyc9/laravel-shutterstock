<?php

namespace App\ShutterStock;

/**
 * @author Afanasyev Pavel <bupyc9@gmail.com>
 */
interface ResponseInterface
{
    public function __construct(array $data, int $code);

    public function isError(): bool;

    public function getErrorMessage(): string;

    public function getErrorCode(): int;

    public function getData(): array;
}