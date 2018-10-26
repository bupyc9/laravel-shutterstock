<?php

namespace App\Http\Controllers;

use App\Entities\SearchRequest;
use App\Repositories\SearchRequestRepository;

class SearchResultsController extends Controller
{
    /** @var SearchRequestRepository */
    private $repository;

    public function __construct(SearchRequestRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(int $id)
    {
        /** @var SearchRequest $searchRequest */
        $searchRequest = $this->repository->with('results')->find($id);

        return view('search.index', ['items' => $searchRequest->results, 'query' => $searchRequest->query]);
    }
}
