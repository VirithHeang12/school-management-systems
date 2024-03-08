<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
/**
 * @mixin Builder
 */
class Department extends Model
{
    use HasFactory;

    protected $fillable = ['department_name'];
    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }

    public function persons(): hasMany
    {
        return $this->hasMany(Professor::class);
    }

    public function managerAssignments(): hasMany {
        return $this->hasMany(ManagerAssignment::class);
    }
}
