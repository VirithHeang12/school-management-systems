<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['dept_id', 'student_fname', 'student_lname', 'student_email'];

    public function department(): hasOne
    {
        return $this->hasOne(Department::class);
    }

    public function enrolls(): hasMany
    {
        return $this->hasMany(Enroll::class);
    }
}
