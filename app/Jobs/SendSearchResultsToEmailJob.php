<?php

namespace App\Jobs;

use App\Entities\SearchRequest;
use App\Mail\SearchResults;
use App\Repositories\SearchRequestRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendSearchResultsToEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /** @var int */
    private $id;
    /**@var string */
    private $emailTo;

    public function __construct(int $id, string $emailTo)
    {
        $this->id = $id;
        $this->emailTo = $emailTo;
    }

    public function handle(): void
    {
        $repository = app()->make(SearchRequestRepository::class);
        /** @var SearchRequest $searchRequest */
        $searchRequest = $repository->find($this->id);

        \Mail::to($this->emailTo)->sendNow(new SearchResults($searchRequest));
    }
}
