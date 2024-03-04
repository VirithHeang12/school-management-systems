<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ClassSection extends Model
{
    use HasFactory;

    protected $fillable = ['class_time', 'professor_id', 'course_id', 'room_id', 'semester_id'];

    public function professor(): BelongsTo
    {
        return $this->belongsTo(Professor::class);
    }

    public function semester(): BelongsTo
    {
        return $this->belongsTo(Semester::class);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function enrolls(): hasMany
    {
        return $this->hasMany(Enroll::class);
    }

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
}
