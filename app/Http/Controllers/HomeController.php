<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use App\Models\Person;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $numberOfStudents = Person::where('person_is_professor', 0)->count();
        $numberOfDepartments = Department::count();
        $numberOfCourses = Course::count();
        $numberOfTeachers = Person::where('person_is_professor', 1)->count();
        $courses = Course::latest()->take(3)->get();
        return view("home", compact("numberOfCourses", "numberOfDepartments", "numberOfStudents", "numberOfTeachers", "courses"));
    }
}
