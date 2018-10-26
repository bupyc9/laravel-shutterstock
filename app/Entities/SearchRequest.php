<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
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
 */
class SearchRequest extends Model
{
    protected $fillable = ['query'];
}
