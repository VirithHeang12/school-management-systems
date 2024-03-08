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
class Person extends Model
{
    use HasFactory;

    protected $fillable = ['person_first_name', 'person_last_name', 'person_email', 'person_is_professor', 'department_id', 'address_id', 'person_date_of_birth', 'person_profile'];

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function enrolls(): hasMany
    {
        return $this->hasMany(Enroll::class);
    }
}
