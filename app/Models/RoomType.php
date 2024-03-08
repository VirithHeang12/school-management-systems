<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
/**
 * @mixin Builder
 */
class RoomType extends Model
{
    use HasFactory;

    protected $fillable = ['room_type_name'];

    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class);
    }
}
