<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Professor extends Model
{
    use HasFactory;

    protected $fillable = ['dept_id', 'prof_specialty', 'prof_fname', 'prof_lname', 'prof_email'];

    public function department(): HasOne
    {
        return $this->hasOne(Department::class);
    }

    public function classSections(): HasMany
    {
        return $this->hasMany(ClassSection::class);
    }
}
