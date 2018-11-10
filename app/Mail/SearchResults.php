<?php

namespace App\Mail;

use App\Entities\SearchRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SearchResults extends Mailable
{
    use Queueable, SerializesModels;

    /** @var SearchRequest */
    private $searchRequest;

    /**
     * Create a new message instance.
     *
     * @param SearchRequest $searchRequest
     */
    public function __construct(SearchRequest $searchRequest)
    {
        $this->searchRequest = $searchRequest;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): self
    {
        return $this->view('emails.search_results')->with(['searchRequest' => $this->searchRequest]);
    }
}
