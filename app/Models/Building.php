<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
/**
 * @mixin Builder
 */
class Building extends Model
{
    use HasFactory;

    protected $fillable = ['building_name', 'building_location'];

    public function rooms(): hasMany
    {
        return $this->hasMany(Room::class);
    }
}
