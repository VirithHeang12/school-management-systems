<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\ManagerAssignment;
use App\Models\Person;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departmentsDb = Department::all();
        $departments = [];
        $i = 0;
        foreach ($departmentsDb as $department) {
            $studentNum = Person::where(['person_is_professor' => 0, 'department_id' => $department->id])->count();
            $teacherNum = Person::where(['person_is_professor' => 1, 'department_id' => $department->id])->count();
            $personId = ManagerAssignment::orderBy('manager_assignment_date', 'desc')->where('department_id', $department->id)->first()->person_id;
            $manager = Person::where('id', $personId)->first();
            $managerFullName = $manager->person_first_name . ' ' . $manager->person_last_name;
            $department['student_num'] = $studentNum;
            $department['teacher_num'] = $teacherNum;
            $department['manager_full_name'] = $managerFullName;
            $departments[$i] = $department;
            $i++;
        }
        return view('department', compact('departments'));
    }
}
