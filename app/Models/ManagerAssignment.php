<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManagerAssignment extends Model
{
    use HasFactory;
    protected $fillable = ['manager_assignment_date', 'person_id', 'department_id'];
}
