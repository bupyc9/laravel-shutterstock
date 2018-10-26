<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Entities\SearchResult;
use Prettus\Repository\Exceptions\RepositoryException;

/**
 * Class SearchResultRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class SearchResultRepositoryEloquent extends BaseRepository implements SearchResultRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return SearchResult::class;
    }

    /**
     * Boot up the repository, pushing criteria
     * @throws RepositoryException
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
