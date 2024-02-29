<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ClassSection extends Model
{
    use HasFactory;

    protected $fillable = ['class_time', 'prof_id', 'crs_id', 'room_id', 'semester_id'];

    public function professor(): hasOne
    {
        return $this->hasOne(Professor::class);
    }

    public function semester(): hasOne
    {
        return $this->hasOne(Semester::class);
    }

    public function course(): hasOne
    {
        return $this->hasOne(Course::class);
    }

    public function enrolls(): hasMany
    {
        return $this->hasMany(Enroll::class);
    }

    public function room(): hasOne
    {
        return $this->hasOne(Room::class);
    }
}
