<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Building extends Model
{
    use HasFactory;

    protected $fillable = ['blng_name', 'blng_location'];

    public function rooms(): hasMany
    {
        return $this->hasMany(Room::class);
    }
}
