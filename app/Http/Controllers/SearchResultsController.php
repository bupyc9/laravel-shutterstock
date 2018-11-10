<?php

namespace App\Http\Controllers;

use App\Entities\SearchRequest;
use App\Jobs\SendSearchResultsToEmailJob;
use App\Repositories\SearchRequestRepository;
use Illuminate\Http\Request;

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

        return view('search.index', ['searchRequest' => $searchRequest, 'query' => $searchRequest->query]);
    }

    public function emails(int $id)
    {
        /** @var SearchRequest $searchRequest */
        $searchRequest = $this->repository->find($id);

        return view('search.popup_email', ['searchRequest' => $searchRequest]);
    }

    /**
     * @param int $id
     * @param Request $request
     * @return array
     * @throws \Illuminate\Validation\ValidationException
     */
    public function sendToEmail(int $id, Request $request): array
    {
        $data = \Validator::make(
            $request->post(),
            [
                'emails.*' => 'required|email',
            ]
        )->validate();

        /** @var SearchRequest $searchRequest */
        $searchRequest = $this->repository->find($id);

        foreach ($data['emails'] as $email) {
            SendSearchResultsToEmailJob::dispatch($searchRequest->id, $email);
        }

        return [];
    }
}
