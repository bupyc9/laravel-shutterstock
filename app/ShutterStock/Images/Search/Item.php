<?php

namespace App\ShutterStock\Images\Search;

use Illuminate\Support\Collection;

/**
 * @author Afanasyev Pavel <bupyc9@gmail.com>
 */
class Item
{
    /** @var int */
    private $id;

    /** @var float  */
    private $aspect;

    /** @var string  */
    private $description;

    /** @var string  */
    private $imageType;

    /** @var string  */
    private $mediaType;

    /** @var Collection|Asset[] */
    private $assets;

    public function __construct(array $data)
    {
        $this->id = (int) $data['id'];
        $this->aspect = (float) $data['aspect'];
        $this->description = (string) $data['description'];
        $this->imageType = (string) $data['image_type'];
        $this->mediaType = (string) $data['media_type'];

        $this->assets = collect([]);
        foreach ($data['assets'] as $key => $asset) {
            $this->assets->put($key, new Asset($asset));
        }
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getAspect(): float
    {
        return $this->aspect;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getImageType(): string
    {
        return $this->imageType;
    }

    public function getMediaType(): string
    {
        return $this->mediaType;
    }

    /**
     * @return Collection|Asset[]
     */
    public function getAssets(): Collection
    {
        return $this->assets;
    }
}