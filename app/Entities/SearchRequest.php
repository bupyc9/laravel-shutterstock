<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\SearchRequest
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $query
 * @method static Builder|SearchRequest whereCreatedAt($value)
 * @method static Builder|SearchRequest whereId($value)
 * @method static Builder|SearchRequest whereQuery($value)
 * @method static Builder|SearchRequest whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read Collection|SearchResult[] $results
 */
class SearchRequest extends Model
{
    protected $fillable = ['query'];

    public function results(): HasMany
    {
        return $this->hasMany(SearchResult::class, 'request_id', 'id');
    }
}
