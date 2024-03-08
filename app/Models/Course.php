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
class Course extends Model
{
    use HasFactory;

    protected $fillable = ['course_title', 'department_id', 'course_description'];

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function classSections(): hasMany
    {
        return $this->hasMany(ClassSection::class);
    }
}
