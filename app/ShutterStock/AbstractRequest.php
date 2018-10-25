<?php

namespace App\ShutterStock;

/**
 * @author Afanasyev Pavel <bupyc9@gmail.com>
 */
abstract class AbstractRequest implements RequestInterface
{
    private $data = [];

    public function getData(): array
    {
        return $this->data;
    }

    protected function set(string $key, $value): self
    {
        $this->data[$key] = $value;

        return $this;
    }
}