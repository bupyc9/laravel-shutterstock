<?php

namespace App\Providers;

use App\Repositories\SearchRequestRepository;
use App\Repositories\SearchRequestRepositoryEloquent;
use App\Repositories\SearchResultRepository;
use App\Repositories\SearchResultRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(SearchRequestRepository::class, SearchRequestRepositoryEloquent::class);
        $this->app->bind(SearchResultRepository::class, SearchResultRepositoryEloquent::class);
    }
}
