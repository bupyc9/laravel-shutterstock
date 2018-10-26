<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Entities\SearchRequest;
use App\Validators\SearchRequestValidator;
use Prettus\Repository\Exceptions\RepositoryException;

/**
 * Class SearchRequestRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class SearchRequestRepositoryEloquent extends BaseRepository implements SearchRequestRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return SearchRequest::class;
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
