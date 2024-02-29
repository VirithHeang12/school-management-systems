<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['room_type', 'blng_id'];

    public function building(): hasOne
    {
        return $this->hasOne(Building::class);
    }
}
