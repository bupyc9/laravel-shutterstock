<?php

namespace App\ShutterStock;

/**
 * @author Afanasyev Pavel <bupyc9@gmail.com>
 */
abstract class AbstractResponse implements ResponseInterface
{
    public const CODE_OK = 200;
    public const CODE_ERROR_BAD_REQUEST = 400;
    public const CODE_ERROR_UNAUTHORIZED = 401;
    public const CODE_ERROR_FORBIDDEN = 403;

    /** @var array */
    private $data;
    /** @var int */
    private $code;

    public function __construct(array $data, int $code)
    {
        $this->data = $data;
        $this->code = $code;
    }

    public function isError(): bool
    {
        return $this->code !== self::CODE_OK;
    }

    public function getErrorMessage(): string
    {
        return $this->isError() ? $this->data['message'] : '';
    }

    public function getErrorCode(): int
    {
        return $this->code;
    }

    public function getData(): array
    {
        return $this->data;
    }

    protected function get(string $key)
    {
        return $this->data[$key] ?? null;
    }
}