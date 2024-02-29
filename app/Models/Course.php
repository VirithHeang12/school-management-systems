<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['crs_title', 'dept_id', 'crs_description'];

    public function department(): hasOne
    {
        return $this->hasOne(Department::class);
    }

    public function classSections(): hasMany
    {
        return $this->hasMany(ClassSection::class);
    }
}
