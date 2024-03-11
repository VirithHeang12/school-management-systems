<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin Builder
 */
class Enroll extends Model
{
    use HasFactory;

    protected $fillable = ['class_id', 'person_id', 'enroll_date', 'enroll_grade'];

    public function person(): BelongsTo
    {
        return $this->belongsTo(Person::class);
    }

}
