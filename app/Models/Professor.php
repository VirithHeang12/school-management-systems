<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Professor extends Model
{
    use HasFactory;

    protected $fillable = ['professor_specialty'];

    public function classSections(): HasMany
    {
        return $this->hasMany(ClassSection::class);
    }
}
