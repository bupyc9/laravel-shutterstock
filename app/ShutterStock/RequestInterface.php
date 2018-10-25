<?php

namespace App\ShutterStock;

/**
 * @author Afanasyev Pavel <bupyc9@gmail.com>
 */
interface RequestInterface
{
    public function createResponse(array $data, int $code): ResponseInterface;

    public function getData(): array;

    public function getMethod(): string;

    public function getUri(): string;
}