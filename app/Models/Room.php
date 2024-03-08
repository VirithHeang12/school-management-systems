<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
/**
 * @mixin Builder
 */
class Room extends Model
{
    use HasFactory;

    protected $fillable = ['room_type', 'room_type_id', 'building_id'];
    protected $primaryKey = 'id';

    public function building(): BelongsTo
    {
        return $this->belongsTo(Building::class);
    }

    public function roomType(): BelongsTo
    {
        return $this->belongsTo(RoomType::class);
    }
}
