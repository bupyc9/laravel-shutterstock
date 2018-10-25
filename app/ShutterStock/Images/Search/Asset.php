<?php

namespace App\ShutterStock\Images\Search;

/**
 * @author Afanasyev Pavel <bupyc9@gmail.com>
 */
class Asset
{
    private $url;

    private $height;

    private $width;

    public function __construct(array $data)
    {
        $this->url = (string) $data['url'];
        $this->height = (int) $data['height'];
        $this->width = (int) $data['width'];
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function getWidth(): int
    {
        return $this->width;
    }
}