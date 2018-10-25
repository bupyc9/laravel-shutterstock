<?php

namespace App\ShutterStock\Images\Search;

use App\ShutterStock\AbstractResponse;
use Illuminate\Support\Collection;

/**
 * @author Afanasyev Pavel <bupyc9@gmail.com>
 */
class ImagesSearchResponse extends AbstractResponse
{
    /** @var Collection|Item[] */
    private $items;

    public function __construct(array $data, int $code)
    {
        parent::__construct($data, $code);

        $this->items = collect([]);

        if (!$this->isError()) {
            foreach ($this->get('data') as $item) {
                $this->items->push(new Item($item));
            }
        }
    }

    public function getPage(): int
    {
        return (int) $this->get('page');
    }

    public function getPerPage(): int
    {
        return (int) $this->get('per_page');
    }

    public function getTotalCount(): int
    {
        return (int) $this->get('total_count');
    }

    /**
     * @return Collection|Item[]
     */
    public function getItems(): Collection
    {
        return $this->items;
    }
}