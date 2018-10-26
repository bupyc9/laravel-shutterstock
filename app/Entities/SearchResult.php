<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\SearchResult
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $request_id
 * @property float $aspect
 * @property string $description
 * @property string $image_type
 * @property string $media_type
 * @property string $url
 * @property int $height
 * @property int $width
 * @method static Builder|SearchResult whereAspect($value)
 * @method static Builder|SearchResult whereCreatedAt($value)
 * @method static Builder|SearchResult whereDescription($value)
 * @method static Builder|SearchResult whereHeight($value)
 * @method static Builder|SearchResult whereId($value)
 * @method static Builder|SearchResult whereImageType($value)
 * @method static Builder|SearchResult whereMediaType($value)
 * @method static Builder|SearchResult whereRequestId($value)
 * @method static Builder|SearchResult whereUpdatedAt($value)
 * @method static Builder|SearchResult whereUrl($value)
 * @method static Builder|SearchResult whereWidth($value)
 * @mixin \Eloquent
 * @property-read SearchRequest $request
 */
class SearchResult extends Model
{
    protected $fillable = ['aspect', 'description', 'image_type', 'media_type', 'url', 'height', 'width', 'request_id'];

    public function request(): BelongsTo
    {
        return $this->belongsTo(SearchRequest::class, 'id', 'request_id');
    }
}
