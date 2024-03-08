<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
/**
 * @mixin Builder
 */
class Professor extends Model
{
    use HasFactory;

    protected $fillable = ['person_id', 'professor_specialty'];
    protected $primaryKey = 'person_id';

    public function classSections(): HasMany
    {
        return $this->hasMany(ClassSection::class);
    }

    public function person(): BelongsTo
    {
        return $this->belongsTo(Person::class);
    }
}
