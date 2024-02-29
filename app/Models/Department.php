<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['dept_name', 'prof_id'];
    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }

    public function professors(): hasMany
    {
        return $this->hasMany(Professor::class);
    }

    public function professor(): hasOne
    {
        return $this->hasOne(Professor::class);
    }

    public function students(): hasMany
    {
        return $this->hasMany(Student::class);
    }
}
