<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
/**
 * @mixin Builder
 */
class Semester extends Model
{
    use HasFactory;

    protected $fillable = ['semester_start_date', 'semester_end_date'];

    public function classSections(): hasMany
    {
        return $this->hasMany(ClassSection::class);
    }
}
