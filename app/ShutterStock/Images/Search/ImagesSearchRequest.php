<?php

namespace App\ShutterStock\Images\Search;

use App\ShutterStock\AbstractRequest;
use App\ShutterStock\ResponseInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * @author Afanasyev Pavel <bupyc9@gmail.com>
 */
class ImagesSearchRequest extends AbstractRequest
{
    public function __construct(string $query)
    {
        $this->set('query', $query);
    }

    public function setPage(int $page): self
    {
        $this->set('page', $page);

        return $this;
    }

    public function setPerPage(int $count): self
    {
        $this->set('per_page', $count);

        return $this;
    }
    
    public function createResponse(array $data, int $code): ResponseInterface
    {
        return new ImagesSearchResponse($data, $code);
    }

    public function getMethod(): string
    {
        return Request::METHOD_GET;
    }

    public function getUri(): string
    {
        return '/images/search';
    }
}